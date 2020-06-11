<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PanierRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"produits:read"}},
 *      denormalizationContext={"groups"={"produits:write"}}
 * )
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"panier:read", "panier:write"})
     * @ORM\OneToMany(targetEntity=ProduitPanier::class, cascade={"persist", "remove"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"panier:read", "panier:write"})
     */
    private $totalTTC;

    /**
     * @ORM\Column(type="array", nullable=true)
     * @Groups({"panier:read", "panier:write"})
     */
    private $tableauProduit = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalTTC(): ?int
    {
        return $this->totalTTC;
    }

    public function setTotalTTC(int $totalTTC): self
    {
        $this->totalTTC = $totalTTC;

        return $this;
    }

    public function getTableauProduit(): ?array
    {
        return $this->tableauProduit;
    }

    public function setTableauProduit(?array $tableauProduit): self
    {
        $this->tableauProduit = $tableauProduit;

        return $this;
    }
}
