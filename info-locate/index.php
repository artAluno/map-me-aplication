<!DOCTYPE html>
<html>
<head>
<?php 
  $id = $_POST['id'];
  include("../connection.php");
  $sql = "SELECT * FROM places where id=$id";
  $result = $mysqli->query($sql);
  $dado = $result->fetch_assoc();
  ?>
  <title>MapMePII</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../estilo.css">
  <link rel="stylesheet" href="../outros-estilos.css">
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css "> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}
  .w3-bar-block .w3-bar-item {padding:20px}
  hr{background-color: gray; color: gray; height: 2px;}
  </style>
</head>
<body style="background-color: white;">

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Fechar Menu</a>
  <a href="../" onclick="w3_close()" class="w3-bar-item w3-button">Pagina principal</a>
  <a href="#buscar" onclick="w3_close()" class="w3-bar-item w3-button">Baixar Rota</a>
 
</nav>

<!-- Top menu -->
<div class="w3-top">
    <div class="w3-white w3-xlarge">
      <div id="botao-menu01" class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
      <div id="cor-logo01" class="w3-center w3-padding-16"><img class="logo" src="../images/logo02.png" alt="logotipo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    </div>
  </div>
  
<!-- !PAGE CONTENT! -->
<div  id="visitar"><br></div>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px" >

  <!-- First Photo Grid-->
  <div class="w3-row w3-padding-64" id="about">
    
    <div class="w3-col m6 w3-padding-large w3-small">
    <?php 
    $img = $dado['img'];
    echo "<img src='../images/$img' class='w3-round w3-image w3-opacity-min' alt='Table Setting' width='600' height='750'>" ?>
    </div>

    <div class="w3-col m6 w3-padding-large">
      <?php
      $name = $dado['name'];
      echo"<h1 class='w3-center'>$name</h1><br>"; ?>
      
      <?php
      $desc = $dado['description'];
      echo "<h6><p class='w3-larger' style='font-size: 19px;' >$desc</p></h6>"; ?>
      <?php 
      if($dado['commercial_point'] == 1){
        $commercialPoint = 'Há um ponto comercial no local.';
      }else{
        $commercialPoint = 'Não há um ponto comercial no local.';
      }
      if($dado['trial'] == 1){
        $trial = 'O acesso ao local é somente por trilha.';
      }else{
        $trial = 'O acesso ao local pode ser feito com qualquer veiculo.';
      }
      if($dado['guide'] == 1){
        $guide = 'É aconselhado o acompanhamento de um guia para chegar ao local.';
      }else{
        $guide = 'Não é aconselhado o acompanhamento de um guia para chegar ao local.';
      }
      
      echo "<h6>$commercialPoint</h6>";
      echo "<h6>$trial</h6>";
      echo "<h6>$guide</h6>";
      ?>
      
    </div>
  </div>

  <div class="w3-row-padding w3-center">
  <?php 
  $latitude = $dado['latitude'];
  $logitude = $dado['longitude'];

  echo "<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3978.4187314718724!2d$logitude!3d$latitude!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1624481922841!5m2!1spt-BR!2sbr'
    width='100%' height='470' style='border:0;' loading='lazy'></iframe>";  
    
    echo "<a href='https://www.google.com/maps/search/?api=1&query=$latitude%2C$logitude' class='a-to-button'>
    Ver mapa em uma nova aba</a>";  
    ?>
  </div>
  <hr id="buscar">
  <div>
    <h3>Deseja ter um acesso offline ao trajeto?</h3>
    <a onclick="alertar()" class="a-to-button">Baixar a Rota</a>
    <a onclick="alertar()" class="a-to-button">Baixar o aplicativo</a>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <hr>
  </div>
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32" id="footer01" style="background-color: white;">
    <div class="w3-third">
      <h3 class="rodape">Contatos</h3>
      <p>Caso encontre um erro no sistema ou fazer um comentario para nos acesse:</p>
      <a href="#" target="_blank"><img src="../images/gmail_icon.png"
        alt="Gmail" width="50px"/></a>
      <a href="#" target="_blank"><img src="../images/insta_icon.png"
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

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
function alertar(){
  window.alert("Atencao \n No momento essa funcao esta em desenvolvimento");
}
</script>

</body>
</html>