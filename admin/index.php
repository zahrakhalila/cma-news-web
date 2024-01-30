<?php
    session_start();
    //Database Configuration File
    include('includes/config.php');

    $error = '';
    $validate = '';
    
    if( isset($_POST['login']) ){
            
		$username = stripslashes($_POST['username']);
		$username = mysqli_real_escape_string($con, $username);
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($con, $password);
					
		if(!empty(trim($username)) && !empty(trim($password))){

			$query      = "SELECT * FROM tbladmin WHERE username = '$username'";
			$result     = mysqli_query($con, $query);
			$rows       = mysqli_num_rows($result);
			$row        = mysqli_fetch_array($result);
			$_SESSION["username"]=$row["username"];

			if ($row != 0) {
				//langsung verify
				if ($_SESSION["username"]=$row["username"]=='admin' AND $password==$row["password"]){
					header("Location:dashboard.php");

				}else { ?>
					<script language="JavaScript">
						alert('Nama Pengguna dan Kata Sandi salah. Silakan coba lagi!');
						document.location='login.php';
					</script>
				<?php }
						
			} else { 
				$error =  'Login Gagal !!';
			}
			
		} else { ?>
			<script language="JavaScript">
				alert('Data tidak boleh kosong!!');
				document.location='login.php';
			</script>
		<?php
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>
    <link rel="icon" type="image/x-icon" href="../asset/Logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
</head>
<body class="bg-light">
<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center">
                        <img src="../asset/logo-dark.png" alt="logo" width="380">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login Admin</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Nama Pengguna</label>
									<input id="username" type="username" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback">Nama Pengguna Salah</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Kata Sandi</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">Masukkan Kata Sandi</div>
								</div>

								<div class="d-flex align-items-center">
									<button name="login" type="submit" class="btn ms-auto" style="background-color: #2d2a70; color:white">Masuk</button>
								</div>
							</form>

                            <div class="clearfix"></div>
                                <a href="../index.php">Back Home</a>
                            </div>
						</div>
					</div>
					<div class="text-center mt-4 text-muted">
                        © Copyright Dinas Komunikasi, Informatika dan Statistik 2024 develop by magang UNS. All Rights Reserved
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>