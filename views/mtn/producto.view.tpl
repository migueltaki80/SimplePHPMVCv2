<h1 style="text-align: center;">Crear<span class="badge success">Producto</span></h1>
<selection>
    <div class="card row" style="width: 40rem;">
    <form method="POST" action="index.php?page=producto&mode={{mode}}&codprd={{codprd}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="codprd" value="{{codprd}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
        <label for="dscprd">Nombre del Producto: </label>
        <input type="text" name="dscprd" id="dscprd" value="{{dscprd}}" placeholder="Nombre producto"/>
        </div>
        <div>
        <label for="sdscprd">Especificación del producto: </label>
        <input type="text" name="sdscprd" id="sdscprd" value="{{sdscprd}}" placeholder="Especificacion producto"/>
        </div>
        <div>
        <label for="skuprd">Area del producto: </label>
        <input type="text" name="skuprd" id="skuprd" value="{{skuprd}}" placeholder="Numero inventario"/>
        </div>
        <div>
        <label for="bcdprd">Categoria del producto: </label>
        <input type="text" name="bcdprd" id="bcdprd" value="{{bcdprd}}" placeholder="Categoria inventario"/>
        </div>
        <div>
        <label for="stkprd">Cantidad del producto: </label>
        <input type="text" name="stkprd" id="stkprd" value="{{stkprd}}" placeholder="Cantidad producto"/>
        </div>
        <div>
        <label for="typprd">Tipo de Producto: </label>
        <select name="typprd" id="typprd">
            <option value="HOM" {{typprd_HOM}}>Hogar</option>
            <option value="ETC" {{typprd_ETC}}>Electricidad</option>
            <option value="GME" {{typprd_GME}}>Juegos</option>
            <option value="SFW" {{typprd_SFW}}>Software</option>
            <option value="OFC" {{typprd_OFC}}>Oficina</option>
            <option value="LBS" {{typprd_LBS}}>Libros</option>
            <option value="MSC" {{typprd_MSC}}>Musica</option>
        </select>
        </div>
        <div>
        <div>
        <label for="prcprd">Precio del Producto: </label>
        <input type="number" name="prcprd" id="prcprd" value="{{prcprd}}" placeholder="Precio en lempiras"/>
        </div>
        <div>
        <label for="estprd">Estado del Producto: </label>
        <select name="estprd" id="estprd">
            <option value="ACT" {{estprd_ACT}}>Activo</option>
            <option value="INA" {{estprd_INA}}>Inactivo</option>
        </select>
        </div>
        <div>
        <label for="urlprd">Direccion del imagen: </label>
        <input type="text" name="urlprd" id="urlprd" value="{{urlprd}}" placeholder="../public/imgs/"/>
        </div>
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
            location.assign("index.php?page=productos");
        });
    });
</script>