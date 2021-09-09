

	
	<div class="container">
		<br>
		<h1>เพิ่มข้อมูล</h1>
		<hr>
		<form action="/action_page.php">
			<div class="row"> 
				<div class="col-md-4">
					<label for="PREFIX_NAME">คำนำหน้า:</label>
					<select class="form-control" id="PREFIX_NAME" name="PREFIX_NAME">
						<option disabled selected>เลือกคำนำหน้า</option>
						<option value="นาย">นาย</option>
						<option value="นาง">นาง</option>
						<option value="นางสาว">นางสาว</option>
					</select>
				</div>
				<div class="col-md-4">
					<label for="FIRST_NAME">ชื่อ:</label>
					<input type="text" class="form-control" placeholder="" id="FIRST_NAME" name="FIRST_NAME">
				</div>
				<div class="col-md-4">
					<label for="LAST_NAME">นามสกุล:</label>
					<input type="text" class="form-control" placeholder="" id="LAST_NAME" name="LAST_NAME">
				</div> 
			</div>
			
			<div class="row"> 
				<div class="col-md-4">
					<label for="BIRTH_DATE">วัน/เดือน/ปีเกิด:</label>
					<input type="text" class="form-control  datepicker" id="BIRTH_DATE" name="BIRTH_DATE">
				</div>
				<div class="col-md-4">
					<label for="NUMBER_PHONE">เบอร์โทรศัพท์:</label>
					<input type="text" class="form-control" placeholder="" id="NUMBER_PHONE" name="NUMBER_PHONE">
				</div>
				<div class="col-md-4">
					<label for="E_MAIL">E-Mail:</label>
					<input type="emails" class="form-control" placeholder="" id="E_MAIL" name="E_MAIL">
				</div> 
			</div>
			<hr>
			<div class="row"> 
				<div class="col-md-12">
					<h4>ข้อมูลที่อยู่</h4>
				</div>
			</div>
			<div class="row"> 
				<div class="col-md-4">
					<label for="">ที่อยู่:</label>
					<input type="" class="form-control" placeholder="" id="" name="">
				</div>
				<div class="col-md-4">
					<label for="">หมู่:</label>
					<input type="" class="form-control" placeholder="" id="" name="">
				</div>
				<div class="col-md-4">
					<label for="">ซอย:</label>
					<input type="" class="form-control" placeholder="" id="" name="">
				</div> 
			</div>
			<div class="row"> 
				<div class="col-md-4">
					<label for="">จังหวัด:</label>
					<select class="form-control" id="ID_PROVINCE" name="ID_PROVINCE" onchange="get_amphures(this.value);">
						<option disabled selected>เลือกจังหวัด</option>
				<?php	
						foreach($data["provinces"] as $key => $val): 
							echo "<option value='".$key."'>".$val."</option>";
						endforeach ?>
					</select>
				</div>
				
				<div class="col-md-4">
					<label for="">เขต/อำเภอ:</label>
					<select class="form-control" id="ID_COUNTY" name="ID_COUNTY" onchange="get_districts(this.value)">
						
					</select>
				</div>
				<div class="col-md-4">
					<label for="">แขวง/ตำบล:</label>
					<select class="form-control" id="ID_DISTRICT" name="ID_DISTRICT" onchange="get_zipcode(this.value)">
						
					</select>
				</div>  
			</div>
			<div class="row"> 
				<div class="col-md-4">
					<label for="POSTAL_CODE">รหัสไปรษณีย์:</label>
					<input type="text" class="form-control" placeholder="" id="POSTAL_CODE" name="POSTAL_CODE">
				</div> 
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>
	
	<script>

		function get_amphures(ID_PROVINCE){
			var url = "<?php echo base_url("ajax_get_data/get_amphures"); ?>";
			var data = {ID_PROVINCE:ID_PROVINCE};
			var text = "<option disabled selected>เลือกเขต/อำเภอ</option> ";
			$("#ID_COUNTY").html('');
			$("#ID_DISTRICT").html('');
			$.post( url, data, function( data ) {
				$.each(data,function(key,value){
					text += '<option value="'+key+'">'+value+'</option>';
				});

				$("#ID_COUNTY").html(text);
				$('#ID_COUNTY').select2();
			}, "json"); 
		}

		function get_districts(ID_AMPHURES){
			var url = "<?php echo base_url("ajax_get_data/get_districts"); ?>";
			var data = {ID_AMPHURES:ID_AMPHURES};
			var text = "<option disabled selected>เลือกแขวง/ตำบล</option> ";
			$("#ID_DISTRICT").html('');
			$.post( url, data, function( data ) {
				$.each(data,function(key,value){
					text += '<option value="'+key+'">'+value+'</option>';
				});
				
				$("#ID_DISTRICT").html(text);
				$('#ID_DISTRICT').select2();
			}, "json"); 
		}

		function get_zipcode(ID_DISTRICT){
			var url = "<?php echo base_url("ajax_get_data/get_zipcode"); ?>";
			var data = {ID_DISTRICT:ID_DISTRICT};
			$("#POSTAL_CODE").html('');
			$.post( url, data, function( data ) {
				$("#POSTAL_CODE").val(data); 
			}); 
		}
		

		function myFunction(item, index) {
			text += index + ": " + item + "<br>"; 
		}

	</script>
