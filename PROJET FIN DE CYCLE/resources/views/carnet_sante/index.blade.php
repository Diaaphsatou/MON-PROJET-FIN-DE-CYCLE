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
                <form action="{{ route('carnet_sante.index') }}" method="GET" role="search">
                 <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search ovins">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="rechercher" id="term">
                        <a href="{{ route('carnet_sante.index') }}" class=" mt-1">
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
  		<a href="{{ route('carnet_sante.create') }}" class="btn btn-primary">Ajouter un noueau carnet de santé</a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>Id</th>
  		    	<th>Date Debut Traitement</th>
            <th>Date Fin Traitement</th>
            <th>Traitement</th>
            <th>Numero de l'ordenance</th>
            <th>Nom du produit</th>
            <th>Motif du traitement</th>
            <th>Intervenant</th>
            <th>Date De Remise En Vente</th>
            <th>RFIIDOvin</th>
  			<th>Action</th>
  		</tr>
      @if(count($carnet_sante))
  		@foreach($carnet_sante as $key => $carnet_sante)
  			<tr>
  				<td>{{ $key+1 }}</td>
  				<td>{{ $carnet_sante->dateDebutTraitement }}</td>
          <td>{{ $carnet_sante->dateFinTraitement }}</td>
          <td>{{ $carnet_sante->traitement}}</td>
          <td>{{ $carnet_sante->numOrdenance}}</td>
          <td>{{ $carnet_sante->nomProduit}}</td>
          <td>{{ $carnet_sante->motifDuTraitement}}</td>
          <td>{{ $carnet_sante->intervenant}}</td>
          <td>{{ $carnet_sante->dateRemiseEnVente}}</td>
          <td>{{ $carnet_sante->ovins_RFID}}</td>
                
  				<td>
          <a href="{{ route('carnet_sante.edit',$carnet_sante->id) }}" class="btn btn-info"> <i class="fa fa-edit"> Modifier </i></a> 
          <a href="{{ route('carnet_sante.destroy',$carnet_sante->id) }}" class="btn btn-danger"><i class="fa fa-trash"> Supprimer </i></a> 
          </td>
  			</tr>
  		@endforeach
      @else
      <tr><td colspan="11">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
  
  </div>
</section>	


@endsection