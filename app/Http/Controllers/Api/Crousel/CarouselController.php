<?php

namespace App\Http\Controllers\Api\Crousel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carousel\CarouselRequest;
use App\Http\Requests\File\ImageRequest;
use App\Http\Resources\Carousel\CarouselResource;
use App\Models\Carousel;

/**
 * @group CAROUSEL
 *
 * Carousel uchun api
 */
class CarouselController extends Controller
{
    /**
     * Barhca carousellar ro'yhati
     */
    public function index()
    {
        $carousels = Carousel::latest()->get();

        return CarouselResource::collection($carousels);
    }

    /**
     * Yangi carousel joylash
     */
    public function store(CarouselRequest $request)
    {
        $carousel = Carousel::create([
            'carousel_title' => [
                'en' => $request->input('carousel_title'),
                'uz' => $request->input('carousel_title'),
                'ru' => $request->input('carousel_title'),
                'уз' => $request->input('carousel_title'),
            ],
            'carousel_link' => $request->input('carousel_link'),
            'carousel_number' => $request->input('carousel_number'),
            'carousel_file' => $request->input('carousel_file'),
        ]);

        $storedCarousel = new CarouselResource($carousel);

        return $this->storedMessage($storedCarousel);
    }

    /**
     * Ma'lum bir carouselni ozgartirish
     */
    public function update(CarouselRequest $request, $id)
    {
        $carousel = Carousel::findOrFail($id);

        $carousel->update([
            'carousel_title' => [
                'en' => $request->input('carousel_title'),
                'uz' => $request->input('carousel_title'),
                'ru' => $request->input('carousel_title'),
                'уз' => $request->input('carousel_title'),
            ],
            'carousel_link' => $request->input('carousel_link'),
            'carousel_number' => $request->input('carousel_number'),
            'carousel_file' => $request->input('carousel_file'),
        ]);

        $updatedCarousel = new CarouselResource($carousel);

        return $this->updatedMessage($carousel);
    }

    /**
     * Mavjud carouselni ochirib tashlash
     */
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);

        $carousel->delete();
    }

    /**
     * Rasm joylash. Sizga kerakli bo'lgan rasmni joylab jo'natish tugmasini
     * bosganingizdan so'ng sizga rasmni serverga saqlangan nomini qayataradi
     * "carousel_image" ga shu qaytgan stringni qo'yib berishingiz kerak.
     */
    public function uploadImage(ImageRequest $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file')->move('images/carousels/', time().'.'.$request
                ->file('file')
                ->getClientOriginalName());

            return $file;
        }
    }
}
