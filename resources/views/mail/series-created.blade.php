@component('mail::message')
    # Serie {{ $nomeSerie}} criada!

    A série {{ $nomeSerie }} com {{ $qtySeasons }} temporadas e {{ $episodesForSeasons }} episodes

    @component('mail::button', ['url' => route('seasons.index', $idSerie)])
        Ver Série
    @endcomponent

@endcomponent
