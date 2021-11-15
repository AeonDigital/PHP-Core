==========
html_print
==========


.. php:function:: html_print( $obj, $o=null, $w=null, $h=null)
	
		.. rst-class:: phpdoc-description
		
			| Imprime na tela o valor de ``$obj`` dentro de uma tag ``<pre>``, facilitando assim a leitura
			| quando necessário o debug.
			
		
		
		:Parameters:
			- ‹ mixed › **$obj** |br|
			  Objeto que será **impresso**.
			- ‹ bool › **$o** |br|
			  Indica se a tag ``<pre>`` deve receber a propriedade css ``overflow:auto``.
			- ‹ string › **$w** |br|
			  Valor da propriedade css ``width`` para definir a largura do objeto ``<pre>``.
			- ‹ string › **$h** |br|
			  Valor da propriedade css ``height`` para definir a altura do objeto ``<pre>``.

		
		:Returns: ‹ void ›|br|