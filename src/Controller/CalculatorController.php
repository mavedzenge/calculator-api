<?php

namespace App\Controller;

use App\Services\CalculationManager;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    use ControllerResponseTrait;

    /**
     * @Route("/calculations")
     * @OA\Get(
     *     path="/calculations",
     *     summary="Finds Pets by tags",
     *     tags={"Calculator"},
     *     @OA\Parameter(
     *        name="page",
     *        in="query",
     *        description="Page number for the set of results"
     *     ),
     *     @OA\Parameter(
     *        name="per_page",
     *        in="query",
     *        description="Number of results per page"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Invalid tag value",
     *     ),
     * )
     */
    public function getCalculations(Request $request, CalculationManager $calculationManager): Response
    {
        return $this->successResponse($calculationManager->getCalculations($request->get('page', 1), $request->get('per_page', 5)));
    }

    /**
     * @Route("/add/{firstInt}/{secondInt}", methods={"POST"})
     * @OA\Post(
     *     path="/add/{firstInt}/{secondInt}",
     *     summary="Add two integers",
     *     description="Returns an integer",
     *     operationId="add",
     *     tags={"Calculator"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass values to be added",
     *        @OA\JsonContent(
     *           required={"firstInt","secondInt"},
     *        )
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid data",
     *          @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *          )
     *      )
     * )
     */
    public function add(int $firstInt, int $secondInt, CalculationManager $calculationManager): JsonResponse
    {
        $results = $calculationManager->add($firstInt, $secondInt);

        return $this->successResponse($results);
    }

    /**
     * @Route("/subtract/{firstInt}/{secondInt}", methods={"POST"})
     * @OA\Post(
     *     path="/subtract/{firstInt}/{secondInt}",
     *     summary="Subtract an integer from the other",
     *     description="Returns an integer",
     *     operationId="subtract",
     *     tags={"Calculator"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass values to be subtracted",
     *        @OA\JsonContent(
     *           required={"firstInt","secondInt"},
     *        )
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid data",
     *          @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *          )
     *      )
     * )
     */
    public function subtract(int $firstInt, int $secondInt, CalculationManager $calculationManager): JsonResponse
    {
        $results = $calculationManager->subtract($firstInt, $secondInt);

        return $this->successResponse($results);
    }

    /**
     * @Route("/multiply/{firstInt}/{secondInt}", methods={"POST"})
     * @OA\Post(
     *     path="/multiply/{firstInt}/{secondInt}",
     *     summary="Multiply an integer with the other",
     *     description="Returns an integer",
     *     operationId="multiply",
     *     tags={"Calculator"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass values to be multiplied",
     *        @OA\JsonContent(
     *           required={"firstInt","secondInt"},
     *        )
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid data",
     *          @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *          )
     *      )
     * )
     */
    public function multiply(int $firstInt, int $secondInt, CalculationManager $calculationManager): JsonResponse
    {
        $results = $calculationManager->multiply($firstInt, $secondInt);

        return $this->successResponse($results);
    }

    /**
     * @Route("/divide/{firstInt}/{secondInt}", methods={"POST"})
     * @OA\Post(
     *     path="/divide/{firstInt}/{secondInt}",
     *     summary="Divide an integer by the other",
     *     description="Returns an integer",
     *     operationId="divide",
     *     tags={"Calculator"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass values to be divided",
     *        @OA\JsonContent(
     *           required={"firstInt","secondInt"},
     *        )
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid data",
     *          @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *          )
     *      )
     * )
     */
    public function divide(int $firstInt, int $secondInt, CalculationManager $calculationManager): JsonResponse
    {
        $results = $calculationManager->divide($firstInt, $secondInt);

        return $this->successResponse($results);
    }
}