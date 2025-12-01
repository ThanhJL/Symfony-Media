<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $borrowing_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $returning_date = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $book_id = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowingDate(): ?\DateTime
    {
        return $this->borrowing_date;
    }

    public function setBorrowingDate(\DateTime $borrowing_date): static
    {
        $this->borrowing_date = $borrowing_date;

        return $this;
    }

    public function getReturningDate(): ?\DateTime
    {
        return $this->returning_date;
    }

    public function setReturningDate(\DateTime $returning_date): static
    {
        $this->returning_date = $returning_date;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getBookId(): ?Book
    {
        return $this->book_id;
    }

    public function setBookId(?Book $book_id): static
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
