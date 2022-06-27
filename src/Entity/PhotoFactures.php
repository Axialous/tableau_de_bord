<?php

namespace App\Entity;

use App\Repository\PhotoFacturesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoFacturesRepository::class)]
class PhotoFactures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Achats::class, inversedBy: 'photoFactures')]
    #[ORM\JoinColumn(nullable: false)]
    private $achats;

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

    public function getAchats(): ?Achats
    {
        return $this->achats;
    }

    public function setAchats(?Achats $achats): self
    {
        $this->achats = $achats;

        return $this;
    }
}
