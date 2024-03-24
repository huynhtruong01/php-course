## Course PHP

- [Course PHP](#course-php)
  - [`01` - Install \& Setup](#01---install--setup)
  - [`02` - Variables \& Data types \& Truthy and Falsy](#02---variables--data-types--truthy-and-falsy)
  - [`03` - Math function, If statement, Logical operator, Switches](#03---math-function-if-statement-logical-operator-switches)
  - [`04` - Array \& Array function](#04---array--array-function)
  - [`05` - For loop \& While loop](#05---for-loop--while-loop)
  - [`06` - Function](#06---function)
  - [`07` - String Functions](#07---string-functions)
  - [`07` - Sanitize input value](#07---sanitize-input-value)
  - [`08` - Include \& Require](#08---include--require)
  - [`10` - PHP Superglobal](#10---php-superglobal)

---

### `01` - Install & Setup

1. **`Install XAMPP to execute code PHP`**

- **Step 1**: Install **XAMPP**.
- **Step 2**: Setting path `"php.validate.executablePath": "C:/xampp/php/php.exe"` into **setting JSON** of VSCode.
- **Step 3**: Recommend extension **PHP Intelephense**, **Live Server, PHP Server** for PHP.

[⬆️ Back to top](#course-php)

---

### `02` - Variables & Data types & Truthy and Falsy

1. **`Variables`**

```php
<?php
    $name = 'Huynh Truong';
    $age = 19;
    $isEnoughAge = true;
    $listPosts = null;
?>
```

2. **`Data types`**

- Includes: `int`, `float`, `string`, `boolean`, `object`, `null`, `array`, `resource`.

```php
<?php
    $username = 'htruong01'; // string
    $age = 20; // int
    $price = 12.99; // float
    $isOutstanding = true; // boolean;
    $listNames = array('Dat', 'Nguyen', 'Duc'); // array
    $student = null; // null
?>
```

- Object

```php
// object is an instance class
<?php
    class Person {
        public $name;
        public $age;

        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        public function greeting() {
            echo "Hello {$name} and I am {$age} years old.";
        }
    }

    $person1 = new Person('Truong', 20);

    echo $person1->name;
    echo $person1->age;

    echo $person1->greeting();
?>
```

3. **`Constant`**

- Use `define()` to define a const variable.

```php
<?php
    define("myName", "Van Tien");
    echo myName; // Van Tien
?>
```

- Or use `const`.

```php
<?php
    const myName = 'Van Tien';
    echo myName; // Van Tien
?>
```

4. **`Truthy & Falsy`**

- **Falsy**: 0, [], '', null, false.

[⬆️ Back to top](#course-php)

---

### `03` - Math function, If statement, Logical operator, Switches

1. **`Math function`**

- `abs()`, `ceil()`, `floor()`, `round()`, `sqrt()`, `min()`, `max()`,...

```php
<?php
    $num = 1.2;
    echo ceil($num); // 2
    echo max(1, 2, 3, 4); // 4
?>
```

2. **`If statement`**

```php
<?php
    $num = 9;
    if($num > 10) {
        echo "Num is greater than 10";
    } elseif($num > 5) {
        echo "Num is greater than 5";
    } else {
        echo "Num is less than 5";
    }

    $student = array("name" => "Hai Nam", "age" => 20);

    if($student['name']) {
        echo "Student has name {$student['name']}"
    }
?>
```

3. **Logical operator**

- `&&`, `||`, `!`.

```php
<?php
    $listPosts = array();
    if($listPosts && count($listPosts)) {
        foreach($listPosts as post) {
            echo $post;
        }
    }

    $isEnoughAge = true;
    if(!$isEnoughAge) {
        echo "You are enough age to drive the car";
    }
?>
```

4. **`Switches`**

```php
<?php
    $fruitName = 'banana';
    switch($fruitName) {
        case "banana":
            echo "This is a banana";
            break;
        case "orange":
            echo "This is a orange";
            break;
        default: 
            echo "Not found this fruit name";
    }
?>
```

[⬆️ Back to top](#course-php)

---

### `04` - Array & Array function

1. **`Array`**

```php
<?php
    $listAnimal = array('lion', 'tiger', 'bird', 'cat', 'dog');

    // shorthand
    $listAnimal = ['lion', 'tiger', 'bird', 'cat', 'dog'];
?>
```

2. **`Associative Array`**

```php
<?php
    $student = array("name" => "Hai Nam", "age" => 20);
    $student['name'] = "Phuoc Nguyen";

    echo $student['name']; // Phuoc Nguyen
?>
```

3. **`Array function`**

- `array_pop()`, `array_push()`, `array_map()`, `array_filter()`, `array_keys()`, `array_values()`,...

```php
<?php
    $listNumb = [1, 2, 3, 4, 5];

    function doubleNumb($numb) {
        return $numb * $numb;
    }
    $newListNumb = array_map(doubleNumb, $listNumb);

?>
```

> [https://blog.hubspot.com/website/php-array-functions](https://blog.hubspot.com/website/php-array-functions)

[⬆️ Back to top](#course-php)

---

### `05` - For loop & While loop

1. **`For i`**

```php
<?php
    $foodNames = ['pizza', 'bread', 'cake', 'orange'];
    for($i = 0; $i < count($foodNames); $i++) {
        echo $foodNames[$i];
    }
?>
```

2. **`Foreach`**

```php
<?php
    // with normal array
    $foodNames = ['pizza', 'bread', 'cake', 'orange'];
    foreach($foodNames as $food) {
        echo $food . "<br />";
    }

    // with associative array
    $student = ["name" => "Hai Nam", "age" => 20];
    foreach($student as $key => $value) {
        echo $key . $value;
    }
?>
```

3. **`While loop`**

```php
<?php
    $listTools = ['google', 'firefox', 'edge'];
    $i = 0;
    while($i < count($listTools)) {
        echo $listTools[$i] . "<br />";
        $i++;
    }
?>
```

[⬆️ Back to top](#course-php)

---

### `06` - Function

- You can define a function to execute the problem.
- You can define type for argument.

```php
<?php
    function isEvenNumber(int $numb) { // define type for arguments
        return $numb % 2 === 0;
    }

    $numb = 2;
?>
```

[⬆️ Back to top](#course-php)

---

### `07` - String Functions

- `strlen()`, `strpos()`, `substr()`, `str_replace()`, `strtoupper()`, `strtolower()`,...

> [https://blog.hubspot.com/website/php-string-functions](https://blog.hubspot.com/website/php-string-functions)

[⬆️ Back to top](#course-php)

---

### `07` - Sanitize input value

- Using `filter_input(type, variable, filter, options)`.
- `isset()` check a variable is set and `NOT NULL`.

```php
<?php
    $numb = 0;
    if($numb) { // it true
        echo "true";
    }

    $isNull = null;
    if($isNull) { // it false because it is NULL
        echo "true";
    }
?>
```

- **Type**:
  - INPUT_GET
  - INPUT_POST
  - INPUT_COOKIE
  - INPUT_SERVER
  - INPUT_ENV

- **Filter**:
  - FILTER_VALIDATE_INT
  - FILTER_VALIDATE_FLOAT
  - FILTER_VALIDATE_EMAIL
  - FILTER_VALIDATE_BOOLEAN
  - FILTER_VALIDATE_URL
  - FILTER_SANITIZE_STRING
  - FILTER_SANITIZE_NUMBER_INT
  - FILTER_SANITIZE_EMAIL
  - FILTER_SANITIZE_URL

```php
<?php
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
?>
```

[⬆️ Back to top](#course-php)

---

### `08` - Include & Require

- **Include** or (**require**) statement takes all the text/code/markup that exists in the specified file and copies it into the file that uses the include statement.

- **Include** is including files PHP, HTML or text on multi page.

- **Include** will only produce a warning (`E_WARNING`) and the script will continue.
- **Require** will produce a fatal error (`E_COMPILE_ERROR`) and stop the script.

```html
<!-- header.html -->
<header>
    <div>...</div>
</header>
```

```php
<?php 
    include 'header.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        This is body website
    </div>
</body>

</html>
```

---

### `10` - PHP Superglobal

1. **`$_GET`**

- **$_GET**: is associative array contains `key-value pairs`.
- Access by `name` input.

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course PHP</title>
</head>

<body>
    <form action="index.php">
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" id="password" name="password">
        </div>
        <input type="submit" value="Login" />
    </form>
</body>

</html>

<?php
    // can access by `name input`
    $username = $_GET['username'];
    $password = $_GET['password'];

    // or use `foreach`
    foreach($_GET as $key => $value) {
        echo $key . $value;
    }
?>
```