<?php

namespace ZivHashGen\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use UnexpectedValueException;
use ZivHashGen\Service\Hash\GeneratorFactory;

class HashController
{
    private $availableAlgorithms;

    /**
     * @var GeneratorFactory
     */
    private $generatorFactory;

    /**
     * HashController constructor.
     *
     * @param GeneratorFactory $generatorFactory
     * @param array $availableAlgorithms
     */
    public function __construct(GeneratorFactory $generatorFactory, array $availableAlgorithms)
    {
        $this->generatorFactory = $generatorFactory;
        $this->availableAlgorithms = $availableAlgorithms;
    }

    /**
     * @param $algorithm
     *
     * @return JsonResponse
     */
    public function get($algorithm)
    {
        $algorithm = strtolower($algorithm);

        if (!in_array($algorithm, $this->availableAlgorithms)) {
            throw new UnexpectedValueException("Algorithm {$algorithm} not found.");
        }

        // TODO: allow user params for seed and salt

        $params = $this->generatorFactory->packageParams($algorithm, '', '');
        $generator = $this->generatorFactory->create($params);

        return new JsonResponse(
            [
                "result" => $generator->generate(),
                "algorithm" => $generator->getAlgorithm()
            ]
        );
    }
}