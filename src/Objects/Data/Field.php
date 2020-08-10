<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Interfaces\Objects\Data\iField as iField;
use AeonDigital\Objects\Types\tROType as tROType;







/**
 * Classe básica para um campo ``iField``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class Field extends tROType implements iField
{
    use \AeonDigital\Objects\Traits\MainCheckArgumentException;





    /**
     * Nome do campo.
     */
    protected string $name = "";
    /**
     * Define o nome do campo.
     * O nome de um campo apenas pode aceitar caracteres ``a-zA-Z0-9_``.
     *
     * @param       string $n
     *              Nome do campo.
     *
     * @throws      \InvalidArgumentException
     *              Caso o nome indicado seja inválido.
     */
    private function setName(string $n) : void
    {
        $this->mainCheckForInvalidArgumentException(
            "name", $n, [
                [
                    "validate"          => "is string matches pattern",
                    "patternPregMatch"  => "/^[a-zA-Z0-9_]+$/",
                    "errorShowPattern"  => "a-zA-Z0-9_"
                ]
            ]
        );
        $this->name = $n;
    }
    /**
     * Retorna o nome do campo.
     *
     * @return      string
     */
    public function getName() : string
    {
        return $this->name;
    }





    /**
     * Descrição de uso/funcionalidade do campo.
     *
     * @var         string
     */
    private string $description = "";
    /**
     * Define a descrição de uso/funcionalidade do campo.
     *
     * @param       string $d
     *              Descrição do campo.
     *
     * @return      void
     */
    private function setDescription(string $d) : void
    {
        $this->description = $d;
    }
    /**
     * Retorna a descrição de uso/funcionalidade do campo.
     *
     * @return      string
     */
    public function getDescription() : string
    {
        return $this->description;
    }





    /**
     * Array associativo que armazena as principais funções que uma definição de formato
     * de entrada deve ter.
     *
     * @var         ?array
     */
    private ?array $inputFormat = null;
    /**
     * Define um formato para a informação armazenada neste campo.
     *
     * A classe informada deve implementar a interface
     * ``AeonDigital\DataFormat\Interfaces\iFormat``
     * **OU**
     * pode ser passado um ``array`` conforme as definições especificadas abaixo:
     *
     * ``` php
     *      $arr = [
     *          // string   Nome deste tipo de transformação.
     *          "name" => ,
     *
     *          // int      Tamanho máximo que uma string pode ter para ser aceita por este formato.
     *          "length" => ,
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
     * @param       ?array|?string $if
     *              Nome completo da classe a ser usada.
     *
     * @return      void
     *
     * @throws      \InvalidArgumentException
     *              Caso a classe indicada não seja válida.
     */
    private function setInputFormat($if) : void
    {
        if (\is_array($if) === true) {
            $this->mainCheckForInvalidArgumentException(
                "inputFormat", $if,
                [
                    [
                        "validate" => "has array assoc required keys",
                        "requiredKeys" => [
                            "name"          => ["is string not empty"],
                            "length"        => ["is integer greather than zero or null"],
                            "check"         => ["is callable"],
                            "removeFormat"  => ["is callable"],
                            "format"        => ["is callable"],
                            "storageFormat" => ["is callable"]
                        ]
                    ]
                ]
            );


            $this->inputFormat = [
                "name"          => \strtoupper($if["name"]),
                "length"        => (($if["length"] === null) ? null : (int)$if["length"]),
                "check"         => $if["check"],
                "removeFormat"  => $if["removeFormat"],
                "format"        => $if["format"],
                "storageFormat" => $if["storageFormat"]
            ];
        }
        elseif (is_string($if) === true) {
            if (\class_exists($if) === false) {
                $if = "AeonDigital\\DataFormat\\Patterns\\" . \str_replace(".", "\\", $if);
            }

            $this->mainCheckForInvalidArgumentException(
                "inputFormat", $if, [
                    "is class exists",
                    [
                        "validate" => "is class implements interface",
                        "interface" => "AeonDigital\\Interfaces\\DataFormat\\iFormat"
                    ]
                ]
            );


            $this->inputFormat = [
                "name"          => $if,
                "length"        => $if::MaxLength,
                "check"         => $if . "::check",
                "removeFormat"  => $if . "::removeFormat",
                "format"        => $if . "::format",
                "storageFormat" => $if . "::storageFormat"
            ];
        }
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
     * Armazena o estado atual de validade do campo com relação a seu valor definido e
     * seus critérios de funcionamento.
     *
     * @var         bool
     */
    protected bool $fieldState_IsValid = true;
    /**
     * Informa se o campo tem no momento um valor que satisfaz os critérios de validação
     * para o mesmo.
     *
     * @return      bool
     */
    public function isValid() : bool
    {
        return $this->fieldState_IsValid;
    }



    /**
     * Armazena o registro da validação referente ao valor que está atualmente definido
     * para este campo.
     *
     * @var         string|array
     */
    protected $fieldState_CurrentState = "valid";
    /**
     * Retorna o código do estado atual deste campo.
     *
     * **Campos Simples**
     * Retornará ``valid`` caso o valor definido seja válido, ou o código da validação
     * que caracteríza a invalidez deste valor.
     *
     * **Campos "reference"**
     * Retornará ``valid`` se **TODOS** os campos estiverem com valores válidos. Caso
     * contrário retornará um ``array`` associativo contendo o estado de cada um dos campos
     * existêntes.
     *
     * **Campos "collection"**
     * Retornará ``valid`` caso **TODOS** os valores estejam de acordo com os critérios de
     * validação ou um ``array`` contendo a validação individual de cada ítem membro da
     * coleção.
     *
     * @return      string|array
     */
    public function getState()
    {
        return $this->fieldState_CurrentState;
    }



    /**
     * Mantêm os códigos referentes a última validação executada.
     *
     * Este valor é sobrescrito sempre que um método que exige validação for acionado,
     * portanto, sempre conterá o valor da última validação realizada.
     *
     * @var         string|array
     */
    protected $fieldState_ValidateState = "valid";
    /**
     * Retorna o código de estado da última validação realizada.
     *
     * @return      string|array
     */
    public function getLastValidateState()
    {
        return $this->fieldState_ValidateState;
    }





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

    }





    /**
     * Retorna o valor atual deste campo em seu formato de armazenamento.
     *
     * @return      mixed
     */
    public function getStorageValue()
    {

    }





    /**
     * Retorna o valor que está definido para este campo assim como ele foi passado em
     * ``setValue()``.
     *
     * @return      mixed
     */
    public function getRawValue()
    {

    }










    /**
     * Inicia um novo campo de dados.
     *
     * O ``array`` de configuração deve ter a seguinte definição:
     *
     * ``` php
     *      $arr = [
     *          // string           Nome do campo.
     *          "name" => ,
     *
     *          // string           Descrição do campo. (opcional)
     *          "description" => ,
     *
     *          // string           Nome completo de uma classe que implemente a interface "iSimpleType".
     *          //                  OU "ref" para identificar que este campo referencia-se a um outro modelo
     *          //                  de dados.
     *          "type" => ,
     *
     *          // string           Nome completo de uma classe que implemente a interface "iFormat". (opcional)
     *          "inputFormat" => ,
     *
     *          // mixed            Valor mínimo aceito para este campo. (opcional)
     *          //                  Use apenas para casos de campos numéricos ou data/hora.
     *          "min" => ,
     *
     *          // mixed            Valor máximo aceito para este campo. (opcional)
     *          //                  Use apenas para casos de campos numéricos ou data/hora.
     *          "max" => ,
     *
     *          // bool             Indica se "null" é um valor aceito para este campo. (opcional)
     *          "allowNull" => ,
     *
     *          // bool             Indica se "" é um valor aceito para este campo. (opcional)
     *          "allowEmpty" => ,
     *
     *          // bool             Indica se, ao receber um valor "", este deve ser convertido para "null". (opcional)
     *          "convertEmptyToNull" => ,
     *
     *          // bool             Indica se o campo é apenas de leitura.
     *          //                  Neste caso ele poderá ser definido apenas 1 vez e após
     *          //                  isto seu valor não poderá ser alterado. (opcional)
     *          "readOnly" => ,
     *
     *          // mixed            Valor padrão para este campo. (opcional)
     *          "default" => ,
     *
     *          // array|string     Coleção de valores válidos para este campo. (opcional)
     *          //                  Se for definido uma string, deve ser o caminho completo até um arquivo php
     *          //                  que contêm o array a ser utilizado como enumerador.
     *          "enumerator" => ,
     *
     *          // mixed            Valor que inicia com o campo.
     *          "value" => ,
     *      ];
     * ```
     *
     * @param       array $config
     *              ``array`` associativo com as configurações para este campo.
     *
     * @throws      \InvalidArgumentException
     *              Caso algum valor passado não seja válido.
     */
    function __construct(
        string $name,
        string $description,
        string $type,
        bool $readOnly = false,
        bool $allowNull = false,
        bool $unsigned = false,
        bool $allowEmpty = true,
        $value = undefined,
        $valueDefault = null,
        $valueMin = null,
        $valueMax = null,
        ?array $enumerator = null,
        ?string $inputFormat = null
    ) {
        // Seta propriedades definidas
        $this->setName($name);
        $this->setDescription($description);
        $this->setInputFormat($inputFormat);
        if ($this->inputFormat !== null && $this->inputFormat["length"] !== null) {
            $valueMax = $this->inputFormat["length"];
        }



        switch (mb_strtolower($type)) {
            case "bool":        $type = "Bool";     $unsigned = false; $allowEmpty = true; break;
            case "byte":        $type = "Byte";     $allowEmpty = true; break;
            case "short":       $type = "Short";    $allowEmpty = true; break;
            case "int":         $type = "Int";      $allowEmpty = true; break;
            case "long":        $type = "Long";     $allowEmpty = true; break;
            case "float":       $type = "Float";    $allowEmpty = true; break;
            case "double":      $type = "Double";   $allowEmpty = true; break;
            case "real":        $type = "Real";     $allowEmpty = true; break;
            case "datetime":    $type = "DateTime"; $unsigned = false; $allowEmpty = true; break;
            case "string":      $type = "String";   $unsigned = false; break;
        }

        $readOnly   = (($readOnly === true) ? "RO" : "");
        $allowNull  = (($allowNull === true) ? "N" : "");
        $unsigned   = (($unsigned === true) ? "U" : "");
        $allowEmpty = (($allowEmpty === true) ? "NE" : "");

        // Identifica qual instância ``iType`` deve ser gerada para armazenar os valores
        // deste campo.
        $nsBase = "AeonDigital\\Objects\\Types\\t$readOnly$allowNull$unsigned$allowEmpty$type";
        parent::__construct(new $nsBase(
            $value,
            $valueDefault,
            $valueMin,
            $valueMax,
            $enumerator
        ));
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
        return new Field(
            ((\key_exists("name", $cfg) === true)           ? $cfg["name"]          : ""),
            ((\key_exists("description", $cfg) === true)    ? $cfg["description"]   : ""),
            ((\key_exists("type", $cfg) === true)           ? $cfg["type"]          : ""),
            ((\key_exists("readOnly", $cfg) === true)       ? $cfg["readOnly"]      : false),
            ((\key_exists("allowNull", $cfg) === true)      ? $cfg["allowNull"]     : false),
            ((\key_exists("unsigned", $cfg) === true)       ? $cfg["unsigned"]      : false),
            ((\key_exists("allowEmpty", $cfg) === true)     ? $cfg["allowEmpty"]    : true),
            ((\key_exists("value", $cfg) === true)          ? $cfg["value"]         : undefined),
            ((\key_exists("valueDefault", $cfg) === true)   ? $cfg["valueDefault"]  : null),
            ((\key_exists("valueMin", $cfg) === true)       ? $cfg["valueMin"]      : null),
            ((\key_exists("valueMax", $cfg) === true)       ? $cfg["valueMax"]      : null),
            ((\key_exists("enumerator", $cfg) === true)     ? $cfg["enumerator"]    : null),
            ((\key_exists("inputFormat", $cfg) === true)    ? $cfg["inputFormat"]   : null)
        );
    }
}
