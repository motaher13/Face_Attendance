<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/15/2018
 * Time: 6:25 PM
 */

namespace App\Services;


use App\Models\Course_Category;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use ValidateRequests;

class CourseService extends BaseService
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->courseRepository;
    }

    public function store(Request $request){

        $data=$request->only(['category_id','title','description','length','type']);
        $data['tutor_id']=auth()->user()->id;
        $course =  $this->create($data);
        return $course;
    }

    public function categoryStore(Request $request){
        $category=Course_Category::create([
            'name'=>$request->name,
        ]);
        return $category;
    }

    public function getCategory(){
        return Course_Category::all();
    }
}