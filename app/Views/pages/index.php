
	<div class="container">
		<br>
	<h1>รายการข้อมูล</h1>
	<hr>
		
		<div class="row " >
			<div class="col col-md-12 text-right">
				<a class="btn btn-primary" href="<?php echo base_url('home/add');?>">เพิ่มข้อมูล</a>
			</div>
		</div>
		<div class="row">
			<div class="col col-md-12">
				<table class="table table-striped">
					<thead>
					<tr>
						<th width="10%" style="text-align:center">ลำดับ</th>
						<th width="70%" style="text-align:center">ชื่อ-นามสกุล</th>
						<th width="20%" style="text-align:center">การจัดการ</th>
					</tr>
					</thead>
					<tbody>
						<?php
							$i = 0;
							foreach($data as $key):
								$i++;
								?>
								<tr>
									<td style="text-align:center"><?php echo $i; ?></td>
									<td><?php echo $key['FIRST_NAME']." ".$key['LAST_NAME']; ?></td>
									<td>
										<a class="btn btn-warning" href="<?php echo base_url('home/edit/'.$key['USER_ID']);?>" data-toggle="tooltip" data-placement="top" title="ทำการแก้ไขข้อมูล">แก้ไข</a>
										<a class="btn btn-danger" href="<?php echo base_url('home/delete/'.$key['USER_ID']);?>" data-toggle="tooltip" data-placement="top" title="ทำการลบข้อมูล">ลบ</a>
									</td>
								</tr>
		<?php				endforeach 	?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

