<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/04/18
 * Time: 15:17
 */

namespace Controller;

use Model\Game;

class GameController extends AbstractController
{

    /**
     * HOME PAGE
     */
    public function index()
    {
        //Rien de spécial
        return $this->twig->render('Game/index.html.twig');
    }


    /**
     * Logique du jeu
     */
    public function play()
    {

        $game = Game::getInstance();

        //Si aucun joueur
        if (count($game->getPlayers()) < 2) {

            //Si nouveaux joueurs en POST
            if (!empty($_POST['players'])) {
                $newPlayersIds = $_POST['players'];
                foreach ($newPlayersIds as $id) {
                    $game->addPlayer($id);
                }
                $game->saveToSession();

            } else { //Sinon renvoyer vers vue select
                return $this->selectPlayers();
            }
        }

        return $this->twig->render('Game/play.html.twig');

    }


    /**
     * Choisir les joueurs x 2
     */
    public function selectPlayers()
    {

        $game = Game::getInstance();
        $heroes = $game->getPickedSuperheroes();
        $data = compact('heroes');

        return $this->twig->render('Game/selectplayer.html.twig', $data);

    }


    /**
     * Résumé du jeu à la fin
     */
    public function end()
    {
        //1. Affiche session log et résumé
        //2. unset($_SESSION['game']);
        //2. button restart

    }


}