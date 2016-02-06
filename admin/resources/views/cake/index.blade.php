@extends('main')
	@section('page-content')
		<h1>Lista de Tortas</h1>
		{!! Form::open(['route'=>['cakes.destroy',0],'method'=>'DELETE']) !!}
		<div class="btn-group col-sm-6">
			{!! Form::submit('Borrar elementos seleccionados',['class'=>'btn btn-danger','onclick'=>'return confirm("¿Seguro que quieres borrarlo?")']) !!}
		</div>
		<div class="btn-group col-sm-6">
			<a href="{!! URL::to('cakes/create') !!}" class="btn btn-primary">Agregar Torta</a>
		</div>
		<table class="col-sm-12">
			<thead>
				<th>#</th>
				<th>Nombre</th>
				<th>Alto</th>
				<th>Ancho</th>
				<th>Cant. Ingre.</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($cakes as $item)
				<tr>
					<td>{!! Form::checkbox('to_delete[]',$item->id) !!}</td>
					<td>{!! $item->name !!}</td>
					<td>{!! $item->height !!}</td>
					<td>{!! $item->width !!}</td>
					<td>{!! $item->ingredient_qty !!}</td>	
					<td><a href="{!! URL::to('cakes/'.$item->id.'/edit') !!}" class="btn btn-primary">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! Form::close() !!}
	@endsection