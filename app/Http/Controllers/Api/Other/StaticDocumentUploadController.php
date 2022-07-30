<?php

namespace App\Http\Controllers\Api\Other;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\DocumentRequest;
use Illuminate\Http\Request;

/**
 * @group POST UCHUN FILE JOYLASH
 * 
 * Post uchun dokument joylash
 */
class StaticDocumentUploadController extends Controller
{   
    /**
     * Dokument joylash
     */
    public function documentUpload(DocumentRequest $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file')->move('images/static-document/', time().'.'.$request
            ->file('file')
            ->getClientOriginalName());

            return $file;
        }
    }
}
