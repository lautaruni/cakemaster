@extends('main')
	@section('page-content')
		<h1>Crear nuevo ingrediente</h1>
		{!! Form::model($ingredient,array('route'=>array('ingredients.update',$ingredient->id),'method'=>'PUT','data-toggle'=>'validator')) !!}
			<div class="form-group">
				<label>Descripción</label>
				{!! Form::text('description',null,array('maxlength'=>'100','requiered'=>'required')) !!}
			</div>
			<div class="form-group">
				<label>Tipo</label>
				{!! Form::select('type_id',$types,null) !!}
			</div>
			<div class="form-group">
				<button name="" click="window.location('{!! URL::to('admin/ingredients') !!}')">Cancelar</button>
				{!! Form::submit('Guardar!'); !!}
			</div>
		{!! Form::close() !!}
	@endsection