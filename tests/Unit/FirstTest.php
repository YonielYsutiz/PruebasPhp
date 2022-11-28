<?php

namespace Test\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    /**
     * @test
     */
    public function it_Sum(){
        $c = new  Calculator();
        //Con $this podemos llamar a los modelos sin problemas.
        $this->assertEquals(5, $c->sum(3, 2));

        $this->assertInstanceOf(Calculator::class, $c);
    }

    public function testAsserts(){
        // Pero asi tambien las podemos llamar de una forma estatica.
        self::assertTrue(true);

        self::assertClassHasAttribute('data', Calculator::class);

        self::assertContains(4, [4,5,2,3]);
    }
    /**
     * @doesNotPerformAssertions
     * @test
     */
    public function Skipped()
    {

    }

}
