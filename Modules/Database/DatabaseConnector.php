<?php
#region usings
namespace de\PersonalLibrary\Modules\Database;

use de\PersonalLibrary\Enum\KeywordsSQL;
use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Exception\DatabaseConnectionException;
use de\PersonalLibrary\Modules\Database\DTO\ConnectionDTO;
use de\PersonalLibrary\Modules\Database\DTO\InputDTO;
use de\PersonalLibrary\Modules\Database\DTO\OutputDTO;
use de\PersonalLibrary\Modules\Database\Enum\Request;
use de\PersonalLibrary\Modules\Database\Interfaces\IInputDTO;
use PDO;
use PDOException;
use ReflectionClass;
#endregion

/**
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 * @version 1.0
 * @access public
 */
class DatabaseConnector
{
	private ConnectionDTO $connection;
	private PDO $pdo;

	/**
	 * DatabaseConnector constructor.
	 * @param ConnectionDTO $connection
	 * @throws DatabaseConnectionException
	 * @return void
	 */
	public function __construct(ConnectionDTO $connection)
	{
		if (empty($connection->hostName) ||
			empty($connection->database) ||
			empty($connection->userName) ||
			empty($connection->password))
		{
			throw new DatabaseConnectionException("Missing database connection parameters", 2000);    
		}

		$this -> connection = $connection;
		if (empty($connection->charset)) { $connection->charset = "utf8mb4"; }
	}

