<?php

use PHPUnit\Framework\TestCase;
use src\Raindrop;

class RaindropTest extends TestCase
{
    /**
     * a raindrop instance
     *
     * @var Raindrop $raindrop
     */
    public $raindrop;

    public function __construct()
    {
        parent::__construct();
        $this->raindrop = new Raindrop();
    }
    /**
     * test the handle method with a few different inputs
     *
     * @return void
     */
    public function testHandle()
    {
        $response = $this->raindrop->handle(28);
        $this->assertEquals($response, 'Plong');

        $response = $this->raindrop->handle(30);
        $this->assertEquals($response, 'PlingPlang');
        
        $response = $this->raindrop->handle(34);
        $this->assertEquals($response, '34');
    }
}
