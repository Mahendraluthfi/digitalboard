<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use unreal4u\TelegramAPI\HttpClientRequestHandler;
use unreal4u\TelegramAPI\TgLog;
use unreal4u\TelegramAPI\Telegram\Methods\SendMessage;

class Libtelegram
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function send_message($message)
	{
		$chat_id = '-455764623';
		$loop = \React\EventLoop\Factory::create();
		$handler = new HttpClientRequestHandler($loop);
		$tgLog = new TgLog('1400801029:AAF_Pk1t0Z72SO7XH8O7KIlXIYmLM0PE7mM', $handler);

		$sendMessage = new SendMessage();
		$sendMessage->chat_id = $chat_id;
		$sendMessage->text = $message;

		$tgLog->performApiRequest($sendMessage);
		$loop->run();
	}
	

}

/* End of file Libtelegram.php */
/* Location: ./application/libraries/Libtelegram.php */
