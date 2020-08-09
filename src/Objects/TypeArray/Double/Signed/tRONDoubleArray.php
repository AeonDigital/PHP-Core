<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Objects\Types\tRONDouble as tRONDouble;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``ReadOnly Nullable Signed Double Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tRONDoubleArray extends tRONDouble implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
}
