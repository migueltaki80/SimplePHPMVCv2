<header>
    <h1 class="center">Bienvenido {{userScreenName}}</h1>
  </header>
    <section class="cards row">
    {{foreach productos}}
    <section class="container-sm col-md-3 m-padding">
      <div class="card col-12 depth-2 m-padding">
        <span class="col-sm-12 center depth-1">
          {{if urlprd}}
          <img src="{{urlprd}}" alt="{{skuprd}} {{dscprd}}" class="imgthumb center" />
          {{endif urlprd}}
        </span>
        <span class="col-12 center depth-1 m-padding card-desc">
          <span class="card-side bg2">{{skuprd}}</span>
          <span class="col-12">{{dscprd}}</span>
        </span>
        <span class="col-12 center depth-1 m-padding">
          <span class="col-6 m-padding">Disponibles</span>
          <span class="col-6 right m-padding">{{stkprd}}</span>
          <span class="col-12 bold center m-padding">
            <a href="index.php?page=addtocart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart">
              L {{prcprd}} <span class="ion-plus-circled"></span>
            </a>
          </span>
        </span>
      </div>
    </section>
    {{endfor productos}}
  </section>
  <script>
    $().ready(function () {
      $(".sendToCart").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $.post(
          $(this).attr("href"),
          function (data, success, xqXML) {
            console.log(data);
            if (data.cartAmount && data.cartAmount > 0) {
              window.location.reload();
            }
          }
        );
      });
    });
  </script>
  <style>
    .card {
      position: relative;
    }
    .card-desc {
      height: 4em;
      overflow: scroll;
    }
    .card-side {
      position: absolute;
      top: 6em;
      left: 1em;
      transform-origin: left top;
      transform: rotate(-90deg);
    }
    .bg2{
      background-color: #673AB7;
      color: #fff;
      border-radius: 2em;
      padding: 0.5em;
    }
    .center{
      text-align: center ;
    }
  </style>