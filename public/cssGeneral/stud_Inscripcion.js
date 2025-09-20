$(document).ready(function () {
   //*** Configuramos la situaci�n inicial de la forma
   $("#idIndicadorProcesoAnadir").hide();
   $("#idIndicadorProcesoRetirar").hide();
   $("#idIndicadorProcesoTerminar").hide();
   $("#idBtnAnadir").show();


   $("#idFrmAnadir").submit(function (e) {
      var form = this;
      var booOK = true;
      var strActionForm="oferta"

      $("#idIndicadorProcesoAnadir").show(0);
      $("#idBtnAnadir").hide(0);

      e.preventDefault();

      setTimeout(function () {
         $("#idFrmAnadir").attr('action', strActionForm);
         form.submit();
         //$("#idIndicadorProcesoAnadir").hide();
         //$("#idBtnAnadir").show();
      }, 1000);      
   });

   $(window).bind('unload', function(){
      $("#idIndicadorProcesoAnadir").hide();
      $("#idBtnAnadir").show();     
   });

   $("#idBtnEliminar").click(function() {
      var resp;
      var intChecked;
      var strActionForm="borrarMateria"

      intChecked=$("input[type=checkbox]:checked").length;
      if (intChecked>=1) {
         resp = confirm("�Est� realmente seguro de que desea RETIRAR la(s) materia(s) marcada(s)?")
         if (resp == true) {
            $("#idIndicadorProcesoRetirar").show(0);
            $("#idBtnEliminar").hide(0);
            setTimeout(function () {
               $("#idFrmEliminar").attr('action', strActionForm);
               $("#idFrmEliminar").submit();
            }, 1000);
        }
      }
   });

   $(".idBtnCambiar").click(function() {
      var strEnlace;
      strEnlace=$(this).attr("enlace");
      //strMateria=$(this).attr("materia");
      //strIdMateria="#id"+strMateria;
      //strEnlace=strEnlace+"&mc="+$("#id"+strMateria).val()
      //alert(strEnlace);
      window.location.href=strEnlace;
      return false;
   });

   $("#idFrmTerminar").submit(function (e) {
      var form = this;
      var strActionForm="websis2"         

      e.preventDefault();

      resp = confirm("¿Está realmente seguro de que desea SALIR del Proceso de Inscripción?")                  

      if (resp == true) {
         $("#idIndicadorProcesoTerminar").show(0);
         $("#idBtnTerminar").hide(0);
         setTimeout(function () {
            $("#idFrmTerminar").attr('action', strActionForm);
            form.submit();
         }, 2000);
      }
      else {
         return false
      }
   });
});
