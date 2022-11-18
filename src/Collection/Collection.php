<?php

declare(strict_types=1);

namespace AeonDigital\Collection;

use AeonDigital\Interfaces\Collection\iCollection as iCollection;
use AeonDigital\Collection\BasicCollection as BasicCollection;






/**
 * Classe plena para lidar com coleções de dados.
 *
 * Implementa ``iCollection`` que expande as funcionalidades de coleções do tipo
 * ``iBasicCollection`` permitindo a manipulação dos valores da coleção em processos
 * de lote.
 *
 * @package     AeonDigital\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class Collection extends BasicCollection implements iCollection
{





    /**
     * Retorna toda a coleção atualmente armazenada em um ``array associativo``
     * ``[ string => mixed ]``.
     *
     * Em caso de uma coleção vazia será retornado ``[]``.
     *
     * Prioriza o retorno das chaves conforme usadas internamente pois considera que se
     * há uma alteração nelas deve-se a alguma importância relacionado a seu formato de uso.
     *
     * @param ?bool $originalKeys
     * Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
     * Se no armazenamento interno elas sofrerem qualquer alteração e for definido
     * ``false`` então elas retornarão seu formato alterado.
     *
     * @return array
     */
    public function toArray(?bool $originalKeys = false): array
    {
        return $this->retrieveCollection($originalKeys);
    }



    /**
     * Permite inserir multiplos dados de uma única vez na coleção.
     *
     * @param array $newValues
     * ``array associativo`` contendo os novos valores a serem definidos para a coleção.
     *
     * @return bool
     * Retornará ``true`` caso TODOS os novos valores sejam adicionados e ``false``
     * caso 1 deles falhe.
     *
     * @throws \InvalidArgumentException
     * DEVE ser lançado caso algum dos valores passados seja ``undefined``.
     */
    public function insert(array $newValues): bool
    {
        return $this->insertValues($newValues);
    }



    /**
     * Limpa totalmente a coleção de dados eliminando toda informação armazenada no momento.
     *
     * @return bool
     * Retornará ``true`` caso a exclusão dos dados tenha sido executada com sucesso
     * e ``false`` caso ocorra algum erro em algum dos itens. Neste caso, a coleção
     * ficará pela metade.
     */
    public function clean(): bool
    {
        $r = true;
        foreach ($this->retrieveAllKeys() as $k) {
            if ($r === true) {
                $r = $this->remove((string)$k);
            }
        }
        return $r;
    }










    /**
     * Inicia nova coleção de dados.
     *
     *
     * @param ?array $initialValues
     * Valores com os quais a instância deve iniciar.
     *
     * @param bool $autoincrement
     * Quando ``true`` permite que seja omitido o nome da chave dos valores pois eles
     * serão definidos internamente conforme fosse um array começando em zero.
     *
     *
     * @throws \InvalidArgumentException
     * Caso algum dos valores iniciais a serem definidos não seja aceito.
     */
    function __construct(?array $initialValues = [], bool $autoincrement = false)
    {
        parent::__construct($initialValues, $autoincrement);
    }
}
