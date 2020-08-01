<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iInt as iInt;
use AeonDigital\Objects\Standart\Abstracts\aNumericInteger as aNumericInteger;







/**
 * Define um ``Standart`` para o tipo ``int`` (inteiro de 32 bits).
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdInt extends aNumericInteger implements iInt
{



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      int
     */
    public static function getMin() : int
    {
        return (int)-2147483648;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      int
     */
    public static function getMax() : int
    {
        return (int)2147483647;
    }
}
