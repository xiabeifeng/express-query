# express-query

> This is a php package to make it easy to query express information.

> Homepage : https://packagist.org/packages/xiabeifeng/express-query

### Quick Start and Examples

```php
try {
    $obj = new KuaiDi100Query('yunda', '1201869669591');
    $result = $obj->query();
    var_dump($result);
} catch (Component\ExpressQueryException $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;
}
```


