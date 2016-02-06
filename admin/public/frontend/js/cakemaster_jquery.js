var json_ingredients={};
var rows=3;
var cols=3;
$.get('http://localhost/tortas/admin/public/api/getIngredients/0',function(data){
	json_ingredients=data['ingredients'];
	generateTable(rows,cols,json_ingredients);
});
var points=0;
$('#btn-points').click(function(){
	//cake_ingredients=generateArrIngredients(json_ingredients);
	// calculo puntos
	/*$('select[name="ingredients[]"').each(function(){
		cake_ingredients[$(this).children('option:selected').text()]=cake_ingredients[$(this).children('option:selected').text()]+1;
	});*/
	posArr=generateMatrix(rows,cols);
	/*for(pos_row=0; pos_row < rows; pos_row++){
		for(pos_col=0;pos_col < cols;pos_col++){
			$('#cakeTable td.ing_'+pos_row+'-'+pos_col+' select option:selected').val();
		}
	}*/
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
	if(getPosText(pos_middle_x,pos_middle_y)){
		points=points+10;
	}
	// recorror la matriz
	for(pos_row=0; pos_row < rows; pos_row++){
		for(pos_col=0;pos_col < cols;pos_col++){
			//recorro las columnas
			// pregunto lo que vino antes
			if(pos_col-1 > 0){
				if(getPosVal(pos_row,pos_col-1)==pos_now){
					// pregunto si el que viene después es igual
				}
			}
			// pregunto lo que viene después
			if(pos_col+1 < cols){}
		}
	}
	console.log(points);
});

function generateTable(rows,cols,data){
	// generate table and selects
	for(i=0;i < rows;i++){
		$('#cakeTable tbody').append('<tr></tr>');
		for(j=0; j < cols;j++)
			$('#cakeTable tbody tr:last').append('<td class="ing_'+i+'-'+j+'"></td>');
	}
	$('#cakeTable tbody tr td').append('<select name="ingredients[]"></select>');
	// paso los valores de data
	for(i=0; i < data.length; i++){
		$('select[name="ingredients[]"').append('<option value="'+data[i].id+'">'+data[i].description+'</option>')
	}
}

// genero un array con los ids de los datos para ir sumándoles valores.
//devuelvo el array
function generateArrIngredients(data){
	var aux=[];
	for(i=0;i < (data.length -1);i++){
		aux[data[i].description]=0;
	}
	return aux;
}

function generateMatrix(rows,cols){
	var aux = new Array(rows);
	for (var i = 0; i < rows; i++) {
	  aux[i] = new Array(cols);
	}
	return aux;
}

function getPosVal(pos_row,pos_col){
	return $('#cakeTable td.ing_'+pos_row+'-'+pos_col+' select option:selected').val();
}

function getPosText(pos_row,pos_col){
	return $('#cakeTable td.ing_'+pos_row+'-'+pos_col+' select option:selected').text();
}