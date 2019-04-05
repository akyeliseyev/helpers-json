JSON CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-json.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-json)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-json.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-json)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-json.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-json/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-json.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-json)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-json)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-json.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-json/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-json.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-json/archive/master.zip)

The helpers allows you to JSON processing. Encode, decode, check error, throw exception - all this is available in this library.

Project repository: https://github.com/cs-eliseev/helpers-json

```php
$json = [
    '{"example": 12345}',   // success
    "{'example': 12345}",   // Syntax error
    '{"example": 12345}',   // success
];

foreach ($json as $item) {
    try {
        Json::decode($item);
        Json::errorToException();
        var_dump('success');
    } catch (CSEHelpersJsonException $e) {
        var_dump($e->getMessage());
    }
}
```

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. JSON CSE HELPERS used method: encode, decode, check error, throw exception.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers project:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-json).

### Composer

Execute the following command to get the latest version of the package:
```bash
composer require cse/helpers-json
```

Or file composer.json should include the following contents:
```json
{
    "require": {
        "cse/helpers-json": "*"
    }
}
```

### Git

Clone this repository locally:
```bash
git clone https://github.com/cs-eliseev/helpers-json.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-json/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-json.php](https://github.com/cs-eliseev/helpers-json/blob/master/examples/examples-json.php).

**Encode**

Example:
```php
Json::encode(['example' => 12345]);
// {"example": 12345}
```

**Pretty Print**

Example:
```php
Json::prettyPrint(['example' => 12345, 'example2' => 56789]);
// {
//    "example": 12345,
//    "example": 56789
// }
```

**Decode**

Example:
```php
Json::encode('{"example": 12345}');
// ['example' => 12345]
```


**Check error last json transform**

Example:
```php
Json::decode('{"example": 12345}');
Json::isNoteError();
// true
Json::decode("{'example': 12345}");
Json::isNoteError();
// false
```

**Error to exception**

Example:
```php
try {
    Json::decode("{'example': 12345}");
    Json::errorToException();
} catch (CSEHelpersJsonException $e) {
    var_dump($e->getMessage());
}
// Syntax error
```

**Set check exception**

Example:
```php
class Default
{
    public function example(): void
    {
        Json::encode('{"example": 12345}');
    }
}

class ExceptionTrue
{
    public function example(): void
    {
        Json::setCheckException();
        Json::encode("{'example': 12345}");
    }
}

class ExceptionFalse
{
    public function example(): void
    {
        Json::setCheckException(false);
        Json::encode("{'example': 12345}");
    }
}

$default = new Default();
$e_true = new ExceptionTrue();
$e_false = new ExceptionFalse();

try {
    $default->example();
} catch (CSEHelpersJsonException $e) {
    var_dump($e->getMessage());
}

try {
    $e_true->example();
} catch (CSEHelpersJsonException $e) {
    var_dump($e->getMessage());
}
// Syntax error

try {
    $default->example();
} catch (CSEHelpersJsonException $e) {
    var_dump($e->getMessage());
}
// Syntax error

try {
    $e_false->example();
} catch (CSEHelpersJsonException $e) {
    var_dump($e->getMessage());
}

try {
    $default->example();
} catch (CSEHelpersJsonException $e) {
    var_dump($e->getMessage());
}
```


## Testing & Code Coverage

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

To run the PHPUnit unit tests, execute:
```bash
phpunit PATH/TO/PROJECT/tests/
```

If you want code coverage reports, use the following:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Used PHPUnit default config:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## License

The CSE HELPERS JSON is open-source PHP library licensed under the MIT license. Please see [License File](https://github.com/cs-eliseev/helpers-json/blob/master/LICENSE.md) for more information.

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)