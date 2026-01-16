<header class="site-header header mo-left header-style-6 style-1">
        <!-- top bar -->
        <div class="top-bar">
            <div class="container">
				<div class=" d-flex bar align-items-center justify-content-between">
					<div class="dez-topbar-left">
						<ul>
							<li class="text-dark"><i class="fas fa-map-marker-alt text-primary"></i> {{get_option('alamat')}} </li>
							<li class="text-dark"><i class="fas fa-clock  text-primary"></i> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }} - Pukul <span id="jam"></span>
							{{ realtime_clock('jam') }}
							</li>
						</ul>
					</div>
					
					<div class="dez-topbar-right">
						<ul class="social-bx list-inline pull-right">
							@if($facebook = get_option('facebook'))
							<li><a target="_blank" href="{{$facebook}}"><i class="fab fa-facebook-f"></i></a></li>
							@endif
							@if($twitter = get_option('twitter'))
							<li><a target="_blank" href="{{$twitter}}"><i class="fab fa-twitter"></i></a></li>
							@endif
							@if($instagram = get_option('instagram'))
							<li><a target="_blank" href="{{$instagram}}"><i class="fab fa-instagram"></i></a></li>
							@endif
						</ul>
					</div>
				</div>
            </div>
        </div>
        <!-- top bar END-->
		<div class="bg-white">
			<div class="container header-contant-block">
				<div class="row align-items-center">
					<div class="col-md-6">
						<a href="/" class="logo-dark">
							<img src="{{ get_option('logo_header') }}"  width="300" alt="">
						</a>
					</div>
					<div class="col-md-6">
						<ul class="contact-info clearfix">
							<li>
								<h6 class="text-primary"><i class="fa fa-phone text-primary"></i> Hubungi</h6>
								<span>{{ get_option( 'telepon') }}</span> </li>
							<li>
								<h6 class="text-primary"><i class="far fa-envelope text-primary"></i> Surel</h6>
								<span>{{ get_option('email') }}</span> </li>
							<li>
								<h6 class="text-primary"><i class="far fa-clock text-primary"></i> Jam kerja</h6>
								<span id="jam_realtime">Senin s/d Jum'at</span> 


							</li>
							<li> 
							<img src="https://diskominfotik.bengkaliskab.go.id/green2.png" height="50">
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- main header -->
        <div class="{{ !empty(get_option('navigation_style')) && get_option('navigation_style')=='Fixed' ? 'sticky-header' : 'sticky-no' }} main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="navigation-bar">
                    <div class="container clearfix">
                        <!-- website logo -->
                        <div class="logo-header mostion">
							<a href="/">
								<img src="{{ get_option('logo_header') }}" width="300" alt="">
							</a>
						</div>
                        <!-- nav toggle button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>
                        <!-- extra nav -->
                        <div class="extra-nav">
                            <div class="extra-cell">
                                <button id="quik-search-btn" type="button" class="site-button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <!-- Quik search -->
                 {{ get_element('header.search-form') }}
                        <!-- main nav -->
                        <div class="header-nav navbar-collapse collapse nav-dark justify-content-start" id="navbarNavDropdown">
                          {{ get_element('header.navigation') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>