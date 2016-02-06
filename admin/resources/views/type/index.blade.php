@extends('main')
	@section('page-content')
		<h1>Lista de Tipos de ingredientes</h1>
		{!! Form::open(['route'=>['types.destroy',0],'method'=>'DELETE']) !!}
		<div class="btn-group col-sm-6">
			{!! Form::submit('Borrar elementos seleccionados',['class'=>'btn btn-danger','onclick'=>'return confirm("¿Seguro que quieres borrarlo?")']) !!}
		</div>
		<div class="btn-group col-sm-6">
			<a href="{!! URL::to('types/create') !!}" class="btn btn-primary">Agregar tipo de ingrediente</a>
		</div>
		<table class="col-sm-12">
			<thead>
				<th>#</th>
				<th>Descripción</th>
				<th>Tipo</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($types as $item)
				<tr>
					<td>{!! Form::checkbox('to_delete[]',$item->id) !!}</td>
					<td>{!! $item->description !!}</td>
					<td><a href="{!! URL::to('types/'.$item->id.'/edit') !!}" class="btn btn-primary">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! Form::close() !!}
	@endsection