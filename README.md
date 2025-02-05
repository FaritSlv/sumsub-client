sumsub-client
===============

![PHP 7.1](https://img.shields.io/badge/PHP-7.1-green.svg) 
![PHP 7.2](https://img.shields.io/badge/PHP-7.2-green.svg)
![PHP 7.3](https://img.shields.io/badge/PHP-7.3-green.svg)
![PHP 7.4](https://img.shields.io/badge/PHP-7.4-green.svg)
![PHP 8.0](https://img.shields.io/badge/PHP-8.0-green.svg)
![PHP 8.1](https://img.shields.io/badge/PHP-8.1-green.svg)

API client for cyberity.ru (sumsub.com)

## Installation

```shell script
composer require farit-slv/sumsub-client
```

## Client configuration

Client works with any [PSR-18 compatible HTTP client](https://packagist.org/providers/psr/http-client-implementation) and require [PSR-17 HTTP factory](https://packagist.org/providers/psr/http-factory-implementation).

```php
use FaritSlv\SumSub\Client;
use FaritSlv\SumSub\Request\RequestSigner;

$requestSigner = new RequestSigner('Your APP token', 'Your secret');

$client = new Client(
    $psr18HttpClient,
    $psr17HttpFactory,
    $requestSigner
);
```

## Getting SDKs access token

```php
use FaritSlv\SumSub\Request\AccessTokenRequest;

$externalUserId = 'some-id';
$levelName = 'some-level';
$ttlInSeconds = 3600;
$response = $client->getAccessToken(new AccessTokenRequest($externalUserId, $levelName, $ttlInSeconds));
$accessToken = $response->getToken();
```

## Getting applicant data by applicant id

```php
use FaritSlv\SumSub\Request\ApplicantDataRequest;

$applicantId = 'some-id';
$response = $client->getApplicantData(new ApplicantDataRequest($applicantId));
$applicantData = $response->asArray();
```

## Getting applicant data by external user id

```php
use FaritSlv\SumSub\Request\ApplicantDataRequest;

$externalUserId = 'some-id';
$response = $client->getApplicantData(new ApplicantDataRequest(null, $externalUserId));
$applicantData = $response->asArray();
```

## Resetting an applicant

```php
use FaritSlv\SumSub\Request\ApplicantRequest;

$applicantId = 'some-id';
$client->resetApplicant(new ApplicantRequest($applicantId));
```

## Getting applicant status

```php
use FaritSlv\SumSub\Request\ApplicantRequest;

$applicantId = 'some-id';
$response = $client->getApplicantStatus(new ApplicantRequest($applicantId));
$applicantStatus = $response->asArray();
```

## Getting document images

```php
use FaritSlv\SumSub\Request\DocumentImageRequest;

$inspectionId = 'some-id';
$imageId = '123';
$response = $client->getDocumentImages(new DocumentImageRequest($inspectionId, $imageId));
$stream = $response->asStream();
$contentType = $response->getContentType();
```

## Getting inspection checks

```php
use FaritSlv\SumSub\Request\InspectionChecksRequest;

$inspectionId = 'some-id';
$response = $client->getInspectionChecks(new InspectionChecksRequest($inspectionId));
$checksData = $response->asArray();
```
