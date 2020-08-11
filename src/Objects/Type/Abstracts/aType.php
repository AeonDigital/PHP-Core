<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Interfaces\Objects\iType as iType;
use AeonDigital\Objects\Tools as Tools;
use AeonDigital\Objects\BObject as BObject;






/**
 * Classe básica para tipos ``iType`` concretos.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aType extends BObject implements iType
{



    /**
     * Valor atual da instância.
     *
     * Se existir um ``inputFormat`` definido, aplicará o formato definido
     * para o valor atualmente setado (exceto se for ``null``).
     *
     * @var         mixed
     */
    protected $value = null;
    /**
     * Valor atual da instância no mesmo tipo e formato que foi passado
     * para o método ``set``.
     *
     * @var         mixed
     */
    protected $valueRaw = null;



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum
     * valor válido tenha sido explicitamente definido.
     *
     * @var         mixed
     */
    protected $valueDefault = null;
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * @var         ?int|float|Realtype|\DateTime $min
     */
    protected $valueMin = null;
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * @var         ?int|float|Realtype|\DateTime $max
     */
    protected $valueMax = null;
    /**
     * coleção de valores que este campo está apto a assumir.
     *
     * @var         ?array
     */
    protected ?array $enumerator = null;
    /**
     * Array associativo que armazena as principais funções que uma definição de formato
     * de entrada deve ter.
     *
     * @var         ?array
     */
    protected ?array $inputFormat = null;





    /**
     * Namespace completo da classe usada por esta instância.
     *
     * @var         string
     */
    protected string $type = "";
    /**
     * Retorna o namespace completo da classe usada por esta instância.
     *
     * Em classes de tipo invariável retornará o mesmo resultado obtido pelo
     * método ``static::standart()``.
     *
     * @return      string
     */
    public function getType() : string
    {
        return $this->type;
    }





    /**
     * Indica quando o tipo de valor aceito é do tipo ``iterable``.
     *
     * @var         bool
     */
    protected bool $iterable = false;
    /**
     * Informa quando tratar-se de uma instância que lida com ``arrays`` de valores.
     *
     * @return      bool
     */
    public function isIterable() : bool
    {
        return $this->iterable;
    }





    /**
     * Informa se esta instância aceita ``null`` como válido.
     * Mesmo valor encontrado na constante ``NULLABLE`` do ``Standart`` utilizado.
     *
     * @return      bool
     */
    public function isAllowNull() : bool
    {
        return $this->getStandart()::NULLABLE;
    }
    /**
     * Informa se esta instância é ``readonly``.
     * Mesmo valor encontrado na constante ``READONLY`` do ``Standart`` utilizado.
     *
     * @return      bool
     */
    public function isReadOnly() : bool
    {
        return $this->getStandart()::READONLY;
    }
    /**
     * Informa se esta instância aceita ``""`` como um valor válido.
     * Mesmo valor encontrado na constante ``EMPTY`` do ``Standart`` utilizado.
     *
     * @return      ?bool
     */
    public function isAllowEmpty() : ?bool
    {
        return $this->getStandart()::EMPTY;
    }





    //
    // Implementados em classes concretas
    //
    // static function getStandart();
    // static function fromArray();
    //
    // Implementadas em classes intermediárias
    //
    // function getNullEquivalent();
    // function getDefault();
    // function getMin();
    // function getMax();
    // function get();
    // function getNotNull();
    //





    /**
     * Em tipos ``String`` retorna o maior número de caracteres aceitável para validar
     * o valor. Trata-se do mesmo número indicado em ``$this->getMax()``
     *
     * @return      ?int
     */
    public function getLength() : ?int
    {
        $r = null;
        if ($this->getStandart()::TYPE === "String") {
            $r = $this->getMax();
        }
        return $r;
    }




    /**
     * Retorna um ``array`` com a coleção de valores que este campo está apto a assumir.
     * Os valores aqui pré-definidos devem seguir as regras de validade especificadas.
     *
     * @param       bool $onlyValues
     *              Quando ``true``, retorna um ``array`` unidimensional contendo apenas
     *              os valores sem seus respectivos ``labels``.
     *
     * @return      ?array
     */
    public function getEnumerator(bool $onlyValues = false) : ?array
    {
        return static::sttGetEnumerator($this->enumerator, $onlyValues);
    }
    /**
     * Resolução ``static`` para ``$this->getEnumerator()``.
     *
     * @param       ?array $enumerator
     * @param       bool $onlyValues
     *
     * @return      ?array
     */
    protected static function sttGetEnumerator(
        ?array $enumerator,
        bool $onlyValues = false
    ) : ? array {
        $arr = $enumerator;
        if ($enumerator !== null && $onlyValues === true) {
            $nArr = [];
            foreach ($enumerator as $enum) {
                if (\is_array($enum) === true) {
                    $nArr[] = $enum[0];
                }
            }
            $arr = $nArr;
        }
        return $arr;
    }



    /**
     * Retorna o nome da classe que determina o formato de entrada que o valor a ser
     * armazenado pode assumir
     * **OU**
     * retorna o nome de uma instrução especial de transformação de caracteres para
     * campos do tipo ``string``.
     *
     * @return      ?string
     */
    public function getInputFormat() : ?string
    {
        return (($this->inputFormat === null) ? null : $this->inputFormat["name"]);
    }
    /**
     * Define um formato para a informação armazenada neste campo.
     *
     * @param       ?array|?string $inputFormat
     *              Nome completo de uma classe que implemente a interface
     *              ``AeonDigital\DataFormat\Interfaces\iFormat`` OU
     *               ``array associativo`` compatível com o exemplo abaixo.
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
     * @return      ?array
     *              Retorna um ``array associativo`` com os dados informados ou ``null``
     *              caso as informações passadas não sejam válidas.
     */
    protected static function sttInputFormat($inputFormat) : ?array
    {
        $r = null;

        if (\is_array($inputFormat) === true) {
            if (\key_exists("name", $inputFormat) === true &&
                \key_exists("minLength", $inputFormat) === true &&
                ($inputFormat["minLength"] === null || $inputFormat["minLength"] >= 0) &&
                \key_exists("maxLength", $inputFormat) === true &&
                ($inputFormat["maxLength"] === null || $inputFormat["maxLength"] >= 0) &&
                \key_exists("check", $inputFormat) === true &&
                \is_callable($inputFormat["check"]) === true &&
                \key_exists("removeFormat", $inputFormat) === true &&
                \is_callable($inputFormat["removeFormat"]) === true &&
                \key_exists("format", $inputFormat) === true &&
                \is_callable($inputFormat["format"]) === true &&
                \key_exists("storageFormat", $inputFormat) === true &&
                \is_callable($inputFormat["storageFormat"]) === true
            ) {
                if (($inputFormat["minLength"] !== null && $inputFormat["maxLength"] !== null) &&
                    ($inputFormat["minLength"] <= $inputFormat["maxLength"])) {
                    $r = [
                        "name"          => \strtoupper($inputFormat["name"]),
                        "minLength"     => (
                            ($inputFormat["minLength"] === null) ? null : (int)$inputFormat["minLength"]),
                        "maxLength"     => (
                            ($inputFormat["maxLength"] === null) ? null : (int)$inputFormat["maxLength"]),
                        "check"         => $inputFormat["check"],
                        "removeFormat"  => $inputFormat["removeFormat"],
                        "format"        => $inputFormat["format"],
                        "storageFormat" => $inputFormat["storageFormat"]
                    ];
                }
            }
        }
        elseif (\is_string($inputFormat) === true) {
            if (\class_exists($inputFormat) === false) {
                $inputFormat = "AeonDigital\\DataFormat\\Patterns\\" . \str_replace(".", "\\", $inputFormat);
            }

            $interfaces = \class_implements($inputFormat);
            if(\is_array($interfaces) === true &&
                \in_array("AeonDigital\\Interfaces\\DataFormat\\iFormat", $interfaces))
            {
                $r = [
                    "name"          => $inputFormat,
                    "minLength"     => $inputFormat::MinLength,
                    "maxLength"     => $inputFormat::MaxLength,
                    "check"         => $inputFormat . "::check",
                    "removeFormat"  => $inputFormat . "::removeFormat",
                    "format"        => $inputFormat . "::format",
                    "storageFormat" => $inputFormat . "::storageFormat"
                ];
            }
        }

        return $r;
    }





    /**
     * Indica se esta instância ainda não recebeu algum valor válido de forma explicita.
     *
     * @var         bool
     */
    protected bool $undefined = true;
     /**
     * Retornará ``true`` enquanto nenhum valor for definido para
     * esta instância de forma explicita.
     *
     * @return      bool
     */
    public function isUndefined() : bool
    {
        return $this->undefined;
    }
     /**
     * Retornará ``true`` a partir do momento em que um valor for
     * explicitamente definido e aceito para esta instância.
     *
     * @return      bool
     */
    public function isDefined() : bool
    {
        return !$this->undefined;
    }
    /**
     * Informa se o valor atualmente definido é o mesmo que ``NULL_EQUIVALENT``.
     * Retornará ``false`` caso o valor seja ``null``.
     *
     * Usado apenas em casos onde ``$this->isIterable() = false``.
     * Se ``isIterable = true`` deve retornar ``false``.
     *
     * @return      bool
     */
    public function isNullEquivalent() : bool
    {
        return static::sttCheckNullEquivalent(
            $this->value, $this->iterable, true,
            static::getStandart()::getNullEquivalent()
        );
    }
    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``static::getNullEquivalent()``.
     *
     * Usado apenas em casos onde ``$this->isIterable() = false``.
     * Se ``isIterable = true`` deve retornar sempre ``false``.
     *
     * @return      bool
     */
    public function isNullOrEquivalent() : bool
    {
        return static::sttCheckNullEquivalent(
            $this->value, $this->iterable, false,
            static::getStandart()::getNullEquivalent()
        );
    }
    /**
     * Resolução ``static`` para ``$this->isNullEquivalent()`` e ``$this->isNullOrEquivalent()``.
     *
     * @param       bool $isIterable
     * @param       bool $strictNull
     * @param       mixed $nullEquivalent
     *
     * @return      bool
     */
    protected static function sttCheckNullEquivalent(
        $value,
        bool $isIterable,
        bool $strictNull,
        $nullEquivalent
    ) : bool {
        if ($isIterable === true) {
            return false;
        }
        else {
            if (static::getStandart()::IS_CLASS === false) {
                if ($strictNull === true) {
                    return ($value === $nullEquivalent);
                }
                else {
                    return ($value === null || $value === $nullEquivalent);
                }
            }
            else {

                switch (static::getStandart()::TYPE) {
                    case "Bool":
                    case "Byte":
                    case "Short":
                    case "Int":
                    case "Long":
                    case "Float":
                    case "Double":
                    case "AeonDigital\Objects\Realtype":
                    case "DateTime":
                    case "String":
                        if ($strictNull === true) {
                            return (static::getStandart()::toString($value) === static::getStandart()::NULL_EQUIVALENT);
                        }
                        else {
                            return (
                                $value === null ||
                                static::getStandart()::toString($value) === static::getStandart()::NULL_EQUIVALENT
                            );
                        }
                        break;

                    case "iPGeneric":
                    case "AeonDigital\Interfaces\Objects\iType":
                    default:
                        return ($value === null);
                        break;
                }
            }
        }
    }





    /**
     * Armazena o último erro encontrado ao tentar definir um valor para
     * esta instância.
     *
     * @var         string
     */
    protected string $lastValidateError = "";
    /**
     * Verifica se o valor indicado satisfaz os critérios de aceitação para este campo.
     *
     * @param       mixed $v
     *              Valor que será testado.
     *
     * @return      bool
     */
    public function validateValue($v) : bool
    {
        $this->lastValidateError = "";

        static::getStandart()::parseIfValidate(
            $v, $this->lastValidateError,
            $this->getMin(), $this->getMax(),
            $this->getEnumerator(true),
            $this->inputFormat
        );

        return ($this->lastValidateError === "");
    }
    /**
     * Retorna o último código de erro encontrado ao tentar definir ou validar um valor
     * para a instância. ``""`` será retornado caso não existam erros.
     *
     * @return      string
     */
    public function getLastValidateError() : string
    {
        return $this->lastValidateError;
    }




    /**
     * Define um novo valor para a instância.
     *
     * Usado apenas em casos onde ``$this->isIterable() = false``.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     *
     * @return      bool
     */
    public function set($v) : bool
    {
        return (($this->iterable === false) ? $this->protectedSet($v) : false);
    }
    /**
     * Define um novo valor para a instância internamente.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     */
    protected function protectedSet($v) : bool
    {
        $r = false;
        $this->lastValidateError = "";

        if ($this->isReadOnly() === true && $this->undefined === false) {
            $this->lastValidateError = "error.obj.type.readonly";
        }
        else {
            $n = static::getStandart()::parseIfValidate(
                $v, $this->lastValidateError,
                $this->getMin(), $this->getMax(),
                $this->getEnumerator(true),
                $this->inputFormat
            );

            if ($this->lastValidateError === "") {
                $r = true;
                $this->value = (
                    (($n === null) ? null : (($this->inputFormat === null) ? $n : $this->inputFormat["format"]($n)))
                );
                $this->valueRaw = $v;
                $this->undefined = false;
            }
        }

        return $r;
    }





    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Se existir um ``inputFormat`` definido, aplicará o formato definido
     * para o valor atualmente setado (exceto se for ``null``).
     *
     * Usado apenas em casos onde ``$this->isIterable() = false``.
     *
     * @return      mixed
     */
    protected function protectedGet()
    {
        return $this->value;
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``NULL_EQUIVALENT``.
     *
     * Se existir um ``inputFormat`` definido, aplicará o formato definido
     * para o valor atualmente setado (exceto se for ``null``).
     *
     * Usado apenas em casos onde ``$this->isIterable() = false``.
     *
     * @return      mixed
     */
    protected function protectedGetNotNull()
    {
        return ($this->value ?? static::getStandart()::getNullEquivalent());
    }
    /**
     * Retorna o valor atualmente definido em seu formato de armazenamento.
     *
     * Apenas terá um efeito se um ``inputFormat`` estiver definido, caso contrário
     * retornará o mesmo valor existente em ``get``.
     *
     * @return      mixed
     */
    public function getStorageValue()
    {
        return (($this->inputFormat === null) ? $this->value : $this->inputFormat["storageFormat"]($this->value));
    }
    /**
     * Retorna o valor atualmente definido em seu formato ``raw`` que é aquele
     * que foi passado na execução do método ``set``.
     *
     * @return      mixed
     */
    public function getRawValue()
    {
        return $this->valueRaw;
    }











    /**
     * Inicia uma nova instância.
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
     */
    function __construct(
        $value = undefined,
        $valueDefault = null,
        $valueMin = null,
        $valueMax = null,
        ?array $enumerator = null,
        $inputFormat = null
    ) {
        $this->type = (($this->type === "") ? static::getStandart()::TYPE : $this->type);
        $this->valueDefault = (($valueDefault === undefined) ? null : $valueDefault);
        $this->enumerator = $enumerator;
        $this->inputFormat = static::sttInputFormat($inputFormat);

        if (static::getStandart()::HAS_LIMIT === true) {
            $this->valueMin = $valueMin ?? static::getStandart()::getMin();
            $this->valueMax = $valueMax ?? static::getStandart()::getMax();

            if (static::getStandart()::TYPE === "String") {
                if ($this->valueMin === 0) { $this->valueMin = null; }
                if ($this->valueMax === 0) { $this->valueMax = null; }

                if ($this->inputFormat !== null) {
                    $this->valueMin === $this->inputFormat["minLength"];
                    $this->valueMax === $this->inputFormat["maxLength"];
                }
            }
        }

        $undefined = ($value === undefined || $value === null || $value === "");
        $realDefault = (($this->isAllowNull() === true) ? null : static::getStandart()::getNullEquivalent());
        if ($value === undefined || $value === "") {
            $value = (($valueDefault === null) ? $realDefault : $valueDefault);
        }
        elseif ($value === null) {
            $value = $realDefault;
        }


        if ($this->set($value) === false) {
            $this->value = $realDefault;
        }

        $this->undefined = $undefined;
    }





    /**
     * Converte o valor atualmente definido para uma ``string``.
     *
     * Usado apenas em casos onde ``$this->isIterable() = false``.
     * Se ``isIterable = true`` deve retornar sempre ``""``.
     *
     * @return      string
     */
    public function toString() : string
    {
        if ($this->isIterable() === true) {
            return "";
        }
        else {
            $v = $this->value;
            if (static::getStandart()::TYPE === "Bool") { $v = Tools::toBool($v); }
            return Tools::toString($v);
        }
    }



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
     * @return      iType
     */
    protected static function sttFromArray(string $useType, array $cfg) : iType
    {
        return new $useType(
            ((\key_exists("value", $cfg) === true)          ? $cfg["value"]         : undefined),
            ((\key_exists("valueDefault", $cfg) === true)   ? $cfg["valueDefault"]  : null),
            ((\key_exists("valueMin", $cfg) === true)       ? $cfg["valueMin"]      : null),
            ((\key_exists("valueMax", $cfg) === true)       ? $cfg["valueMax"]      : null),
            ((\key_exists("enumerator", $cfg) === true)     ? $cfg["enumerator"]    : null),
            ((\key_exists("inputFormat", $cfg) === true)    ? $cfg["inputFormat"]   : null),
            ((\key_exists("type", $cfg) === true)           ? $cfg["type"]          : null)
        );
    }
}
