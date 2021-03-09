$('#formCreate').submit(function(e){
    e.preventDefault();

    var codigo = $('#codigo').val();
    var nombre = $('#nombre').val();
    var telefono =$('#telefono').val();
    var correo = $('#correo').val();
    var carrera = $('#carrera').val();
    var foto = $('#foto').val();

    if(codigo ==''){

        setTimeout(function(){
            $('#lbcodigo').html("<span style='color:red'>Completa el campo nombre</span>").fadeOut(1000);
        });
       
        $('#codigo').focus();
        return false;
        }else if(nombre ==''){

        setTimeout(function(){
            $('#lbnombre').html("<span style='color:red'>Completa el campo nombre</span>").fadeOut(10000);
        });
            
        $('#nombre').focus();
        return false;
        }else if(telefono ==''){

            setTimeout(function(){
                $('#lbtelefono').html("<span style='color:red'>Completa el campo telefono</span>").fadeOut(10000);
            });
           
            $('#telefono').focus();
            return false;
            }else if(correo ==''){

        setTimeout(function(){
            $('#lbcorreo').html("<span style='color:red'>Completa el campo correo</span>").fadeOut(10000);
        });
       
        $('#correo').focus();
        return false;
        }else if(carrera ==''){

            setTimeout(function(){
                $('#lbcarrera').html("<span style='color:red'>Completa el campo carrera</span>").fadeOut(10000);
            });
        
            $('#carrera').focus();
            return false;
        }else if(foto ==''){

            setTimeout(function(){
                $('#lbfoto').html("<span style='color:red'>Completa el campo foto</span>").fadeOut(10000);
            });
        
            $('#foto').focus();
            return true;
        }
        
         this.submit();
});