<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $username = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $score = null;

    #[ORM\OneToMany(targetEntity: Question::class, mappedBy: 'user')]
    private Collection $askedQuestions;

    #[ORM\OneToMany(targetEntity: Answer::class, mappedBy: 'user')]
    private Collection $providedAnswers;

    public function __construct()
    {
        $this->askedQuestions = new ArrayCollection();
        $this->providedAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getAskedQuestions(): Collection
    {
        return $this->askedQuestions;
    }

    public function addAskedQuestion(Question $askedQuestion): static
    {
        if (!$this->askedQuestions->contains($askedQuestion)) {
            $this->askedQuestions->add($askedQuestion);
            $askedQuestion->setUser($this);
        }

        return $this;
    }

    public function removeAskedQuestion(Question $askedQuestion): static
    {
        if ($this->askedQuestions->removeElement($askedQuestion)) {
            // set the owning side to null (unless already changed)
            if ($askedQuestion->getUser() === $this) {
                $askedQuestion->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getProvidedAnswers(): Collection
    {
        return $this->providedAnswers;
    }

    public function addProvidedAnswer(Answer $providedAnswer): static
    {
        if (!$this->providedAnswers->contains($providedAnswer)) {
            $this->providedAnswers->add($providedAnswer);
            $providedAnswer->setUser($this);
        }

        return $this;
    }

    public function removeProvidedAnswer(Answer $providedAnswer): static
    {
        if ($this->providedAnswers->removeElement($providedAnswer)) {
            // set the owning side to null (unless already changed)
            if ($providedAnswer->getUser() === $this) {
                $providedAnswer->setUser(null);
            }
        }

        return $this;
    }

   
}
