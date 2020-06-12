
$(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(".divFilm").attr("id");

    // Enregistrer la critique
    $("#send").click(function(){
        var titre = $("#titre").val();
        var contenu = $("#contenu").val();
        var rating = $("#rating").val();
        
        if(titre == '' || contenu == '' || rating == '')
           alert("Veuillez remplir tous les champs !");
        else{
            let idFilm = $(".divFilm").attr("id"); 
            var film_titre = $("#film_titre").html();
            $.ajax({
                url : '/critique/' + idFilm,
                type : 'POST',
                data : {_token: CSRF_TOKEN,titre: titre, contenu : contenu, film_titre : film_titre, rating : rating},
                success : function(response){
                    alert("Votre critique est bien ajoutée avec succès !");
                    $("#titre").val('');
                    $("#contenu").val('');
                }
            });
        } 
    })

    // La liste des critiques
    $.ajax({ 
        url :'/film/' + id + '/critiques',
        method : 'GET',
        data : {id : id},
        dataType: 'json',
        success: function(result){
            data = result.critics;
            chaine = '';
            if(data.length == 0){
                chaine += "<p class=text-white> Pas de critiques pour ce film. </p>";
                $("#criticsList").append(chaine);
            }
            else{
                $.each(data,function(index,row){
                    var d = new Date(row.created_at);
                    chaine += "<h4 class=text-black>" + row.titre + "</h4>";
                    chaine += "<p>" + row.contenu + "/</p>";
                    chaine += "<small> Ajoutée le : " + d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear() + "</small><hr>";
                    $("#criticsList").append(chaine);
                });
            }
        }
    });

    // La note
    $.ajax({
        url : '/film/' + id + '/note',
        method : 'GET',
        success : function(data){
            var result = data.note;
            var chaine = '';
            var somme = 0;
            $.each(result,function(index,row){
                somme+= row.note
            });

            if(somme == 0) {
                chaine = "<span class=small>Ce film n'est pas encore noté </small>";
                    $("#note").append(chaine);
            }
            else{
                var f_note = Math.floor(somme/result.length);
                for(var i=0; i<f_note; i++){
                    chaine = '<i class="fa fa-star"></i>';
                    $("#note").append(chaine);
                }
                var lanote = '<span class="small"> ( ' + f_note +  ' / 5 ) </span>';
                $("#note").append(lanote);
                console.log(f_note);
                
            }
            
            ;
        }
    });
});
