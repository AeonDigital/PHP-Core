<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Field\Complex\fROFieldArray as fROFieldArray;
use AeonDigital\Interfaces\Objects\iDataModel as iDataModel;







/**
 * Modelo de dados ``iDataModel``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class DataModel extends fROFieldArray implements iDataModel
{



    /**
     * Valores iniciais desta instância.
     *
     * @var         array
     */
    protected array $initialDataModel = [];





    /**
     * Retorna o nome do modelo de dados.
     *
     * @return      string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * Retorna a descrição de uso/funcionalidade do modelo de dados.
     *
     * @return      string
     */
    public function getDescription() : string
    {
        return $this->description;
    }



    /**
     * Identifica se o campo com o nome indicado existe neste modelo de dados.
     *
     * @param       string $fieldName
     *              Nome do campo que será verificado.
     *
     * @return      bool
     */
    public function hasField(string $fieldName) : bool
    {
        return $this->hasKeyValue($fieldName);
    }
    /**
     * Retorna a contagem total dos campos existentes para este modelo de dados.
     *
     * @return      int
     */
    public function countFields() : int
    {
        return $this->count();
    }
    /**
     * Retorna um ``array`` contendo o nome de cada um dos campos existentes neste
     * modelo de dados.
     *
     * @return      array
     */
    public function getFieldNames() : array
    {
        return \array_keys($this->valueArray);
    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos definidos para o
     * modelo atual e seus respectivos valores iniciais.
     *
     * @return      array
     */
    public function getInitialDataModel() : array
    {
        return $this->initialDataModel;
    }





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
    public function setFieldValue(string $fieldName, $v) : bool
    {
        if ($this->hasField($fieldName) === false) {
            $err = "Invalid or nonexistent \"fieldname\". Given [ $fieldName ]";
            throw new InvalidArgumentException();
        }
        else {
            $field = $this->getKeyValue($fieldName);

            if ($field->isIterable() === false) {
                return $field->set($v);
            }
            else {
                return $field->setValues($v, true);
            }
        }
    }



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
    public function getFieldValue(string $fieldName)
    {
        if ($this->hasField($fieldName) === false) {
            $err = "Invalid or nonexistent \"fieldname\". Given [ $fieldName ]";
            throw new InvalidArgumentException();
        }
        else {
            $field = $this->getKeyValue($fieldName);

            if ($field->isIterable() === false) {
                return $field->get($v);
            }
            else {
                return $field->getValues();
            }
        }
    }
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
    public function getFieldStorageValue(string $fieldName)
    {
        if ($this->hasField($fieldName) === false) {
            $err = "Invalid or nonexistent \"fieldname\". Given [ $fieldName ]";
            throw new InvalidArgumentException();
        }
        else {
            $field = $this->getKeyValue($fieldName);

            if ($field->isIterable() === false) {
                return $field->get($v);
            }
            else {
                return $field->getStorageValues();
            }
        }
    }
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
    public function getFieldRawValue(string $fieldName)
    {
        if ($this->hasField($fieldName) === false) {
            $err = "Invalid or nonexistent \"fieldname\". Given [ $fieldName ]";
            throw new InvalidArgumentException();
        }
        else {
            $field = $this->getKeyValue($fieldName);

            if ($field->isIterable() === false) {
                return $field->get($v);
            }
            else {
                return $field->getRawValues();
            }
        }
    }










    /**
     * Verifica se o valor indicado satisfaz os critérios de validação dos campos em
     * comum que ele tenha com o presente modelo de dados.
     *
     * Falhará sempre que forem definidos nomes de campos inexistentes no atual modelo
     * de dados.
     *
     * O estado da validação contendo os detalhes da mesma pode ser obtido com o
     * método ``getCurrentFieldState``.
     *
     * @param       ?iterable $values
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
    public function validateValues(?iterable $values, bool $checkAll = false) : bool
    {

    }





    /**
     * Permite definir o valor de inúmeros campos do modelo de dados a partir de um
     * objeto compatível.
     *
     * Apenas acolherá os valores passados caso tal definição torne o modelo como um
     * todo válido.
     *
     * @param       ?iterable $values
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
    public function setValues(?iterable $values, bool $checkAll = false) : bool
    {

    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e
     * seus respectivos valores atualmente definidos.
     *
     * @return      array
     */
    public function getValues() : array
    {

    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos usando seus formatos de armazenamento.
     *
     * @return      array
     */
    public function getStorageValues() : array
    {

    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos em seus formatos ``raw``.
     *
     * @return      array
     */
    public function getRawValues() : array
    {

    }










    /**
     * Inicia um novo modelo de dados.
     *
     * @param       string $name
     *              Nome do modelo de dados.
     *
     * @param       string $description
     *              Descrição.
     *
     * @param       iterable $fields
     *              Campos que esta instância terá.
     *
     * @throws      \InvalidArgumentException
     *              Caso algum valor passado não seja válido.
     */
    function __construct(
        string $name,
        string $description,
        iterable $fields
    ) {
        \preg_match("/^[a-zA-Z0-9_]+$/", $name, $fnd);
        if (\count($fnd) === 0) {
            $err = "Invalid value defined for \"name\". Expected string that matches the ``a-zA-Z0-9_`` pattern. Given: [ $name ]";
            throw new \InvalidArgumentException($err);
        }
        $this->name = $name;
        $this->description = $description;
        parent::__construct($fields);
    }





    /**
     * Retorna uma instância definida com as propriedades indicadas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iDataModel
     */
    public static function fromArray(array $cfg) : iDataModel
    {
        return new self(
            ((\key_exists("name", $cfg) === true)           ? $cfg["name"]          : ""),
            ((\key_exists("description", $cfg) === true)    ? $cfg["description"]   : ""),
            ((\key_exists("fields", $cfg) === true)         ? $cfg["fields"]         : [])
        );
    }
}
