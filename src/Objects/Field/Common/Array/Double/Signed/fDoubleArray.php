<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Commom;

use AeonDigital\Objects\Types\Commom\tDoubleArray as tDoubleArray;
use AeonDigital\Interfaces\Objects\Data\iFieldArray as iFieldArray;







/**
 * Campo ``Signed Double Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fDoubleArray extends tDoubleArray implements iFieldArray
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldArrayConstructor;
}
