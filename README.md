# FcPhp Datasource

Abstract class to Datasource FcPhp

[![Build Status](https://travis-ci.org/00F100/fcphp-datasource.svg?branch=master)](https://travis-ci.org/00F100/fcphp-datasource) [![codecov](https://codecov.io/gh/00F100/fcphp-datasource/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/fcphp-datasource)

[![PHP Version](https://img.shields.io/packagist/php-v/00f100/fcphp-datasource.svg)](https://packagist.org/packages/00F100/fcphp-datasource) [![Packagist Version](https://img.shields.io/packagist/v/00f100/fcphp-datasource.svg)](https://packagist.org/packages/00F100/fcphp-datasource) [![Total Downloads](https://poser.pugx.org/00F100/fcphp-datasource/downloads)](https://packagist.org/packages/00F100/fcphp-datasource)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-datasource
```

or add in composer.json
```json
{
    "require": {
        "00f100/fcphp-datasource": "*"
    }
}
```

## How to use

This class is abstract. Have methods default to connect, disconnect, execute Query and get Strategy to use in Query.

See:

- [Datasource Integration Test](tests/Integration/DatasourceIntegrationTest.php)
- [Datasource Interface](src/Interfaces/IDatasource.php)
- [Query Interface](src/Interfaces/IQuery.php)
- [Strategy Interface](src/Interfaces/IStrategy.php)