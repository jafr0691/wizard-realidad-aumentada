$(function() {
			$("#fileBase").change(function (){
				revision();
			});
		});




		function revision(){

			var formData = new FormData($("#wrapped")[0]);
			$.ajax({
				url: "leerArchivo.php",
				type: "post",
				dataType: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			}).done(function(res){
				var res = JSON.parse(res);
                    // $("#respuesta").html("Respuesta: " + res);
                    if(res['error']=='bien'){
                    	if(res['juego'] == 'memorama'){
                    		$("#acciones").removeClass("serpiente");
                    		$('#acciones').addClass('memorama');
                    		$('.todo_memorama').css('display','block');
							$('#contenido_memorama').css('display','block');
							$('.todo_serpientes').css('display','none');
							$('#contenido_serpientes').css('display','none');
							$('#tipojuegoinpu').val('Juego de Reglas');
                    	}else{
                    		$("#acciones").removeClass("memorama");
                    		$('#acciones').addClass('serpiente');
                    		$('.todo_memorama').css('display','none');
							$('#contenido_memorama').css('display','none');
                    		$('.todo_serpientes').css('display','block');
							$('#contenido_serpientes').css('display','block');
							$('#tipojuegoinpu').val('Serpiente y Escalera');
                    	}
                    	document.getElementById("iconFileUpload").style.color = "#8dc63f";
                     	document.getElementById("forwarddoble").style.display = "none";
                     	document.getElementById("forward").style.display = "inline-block";
                    }else{
                    	$("#fileBase").val('')
                    	var mesj = '';
                    	for( propiedad in res ) {
                    		if(propiedad=='error' || propiedad=='name' || propiedad=='juego'){

						 	}else{
						 		mesj +="<div class='alert alert-danger'>"+res[propiedad]+"</div>";
						 	}

						}
						$('#respuesta').html(mesj);
                    	$('#modalalert').modal("show");
                    	document.getElementById("iconFileUpload").style.color = "#D9534F";
  						document.getElementById("forwarddoble").style.display = "inline-block";
                    }
                }).fail(function(){
                	$("#fileBase").val('')
					$('#respuesta').html("<div class='alert alert-danger'>Falla del servidor intente nuvamente.</div>");
                    $('#modalalert').modal("show");
                    document.getElementById("iconFileUpload").style.color = "#D9534F";
                    document.getElementById("forwarddoble").style.display = "inline-block";
                });
		}

