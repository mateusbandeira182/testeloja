<x-layout :alert="$alert" :type="$type">
    <div class="p-4 rounded bg-light mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-8">
                @if($product->images->isEmpty())
                    <h5 class="fw-bold text-danger">Produto sem imagem</h5>
                    <form action="{{ route('product.image.upload', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="images" class="form-label">Imagens do produto</label>
                            <input class="form-control" name="images[]" type="file" id="images" required multiple>
                        </div>
                        <button class="btn btn-primary">Upload</button>
                    </form>
                @else
                    @php
                        $flag = 0;
                    @endphp
                    <div id="carouselProducts" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($product->images as $image)
                                @if($flag === 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $product->name }}" class="d-block img-fluid">
                                        <div class="box-buttons d-flex justify-content-center">
                                            <form action="{{ route('product.image.remove', [$product->id, $image->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm mt-3"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $product->name }}" class="d-block img-fluid">
                                        <div class="box-buttons d-flex justify-content-center">
                                            <form action="{{ route('product.image.remove', [$product->id, $image->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm mt-3"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                            </form>
                                        </div>
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
                @endif
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
