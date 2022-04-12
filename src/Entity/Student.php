<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[ApiResource (normalizationContext: ['groups' => ['student']], denormalizationContext: ["groups" => ['student_write']])]
class Student extends User
{
    #[ORM\Column(type: 'string')]
    #[Groups(["student", "student_write"])]
    private $gender;

    #[ORM\ManyToOne(targetEntity: SchoolClass::class, inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups(["student", "student_write"])]
    private $schoolClass;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Grade::class, orphanRemoval: true)]
    #[Groups("student")]
    private $grades;

    #[ORM\Column(type: 'boolean')]
    #[Groups(["student", "student_write"])]
    private $isExcluded = false;

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

    public function getIsExcluded(): ?bool
    {
        return $this->isExcluded;
    }

    public function setIsExcluded(bool $isExcluded): self
    {
        $this->isExcluded = $isExcluded;

        return $this;
    }
}
