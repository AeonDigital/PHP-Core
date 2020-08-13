<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;

use AeonDigital\Interfaces\Objects\iType as iType;








/**
 * Amplia os ``iType`` para serem usados como ``arrays``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iTypeArray extends iType, \IteratorAggregate, \ArrayAccess, \Serializable, \Countable
{



    /**
     * Configura o ``array`` para que suas chaves tornem-se ``case-insensitive``.
     * Deve poder ser acionado apenas 1 vez.
     *
     * @return      bool
     */
    function setCaseInsensitive() : bool;
    /**
     * Informa se as chaves de valores devem ser tratadas de forma
     * ``case-sensitive`` (padrão).
     *
     * @return      bool
     */
    function isCaseSensitive() : bool;
    /**
     * Uma vez acionado, impede a adição e remoção de itens no ``array``.
     *
     * @return      bool
     */
    function lockArray() : bool;
    /**
     * Indica se a instância está bloquada contra alterações.
     *
     * @return      bool
     */
    function isLocked() : bool;





    /**
     * Indica se a chave de nome passado existe.
     *
     * @param       string $key
     *              Chave que será verificada.
     *
     * @return      bool
     */
    function hasKeyValue(string $key) : bool;
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
    function setKeyValue(string $key, $v) : bool;
    /**
     * Remove do ``array`` o item da chave especificada.
     *
     * @param       string $key
     *              Chave a ser excluída.
     *
     * @return      bool
     *              Retornará ``true`` apenas se a chave existir e for removida.
     */
    function unsetKeyValue(string $key) : bool;
    /**
     * Retorna o valor definido para a chave especificada.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    function getKeyValue(string $key);
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
    function getStorageKeyValue(string $key);
    /**
     * Retorna o valor definido para a chave especificada em seu formato ``raw``
     * que é aquele que foi passado na execução do método ``set``.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    function getRawKeyValue(string $key);





    /**
     * Retorna um objeto do mesmo tipo do atual contendo exclusivamente as chaves e
     * respectivos valores nas posições em que os valores não são ``null``.
     *
     * @return      self
     */
    function getKeyValuesNotNull() : self;
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
    function toArray(
        bool $originalKeys = false,
        bool $notNull = false,
        bool $storageFormat = false,
        bool $rawFormat = false
    ) : array;





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
     *              O motivo do erro poderá ser visto em ``$this->getLastSetError()``.
     */
    function insert(iterable $values) : bool;
    /**
     * Limpa totalmente o ``array`` eliminando toda informação armazenada no momento.
     *
     * @return      bool
     *              Retornará ``true`` caso a exclusão dos dados tenha sido executada
     *              com sucesso.
     */
    function clean() : bool;
}
