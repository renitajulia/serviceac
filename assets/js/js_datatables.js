(function($) {
  'use strict';

  if ($(".datatable-simple").length) {
    $(".datatable-simple").DataTable({
		responsive: true
	});
  }
  
})(jQuery);