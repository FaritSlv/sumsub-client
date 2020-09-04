sumsub-client
===============

[![Build Status](https://travis-ci.org/alexeevdv/sumsub-client.svg?branch=develop)](https://travis-ci.org/alexeevdv/sumsub-client) 
[![codecov](https://codecov.io/gh/alexeevdv/sumsub-client/branch/develop/graph/badge.svg)](https://codecov.io/gh/alexeevdv/sumsub-client)
![PHP 7.1](https://img.shields.io/badge/PHP-7.1-green.svg) 
![PHP 7.2](https://img.shields.io/badge/PHP-7.2-green.svg)
![PHP 7.3](https://img.shields.io/badge/PHP-7.3-green.svg)
![PHP 7.4](https://img.shields.io/badge/PHP-7.4-green.svg)

API client for sumsub.com

## Installation

```shell script
composer require alexeevdv/sumsub-client
```

## Client configuration

Client works with any [PSR-18 compatible HTTP client](https://packagist.org/providers/psr/http-client-implementation) and require [PSR-17 HTTP factory](https://packagist.org/providers/psr/http-factory-implementation).

```php
use alexeevdv\SumSub\Client;
use alexeevdv\SumSub\Request\RequestSigner;

$requestSigner = new RequestSigner('Your APP token', 'Your secret');

$client = new Client(
    $psr18HttpClient,
    $psr17HttpFactory,
    $requestSigner
);
```

## Getting SDKs access token

```php
use alexeevdv\SumSub\Request\AccessTokenRequest;

$externalUserId = 'some-id';
$ttlInSeconds = 3600;
$response = $client->getAccessToken(new AccessTokenRequest($externalUserId, $ttlInSeconds));
$accessToken = $response->getToken();
```

## Getting applicant data by applicant id

```php
use alexeevdv\SumSub\Request\ApplicantDataRequest;

$applicantId = 'some-id';
$response = $client->getApplicantData(new ApplicantDataRequest($applicantId));
$applicantData = $response->asArray();
```

## Getting applicant data by external user id

```php
use alexeevdv\SumSub\Request\ApplicantDataRequest;

$externalUserId = 'some-id';
$response = $client->getApplicantData(new ApplicantDataRequest(null, $externalUserId));
$applicantData = $response->asArray();
```
