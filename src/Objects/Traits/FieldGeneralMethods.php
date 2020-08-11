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
trait FieldGeneralMethods
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





    //
    // Controles de estado do campo
    // Alterado sempre que executar o método ``set / setKeyValue``.
    //
    // Em campos de array de dados, "valid" significa que todos os itens adicionados
    // foram setados e aceitos, de outra forma, será criado um array associativo
    // contendo os nomes de cada campo que falhou a ação ``set`` sua respectiva
    // mensagem de falha.
    protected array $fieldState = [
        "state" => "invalid",
        "rawValue" => undefined
    ];
    protected array $fieldArrayState = [
        "state" => [],
        "rawValue" => []
    ];



    /**
     * Responsável por registrar internamente o estado da última tentativa de
     * definir um novo valor para esta instância.
     *
     * @param       mixed $val
     *              Valor.
     *
     * @param       string $err
     *              Resultado da validação.
     *
     * @return      void
     */
    protected function protectedRegisterSetState($val, string $err) : void
    {
        $this->fieldState["rawValue"] = $val;
        $this->fieldState["state"] = (($err === "") ? "valid" : $err);
    }
    /**
     * Responsável por registrar internamente o estado da última tentativa de
     * definir um novo valor para um campo do tipo ``array``.
     *
     * @param       string $key
     *              Chave.
     *
     * @param       mixed $v
     *              Valor.
     *
     * @param       string $err
     *              Resultado da validação.
     *
     * @return      void
     */
    protected function protectedRegisterArraySetState(string $key, $val, string $err) : void
    {
        $k = $this->useKey($key);
        $this->fieldArrayState["rawValue"][$k] = $val;
        $this->fieldArrayState["state"][$k] = (($err === "") ? "valid" : $err);
    }
    /**
     * Responsável por remover o registro do estado de um campo.
     * Usado em caso de remoção total do key/value da coleção atual.
     *
     * @param       string $key
     *              Chave.
     *
     * @return      void
     */
    protected function protectedUnregisterArraySetState(string $key) : void
    {
        $k = $this->useKey($key);
        unset($this->fieldArrayState["rawValue"][$k]);
        unset($this->fieldArrayState["state"][$k]);
    }





    /**
     * Informa se o último valor que foi passado para um método ``set`` é válido.
     * Em campos ``iModel`` retornará ``true`` se todos os valores definidos forem
     * válidos.
     *
     * @return      bool
     */
    public function isCurrentFieldStateValid() : bool
    {
        $r = ($this->fieldState["state"] === "valid");
        if ($this->iterable === true) {
            $r = true;
            foreach ($this->fieldArrayState["state"] as $k => $state) {
                if ($r === true && $state !== "valid") {
                    $r = false;
                    break;
                }
            }
        }
        return $r;
    }
    /**
     * Retorna o código de estado atual deste campo.
     *
     * **Campos Simples**
     * Retornará ``valid`` se o último valor que foi passado para o campo tiver sido
     * aceito; Caso contrário retornará o código de erro obtido da validação.
     *
     * **Campos Array**
     * Retornará ``valid`` caso **TODOS** os valores contidos no array estejam de acordo
     * com os critérios de aceite; Caso contrário retornará um array associativo contendo
     * a coleção de chaves existentes e seus respectivos códigos de validação.
     *
     * @param       bool $recheckAll
     *              Quando ``true`` efetuará a revalidação do campo obtendo assim
     *              a informação precisa sobre o/s valor/es que está/ão definido/s
     *              neste instante.
     *
     * @return      string|array
     */
    public function getCurrentFieldState(bool $recheckAll = false)
    {
        if ($recheckAll === true) {
            if ($this->iterable === false) {
                $this->protectedSet($this->valueRaw);
            }
            else {
                foreach ($this->valueArray as $key => $data) {
                    $this->setKeyValue($data["key"], $data["valueRaw"]);
                }
            }
        }


        $r = $this->fieldState["state"];
        if ($this->iterable === true) {
            $r = (($this->isCurrentFieldStateValid() === true) ? "valid" : $this->fieldArrayState["state"]);
        }
        return $r;
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
}
