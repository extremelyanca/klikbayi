/*
 * @package KLIKBAYI
 * @category Core
 * @author Jevuska
 * @version 1.0
 */
 
 ( function( $ ) {
    $.fn.klikbayi = function() {
		
		function show_form() 
        {
			$("#btn-klikbayi").on("click", function(e) 
            {
				e.preventDefault();
				alert('ok');
				return false;
			})
		}
		
        return this.each(function() 
        {
            
        })
    }
}
(jQuery));