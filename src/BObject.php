<?php

declare(strict_types=1);

namespace AeonDigital;









/**
 * Classe básica.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class BObject
{



    /**
     * Desabilita a função mágica ``__set`` para assegurar a que apenas alterações dentro das
     * regras definidas para a classe sejam possíveis.
     *
     * @codeCoverageIgnore
     */
    public function __set(string $name, mixed $value): void
    {
        throw new \RuntimeException("Unable to use \"__set\" method.");
    }
    /**
     * Desabilita a função mágica ``__get`` para assegurar a que apenas alterações dentro das
     * regras definidas para a classe sejam possíveis.
     *
     * @codeCoverageIgnore
     */
    public function __get(string $name): mixed
    {
        throw new \RuntimeException("Unable to use \"__get\" method.");
    }
    /**
     * Desabilita a função mágica ``__unset``.
     *
     * @codeCoverageIgnore
     */
    public function __unset(string $name): void
    {
        throw new \RuntimeException("Unable to use \"__unset\" method.");
    }


    /**
     * Desabilita a função mágica ``__toString``.
     *
     * @codeCoverageIgnore
     */
    public function __toString(): string
    {
        throw new \RuntimeException("Unable to use \"__toString\" method.");
    }


    /**
     * Desabilita a função mágica ``__invoke``.
     *
     * @codeCoverageIgnore
     */
    public function __invoke(mixed $x): mixed
    {
        throw new \RuntimeException("Unable to use \"__invoke\" method.");
    }


    /**
     * Desabilita a função mágica ``__set_state``.
     *
     * @codeCoverageIgnore
     */
    public static function __set_state(array $assoc_array): object
    {
        throw new \RuntimeException("Unable to use \"__set_state\" method.");
    }
}
