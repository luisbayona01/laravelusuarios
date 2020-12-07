<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
   
            <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Styles -->
       <link href="{{ asset('css/glyphicon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/angular.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
   <script src="{{ asset('js/main.js') }}"></script>
    


    </head>
    <body ng-app="myApp" ng-controller="myCtrl">

<div class="container">
<button class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar usuario</button>    
<div class="panel panel-default">
  <div class="panel-body">
  <div class="table-responsive"> 
 <table class="table" id="user_table">
  <thead>
   <tr> 
   <th>Nombres</th>
   <th>Apellidos</th>
   <th>Cedula</th>
   <th>Correo</th>
   <th>Telefono</th>
   <th>Direccion</th>
   <th>Editar</th>
   <th>Eliminar</th>
   </tr>   
  </thead>  
  <tbody>
     <tr ng-repeat="users in usuarios">
    <td><%users.nombres%></td>
    <td><%users.apellidos%></td>
    <td><%users.cedula%></td>
    <td><%users.correo%></td>
    <td><%users.telefono%></td>
    <td><%users.direccion%></td>
    <td><button class="btn btn-warning" ng-click="editlist(users.id)" >Editar</button></td>
    <td><button class="btn btn-danger" ng-click="delete(users.id)">Eliminar</button></td>     
     </tr> 
  </tbody>   

 </table>
</div> 
  </div>
</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <div class="panel panel-default">
    <div class="panel-body">
      <form  id="registrarUsuarios">
  <div class="form-group">
    <label for="">Nombres</label>
    <input type="text" class="form-control" id="nombres" name='nombres' placeholder="Enter nombres">
    </div>
  <div class="form-group">
    <label for="">Apellidos</label> 
    <input type="text" class="form-control" id="apellidos" name='apellidos' placeholder="Enter apellidos">
  </div>
  
   <div class="form-group">
    <label for="">Cedula</label>
    <input type="text" class="form-control" id="cedula" name='cedula' placeholder="Enter cedula">
  </div>

  <div class="form-group">
    <label for="">Correo</label>
    <input type="text" class="form-control" id="correo" name='correo' placeholder="Enter correo">
  </div>

  <div class="form-group">
    <label for="">Telefono</label>
    <input type="text" class="form-control" id="telefono" name='telefono' placeholder="Enter Telefono">
  </div>
  <div class="form-group">
    <label for="">Telefono</label>
    <input type="text" class="form-control" id="Direccion" name='direccion' placeholder="Enter direccion">
  </div>
</form>

    </div>
    </div>



      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" ng-click="AgregarUsuario()">Agregar Usuario  </button>
        
      </div>
    </div>

  </div>
</div>
        


<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body" id="contenido">
       


      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" ng-click="UpdateUsuario()">Actualizar usuario </button>
        
      </div>
    </div>

  </div>
</div>



    </body>
</html>
