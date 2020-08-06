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
    public static function getStandart() : string
    {
        return stdLong::class;
    }





    /**
     * Retorna uma instância definida com as propriedades definidas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iType
     */
    public static function fromArray(array $cfg) : self
    {
        return static::sttFromArray(self::class, $cfg);
    }
}
