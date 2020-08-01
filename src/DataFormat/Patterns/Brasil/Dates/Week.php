<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Patterns\Brasil\Dates;

use AeonDigital\DataFormat\Abstracts\aDateTimeFormat as aDateTimeFormat;








/**
 * Definição do formato ``Week``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class Week extends aDateTimeFormat
{





    /**
     * Máscara da data.
     *
     * @var         ?string
     */
    const DateMask = "N-W\W-o";


    /**
     * Expressão regular para validação.
     *
     * @var         ?string
     */
    const RegExp = "/^(([1-7])[-])?([0]?[1-9]|[1-4][0-9]|[5][0-3])([W])?[-](\d{4})$/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MinLength = 11;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MaxLength = 11;





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
        if ($v !== null) {
            if (\mb_str_pattern_match($v, self::RegExp) === true && \weekdate_to_array($v) !== null) {
                return true;
            }
        }

        return false;
    }



    /**
     * Formata ``$v`` para que seja retornado uma ``string`` que represente este tipo. Caso
     * não seja possível efetuar a formatação retornará ``null``.
     *
     * @param       mixed $v
     *              Valor a ser formatado.
     *
     * @param       ?array $aux
     *              Dados auxiliares para o processamento.
     *
     * @return      ?string
     */
    public static function format($v, ?array $aux = null) : ?string
    {
        if (\is_string($v) === true && self::check($v) === true) {
            $v = \weekdate_to_datetime($v);
        }

        if (\is_a($v, "\DateTime") === true) {
            return $v->format("N") . "-" . $v->format("W") . "W-" . $v->format("Y");
        }

        return null;
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
        if (\is_string($v) === true && self::check($v) === true) {
            return \weekdate_to_datetime($v);
        }

        return null;
    }
}
