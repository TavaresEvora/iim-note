<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Form\StudentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StudentController
 */
class StudentController extends Controller
{
    /**
     * @Route("admin/student", name="student_list")
     */
    public function indexAction()
    {
        $students = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->findAll();

        return $this->render('AppBundle:Student:index.html.twig', [
            'students' => $students
        ]);
    }

    /**
     * @Route("admin/student/add", name="student_add")
     */
    public function addAction(Request $request)
    {
        $student = new Student();
        $form = $this->createForm(new StudentType(), $student);
        if ($request->isMethod('POST')
            && $form->handleRequest($request)
            && $form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $db->persist($student);
            $db->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Success, you are added a student')
            ;
            return $this->redirectToRoute('student_list');
        }
        return $this->render('AppBundle:Student:add.html.twig', [
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("admin/student/show/{id}", name="student_show")
     */
    public function showAction($id, Request $request)
    {
        $db = $this->getDoctrine()->getManager();
        $student = $db
            ->getRepository('AppBundle:Student')
            ->find($id);

        return $this->render('AppBundle:Student:show.html.twig', [
            'student' => $student
        ]);
    }


    /**
     * @Route("admin/student/edit/{id}", name="student_edit")
     */
    public function editAction(Request $request, $id)
    {
        $db = $this->getDoctrine()->getManager();
        $student = $db
            ->getRepository('AppBundle:Student')
            ->find($id);
        $form = $this->createForm(new StudentType(), $student);
        if ($request->isMethod('POST')
            && $form->handleRequest($request)
            && $form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $db->persist($student);
            $db->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Success, you are edit a student')
            ;
            return $this->redirectToRoute('student_list');
        }
        return $this->render('AppBundle:Student:edit.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("admin/student/delete/{id}", name="student_delete")
     */
    public function deleteAction($id, Request $request)
    {
        $db = $this->getDoctrine()->getManager();
        $student = $db
            ->getRepository('AppBundle:Student')
            ->find($id);
        $db->remove($student);
        $db->flush();
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Success, you are deleted a student')
        ;
        return $this->redirectToRoute('student_list');
    }
}