<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Traits;










/**
 * Trait que traz o básico necessário para implementação da interface
 * ``iTypeArray``
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait TypeArray
{



    /**
     * Valores que compõe o ``array``.
     *
     * @var         array
     */
    protected array $valueArray = [];



    /**
     * Indica quando o tipo de valor aceito é do tipo ``iterable``.
     *
     * @var         bool
     */
    protected bool $iterable = true;





    /**
     * Indica se as chaves de valores devem ser tratadas de forma
     * ``case-sensitive`` (padrão).
     *
     * @var         bool
     */
    protected bool $caseSensitive = true;
    /**
     * Informa se as chaves de valores devem ser tratadas de forma
     * ``case-sensitive`` (padrão).
     *
     * @return      bool
     */
    public function isCaseSensitive() : bool
    {
        return $this->caseSensitive;
    }





    /**
     * Indica se a instância está bloquada contra alterações.
     *
     * @var         bool
     */
    protected bool $locked = false;
    /**
     * Uma vez acionado, impede a adição e remoção de itens no ``array``.
     *
     * @return      bool
     */
    public function lockArray() : bool
    {
        $this->locked = true;
        return true;
    }
    /**
     * Indica se a instância está bloquada contra alterações.
     *
     * @return      bool
     */
    public function isLocked() : bool
    {
        return $this->locked;
    }




    /**
     * Retorna a chave indicada com a transformação exigida para
     * a atual instância.
     *
     * @param       string $key
     *              Chave.
     *
     * @return      string
     */
    protected function useKey(string $key) : string
    {
        return (($this->caseSensitive === true) ? $key : \strtolower($key));
    }





    /**
     * Indica se a chave de nome indicado existe.
     *
     * @param       string $key
     *              Chave que será verificada.
     *
     * @return      bool
     */
    public function hasValue(string $key) : bool
    {
        return \key_exists($this->useKey($key), $this->valueArray);
    }
    /**
     * Define um novo valor para a instância.
     *
     * @param       string $key
     *              Chave a ser definido para este valor.
     *
     * @param       mixed $v
     *              Valor a ser adicionado ao ``array``.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     */
    public function setValue(
        string $key,
        $v
    ) : bool {
        if ($this->locked === true) {
            $this->lastSetError = "error.obj.array.locked";
            return false;
        }
        else {
            $r = $this->set($v);
            if ($r === true) {
                $this->valueArray[$this->useKey($key)] = [
                    "key" => $key,
                    "value" => $this->value
                ];
                $this->value = null;
            }
            return $r;
        }
    }
    /**
     * Remove do ``array`` o item da chave especificada.
     *
     * @param       string $key
     *              Chave a ser excluída.
     *
     * @return      bool
     *              Retornará ``true`` apenas se a chave existir e for removida.
     */
    public function unsetValue(string $key) : bool
    {
        $this->lastSetError = "";
        if ($this->locked === true) {
            $this->lastSetError = "error.obj.array.locked";
            return false;
        }
        else {
            unset($this->valueArray[$this->useKey($key)]);
            return true;
        }
    }
    /**
     * Retorna o valor definido para a chave especificada.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    public function getValue(string $key)
    {
        if ($this->hasValue($key) === true) {
            return $this->valueArray[$this->useKey($key)]["value"];
        }
        return undefined;
    }






    /**
     * Retorna um objeto do mesmo tipo do atual contendo exclusivamente as chaves e
     * respectivos valores nas posições em que os valores não são ``null``.
     *
     * @return      self
     */
    public function getValuesNotNull() : self
    {
        $arr = clone $this;
        foreach ($arr as $key => $val) {
            if ($val === null) {
                $arr->unsetValue($key);
            }
        }
        return $arr;
    }
    /**
     * Retorna um ``array associativo`` contendo as chaves e respectivos valores atualmente
     * definidos nesta instância.
     *
     * @param       bool $originalKeys
     *              Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
     *              Se no armazenamento interno elas sofrerem qualquer alteração e for definido
     *              ``false`` então elas retornarão seu formato alterado.
     *
     * @param       bool $notNull
     *              Retornará no ``array`` resultante apenas os itens que não são ``null``.
     *
     * @return      array
     *              Retorna um ``array associativo`` ou ``[]`` caso a coleção esteja vazia.
     */
    public function toArray(
        bool $originalKeys = false,
        bool $notNull = false
    ) : array {
        $arr = [];
        foreach ($this->valueArray as $key => $val) {
            if ($notNull === false || ($notNull === true && $val["value"] !== null)) {
                $k = (($originalKeys === true) ? $val["key"] : $key);
                $arr[$k] = $val["value"];
            }
        }
        return $arr;
    }





    /**
     * Permite inserir multiplos dados de uma única vez no ``array``.
     *
     * @param       array $values
     *              ``array associativo`` contendo os novos valores a serem definidos.
     *
     * @return      bool
     *              Retornará ``true`` caso TODOS os novos valores sejam adicionados.
     *              Em caso de falha irá parar o processo e NENHUM item passado será
     *              mantido na instância.
     *              O motivo do erro poderá ser visto em ``self::getLastSetError()``.
     */
    public function insert(array $values) : bool
    {
        if (\count($values) > 0) {
            $r = true;
            foreach ($values as $k => $v) {
                if ($r === true) {
                    $r = $this->setValue($k, $v);
                }
            }

            if ($r === false) {
                foreach ($values as $k => $v) {
                    unset($this->valueArray[$this->useKey($k)]);
                }
            }
            $this->value = null;
            return $r;
        }
        else {
            $this->value = null;
            return false;
        }
    }
    /**
     * Limpa totalmente o ``array`` eliminando toda informação armazenada no momento.
     *
     * @return      bool
     *              Retornará ``true`` caso a exclusão dos dados tenha sido executada
     *              com sucesso.
     */
    public function clean() : bool
    {
        $this->lastSetError = "";
        if ($this->locked === true) {
            $this->lastSetError = "error.obj.array.locked";
            return false;
        }
        else {
            $this->valueArray = [];
            return true;
        }
    }






    /**
     * Inicia uma nova instância.
     *
     * @param       array $value
     *              Valor inicial da instância.
     *
     * @param       bool $allowNull
     *              Quando ``true`` esta instância aceitará ``null`` como um valor válido.
     *
     * @param       bool $allowEmpty
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
     *              Indica o menor valor aceitável para um tipo numérico ou comparável.
     *              Se não for definido usará o valor existente em ``min`` da classe
     *              ``Standart`` original.
     *
     * @param       int|float|Realtype|\DateTime $valueMax
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
     *
     * @param       bool $caseSensitive
     *              Informa se as chaves de valores devem ser tratadas de forma
     *              ``case-sensitive``.
     */
    function __construct(
        $value = [],
        bool $allowNull = false,
        bool $allowEmpty = true,
        bool $readonly = false,
        $valueDefault = null,
        $valueMin = undefined,
        $valueMax = undefined,
        ?int $valueLength = null,
        string $type = "",
        bool $caseSensitive = true
    ) {
        parent::__construct(
            undefined,
            $allowNull,
            $allowEmpty,
            $readonly,
            $valueDefault,
            $valueMin,
            $valueMax,
            $valueLength,
            $type
        );

        $this->caseSensitive = $caseSensitive;
        if (\is_array($value) === true) {
            $this->insert($value);
        }
    }










    //
    // Implementação da interface \ArrayAccess

    /**
     * Indica se a chave de nome indicado existe.
     *
     * @param       string $key
     *              Chave que será verificada.
     *
     * @return      bool
     */
    public function offsetExists($key) : bool
    {
        return $this->hasValue((string)$key);
    }
    /**
     * Retorna o valor definido para a chave especificada.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    public function offsetGet($key)
    {
        return $this->getValue((string)$key);
    }
    /**
     * Define um novo valor para a instância.
     *
     * @param       string $key
     *              Chave a ser definido para este valor.
     *
     * @param       mixed $v
     *              Valor a ser adicionado ao ``array``.
     *
     * @return      void
     */
    public function offsetSet($key, $v)
    {
        $this->setValue((string)$key, $v);
    }
    /**
     * Remove do ``array`` o item da chave especificada.
     *
     * @param       string $key
     *              Chave a ser excluída.
     *
     * @return      bool
     *              Retornará ``true`` apenas se a chave existir e for removida.
     */
    public function offsetUnset($key)
    {
        $this->unsetValue((string)$key);
    }






    //
    // Implementação da interface \IteratorAggregate

    /**
     * Retorna um objeto ``iterable``.
     *
     * @return      \Traversable
     */
    public function getIterator() : \Traversable
    {
        return new \ArrayIterator($this->toArray());
    }






    //
    // Implementação da interface \Serializable

    /**
     * Retorna uma representação em ``string`` deste ``objeto``.
     *
     * @return      string
     */
    public function serialize() : string
    {
        return "";
    }
    /**
     * Retorna uma instância do objeto a partir de uma versão serializada.
     *
     * @param       string $serialized
     *              Versão serializada do objeto.
     *
     * @return      string
     */
    public function unserialize($serialized)
    {
        return "";
    }






    //
    // Implementação da interface \Countable

    /**
     * Retorna a contagem de itens que constam no ``array``.
     *
     * @return      int
     */
    public function count() : int
    {
        return \count($this->valueArray);
    }
}
