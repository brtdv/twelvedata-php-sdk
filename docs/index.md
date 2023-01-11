# TwelveData PHP Client Documentation

The documentation for this PHP SDK is still very limited, but on this page you'll find some examples of the implemented API calls of the SDK. For an overview of all API call parameters, check out the [TwelveData official documentation](https://twelvedata.com/docs).

## Get a list of available stocks

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list of Stock Symbols
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#stocks-list
$response = $twelveDataApi->referenceData()->stocksList([
    'exchange' => 'NASDAQ', // Optional
]);

$apiStatus = $response->getStatus(); // TwelveData\Models\Status::OK or TwelveData\Models\Status::ERROR
$stocks = $response->getData(); // array of stock symbols (TwelveData\Models\Stocks\Stock)

foreach ($stocks as $stock) {
    echo $stock->getSymbol(); // AAPL
    echo $stock->getCurrency(); // USD
    // ... For more properties see:
    // Model file: TwelveData\Models\Stocks\Stock or
    // API Documentation: https://twelvedata.com/docs#stocks-list
}

```

## Get a list of available forex pairs

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list of Forex Pairs
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#forex-pairs-list
$response = $twelveDataApi->referenceData()->forexPairs([
    'currency_base' => 'USD',
]);

// ... or calling the list without parameters is possible as well
$response = $twelveDataApi->referenceData()->forexPairs();

$apiStatus = $response->getStatus(); // TwelveData\Models\Status::OK or TwelveData\Models\Status::ERROR
$forexPairs = $response->getData(); // array of forex pairs (TwelveData\Models\CryptoCurrencies\CryptoCurrency)

foreach ($forexPairs as $forexPair) {
    echo $forexPair->getSymbol();
    // ... For more properties see:
    // Model file: TwelveData\Models\ForexPairs\ForexPair or
    // API Documentation: https://twelvedata.com/docs#forex-pairs-list
}
```

## Get a list of available crypto currencies

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list of Crypto Currencies
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#cryptocurrencies-list
$response = $twelveDataApi->referenceData()->cryptoCurrencies();

$apiStatus = $response->getStatus(); // TwelveData\Models\Status::OK or TwelveData\Models\Status::ERROR
$cryptoCurrencies = $response->getData(); // array of crypto currencies (TwelveData\Models\CryptoCurrencies\CryptoCurrency)

foreach ($cryptoCurrencies as $forexPair) {
    echo $forexPair->getSymbol();
    // ... Fore more properties see:
    // Model file: TwelveData\Models\CryptoCurrencies\CryptoCurrency or
    // API Documentation: https://twelvedata.com/docs#cryptocurrencies-list
}
```

## Exchanges list

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list of Exchanges
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#exchanges
$response = $twelveDataApi->referenceData()->exchanges();

$apiStatus = $response->getStatus(); // TwelveData\Models\Status::OK or TwelveData\Models\Status::ERROR
$exchanges = $response->getData(); // array of forex pairs (TwelveData\Models\Exchanges\Exchange)

foreach ($exchanges as $exchange) {
    echo $exchange->getName(); // NASDAQ
    echo $exchange->getTimeZone()->getName(); // America/New York
    // ... Fore more properties see:
    // Model file: TwelveData\Models\Exchanges\Exchange or
    // API Documentation: https://twelvedata.com/docs#exchanges
}
```

## Symbol search

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list of symbols while searching for the value of provided parameter "symbol"
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#symbol-search
$response = $twelveDataApi->referenceData()->symbolSearch([
    'symbol' => 'A' // The 'symbol' parameter is required for this API call
]);

$apiStatus = $response->getStatus(); // TwelveData\Models\Status::OK or TwelveData\Models\Status::ERROR
$symbols = $response->getData(); // array of forex pairs (TwelveData\Models\SymbolSearch\Symbol)

foreach ($symbols as $symbol) {
    echo $symbol->getSymbol(); // AAPL
    echo $symbol->getCurrency(); // USD
    // ... Fore more properties see:
    // Model file: TwelveData\Models\SymbolSearch\Symbol or
    // API Documentation: https://twelvedata.com/docs#symbol-search
}
```

## Get time series candles of a certain symbol

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a series of candles
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#symbol-search
$response = $twelveDataApi->coreData()->timeSeries([
    'symbol'   => 'AAPL'  // The 'symbol' parameter is required for this API call
    'interval' => '1h'    // The 'interval' parameter is required for this API call
]);

$apiStatus = $response->getStatus(); // TwelveData\Models\Status::OK or TwelveData\Models\Status::ERROR
$candles = $response->getValues(); // array of timeseries candles (TwelveData\Models\TimeSeries\TimeSeries)

foreach ($candles as $candle) {
    echo $candle->getOpen(); // 148.44000
    echo $candle->getLow(); // 146.26500
    // ...
}
```

## Get a symbol quote

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list of symbols be searching for the value of provided parameter "symbol"
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#symbol-search
$response = $twelveDataApi->coreData()->quote([
    'symbol' => 'AAPL' // The 'symbol' parameter is required for this API call
]);

// This response does not return a 'status' field
$quote = $response->getData(); // A quote object (TwelveData\Models\Quote\Quote)

echo $quote->getSymbol(); // AAPL
echo $quote->getOpen(); // 148.44000
```

## Get a symbol real-time price

```php
use Brtdv\TwelveData\TwelveData;

// Initialize a TwelveData API instance
$twelveDataApi = TwelveData::create('<your api key here>');

// Get a list of symbols be searching for the value of provided parameter "symbol"
// For more information about all possible API parameters, check out:
// https://twelvedata.com/docs#symbol-search
$response = $twelveDataApi->coreData()->realTimePrice([
    'symbol' => 'AAPL' // The 'symbol' parameter is required for this API call
]);

// This response does not return a 'status' field
$realTimePrice = $response->getData(); // A RealTimePrice object (TwelveData\Models\RealTimePrice\RealTimePrice)

echo $realTimePrice->getPrice(); // 148.44000
```

