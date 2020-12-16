<h1 style="text-align: center;">Cuenta<span class="badge success">Nueva</span></h1>
<selection>
    <div class="card row" style="width: 40rem;">
    <form method="POST" action="index.php?page=newclient">
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
        <label for="username">Nombre de usuario: </label>
        <input type="text" name="username" id="username" value="{{username}}" placeholder="Nombre usuario"/>
        </div>
        <div>
        <label for="userpswd">Contraseña: </label>
        <input type="password" name="userpswd" id="userpswd" value="{{userpswd}}" placeholder="Contraseña"/>
        </div>
        <div>
        <label for="nombre_user">Nombre del Cliente: </label>
        <input type="text" name="nombre_user" id="nombre_user" value="{{nombre_user}}" placeholder="Nombre Cliente"/>
        </div>
        <div>
        <label for="apellido_user">Apellido del Cliente: </label>
        <input type="text" name="apellido_user" id="apellido_user" value="{{apellido_user}}" placeholder="Apellido Cliente"/>
        </div>
        <div>
        <label for="numero_identidad_user">Numero de Identidad: </label>
        <input type="text" maxlength="13" name="numero_identidad_user" id="numero_identidad_user" value="{{numero_identidad_user}}" placeholder="Identidad o pasaporte"/>
        </div>
        <div>
        <label for="fecha_nacimiento_user">Fecha de Nacimiento: </label>
        <input type="date" name="fecha_nacimiento_user" id="fecha_nacimiento_user" value="{{fecha_nacimiento_user}}"/>
        </div>
        <div>
        <label for="direccion_residencia_user">Direccion: </label>
        <input type="text" name="direccion_residencia_user" id="direccion_residencia_user" value="{{direccion_residencia_user}}" placeholder="Direccion"/>
        </div>
        <div>
        <label for="ciudad_user">Ciudad </label>
        <input type="text" name="ciudad_user" id="ciudad_user" value="{{ciudad_user}}" placeholder="Ciudad"/>
        </div>
        <div>
        <label for="clientgender">Genero: </label>
        <input type="text" maxlength="3" name="sexo_user" id="sexo_user" value="{{sexo_user}}" placeholder="Genero(MAS o FEM)"/>
        </div>
        <div>
        <label for="telefono_user1">Telefono 1: </label>
        <input type="text" maxlength="8" name="telefono_user1" id="telefono_user1" value="{{telefono_user1}}" placeholder="Telefono 1"/>
        </div>
        <div>
        <label for="telefono_user2">Telefono 2: </label>
        <input type="text" maxlength="8" name="telefono_user2" id="telefono_user2" value="{{telefono_user2}}" placeholder="Telefono 2"/>
        </div>
        <div>
        <label for="email_user">Correo: </label>
        <input type="text" name="email_user" id="email_user" value="{{email_user}}" placeholder="Correo Electronico"/>
        </div>
        <div>
    <div class="row">
    <button class="btn-success" id="btnsubmit" name="btnsubmit" type="submit">Enviar</button>
    <button class="btn-danger" id="btncancelar">Cancelar</button>
    </div>
    </form>
</div>
</selection>
<script>
    $().ready(function(){
        $("#btncancelar").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=home");
        });
    });
</script>
