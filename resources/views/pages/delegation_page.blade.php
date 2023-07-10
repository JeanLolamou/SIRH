


<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="X-Flash - Admin Template">
		<meta name="author" content="Creative Template">
		<meta name="keyword" content="X-Flash, Admin, Admin Template, Dashboard, Bootstrap, Twitter Boostrap, Template, Theme, Responsive, Jquery, Administration, Administration Template, Administration Theme, Fluid, Retina">
	    <title>T-Great - Admin Template</title>		
		
		<!-- Import google fonts - Heading first/ text second -->
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' />
        <!--[if lt IE 9]>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->

		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="ico/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="ico/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="ico/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="ico/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="ico/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="ico/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="ico/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="ico/apple-touch-icon-152x152.png" /> 

	    <!-- Css files -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">		
		<link href="css/jquery.mmenu.css" rel="stylesheet">		
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">			   
	    <link href="css/style.min.css" rel="stylesheet">
		<style>
			footer {
				display: none;
			}
		</style>

	  </head>
</head>

<body>
	<div class="container-fluid content">
		<div class="row">
			<div id="content2" class="col-sm-12 full">
			
				<div class="row">
					<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3 ">	
                  <div class="panel panel-default" style="margin-top: 50px;">
					  	<div class="panel-heading">
							 <img class="avatar img-responsive img-circle img-rounded" src="{{ asset('images/profil/'.photo(Auth::user()->id).'')}}" style="height: 50px;width: 50px;">
							<div class="pull-right text-right">
								<a href="{{route('accueil')}}" class="btn btn-primary">Continuer</a>
							</div>
							<div><a href="#"><strong>{{nom_user(Auth::user()->id)}}</strong></a></div>
							<div class="small"><i class="fa fa-user"></i> Compte principale</div>
							
					    	
					  	</div>
					  	<div class="panel-body">
					    	
							<div class="row">
								 @foreach ($delegation as $delegation)
								<div class="col-lg-6 col-md-6 col-xs-12">
									<img class="img-responsive" src="{{ asset('images/profil/'.photo($delegation->id_delegant).'')}}" style="max-height: 200px;max-width: 200px;">
									<h2>{{nom_user($delegation->id_delegant)}}</h2>	
						            <p>Compte delegué</p>
						            <a href="{{route('gerer',$delegation->id_delegant)}}" class="btn btn-primary">GERER</a>
						        @endforeach
								</div><!--/.col-->
								
								
							</div><!--/.row-->
							
					
					  	</div>
					</div>
					</div>

				</div><!--/row-->
		
			</div><!--/content-->	
			
		</div><!--/row-->
				
		
	</div><!--/container-->
		
		
	<!-- start: JavaScript-->
	<!--[if !IE]>-->

			<script src="js/jquery-2.1.1.min.js"></script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script src="js/jquery-1.11.1.min.js"></script>
	
	<![endif]-->

	<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='js/jquery-2.1.1.min.js'>"+"<"+"/script>");
		</script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>"+"<"+"/script>");
		</script>
		
	<![endif]-->
	<script src="js/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	
	
	<!-- page scripts -->
	<script src="js/jquery.backstretch.min.js"></script>
	
	<!-- theme scripts -->
	<script src="js/SmoothScroll.js"></script>
	<script src="js/jquery.mmenu.min.js"></script>
	<script src="js/core.min.js"></script>
	
	<!-- inline scripts related to this page -->
	<script src="js/page-lockscreen2.js"></script>
	
	<!-- end: JavaScript-->
	
</body>
</html>