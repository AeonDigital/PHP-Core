<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPRealUnsigned as iPRealUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart ReadOnly Nullable Unsigned Real`` (números reais).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iRONUReal extends iPRealUnsigned, iReadOnly, iNullable
{
}
