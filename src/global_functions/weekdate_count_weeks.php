<?php

declare(strict_types=1);

/**
 * Calcula a quantidade de semanas que o ano informado tem.
 *
 * @param       int $year
 *              Ano.
 *
 * @return      int
 */
function weekdate_count_weeks(int $year): int
{
    return (int)\weekdate_get_last_week($year)->format("W");
}
