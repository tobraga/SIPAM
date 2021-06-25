<?php
// Verifica se existe a variável txtnome
if (isset($_GET["txtnome"])) {
    $nome = $_GET["txtnome"];
    // Conexao com o banco de dados
    $server = "172.22.5.222";
    $user = "app.patrimonio";
    $senha = "P@tr!m0n!0";
    $base = "patrimonio_app";

    $conexao = mysql_connect($server, $user, $senha) or die("Erro na conexão!");
    mysql_select_db($base);
    // Verifica se a variável está vazia
    if (empty($nome)) {
        $sql = "SELECT * FROM app.patrimonio_old";
    } else {
        $nome .= "%";
        $sql = "SELECT numero_patrimonio, descricao, numero_serie, marca, id_localizacao FROM app.patrimonio_old RIGHT JOIN app.localizacao ON id_localizacao = localizacao.id";
    }
    sleep(1);
    $result = mysql_query($sql);
    $cont = mysql_affected_rows($conexao);
    // Verifica se a consulta retornou linhas
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table border='1'>
                    <thead>
                        <tr>
                            <th>numero_patrimonio</th>
                            <th>descricao</th>
                            <th>numero_serie</th>
                            <th>marca</th>
                            <th>id_localizacao</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = mysql_fetch_array($result)) {
            $return.= "<td>" . utf8_encode($linha["numero_patrimonio"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["descricao"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["numero_serie"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["marca"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["id_localizacao"]) . "</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>