<?php

/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 3/17/2019
 * Time: 7:38 PM
 */

namespace App\Repository;

use Illuminate\Support\Str;

class PublicRepository
{
    public static function findAll($model, array $with = null)
    {
        //        $m=sprintf('App\Models\\%s',$model);

        $model = Str::finish('\App\Models\\', $model);
        if ($with) {
            $res = $model::with($with)->get();
        } else {
            $res = $model::all();
        }
        return $res;
    }

    public static function save($model, $category)
    {
        $model = Str::finish('\App\Models\\', $model);
        $city = $model::create($category);
        return $city;
    }

    static function findById($model, $id, array $with = null)
    {
        $model = Str::finish('\App\Models\\', $model);
        $city = $model::where('id', $id);
        if ($with) {
            $city->with($with);
        }
        $res = $city->first();
        return $res;
    }

    static function update($model, $id, $data)
    {
        $model = Str::finish('\App\Models\\', $model);
        $city = $model::find($id);
        $city = $city->update($data);
        return $city;
    }

    static function delete($model, $id)
    {
        $model = Str::finish('\App\Models\\', $model);
        $model::destroy($id);
    }

    static function findWhere($model, array $where = null, array $with = null)
    {
        $model = Str::finish('\App\Models\\', $model);
        $res = $model::where($where);
        if ($with) {
            $res->with($with);
        }
        $test = $res->get();
        return $test;
    }

    static function findFirst($model, array $where = null, array $with = null)
    {

        $model = Str::finish('\App\Models\\', $model);
        $res = $model::where($where);
        if ($with) {
            $res->with($with);
        }
        $test = $res->first();
        return $test;
    }

    static function findLast($model, array $where = null, array $with = null)
    {
        $model = Str::finish('\App\Models\\', $model);
        $res = $model::latest();
        if ($where) {
            $res->where($where);
        }
        if ($with) {
            $res->with($with);
        }
        $test = $res->first();
        return $test;
    }
}
