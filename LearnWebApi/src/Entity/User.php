<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    description: 'App users',
    operations: [
        new Get(),
        new Get(
            name: 'validate',
            routeName: 'app_user_validate'
        ),
        new Get(
            name: 'login',
            routeName: 'app_user_login'
        ),
        new Get(
            name: 'check_existence',
            routeName: 'app_user_check_existence'
        ),
        new Get(
            name: 'check_banned',
            routeName: 'app_user_check_banned'
        ),
        new Get(
            name: 'get_by_id',
            routeName: 'app_get_user_by_id'
        ),
        new Post(
            name: 'register',
            routeName: 'app_user_register'
        ),
        new Post(
            name: 'registeradmin',
            routeName: 'app_user_registeradmin'
        ),
        new GetCollection(),
        new Post(),
        new Put(),
        new Put(
            name: 'update ban user',
            routeName: 'app_user_update_ban'
        ),
        new Patch(),
        new Delete(),
    ]
)]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $userType = null;

    #[ORM\Column(length: 64)]
    private ?string $email = null;

    #[ORM\Column]
    private ?string $passwd = null;

    #[ORM\Column(length: 120, unique: true)]
    private ?string $nickname = null;

    #[ORM\Column]
    private ?bool $banned = null;

    /**
     * @var Collection<int, Course>
     */
    #[ORM\OneToMany(targetEntity: Course::class, mappedBy: 'author')]
    private Collection $created_courses;

    /**
     * @var Collection<int, Course>
     */
    #[ORM\ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
    private Collection $signedCourses;

    /**
     * @var Collection<int, Tutorial>
     */
    #[ORM\OneToMany(targetEntity: Tutorial::class, mappedBy: 'author')]
    private Collection $tutorials;

    /**
     * @var Collection<int, TutorialScore>
     */
    #[ORM\OneToMany(targetEntity: TutorialScore::class, mappedBy: 'user')]
    private Collection $tutorialScores;

    /**
     * @var Collection<int, CourseScore>
     */
    #[ORM\OneToMany(targetEntity: CourseScore::class, mappedBy: 'user')]
    private Collection $courseScores;

    public function __construct()
    {
        $this->created_courses = new ArrayCollection();
        $this->signedCourses = new ArrayCollection();
        $this->tutorials = new ArrayCollection();
        $this->tutorialScores = new ArrayCollection();
        $this->courseScores = new ArrayCollection();
    }

    public function getUserIdentifier(): string
    {
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUserType(): ?string
    {
        return $this->userType;
    }

    public function getRoles(): array
    {
        return [$this->userType]; 
    }

    public function setUserType(string $userType): static
    {
        $this->userType = $userType;

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

    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    public function getPassword(): ?string
    {
        return $this->passwd;
    }

    public function setPasswd(string $passwd): static
    {
        $this->passwd = $passwd;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function isBanned(): ?bool
    {
        return $this->banned;
    }

    public function setBanned(bool $banned): static
    {
        $this->banned = $banned;

        return $this;
    }

    public function eraseCredentials(): void
    {
        return;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCreatedCourses(): Collection
    {
        return $this->created_courses;
    }

    public function addCreatedCourse(Course $createdCourse): static
    {
        if (!$this->created_courses->contains($createdCourse)) {
            $this->created_courses->add($createdCourse);
            $createdCourse->setAuthor($this);
        }

        return $this;
    }

    public function removeCreatedCourse(Course $createdCourse): static
    {
        if ($this->created_courses->removeElement($createdCourse)) {
            // set the owning side to null (unless already changed)
            if ($createdCourse->getAuthor() === $this) {
                $createdCourse->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getSignedCourses(): Collection
    {
        return $this->signedCourses;
    }

    public function addSignedCourse(Course $signedCourse): static
    {
        if (!$this->signedCourses->contains($signedCourse)) {
            $this->signedCourses->add($signedCourse);
        }

        return $this;
    }

    public function removeSignedCourse(Course $signedCourse): static
    {
        $this->signedCourses->removeElement($signedCourse);

        return $this;
    }

    /**
     * @return Collection<int, Tutorial>
     */
    public function getTutorials(): Collection
    {
        return $this->tutorials;
    }

    public function addTutorial(Tutorial $tutorial): static
    {
        if (!$this->tutorials->contains($tutorial)) {
            $this->tutorials->add($tutorial);
            $tutorial->setAuthor($this);
        }

        return $this;
    }

    public function removeTutorial(Tutorial $tutorial): static
    {
        if ($this->tutorials->removeElement($tutorial)) {
            // set the owning side to null (unless already changed)
            if ($tutorial->getAuthor() === $this) {
                $tutorial->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TutorialScore>
     */
    public function getTutorialScores(): Collection
    {
        return $this->tutorialScores;
    }

    public function addTutorialScore(TutorialScore $tutorialScore): static
    {
        if (!$this->tutorialScores->contains($tutorialScore)) {
            $this->tutorialScores->add($tutorialScore);
            $tutorialScore->setUser($this);
        }

        return $this;
    }

    public function removeTutorialScore(TutorialScore $tutorialScore): static
    {
        if ($this->tutorialScores->removeElement($tutorialScore)) {
            // set the owning side to null (unless already changed)
            if ($tutorialScore->getUser() === $this) {
                $tutorialScore->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CourseScore>
     */
    public function getCourseScores(): Collection
    {
        return $this->courseScores;
    }

    public function addCourseScore(CourseScore $courseScore): static
    {
        if (!$this->courseScores->contains($courseScore)) {
            $this->courseScores->add($courseScore);
            $courseScore->setUser($this);
        }

        return $this;
    }

    public function removeCourseScore(CourseScore $courseScore): static
    {
        if ($this->courseScores->removeElement($courseScore)) {
            // set the owning side to null (unless already changed)
            if ($courseScore->getUser() === $this) {
                $courseScore->setUser(null);
            }
        }

        return $this;
    }
}
