<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\ApiController;

#[ApiResource(
    description: 'App courses',
    operations: [
        new Get(),
        new Get(
            name: 'get avaidable courses',
            routeName: 'app_courses_avaidable'
        ),
        new Get(
            name: 'get my courses',
            routeName: 'app_course_mine'
        ),
        new Get(
            name: 'get my courses filtered',
            routeName: 'app_courses_filter'
        ),
        new Post(
            name: 'new course v2',
            routeName: 'app_course_new_v2'
        ),
        new GetCollection(),
        new Post(),
        new Put(),
        new Put(
            name: 'get update course',
            routeName: 'app_course_update'
        ),
        new Put(
            name: 'update hidden course',
            routeName: 'app_course_update_hidden'
        ),
        new Patch(),
        new Delete(),
    ]
)]
#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 600)]
    private ?string $description = null;

    #[ORM\Column(length: 60)]
    private ?string $difficulty = null;

    #[ORM\ManyToOne(inversedBy: 'created_courses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'signedCourses')]
    private Collection $students;

    /**
     * @var Collection<int, TutorialInCourse>
     */
    #[ORM\OneToMany(targetEntity: TutorialInCourse::class, mappedBy: 'course')]
    private Collection $tutorials;

    #[ORM\Column]
    private ?bool $hidden = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $addDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $modDate = null;

    /**
     * @var Collection<int, CourseScore>
     */
    #[ORM\OneToMany(targetEntity: CourseScore::class, mappedBy: 'course')]
    private Collection $scores;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->tutorials = new ArrayCollection();
        $this->scores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(User $student): static
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
            $student->addSignedCourse($this);
        }

        return $this;
    }

    public function removeStudent(User $student): static
    {
        if ($this->students->removeElement($student)) {
            $student->removeSignedCourse($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, TutorialInCourse>
     */
    public function getTutorials(): Collection
    {
        return $this->tutorials;
    }

    public function addTutorial(TutorialInCourse $tutorial): static
    {
        if (!$this->tutorials->contains($tutorial)) {
            $this->tutorials->add($tutorial);
            $tutorial->setCourse($this);
        }

        return $this;
    }

    public function removeTutorial(TutorialInCourse $tutorial): static
    {
        if ($this->tutorials->removeElement($tutorial)) {
            // set the owning side to null (unless already changed)
            if ($tutorial->getCourse() === $this) {
                $tutorial->setCourse(null);
            }
        }

        return $this;
    }

    public function isHidden(): ?bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): static
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getAddDate(): ?\DateTimeInterface
    {
        return $this->addDate;
    }

    public function setAddDate(\DateTimeInterface $addDate): static
    {
        $this->addDate = $addDate;

        return $this;
    }

    public function getModDate(): ?\DateTimeInterface
    {
        return $this->modDate;
    }

    public function setModDate(\DateTimeInterface $modDate): static
    {
        $this->modDate = $modDate;

        return $this;
    }

    /**
     * @return Collection<int, CourseScore>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(CourseScore $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setCourse($this);
        }

        return $this;
    }

    public function removeScore(CourseScore $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getCourse() === $this) {
                $score->setCourse(null);
            }
        }

        return $this;
    }
}
