$(document).ready(function () {
    //*** Verificar forma antes del submit
    $("#idFrmLogin").submit(function (e) {
        var strInput1;
        var strInput2;
        var estado = $.trim($("#estado").val());
        var form = this;
        var booOK = true;
        if (estado === "1") {
            var strActionForm = "materiasIns";
        } else {
            var strActionForm = "codigos";
        }

        $("#idBtnSubmit").hide();
        $("#idIndicadorProceso").fadeIn(800);

        e.preventDefault();

        // Verificacion del Formulario
        strInput1 = $.trim($("#idInput1").val());
        if (strInput1 === "") {
            alert("Debe introducir un c�digo de acceso.");
            $("#idInput1").focus();
            $("#idIndicadorProceso").hide(0);
            $("#idBtnSubmit").show(0);
            booOK = false;
            return false;
        }
        if (strInput1.length != 5) {
            alert("Debe ingresar un c�digo de acceso de 5 caracteres.");
            $("#idInput1").focus();
            $("#idIndicadorProceso").hide(0);
            $("#idBtnSubmit").show(0);
            booOK = false;
            return false;
        }

        strInput2 = $.trim($("#idInput2").val());
        if (strInput2 === "") {
            alert("Debe introducir un c�digo de acceso.");
            $("#idInput2").focus();
            $("#idIndicadorProceso").hide(0);
            $("#idBtnSubmit").show(0);
            booOK = false;
            return false;
        }
        if (strInput2.length != 5) {
            alert("Debe ingresar un c�digo de acceso de 5 caracteres.");
            $("#idInput2").focus();
            $("#idIndicadorProceso").hide(0);
            $("#idBtnSubmit").show(0);
            booOK = false;
            return false;
        }

        if (booOK == false) {
            return false;
        } else {
            setTimeout(function () {
                $("#idFrmLogin").attr("action", strActionForm);
                form.submit();
            }, 2000);
        }
    });
});
