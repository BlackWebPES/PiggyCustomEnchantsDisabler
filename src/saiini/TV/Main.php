<?php
declare(strict_types = 1);

namespace saiini\TV;

use PiggyCustomEnchants\Main as CE;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\config;

/**
 * S a i n i 1 4
 */

/**
 * Class Main
 *
 * @package saiini\TV
 */
class Main extends PluginBase{
	/**@var config */
	public $cfg;
	
	public function onEnable(){
		if(!is_dir($this->getDataFolder())){
			mkdir($this->getDataFolder());
		}
		$this->saveDefaultConfig();
		/** @var CE $ce */
		$ce = $this->getServer()->getPluginManager()->getPlugin("PiggyCustomEnchants");
		$ids = $this->getConfig()->get("ids");
		foreach($ids as $id){
			$ce->unregisterEnchantment($id);
		}
	}
}
