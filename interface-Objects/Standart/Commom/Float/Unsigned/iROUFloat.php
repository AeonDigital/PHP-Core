<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPFloatUnsigned as iPFloatUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart ReadOnly Unsigned Float`` (flutuante de 32 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iROUFloat extends iPFloatUnsigned, iReadOnly, iNotNullable
{
}
