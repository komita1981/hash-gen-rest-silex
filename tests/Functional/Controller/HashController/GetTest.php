<?php

namespace ZivHashGen\Test\Functional\Controller\HashController;

use Symfony\Component\HttpFoundation\Response;
use ZivHashGen\Test\Functional\Controller\TestCase;

class GetTest extends TestCase
{
    /**
     * @dataProvider getData
     */
    public function testSuccessful($algorithm, $result)
    {
        // arrange
        $expectedResponse = [
            'algorithm' => $algorithm,
            'result' => $result,
        ];

        $client = $this->createClient();

        // act
        $client->request('GET', '/api/v1/hash/' . $algorithm);

        // assert
        $apiResponse = $client->getResponse();
        $apiResponseStatus = $apiResponse->getStatusCode();
        $apiResponseArray = json_decode($apiResponse->getContent(), true);

        $this->assertEquals(Response::HTTP_OK, $apiResponseStatus);
        $this->assertEquals($expectedResponse, $apiResponseArray);
    }

    public function getData()
    {
        return [
          // #0 md5 algorithm
          [
              'algorithm' => 'md5',
              'result' => 'd41d8cd98f00b204e9800998ecf8427e',
          ]
        ];
    }
}