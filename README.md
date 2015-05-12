adduc\memoize-apc
===

This library provides the ability to wrap a call to a function with
caching functionality backed by Apc. It builds on the [memoize-php]
library by Dominion Enterprises.

Example
---

```php
$memoize = new Adduc\Memoize\Apc();

$compute = function() {
    // Perform some long operation that you want to memoize
};

$result = $memoize->memoizeCallable('myLongOperation', $compute);
```



[memoize-php]: https://github.com/dominionenterprises/memoize-php