<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Exceptions\CSEHelpersJsonException;
use cse\helpers\Json;

// Example: encode
// ['example' => 12345] => {"example": 12345}
var_dump(Json::encode(['example' => 12345]));
echo PHP_EOL;

// Example: petty print
// ["example" => 12345, "example2" => 56789] => {"example": 12345, "example": 56789}
var_dump(Json::prettyPrint(['example' => 12345, 'example2' => 56789]));
echo PHP_EOL;

// Example: decode
// {"example": 12345} => ["example" => 12345]
var_dump(Json::decode('{"example": 12345}'));
echo PHP_EOL;

// Example: error to exception
$json = [
    '{"example": 12345}',   // success
    "{'example': 12345}",   // Syntax error
    '{"example": 12345}',   // success
];

// Example: is not error
foreach ($json as $string) {
    Json::decode($string);
    var_dump(Json::isNoteError());
}
echo PHP_EOL;

// Example: get error msg
foreach ($json as $string) {
    Json::decode($string);
    var_dump(Json::getErrorMsg('(json)'));
}
echo PHP_EOL;

// Example: error to exception
foreach ($json as $string) {
    try {
        Json::decode($string);
        Json::errorToException();
        var_dump('success');
    } catch (CSEHelpersJsonException $e) {
        var_dump($e->getMessage());
    }
}
echo PHP_EOL;

// Exception set check exception
Json::setCheckException();
foreach ($json as $string) {
    try {
        Json::decode($string);
        var_dump('success');
    } catch (CSEHelpersJsonException $e) {
        var_dump($e->getMessage());
    }
}
echo PHP_EOL;