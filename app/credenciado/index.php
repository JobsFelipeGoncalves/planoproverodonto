<?php 



include_once 'util/functions.php';



startSession();



set_time_limit(160);





$USUARIO_LOGADO = getUsuario( $_SESSION[ SESSIONL_ID ]);

//TESTE

?>



<!DOCTYPE html> 

<html lang="pt_BR">

    <head>



        <script type="text/javascript">

            var credenciado_logado = <?php echo json_encode($USUARIO_LOGADO, JSON_UNESCAPED_UNICODE); ?>;

        </script>





        <meta charset="UTF-8">

		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

       

        <title>Unifica</title>



       

        <script src="js/jquery.min.js"></script>

        <script src="js/jquery-ui.min.js" type="text/javascript"></script>   

        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />

        <script src="js/js_geral.js"></script>



         <!-- BOOTSTRAP -->

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <script src="js/bootstrap.min.js"  type="text/javascript"></script>



         <!-- FONT AWESOME -->

        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="css/css_geral.css" rel="stylesheet" type="text/css" />



        <!-- DATEPICKER -->

        <script src="js/datepicker-pt-BR.js" type="text/javascript" ></script>

        

         <!-- INPUTMASK -->

       <script src="js/jquery.inputmask.bundle.js"></script>



    </head>

    <body class="skin-blue">





        <div 

        id="div_loading_main" 

        style="

        position: fixed;

        width: 100%;

        height: 100%;

        background: white;

        z-index: 10000;

        opacity: 0.5;

        display:none;">



                <img src="imagens/loading_small.gif" style="

                position: absolute;

                top: 50%;

                left: 50%;

                background: white;">

        </div>



        <div id="main_container">





            <div id="div_header" class="row default_margin_lateral">



                <div class="col-md-6 height_total border_bottom">

                    <img src="imagens/logo.png" style="width:300px;"/>

                </div>

                <div class="col-md-6 height_total border_bottom">



                    <br/>

                    <br/>



                    <div id="inf_login">

                        Logado como <?php echo strtoupper($_SESSION[SESSIONL_NOME]); ?>

                    </div>

                    <div id="inf_alterar_senha">

                        <a onClick='alterarSenha()' class="sublinhado">Configurações</a>

                    </div>

                    <div id="link_sair">

                        <a href="logout.php" class="sublinhado">Sair</a>

                    </div>





                </div>



            </div>



            <div id="div_menu_principal"   >

                <div class="selected_menu" abrir="div_main1">PESQUISA DE ASSOCIADOS</div>

                <div class=""              abrir="div_main2">RELATÓRIO DE GUIAS DE SERVIÇO</div>


            </div>







            <div id="div_main1">









                    <div id="div_numero_associado" class="border_bottom default_margin_lateral">



                            <div class="font_medium arial" style="margin-top: 36px;font-weight:bold;">Digite os dados do associado</div>

                            

                            <input type="text" class="form-control" id="input_num_contrato" placeHolder="Número do contrato">

                            
                            <input type="text" class="form-control" id="input_num_matricula" placeHolder="Número da matrícula">


                            <input type="text" class="form-control" id="input_nomedo_associado" placeHolder="Nome do associado">

                            

                            <input type="text" class="form-control" id="input_cpf_do_associado" placeHolder="CPF do associado ou titular">

                            

                            <button id="bt_pesquisar_associado" class="btn btn-primary" style="height:38px;border-radius:0px;" type="button">

                                Pesquisar

                            </button>



                            <br/>

                            <br/>

                            <br/>



                            <span>Associados encontrados:</span>

                            <br/> <br/>

                            <div id="div_associados_encontrados">

                                    

                            </div>



                    </div>





                    <div id="div_dados_associado1" name="div_dados_associado1" style="display:none" class=" row default_margin_lateral default_margin_top">



                        <div class="col-md-8 height_total">

                            <label class="font_medium arial sublinhado">Dados encontrados:</label>



                            <div class="space10"></div>



                            <div id="div_nome_associado">Nome: RONALDO</div>

                            <div id="div_cpff_associado">CPF: 049.919.671-63</div>

                            <div id="div_nasc_associado">Dt. nascimento: 14/06/1994</div>

                            <div id="div_ende_associado">Endereço: RUA ONOFRE P. DE MATTOS, 1141, DOURADOS, MS</div>

                            <div id="div_tele_associado">Telefone: (67) 9655-7503</div>

            



                            <br/>





                        </div>



                        <div class="col-md-4 height_total">



                            <div id="div_status_carteira" class="carteira_inativa">

                                CARTEIRA INATIVA

                            </div>



                             <div class="space10 clear"></div>

                             <div class="space10 clear"></div>

                            

                            <div id="div_validade_carteira" class="float_right  clear font_medium">VALIDADE DA CARTEIRA: 14/08/2016</div>

                            <div id="div_tipo_plano"        class="float_right  clear font_medium">PLANO EMPRESARIAL</div>

                            <div id="div_nova_guia"         class="float_right  clear font_medium" style="text-align: right;"><a class="sublinhado">NOVA GUIA</a></div>
                            <div id="div_novo_orcamento"    class="float_right  clear font_medium" style="text-align: right;"><a class="sublinhado" onClick="novoOrcamento()">NOVO ORÇAMENTO</a></div>





                        </div>



                    </div>



                    <div id="div_dados_associado2" style="display:none" >



                    

                    

                            <br/>



                                <div style="color: red;font-weight:bold" class="sublinhado font_medium arial">Agendamentos</div>

                               

                                <div id="div_agendamentos">



                                </div>



                            <br/>



                                <div style="color: red;font-weight:bold" class="sublinhado font_medium arial">Guias</div>



                                <div id="div_guias">



                                </div>    



                            <br/>



                                <div style="color: red;font-weight:bold" class="sublinhado font_medium arial">Orçamentos</div>



                                <div id="div_orcamentos">



                                </div>    



                    </div>



            </div><!-- FIM div_main1-->



            <div id="div_main2" class="default_margin_lateral" style="display:none">





                <div id="div_filtros_guias" class="border_bottom">



                            <div class="font_medium arial" style="margin-top: 36px;font-weight:bold;">Pesquisar guias</div>

                            

                            <br/>



                             <div  id="select_statusd_filtroguias" >

                                <label >Status:</label>

                                <select type="text" class="form-control" >

                                    <option value="T">Todas</option>

                                    <option value="0">Autorizadas</option>

                                    <option value="1">Não autorizadas</option>

                                    <option value="2">Canceladas</option>

                                </select>

                            </div>



                            <div id="input_data_dee_filtroguias" >

                                <label >De:</label>

                                <input  type="text" class="form-control" placeHolder="De">

                            </div>



                            <div id="input_data_ate_filtroguias" >

                                <label >Até:</label>

                                <input  type="text" class="form-control"  placeHolder="Até">

                            </div>

                            

                            <div id="input_associad_filtroguias" >

                                <label >Nome do associado:</label>

                                <input  type="text" class="form-control"  placeHolder="Nome do associado">

                            </div>





                            <div id="bt_pesquisar_relatorio_guias" >

                                <label >&nbsp;</label><br/>

                                <button  class="btn btn-primary" style="height:38px;border-radius:0px;" type="button">

                                    Pesquisar

                                </button>

                            </div>



                            <div id="bt_imprimir_relatorio_guias" disabled>

                                <label >&nbsp;</label><br/>

                                <button  class="btn btn-default" style="height:38px;border-radius:0px;" type="button">

                                    Imprimir

                                </button>

                            </div>



                            

                            <br/>

                            <br/>



                    </div>





                    <div id="div_lista_guias_to_print">

                        

                            

                            

                            <br/>

                            <div style="height: 20px;">

                                <div id="cabecalho_print_relguias" class="float_right"></div>

                            </div>



                            <img style="position: absolute;" src="imagens/logo.png" width="160"/>

                            <div class="centralizado" id="title_print_relguias">RELATÓRIO DE GUIAS DE SERVIÇO</div>





                            <br/>



                            <div id="filtros_relguias"></div>



                            <br/>



                            <table id="table_relguias">



                                <thead>

                                    <th>Nome do paciente</th>

                                    <th>Número de matrícula</th>

                                    <th>Status</th>

                                    <th>Data</th>

                                    <th>Procedimentos</th>

                                    <th>Valor</th>

                                </thead>



                                <tbody>



                                </tbody>



                            </table>



                            <br/>

                            <div id="div_valor_total_relatorio"></div>



                    </div>



                    <br/>

                    <br/>





            </div><!-- FIM div_main2-->

            <div id="div_print_guia" style="display:none;/**/width:920px;height:620px;">

                    

                    <link href="css/css_print_guia.css" rel="stylesheet" type="text/css" />



                    <br/>

                    <div style="height: 20px;">

                        <div id="cabecalho_print_guia" class="float_right">GUIA Nº </div>

                    </div>

                    <img style="position: absolute;" src="imagens/logo.png" width="200"/>

                    <div class="centralizado" id="title_print_guia">GUIA DE SERVIÇOS</div>

                    <br/>



                    <table style="width:100%;">



                        <tr>

                            <td>

                                <div class="box_dados box_dados1">

                                    <div class="box_dados_titulo">CLIENTE</div>

                                    <div class="box_dados_conteu" id="cliente_print_guia">RONALDO DOS SANTOS FLORES</div>

                                </div>

                            </td>



                             <td>

                                <div class="box_dados box_dados2">

                                    <div class="box_dados_titulo">CPF</div>

                                    <div class="box_dados_conteu" id="cpf_print_guia">04991967163</div>

                                </div>

                            </td>



                             <td>

                                <div class="box_dados box_dados3" nowrap>

                                    <div class="box_dados_titulo">STATUS</div>

                                    <div class="box_dados_conteu" id="status_print_guia">AUTORIZADA</div>

                                </div>

                            </td>



                        </tr>



                        <tr>



                            <td>

                                <div class="box_dados box_dados1">

                                    <div class="box_dados_titulo">PLANO DO CLIENTE</div>

                                    <div class="box_dados_conteu" id="plano_print_guia">PLANO QUALITY</div>

                                </div>

                            </td>



                             <td>

                                <div class="box_dados box_dados2">

                                    <div class="box_dados_titulo">Nº CONTRATO</div>

                                    <div class="box_dados_conteu" id="contrato_print_guia">000081</div>

                                </div>

                            </td>



                             <td>

                                <div class="box_dados box_dados3">

                                    <div class="box_dados_titulo">VALIDADE DO CONTRATO</div>

                                    <div class="box_dados_conteu" id="validade_print_guia">14/12/2016</div>

                                </div>

                            </td>



                        </tr>







                        <tr>



                            <td>

                                <div class="box_dados box_dados1">

                                    <div class="box_dados_titulo">CREDENCIADO</div>

                                    <div class="box_dados_conteu" id="credenciado_print_guia">UNI IMAGEM</div>

                                </div>

                            </td>



                             <td>

                                <div class="box_dados box_dados2">

                                    <div class="box_dados_titulo">SENHA</div>

                                    <div class="box_dados_conteu" id="senha_print_guia">03491341</div>

                                </div>

                            </td>



                             <td>

                                <div class="box_dados box_dados3">

                                    <div class="box_dados_titulo">DATA DE CRIACAO</div>

                                    <div class="box_dados_conteu" id="data_print_guia">01901934</div>

                                </div>

                            </td>



                        </tr>



                    </table>

                    

                    <br/>

                    <br/>



                    <table id="table_procedimento_print_guia">

                        <thead>

                            <th>PROCEDIMENTO</th>

                            <th>PRESTADOR</th>

                            <th>VALOR</th>

                        </thead>



                        <tbody>





                        </tbody>



                    </table>



                    <div style="height: 10px;"></div>

                    <div>                    
                        <div style="float:right;font-size: 18px;" id="div_total_guia_to_print"></div>
                    </div>

                    <br/>

                    <br/>

                    <br/>

                    <br/>



                    <div class="div_assinatura_print_guia">

                        <div>

                            Ass. Cliente

                        </div>

                    </div>

                    <div class="div_assinatura_print_guia">

                        <div>

                            Ass. Credenciado

                        </div> 

                    </div>

                    <br/>
                    <br/>
                    <br/>

                    <div>
                        <div style="float: right;" id="status_print_guia2">AUTORIZADA</div>
                    </div>
                    <br/>
                    <div>
                        <div style="float:right">Enviar para o faturamento da Prover</div>
                    </div>




            </div>





            <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>



            <div class="item_guia_template hide border_all default_margin_lateral default_margin_bottom">



                <div class="default_margin_lateral default_margin_top">





                    <div class="div_planod_guia">Data: 10/04/2016</div>

                    <div class="div_senhad_guia">Horário: 14:30</div>

                    <div class="div_datada_guia">Especialidade: CLÍNICO GERAL</div>

                    <div class="div_total_guia">Total: </div>

                    <div class="div_observ_guia">Especialidade: CLÍNICO GERAL</div>





                    <br/>

                    <div class="arial font_medium sublinhado">Procedimentos</div>



                    <div style="position: relative;">

                            <ul class="lista_procedimentos_guia">

                                <li>Consulta</li>

                                <li>Exame de sangue</li>

                            </ul>

                            <button class="btn btn_desautorz arial btn-warning" >DESAUTORIZAR</button>

                            <button class="btn btn_cancelar  arial btn-danger"  >CANCELAR</button>

                            <button class="btn btn_autorizar arial btn-primary" >AUTORIZAR GUIA</button>

                            <button class="btn btn_imprimir  arial">IMPRIMIR</button>

                    </div>



                    





                </div>

            </div>





            <div class="item_agendamento_template hide border_all default_margin_lateral default_margin_bottom">



                <div class="default_margin_lateral default_margin_top">





                    <div class="div_valor_paciente float_right arial font_medium bold">Valor: R$ 50,00</div>

                    <div class="div_data_agendamento">Data: 10/04/2016</div>

                    <div class="div_hora_agendamento">Horário: 14:30</div>

                    <div class="div_pres_agendamento">Prestador: DR. CARLOS BANDEIRA JUNIOR</div>

                    <div class="div_espe_agendamento">Especialidade: CLÍNICO GERAL</div>

                    <div class="div_obsv_agendamento">Observações</div>





                    <br/>

                    <div class="arial font_medium sublinhado">Procedimentos</div>



                    <div style="position: relative;">

                            <ul class="lista_procedimentos_agendamento">

                                <li>Consulta</li>

                                <li>Exame de sangue</li>

                            </ul>

                            <button class="btn btn_desautorz arial btn-warning" >DESAUTORIZAR</button>

                            <button class="btn btn_cancelar  arial btn-danger"  >CANCELAR</button>

                            <button class="btn btn_autorizar arial btn-primary" >AUTORIZAR GUIA</button>

                            <button class="btn btn_imprimir  arial">IMPRIMIR</button>

                    </div>



                    





                </div>

            </div>





        </div>



