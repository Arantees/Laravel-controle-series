 <div class="container">
     <form action="{{ $action }}" method="post">
         @csrf

         @if ($update)
             @method('PUT')
         @endif
         <div class="container">
             <div class="row">
                 <div class="mb-3 mt-3 col-6">
                     <label for="nome" class="form-label">
                         <h1 style="color: white">Nome:</h1>
                     </label>
                     <input type="text" id="nome" name="nome" class="form-control"
                         @isset($nome)value="{{ $nome }}" @endisset>
                 </div>
                 <div class="mb-3 mt-3 col-3">
                     <label for="seasonsQty" class="form-label">
                         <h1 style="color: white">Seasons</h1>
                     </label>
                     <input type="number" id="seasonsQty" name="seasonsQty" class="form-control"
                         @isset($seasonsQty)value="{{ $seasonsQty }}" @endisset>
                 </div>
                 <div class="mb-3 mt-3 col-3">
                     <label for="episodesPerSeason" class="form-label">
                         <h1 style="color: white">Episodes:</h1>
                     </label>
                     <input type="number" id="episodesPerSeason" name="episodesPerSeason" class="form-control"
                         @isset($episodesPerSeason)value="{{ $episodesPerSeason }}" @endisset>
                 </div>
             </div>
             <div class="mb-3">
                 <label for="descricao" class="form-label">
                     <h1 style="color: white">Description:</h1>
                 </label>
                 <div class="card">
                     <textarea id="descricao" name="description" class="form-control" style="resize: vertical; min-height: 100px;">
@isset($descricao)
{{ $descricao }}
@endisset
</textarea>
                 </div>
             </div>
         </div>

         <button type="submit" class="btn btn-dark">Adicionar</button>
     </form>
 </div>
