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

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function recupPersos()
    {
//      $idPersos = [30,60,70,106,107,140,149,201,226,238,242,303,309,339,346,529,536,579,589,638];
        $persos = new Client(['base_uri' => 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/',]);

        // Send a request to https://foo.com/api/test
        $response = $persos->request('GET', 'all.json');

        $body = $response->getBody();
        $persotableau = json_decode($body->getContents());

        $rand_keys = array_rand($persotableau, 20);
        var_dump($rand_keys);
    }


}