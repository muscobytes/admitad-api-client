<?php

namespace Muscobytes\AdmitadApi\Trait;

use ReflectionClass;

trait ConstantsTrait
{
    static function getConstantsWithPrefix(string $prefix): array
    {
        return array_filter(
            (new ReflectionClass(__CLASS__))->getConstants(),
            function(string $key) use ($prefix){
                return str_starts_with($key, $prefix);
            },
            ARRAY_FILTER_USE_KEY
        );
    }

}