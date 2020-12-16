<section><h1>Productos</h1></section>
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
                    Descripcion
                </th> 
                <th>
                    Cantidad
                </th> 
                <th>
                    Precio
                </th> 
                <th>
                    Estado
                </th> 
                <th>
                    <a class="btn depth-1 s-margin" href="index.php?page=producto&mode=INS&codprd=0">
                    <span class="ion-plus-circled"> </span>
                    </a>
                </th>                   
            </tr>
        </thead>
        <tbody>
            {{foreach productos}}
             <tr>
                <td>
                    {{codprd}}
                </td>
                <td>
                    {{dscprd}}
                </td>   
                <td>
                    {{sdscprd}}
                </td>  
                <td>
                    {{stkprd}}
                </td>  
                <td>
                    {{prcprd}}
                </td> 
                <td>
                    {{estprd}}
                </td>  
                <td class="center">
                    <a class="btn depth-1 s-margin" href="index.php?page=producto&mode=UPD&codprd={{codprd}}">
                    <span class="ion-edit"> </span>
                    </a> &nbsp;
                    <a class="btn depth-1 s-margin" href="index.php?page=producto&mode=DSP&codprd={{codprd}}">
                    <span class="ion-eye"> </span>
                    </a>&nbsp;
                    <a class="btn depth-1 s-margin" href="index.php?page=producto&mode=DEL&codprd={{codprd}}">
                    <span class="ion-trash-a"> </span>
                    </a>
                </td>             
            </tr>
            {{endfor productos}}
            </tbody>
            <tfoot>              
        </tfoot>
    </table>
</section>