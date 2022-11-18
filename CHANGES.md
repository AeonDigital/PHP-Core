

Documentação:
Procurar por : ``` php e substituir por ```php [remover espaços e rever o tipo certo para a documentação aparecer corretamente.]


Interfaces
Remover das interfaces atuais todo vínculo direto que existir entre elas e as PSR.
Substituir tal vínculo por um método do tipo "function toPSR(): PSRInterface"


Alteração de assinaturas de funções
array_in_ci         -> in_array_ci              [nome alterado]
mb_str_contains     -> str_contains             [removido; atualmente é parte do core do PHP a partir da versão 8.0 e já é binary-safe]
mb_str_ends_with    -> str_ends_with            [removido; atualmente é parte do core do PHP a partir da versão 8.0 e é binary-safe]
mb_str_last_pos     -> mb_strrpos               [removido; Já era parte do core do PHP, não estava sendo usada por falta de conhecimento.]
mb_str_starts_with  -> str_starts_with          [removido; atualmente é parte do core do PHP a partir da versão 8.0 e é binary-safe]

DEPRECATED
utf8_decode
utf8_encode         -> \mb_convert_encoding($content, "UTF-8", \mb_list_encodings())


adicionar tipos em todos argumentos de todas as funções.
adicionar retornos em todas funções.
adicionar tipos "mixed", "object" e "void" quando necessário

StdClass    -> stdClass
boolean     -> bool

identificar e remover variáveis declaradas e não utilizadas.


"aeondigital/phpinterfaces": ">=v0.6.2-beta"
"aeondigital/phpinterfaces": "dev-php82"


============================================================
Segunda revisão:
    - Alterar hash de senha para um mais seguro em AeonDigital\DataFormat\Patterns\World\Password

Remover do 'phpunit.php':
    require_once $rootDir . "/vendor/aeondigital/phpinterfaces/src/iRealType.php"; // @@TODO


===========================================================
Terceira Revisão:
    - Retomar a ideia de criar de arrays tipados e outras questões referentes ao uso
      de tipos.
    - A classe 'TypeList' pode servir de base para estas classes derivadas como 'arrayOfString' e 'assocOfStrings' ... etc
    - Revisitar a documentação interna das classes e métodos para deixá-los melhores para
      trabalhar com as IDEs.