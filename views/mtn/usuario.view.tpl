<h1>{{modedsc}}</h1>
<selection>
    <form method="POST" action="index.php?page=usuario&mode={{mode}}&usercod={{usercod}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="usercod" value="{{usercod}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
        <label for="username">usuario: </label>
        <input {{readonly}} type="text" name="username" id="username" value="{{username}}" placeholder="Usuario"/>
        </div>
        <div>
        <label for="nombre_user">Nombre del Usuario: </label>
        <input {{readonly}} type="text" name="nombre_user" id="nombre_user" value="{{nombre_user}}" placeholder="Nombre del Usaurio"/>
        </div>
        <div>
        <label for="apellido_user">Apellido del Usuario: </label>
        <input {{readonly}} type="text" name="apellido_user" id="apellido_user" value="{{apellido_user}}" placeholder="Apellido Usuario"/>
        </div>
        <div>
        <label for="fecha_nacimiento_user">Fecha de Nacimiento: </label>
        <input {{readonly}} type="date" name="fecha_nacimiento_user" id="fecha_nacimiento_user" value="{{fecha_nacimiento_user}}"/>
        </div>
        <div>
        <label for="numero_identidad_user">Identidad: </label>
        <input {{readonly}} type="text" name="numero_identidad_user" id="numero_identidad_user" value="{{numero_identidad_user}}" placeholder="Identidad"/>
        </div>
        <div>
        <label for="direccion_residencia_user">Direccion: </label>
        <input {{readonly}} type="text" name="direccion_residencia_user" id="direccion_residencia_user" value="{{direccion_residencia_user}}" placeholder="Direccion"/>
        </div>
        <div>
        <label for="telefono_user1">Telefono 1: </label>
        <input {{readonly}} type="text" name="telefono_user1" id="telefono_user1" value="{{telefono_user1}}" placeholder="Telefono 1"/>
        </div>
        <div>
        <label for="telefono_user2">Telefono 2: </label>
        <input {{readonly}} type="text" name="telefono_user2" id="telefono_user2" value="{{telefono_user2}}" placeholder="Telefono 2"/>
        </div>
        <div>
        <label for="email_user">Correo Electronico: </label>
        <input {{readonly}} type="text" name="email_user" id="email_user" value="{{email_user}}" placeholder="Correo Electronico"/>
        </div>
        <div>
        <label for="ciudad_user">Ciudad: </label>
        <input {{readonly}} type="text" name="ciudad_user" id="ciudad_user" value="{{ciudad_user}}" placeholder="Correo Electronico"/>
        </div>
        <div>
        <label for="sexo_user">Genero: </label>
        <select name="sexo_user" id="sexo_user" {{readonly}}>
            <option value="FEM" {{sexo_user_FEM}}>Femenino</option>
            <option value="MAS" {{sexo_user_MAS}}>Masculino</option>
        </select>
        </div>
        <div>
        <label for="userest">Estado: </label>
        <select name="userest" id="userest" {{readonly}}>
            <option value="ACT" {{estado_user_ACT}}>Activo</option>
            <option value="INA" {{estado_user_INA}}>Inactivo</option>
        </select>
        </div>
        <div>
        <label for="usertipo">Tipo Usuario: </label>
        <select name="usertipo" id="usertipo" {{readonly}}>
            <option value="ACT" {{tipo_user_SYN}}>Normal</option>
            <option value="INA" {{tipo_user_ADM}}>Administrador</option>
            <option value="INA" {{tipo_user_CLT}}>Cliente</option>
        </select>
        </div>
        {{if deletemsg}}
            <div class="alert">
                {{deletemsg}}
            </div>
        {{endif deletemsg}}
    <button id="btnsubmit" name="btnsubmit" type="submit">Enviar</button>
    <button id="btncancelar">Cancelar</button>
    </form>
</selection>
<script>
    $().ready(function(){
        $("#btncancelar").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=usuarios");
        });
    });
</script>