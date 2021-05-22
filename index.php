<?php
/*define('SERVER_DOCUMENT_ROOT', 'Z:\\');
define('MY_FOLDER', SERVER_DOCUMENT_ROOT . '');*/
define('SERVER_DOCUMENT_ROOT', 'C:\\xampp\\');
define('MY_FOLDER', SERVER_DOCUMENT_ROOT . 'apache');

$folders = read_folder(MY_FOLDER);

function read_folder($folder){
    $files = scandir($folder);
    $files = array_diff($files, array('.', '..'));
}

?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>IHNCA-UCA</title>
  <meta name="description" content="UCA/IHNCA">
  <meta name="author" content="SitePoint">
  <script src="js/jquery.min.js"></script>
  <script src="js/actions.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Directorio NAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="container-fluid" style="margin-top:80px;">
      <div class="form-floating mb-3">
        <label for="floatingInput">Directorio Actual</label>
        <input type="email" class="form-control" id="floatingInput" placeholder="" readonly>
      </div>
        <button type="button" id="home" class="btn btn-primary btn-lg">Inicio</button>
        <button type="button" id="back" class="btn btn-primary btn-lg">Atras</button>
        <button type="button" id="download" class="btn btn-primary btn-lg">Descargar lista</button>
        <br>
        <br>
        <div id="list">
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>

<script>
var maindir = "<?php echo base64_encode(MY_FOLDER); ?>";
</script>