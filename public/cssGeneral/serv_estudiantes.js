$(document).ready(function () {
   //*** Configuramos la situaci�n inicial de la forma
   $("#idIndicadorProceso").hide();
   $("#idIndicadorProceso2").hide();
   $("#idCuenta").val("");
   $("#idCuenta").focus();
   window.scrollTo(0,0); 
   //$([document.documentElement, document.body]).animate({
   //   scrollTop: $("#idCuenta").offset().top-190
   // }, 000);   

   
   //*** Verificar forma antes del submit
   $("#idFrmLogin").submit(function (e) {
      var strCuenta;
      var form = this;
      var booOK = true;
      var strActionForm="sesion"         

      $("#idBtnSubmit").hide();
      $("#idIndicadorProceso").show();//fadeIn(800);
      

      e.preventDefault();

      // Verificacion del Formulario
      strCuenta = $.trim($("#idCuenta").val());
      if (strCuenta  === '') {
         alert('Debe introducir su c�digo SIS de estudiante.');
         $("#idCuenta").focus();
         $("#idBtnSubmit").show(0);
         $("#idIndicadorProceso").hide(0);             
         booOK=false;
         return false;
      }
      if ((strCuenta.length!= 9)) {
         alert('El c�digo SIS del estudiante es de 9 digitos.');
         $("#idCuenta").focus();
         $("#idIndicadorProceso").hide(0);
         $("#idBtnSubmit").show(0);
         booOK=false;
         return false;
      }
      if (isNaN(strCuenta)) {
         alert('El c�digo SIS del estudiante debe ser n�merico.');
         $("#idCuenta").focus();
         $("#idIndicadorProceso").hide(0);
         $("#idBtnSubmit").show(0);
         booOK=false;
         return false;
      }
      strContrasena = $.trim($("#idContrasena").val());
      if (strContrasena  === '') {
         alert('Debe introducir una Contrase�a v�lida.');
         $("#idContrasena").focus();
         $("#idIndicadorProceso").hide(0);
         $("#idBtnSubmit").show(0);
         booOK=false;
         return false;
      }
      strCodigo = $.trim($("#idCodigo").val());
      if (strCodigo  === '') {
         alert('Debe introducir el c�digo de verificaci�n que aparece en la imagen.');
         $("#idCodigo").focus();
         $("#idIndicadorProceso").hide(0);
         $("#idBtnSubmit").show(0);
         booOK=false;
         return false;
      }

      if (booOK==false) {
         $("#idIndicadorProceso").hide();
         return false;
      }
      else {
         setTimeout(function () {
            $("#idFrmLogin").attr('action', strActionForm);
            form.submit();
         },tiempoJS);
      }
   });
   $("#idFormRecuperarPwd").submit(function (e) {
      var form=this;
      var formActionURL="stud_recuperar_ajax.asp";//$(this).attr("action");
      var postData=$(this).serializeArray();

      $("#idBtnSubmit2").hide();
      $("#idIndicadorProceso2").show();

      e.preventDefault();

      // Verificacion del Formulario
      strRecCodSIS = $.trim($("#idRecCodSIS").val());
      if (strRecCodSIS  === '') {
         alert('Debe introducir su c�digo SIS de estudiante.');
         $("#idIndicadorProceso2").hide(0);
         $("#idBtnSubmit2").show(0);               
         $("#idRecCodSIS").focus();
         return false;
      }
      if ((strRecCodSIS.length!= 9)) {
         alert('El c�digo SIS del estudiante es de 9 digitos.');
         $("#idIndicadorProceso2").hide(0);
         $("#idBtnSubmit2").show(0);                              
         $("#idRecCodSIS").focus();
         return false;
      } 
      if (isNaN(strRecCodSIS)) {
         alert('El c�digo SIS del estudiante es n�merico.');
         $("#idIndicadorProceso2").hide(0);
         $("#idBtnSubmit2").show(0);                              
         $("#idRecCodSIS").focus();
         return false;
      }

      strRecImagen = $.trim($("#idRecImagen").val());
      if (strRecImagen  === '') {
         alert('Debe introducir el c�digo de verificaci�n');
         $("#idIndicadorProceso2").hide(0);
         $("#idBtnSubmit2").show(0);                              
         $("#idRecImagen").focus();
         return false;
      }
      setTimeout(function () {
         $.post(formActionURL,postData,function (data,status) {
            strRespuesta=data;
            $("#idDivRecuperarPwdMsg1").html(strRespuesta);
            $("#idDivRecuperarPwdMsg2").html(strRespuesta);
            $("#idRecCodSIS").val("");
            $("#idRecImagen").val("")
            $("#idRecDia").val("01");
            $("#idRecMes").val("01");
            $("#idRecAnio").val(2004);
            $('#idCodVerificacion2').attr('src', $('#idCodVerificacion2').attr('src') + '?' + Math.random());

            $("#idIndicadorProceso2").hide(0);
            $("#idBtnSubmit2").show(0);                                                
            $("#idRecCodSIS").focus();
         });
      },tiempoJS);
   });
});
