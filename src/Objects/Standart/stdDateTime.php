<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iDateTime as iDateTime;
use AeonDigital\Objects\Standart\Abstracts\aGeneralDateTime as aGeneralDateTime;







/**
 * Define um ``Standart`` para o tipo ``DateTime``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdDateTime extends aGeneralDateTime implements iDateTime
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      mixed
     */
    public static function nullEquivalent() : \DateTime
    {
        if (isset(self::$stdNull) === false) {
            self::$stdNull = new \DateTime("0001-01-01 00:00:00");
        }
        return self::$stdNull;
    }
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public static function min() : \DateTime
    {
        if (isset(self::$stdMin) === false) {
            self::$stdMin = new \DateTime("-9999-12-31 23:59:59");
        }
        return self::$stdMin;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public static function max() : \DateTime
    {
        if (isset(self::$stdMax) === false) {
            self::$stdMax = new \DateTime("9999-12-31 23:59:59");
        }
        return self::$stdMax;
    }
}
