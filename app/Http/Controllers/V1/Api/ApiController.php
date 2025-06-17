<?php

namespace App\Http\Controllers\V1\Api;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Lang;

class ApiController extends \App\Http\Controllers\V1\V1Controller
{
    /**
     * Method to prepare and return a JSON response for API requests.
     *
     * @param array $responseObject
     * @param string $resourceGroup
     * @param string $action
     * @param int $httpStatus
     * @return \Illuminate\Http\JsonResponse
     */
    protected function returnResponse($responseObject, $resourceGroup, $action, $httpStatus = Response::HTTP_OK)
    {
        $responseArray = [
            'status' => $responseObject['status'],
            'message' => null,
        ];

        switch ($responseObject['status']) {
            case 'ok':
                $responseArray['data'] = $responseObject['data'];
                $responseArray['message'] = __("apiResponseMessages.{$resourceGroup}.{$action}.success");
                break;
            case 'error':
                $httpStatus = Response::HTTP_BAD_REQUEST;
                if (Lang::has("apiResponseMessages.{$resourceGroup}.{$action}.errors.{$responseObject['errorCode']}")) {
                    $errorMessage = __("apiResponseMessages.{$resourceGroup}.{$action}.errors.{$responseObject['errorCode']}");
                } else {
                    $errorMessage = __("apiResponseMessages.{$resourceGroup}.{$action}.errors.default");
                }
                $responseArray['message'] = $errorMessage;
                break;
            default:
                $httpStatus = Response::HTTP_BAD_REQUEST;
                $responseArray['message'] = __("apiResponseMessages.{$resourceGroup}.{$action}.errors.default");
                break;
        }

        return response()->json($responseArray, $httpStatus);
    }
}
