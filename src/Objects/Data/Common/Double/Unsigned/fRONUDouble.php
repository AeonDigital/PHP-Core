<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tRONUDouble as tRONUDouble;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``ReadOnly Nullable Unsigned Double``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fRONUDouble extends tRONUDouble implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
