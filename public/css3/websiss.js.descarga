   var relojID=0;

   if (window.top != window.self) {
      window.top.location.href=location.href;
   }


   function ActualizarReloj() {
      if (relojID) {
         window.clearTimeout(relojID);
         relojID=0;
      }
      //Actualizamos el reloj local
      var tDate=new Date();
      var str;
      str="";
      if (tDate.getHours()<10)
        str+="0"+tDate.getHours()+":";
      else
        str+=tDate.getHours()+":";
      if (tDate.getMinutes()<10)
        str+="0"+tDate.getMinutes()+":";
      else
        str+=tDate.getMinutes()+":";
       if (tDate.getSeconds()<10)
        str+="0"+tDate.getSeconds();
      else
        str+=tDate.getSeconds();
      hora1.innerHTML=str; 
      //Actualizamos el reloj del servidor
      hora=parseInt(hh.innerHTML);
      minutos=parseInt(mi.innerHTML);
      segundos=parseInt(ss.innerHTML);
      dia=parseInt(dd.innerHTML);
      mes=parseInt(mm.innerHTML);
      anio=parseInt(yy.innerHTML);
      var horaServidor=new Date(anio,mes,dia,hora,minutos,segundos);
      var nuevaHoraTmp2=horaServidor.getTime();
      var nuevaHoraTmp=nuevaHoraTmp2 + 60*30;
      var nuevaHora=new Date(nuevaHoraTmp);
      var str="";
      str=new String(nuevaHora.getHours());  
      hh.innerHTML=str;
      str=new String(nuevaHora.getMinutes());
      mi.innerHTML=str;
      str=new String(nuevaHora.getSeconds());
      ss.innerHTML=str;

      relojID=setTimeout("ActualizarReloj()",1000);
   }
   function IniciarReloj() {
      relojID=setTimeout("ActualizarReloj()",500);
   }
   function CerrarReloj() {
      if (relojID) {
         window.clearTimeout(relojID);
         relojID=0;
      }
   }
   function retornar() {
      history.back();
   }
   function adelantar() {
      history.forward();
   }
   function ObtenerFecha() {
      var str;
      var tmp;
      str=""
      var fecha=new Date();
      dia=fecha.getDate();
      mes=fecha.getMonth()+1;
      anio=fecha.getFullYear();
      str=dia+"/"+mes+"/"+anio;
      hora=fecha.getHours();
      if (hora<12)
         tmp="Buenos dias";
      else
         tmp="Buenas tardes";
     mensaje.innerHTML=tmp;
     fecha1.innerHTML=str;
   }
   function mensaje(msg) {
      window.status=msg;
   }  
   function trim(cadena) {
      cadena=cadena.replace(/^\s+/g,"");
      cadena=cadena.replace(/\s+$/g,"");
      return cadena;
   }
   function ventanaNueva(documento,titulo){   
      window.open(documento,titulo,'width=300, height=400, location=no,menubar=no,status=no,toolbar=no');
   }

