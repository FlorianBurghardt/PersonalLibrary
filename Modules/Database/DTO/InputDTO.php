<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\DTO;

use de\PersonalLibrary\Modules\Database\Interfaces\IInputDTO;
#endregion

/**
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 * @version 1.0
 * @access public
 */
class InputDTO
{
    public string $query;
    public string $table;
    public array $data;
    public IInputDTO $dataDTO;
    public array $conditions;
}
?>