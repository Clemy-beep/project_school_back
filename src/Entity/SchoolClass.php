<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SchoolClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SchoolClassRepository::class)]
#[ApiResource (normalizationContext: ['groups' => ['schoolclass']])]
class SchoolClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("schoolclass")]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(["schoolclass", "student"])]
    private $level;

    #[ORM\OneToMany(mappedBy: 'schoolClass', targetEntity: Student::class, orphanRemoval: true)]
    #[Groups("schoolclass")]
    private $students;

    #[ORM\OneToOne(inversedBy: 'schoolClass', targetEntity: Teacher::class, cascade: ['persist', 'persist'])]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups(["schoolclass", "student"])]
    private $teacher;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setSchoolClass($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getSchoolClass() === $this) {
                $student->setSchoolClass(null);
            }
        }

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }
}
