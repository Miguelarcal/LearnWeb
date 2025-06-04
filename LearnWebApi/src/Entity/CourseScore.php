<?php

namespace App\Entity;

use App\Repository\CourseScoreRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Course;
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
    description: 'App courses scores',
    operations: [
        new Get(),
        new Get(
            name: 'get a course score',
            routeName: 'app_get_a_course_score'
        ),
        new Get(
            name: 'get average course score',
            routeName: 'app_average_course_score'
        ),
        new Post(
            name: 'new course score',
            routeName: 'app_coursescore_new'
        ),
        new Put(
            name: 'updated course score',
            routeName: 'app_coursescore_update'
        ),
    ]
)]
#[ORM\Entity(repositoryClass: CourseScoreRepository::class)]
class CourseScore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Course $course = null;

    #[ORM\ManyToOne(inversedBy: 'courseScores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    private ?int $score = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): static
    {
        $this->course = $course;

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
