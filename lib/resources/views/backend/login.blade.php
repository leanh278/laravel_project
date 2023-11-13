<!DOCTYPE html>
<html>
<head>
<base href="{{asset('public/backend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/styles1.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
<a href="{{asset('/')}}" style="display: flex;justify-content: center;margin-bottom: 40px;width:45%;" class="header_wrapper-logo-link container">
    <img style="width:100%" src="img/logo.png" alt="">
</a>
	<div class="row" style="width: 100%;">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="form_header">
					<div class="panel-heading" style="color: #FFD642;" >Đăng Nhập</div>
					<a href="{{asset('/register')}}" class="panel-heading panel-heading-a">Đăng Ký</a>
				</div>
				
				<div class="panel-body">
					<form role="form" method="post" id="form-1">
						<fieldset>
						@include('errors.note') 
							<!-- <div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="{{old('email')}}">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div style="display: flex;width: 100%;justify-content: space-between;">
								<input type="submit" name ="submit" value="Login" class="btn btn-primary">
								<a href="" class="btn btn-primary">Đăng Ký</a>
							</div> -->

						
							<div class="form-group">
								<label for="email" class="form-label">Email</label>
								<input id="email" class="form-control1" placeholder="E-mail" name="email" type="email"  value="{{old('email')}}">
								<span class="form-message"></span>
							</div>
						
							<div class="form-group">
								<label for="password" class="form-label">Mật khẩu</label>
								<input id="password" class="form-control1" placeholder="Password" name="password" type="password" value="">
								<span class="form-message"></span>
							</div>
						
						
							<input type="submit" name ="submit" value="Đăng Nhập " class=" form-submit">
    
						</fieldset>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<script src="js/main.js"></script>
    <script>
        //mong muon cua ta
        Validator({
            form: '#form-1',
            erorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname'),
                Validator.isEmail('#email'),
                Validator.minLength('#password',6),
                Validator.isConfirmed('#password_confirmation',function () {
                  return document.querySelector('#form-1 #password').value;
                }, 'Nhập mật khẩu lại không chính xác')
            ]
        });
    </script>
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>

</body>

</html>
