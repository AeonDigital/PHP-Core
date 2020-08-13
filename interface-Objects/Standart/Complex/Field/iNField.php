<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Complex;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPField as iPField;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart Nullable Field``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNField extends iPField, iReadWrite, iNullable
{
}
