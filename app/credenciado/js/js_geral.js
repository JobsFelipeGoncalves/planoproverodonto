 



$(document).ready( function()

{



	$("#input_num_matricula").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarPesquisarAssociados();

	});



	$("#input_num_contrato").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarPesquisarAssociados();

	});



	$("#input_nomedo_associado").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarPesquisarAssociados();

	});



	$("#input_cpf_do_associado").inputmask("999.999.999-99");

	

	$("#input_cpf_do_associado").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarPesquisarAssociados();

	});



	$("#bt_pesquisar_associado").click( function()

	{

		comecarPesquisarAssociados();

	});





	$("#bt_salvar_guia").click( function()

	{

		salvarGuia( false );

	});



	$("#bt_salvar_guia_e_impimir").click( function()

	{

		salvarGuia( true );

	});





	$("#input_procedimento_nova_guia").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarAddProcedimento();

	});







	$("#input_prestador_nova_guia").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarAddProcedimento();

	});



	$("#input_especialidade_nova_guia").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarAddProcedimento();

	});







	$("#btn_add_procedimento").click( function()

	{

		comecarAddProcedimento();

	});



	$("#novasenha1").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarAlterarSenha();

	});



	$("#novasenha2").keyup( function( event )

	{

      	var keyPressed = event.keyCode || event.which;



        if(keyPressed==13)

			comecarAlterarSenha();

	});





	$("#bt_confirmar_alterar_senha").click( function()

	{

		comecarAlterarSenha();

	});







	$("#bt_imprimir_relatorio_guias").click( function()

	{

		printRelatorioGuias();

	});



	$("#div_menu_principal div").click( function()

	{

		var div_abrir_old = $(this).parent().find(".selected_menu").attr("abrir")

		$(this).parent().find(".selected_menu").removeClass("selected_menu");

		$("#"+div_abrir_old).hide();



		var div_abrir_new = $(this).attr("abrir")

		$(this).addClass("selected_menu");

		$("#"+div_abrir_new).show();

		



	});



	

	$.datepicker.setDefaults($.datepicker.regional["pt"]);



	$("#input_data_dee_filtroguias input").datepicker();

	$("#input_data_ate_filtroguias input").datepicker();



	$("#bt_pesquisar_relatorio_guias button").click( function()

	{

		pesquisarGuiasRelatorio();

	});



});





function pesquisarGuiasRelatorio()

{

	var status = $("#select_statusd_filtroguias select").val().trim();

	var datade = $("#input_data_dee_filtroguias input" ).val().trim();

	var dataat = $("#input_data_ate_filtroguias input" ).val().trim();

	var nomeas = $("#input_associad_filtroguias input" ).val().trim();



	var dados = { status : status, datade: datade, dataat : dataat, nomeas : nomeas };

	requisitar("requests/relatorio_guias.php", dados, $("#div_loading_main"), onGetRelatorioGuias, onErrorDefault );



}





function onGetRelatorioGuias( result )

{

	if( result.length > 0 )

		$("#table_relguias tbody").html("");

	else

		$("#table_relguias tbody").html("<td class='centralizado' colspan="+$("#table_relguias thead th").length+">Nenhum registro</td>");

	

	var valorTotal = 0;



	result.forEach( function( item, index )

	{

		var tr = $("<tr></tr>");



		tr.append("<td>"+uppercase(item.giaCliente)		+"</td>");

		tr.append("<td>"+uppercase(item.giaNumMatricula)+"</td>");

		tr.append("<td>"+getNomeStatusGuia( item.giaStatus )+"</td>");

		tr.append("<td>"+uppercase(item.giaData)		+"</td>");



		var procedimentos = "";

		var valor = 0;



		item.giaProcedimentos.forEach( function( proc, index )

		{

			var prestadorFormatado = proc.gapPrestador == null ? "" : "- "+uppercase(proc.gapPrestador);

			var htm = "<li> "+uppercase(proc.gapProcedimento)+" "+prestadorFormatado+" </li>";

			

			procedimentos += htm;

			valor += parseFloat(proc.gapValor);

		});



		tr.append("<td style='padding-bottom: 0px;'><ul>"+uppercase(procedimentos)+"</ul></td>");

		tr.append("<td>R$ "+uppercase(formatValor(valor))+"</td>");



		valorTotal += valor;





		$("#table_relguias tbody").append(tr);

	});





	var status = $("#select_statusd_filtroguias select").val().trim();

	var nomest = $("#select_statusd_filtroguias select option:selected").text().trim();

	var datade = $("#input_data_dee_filtroguias input" ).val().trim();

	var dataat = $("#input_data_ate_filtroguias input" ).val().trim();

	var nomeas = $("#input_associad_filtroguias input" ).val().trim();

	var dthoje = $.datepicker.formatDate("dd/mm/yy", new Date());





	$("#div_valor_total_relatorio").text("Valor total: R$ "+formatValor( valorTotal )); 

	$("#filtros_relguias").html("");

	$("#filtros_relguias").append("<div><b>Credenciado</b>: "+window.credenciado_logado.creNome+"</div>");

	$("#cabecalho_print_relguias").text( "Gerado em "+dthoje );

	$("#bt_imprimir_relatorio_guias").removeAttr("disabled");



	if( status != 'T')

		$("#filtros_relguias").append("<div><b>Status</b>: "+nomest+"</div>");



	if( datade != '')

		$("#filtros_relguias").append("<div><b>De: </b>: "+datade+"</div>");



	if( dataat != '')

		$("#filtros_relguias").append("<div><b>Até:</b>: "+dataat+"</div>");



	if( nomeas != '')

		$("#filtros_relguias").append("<div><b>Associado:</b>: "+uppercase(nomeas)+"</div>");



}





