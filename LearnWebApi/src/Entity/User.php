<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $userType = null;

    #[ORM\Column(length: 64)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $passwd = null;

    #[ORM\Column(length: 120)]
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

    public function __construct()
    {
        $this->created_courses = new ArrayCollection();
        $this->signedCourses = new ArrayCollection();
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
}
