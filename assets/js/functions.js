$(function(){
    var atual_fieldset, next_fieldset, prev_fieldset;
  
    $('.next').click(function(){
        atual_fieldset = $(this).parent();
        next_fieldset = $(this).parent().next();
  
        $('#progress li').eq($('fieldset').index(next_fieldset)).addClass('ativo');
        atual_fieldset.hide(800);
        next_fieldset.show(800);
    });
  
    $('.prev').click(function(){
      atual_fieldset = $(this).parent();
      prev_fieldset = $(this).parent().prev();
  
      $('#progress li').eq($('fieldset').index(atual_fieldset)).removeClass('ativo');
      atual_fieldset.hide(800);
      prev_fieldset.show(800);
    });
    
  });

  /* FUNÇÃO DE MASCARAS PARA CAMPO INPUT  */

  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00")
    $("#cnpj").mask("00.000.000/0000-00")
    $("#telefone").mask("(00) 0000-0000")
    $("#salario").mask("999.999.990,00", {reverse: true})
    $("#cep").mask("00.000-000")
    $("#data_nasc").mask("00/00/0000")
    $("#data_fundacao").mask("00/00/0000")
    $("#celular").mask("(00) 0000-00009")
    
    $("#celular").blur(function(event){
        if ($(this).val().length == 15){
            $("#celular").mask("(00) 00000-0009")
        }else{
            $("#celular").mask("(00) 0000-00009")
        }
    })
    
    $("#rg").mask("999.999.999-W", {
        translation: {
            'W': {
                pattern: /[X0-9]/
            }
        },
        reverse: true
    })
    
    var options = {
        translation: {
            'A': {pattern: /[A-Z]/},
            'a': {pattern: /[a-zA-Z]/},
            'S': {pattern: /[a-zA-Z0-9]/},
            'L': {pattern: /[a-z]/},
        }
    }
    
})