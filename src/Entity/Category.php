<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity()
 * @ApiResource(
 *      collectionOperations={
 *          "get"={"name"="category_index"},
 *          "post"
 *      },
 *      itemOperations={"get", "put", "delete"},
 *      normalizationContext={"groups"={"category:read"}},
 *      denormalizationContext={"groups"={"category:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"title": "partial"})
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups({"category:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Groups({"category:read","category:write"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     *
     * @Groups({"category:read","category:write"})
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="category", orphanRemoval=true)
     */
    private $posts;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getPosts(): Collection
    {
        return clone $this->posts;
    }

    // public function addPost(Post $post): self
    // {
    //     if (!$this->posts->contains($post)) {
    //         $this->posts[] = $post;
    //         $post->setCategory($this);
    //     }

    //     return $this;
    // }

    // public function removePost(Post $post): self
    // {
    //     if ($this->posts->removeElement($post)) {
    //         // set the owning side to null (unless already changed)
    //         if ($post->getCategory() === $this) {
    //             $post->setCategory(null);
    //         }
    //     }

    //     return $this;
    // }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