function printRelatorioGuias()

{

	window.frames["print_frame"].document.body.width = 920;

	window.frames["print_frame"].document.body.innerHTML= '<link href="css/css_print_guia.css" rel="stylesheet" type="text/css" />' + document.getElementById("div_lista_guias_to_print").innerHTML;



	setTimeout( continuePrintingRelatorioGuias , 200);

}



function continuePrintingRelatorioGuias()

{

	window.frames["print_frame"].window.focus();

    window.frames["print_frame"].print();



}





function comecarAlterarSenha()

{

	var dados = { senha1 : $("#novasenha1").val().trim(), senha2: $("#novasenha2").val().trim() };

	requisitar("requests/alterar_senha.php", dados, $("#div_loading_main"), onAlteraSenha, onErrorDefault );

}



function comecarAddProcedimento()

{

	var procedimento 	= $("#input_procedimento_nova_guia").val().trim();

	var prestador 	 	= $("#input_prestador_nova_guia").val().trim();

	var especialidade 	= $("#input_especialidade_nova_guia").val().trim();

	

	var dados = { cliente : clienteAtual.cliCodigo, procedimento: procedimento, prestador: prestador, especialidade: especialidade };

	requisitar("requests/get_valor_procedimento.php", dados, $("#div_loading_main"), onGetValorProcToAddNovaGuia, onErrorDefault );



}



function comecarPesquisarAssociados()

{

	var dados = { matricula: $("#input_num_matricula").val().trim(), contrato: $("#input_num_contrato").val().trim(), nome: $("#input_nomedo_associado").val().trim(), cpf: $("#input_cpf_do_associado").val().trim() };



	$("#div_dados_associado1").hide();

	$("#div_dados_associado2").hide();





	requisitar("requests/pesquisa_associado.php", dados, $("#div_loading_main"), onGetAssociados, onErrorDefault );



}



function onAlteraSenha( result )

{

	if( result.error != "OK")

		alert( result.error );

	else

	{

		alert("Senha alterada com sucesso");

		$("#modalAlteraSenha").modal('hide');

		$("#novasenha1").val("");

		$("#novasenha2").val("");

	}

}

function onGetAssociados( result )

{

	var divtoput = $("#div_associados_encontrados");

	divtoput.html("");



	result.forEach( function( item, index )

	{

		var div = $("<div><a href='#div_dados_associado1'>"+uppercase(item.cliNome)+" ("+(item.cntVALIDO ? "ATIVO" : "INATIVO")+")</a></div>");





		div.find("a").click( function()

		{

			selecionarCliente( item );

		});



		divtoput.append(div);

	});

} 



function requisitar( url, dados, div_loading, onsucess, onerror )

{

	if( div_loading != null )

		div_loading.show();



	$.ajax

	(

		{

  			dataType: "json",

			url: url,

			method :'POST',

			data : dados,

			success: function( result )

			{

				try

				{

					if( onsucess != null )

						onsucess( result );

				}

				catch( e ) { console.log(e); }

			},

			error : function( result )

			{

				try

				{

					if( onerror != null )

						onerror( result );

				}

				catch( e ) { console.log(e); }

			},

			complete: function()

			{

				try

				{

					if( div_loading != null )

						div_loading.hide();

				}

				catch( e ) { console.log(e); }

			}

		}

	);

}



var clienteAtual = null;



function selecionarCliente( item )

