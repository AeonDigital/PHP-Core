<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPLong as iPLong;
use AeonDigital\Interfaces\Objects\Standart\Flag\iUnsigned as iUnsigned;







/**
 * ``Primitive Standart Unsigned Long`` (inteiro de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPLongUnsigned extends iPLong, iUnsigned
{
    /**
     * **Importante**
     * Em sistemas de 64 bits o limiar mínimo para valores inteiros é de **-9223372036854775808**
     * e o máximo é de **9223372036854775807**. No entanto, a partir destes próprios números
     * o PHP passa a tratá-los como sendo valores de ponto flutuante o que impede comparações
     * com precisão.
     *
     * Para evitar tal comportamento e manter a precisão no uso deste tipo de valor inteiro,
     * optou-se por reduzir em ``1`` cada um dos limites. Com isso, dentro da coleção de possíveis
     * valores, toda comparação realizada será precisa.
     */



    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     *
     * @var         string
     */
    const MIN = "0";
    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     *
     * @var         string
     */
    const MAX = "9223372036854775806";
}
