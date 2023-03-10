<x-layout>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-5">
            <div class="card p-3 rounded shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Cadastro de Produto</h2>
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantidade</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ old('quantity') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="price" class="form-label">Preço</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="price-addon">R$</span>
                                        <input type="number" name="price" id="price" class="form-control" step="0.01"  value="{{ old('price') }}" aria-label="Preço" aria-describedby="price-addon" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="images" class="form-label">Imagens do produto</label>
                                    <input class="form-control" name="images[]" type="file" id="images" required multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea name="description" id="description" style="height: 100px;" class="form-control" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
