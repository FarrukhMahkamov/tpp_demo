<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function updatedMessage($data)
    {
        return response()->json([
            'message' => 'Updated Successfully',
            'data' => $data
        ], 200);
    } 

    protected function storedMessage($data)
    {
        return response()->json([
            'message' => "New data stored successfully",
            'data' => $data
        ], 201);
    }

    protected function deletedMessage()
    {
        return response()->json([
            'message' => "Data deleted Successfully"
        ], 204);
    }
}
