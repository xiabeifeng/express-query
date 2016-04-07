# express-query

This project is to make it easy to query express information.

### Quick Start and Examples

```php
try {
    $obj = new KuaiDi100Query('yunda', '1201869669591');
    $result = $obj->query();
    var_dump($result);
} catch (Component\KuaiDiQueryException $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;
}
```


