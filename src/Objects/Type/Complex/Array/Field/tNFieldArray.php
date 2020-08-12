<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Complex;

use AeonDigital\Objects\Types\Complex\tNField as tNField;
use AeonDigital\Interfaces\Objects\iFieldArray as iFieldArray;







/**
 * Tipo ``Nullable Field Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tNFieldArray extends tNField implements iFieldArray
{
    use \AeonDigital\Objects\Traits\FieldArray;
    use \AeonDigital\Objects\Traits\FieldArrayConstructor;
}
