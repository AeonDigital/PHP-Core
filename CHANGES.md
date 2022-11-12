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