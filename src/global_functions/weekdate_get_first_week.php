<?php

declare(strict_types=1);

/**
 * Retorna um objeto ``DateTime`` referente ao primeiro dia da primeira semana do ano
 * informado.
 *
 * @param int $year
 * Ano.
 *
 * @return \DateTime
 */
function weekdate_get_first_week(int $year): \Datetime
{
    $date = "$year-01-01 00:00:00";
    $o = \DateTime::createFromFormat("Y-m-d H:i:s", $date);

    $addD = (int)((11 - \date("N", \strtotime($date))) % 7);

    $o->add(new \DateInterval("P" . $addD . "D"));
    $o->sub(new \DateInterval("P3D"));

    return $o;
}
