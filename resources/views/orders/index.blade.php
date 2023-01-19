<x-layout :alert="$alert" :type="$type">
    <div class="card p-4 rounded bg-white shadow mt-3">
        <div class="card-body">
            <h2 class="fw-bold text-center mb-3">Pedidos</h2>
            @foreach($orders as $order)
                <div class="row justify-content-between align-items-center">
                    <div class="col-6 col-sm-6 col-md-auto">
                        <h4 class="fw-bold mb-0">ID {{ $order->id }}</h4>
                    </div>
                    <div class="col-6 col-sm-6 col-md-auto d-flex">
                        @php
                            $value = 0;
                        @endphp
                        @foreach($order->products as $product)
                            <div class="box-info-prod me-3">
                                <h5 class="fw-bold mb-0">{{ $product->name }}</h5>
                                <p class="mb-1">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                                <p class="mb-1">Quantidade: {{ $product->pivot->quantity }}</p>
                                <p class="mb-0">Total: {{ number_format($product->price * $product->pivot->quantity, 2, ',', '.') }}</p>
                            </div>
                            @php
                                $value += $product->price * $product->pivot->quantity;
                            @endphp
                        @endforeach
                    </div>
                    <div class="col-12 col-sm-6 col-md-auto">
                        <p class="mb-0">Total: <span class="fw-bold">R$ {{ number_format($value, 2, ',', '.')}}</span></p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</x-layout>
