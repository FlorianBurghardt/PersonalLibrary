<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\DTO;

use de\PersonalLibrary\Modules\Database\Interfaces\IInputDTO;
use de\PersonalLibrary\Modules\JSON;
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

    public function __construct(object|string|null $input = null, IInputDTO $dataDTO = null)
    {
        if (!is_null($input))
        {
            if (is_string($input)) { $input = JSON::decode($input, false); }
            if (is_object($input))
            {
                if (!empty($input->query)) { $this->query = $input->query; }
                if (!empty($input->table)) { $this->table = $input->table; }
                if (!empty($input->data)) { $this->data = (array)$input->data; }
                if (!empty($input->conditions)) { $this->conditions = (array)$input->conditions; }
            }
        }
        if (!is_null($dataDTO)) { $this->dataDTO = $dataDTO; }
    }
}
// Usage for instanciation:
    // Example 1:
    /*
    $inputDTO = new InputDTO(
        JSON::encode(
            [
                'query' => $this->getQuery('mealGroup')
            ])
    );*/

    // Example 2:
    /*
    $inputDTO = new InputDTO();
    $inputDTO->query = $this->getQuery('mealGroup');
    */
?>