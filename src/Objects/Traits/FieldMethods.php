<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Traits;

use AeonDigital\Interfaces\Objects\iField as iField;








/**
 * Trait que traz o básico necessário para implementação da interface
 * ``iField`` em classes ``iType``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait FieldMethods
{



    /**
     * Nome do campo.
     */
    protected string $name = "";
    /**
     * Retorna o nome do campo.
     *
     * @return      string
     */
    public function getName() : string
    {
        return $this->name;
    }



    /**
     * Descrição de uso/funcionalidade do campo.
     *
     * @var         string
     */
    protected string $description = "";
    /**
     * Retorna a descrição de uso/funcionalidade do campo.
     *
     * @return      string
     */
    public function getDescription() : string
    {
        return $this->description;
    }





    /**
     * Indica se o campo é do tipo modelo de dados.
     */
    protected bool $isModel = false;
    /**
     * Indica quando o campo é um modelo de dados.
     *
     * @return      bool
     */
    public function isDataModel() : bool
    {
        return $this->isModel;
    }
    /**
     * Indica se o campo é um array de modelo de dados.
     */
    protected bool $isModelCollection = false;
    /**
     * Indica quando o campo é um array de modelos de dados.
     *
     * @return      bool
     */
    public function isDataModelCollection() : bool
    {
        return $this->isModelCollection;
    }










    /**
     * Informa se o último valor que foi passado para um método ``set`` é válido.
     * Em campos ``iModel`` retornará ``true`` se todos os valores definidos forem
     * válidos.
     *
     * @return      bool
     */
    public function isCurrentFieldStateValid() : bool
    {
        $r = ($this->fieldState["state"] === "valid");
        if ($this->iterable === true) {
            $r = true;
            foreach ($this->fieldArrayState["state"] as $k => $state) {
                if ($r === true && $state !== "valid") {
                    $r = false;
                    break;
                }
            }
        }
        return $r;
    }
    /**
     * Retorna o código de estado atual deste campo.
     *
     * **Campos Simples**
     * Retornará ``valid`` se o último valor que foi passado para o campo tiver sido
     * aceito; Caso contrário retornará o código de erro obtido da validação.
     *
     * **Campos Array**
     * Retornará ``valid`` caso **TODOS** os valores contidos no array estejam de acordo
     * com os critérios de aceite; Caso contrário retornará um array associativo contendo
     * a coleção de chaves existentes e seus respectivos códigos de validação.
     *
     * @param       bool $recheckAll
     *              Quando ``true`` efetuará a revalidação do campo obtendo assim
     *              a informação precisa sobre o/s valor/es que está/ão definido/s
     *              neste instante.
     *
     * @return      string|array
     */
    public function getCurrentFieldState(bool $recheckAll = false)
    {
        if ($recheckAll === true) {
            if ($this->iterable === false) {
                $this->protectedSet($this->valueRaw);
            }
            else {
                foreach ($this->valueArray as $key => $data) {
                    $this->setKeyValue($data["key"], $data["valueRaw"]);
                }
            }
        }


        $r = $this->fieldState["state"];
        if ($this->iterable === true) {
            $r = (($this->isCurrentFieldStateValid() === true) ? "valid" : $this->fieldArrayState["state"]);
        }
        return $r;
    }
}
