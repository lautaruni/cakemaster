@extends('main')
	@section('page-content')
		<h1>Crear nueva torta</h1>
		{!! Form::model($cake,array('route'=>array('cakes.update',$cake->id),'method'=>'PUT','data-toggle'=>'validator')) !!}
			<div class="form-group">
				<label>Nombre</label>
				{!! Form::text('name',null,array('maxlength'=>'100','requiered'=>'required')) !!}
			</div>
			<div class="form-group">
				<label>Alto</label>
				{!! Form::text('height',null,array('maxlength'=>'10','requiered'=>'required')) !!}
			</div>
			<div class="form-group">
				<label>Ancho</label>
				{!! Form::text('width',null,array('maxlength'=>'10','requiered'=>'required')) !!}
			</div>
			<div class="form-group">
				<label>Cantidad de Ingredientes</label>
				{!! Form::text('ingredient_qty',null,array('maxlength'=>'10','requiered'=>'required')) !!}
			</div>
			<div class="form-group">
				<button name="" click="window.location('{!! URL::to('cakes') !!}')">Cancelar</button>
				{!! Form::submit('Guardar!'); !!}
			</div>
		{!! Form::close() !!}
	@endsection