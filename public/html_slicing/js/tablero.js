/**
 * tablero - front (js - frontend)
 * -----------------------------------------------------------
 *
 * 	@author	 	Hugo Osorio <hugo@vectores.in>
 *	@url		http://hugoosorio.com
 *	@twitter	@hugovom
 * 	@version 	1.1
 */
$(document).ready(function(e) {
	
	
	/**
	*	mostrar ocultar descripción
	* 	------------------------------------------------------------------------------
 	* 		
 	*/
	
	//ocultamos descripción
	$('.list-responsable').hide();
 	  
 	$('#tablero').on('click', '.plus a', function () 
 	{
 	 	var id = $(this).attr('title');	 	
 	 	$('#tablero').find('#'+id).toggle();
 	});
});