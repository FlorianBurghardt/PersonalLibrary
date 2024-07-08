<?php
#region usings
namespace de\PersonalLibrary\Response;

use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Modules\JSON;
use de\PersonalLibrary\Logger\Enum\LogLevel;
#endregion

/**
 * HTTP API response object [Singelton]
 * @property static string $requestMethod Request type [GET, PATCH, POST, DELETE]
 * @property static string $uri Request URI
 * @property static array|null $uriSegments URI elements
 * @property static array|null $queryParams URI parameters & request body (JSON string)
 * @property static array|null $requestBody Request body (php://input)
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Response extends ForbiddenMethods
{
	#region properties
	private static Response|null $instance = null;
	private static StatusCode $status = StatusCode::OK;
	private static LogLevel $logLevel = LogLevel::NOTHING;
	private static string $message = '';
	private static int $innerCode = 0;
	private static array|null $result = null;
	private static int $count = 0;
	private static bool $sendErrorMail = false;

	private static string $requestMethod = "";
	private static string $uri = "";
	private static array|null $uriSegments = array();
	private static array|null $queryParams = null;
	private static array|null $requestBody = null;
	#endregion

	#region constructor
	protected function __construct() {}
	private function __clone() {}
	public static function getInstance(): Response
	{
		if (self::$instance === null) { self::$instance = new Response(); }
		return self::$instance;
	}
	#endregion

	#region static getter / setter
	public static function getStatusCode(): int { return self::$status->value; }
	public static function getStatusTitle(): string
	{
		$statusTitle = str_replace('_', ' ', self::$status->name);
		$statusTitle = ucfirst(strtolower($statusTitle));
		return $statusTitle;
	}
	public static function getStatus(): StatusCode { return self::$status; }
	public static function setStatus(StatusCode $status): void { self::$status = $status; }
	public static function getLogLevel(): LogLevel { return self::$logLevel; }
	public static function setLogLevel(LogLevel $logLevel): void { self::$logLevel = $logLevel; }
	public static function getInnerCode(): int { return self::$innerCode; }
	public static function setInnerCode(int $innerCode): void { self::$innerCode = $innerCode; }
	public static function getMessage(): string { return self::$message; }
	public static function setMessage(string $message): void { self::$message = $message; }
	public static function getResult(): array|null { return self::$result; }
	public static function setResult(array|null $result, int $count = 0): void
	{
		self::$result = $result;
		if (self::$result === null) { $count = 0; }
		self::setCount($count);
	}
	public static function getCount(): int { return self::$count; }
	public static function setCount(int $count = 0): void { self::$count = $count; }
	public static function getSendErrorMail(): bool { return self::$sendErrorMail; }
	public static function setSendErrorMail(bool $sendErrorMail = false): void { self::$sendErrorMail = $sendErrorMail; }
	public static function getRequestMethod(): string { return self::$requestMethod; }
	public static function setRequestMethod(string $requestMethod): void { self::$requestMethod = $requestMethod; }
	public static function getUri(): string { return self::$uri; }
	public static function setUri(string $uri): void { self::$uri = $uri; }
	public static function getUriSegments(): array|null { return self::$uriSegments; }
	public static function setUriSegments(string $uri): void
	{
		$uri = parse_url($uri, PHP_URL_PATH);
		self::$uriSegments = explode( '/', $uri);

		if (self::$uriSegments[0] == null) { array_shift(self::$uriSegments); }
	}
	public static function getQueryParams(): array|null { return self::$queryParams; }
	public static function setQueryParams(): void
	{
		if ($_SERVER['QUERY_STRING'] !== null) { parse_str(urldecode($_SERVER['QUERY_STRING']), self::$queryParams); }
	}
	public static function getRequestBody(): array|null { return self::$requestBody; }
	public static function setRequestBody(): void
	{
		$input = file_get_contents("php://input");

		if (JSON::is_json($input)) { self::$requestBody = JSON::decode($input,true); }
	}
	public static function getResponse(): array
	{
		$response = array('statusCode' => self::$status->value, 'statusTitle' => self::getStatusTitle());

		if (self::$logLevel !== LogLevel::NOTHING) { $response += array('innerCode' => self::$innerCode, 'message' => self::$message); }
		else { $response += array('count' => self::$count); }

		$response += array('result' => self::$result);
		return $response;
	}
	public static function setResponse(
		StatusCode $status,
		int $innerCode,
		string $message,
		LogLevel $logLevel,
		array|null $result,
		int $count = 0,
		bool $sendErrorMail = false): void
	{
		self::$status = $status;
		self::$logLevel = $logLevel;
		self::$innerCode = $innerCode;
		self::$message = $message;
		self::setResult($result, $count);
		self::$sendErrorMail = $sendErrorMail;
	}
	public static function getEmailResponse(array $input): string
	{
		$message = JSON::encode($input);
		$message = str_replace("{","",$message);
		$message = str_replace('"',"",$message);
		$message = str_replace(',',"\r\n",$message);
		$message = str_replace("}","",$message);
		return $message;
	}	public static function getJSON(): string
	{
		return JSON::encode(array(
			'statusCode' => self::$status->value,
			'statusTitle' => self::$status->name,
			'innerCode' => self::$innerCode,
			'message' => self::$message,
			'count' => self::$count,
			'result' => self::$result));
	}
	public static function getLog(): string
	{
		$messageString = '['.self::$status->value.'] ';
		$messageString .= '['.self::$innerCode.'] ';
		$messageString .= self::$status->name.' | ';
		$messageString .= self::$message.' | ';
		$messageString .= JSON::encode(self::$result);

		$messageString = JSON::encode($messageString);
		$messageString = str_replace('\"', '"', $messageString);
		$messageString = str_replace('\\\\', '/', $messageString);
		$messageString = ltrim($messageString, '"');
		$messageString = rtrim($messageString, '"');

		return $messageString;
	}
	#endregion
}
?>