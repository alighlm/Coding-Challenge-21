<?php

namespace App\Controller\Rate;

use App\Application\Service\Rate\RateCalculationService;
use App\Dto\Request\Rate\Transformer\RateRequestTransformer;
use App\Dto\Response\Rate\RateResponseDto;
use App\Dto\Response\Rate\Transformer\RateResponseTransformer;
use App\Entity\CdrRecord\CdrRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class RateController extends AbstractController
{
    public function __construct(
        private RateResponseTransformer $rateResponseTransformer,
        private RateCalculationService $rateCalculationService,
        private RateRequestTransformer $rateRequestTransformer
    ) {}


    /**
     * @param Request $request
     *
     * @return RateResponseDto
     */
    public function __invoke(Request $request): RateResponseDto
    {

        $cdrRecord = $this->rateRequestTransformer->transformFromObject($request->attributes->get('dto')) ;


        $caculated = $this->rateCalculationService->handle($cdrRecord);

        return $this->rateResponseTransformer->transformFromObject($caculated);

    }
}
