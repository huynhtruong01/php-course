<?php
$array1 = ['name' => 'Alice', 'age' => 21, 'major' => 'IT'];
$array2 = ['name' => 'Alice', 'age' => 20, 'gender' => 'Female'];

$numbers1 = [1, 2, 3, 4];
$numbers2 = [1, 2, 5, 6, 9];

echo json_encode(array_search('1', $numbers1, true));

?>