<?php

$action = htmlspecialchars($_POST['action']);
$value1 = htmlspecialchars($_POST['value1']);
$value2 = htmlspecialchars($_POST['value2']);

$response = [];

$input = new Input();
if (in_array($action, ['sum', 'difference', 'product', 'quotient'])) {
    $input->check($value1, ['float']);
    $input->check($value2, ['float']);

    if ('quotient' === $action) {
        $input->check($value2, ['nonzero']);
    }
}

if ('factorial' === $action) {
    $input->check($value1, ['integer', 'positive']);
}

$errors = $input->getErrors();
if (!empty($errors)) {
    $response['errors'] = $errors;
} else {
    try {
        $calculator = new Calculator();
        $values = array_filter([$value1, $value2]);
        $response['result'] = $calculator->$action(...$values);
    } catch (InvalidArgumentException $e) {
        $response['errors'][] = $e->getMessage();
    }
}

header('Content-type', 'application/json; charset=utf-8');
echo json_encode(
    $response,
    JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE
);
