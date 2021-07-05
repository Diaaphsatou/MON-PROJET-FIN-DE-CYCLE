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
                <form action="{{ route('echographie.index') }}" method="GET" role="search">
                 <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search ovins">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="rechercher" id="term">
                        <a href="{{ route('echographie.index') }}" class=" mt-1">
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
  		<a href="{{ route('echographie.create') }}" class="btn btn-primary">Ajouter un echogrqphie </a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			    <th>NUM Echo</th>
  			    <th>Lot</th>
            <th>NombreFoetus</th>
            <th>dateECHO</th>
            <th>RFIDOvin</th>
  			    <th>Action</th>
  		</tr>
      @if(count($echographie))
  		@foreach($echographie as $key => $echographie)
  			<tr>
  				<td>{{ $key+1 }}</td>
  				<td>{{ $echographie->lot }}</td>
          <td>{{ $echographie->nbreFoetus }}</td>
          <td>{{ $echographie->dateEcho }}</td>
          <td>{{ $echographie->ovins_RFID }}</td>
  				<td>
            <a href="{{ route('echographie.edit',$echographie->id) }}" class="btn btn-info"> <i class="fa fa-edit"> Modifier </i></a> 
            <a href="{{ route('echographie.destroy',$echographie->id) }}" class="btn btn-danger"><i class="fa fa-trash"> Supprimer </i></a> 
          </td>
  			</tr>
  		@endforeach
      @else
      <tr><td colspan="6">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
    
  </div>
</section>	


@endsection