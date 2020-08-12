<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Commom;

use AeonDigital\Objects\Types\Commom\tRONDoubleArray as tRONDoubleArray;
use AeonDigital\Interfaces\Objects\Data\iFieldArray as iFieldArray;







/**
 * Campo ``ReadOnly Nullable Signed Double Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fRONDoubleArray extends tRONDoubleArray implements iFieldArray
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldArrayConstructor;
}
