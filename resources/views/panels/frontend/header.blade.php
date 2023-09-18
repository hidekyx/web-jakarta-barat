<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-static-top bg-secondary navbar-brand-center" style="min-height: 5rem;">
	<div class="navbar-header d-xl-block d-none">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item">
				<a class="navbar-brand" href="#">
					<div class="brand-logo">
						<img class="logo" src="{{asset('assets/images/logo/logo.png')}}">
					</div>
					<h5 class="brand-text mb-0">Public Page</h5>
				</a>
			</li>
		</ul>
	<!-- <ul class="nav navbar-nav flex-row">
		<li class="nav-item">
			<li class="nav-item">
				<h5 class="brand-text mb-0" style="font-size: 1rem;margin-left: 40px;color: #fafbfb;font-weight: lighter;">
					<i>(This website is under development, please do not cite or use any information)</i>
				</h5>
			</li>
	</ul> -->
	</div>
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="navbar-collapse" id="navbar-mobile">
				<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
					<ul class="nav navbar-nav">
						<li class="nav-item mobile-menu mr-auto"><a class="nav-link-ham nav-menu-main menu-toggle" href="javascript:void(0);"><i class="bx bx-menu"></i></a></li>
					</ul>
					<!-- <ul class="nav navbar-nav bookmark-icons">
						<li class="nav-item d-none d-lg-block">
							<a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Contact">
								<i class="ficon bx bx-envelope"></i>
							</a>
						</li>
						<li class="nav-item d-none d-lg-block">
							<a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="About">
								<i class="ficon bx bx-info-circle"></i>
							</a>
						</li>
						<li class="nav-item d-none d-lg-block">
							<a class="nav-link" href="{{url('login')}}" data-toggle="tooltip" data-placement="top" title="Login">
								<i class="ficon bx bx-log-in-circle"></i>
							</a>
						</li>
					</ul> -->
				</div>
				<ul class="nav navbar-nav float-right d-flex align-items-center">
					<li class="nav-item">
						<a class="nav-link" href="{{url('login')}}">
							<span data-i18n="Login">Login</span>
						</a>
					</li>
					<li class="dropdown dropdown-language nav-item">
						<a class="dropdown-toggle nav-link" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="flag-icon flag-icon-us"></i>
							<span class="selected-language d-lg-inline d-none">English</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-flag">
							<a class="dropdown-item" href="javascript:void(0);" data-language="en"><i class="flag-icon flag-icon-us mr-50"></i>English</a>
							<a class="dropdown-item" href="javascript:void(0);" data-language="fr"><i class="flag-icon flag-icon-fr mr-50"></i>French</a>
							<a class="dropdown-item" href="javascript:void(0);" data-language="de"><i class="flag-icon flag-icon-de mr-50"></i>German</a>
							<a class="dropdown-item" href="javascript:void(0);" data-language="pt"><i class="flag-icon flag-icon-pt mr-50"></i>Portuguese</a>
						</div>
					</li>
					<li class="nav-item d-none d-lg-block">
						<a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>