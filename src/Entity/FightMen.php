<?php

namespace App\Entity;

use App\Repository\FightMenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\ErrorHandler\Collecting;

/**
 * @ORM\Entity(repositoryClass=FightMenRepository::class)
 */
class FightMen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=RoundMen::class, mappedBy="fightMen")
     */
    private $rounds;

    /**
     * @ORM\ManyToOne(targetEntity=FighterMen::class, inversedBy="redCornerFights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $redFighterMen;

    /**
     * @ORM\ManyToOne(targetEntity=FighterMen::class, inversedBy="blueCornerFights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $blueFighterMen;

    /**
     * @ORM\ManyToOne(targetEntity=FighterMen::class, inversedBy="victories")
     * @ORM\JoinColumn(nullable=true)
     */
    private $winner;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|RoundMen[]
     */
    public function getRounds(): Collection
    {
        return $this->rounds;
    }

    public function addRound(RoundMen $round): self
    {
        if ($this->rounds == null) {
            $this->rounds = new ArrayCollection();
        }
        if (!$this->rounds->contains($round)) {
            $this->rounds[] = $round;
            $round->setFightMen($this);
        }

        return $this;
    }

    public function removeRound(RoundMen $round): self
    {
        if ($this->rounds->removeElement($round)) {
            // set the owning side to null (unless already changed)
            if ($round->getFightMen() === $this) {
                $round->setFightMen(null);
            }
        }

        return $this;
    }

    public function getRedFighterMen(): ?FighterMen
    {
        return $this->redFighterMen;
    }

    public function setRedFighterMen(?FighterMen $redFighterMen): self
    {
        $this->redFighterMen = $redFighterMen;

        return $this;
    }

    public function getBlueFighterMen(): ?FighterMen
    {
        return $this->blueFighterMen;
    }

    public function setBlueFighterMen(?FighterMen $blueFighterMen): self
    {
        $this->blueFighterMen = $blueFighterMen;

        return $this;
    }

    public function getWinner(): ?FighterMen
    {
        return $this->winner;
    }

    public function setWinner(?FighterMen $winner): self
    {
        $this->winner = $winner;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

//    public function __toString()
//    {
//        $chaine = "";
//
//        foreach ( as round) {
//
//    }
//        return $chaine;
//    }
}
