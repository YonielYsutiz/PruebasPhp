<?php 

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use App\ShoppingCart\Cart;
use App\ShoppingCart\CartItem;
use App\Connection;
use App\ShoppingCart\CartIsEmptyException;

class  AfterBefore extends TestCase
{
    /** @before */
    public function customSetup()
    {
        $this->cart = new Cart();

        $this->conn = new Connection();

        $this->conn->createSchema();
    }

    /** @After */
    public function customTearDown()
    {
        $this->conn->dropTable();

        echo "tearDown \n";
    }

    public function testItCreateACart()
    {
        $item =createItem("Mouse", 20);//new CartItem("Mouse", 20);

        $this->assertEquals(0, $this->cart->count());

        $this->cart->add($item);

        $this->assertEquals(1, $this->cart->count());
    }

    public function testItAddsMultiplesItems()
    {
        $items = [];
        //$item = new CartItem("Mouse", 20);
        $cart = new Cart();

        $this->assertEquals(0, $cart->count());

        for($i = 1; $i <= 5; $i++)
        {
            array_push($items, new CartItem("Mouse", 20));
        }

        $cart->addItems($items);

        $this->assertEquals(count($items), $cart->count());
    }

    public function testIsEmpty()
    {
        $cart = new Cart();

        $this->assertTrue($cart->isEmpty());
    }

    public function testItRemoveItem()
    {
        $item = new CartItem("Mouse", 20);
        $cart = new Cart();

        $cart->add($item);

        $this->assertEquals(1, $cart->count());

        $cart->remove($item->id);

        $this->assertTrue($cart->isEmpty());
    }

    public function testItStoresAnCart()
    {
        $this->conn->insert($this->cart);

        $cart = $this->conn->get($this->cart->id);

        $this->assertEquals($cart->id, $this->cart->id);
    }

    public function test_it_throws_an_empty_exception()
    {
        $this->expectException(CartIsEmptyException::class);
        $this->cart->getFirstItem();
    }
}