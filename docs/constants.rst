==========
Constantes
==========

As seguintes constantes serão disponibilizadas em todos os seus projetos sempre
que esta biblioteca estiver presente:


.. php:const:: undefined

    | Valor de um objeto não definido.
  
    | Há momentos onde se deseja que uma variável ou propriedade esteja com o status de 
    | **não definida**, e, para estes casos tal constante deve ser usada.
  
    | Importante notar que se for verificado o tipo, será retornado **string** portanto é 
    | importante que seu uso seja feito de forma controlada.

    | Sua grafia está especialmente escrita em **lowercase** pois, por sua concepção, 
    | estima-se que, se estivesse no core do PHP, seu nível hierárquico seria equivalente à 
    | ``null`` o que faria ela entrar nas recomendações PSR junto com as mesmas regras que 
    | definem que ``null``, ``true`` e ``false`` devem ser escritas em **lowercase**.



.. php:const:: DS

    | Separador de diretório conforme o S/O. 
    | Apenas uma forma menor para se referir à constante ``DIRECTORY_SEPARATOR``.
