<x-layout>
    <div class="p-4 rounded bg-light mt-3">
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
                                    <img src="{{ asset($image->image_url) }}" alt="{{ $product->name }}" class="d-block img-fluid">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ asset($image->image_url) }}" alt="{{ $product->name }}" class="d-block img-fluid">
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
                    <div class="button-box d-flex">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary me-3">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <span id="formDelete">
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
