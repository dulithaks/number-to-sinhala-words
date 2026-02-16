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
    public function it_converts_multiples_of_thousand_between_100000_and_10000000()
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
    }


    /** 
     * Random numbers between 10001 and 99999 (fixed set)
     * @test */
    // public function it_converts_random_numbers_between_10001_and_99999_to_words()
    // {
    //     // 10000 to 19999
    //     $this->assertEquals('දසදහස් එක', $this->converter->toWords(10001));
    //     $this->assertEquals('දසදහස් එකසිය දොළහ', $this->converter->toWords(10112));
    //     $this->assertEquals('එකොළොස්දහස් එකසිය දොළහ', $this->converter->toWords(11112));



    //     // 20000 to 29999
    //     $this->assertEquals('විසිදහස් එක', $this->converter->toWords(20001));
    //     $this->assertEquals('විසිදහස් දෙසිය දොළහ', $this->converter->toWords(20212));
    //     $this->assertEquals('විසිදෙදහස් දෙසිය දොළහ', $this->converter->toWords(22212));


    //     // 30000 to 39999
    //     $this->assertEquals('තිස්දහස් තුන', $this->converter->toWords(30003));
    //     $this->assertEquals('තිස්දහස් තුන්සිය දොළහ', $this->converter->toWords(30312));
    //     $this->assertEquals('තිස්තුන්දහස් තුන්සිය දොළහ', $this->converter->toWords(33312));

    //     // 40000 to 49999
    //     $this->assertEquals('හතළිස්දහස් හතර', $this->converter->toWords(40004));
    //     $this->assertEquals('හතළිස්දහස් හාරසිය දොළහ', $this->converter->toWords(40412));
    //     $this->assertEquals('හතළිස්හතරදහස් හාරසිය දොළහ', $this->converter->toWords(44412));

    //     // 50000 to 59999
    //     $this->assertEquals('පනස්දහස් පහ', $this->converter->toWords(50005));
    //     $this->assertEquals('පනස්දහස් පන්සිය දොළහ', $this->converter->toWords(50512));
    //     $this->assertEquals('පනස්පන්දහස් පන්සිය දොළහ', $this->converter->toWords(55512)); 

    //     // 60000 to 69999
    //     $this->assertEquals('හැටදහස් හය', $this->converter->toWords(60006));
    //     $this->assertEquals('හැටදහස් හයසිය දොළහ', $this->converter->toWords(60612));
    //     $this->assertEquals('හැටහයදහස් හයසිය දොළහ', $this->converter->toWords(66612));

    //     // 70000 to 79999
    //     $this->assertEquals('හැත්තෑදහස් හත', $this->converter->toWords(70007));
    //     $this->assertEquals('හැත්තෑදහස් හතසිය දොළහ', $this->converter->toWords(70712));
    //     $this->assertEquals('හැත්තෑහත්දහස් හතසිය දොළහ', $this->converter->toWords(77712));

    //     // 80000 to 89999
    //     $this->assertEquals('අසූදහස් අට', $this->converter->toWords(80008));
    //     $this->assertEquals('අසූදහස් අටසිය දොළහ', $this->converter->toWords(80812));
    //     $this->assertEquals('අසූඅටදහස් අටසිය දොළහ', $this->converter->toWords(88812));

    //     // 90000 to 99999
    //     $this->assertEquals('අනූදහස් නවය', $this->converter->toWords(90009));
    //     $this->assertEquals('අනූදහස් නවසිය දොළහ', $this->converter->toWords(90912));
    //     $this->assertEquals('අනූනවදහස් නවසිය දොළහ', $this->converter->toWords(99912));
    // }
}
