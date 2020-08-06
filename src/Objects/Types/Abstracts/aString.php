<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Interfaces\Objects\Types\iString as iString;







/**
 * Extende a classe ``aType`` para atender a interface ``iString``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aString extends aType implements iString
{



    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      string
     */
    public function getNullEquivalent() : string
    {
        return $this->getStandart()::getNullEquivalent();
    }
    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?string
     */
    public function getDefault() : ?string
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
     * @return      ?int
     */
    public function getMin() : ?int
    {
        return $this->valueMin;
    }
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     * Em tipos ``String`` informa o maior número de caracteres que um valor deve ter.
     *
     * @return      ?int
     */
    public function getMax() : ?int
    {
        return $this->valueMax;
    }





     /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      ?string
     */
    public function get() : ?string
    {
        return parent::sttGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      string
     */
    public function getNotNull() : string
    {
        return parent::sttGetNotNull();
    }
}
