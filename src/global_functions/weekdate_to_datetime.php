<?php
declare (strict_types=1);

/**
 * Retorna um ``DateTime`` conforme parametros passados.
 *
 * @param       ?string|array
 *              String no formato **week** ou ``array associativo`` com os dados brutos
 *              da data.
 *
 * @return      ?\DateTime
 */
function weekdate_to_datetime($week) : ?\Datetime
{
    $r = \weekdate_to_array($week);

    if ($r !== null) {
        $r = (new \DateTime())->setISODate($r["year"], $r["week"], $r["day"]);
    }

    return $r;
}
