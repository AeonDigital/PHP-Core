<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tNString as tNString;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Nullable String``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNString extends tNString implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
