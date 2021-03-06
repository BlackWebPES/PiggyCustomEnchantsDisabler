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
use pocketmine\utils\TextFormat as c;
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

		$this->saveDefaultConfig();
		/** @var CE $ce */
		$ce = $this->getServer()->getPluginManager()->getPlugin("PiggyCustomEnchants");
		$ids = $this->getConfig()->get("ids");
		foreach ($ids as $id){
			$ce->unregisterEnchantment($id);
			$this->getLogger()->info(c::UNDERLINE . 'disabled: ' . $id);
			if (!$id) {
				$this->getLogger()->info('no enchantment found');
				switch ($id) {
					case 0:
						$this->getLogger()->emergency("please type an id");
						if ($ids -= 0) {
						} else {
							$this->getLogger()->info('something in this plugin broke');
						}
					break;
				}
			}
		}
	}
}

// For opti: lmao, fuck your self with freedom -Saiini14. (btw this is a rewrite)
