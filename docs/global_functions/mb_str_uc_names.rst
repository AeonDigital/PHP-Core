---------------
mb_str_uc_names
---------------


.. php:function:: mb_str_uc_names( $str, $locale=&#34;&#34;, $ignore=[])
	
		.. rst-class:: phpdoc-description
		
			| Converte para maiúsculas o primeiro caractere de cada parte de uma ``string`` que representa um
			| nome próprio. Todos os demais caracteres da ``string`` passada serão revertidos para minúsculas.
			
		
		
		:Parameters:
			- ‹ string › **$str** |br|
			  ``String`` que será alterada.
			- ‹ string › **$locale** |br|
			  Locale que deve ser usado.
			- ‹ array › **$ignore** |br|
			  Se definido, deve ser um ``array de strings`` contendo palavras que devem escapar
			  da transformação.

		
		:Returns: ‹ string ›|br|
			  Nova ``string`` modificada.