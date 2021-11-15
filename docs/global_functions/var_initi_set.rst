=============
var_initi_set
=============


.. php:function:: var_initi_set( &$o, $d=null, $u=false)
	
		.. rst-class:: phpdoc-description
		
			| Se a variável indicada não estiver definida, irá iniciá-la com o valor padrão passado.
			
		
		
		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto a ser iniciado.
			- ‹ mixed › **$d** |br|
			  Valor padrão a ser definido.
			- ‹ bool › **$u** |br|
			  Se ``true`` testa apenas se o valor é ``undefined``.
			  Se ``false`` testa usando ``var_is_defined()``.

		
		:Returns: ‹ void ›|br|