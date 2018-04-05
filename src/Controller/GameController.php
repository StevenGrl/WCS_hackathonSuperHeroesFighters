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
        $game = Game::getInstance();
        $game->destroy();
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
            // TODO CHECK if random
            if (!empty($_POST['players'])) {
                $newPlayersIds = $_POST['players'];
                foreach ($newPlayersIds as $id) {
                    $game->addPlayer($id);
                }
            } else { //Sinon renvoyer vers vue selection joueurs
                return $this->selectPlayers();
            }
        }

        //Si un des deux joueurs est KO
        //Todo: UNCOMMENT when Player->getLife() exists
//        if($game->isOneKo()){
//            return $this->end();
//
//        }

        //Début du game
        if($game->getCurrentPlayerIndex() == -1)
        {
            //todo choisir selon speed
            $game->setCurrentPlayerIndex(0);
        }


        if(!empty($_POST['attack'])){
            //todo
            $game->doAttack($_POST['attack']);

            $game->nextTurn();

        }

        $game->saveToSession();

        return $this->twig->render('Game/play.html.twig', ['game'=>$game]);

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
        //TODO get log and pass to twig
        return $this->twig->render('Game/end.html.twig');


    }


}