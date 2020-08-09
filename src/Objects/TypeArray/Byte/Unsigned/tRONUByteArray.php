<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Objects\Types\tRONUByte as tRONUByte;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``ReadOnly Nullable Unsigned Byte Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tRONUByteArray extends tRONUByte implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
}
