<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tFloatArray as tFloatArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Float Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fFloatArray extends tFloatArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
