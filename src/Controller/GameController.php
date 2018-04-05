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
        $game = new Game();
        $game->recupPersos();

        //Rien de spécial
        return $this->twig->render('Game/index.html.twig');
    }


    /**
     * Logique du jeu
     */
    public function play()
    {
        //1. récupère info de sessions


        //2. if POST['action'] => modifier session variables et log


        //3. Fin du jeu ($this->end()) OU affiche la vue play ?


    }


    /**
     * Choisir les joueurs x 2
     */
    public function selectPlayers()
    {
        //1. vérifie info de sessions
        //2. Si nb joueurs < 2
        // continue vers select Players
        //Sinon
        //$this->play()

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