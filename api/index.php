<?php
include("../connection.php"); //Arquivo de conexão que esta na raiz do projeto, um nível acima e cria a variável $mysqli
$method = $_SERVER['REQUEST_METHOD']; //captura o método HTTP usado
$parameter = explode('/', $_SERVER['PATH_INFO']); //Usa o formato da URL e divide com /
switch($method) {
  case 'GET': //Ação referente ao método GET
      header("Access-Control-Allow-Origin: *"); //permite acesso de qualquer lugar
      header("Content-Type: application/json; charset=UTF-8"); //GET sempre retornará JSON
      header("Access-Control-Allow-Methods: OPTIONS,GET");
      if (isset($parameter[1])) { //se existir ID realiza o SELECT com WHERE (statement)
          //echo "O path_info foi: ",$parameter[1];
          //inicio
          $id = trim($parameter[1]); //trata e armazena o parâmetro
          $stmt = $mysqli->prepare("SELECT * FROM places WHERE id = ?");
          $stmt->bind_param("i", $id); //
          $stmt->execute(); //executa o statement
          $result = $stmt->get_result(); //armazena um recordset
          $count = $result->num_rows; //apenas por conveniencia, cria uma variável com a quantidade
          $stmt->close(); //fecha o stmt 
        }//fim dos if isset       
      else { //caso não exista ID, seleciona * (todos)
          //echo "entrei sem ID";
          $sql = "SELECT * FROM places"; //Usamos query com raw SQL (não tem WHERE)
          $result = $mysqli->query($sql); //executamos a query no objeto de conexão
          $count = $result->num_rows; //apenas por conveniencia, cria uma variável com a quantidade
      }//fim do else parameter (ID)
      //variáveis usadas para criar o JSON
      $locaisArr = array(); //cria um array vazio
      $locaisArr["body"] = array(); //cria um array interno vazio para receber os dados
      $locaisArr["count"] = 0; //retorna a quantidade de registros junto com os dados
      if ($count > 0) {
          $locaisArr["count"] = $count; //armazena a quantidade de registros
          while ($row = $result->fetch_assoc()) { //itera no recordset linha a linha
                $local = array( //cria um array e popula
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "description" => $row["description"],
                        "img" => $row["img"],
                        "commercial_point" => $row['commercial_point'],
                        "latitude" => $row["latitude"],
                        "longitude" => $row["longitude"],
                        "trial" => $row["trial"],
                        "guide" => $row["guide"]
                         ); //fecha o array

                array_push($locaisArr["body"], $local); //append o local no array de locais
            }//fim do while $row
          echo json_encode($locaisArr); //Aqui monta e devolve um JSON com os dados + quantidade
      } else { //else do $count > 0,  caso não tenha resultados
        //A consulta não retornou registros, devolve um array vazio com contagem ZERO!
        echo json_encode($locaisArr);
      }//fim do else count
      $mysqli->close();//fecha a conexão crida no include
    //fim da lógica do GET   
    break; //break do GET para encerrar o switch $method
  case 'POST': //Ação para POST (INSERT)
    echo json_encode("Ação Bloqueada pelos Devs do Site!");
      
    $stmt->close(); //fecha o statement
    $mysqli->close(); //fecha a conexão
    break; //break do POST para encerrar o switch method

  case 'PUT'://Ação para PUT (UPDATE);
    echo json_encode("Ação Bloqueada pelos Devs do Site!");
      
    $stmt->close(); //fecha o statement
    $mysqli->close(); //fecha a conexão
    break; //break do POST para encerrar o switch method

  case 'DELETE': //Ação para DELETE
    echo json_encode("Ação Bloqueada pelos Devs do Site!");
      
    $stmt->close(); //fecha o statement
    $mysqli->close(); //fecha a conexão
    break; //break do POST para encerrar o switch method

} //fim do switch method

?>