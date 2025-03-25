jQuery(function($) {

    $("#nom").keyup(function(e) {
        let erreur = false;
        let carInterdits = "/.;?)({}][|^@+*";
        console.log("chat")
        let a = $("#nom").val();

            for (let index=0; index <= a.length  ; index++ ){
                let carCourant = a.charAt(index);
                for (let j = 0; j < carInterdits.length; j++) {
                    if(carCourant == carInterdits.charAt(j)) erreur = true;
                }
            }

                if (erreur) { 
                    $ ("#3").val("erreur");
                
                } else {
                    $("#3").val("c'est bon");
                };

      
    }); 
    });

