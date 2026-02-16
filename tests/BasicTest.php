<?php

namespace Dulithaks\NumberToSinhalaWords\Tests;

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    protected $converter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->converter = new SinhalaConverter();
    }

    /** 
     * Zero
     * @test */
    public function it_converts_zero_to_words()
    {
        $this->assertEquals('බිංදුව', $this->converter->toWords(0));
    }

    /** 
     * Single digits
     * @test */
    public function it_converts_single_digits_to_words()
    {
        $this->assertEquals('එක', $this->converter->toWords(1));
        $this->assertEquals('දෙක', $this->converter->toWords(2));
        $this->assertEquals('තුන', $this->converter->toWords(3));
        $this->assertEquals('හතර', $this->converter->toWords(4));
        $this->assertEquals('පහ', $this->converter->toWords(5));
        $this->assertEquals('හය', $this->converter->toWords(6));
        $this->assertEquals('හත', $this->converter->toWords(7));
        $this->assertEquals('අට', $this->converter->toWords(8));
        $this->assertEquals('නවය', $this->converter->toWords(9));
    }

    /** 
     * Ten
     * @test */
    public function it_converts_ten_to_words()
    {
        $this->assertEquals('දහය', $this->converter->toWords(10));
    }

    /**
     * Teens
     * @test */
    public function it_converts_teens_to_words()
    {
        $this->assertEquals('එකොළහ', $this->converter->toWords(11));
        $this->assertEquals('දොළහ', $this->converter->toWords(12));
        $this->assertEquals('දහතුන', $this->converter->toWords(13));
        $this->assertEquals('දාහතර', $this->converter->toWords(14));
        $this->assertEquals('පහළොව', $this->converter->toWords(15));
        $this->assertEquals('දහසය', $this->converter->toWords(16));
        $this->assertEquals('දහහත', $this->converter->toWords(17));
        $this->assertEquals('දහඅට', $this->converter->toWords(18));
        $this->assertEquals('දහනවය', $this->converter->toWords(19));
    }

    /** 
     * Twenty to ninty 
     * @test */
    public function it_converts_tens_to_words()
    {
        $this->assertEquals('විස්ස', $this->converter->toWords(20));
        $this->assertEquals('තිහ', $this->converter->toWords(30));
        $this->assertEquals('හතළිහ', $this->converter->toWords(40));
        $this->assertEquals('පනහ', $this->converter->toWords(50));
        $this->assertEquals('හැට', $this->converter->toWords(60));
        $this->assertEquals('හැත්තෑව', $this->converter->toWords(70));
        $this->assertEquals('අසූව', $this->converter->toWords(80));
        $this->assertEquals('අනූව', $this->converter->toWords(90));
    }

    /** @test */
    public function it_converts_compound_numbers_to_words()
    {
        $this->assertEquals('විසිඑක', $this->converter->toWords(21));
        $this->assertEquals('විසිදෙක', $this->converter->toWords(22));
        $this->assertEquals('විසිතුන', $this->converter->toWords(23));

        $this->assertEquals('තිස්එක', $this->converter->toWords(31));
        $this->assertEquals('තිස්දෙක', $this->converter->toWords(32));

        $this->assertEquals('හතළිස්හතර', $this->converter->toWords(44));

        $this->assertEquals('පනස්හය', $this->converter->toWords(56));

        $this->assertEquals('හැටඑක', $this->converter->toWords(61));

        $this->assertEquals('හැත්තෑඅට', $this->converter->toWords(78));

        $this->assertEquals('අසූනවය', $this->converter->toWords(89));

        $this->assertEquals('අනූනවය', $this->converter->toWords(99));
    }

    /** @test */
    public function it_converts_hundreds_to_words()
    {
        $this->assertEquals('සියය', $this->converter->toWords(100));
        $this->assertEquals('එකසිය එක', $this->converter->toWords(101));
        $this->assertEquals('දෙසිය', $this->converter->toWords(200));
        $this->assertEquals('එකසිය විස්ස', $this->converter->toWords(120));
        $this->assertEquals('එකසිය විසි එක', $this->converter->toWords(121));
        $this->assertEquals('එකසිය විසි තුන', $this->converter->toWords(123));
        $this->assertEquals('තුන්සියය', $this->converter->toWords(300));
        $this->assertEquals('හාරසියය', $this->converter->toWords(400));
        $this->assertEquals('පන්සියය', $this->converter->toWords(500));
    }

    /** @test */
    public function it_converts_thousands_to_words()
    {
        $this->assertEquals('දහස', $this->converter->toWords(1000));
        $this->assertEquals('එක්දහස් එකසීය', $this->converter->toWords(1100));
        $this->assertEquals('එක්දහස් පන්සීය', $this->converter->toWords(1500));
        $this->assertEquals('දෙදහස', $this->converter->toWords(2000));
        $this->assertEquals('තුන්දහස', $this->converter->toWords(3000));
        $this->assertEquals('දහදාහ', $this->converter->toWords(10000));
        $this->assertEquals('විසි දහස', $this->converter->toWords(20000));
    }

    /** @test */
    public function it_converts_lakhs_to_words()
    {
        $this->assertEquals('ලක්ෂය', $this->converter->toWords(100000));
    }

    /** @test */
    public function it_converts_millions_and_crores_to_words()
    {
        $this->assertEquals('මිලියනය', $this->converter->toWords(1000000));
        $this->assertEquals('කෝටිය', $this->converter->toWords(10000000));
        $this->assertEquals('දස කෝටිය', $this->converter->toWords(100000000));
        $this->assertEquals('බිලියනය', $this->converter->toWords(1000000000));
    }

    /** @test */
    public function it_converts_negative_numbers_to_words()
    {
        $this->assertEquals('ඍණ එක', $this->converter->toWords(-1));
        $this->assertEquals('ඍණ විසිපහ', $this->converter->toWords(-25));
        $this->assertEquals('ඍණ සියය', $this->converter->toWords(-100));
    }

    /** @test */
    public function it_converts_decimal_numbers_to_words()
    {
        $result = $this->converter->toWords(1.5);
        $this->assertStringContainsString('එක දශම', $result);

        $result = $this->converter->toWords(12.34);
        $this->assertStringContainsString('දොළහ දශම', $result);
    }

    /** @test */
    public function it_converts_currency_to_words()
    {
        $this->assertEquals('රු. එක', $this->converter->toCurrency(1));
        $this->assertEquals('රු. විසිපහ', $this->converter->toCurrency(25));
        $this->assertEquals('රු. සියය', $this->converter->toCurrency(100));
    }

    /** @test */
    public function it_converts_currency_with_cents_to_words()
    {
        $result = $this->converter->toCurrency(100.50);
        $this->assertStringContainsString('රු. සියය සහ සත', $result);

        $result = $this->converter->toCurrency(25.75);
        $this->assertStringContainsString('රු. විසිපහ සහ සත', $result);
    }

    /** @test */
    public function it_converts_zero_currency_to_words()
    {
        $this->assertEquals('රු. බිංදුව', $this->converter->toCurrency(0));

        $result = $this->converter->toCurrency(0.50);
        $this->assertStringContainsString('රු. බිංදුව සහ සත', $result);
    }

    /** @test */
    public function it_converts_negative_currency_to_words()
    {
        $this->assertEquals('ඍණ රු. එක', $this->converter->toCurrency(-1));
        $this->assertEquals('ඍණ රු. විසිපහ', $this->converter->toCurrency(-25));
    }

    /** @test */
    public function it_supports_custom_currency_symbol()
    {
        $this->assertEquals('$. විසිපහ', $this->converter->toCurrency(25, '$.'));
        $this->assertEquals('LKR. සියය', $this->converter->toCurrency(100, 'LKR.'));
    }
}
