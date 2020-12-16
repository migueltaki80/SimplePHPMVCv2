<section><h1>Usuarios</h1></section>
<section>
    <table>
        <thead>
            <tr>
                <th>
                    Codigo
                </th>
                <th>
                    Nombre 
                </th> 
                <th>
                    Apellido
                </th> 
                <th>
                    Identidad
                </th> 
                <th>
                    Correo Electronico
                </th> 
                <th>
                    Tipo de Usuario
                </th> 
                <th>
                    Estado
                </th> 
                <th>
                    Acciones
                </th>                   
            </tr>
        </thead>
        <tbody>
            {{foreach usuarios}}
             <tr>
                <td>
                    {{usercod}}
                </td>
                <td>
                    {{nombre_user}}
                </td>   
                <td>
                    {{apellido_user}}
                </td>  
                <td>
                    {{numero_identidad_user}}
                </td>  
                <td>
                    {{email_user}}
                </td> 
                <td>
                    {{usertipo}}
                </td>  
                <td>
                    {{userest}}
                </td>  
                <td class="center">
                    <a class="btn depth-1 s-margin" href="index.php?page=usuario&mode=UPD&usercod={{usercod}}">
                    <span class="ion-edit"> </span>
                    </a> &nbsp;
                    <a class="btn depth-1 s-margin" href="index.php?page=usuario&mode=DSP&usercod={{usercod}}">
                    <span class="ion-eye"> </span>
                    </a>&nbsp;
                    <a class="btn depth-1 s-margin" href="index.php?page=usuario&mode=DEL&usercod={{usercod}}">
                    <span class="ion-trash-a"> </span>
                    </a>
                </td>             
            </tr>
            {{endfor usuarios}}
            </tbody>
            <tfoot>              
        </tfoot>
    </table>
</section>