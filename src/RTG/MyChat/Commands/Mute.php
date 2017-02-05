<?php

namespace RTG\MyChat\Commands;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandExecutor;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\Player;
use pocketmine\Server;

use RTG\MyChat\ChatLoader;

use pocketmine\utils\TextFormat as TF;

class Mute extends PluginBase implements CommandExecutor {
	
	public function __construct(ChatLoader $plugin){
        $this->plugin = $plugin;
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $param) {
		switch(strtolower($cmd->getName())) {
			
			case "mute":
				if($sender->hasPermission("mychat.mute") or $sender->isOp()) {
					
					if(isset($param[0])) {
						
						$player = $args[0];
						
							if($this->getServer()->getPlayer($player) !== null) {
								
								$this->plugin->onMute($player);
								$sender->sendMessage("You have muted $player");
								
							}
							else {
								$sender->sendMessage("$player isnt a Player!");
							}
							
					}
					else {
						$sender->sendMessage("Usage: /mute {player}");
					}
				}
				else {
					$sender->sendMessage(TF::RED . "You have no permission to use this command!");
				}
				return true;
			break;
			
		}
	}

}			