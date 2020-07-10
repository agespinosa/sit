<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UbicacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UbicacionRepository::class)
 * @ApiResource()
 */
class Ubicacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Agente::class, mappedBy="ubicacion")
     */
    private $agentes;

    /**
     * @ORM\OneToMany(targetEntity=Recurso::class, mappedBy="ubicacion")
     */
    private $recursos;

    /**
     * @ORM\ManyToOne(targetEntity=Localidad::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $localidad;

    public function __construct()
    {
        $this->agentes = new ArrayCollection();
        $this->recursos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Agente[]
     */
    public function getAgentes(): Collection
    {
        return $this->agentes;
    }

    public function addAgente(Agente $agente): self
    {
        if (!$this->agentes->contains($agente)) {
            $this->agentes[] = $agente;
            $agente->setUbicacion($this);
        }

        return $this;
    }

    public function removeAgente(Agente $agente): self
    {
        if ($this->agentes->contains($agente)) {
            $this->agentes->removeElement($agente);
            // set the owning side to null (unless already changed)
            if ($agente->getUbicacion() === $this) {
                $agente->setUbicacion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Recurso[]
     */
    public function getRecursos(): Collection
    {
        return $this->recursos;
    }

    public function addRecurso(Recurso $recurso): self
    {
        if (!$this->recursos->contains($recurso)) {
            $this->recursos[] = $recurso;
            $recurso->setUbicacion($this);
        }

        return $this;
    }

    public function removeRecurso(Recurso $recurso): self
    {
        if ($this->recursos->contains($recurso)) {
            $this->recursos->removeElement($recurso);
            // set the owning side to null (unless already changed)
            if ($recurso->getUbicacion() === $this) {
                $recurso->setUbicacion(null);
            }
        }

        return $this;
    }

    public function getLocalidad(): ?Localidad
    {
        return $this->localidad;
    }

    public function setLocalidad(?Localidad $localidad): self
    {
        $this->localidad = $localidad;

        return $this;
    }
}
