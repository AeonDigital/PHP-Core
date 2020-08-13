<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPNumericFloating as iPNumericFloating;








/**
 * ``Primitive Standart Float`` (flutuante de 32 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPFloat extends iPNumericFloating
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa da classe ou interface.
     *
     * @var         string
     */
    const TYPE = "Float";
}
