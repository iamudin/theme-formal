@if($slider = get_banner('slider-home',3))
<div class="hero-slider">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            @foreach($slider as $key => $slide)
            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <div class="hero-image">
                    <img src="{{ $slide->image }}">
                </div>
            </div>
            @endforeach


        </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
@endif
