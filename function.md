### `Function`

1. **`Variadic Function`**

- Giống như bạn dùng `spread` bên **JS**. tức là sử dụng `(...)` để `phân rã các parameter` và `convert về thành 1 array` của 1 function.

- Bạn có thể thêm bao nhiêu parameter, unlimited.

```php
<?php
function sumNumbers (int ...$nums) {
    return array_sum($nums);
}
?>
```

- Bạn có thể truyền parameter đầu tiên trước `spread parameter`:

```php
<?php
function showInfo (string $isOtherGender, int ...$infos) {
    if($isOtherGender) return '';

    $peopleInfo = '';
    foreach($infos as $info) {
        $peopleInfo + $info;
    }

    return $peopleInfo;
}
?>
```

2. **`Name Argument`**

- Có nghĩa là bạn có thể lấy `name của argument và assign giá trị cho nó`, điều này sẽ giúp bạn có thể flexible trong việc chọn name nào assign với value nào, `không cần theo đúng thứ tự argument`.

```php
<?php
  function sumNumber($a, $b) {
    return $a + $b;
  }

  sumNumber(b: 2, a: 10); // 12, but a: 10, b: 2
?>
```

3. **`Global Variable`**

- Trong function, bạn không thể access những variable bên ngoài, bởi vì function là `local scope` và chỉ sử dụng những variable bên trong nó.

- Để có thể access được, bạn có thể dùng **global** keyword để access `outside variable`.

```php
<?php
$x = 20;

function addNumber() {
  $array_numbers = [];
  echo $x; // ❌❌ $x undefined
  array_push($array_numbers, $x); // ❌❌ because $x undefined, so can't push item
  echo $array_number; // ❌❌ don't return anything, because $array_number empty 
}

addNumber();
?>
```

4. **`Static Variable`**

- **Static variable**: có thể giúp những variable có thể giữ lại value giữa các lấn gọi function với cùng name variable.

```php
<?php
  function showNumber() {
    static $a = 0;
    return $a++;
  }

  echo showNumber() . "<br />"; // 0
  echo showNumber() . "<br />"; // 1
  echo showNumber() . "<br />"; // 2
?>
```

- Nếu chúng ta không dùng **static**, **PHP** sẽ `destroy` những variable trong function sau khi `function finish running`.

```php
<?php
  function showNumber() {
    $a = 1;
    return $a++;
  }

  echo showNumber() . "<br />"; // 1
  echo showNumber() . "<br />"; // 1
  echo showNumber() . "<br />"; // 1
?>
```

5. **`Anonymous & Arrow Function`**

- **Anonymous Function**

```php
<?php
  $multiply = function($numb) {
    return $numb;
  }
?>
```

Nếu bạn muốn access những variable ở ngoài, bạn có thể dùng **"use"**. Dùng để mở rộng phạm vi của `anonymous function` (`closure`).

```php
$multiplier = 100;

$multiply = function ($numb) use($multiplier) {
  return $numb * $multiplier;
}

$multiply(12); // 1200
```

- **Arrow function**

```php
<?php
  $multiply = fn($num) => $num * 2;

  $multiply();
?>
```

**⚠️ Note**:

> **Arrow function** có thể `access` outside variable mà không cần **"use"**.

> **Arrow function** không thể dùng `=> { ... }` như này được, nó chỉ được dùng khi mà bạn viết `concise expression` (ngắn). **Nó không support multi statement**.

6. **`Callable Type`**

- **Callable Type**: là 1 type dùng để require argument là `1 function` để **reference** tới `1 function`:
  - `Function`
  - `Arrow Function`
  - `Anonymous Function`
  - `String contain the name of function`
  - `Array -> Static Class Method`
  - `Array -> Object Method`

- **Function**:

```php
<?php
  // function
  function sum($a, $b) {
    return $a + $b;
  }

  // anonymous function
  $sum = function($a, $b) {
    return $a + $b;
  }

  // anonymous function
  function addNumber($a, $b) {
    return $a + $b;
  }

  function multiply(callable $callback, $num1, $num2) {
    return $callback($num1, $num2) * 2;
  }

  multiply(sum, 2, 3); // 12
  multiply($sum, 2, 3); // 12
  multiply('addNumber', 2, 3); // 12
  multiply(fn($a, $b) => $a + $b, 2, 3); // 12
?>
```

7. **`Reference`**

- Tức là bạn có thể `làm thay đổi variable gốc của nó`. Nếu `1 trong các variable` dùng `reference` thì nó `sẽ thay đổi value chung cho tất cả các variables`.
- Dùng `&` trong parameter function.

```php
$name = "Original value";

function changeVar(&$item) {
  $item = "Changed value";
}

changeVar($name);
echo $name; // "Changed value"
```

- `Nếu 1 trong các variable change, nó sẽ thay đổi các variables đang dùng reference`.

```php
<?php

$name = 'Nam';
$name2 = &$name;

$name2 = 'Alice';
echo "$name, $name2"; // 'Alice', 'Alice'

$name = 'John';
echo "$name, $name2"; // 'John', 'John'
```

1. **`Destructuring Array`**

- **Đối với array bình thường**:

```php
<?php
  $array = ['Jane', 'Smith', 'Ben'];

  // 📌 use array
  [$name1, $name2, $name3] = $array;

  // 📌 use list
  list($name1, $name2, $name3) = $array;

  echo $name1, $name2, $name3;
?>
```

- **Associative Array**:

```php
<?php
// Mảng kết hợp (associative array)
$array = [
    'name' => 'Alice',
    'age' => 25,
    'city' => 'Wonderland',
];

// Destructuring mảng kết hợp
['name' => $name, 'age' => $age, 'city' => $city] = $array;

echo $name;  // Kết quả: Alice
echo "\n";
echo $age;   // Kết quả: 25
echo "\n";
echo $city;  // Kết quả: Wonderland
?>
```

- **Nested Associative Array**:

```php
<?php
// Mảng lồng nhau (nested array)
$array = [
    'name' => 'Alice',
    'details' => [
        'age' => 25,
        'city' => 'Wonderland'
    ]
];

// Destructuring mảng lồng nhau
['name' => $name, 'details' => ['age' => $age, 'city' => $city]] = $array;

echo $name;  // Kết quả: Alice
echo "\n";
echo $age;   // Kết quả: 25
echo "\n";
echo $city;  // Kết quả: Wonderland
?>
```