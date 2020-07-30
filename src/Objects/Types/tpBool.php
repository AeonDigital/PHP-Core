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
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?bool
     */
    public function default() : ?bool
    {
        return $this->valueDefault;
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
        return null;
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
        return null;
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
}
