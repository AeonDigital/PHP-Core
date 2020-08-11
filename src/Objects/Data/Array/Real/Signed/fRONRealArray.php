<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tRONRealArray as tRONRealArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``ReadOnly Nullable Signed Real Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fRONRealArray extends tRONRealArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
