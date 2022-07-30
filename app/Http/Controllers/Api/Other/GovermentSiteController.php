<?php

namespace App\Http\Controllers\Api\Other;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\ImageRequest;
use App\Http\Requests\Other\GovermentSiteRequest;
use App\Http\Resources\Other\GovermentSiteResource;
use App\Models\GovermentSite;

/**
 *  @group FOYDALI DAVLAT SITELARI
 *
 * Foydali davlat sitelari uchun API
 */
class GovermentSiteController extends Controller
{
    /**
     * Barcha foydali davlat saytlari uchun api
     */
    public function index()
    {
        $govermentSites = GovermentSite::latest()->get();

        return GovermentSiteResource::collection($govermentSites);
    }

    /**
     * Yangi davlat saytini joylash
     */
    public function store(GovermentSiteRequest $request)
    {
        $govermentSite = GovermentSite::create([
            'goverment_site_title' => [
                'en' => $request->input('goverment_site_title'),
                'uz' => $request->input('goverment_site_title'),
                'ru' => $request->input('goverment_site_title'),
                'уз' => $request->input('goverment_site_title'),
            ],
            'goverment_site_link' => $request->input('goverment_site_link'),
            'goverment_site_file' => $request->input('goverment_site_file'),
        ]);

        $storedGovermentSite = new GovermentSiteResource($govermentSite);

        return $this->storedMessage($storedGovermentSite);
    }

    /**
     * Malum bir davlat saytini o'zgartirish
     */
    public function update(GovermentSiteRequest $request, $id)
    {
        $govermentSite = GovermentSite::findOrFail($id);

        $govermentSite->update([
            'goverment_site_title' => [
                'en' => $request->input('goverment_site_title'),
                'uz' => $request->input('goverment_site_title'),
                'ru' => $request->input('goverment_site_title'),
                'уз' => $request->input('goverment_site_title'),
            ],
            'goverment_site_link' => $request->input('goverment_site_link'),
            'goverment_site_file' => $request->input('goverment_site_file'),
        ]);

        $updatedGovermentSite = new GovermentSiteResource($govermentSite);

        return $this->updatedMessage($updatedGovermentSite);
    }

    /**
     * Davlat saytini o'chirish
     */
    public function destroy($id)
    {
        $govermentSite = GovermentSite::findOrFail($id);

        $govermentSite->delete();

        return $this->deletedMessage();
    }

    /**
     * Rasm joylash. Sizga kerakli bo'lgan rasmni joylab jo'natish tugmasini
     * bosganingizdan so'ng sizga rasmni serverga saqlangan nomini qayataradi
     * "goverment_site_file" ga shu qaytgan stringni qo'yib berishingiz kerak.
     */
    public function uploadImage(ImageRequest $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file')->move('images/goverment-sites/', time().'.'.$request
            ->file('file')
            ->getClientOriginalName());

            return $file;
        }
    }
}
