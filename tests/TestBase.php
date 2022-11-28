<?php

namespace Test;
use PHPUnit\Framework\TestCase;

class TestBase extends TestCase
{
    protected function setUp(): void
    {
        $this->name = "Fernando";
    }
}