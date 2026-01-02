  <div class="page-content">
        <!-- Slider -->
   {{ get_element('home.slider') }}
   {{ get_element('home.sambutan') }}
     
		<!-- About Us END -->
		 <div class="section-berita  py-5" style="background:#f7f7f7">
 <div class="container ">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-12 m-b30">
					<div class="section-head text-center my-0 mb-4">
                        <h2 class="text-uppercase text-primary"><i class="fas fa-rss"></i> Berita</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-primary style-skew"></div>
                        </div>
                     
                    </div>
					@foreach(query()->index_limit('berita',8) as $key=>$row)
				
                        <div class="blog-post blog-md clearfix date-style-2">
                            <div class="dez-post-media dez-img-effect zoom-slow"> <a href="{{ $row->link }}"><img class="rounded" src="{{ $row->thumbnail }}" ></a> </div>
                            <div class="dez-post-info">
                                <div class="dez-post-title ">
                                    <h3 class="post-title"><a href="{{ $row->link }}">{{ $key }}{{ $row->title }}</a></h3>
                                </div>
                                <div class="dez-post-meta ">
                                    <ul>
                                        <li class="post-date"> <i class="fa fa-calendar"></i><strong>{{ $row->created_at->format('d M') }}</strong> <span> {{ $row->year }}</span> </li>
                                        <li class="post-author"><i class="fa fa-user"></i>By <a href="javascript:void(0);">{{ $row->user->name }}</a> </li>
                                        <li class="post-comment" style="font-weight: normal"><i class="fa fa-eye"></i> {{ $row->visited }}x </li>
                                    </ul>
                                </div>
                                <div class="dez-post-text">
                                    <p>{{ $row->short_content }}</p>
                                </div>
                                <div class="dez-post-readmore"> <a href="javascript:void(0);" title="READ MORE" rel="bookmark" class="site-button-link">Selengkapnya<i class="fa fa-angle-double-right"></i></a> </div>
                                <div class="dez-post-tags">
                                    <div class="post-tags"> <a href="javascript:void(0);">Child </a> <a href="javascript:void(0);">Eduction </a> <a href="javascript:void(0);">Money </a> <a href="javascript:void(0);">Resturent </a> </div>
                                </div>
                            </div>
                        </div>
							@if($key==1)
							@if($image= get_banner('banner-sambutan'))
                        <div class="blog-post blog-md clearfix date-style-2">
							<img src="{{ $image->image }}" class="rounded">
						</div>
						@endif
					@endif
                    @endforeach
                        <!-- Pagination start -->
                        <div class="pagination-bx clearfix m-b30">
                            <ul class="pagination">
                                <li class="previous"><a href="javascript:void(0);"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="active"><a href="javascript:void(0);">1</a> </li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li class="next"><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- Pagination END -->
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                  {{ get_element('home.sidebar') }}
                    <!-- Side bar END -->
                </div>
            </div>
