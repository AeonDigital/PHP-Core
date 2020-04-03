====================
numeric_decimal_part
====================


.. php:function:: numeric_decimal_part( $n, $l=2)
	
		.. rst-class:: phpdoc-description
		
			| Retorna unicamente a parte decimal de um numeral.
			
			| Por questões internas referentes a forma como os numerais de ponto flutuantes funcionam, a
			| maior precisão possível de ser encontrada é a de números de até 15 dígitos, independente do
			| local onde está o ponto decimal.
			
		
		
		:Parameters:
			- ‹ int | float › **$n** |br|
			  Valor numérico de entrada.
			- ‹ int › **$l** |br|
			  Tamanho da parte decimal a ser retornada.
			  Se não for informado, será usado o valor **2**.

		
		:Returns: ‹ ?float ›|br|
			  Retornará ``null`` caso o valor de entrada não seja numérico.