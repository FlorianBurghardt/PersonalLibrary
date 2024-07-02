<?php
#region usings
namespace de\PersonalLibrary\Modules\Router\Interfaces;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2024/06/28
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