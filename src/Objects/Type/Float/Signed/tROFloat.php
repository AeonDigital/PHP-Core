<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Objects\Types\Abstracts\aNumericFloating as aNumericFloating;
use AeonDigital\Objects\Standart\SType\stROFloat as stClass;
use AeonDigital\Interfaces\Objects\iType as iType;






/**
 * Tipo ``ReadOnly Signed Float``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tROFloat extends aNumericFloating
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
