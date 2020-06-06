========================
mb_str_to_valid_filename
========================


.. php:function:: mb_str_to_valid_filename( $haystack, $needle)

		.. rst-class:: phpdoc-description

			| Verifica a string original passada e remove dela qualquer caracter que a torne um nome
 			| de arquivo invalido (tanto em sistemas Unix quando em Windows).
 			|
 			| Espaços serão removidos do início e do final da string.
 			| Caracteres não visiveis serão excluidos.
 			| Caracteres com glifos serão substiuidos por suas versões simples.
 			| Os caracteres "\\", "/", "*", "?", "<", ">", "|", "\"", "'", ":" serão convertidos em "_".
 			| Espaços serão convertidos em "_".




		:Parameters:
			- ‹ string › **$str** |br|
			  ``String`` original.


		:Returns: ‹ string ›|br|
