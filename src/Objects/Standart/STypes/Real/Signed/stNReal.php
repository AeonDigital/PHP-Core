<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\SType;

use AeonDigital\Interfaces\Objects\Standart\SType\iNReal as iNReal;
use AeonDigital\Objects\Standart\Abstracts\aNumericReal as aNumericReal;
use AeonDigital\Objects\Realtype as Realtype;






/**
 * ``Standart Nullable Real`` (números reais).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stNReal extends aNumericReal implements iNReal
{
    protected static Realtype $stdMIN;
    protected static Realtype $stdMAX;
    protected static Realtype $stdNULL;
}
