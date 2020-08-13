<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;

use AeonDigital\Interfaces\Objects\iField as iField;
use AeonDigital\Interfaces\Objects\iFieldArray as iFieldArray;







/**
 * Define um modelo de dados.
 * Trata-se da expanção de um ``iFieldArray``.
 *
 * @package     AeonDigital\Interfaces\DataModel
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDataModel extends iFieldArray
{





    /**
     * Retorna o nome do modelo de dados.
     *
     * @return      string
     */
    function getName() : string;
    /**
     * SET
     * Define o nome do modelo.
     * O nome de um modelo apenas pode aceitar caracteres ``a-zA-Z0-9_``.
     */



    /**
     * Retorna a descrição de uso/funcionalidade do modelo de dados.
     *
     * @return      string
     */
    function getDescription() : string;





    /**
     * Identifica se o campo com o nome indicado existe neste modelo de dados.
     *
     * @param       string $fieldName
     *              Nome do campo que será verificado.
     *
     * @return      bool
     */
    function hasField(string $fieldName) : bool;
    /**
     * Retorna a contagem total dos campos existentes para este modelo de dados.
     *
     * @return      int
     */
    function countFields() : int;
    /**
     * Retorna um ``array`` contendo o nome de cada um dos campos existentes neste
     * modelo de dados.
     *
     * @return      array
     */
    function getFieldNames() : array;
    /**
     * Retorna um ``array`` associativo contendo todos os campos definidos para o
     * modelo atual e seus respectivos valores iniciais.
     *
     * @return      array
     */
    function getInitialDataModel() : array;





    /**
     * Retornará ``true`` caso todos os campos estejam definidos em conformidade
     * com seus respectivos critérios de validação.
     *
     * @return      bool
     */
    function isValid() : bool;





    /**
     * Define um novo valor para o campo de nome indicado.
     *
     * @param       string $fieldName
     *              Nome do campo alvo.
     *
     * @param       mixed $v
     *              Valor a ser usado.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     *
     * @throws      \InvalidArgumentException
     *              Caso o nome do campo não seja válido.
     */
    function setFieldValue(string $fieldName, $v) : bool;
    /**
     * Retorna o valor atualmente definido para o campo de nome indicado.
     *
     * @param       string $fieldName
     *              Nome do campo alvo.
     *
     * @return      mixed
     *
     * @throws      \InvalidArgumentException
     *              Caso o nome do campo não seja válido.
     */
    function getFieldValue(string $fieldName);
    /**
     * Retorna o valor atualmente definido para o campo em seu formato de
     * armazenamento.
     *
     * Apenas terá um efeito se um ``inputFormat`` estiver definido neste campo,
     * caso contrário retornará o mesmo valor existente em ``getFieldValue``.
     *
     * @param       string $fieldName
     *              Nome do campo alvo.
     *
     * @return      mixed
     *
     * @throws      \InvalidArgumentException
     *              Caso o nome do campo não seja válido.
     */
    function getFieldStorageValue(string $fieldName);
    /**
     * Retorna o valor atualmente definido para o campo em seu formato ``raw``
     * que é aquele que foi passado na execução do método ``setFieldValue``.
     *
     * @param       string $fieldName
     *              Nome do campo alvo.
     *
     * @return      mixed
     *
     * @throws      \InvalidArgumentException
     *              Caso o nome do campo não seja válido.
     */
    function getFieldRawValue(string $fieldName);





    /**
     * Verifica se o valor indicado satisfaz os critérios de validação dos campos em
     * comum que ele tenha com o presente modelo de dados.
     *
     * Falhará sempre que forem definidos nomes de campos inexistentes no atual modelo
     * de dados.
     *
     * O estado da validação contendo os detalhes da mesma pode ser obtido com o
     * método ``getLastValidateValuesState``.
     *
     * @param       iterable $values
     *              Objeto com os valores a serem testados.
     *
     * @param       bool $checkAll
     *              Quando ``true`` apenas confirmará a validade da coleção de valores
     *              se com os mesmos for possível preencher todos os campos obrigatórios
     *              deste modelo de dados. Campos não declarados mas que possuem um
     *              valor padrão definido **SEMPRE** passarão neste tipo de validação.
     *
     * @return      bool
     */
    function validateValues(iterable $values, bool $checkAll = false) : bool;
    /**
     * Retorna o estado detalhado da última execução de uma validação feita usando
     * o método ``validateValues``.
     *
     * @return      string|array
     */
    function getLastValidateValuesState();
    /**
     * Retorna o estado detalhado do modelo de dados com os valores atualmente definidos.
     *
     * @return      string|array
     */
    function getCurrentModelState();


    /**
     * Permite definir o valor de inúmeros campos do modelo de dados a partir de um
     * objeto compatível.
     *
     * Apenas acolherá os valores passados caso tal definição torne o modelo como um
     * todo válido.
     *
     * @param       iterable $values
     *              Objeto com os valores a serem testados.
     *
     * @param       bool $checkAll
     *              Quando ``true`` apenas confirmará a validade da coleção de valores
     *              se com os mesmos for possível preencher todos os campos obrigatórios
     *              deste modelo de dados. Campos não declarados mas que possuem um
     *              valor padrão definido **SEMPRE** passarão neste tipo de validação.
     *
     * @return      bool
     *              Retornará ``true`` caso os valores passados tornem o modelo válido.
     */
    function setValues(iterable $values, bool $checkAll = false) : bool;


    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e
     * seus respectivos valores atualmente definidos.
     *
     * @return      array
     */
    function getValues() : array;
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos usando seus formatos de armazenamento.
     *
     * @return      array
     */
    function getStorageValues() : array;
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos em seus formatos ``raw``.
     *
     * @return      array
     */
    function getRawValues() : array;
}
