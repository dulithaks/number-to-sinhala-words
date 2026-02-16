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
        40 => 'හතළිහ',
        50 => 'පනහ',
        60 => 'හැට',
        70 => 'හැත්තෑව',
        80 => 'අසූව',
        90 => 'අනූව'
    ];

    // Compound tens (for 21-99)
    private static $compoundTens = [
        20 => 'විසි',
        30 => 'තිස්',
        40 => 'හතළිස්',
        50 => 'පනස්',
        60 => 'හැට',
        70 => 'හැත්තෑ',
        80 => 'අසූ',
        90 => 'අනූ'
    ];

    private static $teens = [
        11 => 'එකොළහ',
        12 => 'දොළහ',
        13 => 'දහතුන',
        14 => 'දාහතර',
        15 => 'පහළොව',
        16 => 'දහසය',
        17 => 'දහහත',
        18 => 'දහඅට',
        19 => 'දහනවය'
    ];

    private static $hundreds = [
        100 => 'සියය',
        200 => 'දෙසිය',
        300 => 'තුන්සියය',
        400 => 'හාරසියය',
        500 => 'පන්සියය',
        600 => 'හයසීය',
        700 => 'හත්සීය',
        800 => 'අටසීය',
        900 => 'නවසීය'
    ];

    private static $hundredPrefixes = [
        1 => 'එකසිය',
        2 => 'දෙසිය',
        3 => 'තුන්සිය',
        4 => 'හාරසිය',
        5 => 'පන්සිය',
        6 => 'හයසිය',
        7 => 'හත්සිය',
        8 => 'අටසිය',
        9 => 'නවසිය'
    ];

    private static $thousands = [
        1 => 'දාහ',
        2 => 'දෙදාහ',
        3 => 'තුන්දාහ',
        4 => 'හාරදාහ',
        5 => 'පන්දාහ',
        6 => 'හයදාහ',
        7 => 'හත්දාහ',
        8 => 'අටදාහ',
        9 => 'නවදාහ'
    ];

    /**
     * Convert number to Sinhala words
     *
     * @param int|float $number
     * @param bool $isCompound Whether this is part of a larger compound number
     * @return string
     */
    public function toWords($number, $isCompound = false)
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

        // Handle billion (1,000,000,000)
        if ($number >= 1000000000) {
            $billions = floor($number / 1000000000);
            $remainder = $number % 1000000000;
            if ($billions == 1) {
                $result = 'බිලියනය';
            } else {
                $result = $this->toWords($billions) . ' බිලියනය';
            }
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        // Handle hundred crore (100,000,000)
        if ($number >= 100000000) {
            $hundredCrores = floor($number / 100000000);
            $remainder = $number % 100000000;
            if ($hundredCrores == 1) {
                $result = 'දස කෝටිය';
            } else {
                $result = $this->toWords($hundredCrores) . ' දස කෝටිය';
            }
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        // Handle crore (10,000,000)
        if ($number >= 10000000) {
            $crores = floor($number / 10000000);
            $remainder = $number % 10000000;
            if ($crores == 1) {
                $result = 'කෝටිය';
            } else {
                $result = $this->toWords($crores) . ' කෝටිය';
            }
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        // Handle million (1,000,000)
        if ($number >= 1000000) {
            $millions = floor($number / 1000000);
            $remainder = $number % 1000000;
            if ($millions == 1) {
                $result = 'මිලියනය';
            } else {
                $result = $this->toWords($millions) . ' මිලියනය';
            }
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        // Handle lakh (100,000)
        if ($number >= 100000) {
            $lakhs = floor($number / 100000);
            $remainder = $number % 100000;
            if ($lakhs == 1) {
                $result = 'ලක්ෂය';
            } else {
                $result = $this->toWords($lakhs) . ' ලක්ෂය';
            }
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        // Handle 10,000-99,999
        if ($number >= 10000) {
            $tenThousands = floor($number / 1000);
            $remainder = $number % 1000;

            // Special case for exactly 10,000
            if ($number == 10000) {
                return 'දහදාහ';
            }

            $result = $this->convertTensRange($tenThousands) . ' දාහ';
            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        // Handle thousands (1000-9999)
        if ($number >= 1000) {
            $thousands = floor($number / 1000);
            $remainder = $number % 1000;

            // Special handling for 1000-1999 with remainder
            if ($thousands == 1 && $remainder > 0) {
                // For 1100-1999, use "එක්දහස්" format with special hundred names
                if ($remainder >= 100) {
                    $hundreds = floor($remainder / 100);
                    $underHundred = $remainder % 100;

                    $hundredWords = [
                        1 => 'එකසීය',
                        2 => 'දෙසීය',
                        3 => 'තුන්සීය',
                        4 => 'හාරසීය',
                        5 => 'පන්සීය',
                        6 => 'හයසීය',
                        7 => 'හත්සීය',
                        8 => 'අටසීය',
                        9 => 'නවසීය'
                    ];

                    $result = 'එක්දහස් ' . $hundredWords[$hundreds];
                    if ($underHundred > 0) {
                        $result .= ' ' . $this->convertUnderHundred($underHundred, true);
                    }
                    return $result;
                } else {
                    // 1001-1099
                    return 'එක්දහස් ' . $this->toWords($remainder);
                }
            }

            // For exact thousands or other ranges
            if ($thousands >= 1 && $thousands <= 9 && isset(self::$thousands[$thousands])) {
                $result = self::$thousands[$thousands];
            } else {
                $result = $this->toWords($thousands) . ' දාහ';
            }

            if ($remainder > 0) {
                $result .= ' ' . $this->toWords($remainder);
            }
            return $result;
        }

        // Handle hundreds (100-999)
        if ($number >= 100) {
            $hundreds = floor($number / 100);
            $remainder = $number % 100;

            // Exact hundreds (100, 200, 300, etc.)
            if ($remainder == 0 && isset(self::$hundreds[$number])) {
                return self::$hundreds[$number];
            }

            // Compound hundreds (101-999)
            $result = self::$hundredPrefixes[$hundreds];
            if ($remainder > 0) {
                $result .= ' ' . $this->convertUnderHundred($remainder, true);
            }

            return $result;
        }

        // Handle 0-99
        return $this->convertUnderHundred($number, $isCompound);
    }

    /**
     * Convert numbers under 100
     * 
     * @param int $number
     * @param bool $isCompound Whether this is part of a larger compound
     * @return string
     */
    private function convertUnderHundred($number, $isCompound = false)
    {
        if ($number >= 20) {
            $tens = floor($number / 10) * 10;
            $ones = $number % 10;

            if ($ones > 0) {
                // Compound number like 21, 35, etc.
                // When part of larger number (like 121), use spaces
                // When standalone (21), no space
                if ($isCompound) {
                    return self::$compoundTens[$tens] . ' ' . self::$ones[$ones];
                } else {
                    return self::$compoundTens[$tens] . self::$ones[$ones];
                }
            } else {
                // Exact tens (20, 30, etc.)
                return self::$tens[$tens];
            }
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
     * Convert tens range numbers (10-99) for thousands
     * 
     * @param int $number
     * @return string
     */
    private function convertTensRange($number)
    {
        if ($number >= 20) {
            $tens = floor($number / 10) * 10;
            $ones = $number % 10;

            if ($ones > 0) {
                // For 21, 22, etc. in thousand context
                if ($tens == 20) {
                    return 'විසි' . self::$ones[$ones] . 'ක්';
                } else {
                    return self::$compoundTens[$tens] . self::$ones[$ones] . 'ක්';
                }
            } else {
                // 20, 30, etc.
                return self::$compoundTens[$tens];
            }
        }

        if ($number >= 11 && $number <= 19) {
            // Teens in thousand context need special handling
            $teensThousands = [
                11 => 'එකොළොස්',
                12 => 'දොළොස්',
                13 => 'දහතුන්',
                14 => 'දාහතර',
                15 => 'පහළොස්',
                16 => 'දාසය',
                17 => 'දාහත්',
                18 => 'දහඅට',
                19 => 'දහනව'
            ];
            return $teensThousands[$number];
        }

        if ($number == 10) {
            return 'දහ';
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
