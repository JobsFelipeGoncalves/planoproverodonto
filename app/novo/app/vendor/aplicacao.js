$(document).ready(function(){



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

  

  //FALE CONOSCO
  $('#faleConosco').submit(function(){
    $.ajax({
       url: 'app/aplicacao/form-fale-conosco.php',
       type: 'POST',
       data: $('#faleConosco').serialize(),
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