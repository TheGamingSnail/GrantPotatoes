<?php

namespace GamingSnail7410\Dialoguetest;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\event\Listener;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{
   public function onEnabled(){
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
    $this->getLogger()->info("Plugin is Enabled");

   }
   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
    switch($cmd->getName()){
        case "steak":
          if(!$sender instanceof Player){
            $sender->sendMessage("This command only works in-game!")
         }else{
            if(!isset($args[0])){
              $args[0] = 1;
            }
            $sender->getInventory()->addItem(Item::get(393,0,(int)$args[0]));
            $sender->sendMessage("You have been granted" . $args[0] . "baked potatoes!");
          }
        break;
      }
      return true:
    }

}