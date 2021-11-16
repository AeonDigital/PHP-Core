<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Patterns\Brasil;

use AeonDigital\DataFormat\Abstracts\aNumberFormat as aNumberFormat;








/**
 * Definição do formato ``Number``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class Number extends aNumberFormat
{





    /**
     * Valor **mínimo** em caracteres para expressar o formato.
     *
     * @var         int
     */
    const MinLength = 1;


    /**
     * Valor **máximo** em caracteres para expressar o formato.
     *
     * @var         int
     */
    const MaxLength = 31;



    /**
     * Separador decimal.
     *
     * @var         string
     */
    const Decimal = ",";


    /**
     * Separador de milhar.
     *
     * @var         string
     */
    const Thousand = ".";
}
