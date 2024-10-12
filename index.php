<?php

$largeArray = range(1, 20);
$startTime = microtime(true);
$startMemory = memory_get_usage();

$out = [];
foreach($largeArray as &$value) {
    // echo 'VALUE: ' . $value;
    $value = $value * 2;
}

$endTime = microtime(true);
$endMemory = memory_get_usage();

echo 'Time: ' . $endTime - $startTime;
echo '-----';
echo 'Memory: ' . round(($endMemory - $startMemory) / 1024 / 1024);

echo '\n';

foreach($largeArray as $value) {
    echo 'value: ' . $value . '----';
}
?>