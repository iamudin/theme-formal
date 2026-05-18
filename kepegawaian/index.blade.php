<div class="page-content">
    <!-- About Us END -->
    <div class="section-berita  py-5" style="background:#f7f7f7">
        <div class="container ">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-md-12 m-b30">
                    <div class="section-head text-center my-0 mb-4">
                        <h2 class="text-uppercase text-primary"><i class="fas fa-user"></i> Kepegawaian</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-primary style-skew"></div>
                        </div>
                    </div>
                 <div class="row">
               
    @foreach(query()->index_sort('kepegawaian') as $row)
    <div class="col-lg-{{$loop->first ? '12' : '4'}} col-md-6 col-sm-6 mb-4">
        <div class="card shadow-sm h-100 border-0" style="border-radius:12px;">
            
            <div class="text-center p-4">
                <img src="{{ $row->thumbnail }}"
                     class="img-fluid rounded-circle mb-3"
                     style="width:180px;height:180px;object-fit:cover;">
                
                <h5 class="mb-1">{{ $row->title }}</h5>
                <small class="text-muted">{{ $row->field?->jabatan ?? null}}</small>
            </div>

        
        </div>
    </div>
    @endforeach

</div>

                    <!-- Pagination start -->
                
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