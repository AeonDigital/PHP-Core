<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Traits;

use AeonDigital\Interfaces\Objects\Data\iField as iField;








/**
 * Implementa a solução ``fromArray`` para os campos do tipo ``iField``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait FieldArrayStaticFromArray
{



    /**
     * Retorna uma instância definida com as propriedades indicadas no
     * ``array`` de configuração.
     *
     * @param       string $useType
     *              Namespace completa do tipo que deve ser instanciado.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iField
     */
    protected static function sttFromArray(string $useType, array $cfg) : iField
    {
        return new $useType(
            ((\key_exists("name", $cfg) === true)           ? $cfg["name"]          : ""),
            ((\key_exists("description", $cfg) === true)    ? $cfg["description"]   : ""),
            ((\key_exists("value", $cfg) === true)          ? $cfg["value"]         : undefined),
            ((\key_exists("valueDefault", $cfg) === true)   ? $cfg["valueDefault"]  : null),
            ((\key_exists("valueMin", $cfg) === true)       ? $cfg["valueMin"]      : null),
            ((\key_exists("valueMax", $cfg) === true)       ? $cfg["valueMax"]      : null),
            ((\key_exists("enumerator", $cfg) === true)     ? $cfg["enumerator"]    : null),
            ((\key_exists("inputFormat", $cfg) === true)    ? $cfg["inputFormat"]   : null)
        );
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
