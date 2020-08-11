<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tNInt as tNInt;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Nullable Signed Int``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNInt extends tNInt implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
