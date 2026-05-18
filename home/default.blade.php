<div class="page-content">
  <!-- Slider -->
  {{ get_element('home.slider') }} {{ get_element('home.sambutan') }}

  <!-- About Us END -->
  <div class="section-berita py-5" style="background: #f7f7f7">
    <div class="container">
      <div class="row">
        <!-- Left part start -->
        <div class="col-lg-8 col-md-12 m-b30">
          <div class="section-head text-center my-0 mb-4">
            <h2 class="text-uppercase text-primary"><i class="fas fa-rss"></i> Berita</h2>
            <div class="dez-separator-outer">
              <div class="dez-separator bg-primary style-skew"></div>
            </div>
          </div>
          @foreach(query()->index_limit('berita',10) as $key => $row)

          <div class="blog-post blog-md clearfix date-style-2">
            <div class="dez-post-media dez-img-effect zoom-slow">
              <a href="{{ $row->link }}"><img class="rounded" src="{{ $row->thumbnail }}" /></a>
            </div>
            <div class="dez-post-info">
              <div class="dez-post-title">
                <h3 class="post-title"><a href="{{ $row->link }}">{{ $row->title }}</a></h3>
              </div>
              <div class="dez-post-meta">
                <ul>
                  <li class="post-date">
                    <i class="fa fa-calendar"></i><strong>{{ $row->created_at->format('d M') }}</strong>
                    <span> {{ $row->year }}</span>
                  </li>
                  <li class="post-author">
                    <i class="fa fa-user"></i>By <a href="javascript:void(0);">{{ $row->user->name }}</a>
                  </li>
                  <li class="post-comment" style="font-weight: normal">
                    <i class="fa fa-eye"></i> {{ $row->visited }}x
                  </li>
                </ul>
              </div>
              <div class="dez-post-text">
                <p>{{ $row->short_content }}</p>
              </div>
              <div class="dez-post-readmore">
                <a href="javascript:void(0);" title="READ MORE" rel="bookmark" class="site-button-link"
                  >Selengkapnya<i class="fa fa-angle-double-right"></i
                ></a>
              </div>
            </div>
          </div>
          @if($key == 1) @if($image = get_banner('banner-sambutan'))
          <div class="blog-post blog-md clearfix date-style-2">
            <img src="{{ $image->image }}" class="rounded" />
          </div>
          @endif @endif @endforeach
          <!-- Pagination start -->
          <div class="pagination-bx clearfix m-b30 text-center">
            <a href="/berita">[ Semua berita ]</a>
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
  <div class="section-full content-inner our-project-box overlay-black-dark"
    style="background-image:url({{ get_option('body_background_image') }});"
  >
    <div class="container">
      <div class="section-head text-center">
        <h2 class="text-uppercase text-primary">Gallery</h2>
        <div class="dez-separator-outer">
          <div class="dez-separator bg-primary style-skew"></div>
        </div>
      </div>
      <div class="row">
        <style>
          .galeri-card img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* ini yang bikin simetris */
            transition: 0.3s ease;
          }
          .galeri-card {
            aspect-ratio: 4 / 3; /* kotak simetris */
            overflow: hidden;
          }
          .galeri-card:hover img {
            transform: scale(1.05);
          }
          .galeri-wrapper {
            height: 500px; /* tinggi maksimal */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f8f8f8;
          }

          .galeri-wrapper img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain; /* tidak terpotong */
          }
        </style>
        @foreach(query()->index_limit('galeri',6) as $row)
        <div class="col-lg-6 col-md-6 mb-4">
          <div class="galeri-wrapper" style="cursor: pointer">
            <img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" />
          </div>
          <div class="bg-black text-white p-2">
            <h6 class="m-0">{{ $row->title }}</h6>
          </div>
        </div>
        @endforeach
      </div>
      <a href="/galeri" class="bt mx-auto" style="width: 200px">[ Selengkapnya ]</a>
    </div>
  </div>
  <!-- Services -->
  <div class="section-full bg-white content-inner">
    <div class="container">
      <div class="section-head text-center text-primary">
        <h2 class="text-uppercase text-primary">Kepegawaian</h2>
        <div class="dez-separator-outer">
          <div class="dez-separator bg-primary style-skew"></div>
        </div>
      </div>
      <div class="section-content text-center">
        <div class="row">
          @foreach(query()->index_limit('kepegawaian',4) as $row)
          <div class="col-lg-3 col-md-6 col-sm-6 col-6">
            <div class="dez-box m-b30">
              <div class="dez-media">
                <a href="javascript:void(0);">
                  <img width="300" src="{{ $row->thumbnail }}" style="min-height: 390px" />
                </a>
                <div class="dez-info-has bg-primary skew-has">
                  <ul class="dez-social-icon dez-border">
                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                    <li><a href="javascript:void(0);" class="fab fa-linkedin-in"></a></li>
                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                  </ul>
                </div>
              </div>
              <div class="p-a15 bg-gray">
                <h4 class="dez-title text-uppercase m-b5"><a href="javascript:void(0);">{{ $row->title }}</a></h4>
                <span class="dez-member-position">{{$row->field?->jabatan}}</span>
              </div>
            </div>
          </div>
          @endforeach

          <a href="/kepegawaian" class="mx-auto" style="width: 200px">[ Selengkapnya ]</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Latest Blog END -->
</div>