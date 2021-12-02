<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=FighterMen::class, mappedBy="origin")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $fighterMen->setOrigin($this);
        }

        return $this;
    }

    public function removeFighterMen(FighterMen $fighterMen): self
    {
        if ($this->fighterMens->removeElement($fighterMen)) {
            // set the owning side to null (unless already changed)
            if ($fighterMen->getOrigin() === $this) {
                $fighterMen->setOrigin(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getName();
    }
}
