<?php

namespace backend\services\repo;


class MenuRepo
{
    public static function getDescription($user, $descr)
    {
        $descr = str_replace("%username%", $user->getName(), $descr);
        $descr = str_replace("%datetime%", date('d-m-Y H:i:s'), $descr);
        return $descr;
    }
}