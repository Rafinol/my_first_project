<?php
namespace Longman\TelegramBot\Commands\SystemCommands;
use app\models\Inline;
use app\models\Menu;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Commands\UserCommands\BackCommand;
use Longman\TelegramBot\Commands\UserCommands\EchoCommand;
use Longman\TelegramBot\Commands\UserCommands\HelloCommand;
use Longman\TelegramBot\Commands\UserCommands\PromoCommand;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Request;
/**
 * Callback query command
 *
 * This command handles all callback queries sent via inline keyboard buttons.
 *
 * @see InlinekeyboardCommand.php
 */
class CallbackqueryCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'callbackquery';
    /**
     * @var string
     */
    protected $description = 'Reply to callback query';
    /**
     * @var string
     */
    protected $version = '1.1.1';
    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $command = $this->getCallbackQuery()->getData();



        if(!Inline::getByName($command)->menu) exit;

        $update = json_decode($this->getUpdate()->toJson(), true);
        $update['message']['text'] = '/'.$command;
        $update['message']['from']['id'] = $this->getCallbackQuery()->getFrom()->getId();
        $update['message']['from']['name'] = $this->getCallbackQuery()->getFrom()->getFirstName();
        $update['message']['from']['username'] = $this->getCallbackQuery()->getFrom()->getUsername();

        switch ($command) {
            case 'back':
                return (new BackCommand($this->telegram, new Update($update)))->preExecute();
                break;
            case 'hello':
                return (new HelloCommand($this->telegram, new Update($update)))->preExecute();
                break;
            case 'echo':
                return (new EchoCommand($this->telegram, new Update($update)))->preExecute();
                break;
            case 'promo':
                return (new PromoCommand($this->telegram, new Update($update)))->preExecute();
                break;
        }
    }
}