<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private array $cart; 

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
    }

    /**
     * Selecionar itens do carrinho por sessão
     */

    public function index()
    {
        $cart = $this->cart;
        return view('cart.index', compact('cart'));
    }

    /**
     * Adicionar itens ao carrinho
     */

    public function addToCart(Request $request) 
    {
        //Procurar por id
        $product = Ticket::findOrFail($request->product_id);
        //checar se o produto já está no carrinho
        if(isset($this->cart[$product->id])) {
            return back()->with('info', 'Produto já está no carrinho');
        } else {
            $this->cart[$product->id] = [
                'id' => $product->event->id,
                'name' => $product->event->name,
                'price' => $product->price,
                'description' => $product->event->description,
                'qty' => 1,
                'image' => $product->event->image,
            ];

            //setar sessão
            session()->put('cart', $this->cart);
            //calcular total de itens no carrinho
            $this->calculateCartItemsTotal();
            //redirecionando ao usuario com a mensagem
            return back()->with('success', 'Produto adicionado ao seu carrinho');
        }
    }

    private function calculateCartItemsTotal()
    {
        $total = collect($this->cart)->sum(fn($item) => $item['price'] * $item['qty']);
        session()->put('cartItemsTotal', $total);
    }
}
