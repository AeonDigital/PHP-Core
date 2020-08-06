<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Interfaces\Objects\Types\iNumericFloating as iNumericFloating;







/**
 * Extende a classe ``aType`` para atender a interface ``iNumericFloating``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericFloating extends aType implements iNumericFloating
{



    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      float
     */
    public function getNullEquivalent() : float
    {
        return $this->getStandart()::getNullEquivalent();
    }



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?float
     */
    public function getDefault() : ?float
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
     * @return      float
     */
    public function getMin() : float
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
     * @return      float
     */
    public function getMax() : float
    {
        return $this->valueMax;
    }





     /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      ?float
     */
    public function get() : ?float
    {
        return parent::sttGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      float
     */
    public function getNotNull() : float
    {
        return parent::sttGetNotNull();
    }
}
