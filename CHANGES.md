Alteração de assinaturas de funções
array_in_ci         -> in_array_ci              [nome alterado]
mb_str_contains     -> str_contains             [removido; atualmente é parte do core do PHP a partir da versão 8.0 e já é binary-safe]
mb_str_ends_with    -> str_ends_with            [removido; atualmente é parte do core do PHP a partir da versão 8.0 e é binary-safe]
mb_str_last_pos     -> mb_strrpos               [removido; Já era parte do core do PHP, não estava sendo usada por falta de conhecimento.]
mb_str_starts_with  -> str_starts_with          [removido; atualmente é parte do core do PHP a partir da versão 8.0 e é binary-safe]




adicionar tipos em todos argumentos de todas as funções.
adicionar retornos em todas funções.
adicionar tipos "mixed", "object" e "void" quando necessário

StdClass    -> stdClass
boolean     -> bool

identificar e remover variáveis declaradas e não utilizadas.

ANTES DE PROSSEGUIR PARA O PRÓXIMO REPOSITÓRIO:
    - Resolver o que fazer com o 'undefined' ...
    - verificar todos os 'erros' que o IDE está mostrando. ver se tem forma de resolver.




============================================================
Segunda revisão:
    - Alterar hash de senha para um mais seguro em AeonDigital\DataFormat\Patterns\World\Password

Remover do 'phpunit.php':
    require_once $rootDir . "/vendor/aeondigital/phpinterfaces/src/iRealType.php"; // @@TODO