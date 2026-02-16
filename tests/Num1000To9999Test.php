<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use PHPUnit\Framework\TestCase;

class Num1000To9999Test extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new SinhalaConverter();
    }

    /** 
     * Random numbers between 1001 and 10000 (fixed set)
     * @test */
    public function it_converts_random_numbers_between_1001_and_10000_to_words()
    {
        // 1000 to 1099
        $this->assertEquals('දහස', $this->converter->toWords(1000));
        $this->assertEquals('එක්දහස් එක', $this->converter->toWords(1001));
        $this->assertEquals('එක්දහස් දොළහ', $this->converter->toWords(1012));


        // 1100 to 1199
        $this->assertEquals('එක්දහස් එකසීය', $this->converter->toWords(1100));
        $this->assertEquals('එක්දහස් එකසිය එක', $this->converter->toWords(1101));
        $this->assertEquals('එක්දහස් එකසිය දොළහ', $this->converter->toWords(1112));

        // 1200 to 1299
        $this->assertEquals('එක්දහස් දෙසීය', $this->converter->toWords(1200));
        $this->assertEquals('එක්දහස් දෙසිය එක', $this->converter->toWords(1201));
        $this->assertEquals('එක්දහස් දෙසිය දොළහ', $this->converter->toWords(1212));

        // 1300 to 1399
        $this->assertEquals('එක්දහස් තුන්සීය', $this->converter->toWords(1300));
        $this->assertEquals('එක්දහස් තුන්සිය එක', $this->converter->toWords(1301));
        $this->assertEquals('එක්දහස් තුන්සිය දොළහ', $this->converter->toWords(1312));

        // 1400 to 1499
        $this->assertEquals('එක්දහස් හාරසීය', $this->converter->toWords(1400));
        $this->assertEquals('එක්දහස් හාරසිය එක', $this->converter->toWords(1401));
        $this->assertEquals('එක්දහස් හාරසිය දොළහ', $this->converter->toWords(1412));

        // 1500 to 1599
        $this->assertEquals('එක්දහස් පන්සීය', $this->converter->toWords(1500));
        $this->assertEquals('එක්දහස් පන්සිය එක', $this->converter->toWords(1501));
        $this->assertEquals('එක්දහස් පන්සිය දොළහ', $this->converter->toWords(1512));

        // 1600 to 1699
        $this->assertEquals('එක්දහස් හයසීය', $this->converter->toWords(1600));
        $this->assertEquals('එක්දහස් හයසිය එක', $this->converter->toWords(1601));
        $this->assertEquals('එක්දහස් හයසිය දොළහ', $this->converter->toWords(1612));

        // 1700 to 1799
        $this->assertEquals('එක්දහස් හතසීය', $this->converter->toWords(1700));
        $this->assertEquals('එක්දහස් හතසිය එක', $this->converter->toWords(1701));
        $this->assertEquals('එක්දහස් හතසිය දොළහ', $this->converter->toWords(1712));

        // 1800 to 1899
        $this->assertEquals('එක්දහස් අටසීය', $this->converter->toWords(1800));
        $this->assertEquals('එක්දහස් අටසිය එක', $this->converter->toWords(1801));
        $this->assertEquals('එක්දහස් අටසිය දොළහ', $this->converter->toWords(1812));

        // 1900 to 1999
        $this->assertEquals('එක්දහස් නවසීය', $this->converter->toWords(1900));
        $this->assertEquals('එක්දහස් නවසිය එක', $this->converter->toWords(1901));
        $this->assertEquals('එක්දහස් නවසිය දොළහ', $this->converter->toWords(1912));

        // 2000 to 2999 (random samples)
        $this->assertEquals('දෙදහස', $this->converter->toWords(2000));
        $this->assertEquals('දෙදහස් එක', $this->converter->toWords(2001));
        $this->assertEquals('දෙදහස් දෙසිය දොළහ', $this->converter->toWords(2212));
        $this->assertEquals('දෙදහස් පන්සිය', $this->converter->toWords(2500));

    }
}
