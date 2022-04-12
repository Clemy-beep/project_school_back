<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\SchoolClass;
use App\Entity\Student;
use App\Entity\Teacher;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $pwd = "12345678";
        $email = "parent@mail.com";

        $secondYearTeacher = new Teacher();
        $hashpwd = $this->encoder->hashPassword($secondYearTeacher, $pwd);
        $secondYearTeacher->setRoles(['ROLE_TEACHER'])->setfirstname('Jean')->setlastname('Delenoix')->setEmail("delenoix_j@augustin.com")->setUsername("delenoix_j")->setPassword($hashpwd);
        $secondYearTeacher->setSalary(1300)->setSeniority(2)->setAge(35);
        $manager->persist($secondYearTeacher);

        $thirdYearTeacher = new Teacher();
        $hashpwd = $this->encoder->hashPassword($secondYearTeacher, $pwd);
        $thirdYearTeacher->setRoles(['ROLE_TEACHER'])->setfirstname('Justine')->setlastname('Bekritch')->setEmail("bekritch_j@augustin.com")->setUsername("bekritch_j")->setPassword($hashpwd);
        $thirdYearTeacher->setSalary(1200)->setSeniority(1)->setAge(28);
        $manager->persist($thirdYearTeacher);   
        
        $fourthYearTeacher = new Teacher();
        $hashpwd = $this->encoder->hashPassword($secondYearTeacher, $pwd);
        $fourthYearTeacher->setRoles(['ROLE_TEACHER'])->setfirstname('Greta')->setlastname('Garbo')->setEmail("garbo_g@augustin.com")->setUsername("garbo_g")->setPassword($hashpwd);
        $fourthYearTeacher->setSalary(1750)->setSeniority(50)->setAge(54);
        $manager->persist($fourthYearTeacher);   
        
        $fifthYearTeacher = new Teacher();
        $hashpwd = $this->encoder->hashPassword($secondYearTeacher, $pwd);
        $fifthYearTeacher->setRoles(['ROLE_TEACHER'])->setfirstname('Georges')->setlastname('Ghelain')->setEmail("ghelain_g@augustin.com")->setUsername("ghelain_g")->setPassword($hashpwd);
        $fifthYearTeacher->setSalary(1800)->setSeniority(6)->setAge(47);
        $manager->persist($fifthYearTeacher);   
        
        $sixthYearTeacher = new Teacher();
        $hashpwd = $this->encoder->hashPassword($secondYearTeacher, $pwd);
        $sixthYearTeacher->setRoles(['ROLE_TEACHER'])->setfirstname('Gisèle')->setlastname('Charbonnier')->setEmail("charbonnier_g@augustin.com")->setUsername("charbonnier_g")->setPassword($hashpwd);
        $sixthYearTeacher->setSalary(2000)->setSeniority(35)->setAge(65);
        $manager->persist($sixthYearTeacher);

        $secondYearClass = new SchoolClass();
        $secondYearClass->setTeacher($secondYearTeacher)->setLevel("Cours Préparatoire");

        $thirdYearClass = new SchoolClass();
        $thirdYearClass->setTeacher($thirdYearTeacher)->setLevel("Cours Elémentaire 1");

        $fourthYearClass = new SchoolClass();
        $fourthYearClass->setTeacher($fourthYearTeacher)->setLevel("Cours Elémentaire 2");
        $fifthYearClass = new SchoolClass();      
        $fifthYearClass->setTeacher($fifthYearTeacher)->setLevel("Cours Moyen 1");
        $sixthYearClass = new SchoolClass();
        $sixthYearClass->setTeacher($sixthYearTeacher)->setLevel("Cours Moyen 2");


        $secondYearStudent1 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent1, $pwd);
        $secondYearStudent1->setEmail($email)->setfirstname('Levy')->setlastname('Allon')->setPassword($hashpwd)->setUsername("allon_l");
        $secondYearStudent1->setGender("Non-binary")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent1);
       
        $secondYearStudent0 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent0, $pwd);
        $secondYearStudent0->setEmail($email)->setfirstname('Matthew')->setlastname('Becker')->setPassword($hashpwd)->setUsername("becker_m");
        $secondYearStudent0->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent0);

        $secondYearStudent2 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent2, $pwd);
        $secondYearStudent2->setEmail($email)->setfirstname('Chetan')->setlastname('Balwe')->setPassword($hashpwd)->setUsername("balwe_c");
        $secondYearStudent2->setGender("Female")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent2);
        
        $secondYearStudent = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent, $pwd);
        $secondYearStudent->setEmail($email)->setfirstname('Hugo')->setlastname('Bacard')->setPassword($hashpwd)->setUsername("bacard_h");
        $secondYearStudent->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent);
        
        $secondYearStudent3 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent3, $pwd);
        $secondYearStudent3->setEmail($email)->setfirstname('Luc')->setlastname('Belair')->setPassword($hashpwd)->setUsername("belair_l");
        $secondYearStudent3->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent3);
        
        $secondYearStudent4 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent4, $pwd);
        $secondYearStudent4->setEmail($email)->setfirstname('Vladimir')->setlastname('Berkovitch')->setPassword($hashpwd)->setUsername("berkovitch_v");
        $secondYearStudent4->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent4);
        
        $secondYearStudent5 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent5, $pwd);
        $secondYearStudent5->setEmail($email)->setfirstname('Benoit')->setlastname('Bertarnd')->setPassword($hashpwd)->setUsername("bertarnd_b");
        $secondYearStudent5->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent5);
        
        $secondYearStudent6 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent6, $pwd);
        $secondYearStudent6->setEmail($email)->setfirstname('Prasenjit')->setlastname('Rastafor')->setPassword($hashpwd)->setUsername("rastafor_p");
        $secondYearStudent6->setGender("Female")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent6);
        
        $secondYearStudent7 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent7, $pwd);
        $secondYearStudent7->setEmail($email)->setfirstname('Thomas')->setlastname('Blossier')->setPassword($hashpwd)->setUsername("blossier_t");
        $secondYearStudent7->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent7);
        
        $secondYearStudent8 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent8, $pwd);
        $secondYearStudent8->setEmail($email)->setfirstname('Alexandra')->setlastname('Bouyahad')->setPassword($hashpwd)->setUsername("bouyahad_a");
        $secondYearStudent8->setGender("Female")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent8);
        
        $secondYearStudent9 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent9, $pwd);
        $secondYearStudent9->setEmail($email)->setfirstname('Paul')->setlastname('Pellerin')->setPassword($hashpwd)->setUsername("pellerin_p");
        $secondYearStudent9->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent9);

        $secondYearStudent10 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent10, $pwd);
        $secondYearStudent10->setEmail($email)->setfirstname('Brandon')->setlastname('Uscello')->setPassword($hashpwd)->setUsername("uscello_b");
        $secondYearStudent10->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent10);
        
        $secondYearStudent11 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent11, $pwd);
        $secondYearStudent11->setEmail($email)->setfirstname('Lea')->setlastname('Brugalle')->setPassword($hashpwd)->setUsername("brugalle_l");
        $secondYearStudent11->setGender("Female")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent11);
        
        $secondYearStudent12 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent12, $pwd);
        $secondYearStudent12->setEmail($email)->setfirstname('Erwan')->setlastname('Bissien')->setPassword($hashpwd)->setUsername("bissien_e");
        $secondYearStudent12->setGender("Male")->setSchoolClass($secondYearClass);;
        $manager->persist($secondYearStudent12);
        
        $secondYearStudent13 = new Student();
        $hashpwd = $this->encoder->hashPassword($secondYearStudent13, $pwd);
        $secondYearStudent13->setEmail($email)->setfirstname('Dylan')->setlastname('Pietkochvky')->setPassword($hashpwd)->setUsername("pietkochvky_d");
        $secondYearStudent13->setGender("Male")->setSchoolClass($secondYearClass);
        $manager->persist($secondYearStudent13);
        
        $director = new User();
        $hashpwd = $this->encoder->hashPassword($director, $pwd);
        $director->setRoles(['ROLE_ADMIN'])->setfirstname('Jean-Jacques')->setlastname('Goldman')->setPassword($pwd)->setEmail('director@gsaugustin.com')->setPassword($hashpwd)->setUsername('goldman_jj');
        $manager->persist($director);
        
        $historyCourse = new Course();
        $historyCourse->setName("Histoire");
        $manager->persist($historyCourse);

        $frenchCourse = new Course();
        $frenchCourse->setName("Français");
        $manager->persist($frenchCourse);

        $mathCourse = new Course();
        $mathCourse->setName("Math");
        $manager->persist($mathCourse);

        $sportCourse = new Course();
        $sportCourse->setName("Sport");
        $manager->persist($sportCourse);

        $scienceCourse = new Course();
        $scienceCourse->setName("Science");
        $manager->persist($scienceCourse);

        $manager->persist($secondYearClass);
        $manager->persist($thirdYearClass);
        $manager->persist($fourthYearClass);
        $manager->persist($fifthYearClass);
        $manager->persist($sixthYearClass);
        $manager->flush();
    }
}
