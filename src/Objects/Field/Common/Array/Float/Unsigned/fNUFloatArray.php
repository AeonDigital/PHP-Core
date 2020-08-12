<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Commom;

use AeonDigital\Objects\Types\Commom\tNUFloatArray as tNUFloatArray;
use AeonDigital\Interfaces\Objects\Data\iFieldArray as iFieldArray;







/**
 * Campo ``Nullable Unsigned Float Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNUFloatArray extends tNUFloatArray implements iFieldArray
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldArrayConstructor;
}
