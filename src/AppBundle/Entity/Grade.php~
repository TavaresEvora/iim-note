<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Grade
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
     * @ORM\Column(name="note", type="decimal")
     */
    private $note;


    /**
     * @var Student
     *
     * Ici nous avons "l'autre côté" - on rajoute bien "inversedBy"
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student", inversedBy="grades")
     */
    private $student;

    /**
     * @var Exam
     *
     * Ici nous avons "l'autre côté" - on rajoute bien "inversedBy"
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Exam", inversedBy="grades")
     */
    private $exam;




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
     * Set note
     *
     * @param string $note
     *
     * @return Grade
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return Grade
     */
    public function setStudent(\AppBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set exam
     *
     * @param \AppBundle\Entity\Exam $exam
     *
     * @return Grade
     */
    public function setExam(\AppBundle\Entity\Exam $exam = null)
    {
        $this->exam = $exam;

        return $this;
    }

    /**
     * Get exam
     *
     * @return \AppBundle\Entity\Exam
     */
    public function getExam()
    {
        return $this->exam;
    }


}
