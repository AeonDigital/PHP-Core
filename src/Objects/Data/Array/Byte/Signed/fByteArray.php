<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tByteArray as tByteArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Byte Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fByteArray extends tByteArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
