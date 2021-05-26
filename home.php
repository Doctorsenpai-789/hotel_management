<style>

    .card {
	width: 100%;
	height: 140px;
	margin: 0 auto;
	background: #0000002e;
	border:1px solid white;
    }

    header.masthead {
	/* background: url("assets/img/<?php echo $_SESSION['setting_cover_img'] ?>");  */
	background-image:url('https://cdn1.tablethotels.com/media/ecs/global/email/assets/20200402_Zoom/TabletHotels_Jefferson-Mirrored-1.jpg'); */
	background-repeat: no-repeat;
	background-attachment: fixed;
	margin-top:-23px;
	background-size: 100% 100%;
	} 

 </style>
        <!-- Masthead-->
        <header class="masthead">   
            <div class="container h-100">
                <div class="row h-75 align-items-center justify-content-center m-t-5">
                    <div class="col-lg-10 align-self-end mb-4">
                    	<div class="card" id="filter-book" data-aos="flip-left">
                    		<div class="card-body" >
                    			<div class="container-fluid text-white" >
									<form action="index.php?page=list" id="filter" method="POST">
										<div class="form-row">
											<div class="col-md-4 mb-3"  id="check">
												<label for="check-in" class="pull-left">Check-in Date</label>
												<input type="text" class="form-control datepicker rounded" name="date_in" autocomplete="off">
											</div>
										
											<div class="col-md-4 mb-3">
												<label for="check-out">Check-out Date</label>
												<input type="text" class="form-control datepicker rounded" name="date_out" autocomplete="off">
											</div>
											
											<div class="col-md-4 mb-3" style="margin-top:28px;height:45px;">
												   <button class="btn  rounded w-100 text-white" style="background:#f4623a">Check Availability</button>
									        </div>
										</div>

									</form>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    
                </div>
            </div>
        </header>

		<br>
	    <h1 class="text-center" data-aos="fade-up" >Our Rooms</h1>
		<hr/>

	    <div id="portfolio" class="">
            <div class="container-fluid" >
                <div class="row no-gutters justify-content-center">
                	<?php 
                	include 'admin/db_connect.php';
                	$qry = $conn->query("SELECT * FROM  room_categories");
                	while($row = $qry->fetch_assoc()):
                	?>
                    <div class=" col-sm-3 m-3 ml-5" data-aos="fade-up">
                        <a class="portfolio-box" href="#">
                            <img class="img-fluid m-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;" src="assets/img/<?php echo $row['cover_img'] ?>" />
                            <div class="portfolio-box-caption mt-5" style="background-color:#f4623a ;height:238px;width:353px;">
							    <br>
								<br>
								<div class="container mt-5" >
									<div class="row justify-content-center">
									</div>
									<div class="row justify-content-center">
									     <h6><?php echo "PHP ".number_format($row['price'],2) ?>  per day</h6>
									</div>
								</div>
                            </div>
                        </a>
                    </div>
                	<?php endwhile; ?>

                </div>
            </div>
    </div>


