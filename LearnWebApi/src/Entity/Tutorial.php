<?php

namespace App\Entity;

use App\Repository\TutorialRepository;
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
    description: 'App tutorials',
    operations: [
        new Get(),
        new Get(
            name: 'get avaidable tutorials',
            routeName: 'app_tutorials_avaidable'
        ),
        new Get(
            name: 'get my tutorials',
            routeName: 'app_tutorial_mine'
        ),
        new Get(
            name: 'get all tutorials',
            routeName: 'app_tutorial_all'
        ),
        new Get(
            name: 'get tutorials filtered by title or description',
            routeName: 'app_tutorials_filtered_avaidable'
        ),
        new Get(
            name: 'get tutorials filtered by several fields',
            routeName: 'app_tutorials_filter'
        ),
        new Post(
            name: 'new tutorial v2',
            routeName: 'app_tutorial_new_v2'
        ),
        new GetCollection(),
        new Post(),
        new Put(),
        new Put(
            name: 'update tutorial v2',
            routeName: 'app_tutorial_update'
        ),
        new Put(
            name: 'update hidden tutorial',
            routeName: 'app_tutorial_update_hidden'
        ),
        new Patch(),
        new Delete(),
    ]
)]
#[ORM\Entity(repositoryClass: TutorialRepository::class)]
class Tutorial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var Collection<int, TutorialInCourse>
     */
    #[ORM\OneToMany(targetEntity: TutorialInCourse::class, mappedBy: 'tutorial')]
    private Collection $tutorialInCourses;

    /**
     * @var Collection<int, Page>
     */
    #[ORM\OneToMany(targetEntity: Page::class, mappedBy: 'tutorial')]
    private Collection $pages;

    #[ORM\ManyToOne(inversedBy: 'tutorials')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\Column]
    private ?bool $hidden = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $addDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $modDate = null;

    /**
     * @var Collection<int, TutorialScore>
     */
    #[ORM\OneToMany(targetEntity: TutorialScore::class, mappedBy: 'tutorial')]
    private Collection $scores;

    public function __construct()
    {
        $this->tutorialInCourses = new ArrayCollection();
        $this->pages = new ArrayCollection();
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

    /**
     * @return Collection<int, TutorialInCourse>
     */
    public function getTutorialInCourses(): Collection
    {
        return $this->tutorialInCourses;
    }

    public function addTutorialInCourse(TutorialInCourse $tutorialInCourse): static
    {
        if (!$this->tutorialInCourses->contains($tutorialInCourse)) {
            $this->tutorialInCourses->add($tutorialInCourse);
            $tutorialInCourse->setTutorial($this);
        }

        return $this;
    }

    public function removeTutorialInCourse(TutorialInCourse $tutorialInCourse): static
    {
        if ($this->tutorialInCourses->removeElement($tutorialInCourse)) {
            // set the owning side to null (unless already changed)
            if ($tutorialInCourse->getTutorial() === $this) {
                $tutorialInCourse->setTutorial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Page>
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }

    public function addPage(Page $page): static
    {
        if (!$this->pages->contains($page)) {
            $this->pages->add($page);
            $page->setTutorial($this);
        }

        return $this;
    }

    public function removePage(Page $page): static
    {
        if ($this->pages->removeElement($page)) {
            // set the owning side to null (unless already changed)
            if ($page->getTutorial() === $this) {
                $page->setTutorial(null);
            }
        }

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
     * @return Collection<int, TutorialScore>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(TutorialScore $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setTutorial($this);
        }

        return $this;
    }

    public function removeScore(TutorialScore $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getTutorial() === $this) {
                $score->setTutorial(null);
            }
        }

        return $this;
    }
}
