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
                <form action="{{ route('livraison.index') }}" method="GET" role="search">
                 <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search ovins">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="rechercher" id="term">
                        <a href="{{ route('livraison.index') }}" class=" mt-1">
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
  		<a href="{{ route('livraison.create') }}" class="btn btn-primary">Ajouter un nouvelle livraison</a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>Id</th>
  			<th>Date livraison</th>
        <th>Destination</th>
        <th>Transport</th>
        <th>RFIIDOvin</th>
  			<th>Action</th>
  		</tr>
      @if(count($livraison))
  		@foreach($livraison as $key => $livraison)
  			<tr>
  				<td>{{ $key+1 }}</td>
  				<td>{{ $livraison->date }}</td>
          <td>{{ $livraison->destination }}</td>
          <td>{{ $livraison->transport }}</td>
          <td>{{ $livraison->ovins_RFID }}</td>
  				<td>
            <a href="{{ route('livraison.edit',$livraison->id) }}" class="btn btn-info"> <i class="fa fa-edit"> Modifier </i></a> 
            <a href="{{ route('livraison.destroy',$livraison->id) }}" class="btn btn-danger"><i class="fa fa-trash"> Supprimer </i></a> 
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