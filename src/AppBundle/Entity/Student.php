<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Student
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;


    /**
     * @var array
     *
     * Nous avons plusieurs notes pour un étudiant
     * Une note - Grade - a un champ "student", il faut le préciser via "mappedBy"
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Grade", mappedBy="student", cascade={"persist", "remove"})
     */
    private $grades;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Student
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Student
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->exams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add grade
     *
     * @param \AppBundle\Entity\Grade $grade
     *
     * @return Student
     */
    public function addGrade(\AppBundle\Entity\Grade $grade)
    {
        $this->grades[] = $grade;

        return $this;
    }

    /**
     * Remove grade
     *
     * @param \AppBundle\Entity\Grade $grade
     */
    public function removeGrade(\AppBundle\Entity\Grade $grade)
    {
        $this->grades->removeElement($grade);
    }

    /**
     * Get grades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * Add exam
     *
     * @param \AppBundle\Entity\Exam $exam
     *
     * @return Student
     */
    public function addExam(\AppBundle\Entity\Exam $exam)
    {
        $this->exams[] = $exam;

        return $this;
    }

    /**
     * Remove exam
     *
     * @param \AppBundle\Entity\Exam $exam
     */
    public function removeExam(\AppBundle\Entity\Exam $exam)
    {
        $this->exams->removeElement($exam);
    }

    /**
     * Get exams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExams()
    {
        return $this->exams;
    }

    public function __toString(){
        return $this->getFirstName().' '.$this->getLastName();
    }
}
