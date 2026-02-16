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
        $this->assertEquals('එකසිය දෙක', $this->converter->toWords(102));
        $this->assertEquals('එකසිය තුන', $this->converter->toWords(103));
        $this->assertEquals('එකසිය හතර', $this->converter->toWords(104));
        $this->assertEquals('එකසිය පහ', $this->converter->toWords(105));
        $this->assertEquals('එකසිය හය', $this->converter->toWords(106));
        $this->assertEquals('එකසිය හත', $this->converter->toWords(107));
        $this->assertEquals('එකසිය අට', $this->converter->toWords(108));
        $this->assertEquals('එකසිය නවය', $this->converter->toWords(109));
        $this->assertEquals('එකසිය දහය', $this->converter->toWords(110));
        $this->assertEquals('එකසිය එකොළහ', $this->converter->toWords(111));
        $this->assertEquals('එකසිය දොළහ', $this->converter->toWords(112));
        $this->assertEquals('එකසිය දහතුන', $this->converter->toWords(113));
        $this->assertEquals('එකසිය දාහතර', $this->converter->toWords(114));
        $this->assertEquals('එකසිය පහළොව', $this->converter->toWords(115));
        $this->assertEquals('එකසිය දහසය', $this->converter->toWords(116));
        $this->assertEquals('එකසිය දහහත', $this->converter->toWords(117));
        $this->assertEquals('එකසිය දහඅට', $this->converter->toWords(118));
        $this->assertEquals('එකසිය දහනවය', $this->converter->toWords(119));
        $this->assertEquals('එකසිය විස්ස', $this->converter->toWords(120));
        $this->assertEquals('එකසිය විසි එක', $this->converter->toWords(121));
        $this->assertEquals('එකසිය විසි දෙක', $this->converter->toWords(122));
        $this->assertEquals('එකසිය විසි තුන', $this->converter->toWords(123));
        $this->assertEquals('එකසිය විසි හතර', $this->converter->toWords(124));
        $this->assertEquals('එකසිය විසි පහ', $this->converter->toWords(125));
        $this->assertEquals('එකසිය විසි හය', $this->converter->toWords(126));
        $this->assertEquals('එකසිය විසි හත', $this->converter->toWords(127));
        $this->assertEquals('එකසිය විසි අට', $this->converter->toWords(128));
        $this->assertEquals('එකසිය විසි නවය', $this->converter->toWords(129));
        $this->assertEquals('එකසිය තිහ', $this->converter->toWords(130));
        $this->assertEquals('එකසිය තිස් එක', $this->converter->toWords(131));
        $this->assertEquals('එකසිය තිස් දෙක', $this->converter->toWords(132));
        $this->assertEquals('එකසිය තිස් තුන', $this->converter->toWords(133));
        $this->assertEquals('එකසිය තිස් හතර', $this->converter->toWords(134));
        $this->assertEquals('එකසිය තිස් පහ', $this->converter->toWords(135));
        $this->assertEquals('එකසිය තිස් හය', $this->converter->toWords(136));
        $this->assertEquals('එකසිය තිස් හත', $this->converter->toWords(137));
        $this->assertEquals('එකසිය තිස් අට', $this->converter->toWords(138));
        $this->assertEquals('එකසිය තිස් නවය', $this->converter->toWords(139));
        $this->assertEquals('එකසිය හතළිහ', $this->converter->toWords(140));
        $this->assertEquals('එකසිය හතළිස් එක', $this->converter->toWords(141));
        $this->assertEquals('එකසිය හතළිස් දෙක', $this->converter->toWords(142));
        $this->assertEquals('එකසිය හතළිස් තුන', $this->converter->toWords(143));
        $this->assertEquals('එකසිය හතළිස් හතර', $this->converter->toWords(144));
        $this->assertEquals('එකසිය හතළිස් පහ', $this->converter->toWords(145));
        $this->assertEquals('එකසිය හතළිස් හය', $this->converter->toWords(146));
        $this->assertEquals('එකසිය හතළිස් හත', $this->converter->toWords(147));
        $this->assertEquals('එකසිය හතළිස් අට', $this->converter->toWords(148));
        $this->assertEquals('එකසිය හතළිස් නවය', $this->converter->toWords(149));
        $this->assertEquals('එකසිය පනහ', $this->converter->toWords(150));
        $this->assertEquals('එකසිය පනස් එක', $this->converter->toWords(151));
        $this->assertEquals('එකසිය පනස් දෙක', $this->converter->toWords(152));
        $this->assertEquals('එකසිය පනස් තුන', $this->converter->toWords(153));
        $this->assertEquals('එකසිය පනස් හතර', $this->converter->toWords(154));
        $this->assertEquals('එකසිය පනස් පහ', $this->converter->toWords(155));
        $this->assertEquals('එකසිය පනස් හය', $this->converter->toWords(156));
        $this->assertEquals('එකසිය පනස් හත', $this->converter->toWords(157));
        $this->assertEquals('එකසිය පනස් අට', $this->converter->toWords(158));
        $this->assertEquals('එකසිය පනස් නවය', $this->converter->toWords(159));
        $this->assertEquals('එකසිය හැට', $this->converter->toWords(160));
        $this->assertEquals('එකසිය හැට එක', $this->converter->toWords(161));
        $this->assertEquals('එකසිය හැට දෙක', $this->converter->toWords(162));
        $this->assertEquals('එකසිය හැට තුන', $this->converter->toWords(163));
        $this->assertEquals('එකසිය හැට හතර', $this->converter->toWords(164));
        $this->assertEquals('එකසිය හැට පහ', $this->converter->toWords(165));
        $this->assertEquals('එකසිය හැට හය', $this->converter->toWords(166));
        $this->assertEquals('එකසිය හැට හත', $this->converter->toWords(167));
        $this->assertEquals('එකසිය හැට අට', $this->converter->toWords(168));
        $this->assertEquals('එකසිය හැට නවය', $this->converter->toWords(169));
        $this->assertEquals('එකසිය හැත්තෑව', $this->converter->toWords(170));
        $this->assertEquals('එකසිය හැත්තෑ එක', $this->converter->toWords(171));
        $this->assertEquals('එකසිය හැත්තෑ දෙක', $this->converter->toWords(172));
        $this->assertEquals('එකසිය හැත්තෑ තුන', $this->converter->toWords(173));
        $this->assertEquals('එකසිය හැත්තෑ හතර', $this->converter->toWords(174));
        $this->assertEquals('එකසිය හැත්තෑ පහ', $this->converter->toWords(175));
        $this->assertEquals('එකසිය හැත්තෑ හය', $this->converter->toWords(176));
        $this->assertEquals('එකසිය හැත්තෑ හත', $this->converter->toWords(177));
        $this->assertEquals('එකසිය හැත්තෑ අට', $this->converter->toWords(178));
        $this->assertEquals('එකසිය හැත්තෑ නවය', $this->converter->toWords(179));
        $this->assertEquals('එකසිය අසූව', $this->converter->toWords(180));
        $this->assertEquals('එකසිය අසූ එක', $this->converter->toWords(181));
        $this->assertEquals('එකසිය අසූ දෙක', $this->converter->toWords(182));
        $this->assertEquals('එකසිය අසූ තුන', $this->converter->toWords(183));
        $this->assertEquals('එකසිය අසූ හතර', $this->converter->toWords(184));
        $this->assertEquals('එකසිය අසූ පහ', $this->converter->toWords(185));
        $this->assertEquals('එකසිය අසූ හය', $this->converter->toWords(186));
        $this->assertEquals('එකසිය අසූ හත', $this->converter->toWords(187));
        $this->assertEquals('එකසිය අසූ අට', $this->converter->toWords(188));
        $this->assertEquals('එකසිය අසූ නවය', $this->converter->toWords(189));
        $this->assertEquals('එකසිය අනූව', $this->converter->toWords(190));
        $this->assertEquals('එකසිය අනූ එක', $this->converter->toWords(191));
        $this->assertEquals('එකසිය අනූ දෙක', $this->converter->toWords(192));
        $this->assertEquals('එකසිය අනූ තුන', $this->converter->toWords(193));
        $this->assertEquals('එකසිය අනූ හතර', $this->converter->toWords(194));
        $this->assertEquals('එකසිය අනූ පහ', $this->converter->toWords(195));
        $this->assertEquals('එකසිය අනූ හය', $this->converter->toWords(196));
        $this->assertEquals('එකසිය අනූ හත', $this->converter->toWords(197));
        $this->assertEquals('එකසිය අනූ අට', $this->converter->toWords(198));
        $this->assertEquals('එකසිය අනූ නවය', $this->converter->toWords(199));

        // 200 - 299
        $this->assertEquals('දෙසීය', $this->converter->toWords(200));
        $this->assertEquals('දෙසිය එක', $this->converter->toWords(201));
        $this->assertEquals('දෙසිය දොළහ', $this->converter->toWords(212));

        // 300 - 399
        $this->assertEquals('තුන්සීය', $this->converter->toWords(300));
        $this->assertEquals('තුන්සිය එක', $this->converter->toWords(301));
        $this->assertEquals('තුන්සිය දොළහ', $this->converter->toWords(312));

        // 400 - 499
        $this->assertEquals('හාරසීය', $this->converter->toWords(400));
        $this->assertEquals('හාරසිය එක', $this->converter->toWords(401));
        $this->assertEquals('හාරසිය දොළහ', $this->converter->toWords(412));

        // 500 - 599
        $this->assertEquals('පන්සීය', $this->converter->toWords(500));
        $this->assertEquals('පන්සිය එක', $this->converter->toWords(501));
        $this->assertEquals('පන්සිය දොළහ', $this->converter->toWords(512));

        // 600 - 699
        $this->assertEquals('හයසීය', $this->converter->toWords(600));
        $this->assertEquals('හයසිය එක', $this->converter->toWords(601));
        $this->assertEquals('හයසිය දොළහ', $this->converter->toWords(612));

        // 700 - 799
        $this->assertEquals('හත්සීය', $this->converter->toWords(700));
        $this->assertEquals('හතසිය එක', $this->converter->toWords(701));
        $this->assertEquals('හතසිය දොළහ', $this->converter->toWords(712));

        // 800 - 899
        $this->assertEquals('අටසීය', $this->converter->toWords(800));
        $this->assertEquals('අටසිය එක', $this->converter->toWords(801));
        $this->assertEquals('අටසිය දොළහ', $this->converter->toWords(812));

        // 900 - 999
        $this->assertEquals('නවසීය', $this->converter->toWords(900));
        $this->assertEquals('නවසිය එක', $this->converter->toWords(901));
        $this->assertEquals('නවසිය දොළහ', $this->converter->toWords(912));
    }
}
