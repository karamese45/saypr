<?php

namespace App\Http\Services;

use App\Http\Repositories\CompanyRepository;
use App\Http\Requests\CompanyRequest;
use Intervention\Image\Facades\Image;

class CompanyService
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function all()
    {
        return $this->companyRepository->all();
    }

    public function create(CompanyRequest $request)
    {
        $attributes = $this->loadImage($request);

        return $this->companyRepository->create($attributes);
    }

    public function read($id)
    {
        return $this->companyRepository->find($id);
    }

    public function update(CompanyRequest $request, $id)
    {

        $attributes = $this->loadImage($request);

        return $this->companyRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->companyRepository->delete($id);
    }

    public function loadImage(CompanyRequest $request)
    {
        $attributes = $request->all();

        if(isset($request->image)) {
            $attributes['image'] = time().'.'.$request->image->extension();
            $img = Image::make($request->image->path());
            $img->resize(100, 100, function ($const) {
                $const->aspectRatio();
            })->save(public_path('images').'/'.$attributes['image']);
        }

        return $attributes;
    }
}
