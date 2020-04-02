<?php
declare (strict_types=1);

/**
 * Retorna um objeto ``DateTime`` referente ao último dia da última semana do ano
 * informado.
 *
 * @param       int $year
 *              Ano.
 *
 * @return      \DateTime
 */
function weekdate_get_last_week(int $year) : \Datetime
{
    return \weekdate_get_first_week($year + 1)->sub(new \DateInterval("P1D"));
}
