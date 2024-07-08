<?php
#region usings
namespace de\PersonalLibrary\Exception;

use de\PersonalLibrary\Enum\StatusCode;
#endregion

/**
 * HTTP StatusCode 403 Forbidden Exception
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class ForbiddenException extends MyException
{
    private StatusCode $statusCode = StatusCode::FORBIDDEN;

	public function __construct(string|null $message = null, int $innerCode = 0, int|null $code = null, \Throwable|null $previous = null)
	{
		if (is_null($message)) { $message = "Forbidden"; }
		if (!is_null($code)) { $code = StatusCode::tryfrom($code); }
		if (!is_null($code)) { $this->statusCode = $code; }

		parent::__construct($message, $innerCode, $this->statusCode->value, $previous);
	}
}
?>