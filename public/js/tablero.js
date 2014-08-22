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
	$('.comentarios_objetivo').hide();
 	//responsables de compromisos
 	$('#tablero').on('click', '.plus a', function () 
 	{
 	 	var id = $(this).attr('title');	
 	 	$(this).toggleClass("hide") 	
 	 	$('#tablero').find('#'+id).slideToggle('fast'); 
 	 	if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 	 	$('#tablero').find('section.'+id).slideToggle('fast'); 	 	
		} 	 		 	
 	});
 	
 	/**
	*	mostrar ocultar comentarios en cada objetivo
	* 	------------------------------------------------------------------------------
 	* 		
 	*/
 	//comentarios de objetivos
 	$('#tablero').on('click', '.comentarios_link', function () 
 	{
 	 	var id = $(this).attr('title');	 	
 	 	$('#tablero').find('span.'+id).slideToggle('slow');
 	});
 	
});