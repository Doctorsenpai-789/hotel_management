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
			<div class="col-md-12">
				<form action="" id="check-monthly-booking">
					<div class="card-deck m-1">
					    <div class="card">
							<div class="card-header bg-dark text-white text-center">
								Total Bookings
								</div>
								<br>

								<div class="row justify-content-center mb-4">
									<?php
										$checked = $conn->query("SELECT count(*) FROM book_record");
										while ($row = $checked->fetch_array()):
											$count = $row[0];

											echo "<h1>" . $count . "<h1>";

										endwhile;?>
							   </div>

						</div>
						<div class="card">
							<div class="card-header bg-dark text-white text-center">
								  Total Check-In
								</div>
								<br>

								<div class="row justify-content-center mb-4">
									<?php
										
										$checked = $conn->query("SELECT count(*) FROM checked WHERE status = 1  order by id asc ");
										while ($row = $checked->fetch_array()):
											$count = $row[0];

											echo "<h1>" . $count . "<h1>";

										endwhile;?>
							   </div>

						</div>
						<div class="card">
							<div class="card-header bg-dark text-white text-center">
								Total Checkouts
							</div>
							<br>

							<div class="row justify-content-center mb-4">
								<?php
										$checked = $conn->query("SELECT count(*) FROM checked WHERE status = 2  order by id asc ");
										while ($row = $checked->fetch_array()):
											$count = $row[0];

											echo "<h1>" . $count . "<h1>";

										endwhile;?>
							
							</div>
						</div>

					</div>
				</form>
				
				<br>
				<div class="col-md-12">
				<form id="filter">
					<div class="row">
						<div class=" col-md-4">
							<label class="control-label">Month</label>
							<select class="custom-select browser-default" name="category_id">
								<option value="all" <?php echo isset($_GET['category_id']) && $_GET['category_id'] == 'all' ? 'selected' : '' ?>>All</option>
								<?php
								$cat = $conn->query("SELECT * FROM book_record");
								while ($row = $cat->fetch_assoc()) {
									$cat_name[$row['id']] = $row['name'];
									?>

								<option value="<?php echo $row['id'] ?>" <?php echo isset($_GET['category_id']) && $_GET['category_id'] == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="col-md-2">
							<label for="" class="control-label">&nbsp</label>
							<button class="btn btn-block btn-info">Filter</button>
						</div>
					</div>
				</form>
			</div>

			<!-- FORM Panel -->
			<?php

			$cat = $conn->query("SELECT * FROM room_categories");
			$cat_arr = array();
			while ($row = $cat->fetch_assoc()) {
				$cat_arr[$row['id']] = $row;
			}
			$room = $conn->query("SELECT * FROM rooms");
			$room_arr = array();
			while ($row = $room->fetch_assoc()) {
				$room_arr[$row['id']] = $row;
			}
			?>
					
			<div class="container-fluid">
				<div class=" mt-5">
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<th>#</th>
											<th>Category</th>
											<th>Reference</th>
											<th>Status</th>
											<th>Action</th>
										</thead>
										<tbody>

											<?php
												$i = 1;
												$cats = $conn->query("SELECT * FROM book_record order by id asc");
												while ($row = $cats->fetch_assoc()):
												?>
											<tr>
												<td class="text-center"><?php echo $i++ ?></td>
												<td class="text-center"><?php echo $cat_arr[$row['booked_cid']]['name'] ?></td>
												<td class=""><?php echo $row['ref_no'] ?></td>
													<td class="text-center"><span class="badge badge-warning">Booked</span></td>
												<td class="text-center">
														<button class="btn btn-sm btn-primary check_out" type="button" data-id="<?php echo $row['id'] ?>">View</button>
												</td>
											</tr>
											<?php endwhile;?>
										</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
	</div>
</div>

<script>
	$('table').dataTable()
	$('.check_out').click(function(){
		uni_modal("Check Out","manage_book.php?checkout=1&id="+$(this).attr("data-id"))
	})
	$('#filter').submit(function(e){
		e.preventDefault()
		location.replace('index.php?page=check_in&category_id='+$(this).find('[name="category_id"]').val()+'&status='+$(this).find('[name="status"]').val())
	})
</script>







