<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iLong as iLong;
use AeonDigital\Objects\Types\Abstracts\aNumericInteger as aNumericInteger;
use AeonDigital\Objects\Standart\stdLong as stdLong;






/**
 * Classe concreta para o tipo ``long`` (inteiro de 16 bits).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpLong extends aNumericInteger implements iLong
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdLong::class;
    }
}
