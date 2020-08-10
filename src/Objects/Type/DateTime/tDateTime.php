<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Objects\Types\Abstracts\aDateTime as aDateTime;
use AeonDigital\Objects\Standart\SType\stDateTime as stClass;
use AeonDigital\Interfaces\Objects\iType as iType;






/**
 * Tipo ``DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tDateTime extends aDateTime
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function getStandart() : string
    {
        return stClass::class;
    }
    /**
     * Retorna uma instância definida com as propriedades indicadas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iType
     */
    public static function fromArray(array $cfg) : iType
    {
        return static::sttFromArray(self::class, $cfg);
    }
}
