<?php

function findCollectionByType($collections, $slug) {
    foreach ($collections as $collection) {
        if ($collection->slug === $slug) {
            return $collection;
        }
    }
    return false;
}