-----------------
weekdate_to_array
-----------------


.. php:function:: weekdate_to_array( $week)
	
		.. rst-class:: phpdoc-description
		
			| A partir de uma ``string`` de data no formato **week** ou de um objeto ``\DateTime``
			| retorna um ``array associativo`` com os dados brutos da data especificada.
			
			| O array terá as seguintes chaves:
			| 
			| \`\`\` php
			|      $arr = [
			|          &#34;year&#34;  => int,
			|          &#34;week&#34;  => int,
			|          &#34;day&#34;   => int
			|      ];
			| \`\`\`
			
		
		
		:Parameters:
			- ‹ ?string | \\DateTime › **$week** |br|
			  String ou objeto DateTime.

		
		:Returns: ‹ ?array ›|br|
			  Retornará ``null`` se não for possível identificar os componentes
			  da data.