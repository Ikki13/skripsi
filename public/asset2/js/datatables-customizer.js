$(document).ready(function (){
	$('.datatable').DataTable();
	// datatable export buttons
	$('#datatable-export').DataTable( {
		dom: 'Bfrtip',		
		buttons: [
			{
            extend: 'collection',
            text: 'Export Data',
            buttons: [
				{
                    extend: 'excel',
                    exportOptions: {
                        columns: "thead th:not(.action-btn)"
                    }
                },
				{
                    extend: 'print',
                    exportOptions: {
                        columns: "thead th:not(.action-btn)"
                    }
                }
            ]
        	}
    	]
	});


	$('#datatable-noexport').DataTable( {

	});

	
});


