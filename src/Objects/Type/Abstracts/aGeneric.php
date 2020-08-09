<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Interfaces\Objects\iType as iType;
use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Interfaces\Objects\Types\iGeneric as iGeneric;







/**
 * Extende a classe ``aType`` para atender a interface ``iGeneric``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aGeneric extends aType implements iGeneric
{



    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      mixed
     */
    public function getNullEquivalent()
    {
        return null;
    }
    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      mixed
     */
    public function getDefault()
    {
        return $this->valueDefault;
    }
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     * Em tipos ``String`` informa o menor número de caracteres que um valor deve ter.
     *
     * @return      mixed
     */
    public function getMin()
    {
        return null;
    }
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     * Em tipos ``String`` informa o maior número de caracteres que um valor deve ter.
     *
     * @return      mixed
     */
    public function getMax()
    {
        return null;
    }





     /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      mixed
     */
    public function get()
    {
        return parent::protectedGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      mixed
     */
    public function getNotNull()
    {
        return parent::protectedGetNotNull();
    }





    /**
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     *
     * @param       string $type
     *              Informa a namespace completa da classe ou interface que os valores
     *              a serem usados por esta instância deverão possuir.
     */
    function __construct(
        $value = undefined,
        string $type
    ) {
        $this->type = (($this->type === "") ? $type : $this->type);
        parent::__construct($value);
    }



    /**
     * Retorna uma instância definida com as propriedades indicadas no
     * ``array`` de configuração.
     *
     * @param       string $useType
     *              Namespace completa do tipo que deve ser instanciado.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iType
     */
    protected static function sttFromArray(string $useType, array $cfg) : iType
    {
        return new $useType(
            ((\key_exists("value", $cfg) === true)  ? $cfg["value"] : undefined),
            ((\key_exists("type", $cfg) === true)   ? $cfg["type"]  : "")
        );
    }
}
