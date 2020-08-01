<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\iType as iType;
use AeonDigital\Interfaces\Objects\Types\iType as iiType;
use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Objects\Standart\stdType as stdType;






/**
 * Classe concreta para o tipo ``iType``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpType extends aType implements iiType
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdType::class;
    }





    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?iType
     */
    public function default() : ?iType
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
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      ?iType
     */
    public function get() : ?iType
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      iType
     */
    public function getNotNull() : iType
    {
        return parent::stdGetNotNull();
    }



    /**
     * Retorna uma instância definida com as propriedades definidas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iType
     */
    public static function fromArray(array $cfg) : self
    {
        return static::tpFromArray(self::class, $cfg);
    }
}
