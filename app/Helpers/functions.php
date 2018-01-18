<?php


function formatDateAndTime($value, $format = 'd/m/Y')
{
    return Carbon\Carbon::parse($value)->format($format);
}


function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}
