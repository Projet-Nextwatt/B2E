/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 //auto complete's data source is a static array
 $('#search-catalogue').typeahead({
   source: function(query, process) {
    $.ajax({url: 'CI_catalogue/ajax_chargernomcatalogue?q='+encodeURIComponent(query),  dataType : "json"}).done(function(result_items){
        console.log(result_items);
        process(result_items);
    });
 },
   updater: function (item) {
     //when an item is selected from dropdown menu, focus back to input element
     $('#nav-search-input').focus();
     return item;
   }
 });