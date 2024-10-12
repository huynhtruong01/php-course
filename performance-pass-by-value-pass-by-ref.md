### Performance Khi dùng Pass By Value vs Pass By Reference

- **CÂN NHẮC** khi usage `pass by reference` khi dùng để **optimize performance**.

```php
<?php

$largeArray = range(1, 1_000_000);
$startTime = microtime(true);
$startMemory = memory_get_usage();

$out = [];
foreach($largeArray as &$value) {
    $out[] = $value;
}

$value = null;

$endTime = microtime(true);
$endMemory = memory_get_usage();

echo 'Time: ' . $endTime - $startTime;
echo '-----';
echo 'Memory: ' . round(($endMemory - $startMemory) / 1024 / 1024);
?>
```

- Các lý do `pass by reference` **chậm hơn**, **tốn memory hơn**:

  - `1`. Khi dùng `pass by reference` mà có nhiều item trong array, nó sẽ tạo ra nhiều tham chiếu tới vùng nhớ chứa value đó. `Nếu 1 trong các biến change, các biến khác sẽ change theo`.
  - `2`. `Tốn chi phí quản lý tham chiếu trong memory`. Mọi thay đổi `$value` trong `loop largeArray` sẽ thay đổi value trong `largeArray`. Do khi loop qua, `PHP cần check từng tham chiếu`, cho nên thời gian thực thi sẽ lâu hơn.