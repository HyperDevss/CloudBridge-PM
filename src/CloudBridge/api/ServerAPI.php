<?php

namespace CloudBridge\api;

use CloudBridge\network\CloudBridgeSocket;
use CloudBridge\network\protocol\packet\ListServersRequestPacket;
use CloudBridge\network\protocol\packet\StartServerRequestPacket;
use CloudBridge\network\protocol\packet\StopServerRequestPacket;
use pocketmine\player\Player;

class ServerAPI {

    public static function startServer(Player $player, string $template, int $count = 1) {
        CloudBridgeSocket::getInstance()->sendPacket(StartServerRequestPacket::create($player->getName(), $template, $count));
    }

    public static function stopServer(Player $player, string $server) {
        CloudBridgeSocket::getInstance()->sendPacket(StopServerRequestPacket::create($player->getName(), $server));
    }

    public static function listServers(Player $player) {
        CloudBridgeSocket::getInstance()->sendPacket(ListServersRequestPacket::create($player->getName()));
    }
}