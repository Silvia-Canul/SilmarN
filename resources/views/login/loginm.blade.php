<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="css/log.css">
  <link rel="stylesheet" type="text/css" href="css/materialize.css">
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
  <link  href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body ng-app="mainModule" ng-controller="mainController" style="background-color: #FDFD96;">
<div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form validate-form" action="{{url('validar')}}" method="POST">
      {{ csrf_field() }}

          <h5>
             <center><b>Ingresa los datos para continuar</b></center>
          </h5>
           

        <div class="row">
        </div>

       <div class="row">
         <div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
          <div class="input-field col s12">
             <i class="material-icons prefix">account_circle</i>
            <input name="nick" type="text">
            <label for="nick">Usuario</label> 
          </div>
         </div>
        </div>

        <div class="row">
         <div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
          <div class="input-field col s12">
             <i class="material-icons prefix">lock_outline</i>
            <input name="password" type="password">
            <label for="password">Contraseña</label> 
          </div>
         </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me">
              <label for="remember-me">Remember me</label>
          </div>
        </div>

        
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12">Ingresar</button>
          </div>
        </div>
        <!-- <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="#">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="#">Forgot password?</a></p>
          </div>          
        </div> -->

      </form>
    </div>
  </div>



    <script src="js/log.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
</body> 
</html>
