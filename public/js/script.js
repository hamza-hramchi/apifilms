
$(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(".divFilm").attr("id");
    var chaine = '';

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
                    alert("Critique enregistrée avec succès !");
                    document.location.reload(true);
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
                data = result.critics[1];
                users = result.critics[0];
                if(data.length == 0){
                    chaine += "<p class=text-white> Pas de critiques pour ce film. </p>";
                    $("#criticsList").append(chaine);
                }
                else{
                    $("#criticsList").empty();
                    for(var i=0; i<data.length; i++){
                        var d = new Date(data[i].created_at);
                        chaine += "<h3 class=text-white>" + data[i].titre + "</h3>";
                        chaine += "<p>" + data[i].contenu + "</p>";
                        chaine += '<span class=text-warning>' + users[i][0].name + ' - </span>';
                        chaine += "<small> Ajoutée le : " + d.getDate()+"/"+(d.getMonth()+1)+"/"+d.getFullYear() + "</small><hr>";                        
                    }
                    $("#criticsList").append(chaine);
                }
            }
    });


    // La note
    $.ajax({
        url     :  '/film/' + id + '/note',
        method  : 'GET',
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
                var f_note = Math.floor(somme/(result.length));
                for(var i=0; i<f_note; i++){
                    chaine = '<i class="fa fa-star"></i>';
                    $("#note").append(chaine);
                }
                var lanote = '<span class="small"> ( ' + f_note +  ' ) </span>';
                $("#note").append(lanote);
                
            }
        }

    });
});
