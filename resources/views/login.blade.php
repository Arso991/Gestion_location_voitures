<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion de voitures</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Trendz Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<!--/Style-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--//Style-CSS -->
</head>

<body>
	<!-- /login-section -->

	<section class="w3l-forms-23">
		<div class="forms23-block-hny">
			<div class="wrapper">
				<h1>Se connectez</h1>
				<!-- if logo is image enable this   
					<a class="logo" href="index.html">
					  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
					</a> 
				-->
				<div class="d-grid forms23-grids">
					<div class="form23">
						<div class="main-bg">
							<h6 class="sec-one"></h6>
							<div class="speci-login first-look">
								<img src="images/user.png" alt="" class="img-responsive">
							</div>
						</div>
						<div class="bottom-content">
							@if (session("error"))
								<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
									<strong style="color:red"> {{ session("error") }} </strong> <br>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
                            @endif
							@if (session("success"))
								<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
									<strong style="color:rgb(39, 160, 9)"> {{ session("success") }} </strong> <br>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
                            @endif
							<form action="{{ route('traitementLogin') }}" method="post">
                                @csrf
								<input type="email" name="email" class="input-form" placeholder="Votre email" required="required" />
								<input type="password" name="password" class="input-form"
										placeholder="Votre mot de passe" required="required" />
								<button type="submit" class="loginhny-btn btn">Login</button>
							</form>
							<p>Vous n'êtes pas inscrit ? <a href="{{ route('register') }}">Rejoignez-nous !</a></p>
                            <br>
							<p><a href="{{ route('emailForgot') }}">Mot de passe oublié</a></p>
						</div>
					</div>
				</div>
				<div class="w3l-copy-right text-center">
					<p>© 2023 Gestion de voitures.Auteur GNANHOUNGBE Arsène et HOUANGNI yakid
						<a href="#" target="_blank"></a></p>
				</div>
			</div>
		</div>
	</section>
</body>

</html>