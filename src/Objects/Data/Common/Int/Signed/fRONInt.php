<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tRONInt as tRONInt;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``ReadOnly Nullable Signed Int``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fRONInt extends tRONInt implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
