<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use PHPUnit\Framework\TestCase;

class Num100000To10000000Test extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new SinhalaConverter();
    }

    /**
     * 100000, 200000, ..., 900000, 1000000
     * @test
     */
    public function it_converts_between_100000_and_10000000()
    {
        // 100,000 – 1,000,000
        $this->assertEquals('ලක්ෂය', $this->converter->toWords(100000));
        $this->assertEquals('දෙලක්ෂය', $this->converter->toWords(200000));
        $this->assertEquals('තුන්ලක්ෂය', $this->converter->toWords(300000));
        $this->assertEquals('හාරලක්ෂය', $this->converter->toWords(400000));
        $this->assertEquals('පන්ලක්ෂය', $this->converter->toWords(500000));
        $this->assertEquals('හයලක්ෂය', $this->converter->toWords(600000));
        $this->assertEquals('හත්ලක්ෂය', $this->converter->toWords(700000));
        $this->assertEquals('අටලක්ෂය', $this->converter->toWords(800000));
        $this->assertEquals('නවලක්ෂය', $this->converter->toWords(900000));
        $this->assertEquals('දශලක්ෂය', $this->converter->toWords(1000000));

        // 1,100,000 – 2,000,000
        $this->assertEquals('එකොළොස් ලක්ෂය', $this->converter->toWords(1100000));
        $this->assertEquals('දොළොස් ලක්ෂය', $this->converter->toWords(1200000));
        $this->assertEquals('දහතුන් ලක්ෂය', $this->converter->toWords(1300000));
        $this->assertEquals('දහහතර ලක්ෂය', $this->converter->toWords(1400000));
        $this->assertEquals('පහළොස් ලක්ෂය', $this->converter->toWords(1500000));
        $this->assertEquals('දහසය ලක්ෂය', $this->converter->toWords(1600000));
        $this->assertEquals('දහහත ලක්ෂය', $this->converter->toWords(1700000));
        $this->assertEquals('දහඅට ලක්ෂය', $this->converter->toWords(1800000));
        $this->assertEquals('දහනව ලක්ෂය', $this->converter->toWords(1900000));
        $this->assertEquals('විසි ලක්ෂය', $this->converter->toWords(2000000));

        // 2,100,000 – 3,000,000
        $this->assertEquals('විසිඑක් ලක්ෂය', $this->converter->toWords(2100000));
        $this->assertEquals('විසිදෙ ලක්ෂය', $this->converter->toWords(2200000));
        $this->assertEquals('විසිතුන් ලක්ෂය', $this->converter->toWords(2300000));
        $this->assertEquals('විසිහතර ලක්ෂය', $this->converter->toWords(2400000));
        $this->assertEquals('විසිපන් ලක්ෂය', $this->converter->toWords(2500000));
        $this->assertEquals('විසිහය ලක්ෂය', $this->converter->toWords(2600000));
        $this->assertEquals('විසිහත් ලක්ෂය', $this->converter->toWords(2700000));
        $this->assertEquals('විසිඅට ලක්ෂය', $this->converter->toWords(2800000));
        $this->assertEquals('විසිනව ලක්ෂය', $this->converter->toWords(2900000));
        $this->assertEquals('තිස් ලක්ෂය', $this->converter->toWords(3000000));
    }


    /** 
     * Random numbers between 100000 and 10000000 (fixed set)
     * @test */
    public function it_converts_random_numbers_between_100000_and_10000000_to_words()
    {
        // 110,000 – 190,000
        $this->assertEquals('එක්ලක්ෂ දසදහස', $this->converter->toWords(110000));
        $this->assertEquals('එක්ලක්ෂ විසිදහස', $this->converter->toWords(120000));
        $this->assertEquals('එක්ලක්ෂ තිස්දහස', $this->converter->toWords(130000));
        $this->assertEquals('එක්ලක්ෂ හතළිස්දහස', $this->converter->toWords(140000));
        $this->assertEquals('එක්ලක්ෂ පනස්දහස', $this->converter->toWords(150000));
        $this->assertEquals('එක්ලක්ෂ හැටදහස', $this->converter->toWords(160000));
        $this->assertEquals('එක්ලක්ෂ හැත්තෑදහස', $this->converter->toWords(170000));
        $this->assertEquals('එක්ලක්ෂ අසූදහස', $this->converter->toWords(180000));
        $this->assertEquals('එක්ලක්ෂ අනූදහස', $this->converter->toWords(190000));

    }
}
