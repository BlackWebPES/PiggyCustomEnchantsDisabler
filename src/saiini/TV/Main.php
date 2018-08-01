<?php
declare(strict_types = 1);
namespace saiini\TV;
use PiggyCustomEnchants\Main as CE;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\config;
use pocketmine\event\Listener;
/**
 * S a i n i 1 4
 */

/**
 * Class Main
 *
 * @package saiini\TV
 */
class Main extends PluginBase implements Listener{
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
