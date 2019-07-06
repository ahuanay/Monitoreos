<?php
	require_once 'php/fbConfig.php';
	require_once 'php/reg-usuarioFB.php';
		
	if(isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
	// if(isset($accessToken)){
    //     if(isset($_SESSION['facebook_access_token'])){
    //         $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    //     }else{
    //         // Token de acceso de corta duración en sesión
    //         $_SESSION['facebook_access_token'] = (string) $accessToken;
            
    //         // Controlador de cliente OAuth 2.0 ayuda a administrar tokens de acceso
    //         $oAuth2Client = $fb->getOAuth2Client();
            
    //         // Intercambia una ficha de acceso de corta duración para una persona de larga vida
    //         $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
    //         $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
            
    //         // Establecer token de acceso predeterminado para ser utilizado en el script
    //         $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    //     }
        
    //     // Redirigir el usuario de nuevo a la misma página si url tiene "code" parámetro en la cadena de consulta
    //     if(isset($_GET['code'])){
	// 		header('Location: index.php');
    //     }
        
    //     // Obtener información sobre el perfil de usuario facebook
    //     try {
    //         $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,picture');
    //         $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    //     } catch(FacebookResponseException $e) {
    //         echo 'Graph returned an error: ' . $e->getMessage();
    //         session_destroy();
    //         // Redirigir usuario a la página de inicio de sesión de la aplicación
    //         header("Location: ./");
    //         exit;
    //     } catch(FacebookSDKException $e) {
    //         echo 'Facebook SDK returned an error: ' . $e->getMessage();
    //         exit;
	// 	}

	// 	$user = new User();

	// 	$arreglo[] = array(
	// 		'Nombre' => $fbUserProfile['first_name'],
    //         'Apellido ' => $fbUserProfile['last_name'],
    //         'Email' => $fbUserProfile['email'],
	// 		'UrlAvatar' => $fbUserProfile['picture']['url']
	// 	);
	// 	$userData = $user->checkUser($arreglo);

    //     $_SESSION['usuario'] = $userData;
    // }else{ $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions); }

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Inicio</title>

	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>

</head>

<body id="page-top">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <script> 
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '605732463249377',
                cookie     : true,
                xfbml      : true,
                version    : 'v3.3'
            });              
        };

        function loginFB() {
            FB.login(function(response) {
                FB.api('/me', { fields: 'id,first_name,last_name,email,picture'}, function(response) {
                    // console.log(response);
                    var data = {
                        Email: response.email,
                        Nombre: response.last_name + " " + response.first_name,
                        Avatar: response.picture.data.url
                    };
                    console.log(data);

                    $.ajax({
                        type: "POST",
                        url: "loginFB.php",
                        data: data,
                        success: function (response) {
                            location.href = 'home.php';
                        }
                    });
                });
            }, {scope: 'public_profile,email'});
            
        }

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/es_ES/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-layer-group"></i></div>
				<div class="sidebar-brand-text mx-3">Monitoreos</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link" href="index.php"><i class="fas fa-home"></i><span>Inicio</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="proyectos.php"><i class="fas fa-tags"></i><span>Proyectos</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="404.php"><i class="fas fa-user-alt"></i><span>Contacto</span></a>
			</li>
			<hr class="sidebar-divider d-none d-md-block">
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<ul class="navbar-nav ml-auto">
						<div class="topbar-divider d-none d-sm-block"></div>
						<li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
					</ul>
				</nav>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="card shadow mb-4">
								<div class="row">
									<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
									<div class="col-lg-6">
										<div class="p-5">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
										</div>
										<div class="user">
											<div class="form-group">
												<input type="email" class="form-control form-control-user" id="Email" placeholder="Email">
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" id="Password" placeholder="Contraseña">
											</div>
											<div class="form-group">
												<div class="custom-control custom-checkbox small">
													<input type="checkbox" class="custom-control-input" id="customCheck">
													<label class="custom-control-label" for="customCheck">Recordarme</label>
												</div>
											</div>
											<button class="btn btn-primary btn-user btn-block" id="login">Iniciar Sesión</button>
											<!-- <a href="<?php echo htmlspecialchars($loginURL); ?>" class="btn btn-primary btn-user btn-block"><i class="fab fa-facebook-f"></i> Iniciar sesión con Facebook</a> -->
											<div class="mt-2 text-center">
												<div class="fb-login-button" data-width="" onlogin="loginFB();" data-size="large" data-button-type="login_with" data-auto-logout-link="false" data-use-continue-as="true"></div>
											</div>
										</div>
										<hr>
										<div class="text-center">
											<a class="small" href="404.php">Se te olvidó tu contraseña?</a>
										</div>
										<div class="text-center">
											<a class="small" href="register-person.php">Crear una personal!</a>
											<a class="small" href="register-business.php">Crear una municipal!</a>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div>
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; 2019</span>
					</div>
					</div>
				</footer>
			</div>
		</div>
  	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin-2.min.js"></script>
	<script src="vendor/chart.js/Chart.min.js"></script>
	<script src="js/demo/chart-area-demo.js"></script>
	<script src="js/demo/chart-pie-demo.js"></script>
	<script src="js/alertify.min.js"></script>
	<script src="js/login.js"></script>
	<script src="js/function.js"></script>
</body>
</html>