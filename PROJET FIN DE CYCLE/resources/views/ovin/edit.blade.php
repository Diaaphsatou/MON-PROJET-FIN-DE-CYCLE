@extends("layouts.admin")
@section("content")
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mise a jour ovins</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Mettre a jour  </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <form  action="{{ route('ovins.update', $ovins->rfid) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
      <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('info'))

                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('info') }}</p>
                </div>
             @elseif(Session::has('error'))
                <div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('error') }}</p>
                </div>
                
            @endif
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Nom de l'Ovin</label>
          <div class="col-md-6"><input type="text" name="nom" value="{{$ovins->nom}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Sexe</label>
          <div class="col-md-6">
            <select name="sexe" class="form-control">
              <option value="">Veuillez Selectionner le sexe</option>
              <option value="Masculin" @if($ovins->sexe == 'Masculin') selected @endif>Masculin</option>
              <option value="Féminin" @if($ovins->sexe == 'Féminin') selected @endif>Féminin</option>
            
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date de Naissance</label>
          <div class="col-md-6"><input type="date" name="dateDeNaissance" value="{{$ovins->dateDeNaissance}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Poids</label>
          <div class="col-md-6"><input type="number" step="0.5" name="poids" value="{{$ovins->poids}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Race Ovin</label>
          <div class="col-md-6"><input type="text" name="race"  value="{{$ovins->race}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Prix Ovin</label>
          <div class="col-md-6"><input type="number" name="prix" value="{{$ovins->prix}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Code Entrée</label>
          <div class="col-md-6"><input type="text" name="codeEntree" value="{{$ovins->codeEntree}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date Entrée</label>
          <div class="col-md-6"><input type="date" name="dateEntree"  value="{{$ovins->dateEntree}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Code de Sortie</label>
          <div class="col-md-6"><input type="text" name="codeSortie" value="{{$ovins->codeSortie}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date de Sortie</label>
          <div class="col-md-6"><input type="date" name="dateDeSortie" value="{{$ovins->dateDeSortie}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-info">Modifier</button>
      </div>
    </form>
  </div>
</section>
@endsection