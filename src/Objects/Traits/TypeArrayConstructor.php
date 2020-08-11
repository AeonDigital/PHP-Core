<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Traits;

use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;








/**
 * Construtor padrão para os ``iTypeArray``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait TypeArrayConstructor
{


    /**
     * Inicia uma nova instância.
     *
     * @param       ?iterable $value
     *              Valor inicial da instância.
     *
     * @param       mixed $valueDefault
     *              Não usado em tipos ``array``.
     *              Mantido no construtor para que a assinatura de ambas familias
     *              sejam identicas.
     *
     * @param       int|float|Realtype|\DateTime $valueMin
     *              Menor valor aceitável para esta instância.
     *              Se não for definido usará o valor existente em ``MIN`` da classe
     *              ``Standart`` original.
     *
     * @param       int|float|Realtype|\DateTime $valueMax
     *              Maior valor aceitável para esta instância.
     *              Se não for definido usará o valor existente em ``MAX`` da classe
     *              ``Standart`` original.
     *
     * @param       ?array $enumerator
     *              Coleção de valores que este campo está apto a assumir.
     *
     * O ``array`` pode ser unidimensional ou multidimensional, no caso de ser
     * multidimensional, cada entrada deverá ser um novo ``array`` com 2 posições onde a
     * primeira será o valor real do campo e o segundo, um ``label`` para o mesmo.
     *
     * Para o valor dos dados aceitáveis use sempre representações em ``string``.
     *
     * ``` php
     *      // Exemplo de definição
     *      $arr = [
     *          ["RS", "Rio Grande do Sul"],
     *          ["SC", "Santa Catarina"],
     *          ["PR", "Paraná"]
     *      ];
     * ```
     *
     * @param       ?array|?string $inputFormat
     *              Nome completo de uma classe que implemente a interface
     *              ``AeonDigital\DataFormat\Interfaces\iFormat`` OU
     *              ``array associativo`` compatível com o exemplo abaixo.
     *
     * ``` php
     *      $arr = [
     *          // string   Nome deste tipo de transformação.
     *          "name" => ,
     *
     *          // int      Tamanho mínimo que uma string pode ter para ser aceita por este formato.
     *          "minLength" => ,
     *
     *          // int      Tamanho máximo que uma string pode ter para ser aceita por este formato.
     *          "maxLength" => ,
     *
     *          // callable Função que valida a string para o tipo de formatação a ser definida.
     *          "check" => ,
     *
     *          // callable Função que remove a formatação padrão.
     *          "removeFormat" => ,
     *
     *          // callable Função que efetivamente formata a string para seu formato final.
     *          "format" => ,
     *
     *          // callable Função que converte o valor para seu formato de armazenamento.
     *          "storageFormat" =>
     *      ];
     * ```
     */
    function __construct(
        ?iterable $value = [],
        $valueDefault = null,
        $valueMin = null,
        $valueMax = null,
        ?array $enumerator = null,
        $inputFormat = null
    ) {
        parent::__construct(undefined, null, $valueMin, $valueMax, $enumerator, $inputFormat);
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
        $cfg["value"] = ((\key_exists("value", $cfg) === true) ? $cfg["value"] : []);

        return new self(
            $cfg["value"],
            null,
            ((\key_exists("valueMin", $cfg) === true)       ? $cfg["valueMin"]      : null),
            ((\key_exists("valueMax", $cfg) === true)       ? $cfg["valueMax"]      : null),
            ((\key_exists("enumerator", $cfg) === true)     ? $cfg["enumerator"]    : null),
            ((\key_exists("inputFormat", $cfg) === true)    ? $cfg["inputFormat"]   : null)
        );
    }
}
