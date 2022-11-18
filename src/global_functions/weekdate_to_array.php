<?php

declare(strict_types=1);

/**
 * A partir de uma ``string`` de data no formato **week** ou de um objeto ``\DateTime``
 * retorna um ``array associativo`` com os dados brutos da data especificada.
 *
 * O array terá as seguintes chaves:
 *
 * ```php
 *      $arr = [
 *          "year"  => int,
 *          "week"  => int,
 *          "day"   => int
 *      ];
 * ```
 *
 * @param       string|\DateTime $week
 *              String ou objeto \DateTime.
 *
 * @return      ?array
 *              Retornará ``null`` se não for possível identificar os componentes
 *              da data.
 */
function weekdate_to_array(string|\DateTime $week): ?array
{
    $r = null;


    if (\is_string($week) === true && $week !== "") {
        // Remove marcação "w", "W" e "-"
        // Parte a string em suas partes
        $weekParts = \array_filter(
            \explode(
                " ",
                \str_replace(["w", "W", "-"], ["", "", " "], $week)
            ),
            fn ($v) => (\is_numeric($v) === true)
        );


        $year = 0;
        $week = 0;
        $day = 1;


        // Para prosseguir é preciso que existam 2 ou 3 partes
        $c = \count($weekParts);
        if ($c === 2 || $c === 3) {

            // Se a primeira parte da string corresponde ao ano...
            // Captura formato yyyy-Wxx-d
            if (\mb_strlen($weekParts[0]) === 4) {
                $year = (int)$weekParts[0];
                $week = (int)$weekParts[1];

                if ($c === 3) {
                    $day = (int)$weekParts[2];
                }
            } else {
                // Se a primeira parte da string corresponde ao dia...
                // Captura formato d-xxW-yyyy
                if ($c === 3 && \mb_strlen($weekParts[0]) === 1) {
                    $day = (int)$weekParts[0];
                    $week = (int)$weekParts[1];
                    $year = (int)$weekParts[2];
                }
                // Senão, se a primeira parte corresponde à semana...
                // Captura formato xxW-yyyy
                elseif ($c === 2 && \mb_strlen($weekParts[0]) === 2) {
                    $week = (int)$weekParts[0];
                    $year = (int)$weekParts[1];
                }
            }
        }


        // Apenas se os dados encontrados estão dentro dos limites...
        if (
            $year >= 1 && $year <= 9999 &&
            $week >= 1 && $week <= 53 &&
            $day >= 1 && $day <= 7
        ) {
            if ($week <= \weekdate_count_weeks($year)) {
                $r = [
                    "year" => $year,
                    "week" => $week,
                    "day" => $day
                ];
            }
        }
    } elseif (\is_a($week, "\DateTime") === true) {
        $r = [
            "year" => (int)$week->format("o"),
            "week" => (int)$week->format("W"),
            "day" => (int)$week->format("N"),
        ];
    }

    return $r;
}
