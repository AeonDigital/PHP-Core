<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Complex;

use AeonDigital\Objects\Types\Complex\tRONFieldArray as tRONFieldArray;
use AeonDigital\Interfaces\Objects\iFieldArray as iFieldArray;







/**
 * Campo ``ReadOnly Nullable Field Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fRONFieldArray extends tRONFieldArray implements iFieldArray
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldArrayConstructor;
}
