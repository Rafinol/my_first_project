<?php

namespace backend\Commands;
use app\models\Menu;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Request;

class StartCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'start';
    /**
     * @var string
     */
    protected $description = 'Start command';
    /**
     * @var string
     */
    protected $usage = '/start';
    /**
     * @var string
     */
    protected $version = '1.1.0';
    /**
     * @var bool
     */
    protected $private_only = true;
    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $menu = Menu::getByName($this->name);
        $text = $menu->description. PHP_EOL;
        $data['chat_id'] = $this->getMessage()->getChat()->getId();
        $data['text'] = $text;
        $inlines = $menu->Inline->via('InlineMenu');
        $inline_keyboard = new InlineKeyboard([
            ['text' => 'inline', 'switch_inline_query' => true],
            ['text' => 'inline current chat', 'switch_inline_query_current_chat' => true],
        ], [
            ['text' => 'callback', 'callback_data' => 'identifier'],
            ['text' => 'open url', 'url' => 'https://github.com/php-telegram-bot/core'],
        ]);
        $data['reply_markup'] = $inline_keyboard;
        return Request::sendMessage($data);
    }
}