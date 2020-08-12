<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Commom;

use AeonDigital\Objects\Types\Commom\tRONReal as tRONReal;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``ReadOnly Nullable Signed Real``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fRONReal extends tRONReal implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldCommomConstructor;
}
