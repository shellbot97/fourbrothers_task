<table id="example" class="display nowrap cell-border" style="width:100%">


	<thead>
		<tr>
			<th data-field="prenom5" data-filter-control="input" data-sortable="true">Name</th>
			<th data-field="prenom4" data-filter-control="input" data-sortable="true">Email</th>
			<th data-field="prenom45" data-filter-control="input" data-sortable="true">Contact Number</th>
			<th data-field="prenom16" data-filter-control="input" data-sortable="true">Image</th>

			<th data-field="prenom16" data-filter-control="input" data-sortable="true">Date</th> 



		</tr>
	</thead>

</table>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script> -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script >
	$.fn.dataTable.ext.errMode = 'none';


	$(document).ready(function() {


		$('#example').DataTable(  {
			language: { searchPlaceholder: "Search Table" },
			"scrollX": true, 
			"bLengthChange": false,
			"info": false,
			"processing": true,
			"serverSide": true,
			"bPaginate": false,

			ajax: {
				url: 'dashboard/get_data',
					"data": function ( d ) {
				},
				dataSrc: 'data'
			},
			columns: [
				{ data: 'name' },
				{ data: 'email' },
				{ data: 'contact_number' },
				{ data: 'img' },
				{data: 'created_date'}

			],
			columnDefs: [
				{
					targets: 3,
					render: function(data) {
						return '<img src="'+ JSON.parse(data).path.replace("/var/www/html", "")+'">'
					}
				}   
			]
		} );
	} );
</script>