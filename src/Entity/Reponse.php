<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseRepository::class)
 */
class Reponse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $contenue;

    /**
     * @ORM\ManyToOne(targetEntity=question::class, inversedBy="reponses")
     */
    private $questions;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="reponses")
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(?string $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getQuestions(): ?question
    {
        return $this->questions;
    }

    public function setQuestions(?question $questions): self
    {
        $this->questions = $questions;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
