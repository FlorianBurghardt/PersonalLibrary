<?php
#region usings
namespace de\PersonalLibrary\Modules\Router;

use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Modules\Router\DTO\RouteResultDTO;
use de\PersonalLibrary\Modules\Router\Interfaces\IRouteController;
use de\PersonalLibrary\Modules\Router\Interfaces\IRouteEnum;
#endregion

/**
 * Generic router to handle routes by namespace and routes enum
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class GenericRouter
{
	#region properties
	private string $namespace;
    private string $enumClass;
	private RouteResultDTO $result;
	#endregion

	#region constructor
	/**
	 * Constructor to handle routes by namespace and routes enum
	 * @param string $namespace The namespace of the controller class
	 * @param string $enumClass The enum with the valid routes. You have to implement IRouteEnum interface
	 * @return void
	 */
	public function __construct(string $namespace, string $enumClass)
	{
		$this->namespace = $namespace;
		$this->enumClass = $enumClass;
		$this->result = new RouteResultDTO();
	}
	#endregion

	#region public methods
	/**
	 * Get the controller for the given route within RouteResultDTO
	 * @param string $route
	 * @return RouteResultDTO
	 */
	public function getController(string $route): RouteResultDTO
	{
		try
		{
			if (!is_subclass_of($this->enumClass, IRouteEnum::class))
			{
				$this->result->statusCode = StatusCode::BAD_REQUEST;
				$this->result->message = "Class $this->enumClass must implement interface IRouteEnum.";
				$this->result->innerCode = 5000;
				return $this->result;
			}
            $routeEnum = $this->enumClass::tryGet($route);
			if ($routeEnum === null)
			{
				$this->result->statusCode = StatusCode::NOT_FOUND;
				$this->result->message = "Invalid route [$route].";
				$this->result->innerCode = 5001;
				return $this->result;
			}

			$className = $this->namespace . '\\' . ucfirst($routeEnum->value);
			if (!class_exists($className))
			{
				$this->result->statusCode = StatusCode::NOT_FOUND;
				$this->result->message = "Class [$className] does not exist.";
				$this->result->innerCode = 5002;
				return $this->result;
			}

			$controller = new $className();
			if (!($controller instanceof IRouteController))
			{
				$this->result->statusCode = StatusCode::BAD_REQUEST;
				$this->result->message = "Class $className must implement interface IRouteController.";
				$this->result->innerCode = 5003;
				return $this->result;
			}
		}
		catch (\Exception $exception)
		{
			$this->result->statusCode = StatusCode::INTERNAL_SERVER_ERROR;
			$this->result->message = $exception->getMessage()." - ".$exception->getCode();
			$this->result->innerCode = 5004;
			return $this->result;
		}

		$this->result->statusCode = StatusCode::OK;
		$this->result->controller = $controller;
		return $this->result;
	}
	#endregion
}
?>