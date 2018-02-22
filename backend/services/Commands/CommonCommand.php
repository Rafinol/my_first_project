<?php

namespace Longman\TelegramBot\Commands\UserCommands;


use app\models\Inline;
use app\models\InMessageLog;
use app\models\Menu;
use backend\services\repo\InlineRepo;
use backend\services\repo\MenuRepo;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Request;
use Yii;

class CommonCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'common';
    /**
     * @var string
     */
    protected $description = 'Common command';
    /**
     * @var string
     */
    protected $usage = '/common';
    /**
     * @var string
     */
    protected $version = '1.1.0';
    /**
     * @var bool
     */
    protected $private_only = false;

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */



    public function execute()
    {

        $update = json_decode($this->getUpdate()->toJson(), true);
        $this->name = $update['message']['command'];
        $menu = Inline::getByName($this->name)->menu;


        $data['chat_id'] = $this->getMessage()->getFrom()->getId();
        $data['text'] = MenuRepo::getDescription($this->getMessage()->getFrom(),$menu->description). PHP_EOL;
        $data['reply_markup'] = new InlineKeyboard(InlineRepo::getInlineKeyboard($menu));
        InMessageLog::create($this->getMessage()->getFrom()->getUsername(),$this->name, $this->name);

        return Request::sendMessage($data);
    }
}