</div>
		<!-- Services -->
        <div class="section-full bg-white content-inner">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="text-uppercase">Our Best <span class="text-primary">Services</span></h2>
					<p>Because of best quality & service, victory has always been our goal, we only repRecent the best talent. We’ll do everything for you which can put you at ease with the correct guidance, simplicity & honesty.</p>
                </div>
                <div class="section-content ">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 m-b30">
							<div class="dez-box">
								<div class="dez-media"> <a href="services-1.html"><img src="images/our-services/img2.jpg" alt=""></a> </div>
								<div class="dez-info p-a20 text-center bg-gray">
									<div class="p-lr20">
										<h4 class="m-a0 m-b15"><a href="services-1.html">Safety</a></h4>
										<div class="dez-separator bg-primary"></div>
									</div>	
									<p class="m-b0">With the best quality, facility and service we still concentrate on safety and protection of our clients. We don’t just build houses...</p>
								</div>
							</div>
						</div>
                        <div class="col-lg-4 col-md-4 col-sm-6 m-b30">
							<div class="dez-box">
								<div class="dez-media"> <a href="services-1.html"><img src="images/our-services/img3.jpg" alt=""></a> </div>
								<div class="dez-info p-a20 text-center bg-gray">
									<div class="p-lr20">
										<h4 class="m-a0 m-b15"><a href="javascript:void(0);">Community</a></h4>
										<div class="dez-separator bg-primary"></div>
									</div>	
									<p class="m-b0">We will work and discuss on project with our best team members to define the logistical requirements. We aim to make clients...</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 m-b30">
							<div class="dez-box">
								<div class="dez-media"> <a href="services-1.html"><img src="images/our-services/img5.jpg" alt=""></a> </div>
								<div class="dez-info p-a20 text-center bg-gray">
									<div class="p-lr20">
										<h4 class="m-a0 m-b15"><a href="services-1.html">Sustainability</a></h4>
										<div class="dez-separator bg-primary"></div>
									</div>	
									<p class="m-b0">We provide an extraordinary construction project for your dream and desires in the location you love. Our focus...</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 m-b30">
							<div class="dez-box">
								<div class="dez-media"> <a href="services-1.html"><img src="images/our-services/img6.jpg" alt=""></a> </div>
								<div class="dez-info p-a20 text-center bg-gray">
									<div class="p-lr20">
										<h4 class="m-a0 m-b15"><a href="services-1.html">Best Quality</a></h4>
										<div class="dez-separator bg-primary"></div>
									</div>	
									<p class="m-b0">We believe in best quality over quantity. We try always best for our clients to fit all needs and desires. We build where you want...</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 m-b30">
							<div class="dez-box">
								<div class="dez-media"> <a href="services-1.html"><img src="images/our-services/img8.jpg" alt=""></a> </div>
								<div class="dez-info p-a20 text-center bg-gray">
									<div class="p-lr20">
										<h4 class="m-a0 m-b15"><a href="services-1.html">Integrity</a></h4>
										<div class="dez-separator bg-primary"></div>
									</div>	
									<p class="m-b0">We first create the highest level of trust and integrity with our clients and provide better service. Your desires and needs define...</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 m-b10">
							<div class="dez-box">
								<div class="dez-media"> <a href="services-1.html"><img src="images/our-services/img9.jpg" alt=""></a> </div>
								<div class="dez-info p-a20 text-center bg-gray">
									<div class="p-lr20">
										<h4 class="m-a0 m-b15"><a href="services-1.html">Strategy</a></h4>
										<div class="dez-separator bg-primary"></div>
									</div>	
									<p class="m-b0">We make our master plan by keeping the needs of the people, which is always perfect in their future. We are focused on...</p>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!-- Services END -->
        <!-- Our Project -->
        <div class="section-full bg-img-fix overlay-black-dark dez-our-project content-inner-1" style="background-image:url(images/banner/bnr1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-9 col-sm-9 text-white">
                        <h2 class="m-t0">LATEST <span class="text-primary">PROJECTS</span></h2>
						<p class="text-black">We provide a wide variety of services including practical studies, architectural programming and project management.</p>
					</div>
                    <div class="col-md-12 col-lg-12">
                        <div class="service-carousel owl-carousel">
                            <div class="item">
                                <div class="ow-carousel-entry">
                                    <div class="ow-entry-media dez-img-effect zoom-slow"> 
										<a href="javascript:void(0);"><img src="images/our-services/pic5.jpg" alt=""></a> 
									</div>
                                    <div class="ow-entry-content">
										<div class="date bg-primary ">10/07/2024</div>
                                        <div class="ow-entry-title">
											<h4 class="text-uppercase"><a href="javascript:void(0);">Construction</a></h4>
										</div>
                                        <div class="ow-entry-text">
                                            <p>We provide the best construction project for your dream where you want to live. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ow-carousel-entry">
                                    <div class="ow-entry-media dez-img-effect zoom-slow"> 
										<a href="javascript:void(0);"><img src="images/our-services/pic2.jpg" alt=""></a> 
									</div>
                                    <div class="ow-entry-content">
										<div class="date bg-primary ">10/07/2024</div>
                                        <div class="ow-entry-title">
											<h4 class="text-uppercase"><a href="javascript:void(0);">Architecture</a></h4>
										</div>
                                        <div class="ow-entry-text">
                                            <p>Our architect service provides high-end design for your future dream.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="item">
                                <div class="ow-carousel-entry">
                                    <div class="ow-entry-media dez-img-effect zoom-slow"> 
										<a href="javascript:void(0);"><img src="images/our-services/pic6.jpg" alt=""></a> 
									</div>
                                    <div class="ow-entry-content">
										<div class="date bg-primary ">10/07/2024</div>
                                        <div class="ow-entry-title">
											<h4 class="text-uppercase"><a href="javascript:void(0);">Consulting</a></h4>
										</div>
                                        <div class="ow-entry-text">
                                            <p>Our consulting team is always ready to help you and give you best advice as possible.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="item">
                                <div class="ow-carousel-entry">
                                    <div class="ow-entry-media dez-img-effect zoom-slow"> 
										<a href="javascript:void(0);"><img src="images/our-services/pic4.jpg" alt=""></a> 
									</div>
                                    <div class="ow-entry-content">
										<div class="date bg-primary ">10/07/2024</div>
                                        <div class="ow-entry-title">
											<h4 class="text-uppercase"><a href="javascript:void(0);">Mechanical</a></h4>
										</div>
                                        <div class="ow-entry-text">
                                            <p>We are mechanically strong to build your building, hotels, educational center. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- Our Project END -->
        <!-- Meet Our Team -->
        <div class="section-full bg-white content-inner">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="text-uppercase">Meet Our <span class="text-primary">Team</span></h2>
                    <p>Our smart team takes care of everything. The entire team has been great to work with from start to finish. Our team is focused on target and best service. </p>
                </div>
                <div class="section-content ">
                    <div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 dez-team-1 left">
							<div class="dez-box m-b30 team-skew ">
								<div class="dez-media"> <a href="javascript:void(0);"> <img src="images/our-team/team/pic1.png" alt="" width="358" height="460"> </a>
									<div class="dez-info-has">
										<ul class="dez-social-icon bg-primary">
											<li><a href="https://www.facebook.com/dexignzone/" class="fab fa-facebook-f"></a></li>
											<li><a href="https://twitter.com/dexignzones" class="fab fa-twitter"></a></li>
											<li><a href="https://www.linkedin.com/in/dexignzone" class="fab fa-linkedin-in"></a></li>
											<li><a href="https://www.instagram.com/dexignzone/" class="fab fa-instagram"></a></li>
										</ul>
									</div>
								</div>
								<div class="p-a20 bg-secondry text-center text-white team-info ">
									<h4 class="dez-title text-uppercase m-t0 m-b5"><a href="javascript:;" class=" text-white">Hackson Willingham</a></h4>
									<span class="dez-member-position">Developer</span> 
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 dez-team-1">
							<div class="dez-box m-b30 team-skew ">
								<div class="dez-media"> <a href="javascript:void(0);"> <img src="images/our-team/team/pic2.png" alt="" width="358" height="460"> </a>
									<div class="dez-info-has">
										<ul class="dez-social-icon bg-primary">
											<li><a href="https://www.facebook.com/dexignzone/" class="fab fa-facebook-f"></a></li>
											<li><a href="https://twitter.com/dexignzones" class="fab fa-twitter"></a></li>
											<li><a href="https://www.linkedin.com/in/dexignzone" class="fab fa-linkedin-in"></a></li>
											<li><a href="https://www.instagram.com/dexignzone/" class="fab fa-instagram"></a></li>
										</ul>
									</div>
								</div>
								<div class="p-a20 bg-secondry text-center text-white team-info ">
									<h4 class="dez-title text-uppercase m-t0 m-b5"><a href="javascript:;" class=" text-white">Wendon Anderson</a></h4>
									<span class="dez-member-position">Manager</span> 
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 dez-team-1 right">
							<div class="dez-box m-b30 team-skew ">
								<div class="dez-media"> <a href="javascript:void(0);"> <img src="images/our-team/team/pic3.png" alt="" width="358" height="460"> </a>
									<div class="dez-info-has">
										<ul class="dez-social-icon bg-primary">
											<li><a href="https://www.facebook.com/dexignzone/" class="fab fa-facebook-f"></a></li>
											<li><a href="https://twitter.com/dexignzones" class="fab fa-twitter"></a></li>
											<li><a href="https://www.linkedin.com/in/dexignzone" class="fab fa-linkedin-in"></a></li>
											<li><a href="https://www.instagram.com/dexignzone/" class="fab fa-instagram"></a></li>
										</ul>
									</div>
								</div>
								<div class="p-a20 bg-secondry text-center text-white team-info ">
									<h4 class="dez-title text-uppercase m-t0 m-b5"><a href="javascript:;" class=" text-white">Kent Jones</a></h4>
									<span class="dez-member-position">Designer</span> 
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!-- Meet Our Team END -->
        <!-- Testimonial -->
		<div class="section-full bg-img-fix content-inner overlay-white-dark" style="background-image:url(images/background/bg5.jpg); margin-top:-1px">
            <div class="container">
				<div class="section-head text-center ">
                    <h2 class="text-uppercase">Our <span class="text-primary">Testimonial</span></h2>
					<p>We are extremely happy with our results because our clients happy with our work. Here are some of our customers who have expressed their views.</p>
                </div>
				<div class="section-content">
					<div class="testimonial-five owl-carousel owl-none">
						<div class="item">
							<div class="testimonial-6">
								<div class="testimonial-text bg-white quote-left quote-right">
									<p>The entire team is extremely creative and forward thinking. They are also very quick and efficient when executing changes for us. The entire team has been great to work with from start to finish.</p>
								</div>
								<div class="testimonial-detail clearfix bg-primary text-white">
									<h4 class="testimonial-name m-tb0">Marina Lee</h4>
									<span class="testimonial-position">Media Specialist</span>
									<div class="testimonial-pic radius"><img src="images/testimonials/pic1.jpg" alt="" width="100" height="100"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-6">
								<div class="testimonial-text bg-white quote-left quote-right">
									<p>I found their expertise to be extremely helpful. I think it is awesome and I can't thank you enough for working so closely with me.  The entire team has been great to work with from start to finish.</p>
								</div>
								<div class="testimonial-detail clearfix bg-primary text-white">
									<h4 class="testimonial-name m-tb0">David Matin</h4>
									<span class="testimonial-position">Media senior Specialist</span>
									<div class="testimonial-pic radius"><img src="images/testimonials/pic2.jpg" alt="" width="100" height="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Testimonial End -->
        <!-- Latest Blog -->
		<div class="section-full bg-white content-inner-1">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="text-uppercase">Recent <span class="text-primary">Blog</span></h2>
                    <p>These are some of our recent design projects and we are so excited to show them to you. Work on the best projects for the best clients.</p>
                </div>
                <div class="section-content ">
                    <div class="blog-carousel owl-none owl-carousel">
                        <div class="item">
							<div class="dez-box">
								<div class="dez-media"> 
									<a href="blog-single.html"><img src="images/blog/latest-blog/pic1.jpg" alt=""></a> 
								</div>
								<div class="dez-info p-a20 border-1">
									<ul class="blog-info text-primary">
										<li>By <a href="javascript:void(0);" title="Posts by demongo" rel="author">demongo</a> </li>
										<li><a href="javascript:void(0);" class="comments-link">1 Comment</a> </li>
										<li><span>17 Mar 2024</span> </li>
									</ul>
									<h4 class="dez-title m-t0"><a href="blog-single.html">Construction Planning</a></h4>
									<p class="m-a0">This is our latest project which is perfectly constructed. We provide high-end residential construction, hospitals, hotels, education and sports venues.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="dez-box">
								<div class="dez-media"> 
									<a href="blog-single.html"><img src="images/blog/latest-blog/pic2.jpg" alt=""></a> 
								</div>
								<div class="dez-info p-a20 border-1">
									<ul class="blog-info text-primary">
										<li>By <a href="javascript:void(0);" title="Posts by demongo" rel="author">demongo</a> </li>
										<li><a href="javascript:void(0);" class="comments-link">1 Comment</a> </li>
										<li><span>17 Mar 2024</span> </li>
									</ul>
									<h4 class="dez-title m-t0"><a href="blog-single.html">Creative construct design</a></h4>
									<p class="m-a0">Our construction design provides an extraordinary construction project experience. We are able to provide our customers with a level of expertise.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="dez-box">
								<div class="dez-media"> 
									<a href="blog-single.html"><img src="images/blog/latest-blog/pic3.jpg" alt=""></a> 
								</div>
								<div class="dez-info p-a20 border-1">
									<ul class="blog-info text-primary">
										<li>By <a href="javascript:void(0);" title="Posts by demongo" rel="author">demongo</a> </li>
										<li><a href="javascript:void(0);" class="comments-link">1 Comment</a> </li>
										<li><span>17 Mar 2024</span> </li>
									</ul>
									<h4 class="dez-title m-t0"><a href="blog-single.html">Professional Services</a></h4>
									<p class="m-a0">We understand the importance of the creation and professionalism and work with the best creative team memeber to achieve this goal for your bright future.</p>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Blog END -->
    </div>