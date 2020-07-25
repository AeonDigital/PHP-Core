<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iByte as iByte;
use AeonDigital\Objects\Standart\Abstracts\aNumericInteger as aNumericInteger;







/**
 * Define um ``Standart`` para o tipo ``byte`` (inteiro de 8 bits).
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdByte extends aNumericInteger implements iByte
{



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      int
     */
    public static function min() : int
    {
        return (int)-128;
    }



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      int
     */
    public static function max() : int
    {
        return (int)127;
    }
}
