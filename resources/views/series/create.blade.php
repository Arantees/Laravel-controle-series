<x-layout title="New Serie">

    <div class="container">
        <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3 mt-5">
                <div class="col-6">
                    <label for="nome" class="form-label">
                        <h3 style="color: white">Name:</h3>
                    </label>
                    <input type="text" autofocus id="nome" name="nome" class="form-control"
                        value="{{ old('nome') }}">
                </div>
                <div class="col-3">
                    <label for="seasonsQty" class="form-label">
                        <h3 style="color: white">Seasons:</h3>
                    </label>
                    <input type="text" id="seasonsQty" name="seasonsQty" class="form-control"
                        value="{{ old('seasonsQty') }}">
                </div>
                <div class="col-3">
                    <label for="episodesPerSeason" class="form-label">
                        <h3 style="color: white">Episodes:</h3>
                    </label>
                    <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control"
                        value="{{ old('episodesPerSeason') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="cover" class="form-label">
                        <h3 style="color: white">Capa</h3>
                    </label>
                    <input type="file" id="cover" name="cover" class="form-control"
                        accept="image/gif, image/jpeg, image/png">
                </div>
                <div class="col-8">
                    <label for="descricao" class="form-label">
                        <h3 style="color: white">Description:</h3>
                    </label>
                    <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

            </div>

            <button type="submit" class="btn btn-outline-primary btn-lg">Add</button>
        </form>
    </div>

</x-layout>
