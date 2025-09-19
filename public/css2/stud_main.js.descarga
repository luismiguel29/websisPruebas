$( function() {
   $( "#idAccordionInfoPersonal" ).accordion({
      collapsible: true,
      active:false,
      heightStyle: "content",
      activate: function(event, ui) {
         strOpcion=ui.newHeader.text().trim();
         if (strOpcion.length>0) {
            if (strOpcion=="Estado Admisión") {
               $.get("stud_main_ajaxAdmision.asp", function(data, status) {
                  //alert("Data: " + data + "\nStatus: " + status);
                  setTimeout(function () {
                     $("#idEstadoAdmision").html(data);
                  },1000
                  );                           
               });
            }
            else if (strOpcion=="Historia Carreras") {
               $.get("stud_main_ajaxCarreras.asp", function(data, status) {
                  setTimeout(function () {
                     $("#idHistoriaCarreras").html(data);
                  },1000
                  );                           
               });
            }
            else if (strOpcion=="Declaración Jurada para el SSU") {
               $.get("stud_main_ajaxSSU.asp", function(data, status) {
                  setTimeout(function () {
                     $("#idSSU").html(data);
                  },1000
                  );                           
               });
            }                     
            else if (strOpcion=="Registro Biográfico") {
               $.get("stud_main_ajaxBiografico.asp", function(data, status) {
                  setTimeout(function () {
                     $("#idRegistroBiografico").html(data);
                  },1000
                  );                           
               });
            }                                          
            else if (strOpcion=="Notificaciones") {
               $.get("stud_main_ajaxNotificaciones.asp", function(data, status) {
                  setTimeout(function () {
                     $("#idNotificaciones").html(data);
                  },1000
                  );                           
               });
            }                                                               
            else if (strOpcion=="Información General") {
               $.get("stud_main_ajaxInformacionGeneral.asp", function(data, status) {
                  setTimeout(function () {
                     $("#idInformacionGeneral").html(data);
                  },1000
                  );                           
               });
            }                                                                           
            else {

            }
         }
      }
   });

   $( "#idAccordion2" ).accordion({
      collapsible: true,
      //active:false,
      heightStyle: "content"
   });
});
