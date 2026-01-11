  <div class="col-lg-4 col-md-12">
                        <aside  class="side-bar sidebar-sticky">
                            <div class="widget">
               <div class="sidebar-banner-slider">
    <div id="sidebarBannerCarousel" class="carousel slide sidebar-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach(get_banner('banner-sidebar', 5) as $i => $banner)
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
                                   <div class="widget">
                            <!-- Latest Announcements Sidebar -->
<!-- Announcement Binder Sidebar -->
<div class="sidebar-binder bg-white rounded-3 shadow-sm mt-4">

    <div class="binder-header px-3 py-2">
        📢 Pengumuman Terbaru
    </div>

    <div class="binder-body">
@forelse(query()->index_limit('pengumuman',3) as $row)
        <a href="{{ $row->link }}" class="binder-item text-decoration-none">
            <div class="binder-ring"></div>

            <div class="binder-content">
                <span class="badge bg-info mb-1">Info</span>
                <h6 class="binder-title">
                    {{ $row->title }}
                </h6>
                <div class="binder-meta">
                   {{ $row->created_at->format('d M Y') }}
                </div>
            </div>
        </a>
@empty 
        <p class="text-center p-3 text-muted">
            Tidak ada pengumuman terbaru.
        </p>
@endforelse

    </div>
</div>


                         </div>
                            <div class="widget" >
                           
         
<!-- Popular News Sidebar -->
<div class="sidebar-popular bg-white rounded-3 shadow-sm p-3">

    <h5 class="mb-3 fw-semibold border-bottom pb-2">
        🔥 Berita Populer
    </h5>
    <!-- Item -->
    @foreach(query()->index_popular('berita',5) as $row)
    <a href="#" class="popular-item d-flex align-items-center text-decoration-none py-2" style="{{ !$loop->last ? 'border-bottom:1px dashed #ccc' : '' }}">
        <div class="popular-thumb flex-shrink-0">
            <img src="{{ $row->thumbnail }}" alt="">
        </div>
        <div class="ms-3">
            <h6 class="popular-title mb-1">
                {{$row->title}}
            </h6>
            <div class="popular-meta">
                <span> <i class="fas facalendar"></i> {{ $row->created_at->format('d M Y') }}</span>
                <span class="mx-1">•</span>
                <span>{{ $row->visited }} dilihat</span>
            </div>
        </div>
    </a>
    @endforeach

</div>

                            </div>
                  
                            <div class="widget">
                                <!-- Latest Downloads Sidebar -->
<div class="sidebar-download bg-white rounded-3 shadow-sm p-3 mt-4">

    <h5 class="mb-3 fw-semibold border-bottom pb-2">
        <i class="fas fa-download"></i> Dokumen Terbaru
    </h5>
@foreach(query()->index_limit('download',5) as $row)
    <a href="#" class="download-item d-flex align-items-center text-decoration-none py-2" style="{{ !$loop->last ? 'border-bottom:1px dashed #ccc' : '' }}">
        <div class="download-icon bg-primary">
            XLS
        </div>
        <div class="ms-3 flex-grow-1">
            <h6 class="download-title mb-1">
                {{ $row->title }}
            </h6>
            <div class="download-meta">
                31 Des 2025 • 980 KB
            </div>
        </div>
                </a>
    @endforeach

</div>

                            </div>
                            @if(get_option('latitude') && get_option('longitude'))
                                   <div class="widget">
                                    <h4 class="text-primary">Lokasi Kantor</h4>
                                    <div class="rounded">
                                        <iframe class="w-100 shadow-sm" style="height: 400px" src="https://www.google.com/maps?q={{ get_option('latitude') }},{{ get_option('longitude') }}&hl=id&z=17&output=embed" frameborder="0"></iframe>
                                    </div>
                                   </div>
                                   @endif
                        </aside>
                    </div>