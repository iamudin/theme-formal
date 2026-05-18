    <header class="site-header header mo-left header-style-1">
        <!-- top bar -->
        <div class="top-bar no-skew">
            <div class="container">
            	<div class=" d-flex bar align-items-center justify-content-between">
					<div class="dez-topbar-left">
						 <ul class="social-bx list-inline  pull-left">
							<li class="m-r10"><i class="fa fa-phone"></i>++141 231 564 8970</li>
							<li><i class="fa fa-envelope"></i>info@example.com</li>
						</ul>
					</div>
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
        <div class="{{ !empty(get_option('navigation_style')) && get_option('navigation_style')=='Fixed' ? 'sticky-header' : 'sticky-no' }} main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion dark">
						<a href="index.html" class="logo-dark">
							<img src="{{get_option('logo_header')}}" width="193" height="89" alt="">
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
                     <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<!-- Website Logo -->
						<div class="logo-header">
							<a href="index.html" class="logo-light"><img src="{{get_option('logo_header')}}" width="193" height="89" alt=""></a>
						</div>
                 {{ get_element('header.navigation') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>