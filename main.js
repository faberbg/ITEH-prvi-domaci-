
// Za dodavanje 
/*
$(document).ready(function() {
	$('#btnAdd').on('click', function() {
		$("#btnAdd").attr("disabled", "disabled");
        
		var naziv = $('#nazivKolaca').val();
		var opis = $('#opisKolaca').val();
		var cena = $('#cenaKolaca').val();
		var posno = $('#posnoKolac').val();
        var kategorija = $('#kategorijaKolac').val();
        console.log(naziv);
        console.log(opis);
        console.log(cena);
        console.log(posno);
        console.log(kategorija);
		if(naziv!="" && opis!="" && cena!="" && posno!="" && kategorija!=""){
            console.log("usao u if");
			$.ajax({
				url: "add.php",
				type: "POST",
				data: {
					naziv: naziv,
					opis: opis,
					cena: cena,
					posno: posno,
                    kategorija:	kategorija			
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#addForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 	
                        console.log("uspesno upisao");					
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});

// Za brisanje


/*	$(document).on("click", "#btndelete", function() { 
		var $ele = $(this).parent().parent();
        console.log($(this).attr("data-id"));
		$.ajax({
			url: "delete.php",
			type: "POST",
			cache: false,
			data:{
				id: $(this).attr("data-id")
                
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
	});*/


