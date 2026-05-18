<div class="page-content">
  <!-- About Us END -->
  <div class="section-berita py-5" style="background: #f7f7f7">
    <div class="container">
      <div class="row">
        <!-- Left part start -->
        <div class="col-lg-8 col-md-12 m-b30">
          <div class="section-head text-center my-0 mb-4">
            <h2 class="text-uppercase text-primary"><i class="fas fa-file"> </i> Galeri</h2>
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
            @foreach($index as $row)

			<div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-4">
			  <div class="galeri-wrapper" style="cursor: pointer">
				<img src="{{ $row->thumbnail }}" alt="{{ $row->title }}" />
			  </div>
				<div class="card-body">
				  <h6 class="mb-2">{{ $row->title }}</h6>

				  <div class="text-muted small">
					<i class="fa fa-calendar"></i>
					{{ $row->created_at->translatedformat('d F Y') }}
				  </div>
				</div>
			</div>
            @endforeach
			</div>

          <!-- Pagination start -->
          <div class="pagination-bx clearfix m-b30 text-center">{{ $index->links('pagination::bootstrap-5') }}</div>
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