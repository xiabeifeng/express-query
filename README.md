# express-query

> This is a php package to make it easy to query express information.

> Homepage : https://packagist.org/packages/xiabeifeng/express-query

### Quick Start and Examples

```php
try {
    $obj = new KuaiDi100('yunda', '1201869669591');
    $result = $obj->query();
    var_dump($result);
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;
}
```


