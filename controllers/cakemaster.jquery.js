var json_ingredients={};
var rows=3;
var cols=3;
$.get('http://localhost/tortas/admin/public/api/0',function(data){
	json_ingredients=data['ingredients'];
	generateTable(rows,cols,json_ingredients);
});
var points=0;
$('#btn-points').click(function(e){
	e.preventDefault();
	sumPoints();
});

function sumPoints(){
	console.log("///////////// NUEVO /////////////");
	var points=0;
	// calculo si lo del medio son frutillas.
	// dejo preparado para que en caso de que el usario cambie el tamaño de la torta.
	pos_middle=Math.floor(rows/2);
	remainer = pos_middle % 1;
	pos_middle_x = pos_middle - remainer;
	pos_middle=Math.floor(rows/2);
	remainer = pos_middle % 1;
	pos_middle_y = pos_middle - remainer;
	if(getPosText(pos_middle_x,pos_middle_y)=="Frutillas"){
		points=points+10;
	}
	// recorror la matriz
	for(pos_row=0; pos_row < rows; pos_row++){
		for(pos_col=0;pos_col < cols;pos_col++){
			pos_now=getPosVal(pos_row,pos_col);
			pos_prev=true;
			//recorro las columnas
			// horizontal.
			// pregunto lo que vino antes
			if(pos_col-1 > 0){
				if(getPosVal(pos_row,pos_col-1)==pos_now){
					// pregunto si el que viene después es igual
					pos_prev=false;
				}
			}
			if(pos_col+1 < cols && pos_prev){
				// horizontal
				if(pos_now==getPosVal(pos_row,pos_col+1)){
					if(pos_col+2 < cols && pos_now==getPosVal(pos_row,pos_col+2)){
						points=points+4;
					}else{
						points=points+1;
					}
					console.log('POS '+pos_row+','+pos_col);
					console.log('POINTS HOR ADDED '+points);
				}
			}
			// vertical.
			if(pos_row-1 > 0){
				if(getPosVal(pos_row-1,pos_col)==pos_now){
					// pregunto si el que viene después es igual
					pos_prev=false;
				}
			}
			if(pos_row+1 < rows && pos_prev){
				// horizontal
				if(pos_now==getPosVal(pos_row+1,pos_col)){
					if(pos_row+2 < rows && pos_now==getPosVal(pos_row+2,pos_col)){
						points=points+4;
					}else{
						points=points+1;
					}
					console.log('POS '+pos_row+','+pos_col);
					console.log('POINTS VERT ADDED '+points);
				}
			}
			//diag
			if(pos_row-1 > 0 && pos_col-1 > 0){
				if(getPosVal(pos_row-1,pos_col-1)==pos_now){
					// pregunto si el que viene después es igual
					pos_prev=false;
				}
			}
			if((pos_row+1 < rows && pos_col+1 < cols) && pos_prev){
				// horizontal
				if(pos_now==getPosVal(pos_row+1,pos_col+1)){
					if((pos_row+2 < rows && pos_col+2 < cols) && pos_now==getPosVal(pos_row+2,pos_col+2)){
						points=points+4;
					}else{
						points=points+1;
					}
					console.log('POS '+pos_row+','+pos_col);
					console.log('POINTS DIAG ADDED '+points);
				}
			}
		}
	}
	console.log(points);
	$('#cake_points').html("");
	$('#cake_points').html(points);
}

function generateTable(rows,cols,data){
	// generate table and selects
	for(i=0;i < rows;i++){
		$('#cakeTable tbody').append('<tr></tr>');
		for(j=0; j < cols;j++){
			$('#cakeTable  tbody tr:last').append('<td></td>');
		}
	}
	$('#cakeTable tbody tr td').append('<select name="ingredients[]"></select>');
	// paso los valores de data
	for(i=0; i < data.length; i++){
		$('select[name="ingredients[]"').append('<option value="'+data[i].id+'">'+data[i].description+'</option>')
	}
}

// Genero un array con todos los ingredientes seleccionados.
function getIngredientsFromTable(){
	var aux=[];
	i=0;
	$('select option:selected').each(function(e){
		if($(this).val()!="undefinied"){
			aux[i]=$(this).val();
		}
		i+=1;
	});
	return aux;
}

function getPosVal(pos_row,pos_col){
	return $('#cakeTable td.ing_'+pos_row+'-'+pos_col+' select option:selected').val();
}

function getPosText(pos_row,pos_col){
	return $('#cakeTable td.ing_'+pos_row+'-'+pos_col+' select option:selected').text();
}

$('#btn-saveCake').click(function(){
	if($('#cake_name').val()!=""){
		sumPoints();
			var cake={
			'name':$('#cake_name').val(),
			'height':3,
			'width':3,
			'ingredient_qty':3*3,
			'points':$('#cake_points').text(),
			'ingredients_list':JSON.stringify(getIngredientsFromTable())
		};
		$.ajax({
	            //url: 'http://localhost/tortas/admin/public/api/store',
	            url: 'http://localhost/tortas/admin/public/api/save',
	            type: 'get',
	            dataType: 'json',
	            success: function (data) {
	            	if(data.message=="ok"){
	            		$('#cake_message').removeClass('alert alert-dismissible alert-danger').html("");
	            		$('#cake_message').addClass('alert alert-dismissible alert-success').html('<p>¡Muy bien! Torta Guardada. Ahora podés fijarte si es una de las mejores <a href="#thebest">acá</a></p>');
	            	}
	            	// actualizo las mejores tortas.
	            	getBests();
	            },
	            data: cake
	        });
	}else{
		$('#cake_message').addClass('alert alert-dismissible alert-danger').html('<p>Para que todo vaya bien... ponele un nombre de la torta ;)</p>');
	}
});
//

function getBests(){
	$('.best_cake').remove();
	$.get('http://localhost/tortas/admin/public/api/getbest',function(data){
		json_bests=data['bests'];
		for(i=0;i < json_bests.length;i++){
			$('#thebest .container').append('<div class="col-sm-2 best_cake bestcake_'+json_bests[i].id+'"><h3>'+json_bests[i].name+'</h3><b>Ingredientes:</b> <ul></ul></div>');
			console.log(json_bests[i].ingredients_list.length);
			for(j=0;j < json_bests[i].ingredients_list.length;j++){
				$('.bestcake_'+json_bests[i].id+' ul').append('<li>'+json_bests[i].ingredients_list[j].description+'</li>')
			}
		}
	});
}

getBests();