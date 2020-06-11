<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitPanierRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProduitPanierRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"produits:read"}},
 *      denormalizationContext={"groups"={"produits:write"}}
 * )
 */
class ProduitPanier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"produitPanier:read", "produitPanier:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"produitPanier:read", "produitPanier:write"})
     * @ORM\ManyToOne(targetEntity=Produits::class, cascade={"persist", "remove"})
     */
    private $idProduit;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"produitPanier:read", "produitPanier:write"})
     * 
     */
    private $quantiteProduit;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"produitPanier:read", "produitPanier:write"})
     * @ORM\ManyToOne(targetEntity=Panier::class, cascade={"persist", "remove"})
     */
    private $idPanier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function setIdProduit(int $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getQuantiteProduit(): ?int
    {
        return $this->quantiteProduit;
    }

    public function setQuantiteProduit(int $quantiteProduit): self
    {
        $this->quantiteProduit = $quantiteProduit;

        return $this;
    }

    public function getIdPanier(): ?int
    {
        return $this->idPanier;
    }

    public function setIdPanier(int $idPanier): self
    {
        $this->idPanier = $idPanier;

        return $this;
    }
}
