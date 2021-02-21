
<?php



$c = new conectar();
$conexao=$c->conexao();

$sql2="SELECT p.id_produto, p.nome, p.quantidade, count(p.quantidade) as vendas, v.dataCompra from produtos p
            inner join vendas v on p.id_produto = v.id_produto
            WHERE dataCompra between '2021-2-20' and '2021-2-21' and v.id_produto = '5'";

$result2 = mysqli_query($conexao,$sql2);  
$mostrar2 = mysqli_fetch_all($result2);

echo "<pre>";
print_r($mostrar2);

echo count($mostrar2[0]);
echo "</pre>";


$mostrar=mysqli_fetch_row($result);

			$dados=array(
					"id_produto" => $mostrar[0],
					"nome" => $mostrar[1],
					"quantidade" => $mostrar[2],
				);


 

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Vendas", { role: "style" } ],

        <?php 
            
                foreach($mostrar2[0] as $mostra){  ?>
                    ["<?= $mostra[2]; ?>", <?= $mostra[3]; ?>, "#b87333"],
                <?php }
           
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Média de vendas do produto".<?= $nome ?>,
        width: 800,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values2" style="width: 100%; height: 400px;"></div>