<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Darryldecode\Cart\CartCollection;

class CartRepository
{
    public function add(Product $product): int
    {
        // add the product to cart
        \Cart::session(auth()->user()->id)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return $this->count();
    }

    public function content(): CartCollection
    {
        return \Cart::session(auth()->user()->id)
            ->getContent();
    }

    public function count(): int
    {
        return $this->content()->sum('quantity');
    }

    public function increase(string $id): void
    {
        \Cart::session(auth()->user()->id)
            ->update($id, [
                'quantity' => +1
            ]);
    }

    public function decrease(string $id): void
    {
        $item = \Cart::session(auth()->user()->id)->get($id);

        if ($item->quantity === 1) {
            $this->remove($id);
            return;
        }

        \Cart::session(auth()->user()->id)
            ->update($id, [
                'quantity' => -1
            ]);
    }

    public function remove(string $id): void
    {
        \Cart::session(auth()->user()->id)->remove($id);
    }

    public function total(): float
    {
        return \Cart::session(auth()->user()->id)->getTotal();
    }

    public function jsonOrderItems()
    {
        return $this->content()->map(function ($item) {
            return [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'price' => $item->price
            ];
        })
        ->toJson();
    }
}
