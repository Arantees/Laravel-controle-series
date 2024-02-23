<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\Authenticator;
use App\Repositories\SeriesRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SeriesFormRequest;
use App\Events\SeriesCreated as EventsSeriesCreated;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware(Authenticator::class)->except('index');
    }

    public function index(Request $request)
    {
        $series = Series::orderBy('nome')->get();

        foreach ($series as $serie) {
            $serie->totalSeason = $serie->seasons->count();
            foreach ($serie->seasons as $season) {
                $serie->totalEpisodes = $season->episodes->count();
            }
        }

        $mensagemSucesso = session('mensagem.sucesso');

        /**  return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
         */

        return view('series.index', compact('series', 'mensagemSucesso'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $coverPath = $request->file('cover')
            ->store('series_cover', 'public');            
            $data = $request->all();
            $data['coverPath'] = $coverPath; 


        $series = $this->repository->add($data);
        EventsSeriesCreated::dispatch(
            $series->nome,
            $series->id,
            $request->seasonsQty,
            $request->episodesPerSeason,
        );

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        if ($series->coverPath) {
            Storage::disk('public/storage/')->delete($series->coverPath);
        }

        $series->delete();
        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series = $this->repository->edit($request, $series);

        $series->fill($request->all());
        $series->save();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' alterada com sucesso");
    }
}
