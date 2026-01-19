<div class="page-content">
    <!-- About Us END -->
    <div class="section-berita  py-5" style="background:#f7f7f7">
        <div class="container ">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-md-12 m-b30">
                    <div class="section-head text-center my-0 mb-4">
                        <h2 class="text-uppercase text-primary"><i class="fas fa-download"></i> Dokumen</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-primary style-skew"></div>
                        </div>
                    </div>
                    <div class="row">
                        @if($categories = query()->index_category('download'))
                            @if($categories->count() > 0)
                                <div class="col-lg-12">
                                    <style>
                                        .tagcloud a:hover {
                                            background-color: #000000 !important;
                                            color: #fff !important;
                                        }
                                    </style>
                                    <div class="widget bg-white p-a20 widget_tag_cloud">
                                        <h4 class="tagcloud"> <i class="fa fa-tag"></i> Kategori</h4>
                                        <div class="tagcloud">
                                            @foreach($categories as $category)
                                                <a href="/{{ $category->url }}">{{$category->name}} {{ $category->posts_count }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <!-- ITEM DOWNLOAD -->
                        @foreach($index as $row)

                            <div class="col-lg-12 mb-3">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">

                                            <!-- ICON -->
                                            <div class="col-auto text-center">
                                                <i class="fa fa-file fa-3x text-danger"></i>
                                            </div>

                                            <!-- INFO -->
                                            <div class="col">
                                                <h6 class="mb-1">
                                                    {{$row->title}}
                                                </h6>

                                                <p class="mb-1 text-muted small">
                                                    {{$row->descripton ?? '-'}}
                                                </p>

                                                <div class="text-muted small">
                                                    <i class="fa fa-info"></i>
                                                    {{ media_exists($row->field?->file) ? 'diunduh ' . media_hits($row->field?->file) . 'x • ' . media_extension($row->field?->file) . ' • ' . media_size($row->field?->file) : ' -' }}
                                                    &nbsp; | &nbsp;
                                                    <i class="fa fa-calendar"></i>
                                                    {{$row->created_at->translatedformat('d F Y')}}
                                                </div>
                                            </div>

                                            <!-- ACTION -->
                                            <div class="col-auto">
                                                <a href="{{ media_download($row->field?->file) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-download"></i> Download
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

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
    </div>
</div>