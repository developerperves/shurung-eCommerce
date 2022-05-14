<?php

namespace App\Repositories;

use App\BlogCategory;

class BlogCategoryRepository
{
    public function __construct()
    {
        //
    }

    /**
     * Store category.
     *
     * @param  \App\Http\Requests\BlogCategoryRequest  $request
     * @return void
     */

    public function store($request)
    {
        $input = $request->all();
        BlogCategory::create($input);
    }

    /**
     * Update category.
     *
     * @param  \App\Http\Requests\BlogCategoryRequest  $request
     * @return void
     */

    public function update($blogcategory, $request)
    {
        $input = $request->all();
        $blogcategory->update($input);
    }

    /**
     * Delete category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($blogcategory)
    {
        $blogcategory->delete();
    }
}
