<?php

namespace App\Http\Controllers\Api\Other;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\ImageRequest;
use Illuminate\Http\Request;

/**
 * @group POST UCHUN RASM JOYLASH
 * 
 * Statik post uchun rasm joylash
 */
class StaticImageUploadController extends Controller
{   
    /**
     * Yangi rasm joylash
     */
    public function imageUpload(ImageRequest $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file')->move('images/static-image/', time().'.'.$request
            ->file('file')
            ->getClientOriginalName());

            return $file;
        }
    }

    /**
     * Mavjud fileni ochirib tashlash
     */
    public function removeFile(Request $request)
    {
        if (file_exists($request->filename)) {
            unlink($request->filename);
        } else {
            return response()->json([
                'data' => 'File does not exists'
            ]);
        }
    }
}