{

	clienteAtual = item;



	$("#div_nome_associado").html( "Nome: "+uppercase(item.cliNome));

	$("#div_cpff_associado").html( "CPF: "+uppercase(item.cliCPF));

	$("#div_nasc_associado").html( "Dt. nascimento: "+uppercase(item.cliDtNascimento));

	$("#div_ende_associado").html( "Endereço: "+uppercase(item.cliEndereco));

	$("#div_tele_associado").html( "Telefone: "+uppercase(item.cliTelefone));



	$("#div_status_carteira").html( item.cntVALIDO ? "CARTEIRA ATIVA" : "CARTEIRA INATIVA");

	$("#div_status_carteira").addClass( item.cntVALIDO ? "carteira_ativa" : "carteira_inativa");

	$("#div_validade_carteira").html( "Validade da carteira: "+item.cntValidade);

	$("#div_tipo_plano").html( "PLANO "+(item.cntNomePlano+" ("+item.cntTipoContrato+")").toUpperCase() );



	//$("#div_nova_guia").html( "<a onClick='novaGuia()' >NOVA GUIA</a>" );

	if( !item.cntVALIDO )

		$("#div_nova_guia").html( "CARTEIRA INATIVA" );

	else

	if( !item.cntPermitiGuiaClienteC )

		$("#div_nova_guia").html( "CLIENTE  BLOQUEADO PARA GUIAS NÃO AGENDADAS" );

	else

	if( !item.cntPermitiGuiaContrato )

		$("#div_nova_guia").html( "CONTRATO BLOQUEADO PARA GUIAS NÃO AGENDADAS" );

	else

	if( item.cntTipoContrato == "PESSOAL"	  && window.credenciado_logado.podeGerarGuiaPessoal )

		$("#div_nova_guia").html( "<a href='#' onClick='novaGuia()' >NOVA GUIA</a>" );

	else

	if( item.cntTipoContrato == "EMPRESARIAL" && window.credenciado_logado.podeGerarGuiaEmpresa )

		$("#div_nova_guia").html( "<a href='#' onClick='novaGuia()' >NOVA GUIA</a>" );

	else

		$("#div_nova_guia").html( "SOMENTE GUIAS AGENDADAS" );





	$("#div_agendamentos"	 ).hide();

	$("#div_guias"			 ).hide();



	$("#div_dados_associado1").show();

	$("#div_dados_associado2").show();



	var dados = { cliente: item.cliCodigo };

	requisitar("requests/get_agendamentos_cliente.php", dados, $("#div_loading_main"), onGetAgendmentos, onErrorDefault );

	requisitar("requests/get_guias_cliente.php", dados, $("#div_loading_main"), onGetGuias, onErrorDefault );

	requisitar("requests/get_orcamentos_cliente.php", dados, $("#div_loading_main"), onGetOrcamentos, onErrorDefault );



}



function onGetGuia( result )

{

	if( result.error != "OK" )

		alert( result.error );

	else

		printGuia( result );

}



function onGetGuias( result )

{

	if( result.length > 0 )

		$("#div_guias").html("");

	else

		$("#div_guias").html("<div class='centralizado'>Nenhuma guia</div>");



	$("#div_guias"			 ).show();

	

	result.forEach( function( item, index )

	{

		addGuiaToList( item, false );

	});

}





function onGetOrcamentos( result )

{

	if( result.length > 0 )

		$("#div_orcamentos").html("");

	else

		$("#div_orcamentos").html("<div class='centralizado'>Nenhum orçamento</div>");



	$("#div_orcamentos").show();

	

	result.forEach( function( item, index )

	{

		addOrcamentoToList( item, false );

	});

}





function addOrcamentoToList( item, prepend )

{	



		var divToPut =  $(".item_guia_template").clone();

		divToPut.removeClass("item_guia_template");

		divToPut.removeClass("hide");



		/*divToPut.find(".btn_imprimir").click( function()

		{

			printGuia( item );

		});

		divToPut.find(".btn_autorizar").click( function()

		{

			autorizarGuia( item, divToPut );

		});

		divToPut.find(".btn_cancelar").click( function()

		{

			cancelarGuia(item, divToPut);	

		});

		divToPut.find(".btn_desautorz").click( function()

		{

			desautorizarGuia(item, divToPut);	

		});*/



	 	if( clienteAtual.cntTipoContrato == "PESSOAL"	  && window.credenciado_logado.podeGerarGuiaPessoal )

	 		divToPut.find(".btn_autorizar").html( "TRANSFORMAR EM GUIA" );	

		else

		if( clienteAtual.cntTipoContrato == "EMPRESARIAL" && window.credenciado_logado.podeGerarGuiaEmpresa )

			divToPut.find(".btn_autorizar").html( "TRANSFORMAR EM GUIA" );

		else

		{

			divToPut.find(".btn_autorizar").html( "SOMENTE GUIAS AGENDADAS" );

			divToPut.find(".btn_autorizar").attr("disabled", "true");

		}



 		divToPut.find(".btn_imprimir").css("display", "none");

 		divToPut.find(".btn_cancelar").css("display", "none");

 		divToPut.find(".btn_desautorz").css("display", "none");



		divToPut.find(".btn_autorizar").css("width", "auto");

 		divToPut.find(".btn_autorizar").click( function()

		{

			transformOrcamentoToGuia(item);

		});



		divToPut.find(".div_planod_guia").text("");

		divToPut.find(".div_senhad_guia").text("");

		divToPut.find(".div_datada_guia").text("Data: "+uppercase(item.giaDtGeracao) );

		divToPut.find(".div_observ_guia").text("");

		divToPut.find(".lista_procedimentos_guia").html("");


		var total = 0;


		item.giaProcedimentos.forEach( function( proc )

		{
			total = total + parseFloat(proc.gapValor);

			var prestadorFormatado = proc.gapPrestador == null ? "" : "- "+uppercase(proc.gapPrestador);

			var htm = "<li> "+uppercase(proc.gapProcedimento)+" "+prestadorFormatado+" - R$ "+formatValor(proc.gapValor)+" </li>";

			divToPut.find(".lista_procedimentos_guia").append( htm );

		});


		divToPut.find(".div_total_guia").text("Total: R$ " + formatValor(total));




		if( prepend )

			$("#div_orcamentos").prepend(divToPut);

		else

			$("#div_orcamentos").append (divToPut);



}





