<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Commom;

use AeonDigital\Objects\Types\Abstracts\aNumericFloating as aNumericFloating;
use AeonDigital\Objects\Standart\Commom\scNUDouble as scClass;
use AeonDigital\Interfaces\Objects\iType as iType;






/**
 * Tipo ``Nullable Unsigned Double``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tNUDouble extends aNumericFloating
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function getStandart() : string
    {
        return scClass::class;
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