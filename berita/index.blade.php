<div class="page-content">
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
                    @foreach($index as $key => $row)

                        <div class="blog-post blog-md clearfix date-style-2">
                            <div class="dez-post-media dez-img-effect zoom-slow"> <a href="{{ $row->link }}"><img
                                        class="rounded" src="{{ $row->thumbnail }}"></a> </div>
                            <div class="dez-post-info">
                                <div class="dez-post-title ">
                                    <h3 class="post-title"><a href="{{ $row->link }}">{{ $row->title }}</a></h3>
                                </div>
                                <div class="dez-post-meta ">
                                    <ul>
                                        <li class="post-date"> <i
                                                class="fa fa-calendar"></i><strong>{{ $row->created_at->format('d M') }}</strong>
                                            <span> {{ $row->year }}</span> </li>
                                        <li class="post-author"><i class="fa fa-user"></i>By <a
                                                href="javascript:void(0);">{{ $row->user->name }}</a> </li>
                                        <li class="post-comment" style="font-weight: normal"><i class="fa fa-eye"></i>
                                            {{ $row->visited }}x </li>
                                    </ul>
                                </div>
                                <div class="dez-post-text">
                                    <p>{{ $row->short_content }}</p>
                                </div>
                                <div class="dez-post-readmore"> <a href="javascript:void(0);" title="READ MORE"
                                        rel="bookmark" class="site-button-link">Selengkapnya<i
                                            class="fa fa-angle-double-right"></i></a> </div>
                                <div class="dez-post-tags">
                                    <div class="post-tags"> <a href="javascript:void(0);">Child </a> <a
                                            href="javascript:void(0);">Eduction </a> <a href="javascript:void(0);">Money
                                        </a> <a href="javascript:void(0);">Resturent </a> </div>
                                </div>
                            </div>
                        </div>
                        @if($key == 1)
                            @if($image = get_banner('banner-sambutan'))
                                <div class="blog-post blog-md clearfix date-style-2">
                                    <img src="{{ $image->image }}" class="rounded">
                                </div>
                            @endif
                        @endif
                    @endforeach
                    <!-- Pagination start -->
                    <div class="pagination-bx clearfix m-b30 text-center">
                        {{ $index->links('pagination::bootstrap-5') }}
                    </div>
                    <!-- Pagination END -->
                </div>
                <!-- Left part END -->
                <!-- Side bar start -->
                {{ get_element('home.sidebar') }}
                <!-- Side bar END -->
            </div>
        </div>
    </div></div>