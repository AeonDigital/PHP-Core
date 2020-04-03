==============
to_system_path
==============


.. php:function:: to_system_path( $systemPath)
	
		.. rst-class:: phpdoc-description
		
			| Corrige um caminho para um diretório ou arquivo interno ajustando os separadores de
			| diretório e eliminando duplicação dos mesmos. Qualquer ``\\`` ou ``/`` no final do caminho
			| será removida.
			
		
		
		:Parameters:
			- ‹ ?string › **$systemPath** |br|
			  Caminho que será ajustado.

		
		:Returns: ‹ ?string ›|br|
			  Caminho corrigido.