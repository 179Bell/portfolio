<div class="card-body">
    <h2>{{ $camp->title }}</h2>
    @foreach ($camp->campImgs as $campImg)
        <img src="{{ asset('storage/images/'.$campImg->img_path) }}" width="400" height="300">
    @endforeach
</div>
<div  class="card-body">
    <p><i class="fas fa-map-marker-alt"></i>{{ $camp->location }}</p>
    <p>{{ $camp->discription }}</p>
</div>
