<?php

namespace App\ShoppingCart;

class CartIsEmptyException extends \Exception
{
    public function errorMessage()

    {
        return "Error item was not found";
    }
}