<?php

namespace App\Entity;

use App\Repository\FighterMenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FighterMenRepository::class)
 */
class FighterMen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="float")
     */
    private $height;

    /**
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @ORM\ManyToOne(targetEntity=DivisionMen::class, inversedBy="fighterMens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $division;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="fighterMens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $origin;

    /**
     * @ORM\OneToMany(targetEntity=FightMen::class, mappedBy="redFighterMen")
     */
    private $redCornerFights;

    /**
     * @ORM\OneToMany(targetEntity=FightMen::class, mappedBy="blueFighterMen")
     */
    private $blueCornerFights;

    /**
     * @ORM\OneToMany(targetEntity=FightMen::class, mappedBy="winner")
     */
    private $victories;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wins;

    public function __construct()
    {
        $this->fightsMen = new ArrayCollection();
        $this->redCornerFights = new ArrayCollection();
        $this->blueCornerFights = new ArrayCollection();
        $this->victories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getDivision(): ?DivisionMen
    {
        return $this->division;
    }

    public function setDivision(?DivisionMen $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getOrigin(): ?Country
    {
        return $this->origin;
    }

    public function setOrigin(?Country $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * @return Collection|FightMen[]
     */
    public function getRedCornerFights(): Collection
    {
        return $this->redCornerFights;
    }

    public function addRedCornerFight(FightMen $redCornerFight): self
    {
        if (!$this->redCornerFights->contains($redCornerFight)) {
            $this->redCornerFights[] = $redCornerFight;
            $redCornerFight->setRedFighterMen($this);
        }

        return $this;
    }

    public function removeRedCornerFight(FightMen $redCornerFight): self
    {
        if ($this->redCornerFights->removeElement($redCornerFight)) {
            // set the owning side to null (unless already changed)
            if ($redCornerFight->getRedFighterMen() === $this) {
                $redCornerFight->setRedFighterMen(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FightMen[]
     */
    public function getBlueCornerFights(): Collection
    {
        return $this->blueCornerFights;
    }

    public function addBlueCornerFight(FightMen $blueCornerFight): self
    {
        if (!$this->blueCornerFights->contains($blueCornerFight)) {
            $this->blueCornerFights[] = $blueCornerFight;
            $blueCornerFight->setBlueFighterMen($this);
        }

        return $this;
    }

    public function removeBlueCornerFight(FightMen $blueCornerFight): self
    {
        if ($this->blueCornerFights->removeElement($blueCornerFight)) {
            // set the owning side to null (unless already changed)
            if ($blueCornerFight->getBlueFighterMen() === $this) {
                $blueCornerFight->setBlueFighterMen(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->firstname . " " . $this->lastname;
    }

    /**
     * @return Collection|FightMen[]
     */
    public function getVictories(): Collection
    {
        return $this->victories;
    }

    public function addVictory(FightMen $victory): self
    {
        if (!$this->victories->contains($victory)) {
            $this->victories[] = $victory;
            $victory->setWinner($this);
        }

        return $this;
    }

    public function removeVictory(FightMen $victory): self
    {
        if ($this->victories->removeElement($victory)) {
            // set the owning side to null (unless already changed)
            if ($victory->getWinner() === $this) {
                $victory->setWinner(null);
            }
        }

        return $this;
    }

    public function getWins(): ?int
    {
        return $this->wins;
    }

    public function setWins(?int $wins): self
    {
        $this->wins = $wins;

        return $this;
    }
}
