<div class="panel panel-default">
     <div class="panel-body">
      <form  id="UpdateUser">
  <input type="hidden" name="id" value="{{$Usuarios->id}}">      
  <div class="form-group">
    <label for="">Nombres</label>
    <input type="text" class="form-control" id="nombres2" name='nombres' placeholder="Enter nombres" value="{{$Usuarios->nombres}}">
    </div>
  <div class="form-group">
    <label for="">Apellidos</label> 
    <input type="text" class="form-control" id="apellidos2" name='apellidos' placeholder="Enter apellidos"  value="{{$Usuarios->apellidos}}">
  </div>
  
   <div class="form-group">
    <label for="">Cedula</label>
    <input type="text" class="form-control" id="cedula2" name='cedula' placeholder="Enter cedula" value="{{$Usuarios->cedula}}" >
  </div>

  <div class="form-group">
    <label for="">Correo</label>
    <input type="text" class="form-control" id="correo2" name='correo' placeholder="Enter correo" value="{{$Usuarios->correo}}">
  </div>

  <div class="form-group">
    <label for="">Telefono</label>
    <input type="text" class="form-control" id="telefono2" name='telefono' placeholder="Enter Telefono" value="{{$Usuarios->telefono}}">
  </div>

</form>

    </div>
    </div>