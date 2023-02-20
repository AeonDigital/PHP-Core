<?php

declare(strict_types=1);






/**
 * Representa o valor ``indefinido`` de uma variável ou propriedade.
 *
 * Há momentos onde se deseja que uma variável ou propriedade esteja com o status de
 * **não definida**, e, para estes casos tal constante deve ser usada.
 *
 * Trata-se de uma instância de uma classe de mesmo nome (undefined)
 *
 * Sua grafia está especialmente escrita em **lowercase** pois, por sua concepção,
 * estima-se que, se estivesse no core do PHP, seu nível hierárquico estaria no mesmo que
 * ``null`` o que faria ela entrar nas recomendações PSR junto com as mesmas regras que
 * definem que ``null``, ``true`` e ``false`` devem ser escritas em **lowercase**.
 *
 * @var undefined
 */
const undefined = new AeonDigital\undefined();



/**
 * Separador de diretório conforme o S/O.
 * Apenas uma forma menor para se referir à constante ``DIRECTORY_SEPARATOR``.
 *
 * @var string
 */
const DS = DIRECTORY_SEPARATOR;


/*
 * Nome de cada função global que deve ser carregada caso a mesma já não tenha sido definida
 * anteriormente.
 */
foreach (\scandir(__DIR__ . DS . "global_functions") as $function_file) {
    if (
        $function_file !== "." &&
        $function_file !== ".." &&
        \function_exists(\str_replace(".php", "", $function_file)) === false
    ) {
        require_once __DIR__ . DS . "global_functions" . DS . $function_file;
    }
}
unset($function_file);