<?php

function findCollectionByType($collections, $slug) {
    foreach ($collections as $collection) {
        if ($collection->slug === $slug) {
            return $collection;
        }
    }
    return false;
}

function getSrcSet($x1, $x2) {
    if ($x1 === $x2) {
        return $x1 . " 1x";
    }

    return $x1 . " 1x, " . $x2 . " 2x";
}