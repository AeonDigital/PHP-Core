<?php

declare(strict_types=1);

namespace AeonDigital\Collection;

use AeonDigital\Interfaces\Collection\iBasicCollection as iBasicCollection;
use AeonDigital\BObject as BObject;






/**
 * Implementa a interface ``iBasicCollection``.
 *
 * Esta classe traz componentes que permitem implementar quaisquer das interfaces do namespace
 * ``AeonDigital\Interfaces\Collection`` no entando APENAS ``iBasicCollection`` está devidamente
 * implementada, restando às classes concretas que herdem esta se especializarem em cada uma
 * destas capacidades.
 *
 * A partir desta classe as seguintes interfaces podem ser implementadas imediatamente:
 *
 *  - iProtectedCollection
 *  - iAppendOnlyCollection
 *  - iReadOnlyCollection
 *  - iCaseInsensitiveCollection
 *
 * Na documentação de cada método ou propriedade desta classe vem especificado de que forma
 * a implementação de uma destas interfaces deve alterar o comportamento do mesmo.
 *
 *
 * @package     AeonDigital\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class BasicCollection extends BObject implements iBasicCollection
{





    /**
     * Guarda toda a coleção de dados da instância.
     *
     * Cada item produz uma entrada conforme o modelo indicado abaixo:
     *
     * ``` php
     *  [keyname] => [
     *      "originalkey" => "KeyName",
     *      "value" => value
     *  ];
     * ```
     *
     * Em coleções normais (*case sensitive*) tanto o nome da chave no ``array collection`` quanto
     * o valor armazenado em **originalkey** serão o mesmo.
     *
     *
     * **Interface ``iCaseSensitiveCollection``**
     *
     * Para coleções desta interface o nome da chave no ``array collection`` será armazenado em
     * formato ``lowercase`` para facilitar comparações e manipulações internas.
     *
     * O armazenamento do valor original de como a chave foi definida é importante pois haverão
     * casos de classes concretas que precisarão manter o registro deste formato.
     *
     * Se uma mesma chave é definida em dois momentos distintos DEVE ser mantido o último formato
     * indicado.
     *
     * @var         array
     */
    private array $collection = [];



    /**
     * Mensagem de erro mostrada quando o valor a ser definido para a coleção falhar na validação
     * de tipo.
     *
     *
     * **Interface ``TypedCollection``**
     *
     * Para coleções que importam-se com o tipo dos valores armazenados o método ``set`` efetuará
     * uma verificação de seu tipo usando para isso o método ``isValidType()``.
     *
     * @var         string
     */
    protected string $messageInvalidValue = "Invalid collection value.";



    /**
     * Indica se o nome da chave de cada entrada deve ser controlada pela própria instância.
     *
     * Se ``true`` irá controlar tal valor como se fosse um ``array`` comum dando a cada chave
     * de entrada um valor igual a um número inteiro iniciando em zero.
     *
     * @var         bool
     */
    protected bool $autoIncrementCollection = false;



    /**
     * Guarda o valor do índice a ser usado na próxima entrada de valores para o caso de ser uma
     * instância definida como ``autoIncrementCollection``.
     *
     * @var         int
     */
    protected int $nextKeyValue = 0;



    /**
     * Quando ``true`` indica que a classe está sendo instanciada neste instante e portanto
     * algumas regras podem ser suspensas ou agir de forma diferente do restante do tempo.
     *
     * Normalmente apenas impede que a classe seja reconhecida como ``readOnly`` para permitir o
     * set dos dados durante a construção da instância.
     *
     * @var         bool
     */
    private bool $constructorActive = false;










    /**
     * Indica se uma interface está ou não implementada na classe concreta.
     *
     * @param       string $interface
     *              Nome da interface.
     *
     * @return      bool
     *              Retorna ``true`` ou ``false`` indicando se a instância implementa a interface
     *              da namespace ``AeonDigital\\Interfaces\\Collection`` de nome passado.
     */
    protected function isImplement(string $interface): bool
    {
        $iName = "AeonDigital\\Interfaces\\Collection\\" . $interface;
        return \in_array($iName, \class_implements($this));
    }



    /**
     * Indica se a coleção implementa a interface ``iProtectedCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que a coleção manterá o estado de todos os seus
     *              objetos não permitindo que eles sejam alterados, no entanto os valores uma
     *              vez definidos PODEM ser excluídos.
     */
    public function isProtected(): bool
    {
        return $this->isImplement("iProtectedCollection");
    }



    /**
     * Indica se a coleção implementa a interface ``iAppendOnlyCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que a coleção pode ser apenas incrementada mas jamais
     *              modificada nem reduzida.
     */
    public function isAppendOnly(): bool
    {
        return $this->isImplement("iAppendOnlyCollection");
    }



    /**
     * Indica se a coleção implementa a interface ``iReadOnlyCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que a coleção não pode ser alterada após ser definida
     *              durante a construção da instância.
     */
    public function isReadOnly(): bool
    {
        return ($this->isImplement("iReadOnlyCollection") && $this->constructorActive === false);
    }



    /**
     * Indica se a coleção implementa a interface ``iCaseInsensitiveCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que os nomes das chaves de cada entrada de dados será
     *              tratado de forma ``case insensitive``, ou seja, ``KeyName = keyname = KEYNAME``.
     */
    public function isCaseInsensitive(): bool
    {
        return $this->isImplement("iCaseInsensitiveCollection");
    }



    /**
     * Uma instância com a característica ``autoincrement`` deve permitir que seja omitido o nome
     * das chaves no método ``set`` pois este deve ser controlado internamente como se fosse um
     * ``array`` iniciado em zero.
     *
     * Ainda assim o tratamento das chaves sempre se dará como se fossem ``strings`` e não
     * numerais inteiros como ocorre em um ``array comum``.
     *
     * As implementações desta caracteristica devem também controlar os índices quando estes são
     * removidos. A regra geral é que TODOS os itens existentes mantenham como chave o índice
     * correspondente a sua real posição.
     *
     * ``` php
     *      // Neste caso uma coleção com 10 itens que execute 5 vezes a instrução:
     *      $collection->remove("0");
     *      // Ficará, ao final com 5 itens cada qual ocupando uma posição entre 0 e 4.
     * ```
     *
     * @return      bool
     *              Retorna ``true`` quando a coleção é do tipo ``autoincrement``.
     */
    public function isAutoIncrement(): bool
    {
        return $this->autoIncrementCollection;
    }




















    /**
     * Dada o nome de uma chave de valor, trata-a para converte-la em um formato que seja
     * compatível com aquele que é esperado para a classe concreta.
     *
     * Para a maioria dos casos este método deverá retornar o próprio nome da chave que está
     * sendo entregue via parametro ``$key``.
     *
     *
     * **Interface ``iCaseInsensitiveCollection``**
     *
     * Usando esta interface o valor da chave será convertido em sua versão em ``lowercase``
     * facilitando assim operações de comparação entre chaves que são iguais excetuando pelo uso
     * de ``upper/lower`` case em sua formatação.
     *
     *
     * **Outros casos**
     *
     * Em outras classes concretas podem ter necessidades específicas de prefixar ou posfixar
     * algum valor ao nome da chave.
     *
     * Em outras classes concretas é possível que seja necessário executar alguma transformação do
     * nome da chave usando o próprio valor a ser definido.
     *
     * Para todos estes casos é importante que TODOS os métodos que referenciem-se a uma posição
     * definida na ``collection`` passe ANTES por esta transformação.
     *
     * @param       string $key
     *              Chave que será transformada (se necessário).
     *
     * @param       mixed $value
     *              Valor que está sendo definido no momento.
     *
     * @return      string
     *              Chave no formato de uso interno real.
     */
    protected function useKey(string $key, mixed $value = null): string
    {
        $useK = (($this->isCaseInsensitive() === false) ? $key : \mb_strtolower($key));
        if ($this->autoIncrementCollection === true) {
            foreach ($this->collection as $i => $v) {
                if ($v["value"] === $useK) {
                    $useK = (string)$i;
                    break;
                }
            }
        }
        return $useK;
    }



    /**
     * Executa, se necessário, uma verificação e/ou transformação no valor que está sendo definido.
     *
     * Ocorre SEMPRE durante a execução do método ``set`` ANTES de efetivamente validar seu tipo
     * e então definir o valor novo para a coleção.
     *
     *
     * **Casos variados**
     *
     * Há casos onde os valores da coleção precisam ser armazenados utilizando alguma transformação
     * específica (alterando encoding por exemplo, ou convertendo um string em um JSON que será
     * então convertido em objeto...) para qualquer destes casos, este é o momento em que tal
     * alteração deve ocorrer.
     *
     *
     * @param       mixed $value
     *              Valor que será verificado ou transformado.
     *
     * @param       mixed $oldValue
     *              Se já há um valor definido para a chave, este deverá ser enviado para possível uso.
     *
     * @return      mixed
     *              Valor retornado após a transformação.
     */
    protected function beforeSet($value, mixed $oldValue = null): mixed
    {
        $useVal = $value;
        if ($this->isProtected() === true) {
            if (\is_array($useVal) === true) {
                $useVal = \array_merge($useVal, []);
            } elseif (\is_object($useVal) === true) {
                $useVal = clone $useVal;
            }
        }
        return $useVal;
    }



    /**
     * Efetua a verificação do tipo de dado que está sendo passado e valida-o permitindo assim, ou
     * não, seu armazenamento.
     *
     * Este método NÃO PODE lançar ``exceptions``.
     *
     *
     * **Interface ``iTypedCollection``**
     *
     * Este método visa dar suporte para esta interface.
     *
     *
     * @param       mixed $value
     *              Valor que será testado.
     *
     * @return      bool
     *              Retorna ``true`` ou ``false`` mas PODE/DEVE, em caso ``false`` alterar o valor da
     *              propriedade ``messageInvalidValue`` de forma que esta dê informações mais
     *              específicas sobre o motivo da falha e aponte o que era esperado de ser recebido.
     */
    protected function isValidType(mixed $value): bool
    {
        return true;
    }



    /**
     * Executa, se necessário, algum processamento na coleção no momento **IMEDIATAMENTE
     * POSTERIOR** a um novo valor haver sido definido.
     *
     * @param       string $key
     *              Chave que foi adicionada já no formato de uso interno.
     *
     * @param       mixed $value
     *              Valor que foi adicionado já após qualquer alteração executada anteriormente.
     *
     * @return      void
     */
    protected function afterSet(string $key, mixed $value): void
    {
    }



    /**
     * Executa, se necessário, uma verificação e/ou transformação no valor que está sendo resgatado.
     *
     * Ocorre SEMPRE durante a execução do método ``get`` ANTES de efetivamente devolver o valor.
     *
     * Nas implementações comuns deve ser retornado o valor alvo ou ``undefined`` caso a chave indicada
     * não exista.
     *
     *
     * **Interface ``iProtectedCollection``**
     * **Interface ``iAppendOnlyCollection``**
     * **Interface ``iReadOnlyCollection``**
     *
     * Para qualquer destas interfaces, quando for para retornar um valor que é a instância de um
     * dado objeto, este deve ser clonado ANTES de ser devolvido. Isto garante que a coleção
     * permanece a mesma, sem alterações indevidas.
     *
     * @param       mixed $key
     *              Chave alvo da ação ``get``.
     *
     * @return      mixed
     *              Valor devidamente transformado, quando necessário.
     */
    protected function beforeGet(string $key): mixed
    {
        $useVal = null;
        if ($this->has($key) === true) {
            $useVal = $this->collection[$this->useKey($key)]["value"];

            if ($this->isProtected() === true) {
                if (\is_array($useVal) === true) {
                    $useVal = \array_merge($useVal, []);
                } elseif (\is_object($useVal) === true) {
                    $useVal = clone $useVal;
                }
            }
        }
        return $useVal;
    }




















    /**
     * Indica se a chave de nome indicado existe entre os itens da coleção.
     *
     * @param       string $key
     *              Nome da chave que será identificada.
     *
     * @return      bool
     *              Retorna ``true`` caso a chave indicada existir entre os itens da coleção ou
     *              ``false`` se não existir.
     */
    public function has(string $key): bool
    {
        return isset($this->collection[$this->useKey($key)]);
    }



    /**
     * Insere um novo item chave/valor para a coleção de dados.
     *
     * Se já existe um valor com chave de mesmo nome então, o valor antigo será substituído.
     *
     * @param       string $key
     *              Nome da chave.
     *              Pode ser usado ``''`` caso a instância seja do tipo ``autoincrement``.
     *
     * @param       mixed $value
     *              Valor que será associado a esta chave.
     *
     * @return      bool
     *              Retorna ``true`` quando a insersão/atualização do item foi bem sucedido.
     */
    public function set(string $key, mixed $value): bool
    {
        $r = false;

        if ($this->isReadOnly() === false) {
            if ($this->autoIncrementCollection === true) {
                $key = (string)$this->nextKeyValue;
            }

            $useKey = $this->useKey($key, $value);
            $hasKey = $this->has($useKey);
            $oldValue = (($hasKey === true) ? $this->get($useKey) : null);


            if ($hasKey === true && ($this->isAppendOnly() === true || $this->isProtected() === true)) {
                $r = false;
            } else {
                $value = $this->beforeSet($value, $oldValue);

                if ($this->isValidType($value) === true) {
                    $this->collection[$useKey] = ["originalkey" => $key, "value" => $value];
                    $this->afterSet($useKey, $value);

                    if ($this->autoIncrementCollection === true) {
                        $this->nextKeyValue++;
                    }

                    $r = true;
                }
            }
        }

        return $r;
    }



    /**
     * Resgata um valor da coleção a partir do nome da chave indicada.
     *
     * @param       string $key
     *              Nome da chave cujo valor deve ser retornado.
     *
     * @return      mixed
     *              Valor armazenado na ``collection`` que correspondente a chave passada.
     *              DEVE retornar ``null`` quando a chave de nome indicado não existir.
     */
    public function get(string $key): mixed
    {
        return $this->beforeGet($key);
    }



    /**
     * Remove da coleção o item com a chave indicada.
     *
     * @param       string $key
     *              Nome da chave do valor que será excluído.
     *
     * @return      bool
     *              Retornará ``true`` se a chave foi removida, ou, se, ela não existia dentro
     *              da coleção atual e ``false`` caso por algum motivo não seja possível executar
     *              este método.
     */
    public function remove(string $key): bool
    {
        $r = false;

        if ($this->isReadOnly() === false && $this->isAppendOnly() === false) {
            if ($this->has($key) === true) {
                unset($this->collection[$this->useKey($key)]);
                if ($this->autoIncrementCollection === true) {
                    $this->nextKeyValue--;
                    $this->remakeAutoIncrementIndex();
                }
            }
            $r = true;
        }

        return $r;
    }




















    /**
     * Inicia uma nova coleção de dados.
     *
     *
     * @param       ?array $initialValues
     *              Valores com os quais a instância deve iniciar.
     *
     * @param       bool $autoincrement
     *              Quando ``true`` permite que seja omitido o nome da chave dos valores pois eles
     *              serão definidos internamente conforme fosse um ``array`` começando em zero.
     *
     * @throws      \InvalidArgumentException
     *              Caso algum dos valores iniciais a serem definidos não seja aceito.
     */
    function __construct(?array $initialValues = [], bool $autoincrement = false)
    {
        if ($initialValues === null) {
            $initialValues = [];
        }

        $this->constructorActive = true;

        $this->autoIncrementCollection = $autoincrement;
        $this->insertValues($initialValues);

        $this->constructorActive = false;
    }





    /**
     * Insere na coleção todos os dados passados via parametro ``$values``.
     *
     * @param       array $values
     *              Coleção de valores que serão adicionados.
     *
     * @return      bool
     */
    protected function insertValues(array $values): bool
    {
        $r = true;
        if (\count($values) > 0) {
            foreach ($values as $k => $v) {
                if ($r === true) {
                    $r = $this->set((string)$k, $v);
                }
            }
        }
        return $r;
    }



    /**
     * Remonta os índices dos objetos internos para que eles mantenham coesão com relação a
     * suas posições no ``array de valores``.
     *
     * @return      void
     */
    protected function remakeAutoIncrementIndex(): void
    {
        $nCollection = [];

        $c = 0;
        foreach ($this->collection as $val) {
            $nCollection[(string)$c] = $val;
            $c++;
        }

        $this->collection = $nCollection;
    }





    /**
     * Retorna toda a coleção atualmente armazenada em um ``array associativo``
     * ``[ string => mixed ]``.
     *
     * Em caso de uma coleção vazia será retornado ``[]``.
     *
     * Prioriza o retorno das chaves conforme usadas internamente pois considera que se há uma
     * alteração nelas deve-se a alguma importância relacionado a seu formato de uso.
     *
     * @param       bool $originalKeys
     *              Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
     *              Se no armazenamento interno elas sofrerem qualquer alteração e for definido
     *              ``false`` então elas retornarão seu formato alterado.
     *
     * @param       ?callable $keyTransform
     *              Quando for definido E ``$originalKeys = false`` será usado para converter as
     *              chaves da coleção da forma que for definida na função.
     *
     * @return      array
     */
    protected function retrieveCollection(?bool $originalKeys = false, ?callable $keyTransform = null): array
    {
        $r = [];
        foreach ($this->collection as $key => $value) {
            $k = (string)$value["originalkey"];
            if ($originalKeys === false) {
                $k = (string)$key;
                // @codeCoverageIgnoreStart
                // O trecho abaixo não precisa ser coberto pois depende
                // da definição do argumento "$keyTransform" que, por ser um
                // objeto "callable", deve ser testado de forma separada.
                if ($keyTransform !== null) {
                    $k = (string)$keyTransform($k);
                }
                // @codeCoverageIgnoreEnd
            }

            $r[$k] = $this->get($k);
        }
        return $r;
    }




    /**
     * Retorna a coleção de chaves existentes no momento.
     *
     * @return      array
     *              As chaves retornadas estarão no formato que estão sendo efetivamente utilizadas
     *              no ``array collection``.
     *              Retornará ``[]`` se a coleção for vazia.
     */
    protected function retrieveAllKeys(): array
    {
        return \array_keys($this->collection);
    }















    /**
     * Método que permite a verificação da existência de um valor usando a notação de
     * ``array associativo`` em conjunto com as funções ``isset()`` e ``empty()`` do PHP:
     *
     * ``` php
     *      $oCollect = new iBasicCollection();
     *      ...
     *      if (isset($oCollect["keyName"])) { ... }
     * ```
     *
     * @param       mixed $offset
     *              Chave que será verificada.
     *
     * @link        http://php.net/manual/pt_BR/arrayaccess.offsetexists.php
     *
     * @return      bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return $this->has($offset);
    }



    /**
     * Método que permite resgatar o valor de um item da coleção da instância usando a
     * notação de ``array associativo``.
     *
     * ``` php
     *      $oCollect = new iBasicCollection();
     *      if ($oCollect["keyName"] == $value) { ... }
     * ```
     *
     * @param       mixed $offset
     *              Nome da chave cujo valor deve ser retornado.
     *
     * @link        http://php.net/manual/pt_BR/arrayaccess.offsetget.php
     *
     * @return      mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->get($offset);
    }



    /**
     * Método que permite inserir um novo valor para a coleção de dados da instância usando a
     * notação de um ``array associativo``.
     *
     * ``` php
     *      $oCollect = new iBasicCollection();
     *      $oCollect["keyName"] = $value;
     * ```
     *
     * @param       mixed $offset
     *              Nome da chave.
     *
     * @param       mixed $value
     *              Valor que será associado.
     *
     * @link        http://php.net/manual/pt_BR/arrayaccess.offsetset.php
     *
     * @return      void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->set($offset, $value);
    }



    /**
     * Método que permite remover o valor de um item da coleção da instância usando a notação
     * de ``array associativo`` em conjunto com a função ``unset()`` do PHP:
     *
     * ``` php
     *      $oCollect = new iBasicCollection();
     *      unset($oCollect["keyName"]);
     * ```
     *
     * @param       mixed $offset
     *              Nome da chave cujo valor deve ser retornado.
     *
     * @link        http://php.net/manual/pt_BR/arrayaccess.offsetunset.php
     *
     * @return      void
     */
    public function offsetUnset(mixed $offset): void
    {
        $this->remove($offset);
    }











    /**
     * Método que permite a verificação da quantidade de itens na coleção atual usando a função
     * ``count()`` do PHP.
     *
     * ``` php
     *      $oCollect = new iBasicCollection();
     *      ...
     *      if (count($oCollect) > 1) { ... }
     * ```
     *
     * @link        http://php.net/manual/pt_BR/countable.count.php
     *
     * @return      int
     */
    public function count(): int
    {
        return \count($this->collection);
    }











    /**
     * Método que permite a iteração sobre os valores armazenados na coleção de dados da instância
     * usando ``foreach()`` do PHP.
     *
     * ``` php
     *      $oCollect = new iBasicCollection();
     *      ...
     *      foreach($oCollect as $key => $value) { ... }
     * ```
     *
     * @link        http://php.net/manual/pt_BR/iteratoraggregate.getiterator.php
     *
     * @return      \Traversable
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->retrieveCollection(false));
    }










    /**
     * Desabilita a função mágica ``__set`` para assegurar a que apenas alterações dentro das
     * regras definidas para a classe sejam possíveis.
     *
     * @codeCoverageIgnore
     */
    public function __set(string $name, mixed $value): void
    {
        // Não produz efeito
    }
}
