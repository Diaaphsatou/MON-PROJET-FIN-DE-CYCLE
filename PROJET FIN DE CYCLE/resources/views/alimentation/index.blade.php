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
                <form action="{{ route('alimentation.index') }}" method="GET" role="search">
                 <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search alimentation">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="rechercher" id="term">
                        <a href="{{ route('alimentation.index') }}" class=" mt-1">
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
  		<a href="{{ route('alimentation.create') }}" class="btn btn-primary">Ajouter une nouvelle alimentation</a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>Id</th>
        <th>Categories_0vins</th>
        <th>TypeAliments</th>
        <th>Quantites</th>
        <th>Periodes</th>
        <th>Methode</th>
        <th>Action</th>
  		</tr>
      @if(count($alimentation)>0)
  	  @foreach($alimentation as $key => $alimentation )
  			<tr>
  				<td>{{ $key+1 }}</td>
          <td>{{ $alimentation ->categories_ovins }}</td>
          <td>{{ $alimentation ->typeAliments }}</td>
  				<td>{{ $alimentation ->quantites }}</td>
          <td>{{ $alimentation ->periodes }}</td>
          <td>{{$alimentation ->methode}}</td> 
  			  <td>
            <a href="{{ route('alimentation.edit',$alimentation->id) }}" class="btn btn-info"> <i class="fa fa-edit"> Modifier </i></a> 
            <a href="{{ route('alimentation.destroy',$alimentation->id) }}" class="btn btn-danger"><i class="fa fa-trash"> Supprimer </i></a> 
          </td>
  		 </tr>
  		@endforeach
      @else
      <tr><td colspan="7">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
  
  </div>
</section>	


@endsection