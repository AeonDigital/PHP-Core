<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Commom\iRONUReal as iRONUReal;
use AeonDigital\Objects\Standart\Abstracts\aNumericReal as aNumericReal;
use AeonDigital\Objects\Realtype as Realtype;






/**
 * ``Standart ReadOnly Nullable Unsigned Real`` (números reais).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class scRONUReal extends aNumericReal implements iRONUReal
{
    protected static Realtype $stdMIN;
    protected static Realtype $stdMAX;
    protected static Realtype $stdNULL;
}
