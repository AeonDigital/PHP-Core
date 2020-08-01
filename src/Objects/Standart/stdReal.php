<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iReal as iReal;
use AeonDigital\Objects\Standart\Abstracts\aNumericReal as aNumericReal;
use AeonDigital\Objects\Realtype as Realtype;






/**
 * Define um ``Standart`` para o tipo ``Realtype``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdReal extends aNumericReal implements iReal
{



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      Realtype
     */
    public static function getMin() : Realtype
    {
        if (isset(self::$stdMin) === false) {
            self::$stdMin = new Realtype("-999999999999999999999999999999999999");
        }
        return self::$stdMin;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      Realtype
     */
    public static function getMax() : Realtype
    {
        if (isset(self::$stdMax) === false) {
            self::$stdMax = new Realtype("999999999999999999999999999999999999");
        }
        return self::$stdMax;
    }
}
