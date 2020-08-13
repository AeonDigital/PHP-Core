<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Complex;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPField as iPField;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart ReadOnly Nullable Field``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iRONField extends iPField, iReadOnly, iNullable
{
}
