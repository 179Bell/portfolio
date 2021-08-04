<div class="card-body">
    @foreach ($camp->campImgs as $campImg)
        <img src="{{ asset('storage/images/'.$campImg->img_path) }}" width="400" height="300">
    @endforeach
</div>
<div  class="card-body">
    <h3>{{ $camp->title }}</h3>
    <p><i class="fas fa-map-marker-alt"></i>{{ $camp->location }}</p>
    <p>{{ $camp->discription }}</p>
</div>
