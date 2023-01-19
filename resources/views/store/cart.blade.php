<x-layout :alert="$alert" :type="$type">
    <div class="card rounded p-3 bg-white shadow mt-3">
        <div class="card-body">
            <h2 class="fw-bold mb-3 text-center">Carrinho</h2>
            @isset($products)
                @php
                $total = 0;
                @endphp
                @foreach($products as $product)
                    <div class="row align-items-center">
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="box-img">
                                @php
                                    $var = 1;
                                @endphp
                                @foreach($product['product']->images as $image)
                                    @if($var === 1)
                                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $product['product']->name }}" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover; object-position: center">
                                    @endif
                                    @php
                                        $var += 1;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <h5 class="fw-bold">{{ $product['product']->name }}</h5>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{ $product['product']->id }}">
                                <div class="d-flex flex-wrap align-items-end">
                                    <div class="input-quantity me-3">
                                        <label for="quantity" class="form-label">Quantidade</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" style="width: 50px;" value="{{ $product['quantity'] }}">
                                    </div>
                                    <div class="button">
                                        <button class="btn btn-secondary btn-sm me-2"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <p class="text-end">Preço unitário: R$ {{ number_format($product['product']->price, 2, ',', '.') }}</p>
                            <p class="fw-bold text-end">Preço total: R$ {{ number_format(($product['product']->price) * doubleval($product['quantity']), 2, ',', '.') }}</p>
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('cart.remove', $product['product']->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @php
                        $total += $product['product']->price * doubleval($product['quantity']);
                    @endphp
                @endforeach
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="total">
                        <h4>Total: R$ <span class="fw-bold">{{ number_format($total, 2, ',', '.')}}</span></h4>
                    </div>
                    <div class="btn-finish">
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <button class="btn btn-success btn-lg">Finalizar</button>
                        </form>
                    </div>

                </div>

            @endisset
        </div>
    </div>
    @push('custom-scripts')
        <script src="{{ asset('assets/js/store/cart.js') }}"></script>
    @endpush
</x-layout>
