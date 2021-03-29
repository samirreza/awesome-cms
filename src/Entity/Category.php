<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="category", orphanRemoval=true)
     */
    private $posts;

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
}
