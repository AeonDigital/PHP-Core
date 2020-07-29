<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iShort as iShort;
use AeonDigital\Objects\Types\Abstracts\aNumericInteger as aNumericInteger;
use AeonDigital\Objects\Standart\stdShort as stdShort;






/**
 * Classe concreta para o tipo ``short`` (inteiro de 16 bits).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpShort extends aNumericInteger implements iShort
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdShort::class;
    }
}
