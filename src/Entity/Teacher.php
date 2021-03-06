<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
#[ApiResource (normalizationContext: ['groups' => ['teacher']], denormalizationContext: ["groups" => ['teacher_write']])]
class Teacher extends User
{
    #[ORM\Column(type: 'integer')]
    #[Groups(["teacher", "teacher_write"])]
    private $salary;

    #[ORM\Column(type: 'integer')]
    #[Groups(["teacher", "teacher_write"])]
    private $seniority;

    #[ORM\Column(type: 'integer')]
    #[Groups(["teacher", "teacher_write"])]
    private $age;

    #[ORM\OneToOne(mappedBy: 'teacher', targetEntity: SchoolClass::class, cascade: ['persist', 'remove'])]
    #[Groups(["teacher"])]
    private $schoolClass;

    /**
     * Get the value of salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     */
    public function setSalary($salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getSeniority(): ?int
    {
        return $this->seniority;
    }

    public function setSeniority(int $seniority): self
    {
        $this->seniority = $seniority;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSchoolClass(): ?SchoolClass
    {
        return $this->schoolClass;
    }

    public function setSchoolClass(SchoolClass $schoolClass): self
    {
        // set the owning side of the relation if necessary
        if ($schoolClass->getTeacher() !== $this) {
            $schoolClass->setTeacher($this);
        }

        $this->schoolClass = $schoolClass;

        return $this;
    }
}