<!--

        <div id="modalNovaGuia" class="modal fade" tabindex="-1" role="dialog">

          <div class="modal-dialog"  style="height:300px;width:465px;">

            <div class="modal-content">

              <div class="modal-body" >

                    <div style="height:300px;width:425px;background: url(imagens/nova_guia_dialog_testes..png);">

                    </div>

              </div>

              

            </div>

          </div>

        </div> /.modal -->





        <div class="input-group btn-group" style="width:100%" id="dropDownProcedimentos">

            <ul class="dropdown-menu" id="dropdown_procedimentos">





            </ul>

        </div>





        <div class="input-group btn-group" style="width:100%" id="dropDownPrestadors">

            <ul class="dropdown-menu" id="dropdown_prestadors">





            </ul>

        </div>



        <div class="input-group btn-group" style="width:100%" id="dropDownEspecialidade">

            <ul class="dropdown-menu" id="dropdown_especialidades">





            </ul>

        </div>



        <div id="modalNovaGuia" class="modal fade" tabindex="-1" role="dialog">

            <div class="modal-dialog" style="height:300px;width:665px;">

                <div class="modal-content">

                      <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title">NOVA GUIA</h4>

                      </div>

                      <div class="modal-body">

                            <div style="height:220px;width:625px;">

                            



                            <div class="input-group" >



                                <span >



                                    <input type="text" class="form-control" id="input_procedimento_nova_guia" placeHolder="Procedimento">

                                

                                </span>





                                



                                <span class="input-group-btn" style="width:30%">

                                        <input type="text" class="form-control" id="input_especialidade_nova_guia" placeHolder="Especialidade">

                                </span>

                                

                                <span class="input-group-btn" style="width:30%">

                                        <input type="text" class="form-control" id="input_prestador_nova_guia" placeHolder="Prestador">

                                </span>

                                

                                <span class="input-group-btn">

                                    <button class="btn btn-default" type="button" id="btn_add_procedimento">

                                        Adicionar

                                    </button>

                                </span>



                            </div><!-- /input-group -->



                            <div id="outer_table_procedimentos_guia" style="overflow: auto">

                                <table id="table_procedimentos_guia">

                                   <!-- <thead>

                                        <th></th>

                                        <th>Procedimento</th>

                                        <th>Valor</th>

                                    </thead>

                                    -->



                                    <tbody>

                                        



                                    </tbody>

                                </table>

                            </div>





                            </div>

                      </div>

                      <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">FECHAR</button>

                        <button type="button" class="btn btn-primary" id="bt_salvar_guia_e_impimir">SALVAR E IMPRIMIR</button>

                        <button type="button" class="btn btn-primary" id="bt_salvar_guia">SALVAR</button>

                      </div>

                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->

        </div><!-- /.modal -->  







        <div id="modalAlteraSenha" class="modal fade" tabindex="-1" role="dialog">

            <div class="modal-dialog" style="height:160px;width:400px;">

                <div class="modal-content">

                      <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title">ALTERAR SENHA</h4>

                      </div>

                      <div class="modal-body">

                            <div style="height:100px;width:360px;">

                            

                            <input type="text"   id="novasenha1" class="form-control" placeholder="Nova senha"/>

                            <br/>

                            <input type="text"   id="novasenha2" class="form-control" placeholder="Repita a senha"/>



                            </div>

                      </div>

                      <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">FECHAR</button>

                        <button type="button" class="btn btn-primary" id="bt_confirmar_alterar_senha">ALTERAR</button>

                      </div>

                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->

        </div><!-- /.modal -->  



    </body>

</html>