$(function () {

	$("#backward").click(function(){
		if($("#acciones").attr("class") =='step row wizard-step memorama desactive current'){
			$("#acciones").removeClass("desactive");
		}else if($("#acciones").attr("class") =='step row wizard-step serpiente desactive current'){
			$("#acciones").removeClass("desactive");
		}
		if($("#contenido").attr("class") =='step row wizard-step memorama desactive current'){
			$("#contenido").removeClass("desactive");
		}else if($("#contenido").attr("class") =='step row wizard-step serpiente desactive current'){
			$("#contenido").removeClass("desactive");
		}
		if($("#inicio").attr("class") =='step wizard-step current'){
			$("#contenido").removeClass("memorama");
			$("#contenido").removeClass("serpiente");
		}
	});

	$("#forward").click(function(){
		if($("#acciones").attr("class") =='step row wizard-step memorama'){
		var laaccion = 0;

		var contenidos = {'#accmein':'#memorama_inicio','#accmefi':'#memorama_fin','#accmeac':'#memorama_acertar','#accmeer':'#memorama_errar'};
		var accmemo='';
		for(var accion in contenidos) {
		    if($(accion).is(":checked")==true){
		    	laaccion++;
		  	 	$(contenidos[accion]).css('display','block');
		  	 	accmemo +='<p style="font-size: 18px; font-weight: 300;">'+$(accion).val()+'</p>';
			}else{
				$(contenidos[accion]).css('display','none');
				laaccion++;
			}
		}
		$("#nomacc").html(accmemo);
		if(laaccion >= 4){
			$('#contenido').addClass('memorama');
			$("#acciones").addClass("desactive");
		}

		}else if($("#acciones").attr("class") =='step row wizard-step serpiente'){
			var laaccion = 0;
			var contenidos = {'#accsein':'#serpiente_inicio','#accsefi':'#serpiente_fin','#accsesu':'#serpiente_subir','#accseba':'#serpiente_bajar'};
			var accserp='';
			for(var accion in contenidos) {
				if($(accion).is(":checked")==true){
				   	laaccion++;
				 	$(contenidos[accion]).css('display','block');
				 	accserp +='<p style="font-size: 18px; font-weight: 300;">'+$(accion).val()+'</p>';
				}else{
					$(contenidos[accion]).css('display','none');
					laaccion++;
				}
			}
			$("#nomacc").html(accserp);
			if(laaccion >= 4){
				$('#contenido').addClass('serpiente');
				$("#acciones").addClass("desactive");
			}
		}

		if($("#contenido").attr("class") =='step row wizard-step memorama'){
			var cargaarch= 0;

			var contenidos = {'#accmein':'contmemoiniarch','#accmefi':'contmemofinarch','#accmeac':'contmemoacearch','#accmeer':'contmemoerrarch'};
			var conmemo='';
			for(var accion in contenidos) {
			    if($(accion).is(":checked")==true){
					if($('input[name="'+contenidos[accion]+'"]').val() != ''){
						var nomemocont = $('input[name="'+contenidos[accion]+'"]').val().split("\\");
						conmemo +='<p id="nomcon" style="font-size: 18px; font-weight: 300;">'+nomemocont[2]+'</p>';
						cargaarch++;
					}
				}else{
					$('input[name="'+contenidos[accion]+'"]').val('');
					cargaarch++;
				}
			}

			$("#nomcon").html(conmemo);
			if (cargaarch >=4) {
			}else{
				$("#backward").click();
			}
		}else if($("#contenido").attr("class") =='step row wizard-step serpiente'){
			var cargaarch= 0;

			var contenidos = {'#accsein':'contserpiniarch','#accsefi':'contserpfinarch','#accsesu':'contserpsuarch','#accseba':'contserpbaarch'};
			var conserp='';
			for(var accion in contenidos) {
			    if($(accion).is(":checked")==true){
					if($('input[name="'+contenidos[accion]+'"]').val() != ''){
						var noserpcont = $('input[name="'+contenidos[accion]+'"]').val().split("\\");
						conserp +='<p id="nomcon" style="font-size: 18px; font-weight: 300;">'+noserpcont[2]+'</p>';
						cargaarch++;
					}
				}else{
					$('input[name="'+contenidos[accion]+'"]').val('');
					cargaarch++;
				}
			}
			$("#nomcon").html(conserp);
			if (cargaarch >=4) {
			}else{
				$("#backward").click();
			}
		}

		if ($('input[name="question_5"]:checked').val()=='No') {
			$("#blibli").html("Ar.js");
		}else{
			$("#blibli").html("Three.js");
		}

		var nombre = $("#fileBase").val().split("\\");
		$("#nombrearchi").html(nombre[2]);

		$("#tipojuego").html($("#tipojuegoinpu").val());

	});

});



$('input[name="contmemoiniarch"]').click(function(){
	$('input[name="contmemoiniarch"]').attr("accept",$('input[name="contmemoini"]:checked').val());
});
$('input[name="contmemoiniarch"]').change(function(){
	var contmemoiniarch = $('input[name="contmemoiniarch"]').val();
	var contmemoini = $('input[name="contmemoini"]:checked').val()
	var dato={arch:contmemoiniarch,ext:contmemoini};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contmemoiniarch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Inicio del Juego incorrecto</div>");
			$('#modalalert').modal("show");
			console.log('respuesta del servidos: '+valid);
		}
	});

});
$('input[name="contmemofinarch"]').click(function(){
	$('input[name="contmemofinarch"]').attr("accept",$('input[name="contmemofin"]:checked').val());
});
$('input[name="contmemofinarch"]').change(function(){
	var contmemofinarch = $('input[name="contmemofinarch"]').val();
	var contmemofin = $('input[name="contmemofin"]:checked').val()
	var dato={arch:contmemofinarch,ext:contmemofin};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contmemofinarch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Fin del Juego Incorrecto.</div>");
			$('#modalalert').modal("show");
		}
	});

});
$('input[name="contmemoacearch"]').click(function(){
	$('input[name="contmemoacearch"]').attr("accept",$('input[name="contmemoace"]:checked').val());
});
$('input[name="contmemoacearch"]').change(function(){
	var contmemoacearch = $('input[name="contmemoacearch"]').val();
	var contmemoace = $('input[name="contmemoace"]:checked').val()
	var dato={arch:contmemoacearch,ext:contmemoace};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contmemoacearch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Acertar Carta Incorrecto.</div>");
			$('#modalalert').modal("show");
		}
	});

});
$('input[name="contmemoerrarch"]').click(function(){
	$('input[name="contmemoerrarch"]').attr("accept",$('input[name="contmemoerr"]:checked').val());
});
$('input[name="contmemoerrarch"]').change(function(){
	var contmemoerrarch = $('input[name="contmemoerrarch"]').val();
	var contmemoerr = $('input[name="contmemoerr"]:checked').val()
	var dato={arch:contmemoerrarch,ext:contmemoerr};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contmemoerrarch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Errar Carta Incorrecto.</div>");
			$('#modalalert').modal("show");
		}
	});

});



