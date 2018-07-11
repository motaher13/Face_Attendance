<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/15/2018
 * Time: 7:16 PM
 */

namespace App\Repositories;


use App\Models\CourseMaterial;

class CourseMaterialRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return CourseMaterial::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }
}