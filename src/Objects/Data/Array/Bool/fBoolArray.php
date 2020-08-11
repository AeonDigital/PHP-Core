<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tBoolArray as tBoolArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Bool Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fBoolArray extends tBoolArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
