### Traits

- Khi bạn muốn dùng nó cho việc `reuse code`. Chúng ta có thể dùng `trait` để `tổng hợp các function thưc thi nhiều chỗ`.

```php
trait Crud {
    public function getList()
    {
        ...
    }

    public function add()
    {
        ...
    }
}
```

- `Sau đó dùng chúng trong 1 controller nào đó`.


```php
class UserController
{
    use Crud;

    public function getListUser()
    {
        $users = $this->getList();

        ....
    }
}
```