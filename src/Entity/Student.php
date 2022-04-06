<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[ApiResource]
class Student extends User
{
    #[ORM\Column(type: 'string')]
    private $gender;

    #[ORM\ManyToOne(targetEntity: SchoolClass::class, inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private $schoolClass;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Grade::class, orphanRemoval: true)]
    private $grades;

    public function __construct()
    {
        $this->grades = new ArrayCollection();
    }


    public function getGender(): ?string
    {
        return $this->gender;
    }
  
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getSchoolClass(): ?SchoolClass
    {
        return $this->schoolClass;
    }

    public function setSchoolClass(?SchoolClass $schoolClass): self
    {
        $this->schoolClass = $schoolClass;

        return $this;
    }

    /**
     * @return Collection<int, Grade>
     */
    public function getGrades(): Collection
    {
        return $this->grades;
    }

    public function addGrade(Grade $grade): self
    {
        if (!$this->grades->contains($grade)) {
            $this->grades[] = $grade;
            $grade->setStudent($this);
        }

        return $this;
    }

    public function removeGrade(Grade $grade): self
    {
        if ($this->grades->removeElement($grade)) {
            // set the owning side to null (unless already changed)
            if ($grade->getStudent() === $this) {
                $grade->setStudent(null);
            }
        }

        return $this;
    }
}
