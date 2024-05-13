<?php

namespace App\Controller;

use App\Entity\TutorialInCourse;
use App\Form\TutorialInCourseType;
use App\Repository\TutorialInCourseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[Route('/tutorial/in/course')]
class TutorialInCourseController extends AbstractController
{
    #[Route('/', name: 'app_tutorial_in_course_index', methods: ['GET'])]
    public function index(TutorialInCourseRepository $tutorialInCourseRepository): Response
    {
        return $this->render('tutorial_in_course/index.html.twig', [
            'tutorial_in_courses' => $tutorialInCourseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tutorial_in_course_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tutorialInCourse = new TutorialInCourse();
        $form = $this->createForm(TutorialInCourseType::class, $tutorialInCourse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tutorialInCourse);
            $entityManager->flush();

            return $this->redirectToRoute('app_tutorial_in_course_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tutorial_in_course/new.html.twig', [
            'tutorial_in_course' => $tutorialInCourse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tutorial_in_course_show', methods: ['GET'])]
    public function show(TutorialInCourse $tutorialInCourse): Response
    {
        return $this->render('tutorial_in_course/show.html.twig', [
            'tutorial_in_course' => $tutorialInCourse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tutorial_in_course_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TutorialInCourse $tutorialInCourse, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TutorialInCourseType::class, $tutorialInCourse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_tutorial_in_course_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tutorial_in_course/edit.html.twig', [
            'tutorial_in_course' => $tutorialInCourse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tutorial_in_course_delete', methods: ['POST'])]
    public function delete(Request $request, TutorialInCourse $tutorialInCourse, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tutorialInCourse->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($tutorialInCourse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tutorial_in_course_index', [], Response::HTTP_SEE_OTHER);
    }
}
