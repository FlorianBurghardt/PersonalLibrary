<?php
#region usings
namespace de\PersonalLibrary\Modules\Router\Interfaces;
#endregion

/**
 * Interface for a specific route controller that uses the generic router
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
interface IRouteController
{
	/**
	 * Page content builder method that is called by the Router.
	 * @return void
	 */
	public function build(): void;
}
?>