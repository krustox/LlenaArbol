/**
 * @author Diego
 */
$(document).ready(function(){
	$("#holding").change(function() {
  		$("#empresa").load("../ajax/select_empresa.php?holding=" + $("#holding").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#empresa").change(function() {
  		$("#canal").load("../ajax/select_canal.php?empresa=" + $("#empresa").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#canal").change(function() {
  		$("#servicio").load("../ajax/select_servicio.php?canal=" + $("#canal").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#servicio").change(function() {
  		$("#tipo_servicio").load("../ajax/select_tipo_servicio.php?servicio=" + $("#servicio").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#tipo_servicio").change(function() {
		if($("#tipo_servicio").val().indexOf("INFRAESTRUCTURA") !== -1){
  			$("#subservicio").load("../ajax/select_subservicio.php?tipo=" + $("#tipo_servicio").val());
  			//window.alert("sometext");
  		}else{
  			$("#agrupacion").load("../ajax/select_agrupacion.php?tipo=" + $("#tipo_servicio").val());
  			//window.alert("sometext");
  		}
	});
});

$(document).ready(function(){
	$("#subservicio").change(function() {
  		$("#site").load("../ajax/select_site.php?subservicio=" + $("#subservicio").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#site").change(function() {
  		$("#componente").load("../ajax/select_componente.php?site=" + $("#site").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#componente").change(function() {
  		$("#subcomponente").load("../ajax/select_subcomponente.php?componente=" + $("#componente").val());
  		//window.alert("sometext");
	});
});

//Experiencia Usuaria
$(document).ready(function(){
	$("#agrupacion").change(function() {
  		$("#segmento").load("../ajax/select_segmento.php?agrupacion=" + $("#agrupacion").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#segmento").change(function() {
  		$("#producto").load("../ajax/select_producto.php?segmento=" + $("#segmento").val());
  		//window.alert("sometext");
	});
});

$(document).ready(function(){
	$("#producto").change(function() {
  		$("#transaccion").load("../ajax/select_transaccion.php?producto=" + $("#producto").val());
  		//window.alert("sometext");
	});
});



//INDEX
$( function() {
    $( "#accordion" ).accordion({
      collapsible: true,
      active: 0,
      heightStyle: "content"
    });
  } );
  
function empresa(nombre, texto){
	$("#div_empresa").empty();
	$("#holding").text("");
  	$("#holding").append("Holding: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_empresa.php?holding=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
         $("#div_empresa").append(response);
     }
});
 
 $( "#accordion" ).accordion({active: 1});
jsRemoveWindowLoad();
  }
  
function canal(nombre,texto){
	$("#div_canal").empty();
	$("#empresa").text("");
	$("#empresa").append("Empresa: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_canal.php?empresa=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
         
     }
});	
 	$("#div_canal").append(response);
 	$( "#accordion" ).accordion({active: 2});
  }

  function servicio(nombre,texto){
  	$("#div_servicio").empty();
  	$("#canal").text("");
  	$("#canal").append("Canal: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_servicio.php?canal=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_servicio").append(response);
 $( "#accordion" ).accordion({active: 3});
  }
  
  function tipo(nombre,texto){
  	$("#div_tipo").empty();
  	$("#servicio").text("");
  	$("#servicio").append("Plataforma Aplicativa: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_tipo_servicio.php?servicio=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_tipo").append(response);
 $( "#accordion" ).accordion({active: 4});
  }
  
  function subservicio(nombre,texto){
  	$("#div_subservicio").empty();
  	$("#tipo").text("");
  	$("#tipo").append("Tipo de Servicio: <span class=\"texto\"> "+texto+"</span>");
  	var response;
  	if(texto === "Infraestructura"){
	$.ajax({ type: "GET",   
     	url: "./ajax/select_subservicio.php?tipo=" + nombre +"&u=2",   
     	async: false,
     	success : function(text)
     	{
        	 response= text;
     	}
	});
	$("#subservicio").text("");
	$("#subservicio").append("Subservicio: ");
	$("#site").text("");
	$("#site").append("Site: ");
	$("#componente").text("");
	$("#componente").append("Componente: ");
	$("#subcomponente").text("");
	$("#subcomponente").append("Subcomponente: ");
	$("#elemento").text("");
	$("#elemento").append("Elemento: ");
	}else{
	$.ajax({ type: "GET",   
     	url: "./ajax/select_agrupacion.php?tipo=" + nombre +"&u=2",   
     	async: false,
     	success : function(text)
     	{
        	 response= text;
     	}
	});
	$("#subservicio").text("");
	$("#subservicio").append("Agrupacion: ");
	$("#site").text("");
	$("#site").append("Segmento: ");
	$("#componente").text("");
	$("#componente").append("Producto: ");
	$("#subcomponente").text("");
	$("#subcomponente").append("Transaccion: ");
	$("#elemento").text("");
	$("#elemento").append("Operacion: ");
	}	
 $("#div_subservicio").append(response);
 $( "#accordion" ).accordion({active: 5});
  }
  
  
  function site(nombre,texto){
  	$("#div_site").empty();
  	$("#subservicio").text("");
  	$("#subservicio").append("Subservicio: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_site.php?subservicio=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_site").append(response);
 $( "#accordion" ).accordion({active: 6});
  }
  
  function componente(nombre,texto){
  	$("#div_componente").empty();
  	$("#site").text("");
  	$("#site").append("Site: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_componente.php?site=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_componente").append(response);
 $( "#accordion" ).accordion({active: 7});
  }
  
  function subcomponente(nombre,texto){
  	$("#div_subcomponente").empty();
  	$("#componente").text("");
  	$("#componente").append("Componente: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_subcomponente.php?componente=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_subcomponente").append(response);
 $( "#accordion" ).accordion({active: 8});
  }
    
  function elemento(nombre,texto){
 	$("#div_elemento").empty();
  	$("#subcomponente").text("");
  	$("#subcomponente").append("Subcomponente: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_elemento.php?subcomponente=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_elemento").append(response);
 $( "#accordion" ).accordion({active: 9});
  }
  
  function segmento(nombre,texto){
  	$("#div_site").empty();
  	$("#subservicio").text("");
  	$("#subservicio").append("Agrupacion: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_segmento.php?agrupacion=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_site").append(response);
 $( "#accordion" ).accordion({active: 6});
  }
  
  function producto(nombre,texto){
  	$("#div_componente").empty();
  	$("#site").text("");
  	$("#site").append("Segmento: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_producto.php?segmento=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_componente").append(response);
 $( "#accordion" ).accordion({active: 7});
  }
  
  function transaccion(nombre,texto){
  	$("#div_subcomponente").empty();
  	$("#componente").text("");
  	$("#componente").append("Producto: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_transaccion.php?producto=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_subcomponente").append(response);
 $( "#accordion" ).accordion({active: 8});
  }
    
  function operacion(nombre,texto){
 	$("#div_elemento").empty();
  	$("#subcomponente").text("");
  	$("#subcomponente").append("Transaccion: <span class=\"texto\"> "+texto+"</span>");
  	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/select_operacion.php?transaccion=" + nombre +"&u=2",   
     async: false,
     success : function(text)
     {
         response= text;
     }
});	
 $("#div_elemento").append(response);
 $( "#accordion" ).accordion({active: 9});
  }
  
  
$(document).ready(function(){
    $('#table').DataTable();
});

function eliminarArbol(){
	var response;
	$.ajax({ type: "GET",   
     url: "./ajax/eliminar_arbol.php",   
     async: false,
     success : function(text)
     {
     	location.reload();
     	window.alert("Se eliminó el arbol");
        response= text;
     }
});	
}

function eliminar(anterior,nombre,tabla){
	if (confirm("Desea eliminar el registro?")) {
        // your deletion code
	var response;
	$.ajax({ type: "GET",   
     url: "../ajax/eliminar_dato.php?tabla=" + tabla +"&anterior="+ anterior +"&nombre="+nombre,   
     async: false,
	 datatype: "html",
     success : function(data)
     {
		window.location = window.location.href.split("?")[0];
		window.alert(data);
        response= data;
     }
	});	
}
    return false;
}

function syncArbol(){
	var response;
	$.ajax({ type: "GET",   
     url: "ajax/sync_arbol.php",   
     async: false,
     success : function(text)
     {
		window.alert("Se ha realizado la sincronizacion satisfactoriamente");
        response= text;
     }
});	
}

$(document).ready(function(){
$("form").submit(function () { 
    if($("#holding option:selected").val() == " ") {  
        window.alert("El holding es obligatorio");  
        return false;  
    }else if ($("#empresa option:selected").val() == " ") {  
        window.alert("La empresa es obligatorio");  
        return false;  
    }else if ($("#canal option:selected").val() == " ") {  
        window.alert("El canal es obligatorio");  
        return false;  
    }else if ($("#servicio option:selected").val() == " ") {  
        window.alert("El servicio es obligatorio");  
        return false;  
    }else if ($("#tipo_servicio option:selected").val() == " ") {  
        window.alert("El tipo de servicio es obligatorio");  
        return false;  
    }else if ($("#subservicio option:selected").val() == " ") {  
        window.alert("El subservicio es obligatorio");  
        return false;  
    }else if ($("#site option:selected").val() == " ") {  
        window.alert("El site es obligatorio");  
        return false;  
    }else if ($("#componente option:selected").val() == " ") {  
        window.alert("El componente es obligatorio");  
        return false;  
    }else if ($("#subcomponente option:selected").val() == " ") {  
        window.alert("El subcomponente es obligatorio");  
        return false;
    }else if ($("#agrupacion option:selected").val() == " ") {  
        window.alert("La agrupacion es obligatoria");  
        return false;  
    }else if ($("#segmento option:selected").val() == " ") {  
        window.alert("El segmento es obligatorio");  
        return false;  
    }else if ($("#producto option:selected").val() == " ") {  
        window.alert("El producto es obligatorio");  
        return false;  
    }else if ($("#transaccion option:selected").val() == " ") {  
        window.alert("La transaccion es obligatoria");  
        return false;  
    }else if($("input").val().length < 1){
    	window.alert("El campo de texto es obligatorio");  
        return false;
    }
    return true;  
});  
});