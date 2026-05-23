# AGENTS.md — number-to-sinhala-words

> Agent-focused guidance for the `dulithaks/number-to-sinhala-words` Laravel package.

## Project Overview

A Laravel library that converts integers and floats into Sinhala (Sri Lankan) words and currency phrases. It ships with a service provider, facade, and a standalone `SinhalaConverter` class.

- **Namespace:** `Dulithaks\NumberToSinhalaWords\`
- **Entry class:** `SinhalaConverter`
- **Laravel integration:** `NumberToSinhalaWordsServiceProvider` + `NumberToSinhalaWords` facade
- **PHP support:** `^7.4|^8.0|^8.1|^8.2|^8.3`
- **Laravel support:** `^6.0|^7.0|^8.0|^9.0|^10.0|^11.0|^12.0`

## Directory Structure

```
src/
├── SinhalaConverter.php                        # Core converter logic
├── NumberToSinhalaWordsServiceProvider.php     # Laravel service provider
├── Facades/
│   └── NumberToSinhalaWords.php              # Laravel facade
└── Exceptions/
    ├── NegativeNumberException.php             # InvalidArgumentException
    └── NumberOutOfRangeException.php           # Exception

tests/
├── BasicTest.php
├── Num1To99Test.php
├── Num100To999Test.php
├── Num1000To9999Test.php
├── Num10000To99999Test.php
├── Num100000To10000000Test.php
└── RangeValidationTest.php
```

## Coding Conventions

- PSR-4 autoloading; namespace matches directory exactly.
- PHP files use `<?php` on line 1, then namespace, then `use` imports.
- Class names are `PascalCase`; methods are `camelCase`.
- Properties for lookup tables are `private static` arrays (e.g. `$ones`, `$tens`, `$hundreds`).
- Doc blocks follow Laravel-style PHPDoc (`@param`, `@return`).
- When adding new lookup tables, mirror the existing pattern: `private static $tableName = [ ... ];`

## Architecture & Key Rules

### `SinhalaConverter`

- `toWords($number, $isCompound = false)` is the main conversion entry point.
  - Supported range: `1` to `9,999,999` inclusive.
  - `0` throws `NumberOutOfRangeException`.
  - Negative values throw `NegativeNumberException`.
  - Floats are split on `.` and rendered as `දශම` followed by each digit in Sinhala.
- `toCurrency($amount, $currency = 'රු.')` formats money.
  - Zero rupees & zero cents returns `'-'`.
  - Zero rupees with non-zero cents returns only `'සත ...'`, **no currency symbol**.
  - Cents are spelled with `toWords()` and prefixed by `සත`.
  - For non-zero rupees the pattern is: `{symbol} {words}යි සත {cents}`.

### Lookup Tables

The converter relies on static lookup arrays. **Do not mutate existing Sinhala strings** unless the test suite is updated simultaneously—the tests assert exact Sinhala output.

| Table | Purpose |
|---|---|
| `$ones` | Digits `0-9` |
| `$tens` | Exact tens `10,20,…,90` |
| `$compoundTens` | Tens prefix for compounds `21-99` (e.g. `විසි`) |
| `$teens` | `11-19` |
| `$hundreds` | Exact hundreds `100,200,…,900` |
| `$hundredPrefixes` | Short hundred forms used in compounds `101-999` (e.g. `එකසිය`) |
| `$thousands` | Exact thousands `1000,2000,…,9000` |
| `$thousandsPlural` | Prefix forms when a remainder exists `1001,2001,…` (e.g. `එක්දහස්`) |

There are also private helper methods with *context-specific* Sinhala forms for thousands/lakhs:
- `convertUnderHundred($number, $isCompound)`
- `convertTensRange($number)` — for thousand-multiplier contexts (adds `ක්` suffixes).
- `convertTensRangeExact($number)` — for ten-thousand contexts (special one-forms like `එක්`, `දෙ`, `තුන්` without `ක්`).

### Language Nuances to Preserve

1. **Compound spacing:**
   - Standalone compounds (`21`, `32`, `44`) are **concatenated without spaces** (e.g. `විසිඑක`).
   - When a compound appears inside a larger number (`121`, `1021`, `2512`) a **space** separates the parts (e.g. `එකසිය විසිඑක`, `දෙදහස් පන්සිය දොළහ`).
2. **Hundred forms:**
   - Exact hundreds (`100`, `200`) use the long form (`සියය`, `දෙසීය`).
   - Compound hundreds (`101`, `250`) use the short prefix (`එකසිය`, `පන්සිය`) followed by the remainder.
3. **Thousand-context spelling:**
   - `100` inside a thousand compound must use `එකසීය` (not `සියය`).
   - `700` inside a thousand compound must use `හතසීය` (not `හත්සීය`).
4. **Lakhs:**
   - `100,000` exact → `ලක්ෂය`.
   - `100,001+` → `එක්ලක්ෂ ...`.
   - `200,000-900,000` exact → concatenated `දෙලක්ෂය`.
   - `1,000,000` exact → `දශලක්ෂය`.
5. **Crores:**
   - `10,000,000` exact → `කෝටිය`.
   - `100,000,000` exact → `දස කෝටිය`.

## Testing

- **Framework:** PHPUnit (`^9.0|^10.0`)
- **Command:** `vendor/bin/phpunit` (or `composer test` if defined)
- **Structure:** Tests are grouped by numeric range and assert exact Sinhala strings.
- **Rule:** Any change to Sinhala output **must** update the corresponding test assertion. The tests are the source of truth for correctness.

## Adding Features

- If adding a new public method, expose it through the facade and add a corresponding test in `tests/`.
- If extending the numeric range, add a new range test file and update `RangeValidationTest`.
- If adding a new exception, place it in `src/Exceptions/` and extend either `InvalidArgumentException` or `Exception` following the existing style.

## Build / Release

There is no build step for this pure-PHP package. Before release:
1. Run the full PHPUnit suite.
2. Ensure `composer.json` version/require constraints are updated if needed.
3. Tag releases with SemVer.
