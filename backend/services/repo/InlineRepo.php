<?php

namespace backend\services\repo;

class InlineRepo
{
    public static function getInlineKeyboard($menu)
    {
        $inlines = $menu->inline;
        $inline_keybord = [];
        foreach ($inlines as $inline){
            $inline_keybord[] = [
                'text' => $inline->name,
                'callback_data' => $inline->name,
            ];
        }
        return $inline_keybord;
    }
}