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
    const ENERGY = 100;

    private $id;
    private $name;
    private $intelligence;
    private $strength;
    private $speed;
    private $durability;
    private $power;
    private $combat;
    private $currentLife;
    private $currentEnergy;

    private $image;

    private $availableAttacks;

    const ATTACKS = [
        [
            'id' => 0,
            'name' => 'Jet de livre',
            'stat' =>  40,
            'verb' => 'lance',
            'form' => '',
            'energy' => 0,
            'icon' => 'assets/images/iconAttack/book.jpg',
            'image' => 'https://media.giphy.com/media/l0HlQI7WEN5gmUzgQ/giphy.gif',
            'power' => 0
        ],[
            'id' => 1,
            'name' => 'Ruse',
            'stat' =>  70,
            'verb' => 'use de',
            'form' => '',
            'energy' => 30,
            'icon' => 'assets/images/iconAttack/brain.png',
            'image' => 'https://media.giphy.com/media/xT5LMqQM9xTe0hVDS8/giphy.gif', //'https://media.giphy.com/media/MVlRUmPRsAnRe/giphy.gif',
            'power' => 0
        ],[
            'id' => 2,
            'name' => 'Sortilège',
            'stat' => 100,
            'verb' => 'lance',
            'form' => '',
            'energy' => 60,
            'icon' => 'assets/images/iconAttack/sortilege.png',
            'image' => 'assets/images/gifAttack/sortilege2.gif',
            'power' => 0
        ],[
            'id' => 3,
            'name' => 'Petit projectile',
            'stat' => 40,
            'verb' => 'lance',
            'form' => '',
            'energy' => 0,
            'icon' => 'assets/images/iconAttack/petitprojectile.jpg',
            'image' => 'https://media.giphy.com/media/XwhEhu60cZI88/giphy.gif',
            'power' => 0
        ],[
            'id' => 4,
            'name' => 'Gros projectile',
            'stat' => 70,
            'verb' => 'lance',
            'form' => '',
            'energy' => 30,
            'icon' => 'assets/images/iconAttack/grosprojectile.png',
            'image' => 'assets/images/gifAttack/grosProjectile.gif',
            'power' => 0
        ],[
            'id' => 5,
            'name' => 'Gros rocher',
            'stat' => 100,
            'verb' => 'lance',
            'form' => '',
            'energy' => 60,
            'icon' => 'assets/images/iconAttack/rocher.png',
            'image' => 'https://media.giphy.com/media/DDBTVHo4MutmE/giphy.gif',
            'power' => 0
        ],[
            'id' => 6,
            'name' => 'Sphères lumineuses',
            'stat' => 40,
            'verb' => 'lance des',
            'form' => '',
            'energy' => 0,
            'icon' => 'assets/images/iconAttack/sphere2.png',
            'image' => 'https://media.giphy.com/media/4iVDK5pJgHZCg/giphy.gif',
            'power' => 0
        ],[
            'id' => 7,
            'name' => 'Boule d\'énergie',
            'stat' => 70,
            'verb' => 'lance une',
            'form' => '',
            'energy' => 30,
            'icon' => 'assets/images/iconAttack/bouleenergie.png',
            'image' => 'https://media.giphy.com/media/jNQXX5dY3J4wE/giphy.gif',
            'power' => 0
        ],[
            'id' => 8,
            'name' => 'Rayon laser',
            'stat' => 100,
            'verb' => 'lance',
            'form' => '',
            'energy' => 60,
            'icon' => 'assets/images/iconAttack/laserbeam.png',
            'image' => 'assets/images/gifAttack/rayonlaser.gif',
            'power' => 0
        ],[
            'id' => 9,
            'name' => 'Claque',
            'stat' => 40,
            'verb' => 'met une petite',
            'form' => '',
            'energy' => 0,
            'icon' => 'assets/images/iconAttack/slap2.png',
            'image' => 'assets/images/gifAttack/gifle.gif',
            'power' => 0
        ],[
            'id' => 10,
            'name' => 'Kicks',
            'stat' => 70,
            'verb' => 'donne des',
            'form' => '',
            'energy' => 30,
            'icon' => 'assets/images/iconAttack/23345424-kicking-foot-icon.jpg',
            'image' => 'assets/images/gifAttack/kicks.gif',
            'power' => 0
        ],[
            'id' => 11,
            'name' => 'MEGA PUNCH',
            'stat' => 100,
            'verb' => 'lance un super ultra',
            'form' => '',
            'energy' => 60,
            'icon' => 'assets/images/iconAttack/attack.png',
            'image' => 'assets/images/gifAttack/megapunch.gif',
            'power' => 0
        ],
    ];


    public function __construct($objFromApi)
    {
        $this->setId($objFromApi->id);
        $this->setName($objFromApi->name);

        $this->setIntelligence($objFromApi->powerstats->intelligence);
        $this->setStrength($objFromApi->powerstats->strength);
        $this->setSpeed($objFromApi->powerstats->speed);
        $this->setDurability($objFromApi->powerstats->durability);
        $this->setPower($objFromApi->powerstats->power);
        $this->setCombat($objFromApi->powerstats->combat);
        $this->setCurrentLife(self::LIFEPOINT);
        $this->setCurrentEnergy(self::ENERGY);

        $this->setImage($objFromApi->images->lg);

        if($this->intelligence <= self::ATTACKS[0]['stat']){
            $this->setAvailableAttacks(self::ATTACKS[0]);
        } elseif ($this->intelligence <= self::ATTACKS[1]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[1]);
        } elseif ($this->intelligence <= self::ATTACKS[2]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[2]);
        }

        if($this->strength <= self::ATTACKS[3]['stat']){
            $this->setAvailableAttacks(self::ATTACKS[3]);
        } elseif ($this->strength <= self::ATTACKS[4]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[4]);
        } elseif ($this->strength <= self::ATTACKS[5]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[5]);
        }

        if($this->power <= self::ATTACKS[6]['stat']){
            $this->setAvailableAttacks(self::ATTACKS[6]);
        } elseif ($this->power <= self::ATTACKS[7]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[7]);
        } elseif ($this->power <= self::ATTACKS[8]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[8]);
        }

        if($this->power <= self::ATTACKS[9]['stat']){
            $this->setAvailableAttacks(self::ATTACKS[9]);
        } elseif ($this->power <= self::ATTACKS[10]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[10]);
        } elseif ($this->power <= self::ATTACKS[11]['stat']) {
            $this->setAvailableAttacks(self::ATTACKS[11]);
        }
    }

    /**
     * @return mixed
     */
    public function getAvailableAttacks()
    {
        return $this->availableAttacks;
    }

    /**
     * @param mixed $availableAttacks
     * @return Player
     */
    public function setAvailableAttacks($attack)
    {
        $this->availableAttacks[] = $attack;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentLife()
    {
        return $this->currentLife;
    }

    /**
     * @param mixed $currentLife
     * @return Player
     */
    public function setCurrentLife($currentLife)
    {
        $this->currentLife = $currentLife;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentEnergy()
    {
        return $this->currentEnergy;
    }

    /**
     * @param mixed $currentEnergy
     * @return Player
     */
    public function setCurrentEnergy($currentEnergy)
    {
        $this->currentEnergy = $currentEnergy;
        return $this;
    }

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

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }
}
