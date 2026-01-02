<header class="site-header header mo-left header-style-4">
        <!-- top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="dez-topbar-left"> </div>
                    <div class="dez-topbar-right">
                 	<ul class="social-bx list-inline pull-right">
							<li><a target="_blank" href="https://www.facebook.com/dexignzone/"><i class="fab fa-facebook-f"></i></a></li>
							<li><a target="_blank" href="https://twitter.com/dexignzones"><i class="fab fa-twitter"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/in/dexignzone"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a target="_blank" href="https://www.instagram.com/dexignzone/"><i class="fab fa-instagram"></i></a></li>
						</ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- top bar END-->
        <!-- main header -->
        <div class="{{ !empty(get_option('navigation_style')) && get_option('navigation_style')=='Fixed' ? 'sticky-header' : 'sticky-no' }} header-curve main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
						<a href="/" class="logo-light">
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
              {{ get_element('header.search-form') }}
                    <!-- main nav -->
                     <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<!-- Website Logo -->
						<div class="logo-header mostion">
							<a href="/" class="logo-light"><img src="{{ get_option('logo_header') }}" width="193" height="89" alt=""></a>
						</div>
                     {{ get_element('header.navigation') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>