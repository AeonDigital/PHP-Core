.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Image
=====


.. php:namespace:: AeonDigital\Tools

.. php:class:: Image


	.. rst-class:: phpdoc-description
	
		| Coleção de métodos estáticos para a manipulação de imagens.
		
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static transform( $absoluteSystemPathToOriginalImage, $absoluteSystemPathToNewImage=null, $resizeType=&#34;auto&#34;, $imgMaxWidth=null, $imgMaxHeight=null, $imgCrop=null, $imgCropWidth=null, $imgCropHeight=null, $imgCropX=null, $imgCropY=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetua a transformação de uma imagem conforme os parametros de configuração.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToOriginalImage** |br|
			  Caminho completo até a imagem.
			- ‹ string › **$absoluteSystemPathToNewImage** |br|
			  Caminho completo até o local onde a nova  imagem será armazenada.
			  Se não for definido a imagem original será alterada.
			- ‹ string › **$resizeType** |br|
			  Tipo de ajuste que será feito.
			  
			  Os seguintes valores são aceitos:
			  
			  **exact** : redimenciona a imagem exatamente na medida definida em
			  ``$imgMaxWidth`` e ``$imgMaxHeight``.
			  Se um deste valores não for definido, manterá o valor inicial da imagem.
			  
			  **portrait** : redimensiona (verticalmente) a imagem parando quando
			  encontra chegar na altura máxima definida em ``$imgMaxHeight``.
			  
			  **landscape** : redimensiona (horizontalmente) a imagem parando quando
			  encontra chegar na largura máxima definida em ``$imgMaxWidth``.
			  
			  **auto** : redimensiona a imagem até que uma das dimensões encontre um dos
			  valores máximos definidos por ``$imgMaxWidth`` e ``$imgMaxHeight``.
			- ‹ ?int › **$imgMaxWidth** |br|
			  Largura máxima que a imagem deverá ter.
			  Se não for definido, este valor será calculado conforme o tipo
			  ``$resizeType``.
			- ‹ ?int › **$imgMaxHeight** |br|
			  Altura máxima que a imagem deverá ter.
			  Se não for definido, este valor será calculado conforme o tipo
			  ``$resizeType``.
			- ‹ ?bool › **$imgCrop** |br|
			  Quando ``true``, irá, após redimencionar a imagem, efetuar um crop(corte)
			  na imagem resultante e salvará este corte ao invés da imagem como um todo.
			  
			  Para evitar que um crop exceda os limites de uma imagem que será
			  redimencionada por um método dinâmico (portrait | landscape | auto) é
			  recomendavel, mas não obrigatório, que esta opção seja usada em conjunto
			  com o método ``exact``.
			- ‹ ?int › **$imgCropWidth** |br|
			  Largura do crop que será feito.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``.
			- ‹ ?int › **$imgCropHeight** |br|
			  Altura do crop que será feito.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``.
			- ‹ ?int › **$imgCropX** |br|
			  Posição no eixo X a partir de onde o corte da imagem deve ocorrer.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``.
			- ‹ ?int › **$imgCropY** |br|
			  Posição no eixo Y a partir de onde o corte da imagem deve ocorrer.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static resize( $absoluteSystemPathToOriginalImage, $absoluteSystemPathToNewImage=null, $resizeType=&#34;auto&#34;, $imgMaxWidth=null, $imgMaxHeight=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetua o redimensionamento de uma imagem conforme os parametros de configuração.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToOriginalImage** |br|
			  Caminho completo até a imagem.
			- ‹ string › **$absoluteSystemPathToNewImage** |br|
			  Caminho completo até o local onde a nova  imagem será armazenada.
			  Se não for definido a imagem original será alterada.
			- ‹ string › **$resizeType** |br|
			  Tipo de ajuste que será feito.
			  
			  Os seguintes valores são aceitos:
			  
			  **exact** : redimenciona a imagem exatamente na medida definida em
			  ``$imgMaxWidth`` e ``$imgMaxHeight``.
			  Se um deste valores não for definido, manterá o valor inicial da imagem.
			  
			  **portrait** : redimensiona (verticalmente) a imagem parando quando
			  encontra chegar na altura máxima definida em ``$imgMaxHeight``.
			  
			  **landscape** : redimensiona (horizontalmente) a imagem parando quando
			  encontra chegar na largura máxima definida em ``$imgMaxWidth``.
			  
			  **auto** : redimensiona a imagem até que uma das dimensões encontre um dos
			  valores máximos definidos por ``$imgMaxWidth`` e ``$imgMaxHeight``.
			- ‹ ?int › **$imgMaxWidth** |br|
			  Largura máxima que a imagem deverá ter.
			  Se não for definido, este valor será calculado conforme o tipo ``$resizeType``.
			- ‹ ?int › **$imgMaxHeight** |br|
			  Altura máxima que a imagem deverá ter.
			  Se não for definido, este valor será calculado conforme o tipo ``$resizeType``.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static crop( $absoluteSystemPathToOriginalImage, $absoluteSystemPathToNewImage=null, $imgCropWidth=null, $imgCropHeight=null, $imgCropX=null, $imgCropY=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetua o ``crop`` de uma imagem conforme os parametros de configuração.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToOriginalImage** |br|
			  Caminho completo até a imagem.
			- ‹ string › **$absoluteSystemPathToNewImage** |br|
			  Caminho completo até o local onde a nova  imagem será armazenada.
			  Se não for definido a imagem original será alterada.
			- ‹ ?int › **$imgCropWidth** |br|
			  Largura do crop que será feito.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``.
			- ‹ ?int › **$imgCropHeight** |br|
			  Altura do crop que será feito.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``
			- ‹ ?int › **$imgCropX** |br|
			  Posição no eixo X a partir de onde o corte da imagem deve ocorrer.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``
			- ‹ ?int › **$imgCropY** |br|
			  Posição no eixo Y a partir de onde o corte da imagem deve ocorrer.
			  Apenas surte efeito se ``$resizeType`` for definido como ``crop``

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

