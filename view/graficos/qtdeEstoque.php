
<?php



   $c = new conectar();
   $conexao=$c->conexao();

   $sql="SELECT id_produto, nome, quantidade from produtos";
   $result=mysqli_query($conexao,$sql);
     
   $mostrar = mysqli_fetch_all($result);

  

	

	

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Quantidade", { role: "style" } ],

        <?php foreach($mostrar as $mostra){ ?>
          ["<?php echo $mostra[1]; ?>", <?php echo $mostra[2]; ?>, "#b87333"],
        <?php }?>
       
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Quantidade de produtos em estoque",
        width: 800,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 100%; height: 400px;"></div>