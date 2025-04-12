<?php
require_once 'vendor/autoload.php';
 
$host = 'localhost';
$dbname = 'biblioteca';
$dbuser = 'root';
$dbpass = 'HORTETEC_115';

try{

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$dbuser,$dbpass);

    $query = "select titulo, autor, ano_publicacao, resumo from livro";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $mpdf = new \Mpdf\Mpdf();

    $html = '<H1>Biblioteca - Lista de livros</H1>
    <table>
        <tr>
            <td>Título</td>
            <td>Autor</td>
            <td>Ano de Publicação</td>
            <td>Resumo</td>
        </tr>';

        foreach ($livros as $livro) {
            $html .= '<tr>
            <td>'.htmlspecialchars($livro['titulo']).'</td>
            <td>'.htmlspecialchars($livro['autor']).'</td>
            <td>'.htmlspecialchars($livro['ano_publicacao']).'</td>
            <td>'.htmlspecialchars($livro['resumo']).'</td>
        </tr>';
        }
        
    $html .= '</table>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('lista_livros.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    //$mpdf->Output();

}catch(PDOException $e ){
    echo "Erro na conexão do banco de dados".$e->getMessage();

}catch(\Mpdf\MpdfException $e ){
    echo "Erro ao gerar o PDF".$e->getMessage();

}
?>
H1{Biblioteca - Lista de livros}