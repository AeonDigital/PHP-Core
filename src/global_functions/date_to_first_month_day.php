<?php

declare(strict_types=1);

/**
 * Retorna um objeto ``DateTime`` setado para o primeiro dia do mês. Hora minuto e segundo
 * serão definidos como **00:00:00**.
 *
 * @param \DateTime $date
 * Data original.
 *
 * @return \DateTime
 */
function date_to_first_month_day(\DateTime $date): \DateTime
{
    return \DateTime::createFromFormat("Y-m-d H:i:s", $date->format("Y-m") . "-01 00:00:00");
}
