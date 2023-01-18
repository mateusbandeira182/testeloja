<x-layout :alert="$alert" :type="$type">
    <div class="p-5 bg-light rounded box-products mt-3">
        @isset($products)
                <div class="row">
                    <div class="card p-2 bg-white">
                        <div class="card-body">
                            <h3 class="fw-bold text-center mb-3">Todos os produtos</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Preço</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <th scope="row">{{$product->id}}</th>
                                            <td><a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-primary">{{ $product->name }}</a></td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                            <td>
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="button-space d-flex justify-content-end">
                                <a href="{{ route('product.create') }}" class="btn btn-primary mt-3"><i class="fa-solid fa-plus"></i> Produto</a>
                            </div>
                        </div>
                    </div>
                </div>
        @endisset
    </div>
</x-layout>
