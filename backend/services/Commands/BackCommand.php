<?php

namespace Longman\TelegramBot\Commands\UserCommands;


use app\models\InMessageLog;
use app\models\Menu;
use backend\services\repo\InlineRepo;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Request;
use Yii;

class BackCommand extends UserCommand
{


    /**
     * @var string
     */
    protected $name = 'back';
    /**
     * @var string
     */
    protected $description = 'Back command';
    /**
     * @var string
     */
    protected $usage = '/back';
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
        $update['message']['command'] = $this->name;
        return (new CommonCommand($this->telegram, new Update($update)))->preExecute();
    }
}