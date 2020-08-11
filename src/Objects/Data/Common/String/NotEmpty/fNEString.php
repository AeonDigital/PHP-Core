<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tNEString as tNEString;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Not Empty String``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNEString extends tNEString implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
