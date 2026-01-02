   @if($sambutan = query()->detail('sambutan'))
   <div class="section-full bg-primary content-inner py-4">
			<div class="container">
				<div class="row">
				
					<div class="col-lg-12 col-md-12 mb-4" style="font-style:italic">
						<div class="p-5 bg-primary" style="border-radius:10px;">
						<div class="m-b20">
							<h2 class="text-uppercase m-t0 m-b10 text-white">Sambutan {{ $sambutan->field->jabatan }}</h2>
							<div class="clear"></div>
						</div>
					{!! $sambutan->content !!}
                <div class="header-company d-flex align-items-center">
    <img src="{{ $sambutan->thumbnail }}"
         style="width:70px;height:70px;border-radius:50%;padding:4px;border:3px solid rgb(255, 255, 255)"
         alt="">

    <div class="ms-3">
        <h5 class="mb-0 text-white">{{ $sambutan->field->nama }}</h5>
        <span class=" small" style="color:#f5f5f5">{{ $sambutan->field->jabatan }}</span>
    </div>
</div>
</div>
					</div>
					
				</div>
			</div>
		</div>
        @endif