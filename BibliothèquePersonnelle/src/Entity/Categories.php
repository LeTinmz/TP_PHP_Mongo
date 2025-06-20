<?php

namespace App\Entity;


use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Books>
     */
    #[ORM\ManyToMany(targetEntity: Books::class, inversedBy: 'categories')]
    private Collection $bookCollection;

    #[ORM\Column(length: 50)]
    private ?string $categoryName = null;

    public function __construct()
    {
        $this->bookCollection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection<int, Books>
     */
    public function getBookCollection(): Collection
    {
        return $this->bookCollection;
    }

    public function addBookId(Books $bookId): static
    {
        if (!$this->bookCollection->contains($bookId)) {
            $this->bookCollection->add($bookId);
        }

        return $this;
    }

    public function removeBookId(Books $bookId): static
    {
        $this->bookCollection->removeElement($bookId);

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }

}
