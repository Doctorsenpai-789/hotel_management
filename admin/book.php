<?php 
include('db_connect.php');
	$rid = '';

$calc_days = abs(strtotime($_GET['out']) - strtotime($_GET['in'])) ; 
 $calc_days =floor($calc_days / (60*60*24)  );
?>
<div class="container-fluid">
	

<form action="" id="manage-check" method="get">
  <input type="hidden" name="cid" value="<?php echo isset($_GET['cid']) ? $_GET['cid']: '' ?>">
  <input type="hidden" name="rid" value="<?php echo isset($_GET['rid']) ? $_GET['rid']: '' ?>">
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
		<input type="date" name="date_in" id="date_in" class="form-control" value="<?php echo isset($_GET['in']) ? date("Y-m-d",strtotime($_GET['in'])): date("Y-m-d") ?>" required readonly>
  </div>
    <div class="form-group col-md-6">
	   <label for="date_in_time">Check-in Time</label>
		<input type="time" name="date_in_time" id="date_in_time" class="form-control" value="<?php echo isset($_GET['date_in']) ? date("H:i",strtotime($_GET['date_in'])): date("H:i") ?>" required>
    </div>
	</div>
  <div class="form-row">
    <div class="form-group col-md-6">
	    <label for="days">Days of Stay</label>
	    <input type="number" min ="1" name="days" id="days" class="form-control" value="<?php echo isset($_GET['in']) ? $calc_days: 1 ?>" required readonly>
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
				url:'admin/ajax.php?action=save_book',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp >0){
						alert_toast("Data successfully saved",'success')
						setTimeout(function(){
						end_load()
						$('.modal').modal('hide')
						},1500)
					}
				}
			})
			
		 }
		
		
	})
</script>