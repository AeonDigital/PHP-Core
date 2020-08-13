<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Field\Complex\fROFieldArray as fROFieldArray;
use AeonDigital\Interfaces\Objects\iDataModel as iDataModel;
use AeonDigital\Interfaces\Objects\iField as iField;






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
     * Valores estáticos sobre cada modelo de dados já instanciados.
     *
     * @var         array
     */
    protected static array $staticInfoDataModel = [];
    /**
     * Coleção "fácil" para atingir os objetos dos campos de dados.
     *
     * @var         array
     */
    protected array $fieldObjects = [];





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
        return \in_array($fieldName, static::$staticInfoDataModel[$this->getName()]["fieldNames"]);
    }
    /**
     * Retorna a contagem total dos campos existentes para este modelo de dados.
     *
     * @return      int
     */
    public function countFields() : int
    {
        return static::$staticInfoDataModel[$this->getName()]["countFields"];
    }
    /**
     * Retorna um ``array`` contendo o nome de cada um dos campos existentes neste
     * modelo de dados.
     *
     * @return      array
     */
    public function getFieldNames() : array
    {
        return static::$staticInfoDataModel[$this->getName()]["fieldNames"];
    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos definidos para o
     * modelo atual e seus respectivos valores iniciais.
     *
     * @return      array
     */
    public function getInitialDataModel() : array
    {
        return static::$staticInfoDataModel[$this->getName()]["initialDataModel"];
    }





    /**
     * Retornará ``true`` caso todos os campos estejam definidos em conformidade
     * com seus respectivos critérios de validação.
     *
     * @return      bool
     */
    public function isValid() : bool
    {
        $r = true;
        foreach (static::$staticInfoDataModel[$this->getName()]["fieldNames"] as $fieldName) {
            $field = $this->getFieldObject($fieldName);

            if ($field->isDataModelCollection() === true) {
                foreach ($field->toArray() as $i => $subModel) {
                    $r = $subModel->isValid();
                    if ($r === false) { break; break; }
                }
            }
            else {
                $r = $field->isValid();
                if ($r === false) { break; }
            }
        }
        return $r;
    }










    /**
     * Retorna o objeto ``iField`` correspondente ao nome de campo indicado.
     *
     * @param       string $fieldName
     *              Nome do campo alvo.
     *
     * @return      iField
     *
     * @throws      \InvalidArgumentException
     *              Caso o nome do campo não seja válido.
     */
    protected function getFieldObject(string $fieldName) : iField
    {
        if (\key_exists($fieldName, $this->valueArray) === false) {
            $err = "Invalid or nonexistent \"fieldname\". Given [ $fieldName ]";
            throw new InvalidArgumentException();
        }
        else {
            return $this->valueArray[$fieldName]["value"];
        }
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
        $field = $this->getFieldObject($fieldName);
        if ($field->isIterable() === false) {
            return $field->set($v);
        }
        else {
            return $field->setValues($v, true);
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
        $field = $this->getFieldObject($fieldName);
        if ($field->isIterable() === false) {
            return $field->get();
        }
        else {
            return $field->getValues();
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
        $field = $this->getFieldObject($fieldName);
        if ($field->isIterable() === false) {
            return $field->getStorageValue();
        }
        else {
            return $field->getValues();
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
        $field = $this->getFieldObject($fieldName);
        if ($field->isIterable() === false) {
            return $field->getRawValue();
        }
        else {
            return $field->getValues();
        }
    }








    /**
     * Guarda as informações da última validação de valores realizada.
     *
     * @var         string|array
     */
    protected $lastValidateValuesState = "valid";
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
    public function validateValues(iterable $values, bool $checkAll = false) : bool
    {
        $r = true;
        $this->lastValidateValuesState = [];

        if ($checkAll === true) {
            $nValues = [];
            foreach (static::$staticInfoDataModel[$this->getName()]["fieldNames"] as $fieldName) {
                if (\key_exists($fieldName, $values) === false) {
                    $field = $this->getFieldObject($fieldName);
                    if ($field->isDataModel() === false) { $nValues[$fieldName] = $field->get(); }
                    else { $nValues[$fieldName] = $field->toArray(); }
                }
                else {
                    $nValues[$fieldName] = $values[$fieldName];
                }
            }

            foreach ($values as $fieldName => $value) {
                if (\key_exists($fieldName, $nValues) === false) {
                    $nValues[$fieldName] = $value;
                }
            }

            $values = $nValues;
        }


        foreach ($values as $fieldName => $value) {
            $result = "valid";
            if ($this->hasField($fieldName) === false) {
                $result = "error.obj.field.does.not.exists";
            }
            else {
                $field = $this->getFieldObject($fieldName);
                $field->validateValue($value);
                $result = $field->getLastValidateState();
            }

            $this->lastValidateValuesState[$fieldName] = $result;
            if ($result !== "valid") {
                $r = false;
            }
        }

        if ($r === true) {
            $this->lastValidateValuesState = "valid";
        }

        return $r;
    }
    /**
     * Retorna o estado detalhado da última execução de uma validação feita usando
     * o método ``validateValues``.
     *
     * @return      string|array
     */
    public function getLastValidateValuesState()
    {
        return $this->lastValidateValuesState;
    }
    /**
     * Retorna o estado detalhado do modelo de dados com os valores atualmente definidos.
     *
     * @return      string|array
     */
    public function getCurrentModelState()
    {
        $tmp = $this->lastValidateValuesState;
        $this->validateValues([], true);

        $r = $this->lastValidateValuesState;
        $this->lastValidateValuesState = $tmp;
        return $r;
    }




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
    public function setValues(iterable $values, bool $checkAll = false) : bool
    {
        foreach ($values as $fieldName => $value) {
            $this->setFieldValue($fieldName, $value);
        }
    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e
     * seus respectivos valores atualmente definidos.
     *
     * @return      array
     */
    public function getValues() : array
    {
        return $this->toArray();
    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos usando seus formatos de armazenamento.
     *
     * @return      array
     */
    public function getStorageValues() : array
    {
        return $this->toArray(false, false, true, false);
    }
    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos em seus formatos ``raw``.
     *
     * @return      array
     */
    public function getRawValues() : array
    {
        return $this->toArray(false, false, false, true);
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

        $this->isModel = true;
        $fields = static::prepareFields($fields);
        $this->fieldObjects = \array_values($fields);

        parent::__construct($name, $description, $fields);

        if (key_exists($name, static::$staticInfoDataModel) === false) {
            static::$staticInfoDataModel[$name] = [
                "fieldNames"        => \array_keys($fields),
                "countFields"       => \count($fields),
                "initialDataModel"  => static::retrieveAtualDataModel($fields)
            ];
        }
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
        return static::retrieveAtualDataModel(
            $this->fieldObjects, $originalKeys, $notNull, $storageFormat, $rawFormat
        );
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




    /**
     * Prepara a coleção de campos inicialmente informados para serem adicionados
     * no modelo de dados.
     *
     * @param       iterable|null $fields
     *              Objeto iterable contendo a coleção de campos do modelo de dados.
     *
     * @return      array
     */
    protected static function prepareFields(iterable $fields) : array
    {
        $arr = [];

        foreach ($fields as $key => $fieldData) {
            $fName = null;
            $fField = null;

            if ($fieldData instanceof iField) {
                $fName = $fieldData->getName();
                $fField = $fieldData;
            }
            elseif (\is_array($fieldData) === true) {
                $fName = $fieldData["name"];

                $name           = \iterable_check_default($fieldData, "name", "");
                $description    = \iterable_check_default($fieldData, "description", "");
                $type           = \iterable_check_default($fieldData, "type", "");
                $readOnly       = \iterable_check_default($fieldData, "readOnly", false);
                $allowNull      = \iterable_check_default($fieldData, "allowNull", false);
                $allowEmpty     = \iterable_check_default($fieldData, "allowEmpty", true);
                $unsigned       = \iterable_check_default($fieldData, "unsigned", false);
                $default        = \iterable_check_default($fieldData, "default", null);
                $min            = \iterable_check_default($fieldData, "min", null);
                $max            = \iterable_check_default($fieldData, "max", null);
                $enumerator     = \iterable_check_default($fieldData, "enumerator", null);
                $inputFormat    = \iterable_check_default($fieldData, "inputFormat", null);


                $classNS    = "Commom";
                $classRO    = (($readOnly === true)     ? "RO"  : "");
                $classN     = (($allowNull === true)    ? "N"   : "");
                $classE     = (($allowEmpty === false)  ? "NE"  : "");
                $classU     = (($unsigned === true)     ? "U"   : "");
                $classArray = "";


                if (\key_exists("modelName", $fieldData) === true) {
                    $type       = "Field";
                    $classNS    = "Complex";
                    $classArray = ((\strpos($fieldData["modelName"], "[]") === false) ? "" : "Array");
                    $readOnly   = false;
                    $allowEmpty = true;
                    $unsigned   = false;
                }

                $nsClass = "\\AeonDigital\\Objects\\Field\\$classNS\\f";
                $nsClass .= $classRO . $classN . $classU . $classE . $type . $classArray;

                $fField = new $nsClass(
                    $name, $description, undefined, $default, $min, $max, $enumerator, $inputFormat
                );
            }

            $arr[$fName] = $fField;
        }

        return $arr;
    }
    /**
     * Percorre o array de campos passado e então retorna um array associativo contendo
     * os dados atualmente setados em cada qual.
     *
     * @param       iterable $fields
     *              Coleção de campos que serão percorridos.
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
    protected static function retrieveAtualDataModel(
        iterable $fields,
        bool $originalKeys = false,
        bool $notNull = false,
        bool $storageFormat = false,
        bool $rawFormat = false
    ) : array {
        $arr = [];

        foreach ($fields as $field) {
            $val = $field->get();

            if ($notNull === false || ($notNull === true && $val !== null)) {
                if ($storageFormat === true) {
                    $val = $field->getStorageValue();
                }
                elseif ($rawFormat === true) {
                    $val = $field->getRawValue();
                }

                $arr[$field->getName()] = $val;
            }
        }

        return $arr;
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
        return $this->hasField((string)$key);
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
        return $this->getFieldValue((string)$key);
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
        $this->setFieldValue((string)$key, $v);
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
        // Não deve funcionar para modelos de dados
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
}
