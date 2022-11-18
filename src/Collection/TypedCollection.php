<?php

declare(strict_types=1);

namespace AeonDigital\Collection;

use AeonDigital\Interfaces\Collection\iTypedCollection as iTypedCollection;
use AeonDigital\Collection\Collection as Collection;






/**
 * Permite a criação de uma collection especializada em um tipo de dados definido ao
 * instanciar a classe.
 *
 * @package     AeonDigital\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class TypedCollection extends Collection implements iTypedCollection
{






    /**
     * Objeto que traz o padrão de dados que será aceito por esta coleção.
     * Baseado neste objeto que a validação é feita.
     *
     * @var array
     */
    private array $collectionModelType = [];





    /**
     * Indica quando também será aceito ``null`` para valor de um item. Desta forma
     * o collection fica também ``nullable``.
     *
     * @var bool
     */
    private bool $isCollectionNullable = true;
    /**
     * Indica se a coleção aceita valores ``null`` para seus pares de chave/valor.
     *
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->isCollectionNullable;
    }





    /**
     * Indica o tipo de dados que esta coleção pode conter.
     * O tipo padrão é ``mixed``, ou seja, qualquer tipo.
     *
     * @var string
     */
    private string $collectionType = "mixed";
    /**
     * Retorna o tipo de dado que é aceito para o valor dos itens da coleção.
     *
     * Se nenhum tipo for definido, o valor padrão é ``mixed``.
     *
     * Um sinal de interrogação ``?`` no início do nome do tipo indica que além de
     * objetos daquele próprio tipo, é aceito também ``null`` como um valor válido de ser
     * armazenado na coleção.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->collectionType;
    }










    /**
     * Inicia nova coleção de dados.
     *
     * @param string $type
     * Tipo de dados que devem ser aceitos para cada item da coleção. Os tipos
     * de classes e interfaces, quando usados devem vir com seus nomes completos,
     * ou seja ``namespace + classname``.
     *
     * @param ?array $initialValues
     * Valores com os quais a instância deve iniciar.
     *
     * @param bool $autoincrement
     * Quando ``true`` permite que seja omitido o nome da chave dos valores pois
     * eles serão definidos internamente conforme fosse um array começando em zero.
     *
     *
     * @throws \InvalidArgumentException
     * Caso algum dos valores iniciais a serem definidos não seja aceito.
     */
    function __construct(string $type = "", ?array $initialValues = [], bool $autoincrement = false)
    {
        if ($type === "") {
            $type = "mixed";
        }
        $useType = $this->normalizeTypeBeforeParse($type);

        $this->collectionType = $type;
        $this->collectionModelType = $this->generateCollectionModelType($useType);
        $this->isCollectionNullable = (\strpos($this->collectionModelType["structureType"], "nullable") === 0);

        parent::__construct($initialValues, $autoincrement);
    }










    /**
     * Efetua a verificação do tipo de dado que está sendo passado e valida-o permitindo
     * assim, ou não, seu armazenamento.
     *
     * Este método NÃO PODE lançar exceptions.
     * Apenas retornar ``true`` ou ``false`` mas PODE/DEVE alterar o valor da propriedade
     * ``messageInvalidValue`` de forma que a mensagem de erro (caso ocorra) dê informações
     * mais específicas sobre o motivo da falha e aponte o que era esperado de ser recebido.
     *
     *
     * @param mixed $value
     * Valor que será testado.
     *
     * @return bool
     */
    protected function isValidType(mixed $value): bool
    {
        return $this->validateCollectionTypeValue($this->collectionModelType, $value);
    }
    /**
     * Valida um dos valores passados para a entrada de dados conforme seu modelo de estrutura
     * de dados.
     *
     * @param array $structure
     * Estrutura de dados que será usada para validar o valor.
     *
     * @param mixed $value
     * Valor que será validado.
     *
     * @return bool
     */
    protected function validateCollectionTypeValue(array $structure, mixed $value): bool
    {
        $r = false;


        if ($structure["dataType"] === "type") {
            $nullable = (\strpos($structure["structureType"], "nullable") === 0);


            if ($nullable === true && $value === null) {
                $r = true;
            } else {
                switch ($structure["internalStructure"]) {
                    case "mixed":
                        $r = true;
                        break;

                    case "?bool":
                    case "bool":
                        $r = (\is_bool($value) === true);
                        break;

                    case "?int":
                    case "int":
                        $r = (\is_int($value) === true);
                        break;

                    case "?float":
                    case "float":
                        $r = (\is_float($value) === true);
                        break;

                    case "?string":
                    case "string":
                        $r = (\is_string($value) === true);
                        break;

                    default:
                        $cname = $structure["internalStructure"];
                        $r = (\is_a($value, $cname) === true || \in_array($cname, \class_implements($value)) === true);
                        break;
                }

                if ($r === false) {
                    $this->messageInvalidValue = "Invalid given value. Expected \"" . $this->collectionType . "\" .";
                }
            }
        } else {
            if ($structure["dataType"] === "array-of-types") {
                if (\strpos($structure["structureType"], "nullable") === 0 && $value === null) {
                    $r = true;
                } elseif (\is_array($value) === true && $this->isAssoc($value) === false) {
                    $childModels = $structure["childModel"];

                    foreach ($value as $i => $v) {
                        $r = $this->validateCollectionTypeValue($childModels[$i], $v);
                        if ($r === false) {
                            break;
                        }
                    }
                }
            } elseif ($structure["dataType"] === "array-assoc") {
                if (\strpos($structure["structureType"], "nullable") === 0 && $value === null) {
                    $r = true;
                } elseif ($this->isAssoc($value) === true) {
                    $childModels = $structure["childModel"];
                    $key = \array_keys($value)[0];
                    $val = $value[$key];

                    if (\strpos($structure["structureType"], "nullable") === 0 && $val === null) {
                        $r = true;
                    } else {
                        $r = ($this->validateCollectionTypeValue($childModels[0], $key) === true &&
                            $this->validateCollectionTypeValue($childModels[1], $val) === true);
                    }
                }
            }
        }


        return $r;
    }





    /**
     * Verifica se o objeto passado é um ``array associativo``.
     *
     * @codeCoverageIgnore
     *
     * @param mixed $o
     * Objeto que será testado.
     *
     * @return bool
     */
    protected function isAssoc(mixed $o): bool
    {
        if (\is_array($o) && $o !== []) {
            return \array_keys($o) !== \range(0, \count($o) - 1);
        }
        return false;
    }





    /**
     * Prepara o valor informado que identifica os tipos que compõe a coleção de forma que
     * possa ser corretamente validado.
     *
     * @param string $type
     * Tipo que será verificado.
     *
     * @return string
     */
    protected function normalizeTypeBeforeParse(string $type): string
    {
        $type = \trim(\str_replace(" ", "", $type));

        $l = -1;
        $parseType = "";
        $arrType = \str_split($type);
        foreach ($arrType as $c) {
            if ($c === "[") {
                $l++;
                $parseType .= $c;
            } elseif ($c === "]") {
                $l--;
                $parseType .= $c;
            } else {
                if ($c === ",") {
                    $parseType .= ("<" . $l . ">");
                } else {
                    $parseType .= $c;
                }
            }
        }

        return $parseType;
    }










    /**
     * Desmembra a string que representa o/os objeto/s que podem ser aceitos e seus
     * respectivos tipos de dados para formar um objeto modelo capaz de validar cada uma das
     * posteriores entradas que a coleção pode vir a ter.
     *
     * @param string $type
     * Tipo que será verificado.
     *
     * @param int $lvl
     * Nível de complexidade do objeto.
     *
     * @return array
     *
     *
     * @throws \InvalidArgumentException
     * Caso ocorra falha no processamento dos dados.
     */
    protected function generateCollectionModelType(
        string $type,
        int $lvl = 0
    ): array {
        $structure = $this->getStructureType($type, $lvl);


        // Quando o tipo de estrutura não é definido deve ocorrer uma falha.
        if ($structure["structureType"] === "") {
            throw new \InvalidArgumentException("Invalid type [ \"" . $type . "\" ].");
        } elseif ($structure["structureType"] === "type") {
            $r = $structure;
        } else {
            if ($structure["dataType"] === "array-of-types") {
                $structure["childModel"] = [];
                $nLvl = $lvl + 1;

                $splitTypes = \explode("<$lvl>", $structure["internalStructure"]);

                foreach ($splitTypes as $tp) {
                    $structure["childModel"][] = $this->generateCollectionModelType($tp, $nLvl);
                }
            } elseif ($structure["dataType"] === "array-assoc") {
                $structure["childModel"] = [];
                $nLvl = $lvl + 1;

                $splitKeyValue = \explode("=>", $structure["internalStructure"], 2);
                $key = $splitKeyValue[0];
                $value = $splitKeyValue[1];

                if ($this->validateType($key, true) === false) {
                    throw new \InvalidArgumentException("Invalid array assoc key [ \"" . $key . "\" ].");
                } else {
                    $structure["childModel"][] = $this->getStructureType($key, $lvl);
                    $structure["childModel"][] = $this->generateCollectionModelType($value, $nLvl);
                }
            }
        }

        return $structure;
    }
    /**
     * Retorna o tipo de estrutura de dados que a string passada representa.
     *
     * O retorno será um ``array associativo`` contendo as chaves:
     *
     * - ``structureType``      : [nullable-] type | array
     * - ``dataType``           : type | array-of-types | array-assoc
     * - ``internalStructure``  : Estrutura interna, removendo marcações mais
     *                            externas como ?[ ... ], ficando apenas o conteúdo em si.
     * - ``childModel``         : Array contendo as definições para os valores
     *                            filhos da estrutura atual.
     *
     * O valor **structureType** representado por uma string vazia indica que o tipo
     * não é válido.
     *
     * @param string $structure
     * Estrutura de dados que será identificada.
     *
     * @param int $lvl
     * Nível de complexidade do objeto.
     *
     * @return array
     */
    protected function getStructureType(string $structure, int $lvl): array
    {
        $structureType = "";
        $dataType = "";


        if ($structure === "mixed" || $structure === "?mixed") {
            $structureType .= "nullable-";
            $structure = "mixed";
        } elseif (\strpos($structure, "?") === 0) {
            $structureType .= "nullable-";
            $structure = \substr($structure, 1, (\strlen($structure) - 1));
        }


        if ($this->isStructureASingleType($structure) === true) {
            $structureType .= "type";
            $dataType = "type";
        } elseif ($this->isStructureAnCommomArray($structure) === true) {
            $structureType .= "array";

            // Remove os "[]"
            $structure = \substr($structure, 1, (\strlen($structure) - 2));
            if (
                $this->isStructureASingleType($structure) === true ||
                $this->isStructureAnArrayOfTypes($structure, $lvl) === true
            ) {
                $dataType = "array-of-types";
            } elseif ($this->isStructureAnAssocArray($structure, $lvl) === true) {
                $dataType = "array-assoc";
            }
        }


        // Tratando-se de uma definição de um tipo
        if (($structureType === "type" || $structureType === "nullable-type") && $this->validateType($structure) === false) {
            $structureType = "";
            $dataType = "";
        }


        return [
            "structureType"     => $structureType,
            "dataType"          => $dataType,
            "internalStructure" => $structure
        ];
    }
    /**
     * Identifica se estrutura de dados é um ``array`` comum.
     *
     * Exemplo de estrutura que será avaliada :
     *
     * ```php
     *      [ ... ]
     * ```
     *
     * @param string $structure
     * Estrutura de dados que será testada.
     *
     * @return bool
     */
    protected function isStructureAnCommomArray(string $structure): bool
    {
        return (\strpos($structure, "[") === 0 && \strrpos($structure, "]") === (\strlen($structure) - 1));
    }
    /**
     * Identifica se estrutura de dados é um ``array`` associativo.
     * Avalia o conteúdo da estrutura, ou seja, o conteúdo de uma estrutura já
     * identificada como um array ( sem os "[]" ).
     *
     * Exemplo de estrutura que será avaliada :
     *
     * ```php
     *      string  => int
     *      string  => [ ... ]
     *      int     => string
     *      int     => [ ... ]
     * ```
     *
     * @param string $structure
     * Estrutura de dados que será testada.
     *
     * @param int $lvl
     * Nível de complexidade do objeto.
     *
     * @return bool
     */
    protected function isStructureAnAssocArray(string $structure, int $lvl): bool
    {
        $arrow = \strpos($structure, "=>");
        $comma = \strpos($structure, "<$lvl>");

        return (($arrow === false) ? false : (($comma === false && $arrow !== false) ? true : ($arrow < $comma)));
    }
    /**
     * Identifica se estrutura de dados é um ``array`` de tipos de dados.
     *
     * Avalia o conteúdo da estrutura, ou seja, o conteúdo de uma estrutura já
     * identificada como um array ( sem os "[]" ).
     *
     * Exemplo de estrutura que será avaliada :
     *
     * ```php
     *      string, int, bool
     * ```
     *
     * @param string $structure
     * Estrutura de dados que será testada.
     *
     * @param int $lvl
     * Nível de complexidade do objeto.
     *
     * @return bool
     */
    protected function isStructureAnArrayOfTypes(string $structure, int $lvl): bool
    {
        $arrow = \strpos($structure, "=>");
        $comma = \strpos($structure, "<$lvl>");

        if ($comma === false) {
            return false;
        } elseif ($arrow === false && $comma !== false) {
            return true;
        } else {
            return ($comma < $arrow);
        }
    }
    /**
     * Identifica se estrutura de dados é um ``type`` único.
     *
     * Avalia o conteúdo da estrutura, ou seja, o conteúdo de uma estrutura já
     * identificada como um array ( sem os "[]" ).
     *
     * Exemplo de estrutura que será avaliada :
     *
     * ```php
     *      string
     *      int
     *      DateTime
     * ```
     *
     * @param string $structure
     * Estrutura de dados que será testada.
     *
     * @return bool
     */
    protected function isStructureASingleType(string $structure): bool
    {
        return (\preg_match("/[=,\[\]><]/", $structure) === 0);
    }
    /**
     * Verifica se um tipo específico de dados é válido.
     *
     * @param string $type
     * Tipo que será verificado.
     *
     * @param bool $isKey
     * Indica que o tipo testado será usado como chave de uma outra
     * coleção de dados. Neste caso apenas serão aceitos valores
     * ``string`` e ``int``.
     *
     * @return bool
     */
    protected function validateType(string $type, bool $isKey = false): bool
    {
        $r = false;

        switch ($type) {
                // Tipo Qualquer
            case "mixed":
                $r = true;
                break;

                // Tipos escalares
            case "?bool":
            case "?int":
            case "?float":
            case "?string":
            case "bool":
            case "int":
            case "float":
            case "string":
                $r = ($isKey === false || ($isKey === true && ($type === "string" || $type === "int")));
                break;

            default:
                $checkType = \str_replace("?", "", $type);
                $r = ($isKey === false && (\class_exists($checkType) || \interface_exists($checkType)));
                break;
        }

        return $r;
    }
}
