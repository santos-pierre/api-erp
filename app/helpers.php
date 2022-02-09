<?php

if (!function_exists('price_TVA')) {
    function price_TVA($price, $TVA)
    {
        return $price + ($price* $TVA/100);
    }
}
