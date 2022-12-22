$(document).ready(function(){

//POST DO CREDENCIADO
  $('#credenciados').submit(function(){
    $.ajax({
       url: '../app/aplicacao/form-credenciados.php',
       type: 'POST',
       data: $('#credenciados').serialize(),
       success: function(data){
            $('#repostas').html(data);
            $("#repostas").show('fast');
          setTimeout(function(){ 
            $('#repostas').html(data);
            $("#repostas").hide('show');
          }, 10000);
           //$('#repostas').html(data); 3000
       }
    });
    return false;
  });



//FALE COM UM CONSULTOR
  $('#faleComConsultor').submit(function(){
    $.ajax({
       url: 'app/aplicacao/form-fale-com-consultor.php',
       type: 'POST',
       data: $('#faleComConsultor').serialize(),
       success: function(data){
            $('#repostas').html(data);
            $("#repostas").show('fast');
          setTimeout(function(){ 
            $('#repostas').html(data);
            $("#repostas").hide('show');
          }, 10000);
           //$('#repostas').html(data); 3000
       }
    });
    return false;
  });


//FALE COM UM CONSULTOR PJ
  $('#faleComConsultorPJ').submit(function(){
    $.ajax({
       url: 'app/aplicacao/form-fale-com-consultor-pj.php',
       type: 'POST',
       data: $('#faleComConsultorPJ').serialize(),
       success: function(data){
            $('#repostas').html(data);
            $("#repostas").show('fast');
          setTimeout(function(){ 
            $('#repostas').html(data);
            $("#repostas").hide('show');
          }, 10000);
           //$('#repostas').html(data); 3000
       }
    });
    return false;
  });

  

  //FALE CONOSCO
  $('#contato').submit(function(){
    $.ajax({
       url: '../app/aplicacao/form-fale-conosco.php',
       type: 'POST',
       data: $('#contato').serialize(),
       success: function(data){
            $('#repostas').html(data);
            $("#repostas").show('fast');
          setTimeout(function(){ 
            $('#repostas').html(data);
            $("#repostas").hide('show');
          }, 10000);
           //$('#repostas').html(data); 3000
       }
    });
    return false;
  });
 

 $('#trabalhe-conosco').submit(function(){

  // Captura os dados do formulário
    var formulario = document.getElementById('#trabalhe-conosco');
 
    // Instância o FormData passando como parâmetro o formulário
    var formData = new FormData(formulario);
   
    $.ajax({
       url: '../app/aplicacao/form-trabalhe-conosco.php',
       type: 'POST',
       data: formData,
       success: function(data){
            $('#repostas').html(data);
            $("#repostas").show('fast');
          setTimeout(function(){ 
            $('#repostas').html(data);
            $("#repostas").hide('show');
          }, 10000);
           //$('#repostas').html(data); 3000
       }
    });
    return false;
  });




}); //fim funciton ready