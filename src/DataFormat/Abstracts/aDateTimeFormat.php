<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Abstracts;

use AeonDigital\Interfaces\DataFormat\iDateTimeFormat as iDateTimeFormat;
use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;
use AeonDigital\Objects\Tools as Tools;






/**
 * Extende a classe abstrata ``aStringFormat`` para prepará-la para ser usada com
 * objetos ``DateTime``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aDateTimeFormat extends aStringFormat implements iDateTimeFormat
{




    /**
     * Verifica se o valor passado corresponde ao tipo/formato. esperado.
     *
     * @param       ?string $v
     *              Valor a ser testado.
     *
     * @param       ?array $aux
     *              Dados auxiliares para o processamento.
     *
     * @return      bool
     */
    public static function check(?string $v, ?array $aux = null) : bool
    {
        return self::checkDateTime($v, static::RegExp, static::DateMask);
    }



    /**
     * Verifica se o valor passado é uma string válida a representar um objeto ``DateTime``
     * formatada conforme indicado em ``$dateMask``.
     *
     * @param       ?string $v
     *              Valor a ser testado.
     *
     * @param       string $regExp
     *              RegExp para testar a formatação da data.
     *
     * @param       string $dateMask
     *              Máscara de formatação para a data.
     *
     * @return      bool
     */
    protected static function checkDateTime(?string $v, string $regExp, string $dateMask) : bool
    {
        if ($v === null) {
            return false;
        } else {
            return (\mb_str_pattern_match($v, $regExp) === true && Tools::toDateTime($v, $dateMask) !== null);
        }
    }










    /**
     * Formata ``$v`` para que seja retornado uma ``string`` que represente este tipo. Caso
     * não seja possível efetuar a formatação retornará ``null``.
     *
     * @param       mixed $v
     *              Valor a ser formatado.
     *
     * @param       ?array $aux
     *              Quando ``$v`` for uma string de uma data, este parametro deve ser um
     *              array com apenas **1** valor indicando o formato em que a data está
     *              formatada.
     *
     *              **Exemplo**
     *              ``$arr = [ ¨DateMask¨ => ¨d-m-Y ];``
     *
     *              ``$arr = [ ¨d-m-Y¨ ];``
     *
     * @return      ?string
     */
    public static function format($v, ?array $aux = null) : ?string
    {
        return self::formatDateTime($v, $aux, static::DateMask);
    }



    /**
     * Formata uma ``string`` que representa um ``DateTime`` no formato indicado em ``$aux``
     * para o formato ``$dateMask``.
     *
     * @param       ?string $v
     *              Valor a ser testado.
     *
     * @param       ?array $aux
     *              Este parametro deve ser um array com apenas 1 valor indicando o
     *              formato em que a data está formatada.
     *
     *              **Exemplo**
     *              ``$arr = [ ¨DateMask¨ => ¨d-m-Y¨ ];``
     *
     *              ``$arr = [ ¨d-m-Y¨ ];``
     *
     * @param       string $dateMask
     *              Máscara na qual a ``string`` deve ser devolvida.
     *
     * @return      ?string
     */
    protected static function formatDateTime($v, ?array $aux = null, string $dateMask) : ?string
    {
        if (\is_array($aux) === true && \count($aux) === 1) {
            $p = (\array_is_assoc($aux) === true) ? "DateMask" : 0;
            $aux = $aux[$p];
        } else {
            $aux = null;
        }

        if (\is_a($v, "\DateTime") === true) {
            return Tools::toDateTimeString($v, $aux, $dateMask);
        } elseif ($aux !== null && \is_numeric($v) === false) {
            return Tools::toDateTimeString($v, $aux, $dateMask);
        } else {
            return null;
        }
    }










    /**
     * Sendo ``$v`` uma ``string`` formatada adequadamente para representar este tipo,
     * devolverá seu equivalente em formato de objeto ( ``int``, ``float``, ``DateTime`` ... )
     * ou em caso de ``strings``, removerá completamente qualquer caracter de formatação.
     *
     * Retornará ``null`` caso a ``string`` passada seja considerada inválida.
     *
     * @param       ?string $v
     *              Valor a ser ajustado.
     *
     * @param       ?array $aux
     *              Dados auxiliares para o processamento.
     *
     * @return      mixed
     */
    public static function removeFormat(?string $v, ?array $aux = null)
    {
        return self::removeFormatOfDateTimeString($v, static::DateMask);
    }



    /**
     * Devolve um objeto ``DateTime`` para uma ``string`` passada em um determinado formato.
     *
     * @param       ?string $v
     *              Valor a ser ajustado.
     *
     * @param       string $dateMask
     *              Máscara na qual a ``string`` está formatada.
     *
     * @return      ?\DateTime
     */
    protected static function removeFormatOfDateTimeString(?string $v, string $dateMask) : ?\DateTime
    {
        if (\is_string($v) === true && self::checkDateTime($v, static::RegExp, $dateMask) === true) {
            if ($dateMask === "H:i:s" || $dateMask === "H:i") {
                $v = "2000-01-01 " . $v;
                $dateMask = "Y-m-d " . $dateMask;
            }

            return Tools::toDateTime($v, $dateMask);
        }
        return null;
    }



    /**
     * Sendo ``$v`` uma ``string`` válida para o formato correspondente, retorna um valor
     * equivalente a mesma usando as configurações de formatação para armazenamento deste
     * tipo de dado.
     *
     * Retornará ``null`` caso a ``string`` passada seja considerada inválida.
     *
     * @param       ?string $v
     *              Valor a ser ajustado.
     *
     * @return      mixed
     */
    public static function storageFormat(?string $v)
    {
        return self::removeFormat($v);
    }
}
