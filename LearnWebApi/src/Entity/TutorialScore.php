<?php

namespace App\Entity;

use App\Repository\TutorialScoreRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Tutorial;
use App\Entity\User;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\ApiController;

#[ApiResource(
    description: 'App tutorials scores',
    operations: [
        new Get(),
        new Get(
            name: 'get a tutorial score',
            routeName: 'app_get_a_tutorial_score'
        ),
        new Get(
            name: 'get average tutorial score',
            routeName: 'app_average_tutorial_score'
        ),
        new Post(
            name: 'new tutorial score',
            routeName: 'app_tutorialscore_new'
        ),
        new Put(
            name: 'updated tutorial score',
            routeName: 'app_tutorialscore_update'
        ),
    ]
)]
#[ORM\Entity(repositoryClass: TutorialScoreRepository::class)]
class TutorialScore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tutorial $tutorial = null;

    #[ORM\ManyToOne(inversedBy: 'tutorialScores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    private ?int $score = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTutorial(): ?Tutorial
    {
        return $this->tutorial;
    }

    public function setTutorial(?Tutorial $tutorial): static
    {
        $this->tutorial = $tutorial;
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

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }
}
