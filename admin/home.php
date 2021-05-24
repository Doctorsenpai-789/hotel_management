<style>
	img#cimg,.cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
	td{
		vertical-align: middle !important;
	}
</style>

<?php include 'db_connect.php';?>
<div class="container-fluid mt-5" >
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="check-monthly-booking">
				<div class="card">
					<div class="card-header bg-dark text-white">
						    Monthly Bookings
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Month</label>
								<!-- <input type="text" class="form-control" name="name"> -->
								<select id="month" name ="month"   class="form-control">
				                 <option name ="january" id="january" >January</option>
				                   <option name ="february"  id="february" >February</option>
				                   <option name ="march"  id="march" >March</option>
				                   <option name ="april"  id="april" >April</option>
				                   <option name ="may" id="may">May</option>
								   <option name ="june" id="june">June</option>
								   <option name ="july" id="july">July</option>
								   <option name ="august" id="august">August</option>
								   <option name ="september" id="september">September</option>
								   <option name ="october" id="october">October</option>
								   <option name ="november" id="novmeber">November</option>
								   <option name ="december" id="december">December</option>
			                    </select>
							</div>
							<div class="form-group">
								<label class="control-label">Number of Booking</label>
								<input type="numberofbooking" class="form-control text-right" name="price" step="any">
							</div>
							<!-- <div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
							</div> -->
							<div class="form-group">
								<img src="<?php echo isset($image_path) ? '../assets/img/' . $cover_img : '' ?>" alt="" id="cimg">
							</div>
					</div>

					<div class="card-footer">
					
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead class="bg-dark text-white">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Room</th>
									<th class="text-center">Book</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
                                 $i = 1;
                                 $cats = $conn->query("SELECT * FROM room_categories order by id asc");
								//  $count = mysql_num_rows($cats);
								//  echo('<script>alert($count)</script>');
                                 while ($row = $cats->fetch_assoc()):
	                             ?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>


									<td class="text-center">
										<img src="<?php echo isset($row['cover_img']) ? '../assets/img/' . $row['cover_img'] : '' ?>" alt="" id="cimg" height="60" width="200" >
									</td>
									<td class="">
										<p>Name : <b><?php echo $row['name'] ?></b></p>
										<p>Price : <b><?php echo "$" . number_format($row['price'], 2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-success edit_cat" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-price="<?php echo $row['price'] ?>" data-cover_img="<?php echo $row['cover_img'] ?>">Edit</button>
										<button class="btn btn-sm btn-danger delete_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>

</div>

<?php include('db_connect.php'); 
$cat = $conn->query("SELECT * FROM room_categories");
$cat_arr = array();
while($row = $cat->fetch_assoc()){
	$cat_arr[$row['id']] = $row;
}
$room = $conn->query("SELECT * FROM rooms");
$room_arr = array();
while($row = $room->fetch_assoc()){
	$room_arr[$row['id']] = $row;
}
?>
<div class="container-fluid">
	<div class="col-lg-12 mt-5">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>Category</th>
								<th>Room</th>
								<th>Reference</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$checked = $conn->query("SELECT * FROM checked where status != 0 order by status desc, id asc ");
								while ($row = $checked->fetch_assoc()):
									
									
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $cat_arr[$room_arr[$row['room_id']]['category_id']]['name'] ?></td>
									<td class=""><?php echo $room_arr[$row['room_id']]['room'] ?></td>
									<td class=""><?php echo $row['ref_no'] ?></td>
									<?php if($row['status'] == 1): ?>
										<td class="text-center"><span class="badge badge-warning">Checked-In</span></td>
									<?php else: ?>
										<td class="text-center"><span class="badge badge-success">Checked-Out</span></td>
									<?php endif; ?>
									<td class="text-center">
											<button class="btn btn-sm btn-primary check_out" type="button" data-id="<?php echo $row['id'] ?>">View</button>
									</td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('table').dataTable()
	$('.check_out').click(function(){
		uni_modal("Check Out","manage_check_out.php?checkout=1&id="+$(this).attr("data-id"))
	})
	$('#filter').submit(function(e){
		e.preventDefault()
		location.replace('index.php?page=check_in&category_id='+$(this).find('[name="category_id"]').val()+'&status='+$(this).find('[name="status"]').val())
	})
</script>

<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-category').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_category',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_cat').click(function(){
		start_load()
		var cat = $('#manage-category')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		cat.find("#cimg").attr('src','../assets/img/'+$(this).attr('data-cover_img'))
		end_load()
	})
	$('.delete_cat').click(function(){
		_conf("Are you sure to delete this category?","delete_cat",[$(this).attr('data-id')])
	})
	function delete_cat($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_category',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	$('#check-monthly-booking').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=check_monthly_booking',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'GET',
		    type: 'GET',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
</script>
