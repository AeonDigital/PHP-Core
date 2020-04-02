<?php
declare (strict_types=1);

/**
 * Redireciona o ``UA`` para a URL indicada.
 *
 * Esta ação interrompe o script imediatamente após o redirecionamento.
 *
 * @param       string $url
 *              URL para onde o ``UA`` será redirecionado.
 *
 * @param       string $httpStatusCode
 *              Status HTTP que deve ser informado no header.
 *              O status padrão **HTTP/1.1 302 Found** indica que o redirecionamento é
 *              esperado ou que faz parte do fluxo padrão da aplicação.
 *
 * @return      void
 */
function redirect(string $url, string $httpStatusCode = "HTTP/1.1 302 Found") : void
{
    \header($httpStatusCode);
    \header("Location: " .  $url);
    exit();
}
