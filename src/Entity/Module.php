<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?filiere $filiere_id = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?semestre $semestre_id = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?professeur $professeur_id = null;

    #[ORM\OneToMany(mappedBy: 'module_id', targetEntity: Note::class)]
    private Collection $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getFiliereId(): ?filiere
    {
        return $this->filiere_id;
    }

    public function setFiliereId(?filiere $filiere_id): static
    {
        $this->filiere_id = $filiere_id;

        return $this;
    }

    public function getSemestreId(): ?semestre
    {
        return $this->semestre_id;
    }

    public function setSemestreId(?semestre $semestre_id): static
    {
        $this->semestre_id = $semestre_id;

        return $this;
    }

    public function getProfesseurId(): ?professeur
    {
        return $this->professeur_id;
    }

    public function setProfesseurId(?professeur $professeur_id): static
    {
        $this->professeur_id = $professeur_id;

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): static
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setModuleId($this);
        }

        return $this;
    }

    public function removeNote(Note $note): static
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getModuleId() === $this) {
                $note->setModuleId(null);
            }
        }

        return $this;
    }
}
