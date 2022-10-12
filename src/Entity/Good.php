<?php

namespace App\Entity;

use App\Repository\GoodRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GoodRepository::class)]
class Good
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $category_id = null;
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $manufacturer_id = null;

    #[ORM\Column]
    #[Groups(['read'])]
    private float $price;

    #[ORM\Column]
    #[Groups(['read'])]
    private int $year;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private string $name;

    public function __serialize(): array
    {
        return [
            "price" => $this->price,
        ];
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    /**
     * @return int|null
     */
    public function getManufacturerId(): ?int
    {
        return $this->manufacturer_id;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
