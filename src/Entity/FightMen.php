<?php

namespace App\Entity;

use App\Repository\FightMenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToMany(targetEntity=FighterMen::class, mappedBy="fightMen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fighters;

    /**
     * @ORM\OneToOne(targetEntity=FighterMen::class, inversedBy="wins", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $winner;

    public function __construct()
    {
        $this->rounds = new ArrayCollection();
        $this->fighters = new ArrayCollection();
    }

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

    /**
     * @return Collection|FighterMen[]
     */
    public function getFighters(): Collection
    {
        return $this->fighters;
    }

    public function addFighter(FighterMen $fighter): self
    {
        if (!$this->fighters->contains($fighter)) {
            $this->fighters[] = $fighter;
            $fighter->setFightMen($this);
        }

        return $this;
    }

    public function removeFighter(FighterMen $fighter): self
    {
        if ($this->fighters->removeElement($fighter)) {
            // set the owning side to null (unless already changed)
            if ($fighter->getFightMen() === $this) {
                $fighter->setFightMen(null);
            }
        }

        return $this;
    }

    public function getWinner(): ?FighterMen
    {
        return $this->winner;
    }

    public function setWinner(FighterMen $winner): self
    {
        $this->winner = $winner;

        return $this;
    }
}
