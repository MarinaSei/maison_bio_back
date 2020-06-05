<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitsRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"produits:read"}},
 *      denormalizationContext={"groups"={"produits:write"}}
 * )
 */
class Produits
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"produits:read", "produits:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produits:read", "produits:write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produits:read", "produits:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     * @Groups({"produits:read", "produits:write"})
     */
    private $prixTTCunit;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produits:read", "produits:write"})
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"produits:read", "produits:write"})
     */
    private $quantiteEnStock;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixTTCunit(): ?string
    {
        return $this->prixTTCunit;
    }

    public function setPrixTTCunit(string $prixTTCunit): self
    {
        $this->prixTTCunit = $prixTTCunit;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getQuantiteEnStock(): ?int
    {
        return $this->quantiteEnStock;
    }

    public function setQuantiteEnStock(int $quantiteEnStock): self
    {
        $this->quantiteEnStock = $quantiteEnStock;

        return $this;
    }
}
