</body>
</html>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();

		$('.datepicker').attr("data-provide","datepicker");
		$('.datepicker').attr("data-date-language","th-th"); 
		
		$('.datepicker').mask('00/00/0000');
		$('#NUMBER_PHONE').mask('000-000-0000');


		$('#ID_PROVINCE').select2();
		$('#ID_COUNTY').select2();
		$('#ID_DISTRICT').select2();
	});


</script>