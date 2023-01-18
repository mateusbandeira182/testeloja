<x-layout>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-6">
            <div class="card p-4 rounded shadow">
                <div class="card-body">
                    <h3 class="fw-bold text-center mb-3">Editar Produto</h3>
                    <form action="{{ route('product.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantidade</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ $product->quantity }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Preço</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="price-addon">R$</span>
                                        <input type="number" name="price" id="price" class="form-control" step="0.01" aria-label="Preço" aria-describedby="price-addon" value="{{ $product->price }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea name="description" id="description" style="height: 100px;" class="form-control" required>{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100">Alterar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
