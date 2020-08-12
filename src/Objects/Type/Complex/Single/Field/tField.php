<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Complex;

use AeonDigital\Objects\Types\Abstracts\aClass as aClass;
use AeonDigital\Objects\Standart\Complex\scField as scClass;
use AeonDigital\Interfaces\Objects\iField as iField;






/**
 * Tipo ``Field``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tField extends aClass
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
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     */
    function __construct(
        $value = undefined
    ) {
        parent::__construct($value, "AeonDigital\Interfaces\Objects\iField");
    }
    /**
     * Retorna uma instância definida com as propriedades indicadas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iField
     */
    public static function fromArray(array $cfg) : iField
    {
        return static::sttFromArray(self::class, $cfg);
    }
}
