<?php

namespace app\MyClasses;

use \Carbon\Carbon;
use app\Currency;
use app\Currencyrate;

class Cbr
{
    static $days = [];
    static $today;
    static $tomorrow;
    static $valute_names = [];
    static $valute_values = [];
    static $count_valutes;
    static $file;

    public static function configurate() {
        self::$today = Carbon::now()->format('d.m.Y');
        self::$tomorrow = Carbon::now()->addDay()->format('d.m.Y');

        //выбор валют, которые нуждаются в обновлении курса. Основная валюта только одна и это обычно рубль. Относительно нее все курсы
        self::$valute_names = Currency::currenciesListToUpdate(); //добавить вызов метода, проверяющего, обновлять ли курс для валюты
        self::$count_valutes = sizeof(self::$valute_names);

        if (self::$valute_names) {
            self::getCourses(self::$today);
            if (Carbon::now()->format('H') >= '14') {
                self::getCourses(self::$tomorrow);
            }
        } else {
            dd(self::$valute_names);
            self::$valute_values = 0;
        }
        
        
        //self::isChanged();
    }

    private static function getCourses($day) {        
        
        if (!Currencyrate::where('ondate', date("Y-m-d", strtotime($day)))->count()) {
            self::$file = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp?date_req=".$day);
            //self::$file = simplexml_load_file($day);
            $content = [];

            foreach (self::$file AS $el){
                $content[strval($el->CharCode)] = strval($el->Value);
            }
        
            for ($j=0; $j < self::$count_valutes; $j++) {
                self::$valute_values[] = number_format(str_replace(',', '.', $content[self::$valute_names[$j]]), 2, '.', '');

                $todatabase['currency_id'] = Currency::where('currency', self::$valute_names[$j])->pluck('id')[0];
                $todatabase['value'] = end(self::$valute_values);
                $todatabase['ondate'] = date("Y-m-d", strtotime($day));
                
                Currencyrate::create($todatabase);
            }
        } else {             
            for ($j=0; $j < self::$count_valutes; $j++) {
                $valute_values_array = Currencyrate::select('value')->where([
                    ['ondate', date("Y-m-d", strtotime($day))],
                    ['currency_id', Currency::where('currency', self::$valute_names[$j])->pluck('id')[0]],
                ])->pluck('value');
                foreach ($valute_values_array as $value) {
                    self::$valute_values[] = $value;
                }                    
            } 
        }
    }

    private function saveCurrencyRate() {

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
    }

    public static function getNames() {
        if (count(self::$valute_names) == 0) {
            self::$valute_names = Currency::currenciesListToUpdate();
        }        
        return self::$valute_names;
    }
}
