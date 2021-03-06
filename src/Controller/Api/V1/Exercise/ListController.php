<?php
namespace App\Controller\Api\V1\Exercise;

use App\Http\JsonResponse;
use App\Model\Exercise\Exercise;
use App\Repository\ExerciseRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/exercises", name="app_api_v1_exercise_list")
 */
class ListController
{
    private ExerciseRepository $exerciseRepository;

    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function __invoke(UserInterface $user): JsonResponse
    {
        $exercises = $this->exerciseRepository->getList($user->getUsername());
        $data = [];

        foreach ($exercises as $exercise) {
            $data[] = Exercise::fromExercise($exercise);
        }

        return new JsonResponse([
            'data' => $data,
        ]);
    }
}
