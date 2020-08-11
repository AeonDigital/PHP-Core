<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tDateTimeArray as tDateTimeArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``DateTime Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fDateTimeArray extends tDateTimeArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
