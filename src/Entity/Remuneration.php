<?php

namespace App\Entity;

use App\Repository\RemunerationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RemunerationRepository::class)
 */
class Remuneration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
