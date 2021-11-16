<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Patterns\World\Dates;

use AeonDigital\DataFormat\Abstracts\aDateTimeFormat as aDateTimeFormat;








/**
 * Definição do formato ``DateTime``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class DateTime extends aDateTimeFormat
{





    /**
     * Máscara da data.
     *
     * @var         ?string
     */
    const DateMask = "Y-m-d H:i:s";


    /**
     * Expressão regular para validação.
     *
     * @var         ?string
     */
    const RegExp = "/^(\d{4})[\/\-.]([0]?[1-9]|[1][012])[\/\-.]([0]?[1-9]|[12][0-9]|[3][01])[ ]([01]?\d|2[0-3]):([0-5]?\d):([0-5]?\d)$/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MinLength = 19;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MaxLength = 19;
}
