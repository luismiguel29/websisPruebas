$(document).ready(function(){
   $("#accordionEnlaces").accordion({
      collapsible: true,
      //active:true,
      heightStyle: "content"
   });

   $('[data-toggle="tooltip"]').tooltip();

   $("#idAccordionCarreras").accordion({
      collapsible: true,
      active:false,
      heightStyle: "content"
    });

   $("#idAccordionEstudiantes").accordion({
      collapsible: true,
      heightStyle: "content"
   });

   $("#idAccordionDocentes").accordion({
      collapsible: true,
      heightStyle: "content"
   });


   $( "#idAccordionLoginPost" ).accordion({
      collapsible: true,      
      active:false,                        
      heightStyle: "content",
      activate: function(event,ui) {
         //$("#idCI").val(ui.newHeader.find("a").text());
         //alert(ui.newPanel.find("#idCI").val());
         if (ui.newPanel.find("#idCI").length>0) {
            $("#idCI").focus();
         }
      }
   });

});
