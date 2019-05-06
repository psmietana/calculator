<?php

$action = Input::escape($_POST['action']);
$value1 = Input::escape($_POST['value1']);
$value2 = Input::escape($_POST['value2']);

if (in_array($action, ['sum', 'difference', 'product', 'quotient'])) {
    Input::check($value1, ['float']);
    Input::check($value2, ['float']);

    if ('quotient' === $action) {
        Input::check($value2, ['nonzero']);
    }
}

if ('factorial' === $action) {
    Input::check($value1, ['integer', 'positive']);
}

$response = [];
$errors = Input::getErrors();
if (empty($errors)) {
    try {
        $calculator = new Calculator();
        $values = array_filter([$value1, $value2]);
        $response['result'] = $calculator->$action(...$values);
    } catch (InvalidArgumentException $e) {
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
