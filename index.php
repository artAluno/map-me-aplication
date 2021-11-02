<!DOCTYPE html>
<html>
<head>
<?php
    include("connection.php");
    $sql = "SELECT * FROM places";
    $result = $mysqli->query($sql);
  ?>
  <title>MapMepII</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="estilo.css">
  <link rel="stylesheet" href="outros-estilos.css">
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css "> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}
  .w3-bar-block .w3-bar-item {padding:20px}
  hr{background-color: gray; color: gray; height: 2px;}

  </style>
</head>
<body style="background-color:white;">

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Fechar Menu</a>
  <a href="#visitar" onclick="w3_close()" class="w3-bar-item w3-button">Sujestões de locais</a>
  <a href="#buscar" onclick="w3_close()" class="w3-bar-item w3-button">Pesquisar</a>
  <a href="#footer" onclick="w3_close()" class="w3-bar-item w3-button">Contate-nos</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
    <div class="w3-white w3-xlarge">
      <div id="botao-menu" class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
      <div id="cor-logo" class="w3-center w3-padding-16">
          <img class="logo" src="images/logo02.png" alt="logotipo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    </div>
</div>
  
<!-- !PAGE CONTENT! -->

<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px" >

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">

  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-row-padding w3-padding-16 w3-center">
        
        <div id="visitar"><br></div>
        <div class="w3-center">
            <h1>Sujestões de locias para visitar</h1>
        </div>
        <hr>
            <?php while ($dado = $result->fetch_assoc()){ ?>
                
                <div class="w3-third">
                
                <?php 
                $img = $dado['img'];
                $name = $dado['name'];
                $id = $dado['id'];?>
                <form action="info-locate/" method="POST">
                <?php echo "<input type='hidden' name='id' value='$id'>"; ?>
                <button>
                
                <?php echo "<img class='img-zoom' src='images/$img' alt='$name' style='width:90%'>";
                echo "<h3>$name</h3>";
                echo "</a>"; ?>
                <p>Click na imagem para saber mais informações, como rota,etc..</p>
                </button>
                </form>

            </div>
            <?php }  ?>
    </div>
  </div>
  
  <div  class="w3-row-padding w3-padding-16 w3-center">
    <hr id="buscar">
    <h1>Onde pretende ir ? </h1>
    <hr>
    <div style="width: 70%;margin: 0 auto;">
      <form class="example"  action="" method="POST">
        <input type="text" placeholder=" Ex: Gritador, Cachoeiria, etc. " name="search">
        <button type="submit"> <i><a href="#" target="_blank"><img src="images/lupa.png"
        alt="Instagram" width="20px"/></a></i></button>
      </form>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
  
  <hr>
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32" id="footer" style="background-color: white;">
    <div class="w3-third">
      <h3 class="rodape">Contatos</h3>
      <p>Caso encontre um erro no sistema ou fazer um comentario para nos acesse:</p>
      <a href="#" target="_blank"><img src="images/gmail_icon.png"
        alt="Gmail" width="50px"/></a>
      <a href="#" target="_blank"><img src="images/insta_icon.png"
        alt="Instagram" width="40px"/></a>
      
    </div>
  


    <div class="w3-third">
      <h3 class="rodape">Mais visitados</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Morro do Gritador</span> 
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cachoeira do Salto Liso</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Museu da Roça</span> 
      </p>
    </div>
  </footer>

</div>
</div>
<!-- End page content -->

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>