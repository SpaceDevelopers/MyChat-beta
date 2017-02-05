<?php

namespace RTG\MyChat;

// Main
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandExecutor;
// ---

// Essentials
use pocketmine\Player;
use pocketmine\Server;
// ---

// Events
use pocketmine\event\player\PlayerChatEvent;
// ---

class ChatLoader extends PluginBase implements Listener {
	
	public $muted;
	
	public function onLoad() {
		$this->getLogger()->warning("
		* Loading MyChat
		");
	}
	
	public function onEnable() {
		@mkdir($this->getDataFolder());
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getCommand("mute")->setExecutor(new Commands\Mute($this));
	}
	
	public function onMute($player) {
		if(isset($this->muted[strtolower($player)])) {
			return false;
		}
		else {
			$this->muted[strtolower($player)] = "";
			return true;
		}
	}
	
	
	
}	