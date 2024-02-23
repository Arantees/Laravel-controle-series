 <div class="container">
     <form action="{{ $action }}" method="post"  enctype="multipart/form-data>
         @csrf

         @if ($update)
             @method('PUT')
         @endif
 </div>
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
         @isset($descricao)
             {{ $descricao }}
         @endisset
         </textarea>
     </div>
 </div>
 
 <button type="submit" class="btn btn-outline-primary">Add</button>
</div>
 </form>
 </div>
