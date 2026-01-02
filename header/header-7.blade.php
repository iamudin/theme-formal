   <header class="site-header header mo-left header-style-6 style-1">
		<!-- Contact Info -->
        <div class="bg-white">
			<div class="container header-contant-block">
				<div class="row align-items-center">
					<div class="col-md-4">
						<a href="/" class="logo-dark">
							<img src="{{ get_option('logo_header') }}" width="193" height="89" alt="">
						</a>
					</div>
					<div class="col-md-8">
						<ul class="contact-info clearfix">
							<li>
								<h6 class="text-primary"><i class="fa fa-phone text-primary"></i> Call Us</h6>
								<span>+141 0800-123456</span> </li>
							<li>
								<h6 class="text-primary"><i class="far fa-envelope text-primary"></i> Send us a Mail</h6>
								<span>info@dexignzone.com</span> </li>
							<li>
								<h6 class="text-primary"><i class="far fa-clock text-primary"></i> Opening Time</h6>
								<span>Mon -Sat: 7:00 - 17:00</span> </li>
							<li> 
								<a class="site-button btn-block radius-sm text-center"> 
									<h6 class="m-a0 dis-block font-16">Call Toll Free</h6>
									<p class="m-a0 text-white dis-block">+91 123 456 7890</p>
								</a> 
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- main header -->
        <div class="main-bar-wraper navbar-expand-lg {{ !empty(get_option('navigation_style')) && get_option('navigation_style')=='Fixed' ? 'sticky-header' : 'sticky-no' }}">
            <div class="main-bar clearfix ">
                <div class="navigation-bar">
                    <div class="container clearfix">
                        <!-- website logo -->
                        <div class="logo-header mostion">
							<a href="/">
								<img src="{{ get_option('logo_header') }}" width="193" height="89" alt="">
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
                        <div class="dez-quik-search bg-primary">
                            <form action="#">
                                <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                                <span  id="quik-search-remove"><i class="fas fa-times"></i></span>
                            </form>
                        </div>
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