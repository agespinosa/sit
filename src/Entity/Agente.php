<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AgenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenteRepository::class)
 * @ApiResource()
 */
class Agente
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
    private $nombreApellido;

    /**
     * @ORM\ManyToOne(targetEntity=Ubicacion::class, inversedBy="agentes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ubicacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreApellido(): ?string
    {
        return $this->nombreApellido;
    }

    public function setNombreApellido(string $nombreApellido): self
    {
        $this->nombreApellido = $nombreApellido;

        return $this;
    }

    public function getUbicacion(): ?Ubicacion
    {
        return $this->ubicacion;
    }

    public function setUbicacion(?Ubicacion $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }
}
