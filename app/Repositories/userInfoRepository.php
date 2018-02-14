<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/9/2018
 * Time: 8:12 PM
 */

namespace App\Repositories;

use App\Models\UserInfo;


class userInfoRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return UserInfo::class;
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