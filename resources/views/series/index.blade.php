<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-primary mb-5">Add</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="col-4 text-start" href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->nome }}
                </a>
                <p class="col-4 text-center">{{ $serie->totalSeason }} Season(s)</p>
                <p class="col-3">Episodios</p>
                <div class="d-flex col-1 text-end">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2"
                        onsubmit="return confirm('Deseja apagar {{ $serie->nome }} ??')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i
                                class="fa-regular fa-trash-can"></i></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    
</x-layout>
