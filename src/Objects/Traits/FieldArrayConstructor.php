<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Traits;

use AeonDigital\Interfaces\Objects\Data\iFieldArray as iFieldArray;








/**
 * Construtor padrão para os ``iFieldArray``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait FieldArrayConstructor
{



    /**
     * Inicia um novo campo de dados.
     *
     * @param       string $name
     *              Nome do campo.
     *
     * @param       string $description
     *              Descrição do campo (opcional).
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     *
     * @param       mixed $valueDefault
     *              Valor padrão a ser definido para este tipo de instância caso nenhum
     *              valor válido tenha sido explicitamente definido.
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
     *
     * @throws      \InvalidArgumentException
     *              Caso algum valor passado não seja válido.
     */
    function __construct(
        string $name,
        string $description = "",
        ?iterable $value = [],
        $valueDefault = null,
        $valueMin = null,
        $valueMax = null,
        ?array $enumerator = null,
        ?string $inputFormat = null
    ) {
        \preg_match("/^[a-zA-Z0-9_]+$/", $name, $fnd);
        if (\count($fnd) === 0) {
            $err = "Invalid value defined for \"name\". Expected string that matches the ``a-zA-Z0-9_`` pattern. Given: [ $name ]";
            throw new \InvalidArgumentException($err);
        }
        $this->name = $name;
        $this->description = $description;


        parent::__construct(
            $value,
            $valueDefault,
            $valueMin,
            $valueMax,
            $enumerator,
            $inputFormat
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
     * @return      iFieldArray
     */
    public static function fromArray(array $cfg) : iFieldArray
    {
        return new self(
            ((\key_exists("name", $cfg) === true)           ? $cfg["name"]          : ""),
            ((\key_exists("description", $cfg) === true)    ? $cfg["description"]   : ""),
            ((\key_exists("value", $cfg) === true)          ? $cfg["value"]         : []),
            ((\key_exists("valueDefault", $cfg) === true)   ? $cfg["valueDefault"]  : null),
            ((\key_exists("valueMin", $cfg) === true)       ? $cfg["valueMin"]      : null),
            ((\key_exists("valueMax", $cfg) === true)       ? $cfg["valueMax"]      : null),
            ((\key_exists("enumerator", $cfg) === true)     ? $cfg["enumerator"]    : null),
            ((\key_exists("inputFormat", $cfg) === true)    ? $cfg["inputFormat"]   : null)
        );
    }
}
