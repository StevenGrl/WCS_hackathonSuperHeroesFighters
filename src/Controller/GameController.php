<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/04/18
 * Time: 15:17
 */

namespace Controller;


class GameController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Game/index.html.twig');
    }
}