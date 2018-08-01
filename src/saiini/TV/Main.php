<?php

/// ,-.                 ,   ,. 
//(   `     o o     o '|  / | 
// `-.  ,-: . . ;-. .  | '--| 
//.   ) | | | | | | |  |    | 							| Always on it|
// `-'  `-` ' ' ' ' '  '    '
declare(strict_types = 1);
namespace saiini\TV;
use PiggyCustomEnchants\Main as CE;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\config;
use pocketmine\event\Listener;
/**
 * Class Main
 *
 * @package saiini\TV
 */
class Main extends PluginBase implements Listener{
	/**@var config */
	public $cfg;
	public function onEnable()
	{
		if (!is_dir($this->getDataFolder())) {
			mkdir($this->getDataFolder());
		}
		if (!mkdir($this->getDataFolder())) {
			$this->getLogger()->info("cannot load the config file for a strange reason...");
		}
		$this->saveDefaultConfig();
		/** @var CE $ce */
		if($ce == 0){
			$this->getLogger()->alert("And odd error appeared...");
		}
		$ce = $this->getServer()->getPluginManager()->getPlugin("PiggyCustomEnchants");
		$ids = $this->getConfig()->get("ids");
		foreach ($ids as $id) {
			$ce->unregisterEnchantment($id);
			$this->getLogger()->info('Disabled: ' . $id);
			if (!$id) {
				$this->getLogger()->info('No Enchantment found.');
			}
		}
	}
}

