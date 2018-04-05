<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/04/18
 * Time: 17:11
 */

namespace Model;

use GuzzleHttp\Client;

class Game
{
    private static $instance = null;

    private $players = [];

    private function __construct()
    {
    }


    public static function getInstance()
    {
        // Create a new Game and store it into session
        // OR retrieve game from session

        $session = Session::getInstance();
        //If not defined in session => new game
        if (!isset($session->game)) {
            self::$instance = new self;
            $session->game = self::$instance;
        } else { //If defined in session => retrieve it
            self::$instance = $session->game;
        }

        return self::$instance;
    }

    public function saveToSession()
    {
        $session = Session::getInstance();
        $session->game = self::$instance;

    }

    public function destroy()
    {
        $session = Session::getInstance();
        unset($session->game);
    }

    public function addPlayer($player)
    {
        $this->players[] = $player;

    }

    /**
     * @return array
     */
    public function getPlayers(): array
    {
        return $this->players;
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRandomSuperheroes():array
    {
//      $idPersos = [30,60,70,106,107,140,149,201,226,238,242,303,309,339,346,529,536,579,589,638];
        $client = new Client(['base_uri' => 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/',]);


        $allSuperheroes = $client->request('GET', 'all.json');

        $body = $allSuperheroes->getBody();
        $allSuperheroes = json_decode($body->getContents());

        $rand_keys = array_rand($allSuperheroes, 24);

        $randomSuperheros = [];

        foreach ($rand_keys as $key) {
            $randomSuperheros[] = $allSuperheroes[$key];
        }
        return $randomSuperheros;

    }


}