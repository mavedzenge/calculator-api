<?php


namespace App\Entity\Traits;

use App\Utility\Hash;
use Doctrine\ORM\Mapping as ORM;

trait BaseTrait
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $hash;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModified;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDeleted;

    public function getId(): int
    {
        return $this->id;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getDateCreated(): \DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface  $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeInterface
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(\DateTimeInterface $dateDeleted): self
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate(): self
    {
        $this->dateModified = new \DateTimeImmutable();

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist(): self
    {
        if (null === $this->hash) {
            $this->hash = Hash::generate();
        }

        if (null === $this->dateCreated) {
            $this->dateCreated = new \DateTimeImmutable();
        }

        return $this;
    }
}