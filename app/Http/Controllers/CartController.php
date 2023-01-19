<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\EditCartRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    )
    {}

    public function update(EditCartRequest $request)
    {
        $products = $request->session()->get('cart.products');
        $legend = 0;
        foreach ($products as $key => $product) {
            if($product['product']->id === intval($request->product_id)) {
                $legend = $key;
            }
        }
        $products[$legend]['quantity'] = $request->quantity;
        $request->session()->forget('cart');
        $request->session()->put('cart.products', $products);
        return to_route('store.cart')
            ->with('alert', "Produto alterado com sucesso")
            ->with('type', 'success');
    }

    public function store(Request $request)
    {
        $order = Order::create();
        $products = $request->session()->get('cart.products');
        foreach ($products as $product) {
            $object = $this->productRepository->get($product['product']->id);
            if($object->quantity < $product['quantity']) {
                return to_route('store.cart')
                    ->with('alert', "Não foi possivel finalizar a compra porque o produto '{$object->name}' não tem estoque suficiente")
                    ->with('type', 'danger');
            }
            $orderProduct = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['product']->id,
                'quantity' => intval($product['quantity']),
            ]);
            $object->quantity = $object->quantity - $orderProduct->quantity;
            $object->save();
        }
        $request->session()->forget('cart');
        return to_route('store.index')->with('alert', "O pedido de ID '{$order->id}' foi finalizado")->with('type', 'success');
    }

    public function remove(Product $product)
    {
        $products = session()->get('cart.products');
        $legend = 0;
        foreach ($products as $key => $value) {
            if($value['product']->id === $product->id) {
                $legend = $key;
            }
        }
        unset($products[$legend]);
        session()->forget('cart');
        session()->put('cart.products', $products);
        return to_route('store.cart')
            ->with('alert', "O produto '{$product->name}' foi retirado do carrinho")->with('type', 'success');
    }
}
