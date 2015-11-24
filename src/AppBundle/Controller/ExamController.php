<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Exam;
use AppBundle\Form\ExamType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ExamController
 */
class ExamController extends Controller
{
    /**
     * @Route("admin/exam", name="exam_list")
     */
    public function indexAction()
    {
        $exams = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();

        return $this->render('AppBundle:Exam:index.html.twig', [
            'exams' => $exams
        ]);
    }

    /**
     * @Route("admin/exam/add", name="exam_add")
     */
    public function addAction(Request $request)
    {
        $exam = new Exam();
        $form = $this->createForm(new ExamType(), $exam);
        if ($request->isMethod('POST')
            && $form->handleRequest($request)
            && $form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $db->persist($exam);
            $db->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Success, you are added an exam')
            ;
            return $this->redirectToRoute('exam_list');

        }
        return $this->render('AppBundle:Exam:add.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("admin/exam/show/{id}", name="exam_show")
     */
    public function showAction($id, Request $request)
    {
        $db = $this->getDoctrine()->getManager();
        $exam = $db
            ->getRepository('AppBundle:Exam')
            ->find($id);

        return $this->render('AppBundle:Exam:show.html.twig', [
            'exam' => $exam
        ]);
    }




    /**
     * @Route("admin/exam/edit/{id}", name="exam_edit")
     */
    public function editAction(Request $request, $id)
    {
        $db = $this->getDoctrine()->getManager();
        $exam = $db
            ->getRepository('AppBundle:Student')
            ->find($id);
        $form = $this->createForm(new ExamType(), $exam);
        if ($request->isMethod('POST')
            && $form->handleRequest($request)
            && $form->isValid()) {
            $db = $this->getDoctrine()->getManager();
            $db->persist($exam);
            $db->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Success, you are edit an exam')
            ;
            return $this->redirectToRoute('exam_list');
        }
        return $this->render('AppBundle:Exam:edit.html.twig', [
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("admin/exam/delete/{id}", name="exam_delete")
     */
    public function deleteAction($id, Request $request)
    {
        $db = $this->getDoctrine()->getManager();
        $exam = $db
            ->getRepository('AppBundle:Exam')
            ->find($id);
        $db->remove($exam);
        $db->flush();

        $request->getSession()
            ->getFlashBag()
            ->add('success', 'Success, you are deleted an exam')
        ;
        return $this->redirectToRoute('exam_list');
    }
}