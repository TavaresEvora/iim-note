<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Exam;
use AppBundle\Form\ExamType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * @Route("register/", name="register")
     */
    public function registerAction()
    {
        return $this->render('AppBundle:Auth:register.html.twig');
    }

}