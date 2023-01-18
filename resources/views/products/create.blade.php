<x-layout>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-5">
            <div class="card p-3 rounded shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Cadastro de Produto</h2>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control" autofocus required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantidade</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Preço</label>
                                    <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="images" class="form-label">Default file input example</label>
                                    <input class="form-control" name="images" type="file" id="images" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea name="description" id="description" style="height: 100px;" class="form-control"></textarea>
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
