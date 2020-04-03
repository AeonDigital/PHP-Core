============
mb_str_split
============


.. php:function:: mb_str_split( $string, $string_length=1)
	
		.. rst-class:: phpdoc-description
		
			| Converte uma ``string`` para um ``array``.
			
			| Este método é equivalente ao ``str_split()`` porém, suporta ``multi-byte``.
			
		
		
		:Parameters:
			- ‹ string › **$string** |br|
			  String que será convertida.
			- ‹ int › **$string_length** |br|
			  Tamanho máximo de cada pedaço.

		
		:Returns: ‹ array ›|br|
			  Objeto ``array`` que será retornado contendo cada caracter da ``string``
			  original em uma posição.
			  Se ``$string_length`` for definido, cada item do ``array`` trará uma parte da
			  ``string`` original de tamanho igual ao que foi definido.