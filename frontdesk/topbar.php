<style>

	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }

  .navbar{
    background-color: black;
  }

</style>

<nav class="navbar navbar-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<i class="fa fa-building"></i>
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white mt-2">
        <large><b><?php echo $_SESSION['setting_hotel_name']; ?></b></large>
      </div>
	  	<div class="col-md-2 float-right text-white mt-2">
<<<<<<< HEAD
	  		<a href="../admin/ajax.php?action=logout" class="text-white ml-5"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off ml-2"></i></a>
=======
	  		<a href="ajax.php?action=logout" class="text-white ml-5"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off ml-2"></i></a>
>>>>>>> b3eb3a2cd0a8514ccb8714023ebb0e1732c103f7
	    </div>
    </div>
  </div>
  
</nav>