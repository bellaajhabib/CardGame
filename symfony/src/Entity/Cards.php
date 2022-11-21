<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CardsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    denormalizationContext: ['groups' => ['user:write']],
    normalizationContext: ['groups' => ['user:read']],

)]
#[ORM\Entity(repositoryClass: CardsRepository::class)]
class Cards
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['user:read', 'user:write'])]
    private $id;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'array')]
    #[Groups(['user:read', 'user:write'])]
    private ?array $bagsCards = [];


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return array|null
     */
    public function getBagsCards(): ?array
    {
        return $this->bagsCards;
    }

    /**
     * @param array|null $bagsCards
     */
    public function setBagsCards(?array $bagsCards): void
    {
        $this->bagsCards = $bagsCards;
    }

}
