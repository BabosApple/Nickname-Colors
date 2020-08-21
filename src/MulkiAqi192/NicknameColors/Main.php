<?php

namespace MulkiAqi192\NicknameColors;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

	public function onEnable(){
		if(is_null($this->getServer()->getPluginManager()->getPlugin("FormAPI"))){
			$this->getLogger()->info("§aNickname §6colors §cneeds FormAPI plugin, disabling plugin...");
			$this->getServer()->getPluginManager()->disablePlugins($this);
		} else {
			$this->getLogger()->info("§aNickname §6Colors §aIs enabled!");
		}
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
		switch($command->getName()){
			case "ncolors":
				if($sender instanceof Player){
					if($sender->hasPermission("ncolors.use")){
						$this->ncolors($sender);
					}
				}
		}
	return true;
	}

	public function ncolors($player){
		$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
					$player->setDisplayName("§f" . $player->getName() . "§f ");
					$player->setNameTag("§f" . $player->getName() . "§f ");
					$player->sendMessage("§7[§aNickname§6Colors§7]§f nickname color has been changed to §fWhite!");
				break;

				case 1:
					$player->setDisplayName("§c" . $player->getName() . "§f ");
					$player->setNameTag("§c" . $player->getName() . "§f ");
					$player->sendMessage("§7[§aNickname§6Colors§7]§f §eYour nickname color has been changed to §cRed!");
				break;

				case 2:
					$player->setDisplayName("§b" . $player->getName() . "§f ");
					$player->setNameTag("§b" . $player->getName() . "§f ");
					$player->sendMessage("§7[§aNickname§6Colors§7]§f §eYour nickname color has been changed to §bBlue!");
				break;

				case 3:
					$player->setDisplayName("§e" . $player->getName() . "§f ");
					$player->setNameTag("§e" . $player->getName() . "§f ");
					$player->sendMessage("§7[§aNickname§6Colors§7]§f §eYour nickname color has been changed to §eYellow!");
				break;

				case 4:
					$player->setDisplayName("§6" . $player->getName() . "§f ");
					$player->setNameTag("§6" . $player->getName() . "§f ");
					$player->sendMessage("§7[§aNickname§6Colors§7]§f §eYour nickname color has been changed to §6Orange!");
				break;

				case 5:
					$player->setDisplayName("§d" . $player->getName() . "§f ");
					$player->setNameTag("§d" . $player->getName() . "§f ");
					$player->sendMessage("§7[§aNickname§6Colors§7]§f §eYour nickname color has been changed to §dPurple!");
				break;
			}
		});
		$form->setTitle("§aNickname §6Colors");
		$form->setContent("§9>> §eSelect your color you prefer to your nickname!");
		$form->addButton("White");
		$form->addButton("§cRed");
		$form->addButton("§bBlue");
		$form->addButton("§eYellow");
		$form->addButton("§6Orange");
		$form->addButton("§dPurple");
		$form->sendToPlayer($player);
		return $form;
	}

}
