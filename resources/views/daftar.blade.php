<!doctype html>
<html lang="en">
  <head>
  	<title>Bukukita - Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/7b5d20839a.js" crossorigin="anonymous"></script>
    <!--sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	</head>
	<body class="img" style="background-image: url(/storage/default/bg.jpg); height: 100vh;">

    @if(session()->has('pesan'))
    <script>swal("Register gagal!", "{{ session('pesan') }}", "error");</script>
    @endif

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Daftar Akun</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="/register" method="POST"class="signin-form">
					@csrf
		      		<div class="form-group">
		      			<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required>
						<small style="color:red;" >@error('email') {{ $message }} @enderror</small>
		      		</div>
                      <div class="form-group">
		      			<input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required>
                        <small style="color:red;" >@error('username') {{ $message }} @enderror</small>
		      		</div>
                      <div class="form-group">
		      			<input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                        <small style="color:red;" >@error('phone') {{ $phone }} @enderror</small>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				  <small style="color:white;" >@error('password') {{ $message }} @enderror</small>
	            </div>
                <div class="form-group">
	              <input id="password-field" type="password" name="password2" class="form-control @error('password2') is-invalid @enderror" placeholder="Password confirmation" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				  <small style="color:white;" >@error('password2') {{ $message }} @enderror</small>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" value="Buat akun" class="form-control btn btn-primary submit px-3">Submit</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>