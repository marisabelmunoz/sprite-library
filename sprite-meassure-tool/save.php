<?php
// Overwrites sprite-objects.txt with whatever text the page POSTs.
// Upload this file into the SAME folder as sprite-size-tool.html.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('POST only');
}

$body = file_get_contents('php://input');
$ok = file_put_contents(__DIR__ . '/sprite-objects.txt', $body);

if ($ok === false) {
    http_response_code(500);
    exit('could not write file — check folder permissions');
}

echo 'saved';