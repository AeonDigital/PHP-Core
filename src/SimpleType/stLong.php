<?php
declare (strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\SimpleType\Abstracts\aInt as aInt;
use AeonDigital\Tools as Tools;







/**
 * Definições para o tipo ``long`` (integer 64 bits).
 *
 * **Importante**
 * Em sistemas de 64 bits o limiar mínimo para valores inteiros é de **-9223372036854775808**
 * e o máximo é de **9223372036854775807**. No entanto, a partir destes próprios números
 * o PHP passa a tratá-los como sendo valores de ponto flutuante e sua representação passa
 * a ser feita usando notação científica o que impede comparações com precisão.
 *
 * Para evitar tal comportamento e manter a precisão no uso deste tipo de valor inteiro,
 * optou-se por reduzir em ``1`` cada um dos limites. Com isso, dentro da coleção de possíveis
 * valores, toda comparação realizada será precisa.
 *
 * Uma demonstração de possíveis problemas que este comportamento pode causar estão
 * documentados nos testes desta mesma classe.
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stLong extends aInt
{





    /**
     * Retorna o menor valor possível para o tipo definido.
     *
     * @return      int
     */
    public static function min() : int
    {
        return (int)-9223372036854775807;
    }


    /**
     * Retorna o maior valor possível para o tipo definido.
     *
     * @return      int
     */
    public static function max() : int
    {
        return (int)9223372036854775806;
    }
}