function transformOrcamentoToGuia(item)

{



	novaGuiaFromOrcamento(item.giaCodigo);





	item.giaProcedimentos.forEach( function( proc )

	{



			$("#input_procedimento_nova_guia")	.val(proc.gapProcedimento);

			$("#input_prestador_nova_guia")   	.val(proc.gapPrestador);

			$("#input_especialidade_nova_guia").val(proc.gapEspecialidade);

			

			var fakeResult = { error: "OK", valorCredenciado: proc.gapValor };



			onGetValorProcToAddNovaGuia(fakeResult);

	});





}



function addGuiaToList( item, prepend )

{	



		var divToPut =  $(".item_guia_template").clone();

		divToPut.removeClass("item_guia_template");

		divToPut.removeClass("hide");



		divToPut.find(".btn_imprimir").click( function()

		{

			printGuia( item );

		});

		divToPut.find(".btn_autorizar").click( function()

		{

			autorizarGuia( item, divToPut );

		});

		divToPut.find(".btn_cancelar").click( function()

		{

			cancelarGuia(item, divToPut);	

		});

		divToPut.find(".btn_desautorz").click( function()

		{

			desautorizarGuia(item, divToPut);	

		});



		setStatusGuia( divToPut, item.giaStatus );



		divToPut.find(".div_planod_guia").text("Plano: "+uppercase(item.cliPlano) );

		divToPut.find(".div_senhad_guia").text("Senha: "+pad(item.giaCodigo, 6) );

		divToPut.find(".div_datada_guia").text("Data: "+uppercase(item.giaDtGeracao) );

		divToPut.find(".div_total_guia").text("Total: R$ 0, 00");

		divToPut.find(".div_observ_guia").text("");

		divToPut.find(".lista_procedimentos_guia").html("");


		var total = 0;

		item.giaProcedimentos.forEach( function( proc )

		{
			total = total + parseFloat(proc.gapValor);

			var prestadorFormatado = proc.gapPrestador == null ? "" : "- "+uppercase(proc.gapPrestador);

			var htm = "<li> "+uppercase(proc.gapProcedimento)+" "+prestadorFormatado+" - R$ "+formatValor(proc.gapValor)+" </li>";

			divToPut.find(".lista_procedimentos_guia").append( htm );

		});


		divToPut.find(".div_total_guia").text("Total: R$ " + formatValor(total));



		if( prepend )

			$("#div_guias").prepend(divToPut);

		else

			$("#div_guias").append (divToPut);



		/*var divToPut =  $(".item_guia_template").clone();

		divToPut.removeClass("item_guia_template");

		divToPut.removeClass("hide");



		divToPut.find(".btn_autorizar_guia").click( function()

		{

			autorizarGuia( item, this );

		});

		divToPut.find(".btn_imprimir_guia").click( function()

		{

			printGuia(item);

		});



		if( item.giaStatus == 0 )

		{

			divToPut.find(".btn_autorizar").attr("disabled", "true");

			divToPut.find(".btn_autorizar").text("AUTORIZADA");

		}

		if( item.giaStatus == 1 )

		{

			divToPut.find(".btn_autorizar").removeAttr("disabled");

			divToPut.find(".btn_autorizar").text("AUTORIZAR GUIA");

		}

		if( item.giaStatus == 2 )

		{

			divToPut.find(".btn_autorizar").attr("disabled", "true");

			divToPut.find(".btn_autorizar").text("CANCELADA");

		}

 

		divToPut.find(".div_valor_paciente")  .text("Valor: "+formatValor(item.ageValorCliente));

		divToPut.find(".div_data_agendamento").text("Data: "+uppercase(item.ageData));

		divToPut.find(".div_hora_agendamento").text("Hora: "+uppercase(item.ageHora));

		divToPut.find(".div_pres_agendamento").text("Prestador: "+uppercase(item.agePrestador));

		divToPut.find(".div_espe_agendamento").text("Especialidade: "+uppercase(item.ageEspecialidade));

		divToPut.find(".div_obsv_agendamento").text("Observações: "+uppercase(item.ageObservacoes));

		divToPut.find(".lista_procedimentos_agendamento").html("<li>"+uppercase(item.ageProcedimentos)+"</li>");



		$("#div_agendamentos").append(divToPut);



















		var procedimentos = "";

		var status = "";



		item.giaProcedimentos.forEach( function( proc )

		{

			procedimentos += ", "+proc.gapProcedimento;

		});



		if( item.giaStatus == 0 )

			status = "<a class='bt_cancelar'>Cancelar</a> ";

		if( item.giaStatus == 1 )

			status = "<a class='bt_cancelar'>Cancelar</a> ";

		if( item.giaStatus == 2 )

			status = "Cancelado ";





		procedimentos = procedimentos.substring( 2 );



		var divToPut =  $("<li>"+status+"<a class='bt_imprimir'>Imprimir</a> - GUIA "+pad(item.giaCodigo, 6)+" - "+uppercase(procedimentos)+"</li>");



		divToPut.find(".bt_imprimir").click( function()

		{

			printGuia( item );

		});





		divToPut.find(".bt_cancelar").click( function()

		{

			printGuia( item );

		});



		if( prepend )

			$("#div_guias").prepend(divToPut);

		else

			$("#div_guias").append (divToPut);*/

}





