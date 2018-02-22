<?php

namespace Longman\TelegramBot\Commands\UserCommands;


use app\models\Inline;
use app\models\InMessageLog;
use app\models\PromoPictures;
use backend\services\repo\InlineRepo;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Request;

class PromoCommand extends UserCommand
{


    /**
     * @var string
     */
    protected $name = 'promo';
    /**
     * @var string
     */
    protected $description = 'Promo command';
    /**
     * @var string
     */
    protected $usage = '/promo';
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
        InMessageLog::create($this->getMessage()->getFrom()->getUsername(),$this->usage, $this->name);
        $chat_id = $this->getMessage()->getFrom()->getId();
        $promo = PromoPictures::getCurrentPromo();
        $telegram_id = $promo->promo_telegram_id;

        if(empty($telegram_id)){
            $data['chat_id'] = $chat_id;
            $data['text'] = 'К сожалению, на сегодняшний день промоакции отсутствуют';
            return Request::sendMessage($data);
        }

        $data = [
            'chat_id' => $chat_id,
            'photo'   => $telegram_id,
        ];
        Request::sendPhoto($data);

        $menu = Inline::getByName($this->name)->menu;
        $data['chat_id'] = $chat_id;
        $data['text'] = $promo->promo_name;
        $data['reply_markup'] = new InlineKeyboard(InlineRepo::getInlineKeyboard($menu));
        Request::sendMessage($data);


    }
}