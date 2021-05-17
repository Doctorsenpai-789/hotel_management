 <style>
body{
	color:white;
}
.card{
        width: 100%;
        height: 140px;
        margin: 0 auto;
        background: #0000002e;
		border:1px solid white;
		
}

 </style>
 
 <!-- Masthead-->
        <header class="masthead">   
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-10 align-self-end mb-4">
                    	<div class="card" id="filter-book">
                    		<div class="card-body" >
                    			<div class="container-fluid" >
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
											<div class="col-md-4 mb-3" style="margin-top:31px;">
												   <button class="btn-btn-block btn-primary rounded w-100 p-2">Check Availability</button>
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
	<section class="page-section">
		<div class="row justify-content-center">
		<marquee style="color:black;font-size:18px;">𝐂𝐨𝐦𝐞, 𝐬𝐭𝐚𝐲 𝐚𝐧𝐝 𝐞𝐧𝐣𝐨𝐲 𝐲𝐨𝐮𝐫 𝐝𝐚𝐲. 𝐖𝐞 𝐠𝐢𝐯𝐞 𝐲𝐨𝐮 𝐚 𝐥𝐞𝐠𝐞𝐧𝐝𝐚𝐫𝐲 𝐰𝐞𝐥𝐜𝐨𝐦𝐞, 𝐞𝐯𝐞𝐫𝐲 𝐭𝐢𝐦𝐞 𝐲𝐨𝐮 𝐜𝐨𝐦𝐞 𝐛𝐚𝐜𝐤. </marquee> 
		</div>
        </section>
		
	<div id="portfolio">
            <div class="container-fluid p-3">
                <div class="row no-gutters">
                	<?php 
                	include 'admin/db_connect.php';
                	$qry = $conn->query("SELECT * FROM  room_categories");
                	while($row = $qry->fetch_assoc()):
                	?>
                    <div class=" col-sm-3 m-3 ml-5">
                        <a class="portfolio-box" href="#">
                            <img class="img-fluid m-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;" src="assets/img/<?php echo $row['cover_img'] ?>" alt="" />
                            <div class="portfolio-box-caption" style="background-color:pink;height:250px;width:253px;">
                                <div class="project-category text-black-30"><?php echo "$ ".number_format($row['price'],2) ?>  per day</div>
                                <div class="project-name"><?php echo $row['name'] ?></div>
                            </div>
                        </a>
                    </div>
                	<?php endwhile; ?>

                </div>
            </div>
        </div>
