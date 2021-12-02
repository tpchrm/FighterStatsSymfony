<?php

namespace App\Entity;

use App\Repository\FighterMenRepository;
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
     * @ORM\ManyToOne(targetEntity=FightMen::class, inversedBy="fighters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fightMen;

    /**
     * @ORM\OneToOne(targetEntity=FightMen::class, mappedBy="winner", cascade={"persist", "remove"})
     */
    private $wins;

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

    public function getFightMen(): ?FightMen
    {
        return $this->fightMen;
    }

    public function setFightMen(?FightMen $fightMen): self
    {
        $this->fightMen = $fightMen;

        return $this;
    }

    public function getWins(): ?FightMen
    {
        return $this->wins;
    }

    public function setWins(FightMen $wins): self
    {
        // set the owning side of the relation if necessary
        if ($wins->getWinner() !== $this) {
            $wins->setWinner($this);
        }

        $this->wins = $wins;

        return $this;
    }
}
