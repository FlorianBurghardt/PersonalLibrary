<?php
#region usings
namespace de\PersonalLibrary\Modules\EmailHandler;

use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Modules\EmailHandler\DTO\OutputDTO;
#endregion

/**
 * Email sender class to send emails with email templates
 * @version 1.0.0
 * @version lastUpdate 2024/07/08
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class EmailSender
{
    #region properties
    private string $from;
    private string $fromName;
    #endregion

    #region constructor
    /**
     * Constructor for email sender
     * @param string $from Senders email address
     * @param string $fromName Senders name
     * @return void
     */
    public function __construct(string $from = 'no-reply_taverneolympos@fburghardt.de', string $fromName = 'No Reply')
    {
        $this->from = $from;
        $this->fromName = $fromName;
    }
    #endregion
    
    #region public methods
    /**
     * Send email with email template
     * @param string $to Recipients email address
     * @param string $subject Email subject
     * @param string $template Email template
     * @param array $placeholders Email template placeholders
     * @return OutputDTO
	 * Output result:
	 * - Statuscode = 200: On success
	 * - Statuscode = 406: Invalid email address
	 * - Statuscode = 404: Email template not found
	 * - Statuscode = 503: Email could not be sent
     */
    public function sendEmail(string $to, string $subject, string $template, array $placeholders): OutputDTO
    {
        $result = new OutputDTO();

        if (!$this->validateEmail($to))
        { 
            $result->errorMessage = 'Invalid email address';
            $result->errorCode = 3000;
            $result->statusCode = StatusCode::NOT_ACCEPTABLE->value;
            return $result;
        }

        $htmlContent = $this->loadTemplate($template, $placeholders);
        if ($htmlContent === false)
        { 
            $result->errorMessage = 'Email template not found';
            $result->errorCode = 3001;
            $result->statusCode = StatusCode::NOT_FOUND->value;
            return $result;
        }

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $this->fromName . " <" . $this->from . ">" . "\r\n";
        if (!mail($to, $subject, $htmlContent, $headers))
        { 
            $result->errorMessage = 'Email could not be sent';
            $result->errorCode = 3002;
            $result->statusCode = StatusCode::SERVICE_UNAVAILABLE->value;
            return $result;
        }

        $result->statusCode = StatusCode::OK->value;
        return $result;
    }
    #endregion

    #region private methods
    /**
     * Load email template
     * @param string $template Email template
     * @param array $placeholders Email template placeholders
     * @return string|false
     * Output result:
     * - false on error
     * - Email template string on success
     */
    private function loadTemplate($template, $placeholders): string|false
    {
        $content = file_get_contents($template);
        if ($content === false) { return false; }

        foreach ($placeholders as $key => $value)
        {
            $content = str_replace("{{{$key}}}", $value, $content);
        }
        return $content;
    }

    /**
     * Validate email address
     * @param string $email Email address
     * @return bool
     */
    private function validateEmail($email): bool
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { return true; }
        return false;
    }
    #endregion
}
?>