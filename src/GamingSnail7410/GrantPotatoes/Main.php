<?php

namespace GamingSnail7410\GrantPotatoes;

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
        case "potato":
if(!$sender instanceof Player){
          $sender->sendMessage("This Command Only Works in-game!");
     }else{
          $sender->getInventory()->addItem(Item::get(393,0,$args[0])); 
          $sender->sendMessage("You have just recieved". count($args[0]) . " baked potatoes!");
     }
}
return true;
    }

}
