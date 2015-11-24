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
     * @Route("register/confirmed", name="fos_user_registration_confirmed")
     */
    public function redirectCreatedAdminAction(Request $request)
    {
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Success, new admin are created')
        ;
        return $this->redirectToRoute('fos_user_registration_register');
    }

}