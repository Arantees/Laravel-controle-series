<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add($data): Series
    {
        return DB::transaction(function () use ($data) {
            //$data = $data->all();
            //dd($data);

            $series = Series::create([
                'nome' => $data['nome'],
                'cover' => $data['coverPath'],
            ]);

            $seasons = [];
            for ($i = 1; $i <= $data['seasonsQty']; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($j = 1; $j <= $data['episodesPerSeason']; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }
            Episode::insert($episodes);

            return $series;
        });
    }

    public function edit(SeriesFormRequest $request, Series $series)
    {
        $series->update($request->all());

        if ($series->seasons->count() < $request->seasonsQty) {
            $seasons = [];
            for ($i = $series->seasons->count() + 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);            
        } else {
            $seasonsToDelete = range($request->seasonsQty + 1, $series->seasons->count());

            Season::where('series_id', $series->id)->where('number', '>', $request->seasonsQty)->delete();
            
        }
        $series->refresh();

        if ($series->seasons) {
            foreach ($series->seasons as $season)
                if ($season->episodes->count() < $request->episodesPerSeason) {
                    $episodes = [];
                    for ($j = $season->episodes->count() + 1; $j <= $request->episodesPerSeason; $j++) {
                        $episodes[] = [
                            'season_id' => $season->id,
                            'number' => $j,
                        ];
                    }
                    Episode::insert($episodes);
                } else {
                    $episodes = range($request->episodesPerSeason + 1, $season->episodes->count());

                    Episode::where('season_id', $season->id)->whereIn('number', $episodes)->delete();                    
                }
            return $series;
        }
    }
}
