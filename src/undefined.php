<?php

declare(strict_types=1);

namespace AeonDigital;

use AeonDigital\Interfaces\iUndefined as iUndefined;







/**
 * Classe que tem como único objetivo criar um tipo que define
 * um estado ``indefinido``.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2022, Rianna Cantarelli
 * @license     MIT
 */
final class undefined implements iUndefined
{
    public const value = "∅";
}