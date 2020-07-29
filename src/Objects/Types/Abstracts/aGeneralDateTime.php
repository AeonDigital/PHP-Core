<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;








/**
 * Extende a classe ``aType`` para atender a interface ``iGeneralDateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aGeneralDateTime extends aType
{



    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      \DateTime
     */
    public function nullEquivalent() : \DateTime
    {
        return $this->valueNullEquivalent;
    }
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public function min() : \DateTime
    {
        return $this->valueMin;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public function max() : \DateTime
    {
        return $this->valueMax;
    }





    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?\DateTime
     */
    public function get() : ?\DateTime
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      \DateTime
     */
    public function getNotNull() : \DateTime
    {
        return parent::stdGetNotNull();
    }





    /**
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     *              Se não for definido usará o valor definido como ``self::nullEquivalent()``.
     *              Se ``nullEquivalent`` não for definido mas tratar-se de um tipo
     *              ``nullable`` usará ``null`` como valor inicial caso contrário
     *              usará o valor definido como ``nullEquivalent`` da classe ``Standart``
     *              original.
     *              Se for definido como ``null`` mas não for do tipo ``nullable`` usará
     *              o valor definido em ``nullEquivalent`` aqui definido ou aquele que
     *              existir na classe ``Standart`` original.
     *
     * @param       bool $nullable
     *              Quando ``true`` esta instância aceitará ``null`` como um valor válido.
     *
     * @param       bool $readonly
     *              Quando ``true`` indica que esta instância não poderá ter seu valor
     *              alterado após a inicialização.
     *
     * @param       mixed $valueNullEquivalent
     *              Valor equivalente a ``null`` a ser usado por esta instância.
     *              Se não for definido usará o valor existente em ``nullEquivalent`` da
     *              classe ``Standart`` original.
     *
     * @param       int|float|Realtype|\DateTime $valueMin
     *              Indica o menor valor aceitável para um tipo numérico ou comparável.
     *              Se não for definido usará o valor existente em ``min`` da classe
     *              ``Standart`` original.
     *
     * @param       int|float|Realtype|\DateTime $valueMax
     *              Indica o maior valor aceitável para um tipo numérico ou comparável.
     *              Se não for definido usará o valor existente em ``max`` da classe
     *              ``Standart`` original.
     */
    function __construct(
        $value = undefined,
        bool $nullable = false,
        bool $readonly = false,
        $valueNullEquivalent = undefined,
        $valueMin = undefined,
        $valueMax = undefined
    ) {
        parent::__construct(
            $value,
            $nullable,
            $readonly,
            $valueNullEquivalent,
            $valueMin,
            $valueMax
        );
    }
}