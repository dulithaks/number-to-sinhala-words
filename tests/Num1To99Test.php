<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use PHPUnit\Framework\TestCase;

class Num1To99Test extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new SinhalaConverter();
    }

    /** 
     * Random numbers between 1 and 99 (fixed set)
     * @test */
    public function it_converts_random_numbers_between_1_and_99_to_words()
    {
        // 1 - 10
        $this->assertEquals('එක', $this->converter->toWords(1));
        $this->assertEquals('දෙක', $this->converter->toWords(2));
        $this->assertEquals('තුන', $this->converter->toWords(3));
        $this->assertEquals('පහ', $this->converter->toWords(5));
        $this->assertEquals('හය', $this->converter->toWords(6));
        $this->assertEquals('හත', $this->converter->toWords(7));
        $this->assertEquals('අට', $this->converter->toWords(8));
        $this->assertEquals('දහය', $this->converter->toWords(10));

        // 11 - 20
        $this->assertEquals('එකොළහ', $this->converter->toWords(11));
        $this->assertEquals('දොළහ', $this->converter->toWords(12));
        $this->assertEquals('දහතුන', $this->converter->toWords(13));
        $this->assertEquals('දාහතර', $this->converter->toWords(14));
        $this->assertEquals('පහළොව', $this->converter->toWords(15));
        $this->assertEquals('දහසය', $this->converter->toWords(16));
        $this->assertEquals('දහනවය', $this->converter->toWords(19));

        // 21 - 30
        $this->assertEquals('විසිඑක', $this->converter->toWords(21));
        $this->assertEquals('විසිහතර', $this->converter->toWords(24));
        $this->assertEquals('විසිහය', $this->converter->toWords(26));
        $this->assertEquals('විසිහත', $this->converter->toWords(27));
        $this->assertEquals('විසිනවය', $this->converter->toWords(29));
        $this->assertEquals('තිහ', $this->converter->toWords(30));

        // 31 - 40
        $this->assertEquals('තිස්තුන', $this->converter->toWords(33));
        $this->assertEquals('තිස්හත', $this->converter->toWords(37));
        $this->assertEquals('තිස්අට', $this->converter->toWords(38));

        // 41 - 50
        $this->assertEquals('හතළිස්එක', $this->converter->toWords(41));
        $this->assertEquals('හතළිස්තුන', $this->converter->toWords(43));
        $this->assertEquals('හතළිස්පහ', $this->converter->toWords(45));
        $this->assertEquals('හතළිස්හත', $this->converter->toWords(47));
        $this->assertEquals('හතළිස්නවය', $this->converter->toWords(49));
        $this->assertEquals('පනහ', $this->converter->toWords(50));

        // 51 - 60
        $this->assertEquals('පනස්හතර', $this->converter->toWords(54));
        $this->assertEquals('පනස්හය', $this->converter->toWords(56));
        $this->assertEquals('පනස්අට', $this->converter->toWords(58));
        $this->assertEquals('හැට', $this->converter->toWords(60));

        // 61 - 70
        $this->assertEquals('හැටඑක', $this->converter->toWords(61));
        $this->assertEquals('හැටහතර', $this->converter->toWords(64));
        $this->assertEquals('හැටහය', $this->converter->toWords(66));
        $this->assertEquals('හැටඅට', $this->converter->toWords(68));
        $this->assertEquals('හැත්තෑව', $this->converter->toWords(70));

        // 71 - 80
        $this->assertEquals('හැත්තෑතුන', $this->converter->toWords(73));
        $this->assertEquals('හැත්තෑහත', $this->converter->toWords(77));
        $this->assertEquals('හැත්තෑනවය', $this->converter->toWords(79));
        $this->assertEquals('අසූව', $this->converter->toWords(80));

        // 81 - 90
        $this->assertEquals('අසූදෙක', $this->converter->toWords(82));
        $this->assertEquals('අසූතුන', $this->converter->toWords(83));
        $this->assertEquals('අසූහය', $this->converter->toWords(86));
        $this->assertEquals('අසූඅට', $this->converter->toWords(88));
        $this->assertEquals('අනූව', $this->converter->toWords(90));
        $this->assertEquals('අනූදෙක', $this->converter->toWords(92));

        // 91 - 99
        $this->assertEquals('අනූහතර', $this->converter->toWords(94));
        $this->assertEquals('අනූපහ', $this->converter->toWords(95));
        $this->assertEquals('අනූනවය', $this->converter->toWords(99));
    }
}
