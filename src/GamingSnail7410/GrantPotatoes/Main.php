<?php

namespace GamingSnail7410\GrantPotatoes;

use GamingSnail7410\GrantPotatoes\Item;

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
   
   public function onDisabled(){
   	$this->getLogger()->info("Plugin is Disabled");
   }
public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
   switch($cmd->getName()){
     case "test":
       if($sender->hasPermission("potato.command")){
         if(!$sender instanceof Player){
           $sender->sendMessage("This Command Only Works In-Game!");
         }else{
           if(!isset($args[0]) or (is_int($args[0]) and $args[0] > 0)){ 
            $args[0] = 1; 
           }
           $sender->getInventory()->addItem(Item::get(393,0,$args[0]));
           $sender->sendMessage("You have just recieved" .count($args[0]). " baked potatoes!");
         }
       }else{
         $sender->sendMessage("You don't have permission to use these potatoes");
       }
     break;
  }
  return true;
}

}
