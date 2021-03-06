@extends('main')
	@section('page-content')
		<h1>Crear nuevo tipo de ingrediente</h1>
		{!! Form::model($type,array('route'=> array('types.update',$type->id),'method'=>'PUT','data-toggle'=>'validator')) !!}
			<div class="form-group">
				<label>Descripción</label>
				{!! Form::text('description',null,array('maxlength'=>'100','requiered'=>'required')) !!}
			</div>
			<div class="form-group">
				<button name="" click="window.location('{!! URL::to('types') !!}')">Cancelar</button>
				{!! Form::submit('Guardar!'); !!}
			</div>
		{!! Form::close() !!}
	@endsection