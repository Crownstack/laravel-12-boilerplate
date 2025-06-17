<?php

namespace App\Http\Controllers\V1\Api;

use Illuminate\Http\Request;

use App\Repositories\SubscribeRepository;

class SubscribeController extends \App\Http\Controllers\V1\Api\ApiController
{
    /**
     * Method to submit a subscribe form
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitSubscribeForm(Request $request)
    {
        $request->validate([
            'source' => ['required', 'string', 'in:website_footer'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $result = (new SubscribeRepository())->submitSubscribeForm($request->all());
        
        return $this->returnResponse(resourceGroup: 'subscribe', action: 'formSubmitted', responseObject: $result);
    }
}