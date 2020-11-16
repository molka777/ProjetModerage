<?php

namespace App\Entity;

use App\Repository\SondageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SondageRepository::class)
 */
class Sondage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbParticipant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbReponse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbQuestion;

    /**
     * @ORM\OneToOne(targetEntity=sujet::class, cascade={"persist", "remove"})
     */
    private $sujets;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="sondages", orphanRemoval=true)
     */
    private $questions;

    /**
     * @ORM\OneToOne(targetEntity=Remise::class, cascade={"persist", "remove"})
     */
    private $Remises;

    /**
     * @ORM\OneToOne(targetEntity=Cadeau::class, cascade={"persist", "remove"})
     */
    private $cadeaux;

    /**
     * @ORM\OneToOne(targetEntity=NouveauType::class, cascade={"persist", "remove"})
     */
    private $nouveaux;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNbParticipant(): ?int
    {
        return $this->nbParticipant;
    }

    public function setNbParticipant(?int $nbParticipant): self
    {
        $this->nbParticipant = $nbParticipant;

        return $this;
    }

    public function getNbReponse(): ?int
    {
        return $this->nbReponse;
    }

    public function setNbReponse(?int $nbReponse): self
    {
        $this->nbReponse = $nbReponse;

        return $this;
    }

    public function getNbQuestion(): ?int
    {
        return $this->nbQuestion;
    }

    public function setNbQuestion(?int $nbQuestion): self
    {
        $this->nbQuestion = $nbQuestion;

        return $this;
    }

    public function getSujets(): ?sujet
    {
        return $this->sujets;
    }

    public function setSujets(?sujet $sujets): self
    {
        $this->sujets = $sujets;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setSondages($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getSondages() === $this) {
                $question->setSondages(null);
            }
        }

        return $this;
    }

    public function getRemises(): ?Remise
    {
        return $this->Remises;
    }

    public function setRemises(?Remise $Remises): self
    {
        $this->Remises = $Remises;

        return $this;
    }

    public function getCadeaux(): ?Cadeau
    {
        return $this->cadeaux;
    }

    public function setCadeaux(?Cadeau $cadeaux): self
    {
        $this->cadeaux = $cadeaux;

        return $this;
    }

    public function getNouveaux(): ?NouveauType
    {
        return $this->nouveaux;
    }

    public function setNouveaux(?NouveauType $nouveaux): self
    {
        $this->nouveaux = $nouveaux;

        return $this;
    }
}
