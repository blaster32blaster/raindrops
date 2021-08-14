<?php

namespace src;

use src\Raindrop;

class Main
{
    /**
     * the number to loop through and check factors
     *
     * @var int $number
     */
    protected $number;

    public function __construct(int $number = 100)
    {
        $this->number = $number;
    }

    /**
     * init the class
     *
     * @param integer $number
     * @return Main
     */
    public static function init(int $number = 100) : Main
    {
        return new self($number);
    }

    /**
     * process all numbers between input/default and 0
     * echo results
     *
     * @return void
     */
    public function process() : void
    {
        $raindrop = new Raindrop();
        for ($iterator = $this->number; $iterator > 0; $iterator--) {
            echo nl2br("\n");
            $output = $raindrop->handle($iterator);
            echo($output);
        }
    }
}