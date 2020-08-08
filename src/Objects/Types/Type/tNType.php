<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Objects\Types\Abstracts\aClass as aClass;
use AeonDigital\Objects\Standart\SType\stNType as stClass;







/**
 * Tipo ``Nullable Type``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tNType extends aClass
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
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     */
    function __construct(
        $value = undefined
    ) {
        parent::__construct($value, "AeonDigital\Interfaces\Objects\iType");
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
    public static function fromArray(array $cfg) : self
    {
        return static::sttFromArray(self::class, $cfg);
    }
}
