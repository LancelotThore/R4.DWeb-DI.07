<?php

namespace App\Entity;

use App\Repository\BriquesCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BriquesCategoriesRepository::class)]
class BriquesCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Brique::class, mappedBy: 'category_id')]
    private Collection $briques;

    public function __construct()
    {
        $this->briques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Brique>
     */
    public function getBriques(): Collection
    {
        return $this->briques;
    }

    public function addBrique(Brique $brique): static
    {
        if (!$this->briques->contains($brique)) {
            $this->briques->add($brique);
            $brique->setCategoryId($this);
        }

        return $this;
    }

    public function removeBrique(Brique $brique): static
    {
        if ($this->briques->removeElement($brique)) {
            // set the owning side to null (unless already changed)
            if ($brique->getCategoryId() === $this) {
                $brique->setCategoryId(null);
            }
        }

        return $this;
    }
}
