<header>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ config('app.url') }}">Loja Virtual</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#storeNavbar" aria-controls="storeNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="storeNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('store.index') }}" class="nav-link">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('store.cart') }}" class="nav-link">Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('order.index') }}" class="nav-link">Pedidos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
