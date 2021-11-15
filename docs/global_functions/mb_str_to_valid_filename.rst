========================
mb_str_to_valid_filename
========================


.. php:function:: mb_str_to_valid_filename( $str)
	
		.. rst-class:: phpdoc-description
		
			| Verifica a string original passada e remove dela qualquer caracter que a torne um nome
			| de arquivo invalido (tanto em sistemas Unix quando em Windows).
			
			| Espaços serão removidos do início e do final da string.
			| Caracteres não visiveis serão excluidos.
			| Caracteres com glifos serão substiuidos por suas versões simples.
			| Os caracteres &#34;\\&#34;, &#34;/&#34;, &#34;*&#34;, &#34;?&#34;, &#34;<&#34;, &#34;>&#34;, &#34;|&#34;, &#34;\&#34;&#34;, &#34;&#39;&#34;, &#34;:&#34; serão convertidos em &#34;_&#34;.
			| Espaços serão convertidos em &#34;_&#34;.
			
		
		
		:Parameters:
			- ‹ string › **$str** |br|
			  ``String`` original.

		
		:Returns: ‹ string ›|br|