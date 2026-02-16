<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use PHPUnit\Framework\TestCase;

class Num100To999Test extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new SinhalaConverter();
    }

    /** 
     * Random numbers between 100 and 999 (fixed set)
     * @test */
    public function it_converts_random_numbers_between_100_and_999_to_words()
    {
        // 100 - 199
        $this->assertEquals('සියය', $this->converter->toWords(100));
        $this->assertEquals('එකසිය එක', $this->converter->toWords(101));
        $this->assertEquals('එකසිය ', $this->converter->toWords(112));
        $this->assertEquals('එකසිය විසිපහ', $this->converter->toWords(125));
        $this->assertEquals('එකසිය තුන', $this->converter->toWords(103));
        $this->assertEquals('එකසිය පහ', $this->converter->toWords(105));
        $this->assertEquals('එකසිය හය', $this->converter->toWords(106));
        $this->assertEquals('එකසිය හත', $this->converter->toWords(107));
        $this->assertEquals('එකසිය අට', $this->converter->toWords(108));
        $this->assertEquals('එකසිය නවය', $this->converter->toWords(109));
        $this->assertEquals('එකසිය දහය', $this->converter->toWords(110));

        // 200 - 299
        $this->assertEquals('දෙසිය එක', $this->converter->toWords(201));
        $this->assertEquals('දෙසිය දෙක', $this->converter->toWords(202));
        $this->assertEquals('දෙසිය තුන', $this->converter->toWords(203));
        $this->assertEquals('දෙසිය පහ', $this->converter->toWords(205));
        $this->assertEquals('දෙසිය හය', $this->converter->toWords(206));

        // 300 - 399
        $this->assertEquals('තුන්සිය එක', $this->converter->toWords(301));
        $this->assertEquals('තුන්සිය දෙක', $this->converter->toWords(302));
    }
}
