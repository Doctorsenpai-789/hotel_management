<?php 
include('db_connect.php');
	$rid = $_GET['rid'];
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$qry = $conn->query("SELECT * FROM checked where id =".$id);
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $v){
			$meta[$k]=$v;
		}
	}
	$calc_days = abs(strtotime($meta['date_out']) - strtotime($meta['date_in'])) ; 
 $calc_days =floor($calc_days / (60*60*24)  );
 $cat = $conn->query("SELECT * FROM room_categories");
$cat_arr = array();
while($row = $cat->fetch_assoc()){
	$cat_arr[$row['id']] = $row;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-check">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<?php if(isset($_GET['id'])):
			$rooms = $conn->query("SELECT * FROM rooms where status =0 or id = $rid order by id asc");
		 ?>

		<div class="form-group">
			<label for="name">Room</label>
			<select name="rid" id="" class="custom-select browser-default">
				
				<?php while($row=$rooms->fetch_assoc()): ?>
				<option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $rid ? "selected": '' ?>><?php echo $row['room'] . " | ". ($cat_arr[$row['category_id']]['name']) ?></option>
				<?php endwhile; ?>
			</select>
			
		</div>

		<?php else: ?>
		<input type="hidden" name="rid" value="<?php echo isset($_GET['rid']) ? $_GET['rid']: '' ?>">
		<?php endif; ?>

        <div class="form-row">
			<div class="form-group col-md-6">
				<label for="name">Full Name</label>
				<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
			</div>
			<div class="form-group col-md-6">
				<label for="contact">Contact #</label>

				<input type="number" name="contact" id="contact" class="form-control" value="<?php echo isset($meta['contact_no']) ? $meta['contact_no']: '' ?>" required>

			</div>
		</div>
		<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required>
		</div>
		<div class="form-row">
		<div class="form-group col-md-6">
				<label for="date_in">Check-in Date</label>
				<input type="date" name="date_in" id="date_in" class="form-control" value="<?php echo isset($meta['date_in']) ? date("Y-m-d",strtotime($meta['date_in'])): date("Y-m-d") ?>" required>
		</div>
		
			<div class="form-group col-md-6">
			<label for="date_in_time">Check-in Time</label>
				<input type="time" name="date_in_time" id="date_in_time" class="form-control" value="<?php echo isset($meta['date_in']) ? date("H:i",strtotime($meta['date_in'])): date("H:i") ?>" required>
			</div>
			</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="days">Days of Stay</label>
				<input type="number" min ="1" name="days" id="days" class="form-control" value="<?php echo isset($meta['date_in']) ? $calc_days: 1 ?>" required>
			</div>
			<div class="form-group col-md-6">
				<label for="name" >Payment Method</label>
					<select id="payment_Method" name ="payment_Method"   value="<?php echo isset($_GET['payment_Method']) ? $_GET['payment_Method']: '' ?>" class="form-control">
						<option name ="palawan" id="palawan"  >Palawan</option>
						<option name ="g-cash"  id="g-cash"  >G-cash</option>
						<option name ="credit"  id="credit"  >Credit card</option>
						<option name ="checks"  id="checks"  >Checks</option>
						<option name ="mhuiller" id="mhuiller"  >Mhuiller</option>
					</select>
			</div>
		</div>



		
	</form>
</div>

<script>

	$('#manage-check').submit(function(e){
		e.preventDefault();
		start_load()
		

			$.ajax({
				url:'ajax.php?action=save_check-in',
				method:'POST',
				data:$(this).serialize(),
				success:function(res){
					if(res> 0){
						alert_toast("Data successfully saved",'success')
						uni_modal("Check-in Details","manage_check_out.php?id="+res)
						setTimeout(function(){
						end_load()
						},1500)
					}
				}
			})

		});
		
</script>