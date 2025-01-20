<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $edad = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column(length: 1200, nullable: true)]
    private ?string $biografia = null;

    /**
     * @var Collection<int, Tareas>
     */
    #[ORM\OneToMany(targetEntity: Tareas::class, mappedBy: 'usuario')]
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

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): static
    {
        $this->edad = $edad;

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

    public function getBiografia(): ?string
    {
        return $this->biografia;
    }

    public function setBiografia(?string $biografia): static
    {
        $this->biografia = $biografia;

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
            $tarea->setUsuario($this);
        }

        return $this;
    }

    public function removeTarea(Tareas $tarea): static
    {
        if ($this->tareas->removeElement($tarea)) {
            // set the owning side to null (unless already changed)
            if ($tarea->getUsuario() === $this) {
                $tarea->setUsuario(null);
            }
        }

        return $this;
    }
}
