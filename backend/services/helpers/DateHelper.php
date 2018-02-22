<?php
namespace backend\services\helpers;

class DateHelper
{
    public static function getWeekDay()
    {
        $week_day = date('w');
        if($week_day==0) $week_day=7;
        return $week_day;

    }

    public static function getStringWeekDay($day)
    {
        $weeks = ['Черновик','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье'];
        return $weeks[$day];
    }
}