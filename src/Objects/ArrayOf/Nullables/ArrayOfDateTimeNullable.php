<?php
declare (strict_types=1);

namespace AeonDigital\ArrayOf\Type;

use AeonDigital\ArrayOf\Type\ArrayOfDateTime as ArrayOfDateTime;








/**
 * Array de ``?DateTime``.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class ArrayOfDateTimeNullable extends ArrayOfDateTime
{
    /**
     * Indica se ``null`` é aceito como um valor válido.
     *
     * @var         bool
     */
    const NULLABLE = true;
}
