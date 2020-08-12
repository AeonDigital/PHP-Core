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
}
