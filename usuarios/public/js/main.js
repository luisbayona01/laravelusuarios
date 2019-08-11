var app = angular.module("myApp", [], function ($interpolateProvider) {
     /*cambiando los  corchetes de angular por esto para no entrar en conflicto con los blade de laravel*/
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})

 /*  funcion javascript  para obtener  el servidor si es dev o produccion  */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var urlglobal = getAbsolutePath();
app.controller("myCtrl", function ($scope, $http) {
    $scope.ShowUser = function () {
        var url = urlglobal + "listarusuarios";
        $http.get(url)
                .then(function (response) {

                    $scope.usuarios = response.data;
                    angular.element(document).ready(function () {
                        dTable = $('#user_table')        //agregando la  paginacion  de  datables  de jquery   botstrap
                        dTable.DataTable();

                    });
                });

    }

    /*  validando que los  input  solo  acepte  enteros*/
    $('#cedula').on('input', function (e) {
        if (!/^[ 0-9]*$/i.test(this.value)) {
            alert("el campo cedula solo  permite numeros ")
            this.value = this.value.replace(/[^ 0-9]+/ig, "");
        }
    })



    $('#telefono').on('input', function (e) {
        if (!/^[ 0-9]*$/i.test(this.value)) {
            alert("el campo telefono solo permite numeros ")
            this.value = this.value.replace(/[^ 0-9]+/ig, "");
        }
    })

   /* funcion  para agregar  usuarios */
    $scope.AgregarUsuario = function () {
        /*  validndo el correo  con javascript- jquery*/
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (!regex.test($("#correo").val().trim())) {
            alert(" correo no valido");

            return  false;
        }
       
         /* validando   que   no  vaya ningun campo vacio */
        if ($("#nombres").val() == "") {
            alert('el campo nombres es requerido')
            return false;
        }
        if ($("#apellidos").val() == "") {
            alert('el campo apellidos es requerido')
            return  false;
        }
        if ($("#cedula").val() == "") {
            alert('el campo cedula  es requerido ')
            return  false;
        }
        if ($("#correo").val() == "") {
            alert('el campo correo  es requerido')
            return  false;
        }
        if ($("#telefono").val() == "") {
            alert('el campo telefono  es requerido')
            return false;
        }
  
          /* defino   dos variables  la url  y los parametros   para  enviar al ajax o http de  angular*/
        var url = urlglobal + "registraruser" // la ruta de laravel
        var parametros = $("#registrarUsuarios").serialize(); // adjunto  todos los  valores  del form 
        $http({
            method: 'POST',
            url: url,
            data: parametros, 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}  //headers para  que se resivan los datos de forma  y no en json  

            
        }).success(function (response) {
            alert(response);

            $('#registrarUsuarios')[0].reset();  // limpiar los   campos  del form
            dTable = $('#user_table') 
            var table = dTable.DataTable();
            table.destroy();  // destruyendo el table  para que  la funcion de mostrar  me renderize asincorinacamente los datos    
            $scope.ShowUser() 
        })
    }


    $scope.editlist = function (id) {


        var url = urlglobal + "editlist"
        var parametros = $.param({"id": id});  //  paso el id al  servidor  para buscar los dtaos del usuario que voy a modificar 
        $http({
            method: 'POST',
            url: url,
            data: parametros, 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}

            
        }).success(function (response) {


            $("#contenido").html(response);  //  mostrando la  vista   con los  datos a  modificar
            $("#myModal2").modal(); // mostrando  en un modal  la vista  

            $('#cedula2').on('input', function (e) {   // agregando la  validacion de  solo numeros 
                if (!/^[ 0-9]*$/i.test(this.value)) {
                    alert("el campo cedula solo permite numeros ")
                    this.value = this.value.replace(/[^ 0-9]+/ig, "");
                }
            })

            $('#telefono2').on('input', function (e) {
                if (!/^[ 0-9]*$/i.test(this.value)) {
                    alert("   el campo telefono  solo  permite numeros ")
                    this.value = this.value.replace(/[^ 0-9]+/ig, "");
                }
            })
        })


    }
      /*funcion para  modificar datos  */
    $scope.UpdateUsuario = function () {

        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (!regex.test($("#correo2").val().trim())) {
            alert(" correo no valido");

            return  false;
        }


        if ($("#nombres2").val() == "") {
            alert('el campo nombres es requerido')
            return false;
        }
        if ($("#apellidos2").val() == "") {
            alert('el campo apellidos es requerido')
            return  false;
        }
        if ($("#cedula2").val() == "") {
            alert('el campo cedula  es requerido ')
            return  false;
        }
        if ($("#correo2").val() == "") {
            alert('el campo correo  es requerido')
            return  false;
        }
        if ($("#telefono2").val() == "") {
            alert('el campo telefono  es requerido')
            return false;
        }


        var url = urlglobal + "editaruser"
        var parametros = $("#UpdateUser").serialize();
        $http({
            method: 'POST',
            url: url,
            data: parametros, //this.formData,  // pass in data as strings
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}

            // set the headers so angular passing info as form data (not request payload)
        }).success(function (response) {
            alert(response);
            dTable = $('#user_table')
            var table = dTable.DataTable();
            table.destroy();
            $scope.ShowUser();
       
        })

    }




    $scope.delete = function (id) {
         var txt;
        var url = urlglobal + "eliminaruser";
        var r = confirm("desea eliminar el registro!");   //validando   si deseo o no eliminar  el usuario 
        if (r == true) {
            var parametros = $.param({"id": id});  //si acepto me  adjunta el id 
        } else {
            txt = "";   //de lo contrario   no hace nada
            return false;
        }
        $http({
            method: 'POST',
            url: url,
            data: parametros, 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}  
        }).success(function (response) {
            alert(response);
           dTable = $('#user_table')
            var table = dTable.DataTable();
            table.destroy();
            $scope.ShowUser(); 
            
        })
       
    }





    $scope.ShowUser(); //llamando la   funcion para  mostrar los datos

})


