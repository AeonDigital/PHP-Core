<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Interfaces\Objects\Types\iDateTime as iDateTime;







/**
 * Extende a classe ``aType`` para atender a interface ``iDateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aDateTime extends aType implements iDateTime
{



    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      \DateTime
     */
    public function getNullEquivalent() : \DateTime
    {
        return $this->getStandart()::getNullEquivalent();
    }



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?\DateTime
     */
    public function getDefault() : ?\DateTime
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
     * @return      \DateTime
     */
    public function getMin() : \DateTime
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
     * @return      \DateTime
     */
    public function getMax() : \DateTime
    {
        return $this->valueMax;
    }





     /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      ?\DateTime
     */
    public function get() : ?\DateTime
    {
        return parent::sttGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      \DateTime
     */
    public function getNotNull() : \DateTime
    {
        return parent::sttGetNotNull();
    }
}
