-------------------------
array_check_required_keys
-------------------------


.. php:function:: array_check_required_keys( $keys, $array)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se as chaves definidas como obrigatórias de um ``Array Associativo`` estão realmente
			| presentes.
			
		
		
		:Parameters:
			- ‹ array › **$keys** |br|
			  Coleção com o nome das chaves obrigatórias.
			- ‹ array › **$array** |br|
			  ``Array associativo`` que será verificado.

		
		:Returns: ‹ array ›|br|
			  Retorna um ``array`` contendo o nome de cada um dos itens que **NÃO** foram definidos.
			  Ou seja, se retornar um ``array`` vazio, significa que todas as chaves foram definidas.