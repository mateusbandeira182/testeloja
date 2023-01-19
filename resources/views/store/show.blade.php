<x-layout>
    <div class="p-4 mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-8">
                <div id="carouselProducts" class="carousel slide">
                    <div class="carousel-inner">
                        @php
                        $flag = 0;
                        @endphp
                        @foreach($product->images as $image)
                            @if($flag === 0)
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $product->name }}" class="d-block img-fluid mx-auto">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $product->name }}" class="d-block img-fluid mx-auto">
                                </div>
                            @endif
                            @php
                                $flag += 1;
                            @endphp
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProducts" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProducts" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box-info-product p-3">
                    <h1 class="fw-bold mb-4">{{ $product->name }}</h1>
                    <p class="h3 fw-bold">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    <p>Quantidade: <span class="fw-bold">{{ $product->quantity }}</span></p>
                    <form action="{{ route('store.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="row mb-3">
                            <label for="quantity" class="col-sm-3 col-form-label">Quantidade</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" style="width: 75px;" name="quantity" id="quantity" min="1" required>
                            </div>
                        </div>
                        <button class="btn btn-success btn-lg">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
