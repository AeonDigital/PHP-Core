==============
var_is_defined
==============


.. php:function:: var_is_defined( &$o, $k=null)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se a variável indicada está definida.
			
			| Uma variável é considerada definida quando NÃO FOR um ``array`` vazio ou um objeto ``\stdClass``
			| vazio, ou, quando tratar-se de um tipo escalar, for diferente de ``null``, ``undefined``
			| e ``''``.
			
		
		
		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será testado.
			- ‹ ?string › **$k** |br|
			  Quando indicado, ``$o`` deve ser um ``array`` ou um objeto ``stdClass`` e ``$k``
			  será a chave cuja existência e valor será verificado.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` SE a variável ESTA definida E SE seu valor é diferente de
			  ``null``, ``undefined`` e ``''``.
			  Objetos do tipo ``array`` e ``\stdClass`` retornarão ``true`` SE não forem vazios
			  quando ``$k`` não for definido.