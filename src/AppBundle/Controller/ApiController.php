<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Form\StudentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class ApiController
 */
class ApiController extends FOSRestController
{

    public function getApiStudentsAction()
    {
        $students = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->findAll();
        $view = $this->view($students, 200);

        return $this->handleView($view);
    }



    public function getApiGradesAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Grade')->findAll();
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }



    public function getApiExamsAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }

    public function getApiExamAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }

    public function getApiStudentAction($id)
    {
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->find($id);
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }




}