function setStatusGuia( divToPut, novoStatus )

{

	if( novoStatus == 0 )

	{

		divToPut.find(".btn_autorizar").attr("disabled", "true");

		divToPut.find(".btn_autorizar").text("AUTORIZADA");



		divToPut.find(".btn_cancelar") .show();

		

		divToPut.find(".btn_desautorz").show();

		divToPut.find(".btn_desautorz").text("DESAUTORIZAR");

		divToPut.find(".btn_desautorz").css("right","268px")



	}

	if( novoStatus == 1 )

	{

		divToPut.find(".btn_autorizar").removeAttr("disabled");

		divToPut.find(".btn_autorizar").text("AUTORIZAR GUIA");



		divToPut.find(".btn_cancelar") .show();

		

		divToPut.find(".btn_desautorz").hide();

	}

	if( novoStatus == 2 )

	{	

		divToPut.find(".btn_autorizar").attr("disabled", "true");

		divToPut.find(".btn_autorizar").text("CANCELADA");



		divToPut.find(".btn_cancelar") .hide();

		

		divToPut.find(".btn_desautorz").show();

		divToPut.find(".btn_desautorz").text("REATIVAR");

		divToPut.find(".btn_desautorz").css("right","156px")

	}

}



function onGetAgendmentos( result )

{

	if( result.length > 0 )

		$("#div_agendamentos").html("");

	else

		$("#div_agendamentos").html("<div class='centralizado'>Nenhum agendamento</div>");

	



	$("#div_agendamentos"	 ).show();





	result.forEach( function( item, index )

	{

		var divToPut =  $(".item_agendamento_template").clone();

		divToPut.removeClass("item_agendamento_template");

		divToPut.removeClass("hide");



		divToPut.find(".btn_imprimir").click( function()

		{

			var dados = { agenda: item.ageCodigo };

			requisitar("requests/get_guia.php", dados, $("#div_loading_main"), onGetGuia, onErrorDefault );

		});

		divToPut.find(".btn_autorizar").click( function()

		{

			autorizarGuia( item, divToPut );

		});

		divToPut.find(".btn_cancelar").click( function()

		{

			cancelarGuia(item, divToPut);	

		});

		divToPut.find(".btn_desautorz").click( function()

		{

			desautorizarGuia(item, divToPut);	

		});





		setStatusGuia( divToPut, item.giaStatus );

		

 

		divToPut.find(".div_valor_paciente")  .text("Valor: "+formatValor(item.ageValorCliente));

		divToPut.find(".div_data_agendamento").text("Data: "+uppercase(item.ageData));

		divToPut.find(".div_hora_agendamento").text("Hora: "+uppercase(item.ageHora));

		divToPut.find(".div_pres_agendamento").text("Prestador: "+uppercase(item.agePrestador));

		divToPut.find(".div_espe_agendamento").text("Especialidade: "+uppercase(item.ageEspecialidade));

		divToPut.find(".div_obsv_agendamento").text("Observações: "+uppercase(item.ageObservacoes));

		divToPut.find(".lista_procedimentos_agendamento").html("<li>"+uppercase(item.ageProcedimentos)+"</li>");



		$("#div_agendamentos").append(divToPut);

	});



	

}









function onErrorDefault( result )

{

	alert( "Erro desconhecido" );

}



function uppercase( str )

{

	if( str == null )

		return "";

	else

		return str.toUpperCase();

}



var procedimentoAdd = null;



function onGetValorProcToAddNovaGuia( result )

