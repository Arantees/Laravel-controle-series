<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        
    } 

    public function index(Request $request)
    {
        $series = Series::orderBy('nome')->get();

        foreach ($series as $serie) {
            $serie->totalSeason = $serie->seasons->count();
        }

        $mensagemSucesso = session('mensagem.sucesso');
        //$request->session()->forget('mensagem.sucesso');
        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {   
        $series = $this->repository->add($request);

        return redirect()->route('series.index')
            ->with('mensagem.sucesso',"Série '{$series->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {        
        if($series->seasons->count() < $request->seasonsQty){
            $seasons = [];
            for ($i = $series->seasons->count()+1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);           
        }else{
            $seasons = range($request->seasonsQty +1, $series->seasons->count() );
            
            Season::where('series_id', $series->id)->whereIn('number', $seasons)->delete(); 
        }
            

        $series->fill($request->all());
        $series->save();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' alterada com sucesso");
    }
}
