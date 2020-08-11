<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tByte as tByte;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Byte``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fByte extends tByte implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
