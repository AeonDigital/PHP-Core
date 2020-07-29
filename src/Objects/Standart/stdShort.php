<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iShort as iShort;
use AeonDigital\Objects\Standart\Abstracts\aNumericInteger as aNumericInteger;







/**
 * Define um ``Standart`` para o tipo ``short`` (inteiro de 16 bits).
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdShort extends aNumericInteger implements iShort
{



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      int
     */
    public static function min() : int
    {
        return (int)-32768;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      int
     */
    public static function max() : int
    {
        return (int)32767;
    }
}
