<?php

declare(strict_types=1);

/**
 * Retorna um objeto ``DateTime`` setado para o último dia do mês. Hora minuto e segundo
 * serão definidos como **23:59:59**.
 *
 * @param \DateTime $date
 * Data original.
 *
 * @return \DateTime
 */
function date_to_last_month_day(\DateTime $date): \DateTime
{
    $Y = (int)$date->format("Y");
    $m = (int)$date->format("m");
    $t = (int)$date->format("t");
    return \DateTime::createFromFormat("Y-m-d H:i:s", "$Y-$m-$t 23:59:59");
}
