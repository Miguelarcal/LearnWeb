<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
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

    /**
     * @var Collection<int, Language>
     */
    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'courses')]
    private Collection $languages;

    /**
     * @var Collection<int, Label>
     */
    #[ORM\ManyToMany(targetEntity: Label::class, inversedBy: 'courses')]
    private Collection $labels;

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

    public function __construct()
    {
        $this->languages = new ArrayCollection();
        $this->labels = new ArrayCollection();
        $this->students = new ArrayCollection();
        $this->tutorials = new ArrayCollection();
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

    /**
     * @return Collection<int, Language>
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): static
    {
        if (!$this->languages->contains($language)) {
            $this->languages->add($language);
        }

        return $this;
    }

    public function removeLanguage(Language $language): static
    {
        $this->languages->removeElement($language);

        return $this;
    }

    /**
     * @return Collection<int, Label>
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(Label $label): static
    {
        if (!$this->labels->contains($label)) {
            $this->labels->add($label);
        }

        return $this;
    }

    public function removeLabel(Label $label): static
    {
        $this->labels->removeElement($label);

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
}
