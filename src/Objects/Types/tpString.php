<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iString as iString;
use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Objects\Standart\stdString as stdString;






/**
 * Classe concreta para o tipo ``string``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpString extends aType implements iString
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdString::class;
    }





    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?string
     */
    public function default() : ?string
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
     * @return      ?string
     */
    public function get() : ?string
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      string
     */
    public function getNotNull() : string
    {
        return parent::stdGetNotNull();
    }
}
