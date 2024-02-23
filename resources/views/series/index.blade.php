<x-layout title="Series" :mensagem-sucesso="$mensagemSucesso">

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col"><h4>Name Series</h2></th>
                <th scope="col"><h4>Seasons</h4></th>
                <th scope="col"><h4>Episodes</h4></th>
                <th scope="col"><h4>Options</h4></th>
            </tr>
        </thead>
        <tbody class="text-white">
            @foreach ($series as $serie)
                <tr>
                    <th scope="row" style="background-image: url('{{ asset('storage/' . $serie->cover) }}'); background-size: 100% 100%; background-position: center; height: 100px;">
                        @auth
                            <a class="col-4 text-start" href="{{ route('seasons.index', $serie->id) }}">
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
