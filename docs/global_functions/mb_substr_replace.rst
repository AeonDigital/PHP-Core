-----------------
mb_substr_replace
-----------------


.. php:function:: mb_substr_replace( $string, $replacement, $start, $length=null, $encoding=null)
	
		.. rst-class:: phpdoc-description
		
			| Substitui o texto em uma parte da ``string`` por outro.
			
			| Este método é equivalente ao ``substr_replace()`` porém, suporta ``multi-byte``.
			
		
		
		:Parameters:
			- ‹ string › **$string** |br|
			  ``String`` original.
			- ‹ string › **$replacement** |br|
			  ``String`` que será adicionada.
			- ‹ int › **$start** |br|
			  Posição inicial para inserir a nova ``string``.
			- ‹ ?int › **$length** |br|
			  Tamanho da porção da ``string`` original que será substituída.
			- ‹ ?string › **$encoding** |br|
			  Quando usado indica que codificação a ``string`` original está usando.

		
		:Returns: ‹ string ›|br|
			  Nova ``string`` com o novo valor.