{

	if( result.error != "OK")

	{

		alert( result.error );

		return;

	}





	var nomeProc = $("#input_procedimento_nova_guia")	.val().trim();

	var presProc = $("#input_prestador_nova_guia")   	.val().trim();

	var espeProc = $("#input_especialidade_nova_guia") 	.val().trim();

	var valoProc = result.valorCredenciado;



	if(nomeProc.length <= 0 )

	{

		alert("Digite um procedimento");			

	}

	else

	{

		$("#table_procedimentos_guia tbody").append("<tr><td class='td_delete_proc'> X </td><td class='td_nomedo_proc'> "+nomeProc+" </td><td class='td_especialidade_proc'> "+espeProc+" </td><td class='td_prestador_proc'> "+presProc+" </td><td class='td_valord_proc'> "+formatValorProc( valoProc )+" </td></tr>");

		$("#input_procedimento_nova_guia").val("");

		$("#input_prestador_nova_guia").val("");

		$("#input_especialidade_nova_guia").val("");

		$(".td_delete_proc").click( function() { $(this).parent().remove(); } );

	}

}



function formatValorProc( valoProc )

{

	return valoProc == null ? "SEM VALOR" :  "R$ "+formatValor(valoProc);

}



function alterarSenha()

{

	$("#modalAlteraSenha").modal();



}





var tipoModalGuiaAtual;

var orcamentoExcluir = null;



function novaGuia()

{

	orcamentoExcluir = null;

	showModalGuia("GUIA");

}



function novaGuiaFromOrcamento(orcamento)

{

	orcamentoExcluir = orcamento;

	showModalGuia("GUIA");

}





function novoOrcamento()

{

	orcamentoExcluir = null;

	showModalGuia("ORCAMENTO");

}



function showModalGuia(tipo)

{

	tipoModalGuiaAtual = tipo



	$("#modalNovaGuia").modal();



	if(tipo == "GUIA")

	{

    	$("#bt_salvar_guia_e_impimir").css("display", "inline");

		$("#modalNovaGuia .modal-title").text("NOVA GUIA");

	}

	if(tipo == "ORCAMENTO")

	{

    	$("#bt_salvar_guia_e_impimir").css("display", "none");

		$("#modalNovaGuia .modal-title").text("NOVO ORÇAMENTO");

	}



	//$(document).scrollTop( $("#div_dados_associado1").offset().top ); 





	$('#modalNovaGuia').on('hidden.bs.modal', function ()

	{

    	$("#input_procedimento_nova_guia")	.val("");

    	$("#input_prestador_nova_guia")		.val("");

    	$("#input_especialidade_nova_guia")	.val("");

    	$("#table_procedimentos_guia tbody").html("");

	})



	$("#input_procedimento_nova_guia").keyup( function()

	{

		getProcedimentos( this );

	});



	$("#input_prestador_nova_guia").keyup( function()

	{

		getPrestadores( this );

	});



	$("#input_especialidade_nova_guia").keyup( function()

	{

		getEspecialidades( this );

	});





}





function getProcedimentos( inpuut )

{

	var texto = $(inpuut).val();



	if( texto.length <= 0 )

		return;



	if( inpuut.ajaxAtual != null )

		inpuut.ajaxAtual.abort();



	inpuut.ajaxAtual = $.ajax

	(

	  {

	     type: "POST",

	     url:  'requests/get_procedimentos.php',

	     data: {nome: texto },

	     success: function(html)

	     {

	       	var result = JSON.parse( html );

	         

	        showResultsProcedimento( result, inpuut  );



	     }

	  }

	);

}





function showResultsProcedimento( results , campo )

{

	if( ! $(campo).is(":focus") )

		return;

	

	var dropdown = $(campo).parent().find("#dropDownProcedimentos");





	if( dropdown.length == 0 )

	{

		dropdown = $("#dropDownProcedimentos").clone();

		var td = $(campo).parent();

		td.append( dropdown );

	}



	dropdown.find("ul").html("");

	dropdown.addClass("open");





	results.forEach( function( item, index )

	{

			dropdown.find("ul").append('<li style="padding:6px;cursor:pointer;">'+uppercase(item.proNome)+'</li>');

	});



	

	if( results.length <= 0 )

		dropdown.removeClass("open");





	$("#dropdown_procedimentos li").click( function()

	{

		$(this).parent().parent().parent().find("input").val( $(this).text() );

		$(this).parent().parent().remove();

	});

}







function getPrestadores( inpuut )

{

	var texto = $(inpuut).val();



	if( texto.length <= 0 )

		return;



	if( inpuut.ajaxAtual != null )

		inpuut.ajaxAtual.abort();



	inpuut.ajaxAtual = $.ajax

	(

	  {

	     type: "POST",

	     url:  'requests/get_prestadores.php',

	     data: {nome: texto },

	     success: function(html)

	     {

	       	var result = JSON.parse( html );

	         

	        showResultsPrestador( result, inpuut  );



	     }

	  }

	);

}





function getEspecialidades( inpuut )

{

	var texto = $(inpuut).val();



	if( texto.length <= 0 )

		return;



	if( inpuut.ajaxAtual != null )

		inpuut.ajaxAtual.abort();



	inpuut.ajaxAtual = $.ajax

	(

	  {

	     type: "POST",

	     url:  'requests/get_especialidades.php',

	     data: {nome: texto },

	     success: function(html)

	     {

	       	var result = JSON.parse( html );

	         

	        showResultsEspecialidade( result, inpuut  );



	     }

	  }

	);

}





