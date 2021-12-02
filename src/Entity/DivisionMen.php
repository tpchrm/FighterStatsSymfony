<?php

namespace App\Entity;

use App\Repository\DivisionMenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DivisionMenRepository::class)
 */
class DivisionMen
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
    private $division_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $division_eng;

    /**
     * @ORM\OneToMany(targetEntity=FighterMen::class, mappedBy="division")
     */
    private $fighterMens;

    public function __construct()
    {
        $this->fighterMens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDivisionFr(): ?string
    {
        return $this->division_fr;
    }

    public function setDivisionFr(string $division_fr): self
    {
        $this->division_fr = $division_fr;

        return $this;
    }

    public function getDivisionEng(): ?string
    {
        return $this->division_eng;
    }

    public function setDivisionEng(string $division_eng): self
    {
        $this->division_eng = $division_eng;

        return $this;
    }

    /**
     * @return Collection|FighterMen[]
     */
    public function getFighterMens(): Collection
    {
        return $this->fighterMens;
    }

    public function addFighterMen(FighterMen $fighterMen): self
    {
        if (!$this->fighterMens->contains($fighterMen)) {
            $this->fighterMens[] = $fighterMen;
            $fighterMen->setDivision($this);
        }

        return $this;
    }

    public function removeFighterMen(FighterMen $fighterMen): self
    {
        if ($this->fighterMens->removeElement($fighterMen)) {
            // set the owning side to null (unless already changed)
            if ($fighterMen->getDivision() === $this) {
                $fighterMen->setDivision(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getDivisionFr();
    }
}
