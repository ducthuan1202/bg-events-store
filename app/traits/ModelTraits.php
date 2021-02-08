<?php


namespace App\traits;


use Illuminate\Support\Arr;

trait ModelTraits
{

    public static function attributesLabel()
    {
        return [];
    }

    public static function getAttributeLabel($attributeName, $defaultValue = ''){
        return Arr::get(self::attributesLabel(), $attributeName, $defaultValue);
    }

    public static function icon(){
        return '';
    }
}
