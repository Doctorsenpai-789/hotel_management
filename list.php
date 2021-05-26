<?php
$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d',strtotime(date('Y-m-d').' + 3 days'));
?>


<style>

header.masthead {
/* background: url("assets/img/<?php echo $_SESSION['setting_cover_img'] ?>"); */
background-image:url('https://cdn1.tablethotels.com/media/ecs/global/email/assets/20200402_Zoom/TabletHotels_Jefferson-Mirrored-1.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
margin-top:-13px;
}

.item-rooms img {
    width: 23vw;
}

</style>

<!-- Masthead-->
<header class="masthead ">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-center text-center">
			<div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
					<h1 class="text-uppercase text-white font-weight-bold" data-aos="fade-up">Rooms</h1>
			</div>
			
		</div>
	</div>
</header>

<section class="page-section text-dark" >
	<div class="container">	
			<div class="row justify-content-center">
				<div class="col-lg-11">	
						<div class="card  bg-dark text-white mt-5"  data-aos="fade-up" style="box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
						    	<div class="card-body">	
						         	<form action="index.php?page=list" id="filter" method="POST">
										<div class="form-row">
											<div class="col-md-4 mb-3"  id="check">
											    <label for="check-in">Check-in Date</label>
			        							<input type="text" class="form-control datepicker" name="date_in" autocomplete="off" value="<?php echo isset($date_in) ? date("Y-m-d",strtotime($date_in)) : "" ?>">
											</div>
											<div class="col-md-4 mb-3">
												<label for="check-out">Check-out Date</label>
												<input type="text" class="form-control datepicker" name="date_out" autocomplete="off" value="<?php echo isset($date_out) ? date("Y-m-d",strtotime($date_out)) : "" ?>">
											</div>
											<div class="col-md-4 mb-3" style="margin-top:29px;height:20px;">
										       	<button class="btn  rounded w-100 text-white" style="background:#f4623a">Check Availability</button>
									        </div>
										</div>
									</form>
						
							   </div>
						</div>	
						<?php 
						
						 $cat = $conn->query("SELECT * FROM room_categories");
						$cat_arr = array();
						while($row = $cat->fetch_assoc()){
							$cat_arr[$row['id']] = $row;
						}
						$qry = $conn->query("SELECT distinct(category_id),category_id from rooms where id not in (SELECT room_id from checked where '$date_in' BETWEEN date(date_in) and date(date_out) and '$date_out' BETWEEN date(date_in) and date(date_out)  )");
							while($row= $qry->fetch_assoc()):

						?>
                        
			
						<div class="card item-rooms mb-3 mt-5"  data-aos="fade-up" style="box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
							<div class="card-body">
								<div class="row ">
									<div class="col-md-5">
										<img  src="assets/img/<?php echo $cat_arr[$row['category_id']]['cover_img'] ?>" alt="">
									</div>
									<div class="col-md-5">
										<h3>
											<b><?php echo 'PHP '.number_format($cat_arr[$row['category_id']]['price'],2) ?></b><span> / per day</span></h3>
             
										<h4><b>
											<?php echo $cat_arr[$row['category_id']]['name'] ?>
										</b></h4>
										<div class="align-self-end mt-5">
											<button class="btn text-white book_now"  style="background:#f4623a" type="button" data-id="<?php echo $row['category_id'] ?>">Book now</button>
										</div>
									</div>
								
							    </div>

							</div>
						</div>

						<?php endwhile; ?>
						
					</div>
				</div>
			</div>	
		</div>	
</section>

<script>
	$('.book_now').click(function(){
		uni_modal('Book','admin/book.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid='+$(this).attr('data-id'))
	})
</script>