function showResultsEspecialidade( results , campo )

{

	if( ! $(campo).is(":focus") )

		return;

	

	var dropdown = $(campo).parent().find("#dropDownEspecialidade");





	if( dropdown.length == 0 )

	{

		dropdown = $("#dropDownEspecialidade").clone();

		var td = $(campo).parent();

		td.append( dropdown );

	}



	dropdown.find("ul").html("");

	dropdown.addClass("open");





	results.forEach( function( item, index )

	{

			dropdown.find("ul").append('<li style="padding:6px;cursor:pointer;">'+uppercase(item.espNome)+'</li>');

	});



	

	if( results.length <= 0 )

		dropdown.removeClass("open");





	$("#dropdown_especialidades li").click( function()

	{

		$(this).parent().parent().parent().find("input").val( $(this).text() );

		$(this).parent().parent().remove();

	});

}



function showResultsPrestador( results , campo )

{

	if( ! $(campo).is(":focus") )

		return;

	

	var dropdown = $(campo).parent().find("#dropDownPrestadors");





	if( dropdown.length == 0 )

	{

		dropdown = $("#dropDownPrestadors").clone();

		var td = $(campo).parent();

		td.append( dropdown );

	}



	dropdown.find("ul").html("");

	dropdown.addClass("open");





	results.forEach( function( item, index )

	{

			dropdown.find("ul").append('<li style="padding:6px;cursor:pointer;">'+uppercase(item.preNome)+'</li>');

	});



	

	if( results.length <= 0 )

		dropdown.removeClass("open");





	$("#dropdown_prestadors li").click( function()

	{

		$(this).parent().parent().parent().find("input").val( $(this).text() );

		$(this).parent().parent().remove();

	});

}





var imprimirGuiaAoSalvar = false;



function salvarGuia( imprimir )

{

	imprimirGuiaAoSalvar = imprimir;

	var procedimentos = [];

	var strErro = "";



	$("#table_procedimentos_guia tbody tr").each( function( index )

	{

		var nome  		= $(this).find(".td_nomedo_proc").text().trim();

		var prestador  	= $(this).find(".td_prestador_proc").text().trim();

		var especialid 	= $(this).find(".td_especialidade_proc").text().trim();

		var preco 		= $(this).find(".td_valord_proc").text().replace("R$","").trim();

		preco 			= preco == "SEM VALOR" ? null : parseValor( preco );



		procedimentos.push({ proNome: nome, proPrestador: prestador, proEspecialidade: especialid, proPreco : preco });

	});



	if( strErro.length > 0 )

	{

		alert( strErro );

	}

	else

	{

		if(tipoModalGuiaAtual == "GUIA")

		{



			var dados = { procedimentos : procedimentos, cliente : clienteAtual.cliCodigo, observacoes: "", orcamentoExcluir: orcamentoExcluir };

			dados = { dados: JSON.stringify( dados ) };



			requisitar("requests/nova_guia.php", dados, $("#div_loading_main"), onGuiaCriada, onErrorDefault );

		}



		if(tipoModalGuiaAtual == "ORCAMENTO")

		{

				

			var dados = { procedimentos : procedimentos, cliente : clienteAtual.cliCodigo, observacoes: "" };

			dados = { dados: JSON.stringify( dados ) };



			requisitar("requests/novo_orcamento.php", dados, $("#div_loading_main"), onOrcamentoCriado, onErrorDefault );

		}

	}



}



function onGuiaCriada( result )

{



	if( result.error == "OK")

	{

		alert("Guia criada");

		$("#modalNovaGuia").modal('hide');

		addGuiaToList( result, true );



		if( imprimirGuiaAoSalvar )

			printGuia( result );



		if(orcamentoExcluir != null)

		{

			var dados = { cliente: clienteAtual.cliCodigo };

			$("#div_orcamentos").html("");

			requisitar("requests/get_orcamentos_cliente.php", dados, $("#div_loading_main"), onGetOrcamentos, onErrorDefault );

			orcamentoExcluir = null;

		}	

	}

	else

	{

		alert( result.error );



	}

}





function onOrcamentoCriado( result )

{



	if( result.error == "OK")

	{

		alert("Orçamento criado");



		$("#modalNovaGuia").modal('hide');

		addOrcamentoToList( result, true );



		/*if( imprimirGuiaAoSalvar )

			printGuia( result );*/

	}

	else

	{

		alert( result.error );

	}

}



var ultimoblocoHTMLAutorizado 		= null;

var ultimoblocoHTMLCancelado  		= null;

var ultimoblocoHTMLDesautorizado	= null;

var ultimoItemStatusChanged = null;

function autorizarGuia( item, blocoHTML )

