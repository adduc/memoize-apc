<?php

namespace Adduc\Memoize;

use DominionEnterprises\Memoize\Memoize;

/**
 * A memoizer that caches the results in an APC cache.
 */
class Apc implements Memoize
{
    /**
     * @see Memoize::memoizeCallable
     */
    public function memoizeCallable($key, $compute, $cacheTime = null)
    {
        $cached = apc_fetch($key, $success);

        if (!$success) {
            $cached = $compute();
            apc_store($key, $cached, $cacheTime ?: 0);
        }

        return $cached;
    }
}

