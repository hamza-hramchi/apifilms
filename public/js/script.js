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

    var id = $(".divFilm").attr("id");
    console.log(id);
    
    $.ajax({ 
        url :'/film/' + id + '/critiques',
        method : 'GET',
        data : {id : id},
        dataType: 'json',
        success: function(result){
            data = result.critics;
            chaine = '';
            if(data.length == 0){
                chaine += "<p class=text-white> Ce film n'a aucune critique </p>";
                $("#criticsList").append(chaine);
            }
            else{
                $.each(data,function(index,row){
                    chaine += "<h4 class=text-warning>" + row.titre + "</h4>";
                    chaine += "<p>" + row.contenu + "/</p>";
                    chaine += "<small>" + row.created_at + "</small><hr>";
                    $("#criticsList").append(chaine);
                });
            }
        }
    })
});