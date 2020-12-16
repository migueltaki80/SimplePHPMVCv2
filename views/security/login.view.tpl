<section class="row">
  <form id="formLogin" action="index.php?page=login" method="POST" class="card row" style="width: 40rem;">
    <h1 style="text-align: center;">Inicio de Sesión</h1>
    <input name="returnto" value="{{returnto}}" type="hidden" />
    <input name="tocken" value="{{tocken}}" type="hidden"/>
    <div class="row">
      <label class="col-md-5" for="txtEmail" >Correo Electrónico</label>
      <input class="col-md-7" type="text" name="txtEmail" id="txtEmail" value="{{txtEmail}}"  />
    </div>
    <div class="row">
      <label class="col-md-5" for="txtPswd">Contraseña</label>
      <input class="col-md-7" type="password" name="txtPswd" id="txtPswd" value=""  />
    </div><br/>
    <div class="row">
      <button class="col-md-12 btn-success" id="btnSend"><span class="ion-log-in"></span>&nbsp;Iniciar Sesión</button>
    </div>
    <div>
      <a href="index.php?page=newclient">Registrate Ya!!</a>
    </div>
    {{if showerrors}}
        <div class="alert alert-danger">
          <ul style="margin-bottom:1em !important;">
            {{foreach errors}}
              <li>
                {{this}}
              </li>
            {{endfor errors}}
          </ul>
        </div>
    {{endif showerrors}}
  </form>
</section>
<script>
  $().ready(
    function(){
      $("#btnSend").click(function(e){
          e.preventDefault();
          e.stopPropagation();
          $("#formLogin").submit();
        });
    }
    );
</script>
