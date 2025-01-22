<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

#[ORM\Entity(repositoryClass: CategoriaRepository::class)]
class Categoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]

    private ?string $nombre = null;

    /**
     * @var Collection<int, Tareas>
     */
    #[ORM\OneToMany(targetEntity: Tareas::class, mappedBy: 'categoria')]
    private Collection $tareas;

    public function __construct()
    {
        $this->tareas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Tareas>
     */
    public function getTareas(): Collection
    {
        return $this->tareas;
    }

    public function addTarea(Tareas $tarea): static
    {
        if (!$this->tareas->contains($tarea)) {
            $this->tareas->add($tarea);
            $tarea->setCategoria($this);
        }

        return $this;
    }

    public function removeTarea(Tareas $tarea): static
    {
        if ($this->tareas->removeElement($tarea)) {
            // set the owning side to null (unless already changed)
            if ($tarea->getCategoria() === $this) {
                $tarea->setCategoria(null);
            }
        }

        return $this;
    }

    //validacion
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('nombre', new Assert\NotBlank([
            'message' => 'Por favor, introduce un nombre para la categoria',
        ]));
        // $metadata->addPropertyConstraint('nombre', new Assert\Regex([
        //     'pattern' => '/^[a-zA-Z0-9_]+$/',
        //     'message' => 'El nombre solo puede contener letras, números y guiones bajos',
        // ]));
    }

    public function __toString(): string
    {
        return $this->nombre;
    }
}
