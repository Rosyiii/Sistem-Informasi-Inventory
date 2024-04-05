<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/style.css">

	<title>{{ $tittle }}</title>
</head>

<body>
	<header data-bs-theme="dark">
		@if (session()->has('message'))
			<div class="alert alert-warning alert-dismissible fade show alert-close text-uppercase" role="alert">
				{{ session('message') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
		<div class="navbar navbar-dark">
			<div class="container">
				<div class="row" style="width: 260px;">
					<a href="/" class="row navbar-title navbar-brand d-flex align-items-center">
						<Strong class="">COMPANY</Strong>
						<strong class="">NAME</strong>
					</a>
				</div>
				<div class="dropstart">
					<button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
							class="bi bi-person-circle" viewBox="0 0 16 16">
							<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
							<path fill-rule="evenodd"
								d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
						</svg>
					</button>
					<ul class="dropdown-menu dropdown-menu-dark">
						<li>
							<p class="dropdown-item text-capitalize">Nama : {{ substr(auth()->user()->name ,0,8) }}</p>
						</li>
						<li>
							<p class="dropdown-item text-capitalize">Jabatan : {{ auth()->user()->jabatan }}</p>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<form action="/logout" method="POST">
								@csrf
								<button type="submit" class="dropdown-item btn btn-secondary">Keluar</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- Form -->
	<div class="rectangle-form row">
		<!-- Form Menu -->
		<div class="col-auto form-menu align-self-start list-group">
			<header class="form-menu-text">INVENTORY MANAJEMEN</header>
			<ul>
				@include('partials.global_menu')
			</ul>
		</div>
		<!-- Form fill -->
		<div class="col">
			@yield('fill')
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

	<script src="../js/fungsi.js"></script>
</body>

</html>