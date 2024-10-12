### Match Expression

- **Match Expression**: Là 1 tính năng mới trong **PHP 8+⬆️**, nó dùng để thay thế cho `switch...case`, làm cho syntax ngắn gọn hơn, dễ đọc hơn.

- **Match Expression** sẽ check value dạng strict (`Chế độ nghiêm ngăt`), nó sẽ dùng `===` để check value.

- **Match Expression** sẽ `return value luôn`.

```php
<?php

$platformId = 9;

$platformName = match ($platformId) {
    1 => 'Lazada',
    3 => 'Shopee',
    9 => 'Tiktok',
    default => 'Social',
};

echo $platformName; // 'Tiktok'
```

- `Bạn có thể gộp key nếu như các key đó có chung value`.

```php
<?php

$statusCode = 200;

$status = match ($statusCode) {
    200, 201 => 'Success',
    400, 404, 500 => 'Failed',
    default => 'Unknown status',
};

echo $status; // 'Success'
```

- `Nếu bạn truyền không đúng data type trong match thì nó sẽ qua chỗ default`.

```php
<?php

$statusCode = '200';

$status = match ($statusCode) {
    200, 201 => 'Success',
    400, 404, 500 => 'Failed',
    default => 'Unknown status',
};

echo $status; // 'Unknown status'
```
