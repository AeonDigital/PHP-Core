===============
mb_str_uc_words
===============


.. php:function:: mb_str_uc_words( $string, $ignore=[])
	
		.. rst-class:: phpdoc-description
		
			| Converte para maiúsculas o primeiro caractere de cada palavra.
			
			| Este método é equivalente ao ``ucwords()`` porém, suporta ``multi-byte``.
			
		
		
		:Parameters:
			- ‹ string › **$string** |br|
			  ``String`` que será alterada.
			- ‹ array › **$ignore** |br|
			  Se definido, deve ser um ``array de strings`` contendo palavras que devem escapar
			  da transformação.

		
		:Returns: ‹ string ›|br|
			  Nova ``string`` modificada.