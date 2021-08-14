<?php

namespace src;

class Raindrop
{
    /**
     * the config values for sounds
     *
     * @var array $sounds
     */
    protected $sounds;

    public function __construct()
    {
        $tempConfig = include_once('./config/raindrops.php');
        $this->sounds = $tempConfig['sounds'];
    }

    /**
     * entrypoint for raindrop
     * return either rain sounds or passed in number if not a factor
     *
     * @param integer $number
     * @return string
     */
    public function handle(int $number) : string
    {
        $responseString = $this->loop($number);

        if ($responseString === '') {
            return (string) $number;
        }
        return $responseString;
    }

    /**
     * check the raindrop values against the number param
     * return the string value for the number
     *
     * @param integer $number
     * @return string
     */
    protected function loop(int $number) : string
    {
        $responseString = '';
        foreach ($this->sounds as $index => $sound) {
            $responseString .= $this->checkNumber(
                $number,
                $index,
                $sound
            );
        }
        return $responseString;
    }

    /**
     * check if the index is a factor of the number
     * return sound or empty string
     *
     * @param integer $number
     * @param integer $index
     * @param string $sound
     * @return string
     */
    protected function checkNumber(int $number, int $index, string $sound) : string
    {
        if ($number % $index === 0) {
            return $sound;
        }
        return '';
    }
}