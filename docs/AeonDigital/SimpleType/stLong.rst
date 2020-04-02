.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


stLong
======


.. php:namespace:: AeonDigital\SimpleType

.. rst-class::  final

.. php:class:: stLong


	.. rst-class:: phpdoc-description
	
		| Definições para o tipo ``long`` (integer 64 bits).
		
		| **Importante**
		| Em sistemas de 64 bits o limiar mínimo para valores inteiros é de **-9223372036854775808**
		| e o máximo é de **9223372036854775807**. No entanto, a partir destes próprios números
		| o PHP passa a tratá-los como sendo valores de ponto flutuante e sua representação passa
		| a ser feita usando notação científica o que impede comparações com precisão.
		| 
		| Para evitar tal comportamento e manter a precisão no uso deste tipo de valor inteiro,
		| optou-se por reduzir em ``1`` cada um dos limites. Com isso, dentro da coleção de possíveis
		| valores, toda comparação realizada será precisa.
		| 
		| Uma demonstração de possíveis problemas que este comportamento pode causar estão
		| documentados nos testes desta mesma classe.
		
	
	:Parent:
		:php:class:`AeonDigital\\SimpleType\\Abstracts\\aInt`
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static min()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o menor valor possível para o tipo definido.
			
		
		
		:Returns: ‹ int ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static max()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o maior valor possível para o tipo definido.
			
		
		
		:Returns: ‹ int ›|br|
			  
		
	
	

