<?php
    
    echo "Olá, mundo!! <br><br>"; 

$servername = "tarefa-mysql-1"; // Or your database host
$username = "root";
$password = "senha123";
$dbname = "Playlist";

echo "Buscando as últimas músicas tocadas... <br><br>";
// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "Falha na conexão!!<br><br>";
    die("A Conexão Falhou: " . $conn->connect_error);
}
else{
    echo "Resultado:  <br>";
    $sql = "Select * FROM Musicas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        echo "<table border='1'>";
        echo "<tr><th>Música</th><th>Artista</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row ["Musica"] . "</td>";
            echo "<td>" . $row ["Artista"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "Nenhuma música encontrada...";
    }
}
echo "<br>..."
?>