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
     * @ORM\ManyToMany(targetEntity=FighterMen::class, inversedBy="fightsMen")
     */
    private $fighters;

    /**
     * @ORM\OneToMany(targetEntity=FighterMen::class, mappedBy="wins")
     */
    private $winner;

    public function __construct()
    {
        $this->fighters = new ArrayCollection();
        $this->winner = new ArrayCollection();
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
        }

        return $this;
    }

    public function removeFighter(FighterMen $fighter): self
    {
        $this->fighters->removeElement($fighter);

        return $this;
    }

    /**
     * @return Collection|FighterMen[]
     */
    public function getWinner(): Collection
    {
        return $this->winner;
    }

    public function addWinner(FighterMen $winner): self
    {
        if (!$this->winner->contains($winner)) {
            $this->winner[] = $winner;
            $winner->setWins($this);
        }

        return $this;
    }

    public function removeWinner(FighterMen $winner): self
    {
        if ($this->winner->removeElement($winner)) {
            // set the owning side to null (unless already changed)
            if ($winner->getWins() === $this) {
                $winner->setWins(null);
            }
        }

        return $this;
    }
}
