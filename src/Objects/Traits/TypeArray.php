<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Traits;
use AeonDigital\Interfaces\Objects\iType as iType;
use AeonDigital\Interfaces\Objects\Types\iGeneric as iGeneric;








/**
 * Trait que traz o básico necessário para implementação da interface
 * ``iTypeArray`` em um ``iType``.
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
     * Indica se as chaves de valores devem ser tratadas de forma
     * ``case-sensitive`` (padrão).
     *
     * @var         bool
     */
    protected bool $caseSensitive = true;
    /**
     * Configura o ``array`` para que suas chaves tornem-se ``case-insensitive``.
     * Deve poder ser acionado apenas 1 vez.
     *
     * @return      bool
     */
    public function setCaseInsensitive() : bool
    {
        if ($this->caseSensitive === true) {
            $this->caseSensitive = false;

            $arr = [];
            foreach ($this->valueArray as $key => $data) {
                $k = $this->useKey($key);
                if (\key_exists($k, $arr) === false) {
                    $arr[$k] = $data;
                }
            }
            $this->valueArray = $arr;

            return true;
        }
        else {
            return false;
        }
    }
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
     * Indica se a chave de nome passado existe.
     *
     * @param       string $key
     *              Chave que será verificada.
     *
     * @return      bool
     */
    public function hasKeyValue(string $key) : bool
    {
        return \key_exists($this->useKey($key), $this->valueArray);
    }
    /**
     * Define um novo valor para a instância.
     *
     * @param       string $key
     *              Chave a ser definida para este valor.
     *
     * @param       mixed $v
     *              Valor a ser adicionado ao ``array``.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     */
    public function setKeyValue(
        string $key,
        $v
    ) : bool {
        if ($this->locked === true) {
            $this->lastSetState = "error.obj.array.locked";
            return false;
        }
        else {
            $r = $this->protectedSet($v);
            if ($r === true) {
                $this->valueArray[$this->useKey($key)] = [
                    "key"       => $key,
                    "value"     => $this->value,
                    "valueRaw"  => $this->valueRaw
                ];
                $this->value = null;
                $this->valueRaw = null;
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
    public function unsetKeyValue(string $key) : bool
    {
        $this->lastSetState = "valid";
        if ($this->locked === true) {
            $this->lastSetState = "error.obj.array.locked";
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
    public function getKeyValue(string $key)
    {
        return (($this->hasKeyValue($key) === true) ? $this->valueArray[$this->useKey($key)]["value"] : undefined);
    }
    /**
     * Retorna o valor definido para a chave especificada em seu formato de
     * armazenamento.
     *
     * Apenas terá um efeito se um ``inputFormat`` estiver definido, caso contrário
     * retornará o mesmo valor existente em ``get``.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    public function getStorageKeyValue(string $key)
    {
        $v = $this->getKeyValue($key);
        if ($v !== undefined && $this->inputFormat !== null) {
            $v = $this->inputFormat["storageFormat"]($v);
        }
        return $v;
    }
    /**
     * Retorna o valor definido para a chave especificada em seu formato ``raw``
     * que é aquele que foi passado na execução do método ``set``.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    public function getRawKeyValue(string $key)
    {
        return (($this->hasKeyValue($key) === true) ? $this->valueArray[$this->useKey($key)]["valueRaw"] : undefined);
    }










    /**
     * Retorna um objeto do mesmo tipo do atual contendo exclusivamente as chaves e
     * respectivos valores nas posições em que os valores não são ``null``.
     *
     * @return      self
     */
    public function getKeyValuesNotNull() : self
    {
        $arr = clone $this;
        foreach ($arr as $key => $val) {
            if ($val === null) {
                $arr->unsetKeyValue($key);
            }
        }
        return $arr;
    }
    /**
     * Retorna um ``array associativo`` contendo as chaves e respectivos valores atualmente
     * definidos nesta instância.
     *
     * @param       bool $originalKeys
     *              Quando ``true`` irá usar as chaves conforme foram definidas na função
     *              ``setValue``.
     *
     * @param       bool $notNull
     *              Retornará no ``array`` resultante apenas os itens que não são ``null``.
     *
     * @param       bool $storageFormat
     *              Retornará no ``array`` resultante os valores em seus respectivos formatos
     *              de armazenamento.
     *
     * @param       bool $rawFormat
     *              Retornará no ``array`` resultante os valores em seus respectivos formatos
     *              ``raw``. A configuração ``$storageFormat`` deve se sobrepor a esta caso
     *              ambas sejam definidas como ``true``.
     *
     * @return      array
     *              Retorna um ``array associativo`` ou ``[]`` caso a coleção esteja vazia.
     */
    public function toArray(
        bool $originalKeys = false,
        bool $notNull = false,
        bool $storageFormat = false,
        bool $rawFormat = false
    ) : array {
        $arr = [];

        foreach ($this->valueArray as $key => $data) {
            if ($notNull === false || ($notNull === true && $data["value"] !== null)) {
                $k = (($originalKeys === true) ? $data["key"] : $key);
                $v = $data["value"];

                if ($storageFormat === true) {
                    if ($this->inputFormat !== null) {
                        $v = $this->inputFormat["storageFormat"]($v);
                    }
                }
                elseif ($rawFormat === true) {
                    $v = $data["valueRaw"];
                }

                $arr[$k] = $v;
            }
        }
        return $arr;
    }





    /**
     * Permite inserir multiplos dados de uma única vez no ``array``.
     *
     * @param       iterable $values
     *              ``array associativo`` contendo os valores a serem definidos.
     *
     * @return      bool
     *              Retornará ``true`` caso TODOS os novos valores sejam adicionados.
     *              Em caso de falha irá parar o processo e NENHUM item passado será
     *              mantido na instância.
     *              O motivo do erro poderá ser visto em ``$this->getLastValidateState()``.
     */
    public function insert(iterable $values) : bool
    {
        $this->lastSetState = "valid";
        if ($this->locked === true) {
            $this->lastSetState = "error.obj.array.locked";
            return false;
        }
        else {
            if (\count($values) > 0) {
                $r = true;
                $firstReadOnlyInsert = ($this->isReadOnly() === true && $this->undefined === true);
                foreach ($values as $k => $v) {
                    if ($r === true) {
                        $r = $this->setKeyValue((string)$k, $v);
                        if ($firstReadOnlyInsert === true) {
                            $this->undefined = true;
                        }
                    }
                }

                if ($r === false) {
                    foreach ($values as $k => $v) {
                        unset($this->valueArray[$this->useKey($k)]);
                    }
                }
                else {
                    $this->undefined = false;
                }

                $this->value = null;
                $this->valueRaw = null;
                return $r;
            }
            else {
                return false;
            }
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
        $this->lastSetState = "";
        if ($this->locked === true) {
            $this->lastSetState = "error.obj.array.locked";
            return false;
        }
        else {
            $this->valueArray = [];
            return true;
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
        return $this->hasKeyValue((string)$key);
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
        return $this->getKeyValue((string)$key);
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
        $this->setKeyValue((string)$key, $v);
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
        $this->unsetKeyValue((string)$key);
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
