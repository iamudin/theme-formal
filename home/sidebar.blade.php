  <div class="col-lg-4 col-md-12">
                        <aside  class="side-bar">
                            <div class="widget">
               <div class="sidebar-banner-slider">
    <div id="sidebarBannerCarousel" class="carousel slide sidebar-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach(get_banner('banner-sidebar',5) as $i => $banner)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <div class="sidebar-banner-item">
                        <img src="{{ $banner->image }}" >
                    </div>
                </div>
            @endforeach

        </div>

        <button class="carousel-control-prev sidebar-carousel-prev"
                type="button"
                data-bs-target="#sidebarBannerCarousel"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next sidebar-carousel-next"
                type="button"
                data-bs-target="#sidebarBannerCarousel"
                data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>


                            </div>
                            <div class="widget recent-posts-entry  " >
                                <h4 class="widget-title text-primary"> <i class="fa fa-chart-line"></i> Berita Populer </h4>
                                <style>
/* CARD */
.sidebar-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 14px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.05);
}

.sidebar-card-title {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 12px;
    color: #1f2937;
}

/* LIST */
.sidebar-popular-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-popular-list li {
    display: flex;
    gap: 10px;
    padding: 10px 0;
    border-bottom: 1px dashed #e5e7eb;
    align-items: flex-start;
}

.sidebar-popular-list li:last-child {
    border-bottom: none;
}

/* RANK */
.sidebar-popular-list .rank {
    min-width: 22px;
    height: 22px;
    background: #f1f5f9;
    color: #64748b;
    font-size: 11px;
    font-weight: 600;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* THUMBNAIL */
.sidebar-popular-list .thumb {
    width: 56px;
    height: 56px;
    border-radius: 8px;
    object-fit: contain;   /* TIDAK CROP */
    background: #f3f4f6;
    flex-shrink: 0;
}

/* CONTENT */
.sidebar-popular-list .content {
    flex: 1;
}

.sidebar-popular-list a {
    font-size: 13px;
    line-height: 1.45;
    color: #334155;
    text-decoration: none;
    display: block;
}

.sidebar-popular-list a:hover {
    color: #0d6efd;
}

/* META */
.sidebar-popular-list .meta {
    display: flex;
    gap: 10px;
    margin-top: 4px;
    font-size: 11px;
    color: #94a3b8;
}

.sidebar-popular-list .views {
    white-space: nowrap;
}

                                </style>
     <div class="sidebar-card">


        <ul class="sidebar-popular-list">

            <li>
                <span class="rank">1</span>

                <img src="https://leazycms.test/media/pengumuman-dermaga-ii-pelabuhan-ro.webp"
                     class="thumb"
                     alt="Thumbnail berita">

                <div class="content">
                    <a href="#">
                        Pelayanan Administrasi Kependudukan Kini Lebih Cepat
                    </a>

                    <div class="meta">
                        <span class="date">12 Jun 2025</span>
                        <span class="views">👁 1.245</span>
                    </div>
                </div>
            </li>

            <li>
                <span class="rank">2</span>

                <img src="/images/berita-2.jpg"
                     class="thumb"
                     alt="Thumbnail berita">

                <div class="content">
                    <a href="#">
                        Penyaluran Bantuan Sosial Tahap II Telah Dimulai
                    </a>

                    <div class="meta">
                        <span class="date">10 Jun 2025</span>
                        <span class="views">👁 980</span>
                    </div>
                </div>
            </li>

            <li>
                <span class="rank">3</span>

                <img src="/images/berita-3.jpg"
                     class="thumb"
                     alt="Thumbnail berita">

                <div class="content">
                    <a href="#">
                        Musyawarah Perencanaan Pembangunan Desa
                    </a>

                    <div class="meta">
                        <span class="date">8 Jun 2025</span>
                        <span class="views">👁 860</span>
                    </div>
                </div>
            </li>

        </ul>

    </div>

                            </div>
                            <div class="widget widget_categories">
                                <h4 class="widget-title">Categories List</h4>
                                <ul>
                                    <li><a href="javascript:void(0);">aciform</a> (1)</li>
                                    <li><a href="javascript:void(0);">championship</a> (1) </li>
                                    <li><a href="javascript:void(0);">chastening</a> (1) </li>
                                    <li><a href="javascript:void(0);">clerkship</a> (1) </li>
                                    <li><a href="javascript:void(0);">disinclination</a> (1) </li>
                                    <li><a href="javascript:void(0);">disinfection</a> (1) </li>
                                    <li><a href="javascript:void(0);">dispatch</a> (1) </li>
                                    <li><a href="javascript:void(0);">echappee</a> (1) </li>
                                    <li><a href="javascript:void(0);">Edge Case</a> (6) </li>
                                    <li><a href="javascript:void(0);">enphagy</a> (1) </li>
                                </ul>
                            </div>
                            <div class="widget widget_gallery">
                                <h5 class="widget-title">Our services</h5>
                                <ul>
                                    <li><a href="javascript:void(0);"><div class="dez-post-thum dez-img-overlay1 dez-img-effect zoom-slow">
										<img src="images/gallery/pic2.jpg" alt=""></div></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><div class="dez-post-thum dez-img-overlay1 dez-img-effect zoom-slow">
										<img src="images/gallery/pic1.jpg" alt=""></div></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><div class="dez-post-thum dez-img-overlay1 dez-img-effect zoom-slow">
										<img src="images/gallery/pic5.jpg" alt=""></div></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><div class="dez-post-thum dez-img-overlay1 dez-img-effect zoom-slow">
										<img src="images/gallery/pic7.jpg" alt=""></div></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><div class="dez-post-thum dez-img-overlay1 dez-img-effect zoom-slow">
										<img src="images/gallery/pic8.jpg" alt=""></div></a>
                                    </li>
                                    <li><a href="javascript:void(0);"><div class="dez-post-thum dez-img-overlay1 dez-img-effect zoom-slow">
										<img src="images/gallery/pic9.jpg" alt=""></div></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget widget_tag_cloud">
                                <h4 class="tagcloud">Tags</h4>
                                <div class="tagcloud"> <a href="javascript:void(0);">Design</a> <a href="javascript:void(0);">User interface</a> <a href="javascript:void(0);">SEO</a> <a href="javascript:void(0);">WordPress</a> <a href="javascript:void(0);">Development</a> <a href="javascript:void(0);">Joomla</a> <a href="javascript:void(0);">Design</a> <a href="javascript:void(0);">User interface</a> <a href="javascript:void(0);">SEO</a> <a href="javascript:void(0);">WordPress</a> <a href="javascript:void(0);">Development</a> <a href="javascript:void(0);">Joomla</a> <a href="javascript:void(0);">Design</a> <a href="javascript:void(0);">User interface</a> <a href="javascript:void(0);">SEO</a> <a href="javascript:void(0);">WordPress</a> <a href="javascript:void(0);">Development</a> <a href="javascript:void(0);">Joomla</a> </div>
                            </div>
                        </aside>
                    </div>