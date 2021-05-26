<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Hotel Management System</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
?>

</head>
<style>

	body{
		width: 100%;
	    height: calc(100%);
		background-image:url('https://cdn1.tablethotels.com/media/ecs/global/email/assets/20200402_Zoom/TabletHotels_Jefferson-Mirrored-1.jpg');
		/* background: url(../assets/img/<?php echo $_SESSION['setting_cover_img'] ?>); */
		background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
		color:white;
	}
	.card{
        width: 100%;
        height: 400px;
        margin: 0 auto;
        /* background-color: rgba(255,255,255,0.2); */
		background: #0000002e;
		border:1px solid white;
}

	/* main#main{
		width:100%;
		height: calc(100%);
		background:white;
	} */
	/* #login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	} */
	/* #login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#00000061;
		display: flex;
		align-items: center;
	} */
	/* #login-right .card{
		margin: auto
	}
	.logo {
	    margin: auto;
	    font-size: 8rem;
	    background: white;
	    padding: .5em 0.8em;
	    border-radius: 50% 50%;
	    color: #000000b3;
	} */
	/* #login-left {
	  background: url(../assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
	  background-image:url('https://www.discoverlosangeles.com/sites/default/files/images/2019-01/hollywood-roosevelt-tropicana-pool.jpg?width=1600&height=1200&fit=crop&quality=78&auto=webp');
	  background-repeat: no-repeat;
	  background-size: cover;
	} */
</style>

<body>
  		   <div class="container">
			 <br>
			 <a href="../index.php" class="btn btn-success mt-5 ">Back</a>
            <div class="row justify-content-center " style="margin-top:160px;">
			
  			 <div class="card col-md-4 ">
			   
  				<div class="card-body">
					<br>
  					<form id="login-form" >
  						<div class="form-group">
							  <i class="fas fa-user"></i>
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control ">
  						</div>
  						<div class="form-group">
						    <i class="fas fa-lock"></i>
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
							 <br>
                            <input type="checkbox" onclick="myFunction()"> Show password
  						</div>
  						<center>
						    <button class="btn-sm btn-block btn-wave col-md-4 btn-primary rounded">Login</button>	
						</center>
  					</form>
					  <br>	
  				</div>
				 
  			  </div>
			</div>
		</div>



  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=booked';
				}else if(resp == 2){
					location.href ='index.php?page=booked';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})

	function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>	
</html>