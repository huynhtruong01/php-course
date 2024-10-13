## Array

- [Array](#array)
  - [Filter, Map, Sort, Reduce, Keys, Values, Range](#filter-map-sort-reduce-keys-values-range)
  - [Diff, Merge, Intersect, Unpacking, Key Exist, In Array, Implode, Explode, Search, Unique, Slice](#diff-merge-intersect-unpacking-key-exist-in-array-implode-explode-search-unique-slice)

---

### Filter, Map, Sort, Reduce, Keys, Values, Range

1. `Indexed`

- Cách get `key` và `value` trong array.
  - `array_keys`: Dùng để get `keys`.
  - `array_values`: Dùng để get `values`.

- Sài `index` trong array.
  - Nếu `array bình thường`: `array[]`, nó sẽ theo order.
  - Nếu `associate array`: `array['key']`.

2. `range`

- `range`: Dùng để tạo ra 1 mảng trong khoảng nào đó.

> `range(1, 100)`

3. `sort`

- Dùng để `sort` các value trong array.

- Gồm các hàm `sort`:
  - `sort`: Sắp xếp tăng dần (`Không giữ key`)
  - `rsort`: Sắp xếp giảm dần (`Không giữ key`)
  - `asort`: Sắp xếp tăng dần (`Giữ key`)
  - `arsort`: Sắp xếp giảm dần (`Giữ key`)
  - `ksort`: Sắp xếp tăng dần `theo key`
  - `krsort`: Sắp xếp giảm dần `theo key`
  - `usort`: Sắp xếp theo hàm so sánh tùy chỉnh
  - `uasort`: Sắp xếp giá trị theo hàm so sánh tùy chỉnh (`Giữ key`)
  - `uksort`: Sắp xếp key với hàm tùy chỉnh

4. `array_map`

- `array_map`: Dùng để transform data với 1 mảng có sẵn.

> `array_map(callable $callback, array $array1, array ...$arrays): array`

```php
<?php
$numbers = [1, 2, 3, 4, 5];

$result = array_map(function($num) {
    return $num * 2;
}, $numbers);
?>
```

- Hoặc `bạn có thể sử dụng các function có sẵn trong PHP`.

```php
<?php
$names = ["alice", "bob", "charlie"];

$result = array_map('strtoupper', $names); // ['ALICE', 'BOB', 'CHARLIE']
?>
```

- `Dùng cho nhiều mảng`.

```php
<?php
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];

$result = array_map(function($a, $b) {
    return $a + $b;
}, $array1, $array2);
?>
```

- `Nếu muốn dùng` **`array_map`** `cho associative array`, bạn có thể kết hợp `array_map + array_keys`.

```php
$student = [
    'name' => 'Nam',
    'age' => 20,
    'gender' => 'Male',
    'major' => 'IT',
];

$studentFiltered = array_map(function($key, $value) {
    echo "$value - $key\n";
    return $value;
}, array_keys($student), $student);
// Name - name / 20 - age / Male - gender / IT - major 
```

5. **`array_filter`**

- `array_filter`: Dùng để filter các item trong array.

> `array_filter(array $array, ?callable $callback = null, $flag: OPTIONAL): array`
> `flag`: 
>   - `ARRAY_FILTER_USE_KEY`: Dùng để pass `key` trong argument thay vì `value`.
>   - `ARRAY_FILTER_USE_BOTH`: Dùng để pass cả `key` và `value` trong argument như này `function ($value, $key) {}`.

```php
<?php
// 📌 nếu không truyền function vào thì nó sẽ auto filter các falsy
$data = [0, 1, null, 2, "", false, 3];

$result = array_filter($data);

print_r($result);
?>
```

- `Dùng cho associative array`.

```php
<?php
$student = [
    'name' => 'Truong',
    'age' => 21,
    'gender' => 'Male',
];

$result = array_filter($student, function($value, $key) {
    echo "$value-$key\n";
    return $value;
}, ARRAY_FILTER_USE_BOTH);

// Truong-name / 21-age / Male-gender
?>
```

6. `array_reduce`

- Dùng để tích lũy value của các phần tử trong array.

> `array_reduce(array $array, callable $callback, mixed $initial = null): mixed`

```php
<?php
$numbers = [1, 2, 3, 4, 5];

$sum = array_reduce($numbers, function($carry, $item) {
    return $carry + $item;
}, 0);

echo "Sum: $sum";
?>
```

---

### Diff, Merge, Intersect, Unpacking, Key Exist, In Array, Implode, Explode, Search, Unique, Slice

1. `array_intersect`

- `array_intersect`: Dùng để `so sánh 2 hoặc nhiều array` với nhau, nó `return về các item match với nhau`.

```php
<?php

$array1 = [1, 2, 3, 4];
$array2 = [1, 2, 3, 4, 9, 10];

$result = array_intersect($array1, $array2); // ➡️ [1, 2, 3, 4]
```

- **Đối với associative array**, nó chỉ `check match value thôi`, còn `key` **không quan tâm** và `lấy theo key và value của array đẩu tiên khi matched`. Dùng `array_intersect_assoc` để check cả `key-value` luôn, nhưng **không check** `data type của value`.

```php
<?php

$array1 = ['name' => 'Alice', 'age' => 20];
$array2 = ['name-2' => 'Alice', 'age' => 20, 'gender' => 'Female'];

$result = array_intersect($array1, $array2); // { 'name': 'Alice', 'age': 20 }
```

- **Nhưng mà**, `array_intersect` sẽ `không so sánh data type của value`, cho nên **lưu ý** khi dùng nó để `compare value`.

2. `array_diff`

- `array_diff`: Ngược với `array_intersect`, nó sẽ `return các item không matched với nhau`.

> **⚠️Note**: Nó chỉ `so sánh sự khác nhau trên array đầu tiên với các array sau thôi`, **không check** `sự khác nhau giữa các array 2, 3, 4,...`.

```php
<?php

$array1 = [1, 2, 3, 10, 100, 200];
$array2 = [1, 2, 3, 5, 6];
$array3 = [1, 2, 3, 5, 200];

$result = array_diff($array1, $array2, $array3); // ➡️ [10, 100]
```

- **Đối với associate array**, `cũng check dựa trên value`.

```php
<?php

$array1 = ['name' => 'Alice', 'age' => '21', 'major' => 'IT'];
$array2 = ['name' => 'Alice', 'age' => 20, 'gender' => 'Female'];

$result = array_diff($array1, $array2); // ➡️ { 'age': '21', 'major' => 'IT' }
```

3. `array_key_exist`

- `array_key_exist`: Dùng để `check xem key đó nằm trong array không?`. Return `bool`.

```php
<?php

$student = ['name' => 'Nam', 'age' => 20, 'major' => 'IT'];

$isExistMajorKey = array_key_exist('major', $student); // ➡️ true
```

4. `in_array`

- `in_array`: Dùng để `check xem value đó có nằm trong array không?`. Return `bool`.

```php
<?php

$numbers = [1, 2, 3, 4];

$result = in_array(1, $numbers); // ➡️ true
```

- Đối với **associative array**, nó sẽ `check dựa vào value thôi`.

```php
<?php

$array = ['name' => 'Alice', 'age' => 20, 'gender' => 'Female'];

$result = in_array('Alice', $array); // ➡️ true
$result2 = in_array('Bob', $array); // ➡️ false
```

5. `implode, explode`

- `implode`: Dùng để chuyển `array ---> chuỗi`. Đối với **associative array**, nó sẽ `tách dựa trên value`, **không tách key**.
- `explode`: Dùng để chuyển `chuỗi ---> array`.

```php
<?php

$numbers = [1, 2, 3, 4];

$result = implode(', ', $numbers); // ➡️ "1, 2, 3, 4"
$result2 = explode(', ', $result); // ➡️ [1, 2, 3, 4]
```

- **Associative array**

```php
$array1 = ['name' => 'Alice', 'age' => 21, 'major' => 'IT'];

$result = implode(', ', $array1); // ➡️ "Alice, 21, IT"
$result2 = explode(', ', $result); // ➡️ ['Alice', '21', 'IT']
```

6. `array_merge`

- `array_merge`: Dùng để `merge 1 hoặc nhiều array`. `Nếu có key (associative array) trùng lặp thì nó sẽ lấy value ghi đè lên value của key trùng lặp đó`. **Đối array bình thường** thì `vẫn cứ merge vào cho dù trùng lặp value`.

```php
<?php

$numbers1 = [1, 2, 3, 4];
$numbers2 = [1, 2, 5, 6];

echo json_encode(array_merge($numbers1, $numbers2)); // ➡️ [1, 2, 3, 4, 1, 2, 5, 6]
```

- **Đối với associative array**, khi key trùng nhau thì `sẽ lấy value của key sau ghi đè value của key trước`.

```php
<?php

$array1 = ['name' => 'Alice', 'age' => 21, 'major' => 'IT'];
$array2 = ['name' => 'Alice', 'age' => 20, 'gender' => 'Female'];

echo json_encode(array_merge($array1, $array2)); // { 'name' => 'Alice', 'age' => 21, 'major' => 'IT', 'gender' => 'Female' }
```

7. `array_unique`

- `array_unique`: Dùng để `loại bỏ các value bị trùng lặp`.

```php
<?php

$numbers1 = [1, 2, 3, 4];
$numbers2 = [1, 2, 5, 6, 9];

$result = array_unique([...$numbers1, ...$numbers2]); // ➡️ [1, 2, 3, 4, 6, 9]
```

8. `array_slice`

- `array_slice`: Dùng để `tạo thành array khi lấy trong khoảng a - b từ array ban đầu`.

> `array_slice(array $array, int $offset: (Dương, Âm), ?int $length = null (Default: cuối mảng), bool $preserve_keys = false): array`

```php
<?php

$numbers = [1, 2, 5, 6, 9];

$result = json_encode(array_slice($numbers, 1, 3)); // [2, 5, 6]
```

- **Đối với associative array**, `nó sẽ cắt như array bình thường`.

```php
<?php

$array = ['name' => 'Alice', 'age' => 21, 'major' => 'IT'];

$result = array_slice($array, 1); // ➡️ { 'age': 21, 'major': 'IT' }
```

9. `array_search`

- `array_search`: Dùng để `tìm 1 item trong array`, nếu **không tìm thấy** trả về `false`. Nếu là `associative array`, `tìm theo value của nó`.

- Return **key của item trong array**.

> `array_search(value, array, strict)`

```php
<?php

$numbers = [1, 2, 3, 4];
$result = array_search(1, $numbers); // ➡️ 0

// 📌 check with strict
$result2 = array_search('1', $numbers); // ➡️ false
```

- **Đối với associative array**, nó sẽ `return key của value đó`.

```php
<?php

$array = ['name' => 'Alice', 'age' => 21, 'major' => 'IT'];
$result = array_search('Alice', $array); // ➡️ 'name'
```