	/**
	 * Connect to the database
	 * @throws DatabaseConnectionException
	 * @return bool
	 */
	public function connect(): bool
	{
		if (!empty($this->pdo)) { return true; }
		try
		{
			$dsn = "mysql:host={$this->connection->hostName};dbname={$this->connection->database};charset={$this->connection->charset}";
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false
			];
			$this->pdo = new PDO($dsn, $this->connection->userName, $this->connection->password, $options);
			return true;
		}
		catch (PDOException $e)
		{
			throw new DatabaseConnectionException($e->getMessage(), $e->getCode());
		}
	}

	/**
	 * Disconnect from the database
	 * @return void
	 */
	public function disconnect(): void
	{
		unset($this->pdo);
	}

	/**
	 * Create a new record in the database, specified in the InputDTO
	 * @param InputDTO $input
	 * @return OutputDTO $result->statuscode = StatusCode::CREATED on success
	 */
	public function create(InputDTO $input): OutputDTO
	{
		$result = $this->validate($input, new OutputDTO(), Request::POST);
		if ($result->statusCode != StatusCode::OK) { return $result; }
		
		if (!empty($input->dataDTO))
		{
			$input->data = $this->dtoToArray($input->dataDTO);
		}

		$keys = array_keys($input->data);
		$fields = implode(',', $keys);
		$placeholders = ':' . implode(', :', $keys);

		$sql = "INSERT INTO {$input->table} ($fields) VALUES ($placeholders)";
		$stmt = $this->pdo->prepare($sql);

		foreach ($input->data as $key => &$value)
		{
			$stmt->bindParam(":$key", $value);
		}

		$success = $stmt->execute();

		if (!$success)
		{
			$result->errorMessage = 'Dataset could not be created';
			$result->errorCode = 2010;
			$result->statusCode = StatusCode::CONFLICT;
			return $result;
		}
		$result->count = $stmt->rowCount();
		$result->data = json_encode(['ID' => $this->pdo->lastInsertId()]);
		$result->statusCode = StatusCode::CREATED;
		return $result;
	}

	/**
	 * Read records from the database
	 * @param InputDTO $input
	 * @return OutputDTO $result->statuscode = StatusCode::OK on success
	 */
	public function read(InputDTO $input)
	{
		$result = $this->validate($input, new OutputDTO(), Request::GET);
		if ($result->statusCode != StatusCode::OK) { return $result; }
		
		$sql = $input->query;
		if (empty($input->query))
		{
			$sql = "SELECT * FROM {$input->table}";

			if (!empty($input->conditions))
			{
				$conditionFields = [];
				foreach ($input->conditions as $key => $value)
				{
					$conditionFields[] = "$key = :$key";
				}
				$sql .= ' WHERE ' . implode(' AND ', $conditionFields);
			}
		}

		$stmt = $this->pdo->prepare($sql);
		if (!empty($input->conditions))
		{
			foreach ($input->conditions as $key => &$value)
			{
				$stmt->bindParam(":$key", $value);
			}
		}

		$success = $stmt->execute();
		
		if (!$success)
		{
			$result->errorMessage = 'Datasets could not be selected';
			$result->errorCode = 2020;
			$result->statusCode = StatusCode::CONFLICT;
			return $result;
		}
		$result->count = $stmt->rowCount();
		$result->data = json_encode($stmt->fetchAll());
		$result->statusCode = StatusCode::OK;
		return $result;
	}

	/**
	 * Update records in the database
	 * @param InputDTO $input
	 * @return OutputDTO $result->statuscode = StatusCode::OK on success
	 */
	public function update(InputDTO $input)
	{
		$result = $this->validate($input, new OutputDTO(), Request::PUT);
		if ($result->statusCode != StatusCode::OK) { return $result; }

		$updateFields = [];
		foreach ($input->data as $key => $value)
		{
			$updateFields[] = "$key = :$key";
		}

		$sql = "UPDATE {$input->table} SET " . implode(', ', $updateFields);

		if (!empty($input->conditions))
		{
			$conditionFields = [];
			foreach ($input->conditions as $key => $value)
			{
				$conditionFields[] = "$key = :$key";
			}
			$sql .= ' WHERE ' . implode(' AND ', $conditionFields);
		}

		$stmt = $this->pdo->prepare($sql);
		foreach (array_merge($input->data, $input->conditions) as $key => &$value)
		{
			$stmt->bindParam(":$key", $value);
		}

		$success = $stmt->execute();

		if (!$success)
		{
			$result->errorMessage = 'Datasets could not be updated';
			$result->errorCode = 2030;
			$result->statusCode = StatusCode::CONFLICT;
			return $result;
		}
		$result->count = $stmt->rowCount();
		// TODO: Test update() result data
		$result->data = json_encode($stmt->fetchAll());
		$result->statusCode = StatusCode::OK;
		return $result;
	}

	/**
	 * Delete records from the database
	 * @param InputDTO $input
	 * @return OutputDTO $result->statuscode = StatusCode::OK on success
	 */
	public function delete(InputDTO $input)
	{
		$result = $this->validate($input, new OutputDTO(), Request::DELETE);
		if ($result->statusCode != StatusCode::OK) { return $result; }

		$sql = "DELETE FROM {$input->table}";

		if (!empty($input->conditions))
		{
			$conditionFields = [];
			foreach ($input->conditions as $key => $value)
			{
				$conditionFields[] = "$key = :$key";
			}
			$sql .= ' WHERE ' . implode(' AND ', $conditionFields);
		}

		$stmt = $this->pdo->prepare($sql);
		foreach ($input->conditions as $key => &$value)
		{
			$stmt->bindParam(":$key", $value);
		}

		$success = $stmt->execute();

		if (!$success)
		{
			$result->errorMessage = 'Datasets could not be deleted';
			$result->errorCode = 2040;
			$result->statusCode = StatusCode::CONFLICT;
			return $result;
		}
		$result->count = $stmt->rowCount();
		$result->statusCode = StatusCode::OK;
		return $result;
	}

	private function dtoToArray(IInputDTO $dto): array
	{
		$reflectionClass = new ReflectionClass($dto);
		$properties = $reflectionClass->getProperties();
		$array = [];
	
		foreach ($properties as $property)
		{
			$property->setAccessible(true);
			$array[$property->getName()] = $property->getValue($dto);
		}
	
		return $array;
	}

	/**
	 * Search from not allowed SQL keywords
	 * @param (string) $query Query to search in
	 */
	private function checkForSQLKeywords(string $query): array
	{
		$result = ['Success' => true, 'Keyword' => ''];
		foreach (KeywordsSQL::cases() as $item)
		{
			if (stripos($query, $item->value))
			{
				$result['Success'] = false;
				$result['Keyword'] = $item->value;
				break;
			}
		}
		return $result;
	}

	/**
	 * Check if array is associative
	 * @param (array) $arr Array to check
	 * @return (bool) True if array is associative
	 */
	private function isAssociativeArray(array $arr): bool
	{
		foreach (array_keys($arr) as $key)
		{
			if (!is_int($key)) { return true; }
		}
		return false;
	}

	private function validate(InputDTO $inputDTO, OutputDTO $outputDTO, Request $request):OutputDTO
	{
		if ($request === Request::POST)
		{
			if (!empty($inputDTO->query))
			{ 
				$outputDTO->errorMessage = 'The "query" parameter is not allowed';
				$outputDTO->errorCode = 2110;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (empty($inputDTO->table))
			{ 
				$outputDTO->errorMessage = 'The "table" parameter must be set';
				$outputDTO->errorCode = 2111;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->data) && !empty($inputDTO->dataDTO))
			{ 
				$outputDTO->errorMessage = 'Only one parameter of "data" or "dataDTO" is allowed';
				$outputDTO->errorCode = 2112;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->conditions))
			{ 
				$outputDTO->errorMessage = 'The "conditions" parameter is not allowed';
				$outputDTO->errorCode = 2113;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
		}
		if ($request === Request::GET)
		{
			$forbiddenKeyword = $this->checkForSQLKeywords($inputDTO->query);
			if (!empty($inputDTO->query) && $forbiddenKeyword['Success'] === false)
			{ 
				$outputDTO->errorMessage = 'The "query" contains forbidden SQL keywords "'.$forbiddenKeyword['Keyword'].'".';
				$outputDTO->errorCode = 2120;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (empty($inputDTO->query) && empty($inputDTO->table))
			{ 
				$outputDTO->errorMessage = 'The "table" parameter must be set';
				$outputDTO->errorCode = 2121;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->data) || !empty($inputDTO->dataDTO))
			{ 
				$outputDTO->errorMessage = 'The parameters "data" and "dataDTO" are not allowed';
				$outputDTO->errorCode = 2122;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->data) && !$this->isAssociativeArray($inputDTO->data))
			{ 
				$outputDTO->errorMessage = 'The "data" parameter must be an associative array';
				$outputDTO->errorCode = 2123;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->conditions) && !$this->isAssociativeArray($inputDTO->conditions))
			{ 
				$outputDTO->errorMessage = 'The "conditions" parameter must be an associative array';
				$outputDTO->errorCode = 2124;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
		}
		if ($request === Request::PUT)
		{
			if (!empty($inputDTO->query))
			{ 
				$outputDTO->errorMessage = 'The "query" parameter is not allowed';
				$outputDTO->errorCode = 2130;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (empty($inputDTO->table))
			{ 
				$outputDTO->errorMessage = 'The "table" parameter must be set';
				$outputDTO->errorCode = 2131;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->data) && !empty($inputDTO->dataDTO))
			{ 
				$outputDTO->errorMessage = 'Only one parameter of "data" or "dataDTO" is allowed';
				$outputDTO->errorCode = 2132;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->data) && !$this->isAssociativeArray($inputDTO->data))
			{ 
				$outputDTO->errorMessage = 'The "data" parameter must be an associative array';
				$outputDTO->errorCode = 2133;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->conditions) && !$this->isAssociativeArray($inputDTO->conditions))
			{ 
				$outputDTO->errorMessage = 'The "conditions" parameter must be an associative array';
				$outputDTO->errorCode = 2134;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
		}
		if ($request === Request::DELETE)
		{
			if (!empty($inputDTO->query))
			{ 
				$outputDTO->errorMessage = 'The "query" parameter is not allowed';
				$outputDTO->errorCode = 2140;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (empty($inputDTO->table))
			{ 
				$outputDTO->errorMessage = 'The "table" parameter must be set';
				$outputDTO->errorCode = 2141;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->data))
			{ 
				$outputDTO->errorMessage = 'The parameter "data" is not allowed';
				$outputDTO->errorCode = 2142;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->dataDTO))
			{ 
				$outputDTO->errorMessage = 'The parameter "dataDTO" is not allowed';
				$outputDTO->errorCode = 2143;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!empty($inputDTO->conditions) && !$this->isAssociativeArray($inputDTO->conditions))
			{ 
				$outputDTO->errorMessage = 'The "conditions" parameter must be an associative array';
				$outputDTO->errorCode = 2144;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
		}

		$outputDTO->statusCode = StatusCode::OK;
		return $outputDTO;
	}
}
?>