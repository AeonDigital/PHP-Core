<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Traits;

use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;








/**
 * Construtor padrão para os ``iTypeArray`` de tipos ``iPGeneric``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait TypeArrayGenericConstructor
{


    /**
     * Inicia uma nova instância.
     *
     * @param       ?iterable $value
     *              Valor inicial da instância.
     *
     * @param       string $type
     *              Informa a namespace completa da classe ou interface que os valores
     *              a serem usados por esta instância deverão possuir.
     */
    function __construct(
        ?iterable $value = [],
        string $type
    ) {
        parent::__construct(undefined, $type);
        $this->iterable = true;
        $this->insert($value);
    }







    /**
     * Retorna uma instância definida com as propriedades indicadas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iTypeArray
     */
    public static function fromArray(array $cfg) : iTypeArray
    {
        return new self(
            ((\key_exists("value", $cfg) === true)  ? $cfg["value"] : []),
            ((\key_exists("type", $cfg) === true)   ? $cfg["type"]  : "")
        );
    }
}
