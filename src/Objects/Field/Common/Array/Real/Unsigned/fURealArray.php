<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Commom;

use AeonDigital\Objects\Types\Commom\tURealArray as tURealArray;
use AeonDigital\Interfaces\Objects\iFieldArray as iFieldArray;







/**
 * Campo ``Unsigned Real Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fURealArray extends tURealArray implements iFieldArray
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldArrayConstructor;
}