{

	var dados = { guia : item.giaCodigo };

	ultimoblocoHTMLAutorizado = blocoHTML;
	ultimoItemStatusChanged = item;

	requisitar("requests/autorizar_guia.php", dados, $("#div_loading_main"), onGuiaAutorizada, onErrorDefault );



}



function cancelarGuia( item, blocoHTML )

{

	var dados = { guia : item.giaCodigo };

	ultimoblocoHTMLCancelado = blocoHTML;
	ultimoItemStatusChanged = item;

	requisitar("requests/cancelar_guia.php", dados, $("#div_loading_main"), onGuiaCancelada, onErrorDefault );

}





function desautorizarGuia( item, blocoHTML )

{

	var dados = { guia : item.giaCodigo };

	ultimoblocoHTMLDesautorizado = blocoHTML;
	ultimoItemStatusChanged = item;

	requisitar("requests/desautorizar_guia.php", dados, $("#div_loading_main"), onGuiaDesautorizada, onErrorDefault );

}



function onGuiaAutorizada( result )

{

	if( result.error != "OK")

		alert( result.error );

	else

	{

		ultimoItemStatusChanged.giaStatus = 0;
		setStatusGuia( ultimoblocoHTMLAutorizado, 0 );



		//printGuia( result );

	}

}





function onGuiaDesautorizada( result )

{

	if( result.error != "OK")

		alert( result.error );

	else

	{

		ultimoItemStatusChanged.giaStatus = 1;
		setStatusGuia( ultimoblocoHTMLDesautorizado, 1 );



		//printGuia( result );

	}

}





function onGuiaCancelada( result )

{

	if( result.error != "OK")

		alert( result.error );

	else

	{

		ultimoItemStatusChanged.giaStatus = 2;
		setStatusGuia( ultimoblocoHTMLCancelado, 2 );



		//printGuia( result );

	}

}



function truncator(numToTruncate, intDecimalPlaces) 

{    

    var numPower = Math.pow(10, intDecimalPlaces); // "numPowerConverter" might be better

    return ~~(numToTruncate * numPower)/numPower;

}



function formatValor( valor )

{

  if( valor == null )

    valor = 0;



  //+" - "+



  valor = truncator(valor, 2);

  valor = valor.toFixed(2);

  valor = valor.replace(".", ",");

  

  return valor;

}



function parseValor( strValor )

{

    return parseFloat( strValor.replace(",",".") )

}



function getNomeStatusGuia( status )

{

	if( status == 0 )

		return "AUTORIZADA";

	if( status == 1 )

		return "NÃO AUTORIZADA";

	if( status == 2)

		return "CANCELADA";



	return "";

}



var lastGuia = null;



function printGuia( guia )

{

	guia = guia == null ? lastGuia : guia;

	lastGuia = guia;



	var guia = lastGuia;



	var divToPrint = $("#div_print_guia");

	divToPrint.show();



	divToPrint.find("#cabecalho_print_guia").text( "GUIA Nº "+pad( guia.giaCodigo, 6 ) );





	divToPrint.find("#cliente_print_guia").text( guia.giaCliente );

	divToPrint.find("#cpf_print_guia").text( guia.giaClienteCPF );

	divToPrint.find("#status_print_guia").text( getNomeStatusGuia(guia.giaStatus) );

	divToPrint.find("#status_print_guia2").text( getNomeStatusGuia(guia.giaStatus) );



	divToPrint.find("#plano_print_guia").text( guia.cliPlano );

	divToPrint.find("#contrato_print_guia").text( pad( guia.cliNumContrato, 6 ) );

	divToPrint.find("#validade_print_guia").text( guia.cliValidadeContrato );



	divToPrint.find("#credenciado_print_guia").text( guia.giaCredenciado );

	divToPrint.find("#senha_print_guia").text( pad( guia.giaCodigo, 6 ) );

	divToPrint.find("#data_print_guia").text( guia.giaDtGeracao );





	var valorTotal = 0

	$("#table_procedimento_print_guia tbody").html("");


	guia.giaProcedimentos.forEach( function( item, index )

	{

		var html = "<tr><td>"+uppercase(item.gapProcedimento)+"</td><td>"+uppercase(item.gapPrestador)+"</td><td>"+formatValorProc( item.gapValor )+"</td></tr>";

		$("#table_procedimento_print_guia tbody").append( html );
		
		valorTotal += parseFloat(item.gapValor);
	});

	divToPrint.find("#div_total_guia_to_print").html("VALOR TOTAL: R$ "+formatValor(valorTotal));


	window.frames["print_frame"].document.body.width = 920;

	window.frames["print_frame"].document.body.innerHTML= document.getElementById("div_print_guia").innerHTML;



	setTimeout( continuePrintingGuia , 200);

}



function continuePrintingGuia()

{

	window.frames["print_frame"].window.focus();

    window.frames["print_frame"].print();



	$("#div_print_guia").hide();

}



function pad(n, width, z) 

{

  z = z || '0';

  n = n + '';

  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;

}