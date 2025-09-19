function disableF5(e) { 
   if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
      e.preventDefault(); 
   }
};

$("#idFrmModificar").submit(function (e) {
   var form = this;

   e.preventDefault();

   //Verificamos la forma
   grupo=new String(document.forma.grupo.value);
   if (grupo=="-2") {
      alert("Debe Seleccionar un Grupo");
      forma.grupo.focus();
      return false;
   }
   if (grupo=="-1") {
      alert("Todos los grupos estan Llenos");
      forma.grupo.focus();
      return false;   
   }    
   //Verificamos el grupo de practica si existe el combo
   if ($("#idGrupoPractica").length>0) {
      grupoPractica=new String(document.forma.idGrupoPractica.value);
      if (grupoPractica=="-2") {
         alert("Debe Seleccionar un grupo de practica");
         forma.idGrupoPractica.focus();
         return false;
      }
      if (grupoPractica=="-1") {
         alert("Todos los grupos de practica estan Llenos");
         forma.idGrupoPractica.focus();
         return false;   
      }
   }

   resp = confirm("¿Está realmente seguro de que desea realizar el cambio de grupo?")                  

   if (resp == true) {      
      $("#idIndicadorProcesoModificar").show(0);
      $("#idBtnModificar").hide(0);
      setTimeout(function () {
         form.submit();
      }, 2000);
   }
   else {
      return false
   }
});
       
$(document).ready(function(){
   $(document).keydown(disableF5);
});
