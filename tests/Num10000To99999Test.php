<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use PHPUnit\Framework\TestCase;

class Num10000To99999Test extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new SinhalaConverter();
    }

    /**
     * 10000, 11000, 12000, ..., 19000, 20000, 21000, ..., 29000, ..., 90000
     * 10000 plus 1000 upto 99999
     * @test
     */
    public function it_converts_multiples_of_thousand_between_10000_and_99000()
    {
        // 10,000 – 19,000
        $this->assertEquals('දසදහස', $this->converter->toWords(10000));
        $this->assertEquals('එකොළොස්දහස', $this->converter->toWords(11000));
        $this->assertEquals('දොළොස්දහස', $this->converter->toWords(12000));
        $this->assertEquals('දහතුන්දහස', $this->converter->toWords(13000));
        $this->assertEquals('දහහතරදහස', $this->converter->toWords(14000));
        $this->assertEquals('පහළොස්දහස', $this->converter->toWords(15000));
        $this->assertEquals('දහසයදහස', $this->converter->toWords(16000));
        $this->assertEquals('දහහතදහස', $this->converter->toWords(17000));
        $this->assertEquals('දහඅටදහස', $this->converter->toWords(18000));
        $this->assertEquals('දහනවදහස', $this->converter->toWords(19000));

        // 20,000 – 29,000
        $this->assertEquals('විසිදහස', $this->converter->toWords(20000));
        $this->assertEquals('විසිඑක්දහස', $this->converter->toWords(21000));
        $this->assertEquals('විසිදෙදහස', $this->converter->toWords(22000));
        $this->assertEquals('විසිතුන්දහස', $this->converter->toWords(23000));
        $this->assertEquals('විසිහතරදහස', $this->converter->toWords(24000));
        $this->assertEquals('විසිපන්දහස', $this->converter->toWords(25000));
        $this->assertEquals('විසිහයදහස', $this->converter->toWords(26000));
        $this->assertEquals('විසිහත්දහස', $this->converter->toWords(27000));
        $this->assertEquals('විසිඅටදහස', $this->converter->toWords(28000));
        $this->assertEquals('විසිනවදහස', $this->converter->toWords(29000));

        // 30,000 – 39,000
        $this->assertEquals('තිස්දහස', $this->converter->toWords(30000));
        $this->assertEquals('තිස්එක්දහස', $this->converter->toWords(31000));
        $this->assertEquals('තිස්දෙදහස', $this->converter->toWords(32000));
        $this->assertEquals('තිස්තුන්දහස', $this->converter->toWords(33000));
        $this->assertEquals('තිස්හතරදහස', $this->converter->toWords(34000));
        $this->assertEquals('තිස්පන්දහස', $this->converter->toWords(35000));
        $this->assertEquals('තිස්හයදහස', $this->converter->toWords(36000));
        $this->assertEquals('තිස්හත්දහස', $this->converter->toWords(37000));
        $this->assertEquals('තිස්අටදහස', $this->converter->toWords(38000));
        $this->assertEquals('තිස්නවදහස', $this->converter->toWords(39000));


        $this->assertEquals('හතළිස්දහස', $this->converter->toWords(40000));
        $this->assertEquals('පනස්දහස', $this->converter->toWords(50000));
        $this->assertEquals('හැටදහස', $this->converter->toWords(60000));
        $this->assertEquals('හැත්තෑදහස', $this->converter->toWords(70000));
        $this->assertEquals('අසූදහස', $this->converter->toWords(80000));
        $this->assertEquals('අනූදහස', $this->converter->toWords(90000));

        // Edge case
        $this->assertEquals('අනූනවදහස', $this->converter->toWords(99000));
    }


    /** 
     * Random numbers between 10001 and 99999 (fixed set)
     * @test */
    public function it_converts_random_numbers_between_10001_and_99999_to_words()
    {
        // 10000 to 19999
        $this->assertEquals('දසදහස් එක', $this->converter->toWords(10001));
        $this->assertEquals('දසදහස් එකසිය දොළහ', $this->converter->toWords(10112));
        $this->assertEquals('එකොළොස්දහස් එකසිය දොළහ', $this->converter->toWords(11112));



        // 20000 to 29999
        $this->assertEquals('විසිදහස් එක', $this->converter->toWords(20001));
        $this->assertEquals('විසිදහස් දෙසිය දොළහ', $this->converter->toWords(20212));
        // $this->assertEquals('විසිදෙදහස් දෙසිය දොළහ', $this->converter->toWords(22212));


        // 30000 to 39999
        $this->assertEquals('තිස්දහස් තුන', $this->converter->toWords(30003));
        $this->assertEquals('තිස්දහස් තුන්සිය දොළහ', $this->converter->toWords(30312));
        // $this->assertEquals('තිස්තුන්දහස් තුන්සිය දොළහ', $this->converter->toWords(33312));
    }
}
