<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RecursoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecursoRepository::class)
 * @ApiResource()
 */
class Recurso
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
    private $ip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $red;

    /**
     * @ORM\ManyToOne(targetEntity=Ubicacion::class, inversedBy="recursos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ubicacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getRed(): ?string
    {
        return $this->red;
    }

    public function setRed(string $red): self
    {
        $this->red = $red;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
