<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocalidadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalidadRepository::class)
 * @ApiResource()
 */
class Localidad
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $l_distrito;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $l_nom_dis;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $l_departamento;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $l_nom_dpto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nodo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLDistrito(): ?string
    {
        return $this->l_distrito;
    }

    public function setLDistrito(string $l_distrito): self
    {
        $this->l_distrito = $l_distrito;

        return $this;
    }

    public function getLNomDis(): ?string
    {
        return $this->l_nom_dis;
    }

    public function setLNomDis(string $l_nom_dis): self
    {
        $this->l_nom_dis = $l_nom_dis;

        return $this;
    }

    public function getLDepartamento(): ?string
    {
        return $this->l_departamento;
    }

    public function setLDepartamento(string $l_departamento): self
    {
        $this->l_departamento = $l_departamento;

        return $this;
    }

    public function getLNomDpto(): ?string
    {
        return $this->l_nom_dpto;
    }

    public function setLNomDpto(string $l_nom_dpto): self
    {
        $this->l_nom_dpto = $l_nom_dpto;

        return $this;
    }

    public function getNodo(): ?string
    {
        return $this->nodo;
    }

    public function setNodo(string $nodo): self
    {
        $this->nodo = $nodo;

        return $this;
    }
}
