<x-layout title="Series" :mensagem-sucesso="$mensagemSucesso">

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Name Series</th>
                <th scope="col">Seasons</th>
                <th scope="col">Episodes</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody class="text-white">
            @foreach ($series as $serie)
                <tr>
                    <th scope="row">
                        @auth <a class="col-4 text-start" href="{{ route('seasons.index', $serie->id) }}">
                                {{ $serie->nome }}
                            </a>
                        @endauth
                        @guest
                            {{ $serie->nome }}
                        @endguest

                    </th>
                    <td class="col-4 text-center"> {{ $serie->totalSeason }}</td>
                    <td> {{ $serie->totalEpisodes }} </td>
                    <td class="text-nowrap"><a href="{{ route('series.edit', $serie->id) }}"
                            class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2 d-inline"
                            onsubmit="return confirm('Deseja apagar {{ $serie->nome }} ??')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
