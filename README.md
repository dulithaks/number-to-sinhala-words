# Number to Sinhala Words

Convert numbers to Sinhala words in Laravel.

## Installation

Install the package via Composer:

```bash
composer require dulithaks/number-to-sinhala-words
```

The service provider will be automatically registered in Laravel 6.0+.

For older Laravel versions (below 6.0), add the service provider to your `config/app.php`:

```php
'providers' => [
    // ...
    Dulithaks\NumberToSinhalaWords\NumberToSinhalaWordsServiceProvider::class,
],
```

Optionally, add the facade:

```php
'aliases' => [
    // ...
    'NumberToSinhalaWords' => Dulithaks\NumberToSinhalaWords\Facades\NumberToSinhalaWords::class,
],
```

## Usage

### Using the Facade

```php
use NumberToSinhalaWords;

// Convert number to Sinhala words
echo NumberToSinhalaWords::toWords(123);
// Output: එක සියය විස්ස තුන

// Convert currency to Sinhala words
echo NumberToSinhalaWords::toCurrency(1234.56);
// Output: රු. එක දහස දෙක සියය තිහ හතර සහ සත පනස හය
```

### Using Dependency Injection

```php
use Dulithaks\NumberToSinhalaWords\SinhalaConverter;

class YourController extends Controller
{
    protected $converter;

    public function __construct(SinhalaConverter $converter)
    {
        $this->converter = $converter;
    }

    public function index()
    {
        $words = $this->converter->toWords(456);
        $currency = $this->converter->toCurrency(789.50);
    }
}
```

### Direct Instantiation

```php
use Dulithaks\NumberToSinhalaWords\SinhalaConverter;

$converter = new SinhalaConverter();

// Convert numbers
echo $converter->toWords(100);
// Output: එක සියය

// Convert currency with default symbol (රු.)
echo $converter->toCurrency(250.75);
// Output: රු. දෙක සියය පනස සහ සත හැත්තෑව පහ

// Convert currency with custom symbol
echo $converter->toCurrency(250.75, '$.');
// Output: $. දෙක සියය පනස සහ සත හැත්තෑව පහ
```

## Methods

### `toWords($number)`

Convert a number to Sinhala words.

**Parameters:**

- `$number` (int|float): The number to convert

**Returns:** (string) The number in Sinhala words

**Examples:**

```php
$converter->toWords(1);        // එක
$converter->toWords(10);       // දහය
$converter->toWords(100);      // එක සියය
$converter->toWords(1000);     // එක දහස
$converter->toWords(100000);   // එක ලක්ෂ
$converter->toWords(1000000);  // දශලක්ෂය
$converter->toWords(10000000); // එක කෝටි
// Negative inputs are not supported and will throw \Dulithaks\NumberToSinhalaWords\Exceptions\NegativeNumberException
$converter->toWords(12.34);    // දොළහ දශම තුන හතර
```

### `toCurrency($amount, $currency = 'රු.')`

Convert a currency amount to Sinhala words.

**Parameters:**

- `$amount` (float): The amount to convert
- `$currency` (string, optional): The currency symbol (default: 'රු.')

**Returns:** (string) The amount in Sinhala words with currency

**Examples:**

```php
$converter->toCurrency(100);           // රු. එක සියය
$converter->toCurrency(100.50);        // රු. එක සියය සහ සත පනස
$converter->toCurrency(100, '$.');     // $. එක සියය
$converter->toCurrency(-50.25);        // throws \Dulithaks\NumberToSinhalaWords\Exceptions\NegativeNumberException
```

## Supported Number Ranges

- **Working range:** `0` to `10,000,000` (inclusive)
- **Decimals:** Supported
- **Negative numbers:** Not supported — passing a negative value will throw \Dulithaks\NumberToSinhalaWords\Exceptions\NegativeNumberException

## Exception Handling

The package throws a custom `NegativeNumberException` when you pass a negative number:

```php
use Dulithaks\NumberToSinhalaWords\SinhalaConverter;
use Dulithaks\NumberToSinhalaWords\Exceptions\NegativeNumberException;

$converter = new SinhalaConverter();

try {
    echo $converter->toWords(-100);
} catch (NegativeNumberException $e) {
    echo "Error: " . $e->getMessage();
    // Output: Error: Negative numbers are not supported.
}

try {
    echo $converter->toCurrency(-50.25);
} catch (NegativeNumberException $e) {
    echo "Error: " . $e->getMessage();
    // Output: Error: Negative currency amounts are not supported.
}
```

Using the facade:

```php
use NumberToSinhalaWords;
use Dulithaks\NumberToSinhalaWords\Exceptions\NegativeNumberException;

try {
    echo NumberToSinhalaWords::toWords(-5);
} catch (NegativeNumberException $e) {
    echo "Please enter a positive number.";
}
```

## Testing

Run the tests with:

```bash
composer test
```

Or using PHPUnit directly:

```bash
vendor/bin/phpunit
```

## License

MIT License

## References

- https://en.wikibooks.org/wiki/Sinhala/1.10
