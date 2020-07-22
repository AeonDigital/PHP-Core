<?php
declare (strict_types=1);

namespace AeonDigital\ArrayOf\Type;

use AeonDigital\ArrayOf\Type\ArrayOfString as ArrayOfString;








/**
 * Array de ``?string``.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class ArrayOfStringNullable extends ArrayOfString
{
    /**
     * Indica se ``null`` é aceito como um valor válido.
     *
     * @var         bool
     */
    const NULLABLE = true;
}
