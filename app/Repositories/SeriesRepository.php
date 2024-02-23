<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;

use App\Models\Series;

interface SeriesRepository
{
    public function add($request): Series;
    
    public function edit(SeriesFormRequest $request, Series $series);
}