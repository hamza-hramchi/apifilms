$(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#send").click(function(){
        var titre = $("#titre").val();
        var contenu = $("#contenu").val();
        
        if(titre == '' || contenu == '')
           alert("Veuillez remplir tous les champs !");
        else{
            let idFilm = $(".divFilm").attr("id"); 
            $.ajax({
                url : '/critique/' + idFilm,
                type : 'POST',
                data : {_token: CSRF_TOKEN,titre: titre, contenu : contenu},
                success : function(response){
                    alert("Votre critique est bien ajoutée avec succès !");
                    $("#titre").val('');
                    $("#contenu").val('');
                }
            });
        } 
    })
});