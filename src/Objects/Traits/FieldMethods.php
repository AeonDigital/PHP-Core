<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Traits;

use AeonDigital\Interfaces\Objects\Data\iField as iField;








/**
 * Trait que traz o básico necessário para implementação da interface
 * ``iField`` em classes ``iType``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait FieldMethods
{



    /**
     * Nome do campo.
     */
    protected string $name = "";
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
     * Retorna a descrição de uso/funcionalidade do campo.
     *
     * @return      string
     */
    public function getDescription() : string
    {
        return $this->description;
    }





    /**
     * Mantêm o valor que foi testado por último para aferir a validade
     * do valor atual.
     *
     * @var         mixed
     */
    protected $currentValue = undefined;
    protected bool $fieldState_IsValid = false;
    protected $fieldState_CurrentState = "";


    /**
     * Verifica se o valor atualmente definido para este campo é válido.
     *
     * @return      void
     */
    protected function checkCurrentValue() : void
    {
        if ($this->currentValue !== $this->value) {
            $tmpLastValidateError           = $this->lastValidateError;

            $this->currentValue             = $this->value;
            $this->fieldState_IsValid       = $this->validateValue($this->value);
            $this->fieldState_CurrentState  = (($this->lastValidateError === "") ? "valid" : $this->lastValidateError);
            $this->lastValidateError        = $tmpLastValidateError;
        }
    }


    /**
     * Informa se o campo tem no momento um valor que satisfaz os critérios de validação
     * para o mesmo.
     *
     * @return      bool
     */
    public function isValidState() : bool
    {
        $this->checkCurrentValue();
        return $this->fieldState_IsValid;
    }
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
    public function getCurrentState()
    {
        $this->checkCurrentValue();
        return $this->fieldState_CurrentState;
    }





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
        $value = undefined,
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
