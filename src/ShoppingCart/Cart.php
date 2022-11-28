<?php


namespace App\ShoppingCart;


class Cart
{
    private $cart = [];

    public $id;

    public function __construct()
    {
        $this->id = uniqid();
        $this->cart = [];
    }

    public function add(CartItem $item): void
    {
        array_push($this->cart, $item);
    }

    public function addItems(array $items): void
    {
        $this->cart = array_merge($this->cart, $items);
    }

    public function getFirstItem(): CartItem
    {
        $item = reset($this->cart);

        if(!$item)

            throw new CartIsEmptyException();

        return $item;
    }

    public function remove($id): void 
    {
        foreach($this->cart as $key => $item)
        {
            if($item->id == $id)
                unset($this->cart[$key]);
        }
    }

    public function count(): int
    {
        return count($this->cart);
    }

    public function isEmpty(): bool 
    {
        return empty($this->cart);
    }
}