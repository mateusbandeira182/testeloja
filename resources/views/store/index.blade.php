<x-layout :alert="$alert" :type="$type">
    <section id="products" class="my-5">
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 mt-3 mt-sm-0 mt-md-0">
                    <div class="card shadow">
                        @php
                            $var = 1;
                        @endphp
                        @foreach($product->images as $image)
                            @if($var === 1)
                                <a href="{{ route('store.show', $product->id) }}">
                                    <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $product->name }}" class="img-fluid">
                                </a>
                            @endif
                            @php
                                $var += 1;
                            @endphp
                        @endforeach
                        <div class="card-body p-3 text-center">
                            <h3 class="fw-bold mb-3"><a href="{{ route('store.show', $product->id) }}" class="text-decoration-none text-dark">{{ $product->name }}</a></h3>
                            <p>Quantidade: {{ $product->quantity }}</p>
                            <p class="h4 fw-bold text-primary mb-4">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                            <form action="{{ route('store.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-success btn-lg mb-4">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
