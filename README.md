# Nepali Phone Validation

A Laravel package for validating **Nepalese mobile phone numbers** using custom validation rules.

## Installation

You can install the package via Composer:

```bash
composer require sushantaryal/nepali-phone-validation
```

## Usage

```php
use Sushant\NepaliPhoneValidation\Rules\NepaliPhone;

$request->validate([
    'phone' => ['required', new NepaliPhone()],
]);
```

## Supported Prefixes

```
984, 985, 986, 980, 981, 982, 961, 988, 972
```

## License

[MIT license](LICENSE.md).
