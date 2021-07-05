@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('ovin.index') }}" method="GET" role="search">
                 <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search ovins">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="rechercher" id="term">
                        <a href="{{ route('ovin.index') }}" class=" mt-1">
                            <span class="input-group-btn  mr-5 mt-1">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                   <span class="fa fa-refresh"></span>
                                  
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
  	<p>
  		<a href="{{ route('ovins.create') }}" class="btn btn-primary">Ajouter un nouvel ovin</a>
  	</p>
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

  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>#</th>
        <th>Sexe</th>
        <th>dateDeNaissance</th>
        <th>Race</th>
        <th>Nom</th>
        <th>Poids</th>
        <th>CodeEntree</th>
        <th>DateEntree</th>
  			<th>CodeSortie</th>
        <th>DateSortie</th>
        <th>Prix</th>
  			<th>Action</th>
  		</tr>
      @if(count($ovins))
  		@foreach($ovins as $key => $ovin)
  			<tr>
  				<td>{{ $key+1 }}</td>
  				<td>{{ $ovin->sexe }}</td>
          <td>{{ $ovin->dateDeNaissance }}</td>
          <td>{{ $ovin->race }}</td>
          <td>{{ $ovin->nom }}</td>
          <td>{{ $ovin->poids }}</td>
          <td>{{ $ovin->codeEntree }}</td>
          <td>{{ $ovin->dateEntree }}</td>
          <td>{{ $ovin->codeSortie }}</td>
          <td>{{ $ovin->dateDeSortie }}</td>
          <td>{{$ovin->prix}}</td>
  				<td>
            <a href="{{ route('ovins.edit',$ovin->rfid) }}" class="btn btn-info"> <i class="fa fa-edit"> Modifier</i></a> 
            <a href="{{ route('ovins.destroy',$ovin->rfid) }}" class="btn btn-danger"><i class="fa fa-trash"> Supprimer </i></a> 
          </td>
  			</tr>
  		@endforeach
      @else
      <tr><td colspan="12">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
  {{--  {{ $ovins->render() }} --}}
  </div>
 

</section>	
 

@endsection