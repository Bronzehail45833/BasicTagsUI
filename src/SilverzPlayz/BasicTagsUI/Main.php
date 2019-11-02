<?php

declare(strict_types=1);

namespace SilverzPlayz\BasicTagsUI;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\command\{Command,CommandSender};
use pocketmine\item\Item;
use pocketmine\command\PluginIdentifiableCommand;

class Main extends PluginBase {
	
public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if ($sender instanceof Player and $command->getName() == "tag") {
            $this->tagsForm($sender);

            }else{
            	$sender->sendMessage("Please use this command in-game!");
            }
            return true;
        }

    
    public function tagsForm(Player $player) {
        $form = new SimpleForm(function (Player $player, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
                    case 0:
       
                     
         $player->setDisplayName($player->getName() . " §a§lNOOB");
         $player->sendMessage("Selected Tag Noob");
         
         
                    break;
                        
                    case 1:
         $player->setDisplayName($player->getName() . " §b§lEzPz");
         $player->sendMessage("Selected Tag EzPz");
                
                    break;
                    
                    case 2:
         $player->setDisplayName($player->getName() . " §d§lMaster");
         $player->sendMessage("Selected Tag Master");
                
                    break;
                }
            });
            $form->setTitle("Tags List");
            $form->setContent("Tap a tag to equip!");
            $form->addButton("Noob");
            $form->addButton("EZPz");
            $form->addButton("Master");
            $form->sendToPlayer($player);
            return true;
    }
    
}
