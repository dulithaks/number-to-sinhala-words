<?php

namespace Dulithaks\NumberToSinhalaWords;

class SinhalaConverter
{
    /**
     * Sinhala digit words
     */
    private static $ones = [
        0 => '',
        1 => 'එක',
        2 => 'දෙක',
        3 => 'තුන',
        4 => 'හතර',
        5 => 'පහ',
        6 => 'හය',
        7 => 'හත',
        8 => 'අට',
        9 => 'නවය'
    ];

    private static $tens = [
        10 => 'දහය',
        20 => 'විස්ස',
        30 => 'තිහ',
        40 => 'හතළිස්',
        50 => 'පනස',
        60 => 'හැට',
        70 => 'හැත්තෑව',
        80 => 'අසූව',
        90 => 'අනූව'
    ];

    private static $teens = [
        11 => 'එකොළහ',
        12 => 'දොළහ',
        13 => 'තෙරළහ',
        14 => 'දාහතර',
        15 => 'පහළොව',
        16 => 'දාහය',
        17 => 'දාහත',
        18 => 'දහඅට',
        19 => 'දහනවය'
    ];

    /**
     * Convert number to Sinhala words
     *
     * @param int|float $number
     * @return string
     */
    public function toWords($number)
    {
        // Handle negative numbers
        if ($number < 0) {
            return 'ඍණ ' . $this->toWords(abs($number));
        }

        // Handle zero
        if ($number == 0) {
            return 'බිංදුව';
        }

        // Handle decimal numbers
        if (is_float($number) || strpos((string)$number, '.') !== false) {
            $parts = explode('.', (string)$number);
            $integerPart = (int)$parts[0];
            $decimalPart = isset($parts[1]) ? $parts[1] : '';

            $result = $this->toWords($integerPart);
            
            if (!empty($decimalPart)) {
                $result .= ' දශම';
                foreach (str_split($decimalPart) as $digit) {
                    $result .= ' ' . self::$ones[(int)$digit];
                }
            }
            
            return $result;
        }

        $number = (int)$number;

        // Handle large numbers
        if ($number >= 10000000) {
            $crores = floor($number / 10000000);
            $remainder = $number % 10000000;
            $result = $this->toWords($crores) . ' කෝටි';
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        if ($number >= 100000) {
            $lakhs = floor($number / 100000);
            $remainder = $number % 100000;
            $result = $this->toWords($lakhs) . ' ලක්ෂ';
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        if ($number >= 1000) {
            $thousands = floor($number / 1000);
            $remainder = $number % 1000;
            $result = $this->toWords($thousands) . ' දහස';
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        if ($number >= 100) {
            $hundreds = floor($number / 100);
            $remainder = $number % 100;
            $result = $this->toWords($hundreds) . ' සියය';
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        if ($number >= 20) {
            $tens = floor($number / 10) * 10;
            $ones = $number % 10;
            $result = self::$tens[$tens];
            if ($ones > 0) {
                $result .= ' ' . self::$ones[$ones];
            }
            return $result;
        }

        if ($number >= 11 && $number <= 19) {
            return self::$teens[$number];
        }

        if ($number == 10) {
            return self::$tens[10];
        }

        return self::$ones[$number];
    }

    /**
     * Convert currency amount to Sinhala words
     *
     * @param float $amount
     * @param string $currency Currency symbol (default: රු.)
     * @return string
     */
    public function toCurrency($amount, $currency = 'රු.')
    {
        // Handle negative amounts
        if ($amount < 0) {
            return 'ඍණ ' . $this->toCurrency(abs($amount), $currency);
        }

        // Split into rupees and cents
        $parts = explode('.', number_format($amount, 2, '.', ''));
        $rupees = (int)$parts[0];
        $cents = (int)$parts[1];

        $result = $currency . ' ';

        if ($rupees == 0) {
            $result .= 'බිංදුව';
        } else {
            $result .= $this->toWords($rupees);
        }

        if ($cents > 0) {
            $result .= ' සහ සත ' . $this->toWords($cents);
        }

        return $result;
    }
}
