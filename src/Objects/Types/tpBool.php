<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iBool as iBool;
use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Objects\Standart\stdBool as stdBool;






/**
 * Classe concreta para o tipo ``bool``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpBool extends aType implements iBool
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdBool::class;
    }





    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      bool
     */
    public function nullEquivalent() : bool
    {
        return $this->valueNullEquivalent;
    }
    /**
     * Retorna o menor valor aceitável para esta instância.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    public function min()
    {
        return $this->valueMin;
    }
    /**
     * Retorna o menor valor aceitável para esta instância.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    public function max()
    {
        return $this->valueMax;
    }





    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?bool
     */
    public function get() : ?bool
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      bool
     */
    public function getNotNull() : bool
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
            undefined,
            undefined
        );
    }
}
