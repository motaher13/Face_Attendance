<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/10/2018
 * Time: 7:45 PM
 */

namespace App\Repositories;


use App\Models\BusinessEmployee;

class EmployeeRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return BusinessEmployee::class;
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