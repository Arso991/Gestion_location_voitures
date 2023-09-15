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
				<h1>Changer le mot de passe</h1>
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
                            @if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li><br />
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
</div>
@if (session("message"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Message success </strong> <br>{{session("message")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
</div>
    
@endif
        <div class="card-body">
            <form action="{{route('modif_pass')}}" method="post" style="padding: 2px;" autocomplete="off" enctype="multipart/form-data">
       
            @csrf
                <input type="hidden" name="email" value="{{$email}}">
                <input name="nouvpassword" class="input-form" type="password"  placeholder="Saisissez votre mot de passe">
    
            <button type="submit" class="btn btn-success">
                Envoyer
    
            </button>
            
          
    </div>
                        </div>
					</div>
				</div>
				<div class="w3l-copy-right text-center">
					<p>© 2023 Gestion de voitures. Tous droits réservés
						<a href="#" target="_blank"></a></p>
				</div>
			</div>
		</div>
	</section>
</body>

</html>