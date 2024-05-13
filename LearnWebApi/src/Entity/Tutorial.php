<?php

namespace App\Entity;

use App\Repository\TutorialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
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

    /**
     * @var Collection<int, Language>
     */
    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'tutorials')]
    private Collection $languages;

    /**
     * @var Collection<int, Label>
     */
    #[ORM\ManyToMany(targetEntity: Label::class, inversedBy: 'tutorials')]
    private Collection $labels;

    public function __construct()
    {
        $this->tutorialInCourses = new ArrayCollection();
        $this->pages = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->labels = new ArrayCollection();
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
}
