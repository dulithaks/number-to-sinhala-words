<?php

/**
 * Example usage of the Number to Sinhala Words package
 * 
 * This example demonstrates how to use the package outside of Laravel
 * For Laravel usage, see the README.md file
 */

require __DIR__ . '/vendor/autoload.php';

use Dulithaks\NumberToSinhalaWords\SinhalaConverter;

// Create a new converter instance
$converter = new SinhalaConverter();

echo "=== Number to Sinhala Words Examples ===" . PHP_EOL . PHP_EOL;

// Basic numbers
echo "Basic Numbers:" . PHP_EOL;
echo "5 => " . $converter->toWords(5) . PHP_EOL;
echo "42 => " . $converter->toWords(42) . PHP_EOL;
echo "100 => " . $converter->toWords(100) . PHP_EOL;
echo "1234 => " . $converter->toWords(1234) . PHP_EOL;
echo PHP_EOL;

// Large numbers
echo "Large Numbers:" . PHP_EOL;
echo "100,000 => " . $converter->toWords(100000) . PHP_EOL;
echo "1,234,567 => " . $converter->toWords(1234567) . PHP_EOL;
echo "10,000,000 => " . $converter->toWords(10000000) . PHP_EOL;
echo PHP_EOL;

// Special cases
echo "Special Cases:" . PHP_EOL;
echo "0 => " . $converter->toWords(0) . PHP_EOL;
echo "-15 => " . $converter->toWords(-15) . PHP_EOL;
echo "3.14 => " . $converter->toWords(3.14) . PHP_EOL;
echo PHP_EOL;

// Currency examples
echo "Currency Examples:" . PHP_EOL;
echo "100.00 => " . $converter->toCurrency(100.00) . PHP_EOL;
echo "1,250.75 => " . $converter->toCurrency(1250.75) . PHP_EOL;
echo "0.50 => " . $converter->toCurrency(0.50) . PHP_EOL;
echo PHP_EOL;

// Custom currency symbol
echo "Custom Currency Symbol:" . PHP_EOL;
echo "100 (USD) => " . $converter->toCurrency(100, '$') . PHP_EOL;
echo "500 (LKR) => " . $converter->toCurrency(500, 'LKR') . PHP_EOL;
