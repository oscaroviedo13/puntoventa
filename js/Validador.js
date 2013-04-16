/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    function isDigit(q) { 
        
        for ( i = 0; i < q.length; i++ ) {  
            if ( validateChar(q.charAt(i)) == false) {  
                return false;  
            }  
        }  
        return true;  
    }  
    
    function isVacio(dato) {  
        
        var sRetorno = "";
        
        for ( i = 0; i < dato.length; i++ ) {  
            if ( dato.charAt(i) == "0" ) {  
                sRetorno += "1";
            }else{
                sRetorno += dato.charAt(i);
            }  
        }  
        return sRetorno  
    }  
    
    function reemplazar(dato) {  
        
        var sRetorno = "";
        
        for ( i = 0; i < dato.length; i++ ) {  
            if ( dato.charAt(i) == "0" ) {  
                sRetorno += "1";
            }else{
                sRetorno += dato.charAt(i);
            }  
        }  
        return sRetorno  
    }  

    function validateChar(aChar){
        myCharCode = aChar.charCodeAt(0);

        if((myCharCode > 47) && (myCharCode <  58))
        {
            return true;
        }else{
            return false;
        }

    }

    function validaTexto(){
        
        var retorno = true;
        var sCadenaRetorno = "";
        var controlesTexto = new Array(
                                        ["nombre", "Nombres"],
                                        ["desc", "Descripcion"]
                                        );


        
        for(var i=0; i< controlesTexto.length; i++) {

            //if( vacio(document.getElementById(controlesWebPage[i][0]).value) == false ) {  
            if( document.getElementById(controlesTexto[i][0]).value == "" || document.getElementById(controlesTexto[i][0]).value == " ") {  
                if(i == 0){
                    sCadenaRetorno += controlesTexto[i][1];  

                }else{
                    sCadenaRetorno +=  ', ' + controlesTexto[i][1];                          
                }

                retorno = false;
            }
        }

        if(retorno == false){
            alert("Introduzca un cadena de texto valida para los campos (" + sCadenaRetorno + ").")  
        }
        return retorno;
    }
    
    function validaNumero(){
        
        var retorno = true;
        var sCadenaRetorno = "";
        var controlesNumero = new Array(
                                        ["stock", "Stock"],
                                        ["precio", "Precio"],
                                        ["iva", "Iva"]
                                        );


        
        for(var i=0; i< controlesNumero.length; i++) {            
             
            if( isDigit(document.getElementById(controlesNumero[i][0]).value) == false ) { 
               
                if(i == 0){
                    sCadenaRetorno += controlesNumero[i][1];  

                }else{
                    sCadenaRetorno +=  ', ' + controlesNumero[i][1];                          
                }

                retorno = false;
            }
        }

        if(retorno == false){
            alert("Introduzca numero valido para los campos (" + sCadenaRetorno + ").")  
        }
        
        return retorno;
    }

    function validaEditaPHP() {  
        
//        var bRetorno = true;
        var retornos = Array (
                            validaTexto(),
                            validaNumero()
                            );
                                
        for(var i=0; i<retornos.length; i++){
//            alert("valor retornado:" + retornos[i]);
            if(retornos[i] == false){
                return false;
            }
        }
        
        return true;
    }  


