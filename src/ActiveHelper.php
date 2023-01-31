<?php

namespace Irsyadulibad\LaravelActivehelper;

use Illuminate\Support\Facades\Route;

class ActiveHelper
{
    public static function echo(string $params, string $value = 'active'): string
    {
        $route = Route::current()->getName();
        $params = explode(',', str_replace("'", '', $params));
        $match = array_filter($params, function ($param) use ($route) {
            $param = trim($param);
            return preg_match("/\b$param/", $route);
        });

        return (count($match) > 0) ? $value : '';
    }
}
