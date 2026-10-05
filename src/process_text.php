<?php
require_once 'AffineCipher.php';

$resultText = "";
$alertMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['inputText'] ?? '';
    $a = (int)($_POST['keyA'] ?? 5);
    $b = (int)($_POST['keyB'] ?? 8);
    $format = $_POST['formatOutput'] ?? 'normal';
    $isEncrypt = ($_POST['action'] ?? 'encrypt') === 'encrypt';

    $cipher = new AffineCipher();
    $response = $cipher->processText($text, $a, $b, $isEncrypt, $format);

    if (isset($response['error'])) {
        $alertMsg = $response['error'];
    } else {
        $resultText = $response['success'];
    }
}
?>