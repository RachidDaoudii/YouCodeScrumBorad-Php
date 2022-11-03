<?php
    include('scripts.php');
    include('database.php');
	global $connection;
?>

<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
	<!-- ================== END core-css ================== -->
</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <!-- session erreur -->
			<?php if(isset($_SESSION['erreur'])):  ?>
				<div class="alert alert-red alert-dismissible fade show">
				<strong>Erreur!</strong>
				<?php 
					echo $_SESSION['erreur']; 
					unset($_SESSION['erreur']);
				?>
				<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
			</div>
			<?php endif ?>
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="scripts.php" method="post">
                <h3 class="mb-5">Sign in</h3>
                <div class="form-outline mb-4">
                    <input type="email" name="login_email" placeholder="Email" id="typeEmailX-2" class="form-control form-control-lg" data-parsley-required data-parsley-trigger="keyup" />
                    <!-- <label class="form-label" for="typeEmailX-2"></label> -->
                </div>
                <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" placeholder="Password" name="login_password" class="form-control form-control-lg" data-parsley-required data-parsley-trigger="keyup" />
                    <!-- <label class="form-label" for="typePasswordX-2"></label> -->
                </div>
				<button type="submit" name="connecter" class="btn btn-primary" id="ctn-btn">Se connecter</button>
            </form><br>
            <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#modal_login">Créer nouveau compte</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TASK MODAL -->
<div class="modal fade" id="modal_login">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" id="form_task">
					<div class="modal-header">
						<h5 class="modal-title" id="mode_modal">nouveau compte</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
                        <!-- This Input Allows Storing Task Index  -->
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="login_nom" class="form-control" id="login_nom" value="" data-parsley-required  data-parsley-trigger="keyup"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prenom</label>
                            <input type="text" name="login_prenom" class="form-control" id="login_prenom" value="" data-parsley-required  data-parsley-trigger="keyup"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="login_email" class="form-control" id="login_email" value="" data-parsley-type="email" data-parsley-required  data-parsley-trigger="keyup"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="login_password" class="form-control" id="login_password" value="" data-equalto="#login_password_com" data-parsley-required data-parsley-trigger="keyup"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">password confirmation</label>
                            <input type="password" name="login_password_com" class="form-control" id="login_password_com" value="" data-parsley-equalto="#login_password" data-parsley-required data-parsley-trigger="keyup"/>
                        </div>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" name="login" class="btn btn-primary" id="login-btn">login</button>
					</div>
				</form>
			</div>
		</div>
	<!-- ================== BEGIN core-js ================== -->
	<script src="scripts.js"></script>
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/parsley.js"></script>
	<script src="assets/js/parsley.min.js"></script>
	<script src="https://parsleyjs.org/dist/parsley.js"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>