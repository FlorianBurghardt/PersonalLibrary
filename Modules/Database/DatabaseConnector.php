<?php
#region usings
namespace de\PersonalLibrary\Modules\Database;

use de\PersonalLibrary\Enum\KeywordsSQL;
use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Exception\DatabaseConnectionException;
use de\PersonalLibrary\Exception\ForbiddenException;
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
		if (is_null($connection->hostName) ||
			is_null($connection->database) ||
			is_null($connection->userName) ||
			is_null($connection->password))
		{
			throw new DatabaseConnectionException("Missing database connection parameters", 2000);    
		}

		$this -> connection = $connection;
		if (is_null($connection->charset)) { $connection->charset = "utf8mb4"; }
	}

	/**
	 * Connect to the database
	 * @throws DatabaseConnectionException
	 * @return bool
	 */
	public function connect(): bool
	{
		if (!is_null($this->pdo)) { return true; }
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
		$this->pdo = null;
	}

	/**
	 * Create a new record in the database, specified in the InputDTO
	 * @param InputDTO $input
	 * @return OutputDTO 
	 */
	public function create(InputDTO $input): OutputDTO
	{
		$result = $this->validate($input, new OutputDTO(), Request::POST);
		if ($result->statusCode != StatusCode::OK) { return $result; }
		
		if (!is_null($input->dataDTO))
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
	 * @return OutputDTO
	 */
	public function read(InputDTO $input)
	{
		$result = $this->validate($input, new OutputDTO(), Request::GET);
		if ($result->statusCode != StatusCode::OK) { return $result; }
		
		$sql = $input->query;
		if (is_null($input->query))
		{
			$sql = "SELECT * FROM {$input->table}";

			if (!is_null($input->conditions))
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
		if (!is_null($input->conditions))
		{
			foreach ($input->conditions as $key => &$value)
			{
				$stmt->bindParam(":$key", $value);
			}
		}

		$success = $stmt->execute();
		
		$result = new OutputDTO();
		if (!$success)
		{
			$result->errorMessage = 'Datasets could not be readed';
			$result->errorCode = 2020;
			$result->statusCode = StatusCode::CONFLICT;
			return $result;
		}
		$result->count = $stmt->rowCount();
		$result->data = json_encode($stmt->fetchAll());
		$result->statusCode = StatusCode::CREATED;
		return $result;
	}

	public function update(InputDTO $input)
	{
		$result = $this->validate($input, new OutputDTO(), Request::PUT);
		if ($result->statusCode != StatusCode::OK) { return $result; }

		$updateFields = [];
		foreach ($input->data as $key => $value) {
			$updateFields[] = "$key = :$key";
		}
		$sql = "UPDATE {$input->table} SET " . implode(', ', $updateFields);

		if (!empty($input->conditions)) {
			$conditionFields = [];
			foreach ($input->conditions as $key => $value) {
				$conditionFields[] = "$key = :$key";
			}
			$sql .= ' WHERE ' . implode(' AND ', $conditionFields);
		}

		$stmt = $this->pdo->prepare($sql);

		foreach (array_merge($input->data, $input->conditions) as $key => &$value) {
			$stmt->bindParam(":$key", $value);
		}

		$success = $stmt->execute();
		return new OutputDTO($success, [], $success ? '' : $stmt->errorInfo()[2]);
	}

	public function delete(InputDTO $input) {
		$sql = "DELETE FROM {$input->table}";

		if (!empty($input->conditions)) {
			$conditionFields = [];
			foreach ($input->conditions as $key => $value) {
				$conditionFields[] = "$key = :$key";
			}
			$sql .= ' WHERE ' . implode(' AND ', $conditionFields);
		}

		$stmt = $this->pdo->prepare($sql);

		foreach ($input->conditions as $key => &$value) {
			$stmt->bindParam(":$key", $value);
		}

		$success = $stmt->execute();
		return new OutputDTO($success, [], $success ? '' : $stmt->errorInfo()[2]);
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
	 * @return (bool)
	 */
	private function checkForSQLKeywords(string $query): bool
	{
		foreach (KeywordsSQL::cases() as $item)
		{
			if (stripos($query, $item->value)) { return false; }
		}
		return true;
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
			if (!is_null($inputDTO->query))
			{ 
				$outputDTO->errorMessage = 'The "query" parameter is not allowed';
				$outputDTO->errorCode = 2100;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (is_null($inputDTO->table))
			{ 
				$outputDTO->errorMessage = 'The "table" parameter must be set';
				$outputDTO->errorCode = 2101;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->data) && !is_null($inputDTO->dataDTO))
			{ 
				$outputDTO->errorMessage = 'Only one parameter of "data" or "dataDTO" is allowed';
				$outputDTO->errorCode = 2102;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->conditions))
			{ 
				$outputDTO->errorMessage = 'The "conditions" parameter is not allowed';
				$outputDTO->errorCode = 2103;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
		}
		if ($request === Request::GET)
		{
			if (!is_null($inputDTO->query) && $this->checkForSQLKeywords($inputDTO->query) === false)
			{ 
				$outputDTO->errorMessage = 'The "query" contains forbidden SQL keywords';
				$outputDTO->errorCode = 2110;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (is_null($inputDTO->query) && is_null($inputDTO->table))
			{ 
				$outputDTO->errorMessage = 'The "table" parameter must be set';
				$outputDTO->errorCode = 2111;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->data) || !is_null($inputDTO->dataDTO))
			{ 
				$outputDTO->errorMessage = 'The parameters "data" and "dataDTO" are not allowed';
				$outputDTO->errorCode = 2112;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->data) && !$this->isAssociativeArray($inputDTO->data))
			{ 
				$outputDTO->errorMessage = 'The "data" parameter must be an associative array';
				$outputDTO->errorCode = 2113;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->conditions) && !$this->isAssociativeArray($inputDTO->conditions))
			{ 
				$outputDTO->errorMessage = 'The "conditions" parameter must be an associative array';
				$outputDTO->errorCode = 2114;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
		}
		if ($request === Request::PUT)
		{
			if (!is_null($inputDTO->query))
			{ 
				$outputDTO->errorMessage = 'The "query" parameter is not allowed';
				$outputDTO->errorCode = 2120;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (is_null($inputDTO->table))
			{ 
				$outputDTO->errorMessage = 'The "table" parameter must be set';
				$outputDTO->errorCode = 2121;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->data) && !is_null($inputDTO->dataDTO))
			{ 
				$outputDTO->errorMessage = 'Only one parameter of "data" or "dataDTO" is allowed';
				$outputDTO->errorCode = 2122;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->data) && !$this->isAssociativeArray($inputDTO->data))
			{ 
				$outputDTO->errorMessage = 'The "data" parameter must be an associative array';
				$outputDTO->errorCode = 2123;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
			if (!is_null($inputDTO->conditions) && !$this->isAssociativeArray($inputDTO->conditions))
			{ 
				$outputDTO->errorMessage = 'The "conditions" parameter must be an associative array';
				$outputDTO->errorCode = 2124;
				$outputDTO->statusCode = StatusCode::FORBIDDEN;
				return $outputDTO;
			}
		}

		$outputDTO->statusCode = StatusCode::OK;
		return $outputDTO;
	}
}
?>