<?php

namespace App\Entity;

use App\Repository\RoundMenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoundMenRepository::class)
 */
class RoundMen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $blue_strikes;

    /**
     * @ORM\Column(type="integer")
     */
    private $red_strikes;

    /**
     * @ORM\Column(type="integer")
     */
    private $blue_significants_strikes;

    /**
     * @ORM\Column(type="integer")
     */
    private $red_significants_strikes;

    /**
     * @ORM\Column(type="integer")
     */
    private $blue_takedowns;

    /**
     * @ORM\Column(type="integer")
     */
    private $red_takedowns;

    /**
     * @ORM\Column(type="integer")
     */
    private $blue_score;

    /**
     * @ORM\Column(type="integer")
     */
    private $red_score;

    /**
     * @ORM\ManyToOne(targetEntity=FightMen::class, inversedBy="rounds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fightMen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlueStrikes(): ?int
    {
        return $this->blue_strikes;
    }

    public function setBlueStrikes(int $blue_strikes): self
    {
        $this->blue_strikes = $blue_strikes;

        return $this;
    }

    public function getRedStrikes(): ?int
    {
        return $this->red_strikes;
    }

    public function setRedStrikes(int $red_strikes): self
    {
        $this->red_strikes = $red_strikes;

        return $this;
    }

    public function getBlueSignificantsStrikes(): ?int
    {
        return $this->blue_significants_strikes;
    }

    public function setBlueSignificantsStrikes(int $blue_significants_strikes): self
    {
        $this->blue_significants_strikes = $blue_significants_strikes;

        return $this;
    }

    public function getRedSignificantsStrikes(): ?int
    {
        return $this->red_significants_strikes;
    }

    public function setRedSignificantsStrikes(int $red_significants_strikes): self
    {
        $this->red_significants_strikes = $red_significants_strikes;

        return $this;
    }

    public function getBlueTakedowns(): ?int
    {
        return $this->blue_takedowns;
    }

    public function setBlueTakedowns(int $blue_takedowns): self
    {
        $this->blue_takedowns = $blue_takedowns;

        return $this;
    }

    public function getRedTakedowns(): ?int
    {
        return $this->red_takedowns;
    }

    public function setRedTakedowns(int $red_takedowns): self
    {
        $this->red_takedowns = $red_takedowns;

        return $this;
    }

    public function getBlueScore(): ?int
    {
        return $this->blue_score;
    }

    public function setBlueScore(int $blue_score): self
    {
        $this->blue_score = $blue_score;

        return $this;
    }

    public function getRedScore(): ?int
    {
        return $this->red_score;
    }

    public function setRedScore(int $red_score): self
    {
        $this->red_score = $red_score;

        return $this;
    }

    public function getFightMen(): ?FightMen
    {
        return $this->fightMen;
    }

    public function setFightMen(?FightMen $fightMen): self
    {
        $this->fightMen = $fightMen;

        return $this;
    }
}
