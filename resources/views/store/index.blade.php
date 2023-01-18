<x-layout :alert="$alert" :type="$type">
    <section id="products" class="my-5">
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        @php
                            $var = 1;
                        @endphp
                        @foreach($product->images as $image)
                            @if($var === 1)
                                <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $product->name }}" class="img-fluid">
                            @endif
                            @php
                                $var += 1;
                            @endphp
                        @endforeach
                        <div class="card-body p-3 text-center">
                            <h3 class="fw-bold mb-3">{{ $product->name }}</h3>
                            <p>Quantidade: {{ $product->quantity }}</p>
                            <p class="h4 fw-bold text-primary mb-4">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                            <form action="#" method="post">
                                @csrf
                                <button class="btn btn-success btn-lg mb-4">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
