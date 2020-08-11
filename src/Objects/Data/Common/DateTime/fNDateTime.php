<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tNDateTime as tNDateTime;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Nullable DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNDateTime extends tNDateTime implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
