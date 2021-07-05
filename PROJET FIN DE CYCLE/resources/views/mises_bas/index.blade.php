@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">News</h1>
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
                <form action="{{ route('mises_bas.index') }}" method="GET" role="search">
                 <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search mises bas">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="rechercher" id="term">
                        <a href="{{ route('mises_bas.index') }}" class=" mt-1">
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
  		<a href="{{ route('mises_bas.create') }}" class="btn btn-primary">Enregistrer une mise bas </a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			    <th>Id</th>
            <th>date</th>
            <th>nombreAgneauVivant</th>
            <th>nombreAgneauMort</th>
            <th>ProblemeMisesBas</th>
            <th>PeriodeMisesBas</th>
            <th>methode</th>
            <th>Commentaire</th>
            <th>ovins_RFID</th>
            <th>echographies_id</th>
  			<th>Action</th>
  		</tr>
      @if(count($mises_bas))
  	  @foreach($mises_bas as $key => $mises_bas)
  		<tr>
  		    <td>{{ $key+1 }}</td>
          <td>{{ $mises_bas->date }}</td>
  		    <td>{{ $mises_bas->nombreAgneauVivant }}</td>
          <td>{{ $mises_bas->nombreAgneauMort }}</td>
          <td>{{ $mises_bas->ProblemeMisesBas }}</td>
          <td>{{ $mises_bas->periodeMisesBas }}</td>
          <td>{{ $mises_bas->methode }}</td>
          <td>{{ $mises_bas->commentaire }}</td>
          <td>{{ $mises_bas->ovins_RFID}}</td>
          <td>{{ $mises_bas->echographies_id}}</td>
          <td>
            <a href="{{ route('mises_bas.edit',$mises_bas->id) }}" class="btn btn-info"> <i class="fa fa-edit"> Modifier </i></a> 
            <a href="{{ route('mises_bas.destroy',$mises_bas->id) }}" class="btn btn-danger"><i class="fa fa-trash"> Supprimer </i></a> 
          </td>
  		</tr>
  		@endforeach
      @else
      <tr><td colspan="14">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
    
  </div>
</section>	


@endsection