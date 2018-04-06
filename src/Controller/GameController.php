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


        //Début du game
        if ($game->getCurrentPlayerIndex() == -1) {
            //todo choisir selon speed
            $randomChoice = false;
            $players = $game->getPlayers();
            if ($players[0]->getSpeed() > $players[1]->getSpeed()) {
                $game->setCurrentPlayerIndex(0);
            } elseif ($players[0]->getSpeed() < $players[1]->getSpeed()) {
                $game->setCurrentPlayerIndex(1);
            } else {
                $game->setCurrentPlayerIndex(rand(0, 1));
                $randomChoice = true;
            }

            $currentPlayer = $game->getPlayers()[$game->getCurrentPlayerIndex()];
            $msg = $randomChoice ?
                sprintf('%s a été tiré au sort pour commencer.', $currentPlayer->getName()) :
                sprintf('%s commence car grace à sa rapidité.', $currentPlayer->getName());

            $game->addToLog($msg);

        }


        if (isset($_POST['attack'])) {
            //todo Check F5
            $attack = $game->doAttack($_POST['attack']);
            $game->setLastAction($attack);
            $game->nextTurn();
        }
        $game->saveToSession();

        //Si un des deux joueurs est KO
        //Return vue end
        if ($game->isOneKo()) {
            return $this->end();
        }

        return $this->twig->render('Game/play.html.twig', ['game' => $game]);

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
        $game = Game::getInstance();

        $winnerLooser = $game->getPlayers();

        //Winner - looser
        usort($winnerLooser, function ($a, $b) {
            return ($a->getCurrentLife() < $b->getCurrentLife()) ? -1 : 1;
        });

        $loser = $winnerLooser[0];
        $winner = $winnerLooser[1];

        $data = compact('game', 'winner', 'loser');

        return $this->twig->render('Game/end.html.twig', $data);

    }


}