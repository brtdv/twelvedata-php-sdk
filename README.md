# TwelveData PHP Client

[![Latest Version](https://img.shields.io/github/v/tag/brtdv/twelvedata-php-sdk?label=latest%20release&style=flat)](https://github.com/brtdv/twelvedata-php-sdk/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)

Unofficial PHP SDK for the [TwelveData](https://twelvedata.com) stock API service. This SDK contains methods for easy interaction with the TwelveData API. This SDK is not yet feature complete. This is however the long term goal. Below are some examples and lists of what exactly is implemented at this moment. The implementation of this library is heavily based on the implementation of the [Mailgun SDK](https://github.com/mailgun/mailgun-php).

## Installation

To use this SDK, you'll need to add it to your project using [Composer](https://getcomposer.org/). This SDK is not hard coupled to Guzzle, Buzz, or any other PHP library that sends and receives HTTP messages, and uses [PSR-18](https://www.php-fig.org/psr/psr-18/) abstraction. You can choose your own [PSR-7](https://www.php-fig.org/psr/psr-7/) [implementation](https://packagist.org/providers/psr/http-message-implementation) and [PSR-7](https://www.php-fig.org/psr/psr-7/) [HTTP client](https://packagist.org/providers/psr/http-client-implementation) you want to use.

To get started quickly you can use `symfony/http-client` and `nyholm/psr7`, but feel free to replace these with the implementations of your choice.

```sh
composer require brtdv/twelvedata-php-sdk symfony/http-client nyholm/psr7
```

## Usage

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list off Stock Symbols
$response = $twelveDataApi->referenceData()->stocksList([
    'symbol'   => 'AAPL',
    'interval' => '1min'
]);

// Get the 1min candles for the AAPL symbol
$response = $twelveDataApi->coreData()->timeSeries([
    'symbol'   => 'AAPL',
    'interval' => '1min'
]);
```

You will find more detailed documentation in the [/docs](docs/index.md) folder. For more information about the TwelveData API, check out the [TwelveData API docs](https://twelvedata.com/docs).

## Obtaining an API key

You can obtain an API key by [creating an account on TwelveData.com](https://twelvedata.com/register) and navigating to the ["API Keys" section of the admin console](https://twelvedata.com/account/api-keys).

## What's included? What's missing?

As stated: this SDK implementation is not **yet** feature complete. A lot of API calls are missing at the moment, and additional real-time WebSocket API calls are also not included at this moment. Feel free to contribute any missing API calls through a PR.

## Contribute

Something missing from the SDK? Consider posting a PR with your changes. Feel free to contribute in any way.

## Support and Feedback

This SDK is provided AS IS and is not officially affiliated with TwelveData. For API support, [check out the TwelveData website](https://support.twelvedata.com/en/).
