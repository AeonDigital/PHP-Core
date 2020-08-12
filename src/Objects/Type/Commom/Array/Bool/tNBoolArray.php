<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Commom;

use AeonDigital\Objects\Types\Commom\tNBool as tNBool;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``Nullable Bool Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tNBoolArray extends tNBool implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
    use \AeonDigital\Objects\Traits\TypeArrayConstructor;
}