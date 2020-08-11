<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tDateTime as tDateTime;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fDateTime extends tDateTime implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
