<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/15/2018
 * Time: 7:15 PM
 */

namespace App\Services;


use App\Repositories\CourseMaterialRepository;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class CourseMaterialService extends BaseService
{
    private $courseMaterialRepository;

    public function __construct(CourseMaterialRepository $courseMaterialRepository)
    {
        $this->courseMaterialRepository=$courseMaterialRepository;
    }

    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->courseMaterialRepository;
    }

    public function store(Request $request,$id){
        $data['course_id']=$id;
        if ($request->hasFile('file')){
            $file=$request->file('file');
            //dd($file) ;
            //$profile=auth()->user()->profile;
            $input= $file->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $file->move($destinationPath, $input);
            $data['type']="video";
            $data['link']=$input;

        }
        elseif($request->url!=null){
            $data['type']="url";
            $data['link']=$request->url;
        }
        $material=$this->courseMaterialRepository->create($data);
        return $material;
    }
}