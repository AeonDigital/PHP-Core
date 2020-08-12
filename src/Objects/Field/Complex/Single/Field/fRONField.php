<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Complex;

use AeonDigital\Objects\Types\Complex\tRONField as tRONField;
use AeonDigital\Interfaces\Objects\iField as iField;







/**
 * Campo ``ReadOnly Nullable Field``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fRONField extends tRONField implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldCommomConstructor;
}