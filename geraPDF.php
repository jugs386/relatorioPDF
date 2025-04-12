<?php
 
require_once 'vendor/autoload.php';
 
$style = file_get_contents('style.css');
 
 
 
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetProtection(array('copy','print'),1234,4321);
$mpdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML("<h1>Tabela de preços</h1>
 
<table>
  <tr>
    <th>Serviço</th>
    <th>Tempo estimado</th>
    <th>Preço médio</th>
  </tr>
 
  <tr>
    <td>Criação de logo</td>
    <td>1 semana</td>
    <td>R$ 500,00</td>
  </tr>   
 
  <tr>
   <td>Site institucional</td>
    <td>3 semanas</td>
    <td>R$ 1200,00</td>
  </tr>
 
   <tr>
   <td>Landing page</td>
    <td>2 semanas</td>
    <td>R$ 800,00</td>
  </tr>
 
  <tr>
   <td>Mobile App</td>
    <td>6 semanas</td>
    <td>R$ 3000,00</td>
  </tr>
</table>",\Mpdf\HTMLParserMode::HTML_BODY);
 
$mpdf->Output();