/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//auto complete's data source is a static array
 $('#Categorie_Groupe').typeahead({
   source: /*["Bouseux","Boloss"],*/
           
           /* function(){ // les deux arguments représentent les données nécessaires au plugin
	$.ajax({
            url : 'CI_user/ajax_categoriegroupe', // on appelle le script JSON
            dataType : 'json', // on spécifie bien que le type de données est en JSON
            
            success : function(donnee){
                return donnee;
            }
        });
    },*/
    
            function(query, process) {
            $.ajax({url: 'ajax_categoriegroupe', dataType : "json"}).done(function(result_items){
               process(result_items);
            });
         },
         
         
   updater: function (item) {
     //when an item is selected from dropdown menu, focus back to input element
     $('#Categorie_Groupe').focus();
     return item;
   }
 });