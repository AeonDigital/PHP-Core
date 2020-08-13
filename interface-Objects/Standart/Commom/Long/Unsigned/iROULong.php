<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPLongUnsigned as iPLongUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart ReadOnly Unsigned Long`` (inteiro de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iROULong extends iPLongUnsigned, iReadOnly, iNotNullable
{
}