$('input[name="contserpiniarch"]').click(function(){
	$('input[name="contserpiniarch"]').attr("accept",$('input[name="contserpini"]:checked').val());
});
$('input[name="contserpiniarch"]').change(function(){
	var contserpiniarch = $('input[name="contserpiniarch"]').val();
	var contserpini = $('input[name="contserpini"]:checked').val()
	var dato={arch:contserpiniarch,ext:contserpini};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contserpiniarch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Inicio del Juego Incorrecto.</div>");
			$('#modalalert').modal("show");
		}
	});

});
$('input[name="contserpfinarch"]').click(function(){
	$('input[name="contserpfinarch"]').attr("accept",$('input[name="contserpfin"]:checked').val());
});
$('input[name="contserpfinarch"]').change(function(){
	var contserpfinarch = $('input[name="contserpfinarch"]').val();
	var contserpfin = $('input[name="contserpfin"]:checked').val()
	var dato={arch:contserpfinarch,ext:contserpfin};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contserpfinarch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Fin del Juego Incorrecto.</div>");
			$('#modalalert').modal("show");
		}
	});

});
$('input[name="contserpsuarch"]').click(function(){
	$('input[name="contserpsuarch"]').attr("accept",$('input[name="contserpsu"]:checked').val());
});
$('input[name="contserpsuarch"]').change(function(){
	var contserpsuarch = $('input[name="contserpsuarch"]').val();
	var contserpsu = $('input[name="contserpsu"]:checked').val()
	var dato={arch:contserpsuarch,ext:contserpsu};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contserpsuarch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Subir Escalera Incorrecto.</div>");
			$('#modalalert').modal("show");
		}
	});

});
$('input[name="contserpbaarch"]').click(function(){
	$('input[name="contserpbaarch"]').attr("accept",$('input[name="contserpba"]:checked').val());
});
$('input[name="contserpbaarch"]').change(function(){
	var contserpbaarch = $('input[name="contserpbaarch"]').val();
	var contserpba = $('input[name="contserpba"]:checked').val()
	var dato={arch:contserpbaarch,ext:contserpba};
	var valres = $.post("validarcontenido.php",dato);
	valres.done(function(valid){
		if(!valid){
			$('input[name="contserpbaarch"]').val("");
			$('#respuesta').html("<div class='alert alert-danger'>Formato de Bajar Escalera Incorrecto.</div>");
			$('#modalalert').modal("show");
		}
	});

});

(function($, window, undefined) {
    //is onprogress supported by browser?
    var hasOnProgress = ("onprogress" in $.ajaxSettings.xhr());

    //If not supported, do nothing
    if (!hasOnProgress) {
        return;
    }

    //patch ajax settings to call a progress callback
    var oldXHR = $.ajaxSettings.xhr;
    $.ajaxSettings.xhr = function() {
        var xhr = oldXHR.apply(this, arguments);
        if(xhr instanceof window.XMLHttpRequest) {
            xhr.addEventListener('progress', this.progress, false);
        }

        if(xhr.upload) {
            xhr.upload.addEventListener('progress', this.progress, false);
        }

        return xhr;
    };
})(jQuery, window);

function round(t, e) {
    e || (e = 0);
    var n = Math.round(t * Math.pow(10, e)) / Math.pow(10, e);
    return n
}

$("#btn-genera").click(function(){
	if($("#tipojuegoinpu").val()=="Juego de Reglas"){
		var subir = "subircont.php";
	}else{
		var subir = "subircontserp.php";
	}

	var formData = new FormData($("#wrapped")[0]);
	var subidagenerzip =$.ajax({
		url: subir,
		type: "post",
		dataType: "html",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		sequentialUploads: true,
		progress: function (evt) {
			if(evt.lengthComputable){
		    	console.log(evt);
                var percents = parseInt(evt.loaded / evt.total * 100, 10);
                var mb_s = evt.loaded / 1024 / 1024 / 8;

                $(".progress-bar").css('width', percents + '%');
                $(".progress-text").text(round(mb_s, 2) +  ' MB/s - ' + percents + '%');
            }
        },
        progressall: function (data) {
            if(evt.lengthComputable){
            	console.log(data);
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('.progress-bar').css('width', progress + '%');
            }
        },
        beforeSend: function(){
			var x = document.getElementById("div-generar");
	 		x.style.display = "none";
	 		document.getElementById("backward").disabled = true;

			var xx = document.getElementById("div-generando");
 			xx.style.display = "block";
		},
		success: function(res){
			var xx = document.getElementById("div-generando");
 			xx.style.display = "none";
 			$("#carpzip").attr("href",res);
			var xxx = document.getElementById("div-descargarzip");
			xxx.style.display = "block";
        }

      });
	});
