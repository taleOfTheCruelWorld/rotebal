<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card" style="height: 500px; text-align: center;">
        <img src="https://www.вкусней.рф/{{Storage::url($prod->photos[0]->thumbnails->path) }}" class="img-fluid"
            style="height: 300px;" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $prod->name }}</h5>
            <p class="card-text">{{ $prod->price }} руб.</p>
            <a href="{{ route('product', ['Product'=>$prod->id]) }}" class="btn btn-primary">About</a>
            <a href="" class="btn btn-primary">To Cart</a>
        </div>
    </div>
</div>
