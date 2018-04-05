<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 05/04/18
 * Time: 17:00
 */

namespace Model;


class Player
{
    const LIFEPOINT = 1000;

    private $id;
    private $name;
    private $intelligence;
    private $strength;
    private $speed;
    private $durability;
    private $power;
    private $combat;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Player
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * @param mixed $intelligence
     * @return Player
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     * @return Player
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     * @return Player
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDurability()
    {
        return $this->durability;
    }

    /**
     * @param mixed $durability
     * @return Player
     */
    public function setDurability($durability)
    {
        $this->durability = $durability;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param mixed $power
     * @return Player
     */
    public function setPower($power)
    {
        $this->power = $power;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCombat()
    {
        return $this->combat;
    }

    /**
     * @param mixed $combat
     * @return Player
     */
    public function setCombat($combat)
    {
        $this->combat = $combat;
        return $this;
    }
}
