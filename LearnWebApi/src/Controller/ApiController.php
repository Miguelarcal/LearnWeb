<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Entity\Tutorial;
use App\Entity\TutorialInCourse;
use App\Entity\Page;
use App\Entity\Block;
use App\Entity\Course;
use App\Entity\TutorialScore;
use App\Entity\CourseScore;
use App\Repository\TutorialRepository;
use App\Repository\TutorialInCourseRepository;
use App\Repository\PageRepository;
use App\Repository\CourseRepository;
use App\Repository\TutorialScoreRepository;
use App\Repository\CourseScoreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\Security\Core\Password\PasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;

#[AsController]
class ApiController extends AbstractController
{
    #[Route('/api/users/validate/{nickname}', name: 'app_user_validate', methods: ['GET'])]
    public function validate(SerializerInterface $serializerInterface, String $nickname, UserRepository $userRepository, Request $request): Response
    {
        $user = $userRepository->validateUser($nickname);
        $response = $serializerInterface->serialize($user, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/users/{id}', name: 'app_get_user_by_id', methods: ['GET'])]
    public function get_user_by_id(SerializerInterface $serializerInterface, String $id, UserRepository $userRepository, Request $request): Response
    {
        $user = $userRepository->findOneById($id);
        $response = $serializerInterface->serialize($user, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/users/login/{nickname}/{passwd}', name: 'app_user_login', methods: ['GET'])]
    public function login(SerializerInterface $serializerInterface, UserPasswordHasherInterface $passwordHasher, JWTTokenManagerInterface $jwtManager, String $nickname, String $passwd, UserRepository $userRepository, Request $request): Response
    {
        $user = $userRepository->validateUser($nickname);
        if(!$user){
            // $response = $serializerInterface->serialize('Usuario no existente', 'json');
            #$response = $serializerInterface->serialize($token, 'json');
            return new JsonResponse('null', 200, [
                'Content-Type' => 'application/json',
                //'token' => $token
            ], true);
        } else {
            $factory = new PasswordHasherFactory([
                'common' => ['algorithm' => 'bcrypt']
            ]);
            $hasher = $factory->getPasswordHasher('common');
            if($hasher->verify($user->getPasswd(), $passwd)){
                $payload = [
                    'id' => $user->getId(),
                    'nickname' => $user->getNickname(),
                    'role' => $user->getUserType()
                ];
                //$user->setUserIdentifier($user->getNickname());
                $token = $jwtManager->createFromPayload($user, $payload);
                $userInfo = ['id' => $user->getId(), 'nickname' => $user->getNickname(), 'role' => $user->getUserType(), 'token' => $token];
                $response = $serializerInterface->serialize($userInfo, 'json');
                #$response = $serializerInterface->serialize($token, 'json');
                return new JsonResponse($response, 200, [
                    'Content-Type' => 'application/json',
                    //'token' => $token
                ], true);
            } else {
                $response = $serializerInterface->serialize('Contraseña incorrecta', 'json');
                #$response = $serializerInterface->serialize($token, 'json');
                return new JsonResponse('null', 200, [
                    'Content-Type' => 'application/json',
                    //'token' => $token
                ], true);
            }
        }
    }
    
    #[Route('/api/users/check/{nickname}/{email}', name: 'app_user_check_existence', methods: ['GET'])]
    public function check_existence(SerializerInterface $serializerInterface, String $nickname, String $email, UserRepository $userRepository, Request $request): Response
    {
        $user = $userRepository->findOneUserByNicknameAndEmail($nickname, $email);
        $output = 0;
        if($user){
            if($user->getEmail() == $email){
                $output = 2;
            }
            if($user->getNickname() == $nickname){
                $output = 1;
            }
        }
        $response = $serializerInterface->serialize($output, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/users/isbanned/{id}', name: 'app_user_check_banned', methods: ['GET'])]
    public function check_banned(SerializerInterface $serializerInterface, String $id, UserRepository $userRepository, Request $request): Response
    {
        $user = $userRepository->findOneById($id);
        $banned = $user->isBanned();
        $response = $serializerInterface->serialize($banned, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/users/register/{nickname}/{email}/{passwd}', name: 'app_user_register', methods: ['GET', 'POST'])]
    public function register(SerializerInterface $serializerInterface, Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, String $nickname, String $email, String $passwd, UserRepository $userRepository): Response
    {
        $user = new User();
        $user->setUserType('ROLE_LEARNER');
        $user->setEmail($email);
        $user->setPasswd($passwordHasher->hashPassword($user, $passwd));
        $user->setNickname($nickname);
        $user->setBanned(False);

        $entityManager->persist($user);
        $entityManager->flush();

        $response = $serializerInterface->serialize($user, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/users/registeradmin/{nickname}/{email}/{passwd}', name: 'app_user_registeradmin', methods: ['GET', 'POST'])]
    public function registeradmin(SerializerInterface $serializerInterface, Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, String $nickname, String $email, String $passwd, UserRepository $userRepository): Response
    {
        $user = new User();
        $user->setUserType('ROLE_ADMIN');
        $user->setEmail($email);
        $user->setPasswd($passwordHasher->hashPassword($user, $passwd));
        $user->setNickname($nickname);
        $user->setBanned(False);

        $entityManager->persist($user);
        $entityManager->flush();

        $response = $serializerInterface->serialize($user, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/newpage', name: 'app_page_new_v2', methods: ['GET', 'POST'])]
    public function pages_new_v2(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, TutorialRepository $tutorialRepository): Response
    {
        $page = new Page();
        $page->setTitle($request->getPayLoad()->get('title'));
        $page->setDescription($request->getPayLoad()->get('description'));
        $page->setOrderNumber($request->getPayLoad()->get('order_number'));
        $page->setTutorial($tutorialRepository->findOneById($request->getPayLoad()->get('tutorial')));

        $entityManager->persist($page);
        $entityManager->flush();

        $response = $serializerInterface->serialize($page->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/newblock', name: 'app_block_new_v2', methods: ['GET', 'POST'])]
    public function block_new_v2(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, PageRepository $pageRepository): Response
    {
        $block = new Block();
        $block->setType($request->getPayLoad()->get('type'));
        $block->setContent($request->getPayLoad()->get('content'));
        $block->setOrderNumber($request->getPayLoad()->get('order_number'));
        $block->setPage($pageRepository->findOneById($request->getPayLoad()->get('page')));

        $entityManager->persist($block);
        $entityManager->flush();

        $response = $serializerInterface->serialize($block->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/tutorialsavaidable', name: 'app_tutorials_avaidable', methods: ['GET'])]
    public function tutorials_avaidable(SerializerInterface $serializerInterface, Request $request, TutorialRepository $tutorialRepository, JWTTokenManagerInterface $jwtManager, JWTEncoderInterface $jwtEncoder): Response
    {
        $tutorials = $tutorialRepository->findByHidden(0);

        $response = $serializerInterface->serialize($tutorials, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/newtutorial', name: 'app_tutorial_new_v2', methods: ['GET', 'POST'])]
    public function tutorial_new_v2(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        $tutorial = new Tutorial();
        $tutorial->setName($request->getPayLoad()->get('name'));
        $tutorial->setDescription($request->getPayLoad()->get('description'));
        $tutorial->setAuthor($userRepository->findOneById($request->getPayLoad()->get('author')));
        $tutorial->setHidden(0);

        $currentDate = new \DateTime();
        $tutorial->setAddDate($currentDate);
        $tutorial->setModDate($currentDate);

        $entityManager->persist($tutorial);
        $entityManager->flush();

        $response = $serializerInterface->serialize($tutorial->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/updatetutorial/{id}', name: 'app_tutorial_update', methods: ['GET', 'PUT'])]
    public function tutorial_update(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, TutorialRepository $tutorialRepository, String $id): Response
    {
        $tutorial = $tutorialRepository->findOneById($id);
        $tutorial->setName($request->getPayLoad()->get('name'));
        $tutorial->setDescription($request->getPayLoad()->get('description'));

        $tutorial->setModDate(new \DateTime());

        $entityManager->persist($tutorial);
        $entityManager->flush();

        $response = $serializerInterface->serialize($tutorial->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/getmytutorials/{id}', name: 'app_tutorial_mine', methods: ['GET'])]
    public function tutorial_mine(SerializerInterface $serializerInterface, UserRepository $userRepository, String $id): Response
    {
        $tutorials = $userRepository->findOneById($id)->getTutorials();

        $response = $serializerInterface->serialize($tutorials, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/getmycourses/{id}', name: 'app_course_mine', methods: ['GET'])]
    public function course_mine(SerializerInterface $serializerInterface, UserRepository $userRepository, String $id): Response
    {
        $courses = $userRepository->findOneById($id)->getCreatedCourses();

        $response = $serializerInterface->serialize($courses, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/newcourse', name: 'app_course_new_v2', methods: ['GET', 'POST'])]
    public function course_new_v2(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        $course = new Course();
        $course->setName($request->getPayLoad()->get('name'));
        $course->setDescription($request->getPayLoad()->get('description'));
        $course->setAuthor($userRepository->findOneById($request->getPayLoad()->get('author')));
        $course->setDifficulty($request->getPayLoad()->get('difficulty'));
        $course->setHidden(0);

        $currentDate = new \DateTime();
        $course->setAddDate($currentDate);
        $course->setModDate($currentDate);

        $entityManager->persist($course);
        $entityManager->flush();

        $response = $serializerInterface->serialize($course->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/newtutorialincourse', name: 'app_tutorial_in_course_new_v2', methods: ['GET', 'POST'])]
    public function tutorial_in_course_new_v2(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, CourseRepository $courseRepository, TutorialRepository $tutorialRepository): Response
    {
        $tutorialincourse = new TutorialInCourse();
        $tutorialincourse->setCourse($courseRepository->findOneById($request->getPayLoad()->get('course')));
        $tutorialincourse->setTutorial($tutorialRepository->findOneById($request->getPayLoad()->get('tutorial')));
        $tutorialincourse->setOrderNumber($request->getPayLoad()->get('order_number'));

        $entityManager->persist($tutorialincourse);
        $entityManager->flush();

        $response = $serializerInterface->serialize($tutorialincourse->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/coursessavaidable', name: 'app_courses_avaidable', methods: ['GET'])]
    public function courses_avaidable(SerializerInterface $serializerInterface, Request $request, CourseRepository $courseRepository): Response
    {
        $courses = $courseRepository->findByHidden(0);

        $response = $serializerInterface->serialize($courses, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/gettutorialsfromcourse/{id}', name: 'app_tutorials_from_course', methods: ['GET'])]
    public function tutorial_from_course(SerializerInterface $serializerInterface, TutorialInCourseRepository $tutorialincourseRepository, String $id): Response
    {
        $tutorials = $tutorialincourseRepository->findTutorialsFromCourse($id);

        $response = $serializerInterface->serialize($tutorials, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/updatecourse/{id}', name: 'app_course_update', methods: ['GET', 'PUT'])]
    public function course_update(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, CourseRepository $courseRepository, String $id): Response
    {
        $course = $courseRepository->findOneById($id);
        $course->setName($request->getPayLoad()->get('name'));
        $course->setDescription($request->getPayLoad()->get('description'));
        $course->setDifficulty($request->getPayLoad()->get('difficulty'));

        $course->setModDate(new \DateTime());

        $entityManager->persist($course);
        $entityManager->flush();

        $response = $serializerInterface->serialize($course->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/tutorialsfilteredavaidable/{texto}', name: 'app_tutorials_filtered_avaidable', methods: ['GET'])]
    public function tutorials_filtered_avaidable(SerializerInterface $serializerInterface, Request $request, TutorialRepository $tutorialRepository, String $texto): Response
    {
        $tutorials = $tutorialRepository->findByTitleOrDescriptionAndHidden($texto, 0);

        $response = $serializerInterface->serialize($tutorials, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/tutorials/filter/{text}/{min_rating}/{max_rating}/{sort}/{hidden}', name: 'app_tutorials_filter', methods: ['GET'])]
    public function filterTutorials(
        Request $request,
        TutorialRepository $tutorialRepository,
        SerializerInterface $serializerInterface,
        String $text,
        String $min_rating,
        String $max_rating,
        String $sort,
        String $hidden,
    ): Response {

        $tutorials = $tutorialRepository->findByFilters(
            search: ($text == ' ') ? null : $text,
            minRating: ($min_rating == ' ') ? null : $min_rating,
            maxRating: ($max_rating == ' ') ? null : $max_rating,
            sortBy: $sort,
            hidden: $hidden, // varía dependiendo de si es admin o no
        );

        $response = $serializerInterface->serialize($tutorials, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/courses/filter/{text}/{min_rating}/{max_rating}/{difficulty}/{sort}/{hidden}', name: 'app_courses_filter', methods: ['GET'])]
    public function filterCourses(
        Request $request,
        CourseRepository $courseRepository,
        SerializerInterface $serializerInterface,
        String $text,
        String $min_rating,
        String $max_rating,
        String $difficulty,
        String $sort,
        String $hidden,
    ): Response {

        $courses = $courseRepository->findByFilters(
            search: ($text == ' ') ? null : $text,
            minRating: ($min_rating == ' ') ? null : $min_rating,
            maxRating: ($max_rating == ' ') ? null : $max_rating,
            difficulty: $difficulty,
            sortBy: $sort,
            hidden: $hidden // Varía dependiendo de si es admin o no
        );

        $response = $serializerInterface->serialize($courses, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }


    #[Route('/api/changehiddentutorial/{id}', name: 'app_tutorial_update_hidden', methods: ['GET', 'PUT'])]
    public function tutorial_change_hidden(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, TutorialRepository $tutorialRepository, String $id): Response
    {
        $tutorial = $tutorialRepository->findOneById($id);
        $hidden = $tutorial->isHidden();
        $newHidden = !$hidden;
        $tutorial->setHidden($newHidden);

        $entityManager->persist($tutorial);
        $entityManager->flush();

        $response = $serializerInterface->serialize($tutorial->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }


    #[Route('/api/changehiddencourse/{id}', name: 'app_course_update_hidden', methods: ['GET', 'PUT'])]
    public function course_change_hidden(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, CourseRepository $courseRepository, String $id): Response
    {
        $course = $courseRepository->findOneById($id);
        $hidden = $course->isHidden();
        $newHidden = !$hidden;
        $course->setHidden($newHidden);
        $entityManager->persist($course);
        $entityManager->flush();
        $response = $serializerInterface->serialize($course->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/changebanuser/{id}', name: 'app_user_update_ban', methods: ['GET', 'PUT'])]
    public function user_change_ban(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, String $id): Response
    {
        $user = $userRepository->findOneById($id);
        $banned = $user->isBanned();
        $newBanned = !$banned;
        $user->setBanned($newBanned);
        $entityManager->persist($user);
        $entityManager->flush();
        $response = $serializerInterface->serialize($user->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/getalltutorials', name: 'app_tutorial_all', methods: ['GET'])]
    public function tutorial_all(SerializerInterface $serializerInterface, TutorialRepository $tutorialRepository): Response
    {
        $tutorials = $tutorialRepository->findAllTutorials();

        $response = $serializerInterface->serialize($tutorials, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/getallcourses', name: 'app_courses_all', methods: ['GET'])]
    public function courses_all(SerializerInterface $serializerInterface, CourseRepository $courseRepository): Response
    {
        $courses = $courseRepository->findAllCourses();

        $response = $serializerInterface->serialize($courses, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/newtutorialscore', name: 'app_tutorialscore_new', methods: ['GET', 'POST'])]
    public function tutorialscore_new(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, TutorialScoreRepository $tutorialScoreRepository, UserRepository $userRepository, TutorialRepository $tutorialRepository): Response
    {
        //$tutorialScore = new TutorialScore($request->getPayload()->all());
        $tutorial = $tutorialRepository->findOneById($request->getPayload()->get('tutorial'));
        $user = $userRepository->findOneById($request->getPayload()->get('user'));
        $score = (int) $request->getPayload()->get('score');

        $tutorialScore = new TutorialScore();
        $tutorialScore->setTutorial($tutorial);
        $tutorialScore->setUser($user);
        $tutorialScore->setScore($score);

        $entityManager->persist($tutorialScore);
        $entityManager->flush();

        $response = $serializerInterface->serialize($tutorialScore->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/getatutorialscore/{tutorial_id}/{user_id}', name: 'app_get_a_tutorial_score', methods: ['GET'])]
    public function get_a_tutorial_score(SerializerInterface $serializerInterface, TutorialScoreRepository $tutorialScoreRepository, UserRepository $userRepository, TutorialRepository $tutorialRepository, String $tutorial_id, String $user_id): Response
    {
        $tutorial_score = $tutorialScoreRepository->findOneByUserAndTutorial((int) $tutorial_id , (int) $user_id);

        $response = $serializerInterface->serialize($tutorial_score, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/updatetutorialscore/{tutorial_id}/{user_id}', name: 'app_tutorialscore_update', methods: ['GET', 'PUT'])]
    public function tutorialscore_update(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, TutorialScoreRepository $tutorialScoreRepository, UserRepository $userRepository, TutorialRepository $tutorialRepository, String $tutorial_id, String $user_id): Response
    {
        $tutorialScore = $tutorialScoreRepository->findOneByUserAndTutorial((int) $tutorial_id , (int) $user_id);;
        $tutorialScore->setScore((int) $request->getPayload()->get('score'));

        $entityManager->persist($tutorialScore);
        $entityManager->flush();

        $response = $serializerInterface->serialize($tutorialScore, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/averagetutorialscore/{tutorial_id}', name: 'app_average_tutorial_score', methods: ['GET'])]
    public function average_tutorial_score(SerializerInterface $serializerInterface, TutorialScoreRepository $tutorialScoreRepository, String $tutorial_id): Response
    {
        $average_tutorial_score = $tutorialScoreRepository->findAverageScoreByTutorial((int) $tutorial_id);

        $response = $serializerInterface->serialize($average_tutorial_score, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/newcoursescore', name: 'app_coursescore_new', methods: ['GET', 'POST'])]
    public function coursescore_new(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, CourseScoreRepository $courseScoreRepository, UserRepository $userRepository, CourseRepository $courseRepository): Response
    {
        $course = $courseRepository->findOneById($request->getPayload()->get('course'));
        $user = $userRepository->findOneById($request->getPayload()->get('user'));
        $score = (int) $request->getPayload()->get('score');

        $courseScore = new CourseScore();
        $courseScore->setcourse($course);
        $courseScore->setUser($user);
        $courseScore->setScore($score);

        $entityManager->persist($courseScore);
        $entityManager->flush();

        $response = $serializerInterface->serialize($courseScore->getId(), 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/getacoursescore/{course_id}/{user_id}', name: 'app_get_a_course_score', methods: ['GET'])]
    public function get_a_course_score(SerializerInterface $serializerInterface, CourseScoreRepository $courseScoreRepository, UserRepository $userRepository, CourseRepository $courseRepository, String $course_id, String $user_id): Response
    {
        $course_score = $courseScoreRepository->findOneByUserAndCourse((int) $course_id , (int) $user_id);

        $response = $serializerInterface->serialize($course_score, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/updatecoursescore/{course_id}/{user_id}', name: 'app_coursescore_update', methods: ['GET', 'PUT'])]
    public function coursescore_update(SerializerInterface $serializerInterface, Request $request, EntityManagerInterface $entityManager, CourseScoreRepository $courseScoreRepository, UserRepository $userRepository, CourseRepository $courseRepository, String $course_id, String $user_id): Response
    {
        $courseScore = $courseScoreRepository->findOneByUserAndCourse((int) $course_id , (int) $user_id);;
        $courseScore->setScore((int) $request->getPayload()->get('score'));

        $entityManager->persist($courseScore);
        $entityManager->flush();

        $response = $serializerInterface->serialize($courseScore, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }

    #[Route('/api/averagecoursescore/{course_id}', name: 'app_average_course_score', methods: ['GET'])]
    public function average_course_score(SerializerInterface $serializerInterface, CourseScoreRepository $courseScoreRepository, String $course_id): Response
    {
        $average_course_score = $courseScoreRepository->findAverageScoreByCourse((int) $course_id);

        $response = $serializerInterface->serialize($average_course_score, 'json');
        return new JsonResponse($response, 200, [
            'Content-Type' => 'application/json'
        ], true);
    }
}
