<div class="col-12 pt-3 pb-4 g-0 border-bottom-black">
    <p class="text-muted fs-5">Recently Written</p>
    @foreach ($recentlyWritte as $recent)
        <span onclick="{{ $recent['url'] }}">
            <div class="card p-0 mt-4" style="min-height:140px;">
                <img class="h-100 w-100 card-img" style="opacity:0.5; min-height:140px;" src="{{$recent['image_url_landscape']}}">
                <div class="card-img-overlay">
                    <h5 class="card-title">{{ $recent['title'] }}</h5>
                    <p class="card-text">{{ $recent['date'] }}</p>
                </div>
            </div>
        </span>
    @endforeach
</div>