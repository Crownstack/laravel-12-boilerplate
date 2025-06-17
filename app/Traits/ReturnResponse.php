<?php

namespace App\Traits;

trait ReturnResponse
{
    /**
     * Method to prepare and return an array response for controller to work with.
     *
     * @param array $data
     * @param string $status
     * @param string $errorCode
     * @return array
     */
    protected function returnResponse($data = [], $status = 'ok', $errorCode = '')
    {
        $returnData = [
            'status' => $status,
            'data' => $data,
        ];
        if ($status == 'error') {
            $returnData['errorCode'] = $errorCode;
        }
        return $returnData;
    }
}