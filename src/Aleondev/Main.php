<?php

namespace Aleodnev;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use onebone\economyapi\EconomyAPI;


class Main extends PluginBase{

	public function onEnable() : void{
		$this->getLogger()->info("Aktiviert");
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "moneydrop":
				$zahl = $args[0];
				foreach ($this->getServer()->getOnlinePlayers() as $player) {
					$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player, $zahl);
					$player->sendMessage("§4Du hast §e" .$zahl. "$ §4erhalten durch einen Moneydrop");
					break;
				}
				return true;
			default:
				return false;
		} 
		}
	public function onDisable() : void{
		$this->getLogger()->info("Deaktiviert");
	}
}





