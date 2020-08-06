<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Interfaces\Objects\Types\iGeneric as iGeneric;
use AeonDigital\Objects\Standart\stdGeneric as stdGeneric;






/**
 * Classe concreta para criação de tipos genéricos em tempo de execução.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpGeneric extends aType implements iGeneric
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function getStandart() : string
    {
        return stdGeneric::class;
    }





    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      mixed
     */
    public function getDefault()
    {
        return $this->valueDefault;
    }
    /**
     * Retorna o menor valor aceitável para esta instância.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    public function getMin()
    {
        return $this->valueMin;
    }
    /**
     * Retorna o menor valor aceitável para esta instância.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    public function getMax()
    {
        return $this->valueMax;
    }





    /**
     * Define um novo valor para a instância.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     */
    public function set($v) : bool
    {
        $r = false;
        $this->lastSetError = "";

        if ($this->readonly === true) {
            $this->lastSetError = "error.obj.type.readonly";
        }
        else {
            if ($v === null) {
                if ($this->allowNull === false) {
                    $this->lastSetError = "error.obj.type.not.allow.null";
                }
                else {
                    $r = true;
                    $this->value = $v;
                    $this->undefined = false;
                }
            }
            else {
                $this->lastSetError = "error.obj.type.unexpected";

                if (\is_object($v) === true) {
                    $className = \get_class($v);
                    $interfaces = \class_implements($className);

                    if (\is_a($v, $this->type) === true ||
                        ($interfaces !== false && \in_array($this->type, $interfaces) === true))
                    {
                        $r = true;
                        $this->value = $v;
                        $this->undefined = false;
                        $this->lastSetError = "";
                    }
                }
            }
        }

        return $r;
    }
    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      mixed
     */
    public function get()
    {
        return parent::sttGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::getNullEquivalent``.
     *
     * @return      mixed
     */
    public function getNotNull()
    {
        return parent::sttGetNotNull();
    }





    /**
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     *              Se for passado ``undefined`` irá iniciar a instância com o valor definido
     *              em ``$valueDefault`` mas caso este não esteja definido também irá usar ``null``
     *              se este for um valor aceitável.
     *              Caso ``null`` não seja aceitável, usará o valor equivalente encontrado em
     *              em ``static::getNullEquivalent()``.
     *              Em último caso tentará definir a instância com o valor de ``self::getMin()``.
     *
     * @param       bool $allowNull
     *              Quando ``true`` esta instância aceitará ``null`` como um valor válido.
     *
     * @param       bool $allowEmpty
     *              [inválido para este tipo]
     *              Quando ``true`` esta instância aceitará ``""`` como um valor válido.
     *              Esta configuação funciona apenas em casos de tipo ``string``.
     *
     * @param       bool $readonly
     *              Quando ``true`` indica que esta instância não poderá ter seu valor
     *              alterado após a inicialização.
     *
     * @param       mixed $valueDefault
     *              Valor padrão a ser definido para este tipo de instância caso nenhum
     *              valor válido tenha sido explicitamente definido.
     *              Se não for definido, ``null`` será usado.
     *
     * @param       int|float|Realtype|\DateTime $valueMin
     *              [inválido para este tipo]
     *              Indica o menor valor aceitável para um tipo numérico ou comparável.
     *              Se não for definido usará o valor existente em ``min`` da classe
     *              ``Standart`` original.
     *
     * @param       int|float|Realtype|\DateTime $valueMax
     *              [inválido para este tipo]
     *              Indica o maior valor aceitável para um tipo numérico ou comparável.
     *              Se não for definido usará o valor existente em ``max`` da classe
     *              ``Standart`` original.
     *
     * @param       ?int $valueLength
     *              tamanho máximo (em caracteres) que um valor do tipo ``string``
     *              pode ter.
     *
     * @param       string $type
     *              Informa a namespace completa da classe ou interface que os valores
     *              a serem usados por esta instância deverão possuir.
     */
    function __construct(
        $value = undefined,
        bool $allowNull = false,
        bool $allowEmpty = true,
        bool $readonly = false,
        $valueDefault = null,
        $valueMin = undefined,
        $valueMax = undefined,
        ?int $valueLength = null,
        string $type = ""
    ) {
        $this->type = (($this->type === "") ? $type : $this->type);
        parent::__construct(
            $value,
            $allowNull,
            $allowEmpty,
            $readonly,
            $valueDefault,
            $valueMin,
            $valueMax,
            $valueLength
        );
    }




    /**
     * Converte o valor atualmente definido para uma ``string``.
     *
     * @return      string
     */
    public function toString() : string
    {
        return static::getStandart()::toString($this->value) ?? "";
    }





    /**
     * Retorna uma instância definida com as propriedades definidas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iType
     */
    public static function fromArray(array $cfg) : self
    {
        return static::tpFromArray(self::class, $cfg);
    }
}
