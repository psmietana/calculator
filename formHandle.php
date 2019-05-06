<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'autoload.php';

use Components\Input\Input;
use Components\Calculator\Calculator;

$action = Input::escape($_POST['action']);
$value1 = Input::escape($_POST['value1']);
$value2 = Input::escape($_POST['value2']);

Input::check($action, ['nonEmpty', 'allowedAction']);

if (in_array($action, ['sum', 'difference', 'product', 'quotient'])) {
    Input::check($value1, ['numeric']);
    Input::check($value2, ['numeric']);

    if ('quotient' === $action) {
        Input::check($value2, ['nonZero']);
    }
    $value1 = floatval($value1);
    $value2 = floatval($value2);
}

if ('factorial' === $action) {
    Input::check($value1, ['integer', 'nonNegative']);
    $value1 = (int) $value1;
    $value2 = null;
}

$response = [];
$errors = Input::getErrors();
if (empty($errors)) {
    try {
        $calculator = new Calculator();
        $values = array_filter([$value1, $value2]);
        $response['result'] = $calculator->$action(...$values);
    } catch (\InvalidArgumentException $e) {
        $response['errors'][] = $e->getMessage();
    }
} else {
    $response['errors'] = $errors;
}

header('Content-type', 'application/json; charset=utf-8');
echo json_encode(
    $response,
    JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE
);
