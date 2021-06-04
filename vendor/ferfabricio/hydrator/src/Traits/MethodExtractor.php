<?php

namespace FerFabricio\Hydrator\Traits;

trait MethodExtractor
{
    private static function extractAndFilter($object, $filter)
    {
        $className = \get_class($object);
        $avaibleMethods = \get_class_methods($className);

        $reducer = function ($accumulator, $method) {
            $acc = $accumulator['result'];
            $filter = $accumulator['filter'];

            if (\substr($method, 0, strlen($filter)) == $filter) {
                array_push($acc, $method);
                return ['filter' => $filter, 'result' => $acc];
            }

            return ['filter' => $filter, 'result' => $acc];
        };

        return array_reduce($avaibleMethods, $reducer, ['filter' => $filter, 'result' => []])['result'];
    }

    private static function getPropertyName($method)
    {
        $property = \substr($method, 3, strlen($method));
        $property[0] = strtolower($property[0]);

        return $property;
    }
}
