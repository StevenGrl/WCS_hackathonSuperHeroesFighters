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

    private $image;

    private $availableAttacks;

    const ATTACKS = [
        [
            'name' => 'Jet de livre',
            'stat' =>  40,
            'form' => '',
            'icon' => '',
            'image' => 'https://media.giphy.com/media/l0HlQI7WEN5gmUzgQ/giphy.gif',
            'power' => 0
        ],[
            'name' => 'Ruse',
            'stat' =>  70,
            'form' => '',
            'icon' => '',
            'image' => 'https://media.giphy.com/media/MVlRUmPRsAnRe/giphy.gif',
            'power' => 0
        ],[
            'name' => 'Sortilège',
            'stat' => 100,
            'form' => '',
            'icon' => 'assets/images/iconAttack/sortilege.png',
            'image' => 'https://media.giphy.com/media/l0ExsgrTuACbtPaqQ/giphy.gif',
            'power' => 0
        ],[
            'name' => 'Petit projectile',
            'stat' => 40,
            'form' => '',
            'icon' => '',
            'image' => 'https://media.giphy.com/media/XwhEhu60cZI88/giphy.gif',
            'power' => 0
        ],[
            'name' => 'Gros projectile',
            'stat' => 70,
            'form' => '',
            'icon' => 'assets/images/iconAttack/grosprojectile.png',
            'image' => 'assets/images/gifAttack/grosProjectile.gif',
            'power' => 0
        ],[
            'name' => 'Gros rocher',
            'stat' => 100,
            'form' => '',
            'icon' => '',
            'image' => '',
            'power' => 0
        ],[
            'name' => 'Sphère lumineuse',
            'stat' => 40,
            'form' => '',
            'icon' => 'assets/images/iconAttack/sphere2.png',
            'image' => '',
            'power' => 0
        ],[
            'name' => 'Boule d\'énergie',
            'stat' => 70,
            'form' => '',
            'icon' => 'assets/images/iconAttack/bouleenergie.png',
            'image' => '',
            'power' => 0
        ],[
            'name' => 'Rayon laser',
            'stat' => 100,
            'form' => '',
            'icon' => 'assets/images/iconAttack/laserbeam.png',
            'image' => '',
            'power' => 0
        ],[
            'name' => 'Claque',
            'stat' => 40,
            'form' => '',
            'icon' => 'assets/images/iconAttack/slap2.png',
            'image' => 'assets/images/gifAttack/gifle.gif',
            'power' => 0
        ],[
            'name' => 'Kicks',
            'stat' => 70,
            'form' => '',
            'icon' => 'assets/images/iconAttack/23345424-kicking-foot-icon.jpg',
            'image' => '',
            'power' => 0
        ],[
            'name' => 'MEGA PUNCH',
            'stat' => 100,
            'form' => '',
            'icon' => 'assets/images/iconAttack/attack.png',
            'image' => '',
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
