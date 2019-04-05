<?php

namespace app\MyClasses;

use \Carbon\Carbon;
use app\Currency;
use app\Currencyrate;

/*
*

$valutes = ['USD', 'EUR'];
$c_today = new Course($valutes);

*
*/

class Cbr
{
    static $days = [];
    static $today;
    
    //static $valute_names = ['USD', 'EUR'];
    static $valute_names = [];
    static $valute_values = [];

    static $count_valutes;

    static $file;

    public static function configurate() {
        self::$today = Carbon::now()->format('d.m.Y');
        self::$valute_names = Currency::currenciesList();
        self::$count_valutes = sizeof(self::$valute_names);

        self::$days[] = self::$today;
        self::$days[] = Carbon::now()->addDay()->format('d.m.Y');

        self::getCourses();
        self::isChanged();
    }

    private static function getCourses() {
        for ($i=0; $i < sizeof(self::$days); $i++) { 

            /**************************
             * 
             */
            if (!Currencyrate::where('ondate', self::$today)) {
                # code...
            }

            /**********
             * 
             */
//            self::$file = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp?date_req=".self::$days[$i]);
            self::$file = simplexml_load_file(self::$days[$i]);
            $content = [];

            foreach (self::$file AS $el){
                $content[strval($el->CharCode)] = strval($el->Value);
            }
            
            for ($j=0; $j < self::$count_valutes; $j++) {
                //array_push(self::$valute_values, number_format(str_replace(',', '.', $content[self::$valute_names[$j]]), 2, '.', ''));
                self::$valute_values[] = number_format(str_replace(',', '.', $content[self::$valute_names[$j]]), 2, '.', '');
            }
        }
    }

    private static function isChanged() {
        for ($i=0; $i < self::$count_valutes; $i++) { 
            if (self::$valute_values[$i] == self::$valute_values[$i + self::$count_valutes]) {
                self::$valute_values[$i + self::$count_valutes] = -1;
            }
        }
    }
    
    public static function get() {
        self::configurate();
        return self::$valute_values;
//        return Carbon::now()->format('d.m.Y');
    }

    public static function getNames() {
        if (count(self::$valute_names) == 0) {
            self::$valute_names = Currency::currenciesList();
        }        
        return self::$valute_names;
//        return Carbon::now()->format('d.m.Y');
    }
}
