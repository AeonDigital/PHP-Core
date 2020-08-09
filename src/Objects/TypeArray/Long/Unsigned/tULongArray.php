<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Objects\Types\tULong as tULong;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``Signed Nullable Long Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tULongArray extends tULong implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
}
