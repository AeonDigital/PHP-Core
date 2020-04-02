--------------------------------------
object_convert_values_to_html_entities
--------------------------------------


.. php:function:: object_convert_values_to_html_entities( $o)
	
		.. rst-class:: phpdoc-description
		
			| Converte todo conteúdo de um ``Array Associativo`` ou objeto ``\stdClass`` em um valor do tipo
			| ``string`` que pode ser apresentado normalmente em um documento HTML.
			
		
		
		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto original, que será convertido.

		
		:Returns: ‹ mixed ›|br|
			  Retornará o mesmo tipo de objeto inicialmente passado em ``$o``, mas com todos
			  seus valores convertidos para ``strings`` representáveis em um documento HTML.