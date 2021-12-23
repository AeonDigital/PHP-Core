<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Patterns\Brasil\Dates;

use AeonDigital\DataFormat\Abstracts\aDateTimeFormat as aDateTimeFormat;








/**
 * Definição do formato ``Month``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class Month extends aDateTimeFormat
{





    /**
     * Máscara da data.
     *
     * @var         ?string
     */
    const DateMask = "m-Y";


    /**
     * Expressão regular para validação.
     *
     * @var         ?string
     */
    const RegExp = "/^([0]?[1-9]|[1][012])[\/\-.](\d{4})$/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MinLength = 7;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MaxLength = 7;
}
