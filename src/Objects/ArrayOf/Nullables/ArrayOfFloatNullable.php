<?php
declare (strict_types=1);

namespace AeonDigital\ArrayOf\Type;

use AeonDigital\ArrayOf\Type\ArrayOfFloat as ArrayOfFloat;








/**
 * Array de ``?float``.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class ArrayOfFloatNullable extends ArrayOfFloat
{
    /**
     * Indica se ``null`` é aceito como um valor válido.
     *
     * @var         bool
     */
    const NULLABLE = true;
}
