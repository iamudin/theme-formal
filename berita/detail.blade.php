{{  get_element('breadcrump', ['breadcrumbs' => [
    ['label' => 'Beranda', 'url' => url('/')],
    ['label' => 'Berita', 'url' => url('/berita')],
    ['label' => $detail->title, 'url' => ''],
]]) 
}}
<div class="page-content">
    <!-- About Us END -->
    <div class="section-berita  py-5" style="background:#f7f7f7">
        <div class="container ">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-md-12 m-b30">
                   
                 <div class="blog-post blog-single ">
                            <div class="dez-post-title">
                                <h1 class="post-title" style="margin-top:-3px">{{$detail->title}}</h1>
                            </div>
                            <div class="dez-post-meta m-b20">
                                <ul>
                                    <li class="post-date"> <i class="fa fa-calendar"></i> {{ $detail->created_at->format('d F Y') }} </li>
                                    <li class="post-author"><i class="fa fa-user"></i>By <a href="javascript:void(0);">{{$detail->user->name}}</a> </li>
                                  
                                </ul>
                            </div>
                            <div class="dez-post-media dez-img-effect zoom-slow"> <a href="javascript:void(0);"><img src="{{$detail->thumbnail}}" alt=""></a> </div>
                                                        <div class="dez-post-text">
                                {!! $detail->content !!}
                            </div>
                            <div class="dez-post-tags clear">
                                <div class="post-tags"> <a href="javascript:void(0);">Child </a> <a href="javascript:void(0);">Eduction </a> <a href="javascript:void(0);">Money </a> <a href="javascript:void(0);">Resturent </a> </div>
                            </div>
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
</div>