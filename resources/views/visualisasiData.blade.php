<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Family Tree</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Silsilah Keluarga</a>
  <button class="navbar-toggler" type="button" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{route('silsilah_keluarga.index')}}">Input Data Keluarga</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('visualisasi_data.index')}}">Visualisasi Data</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-5">
    <center><h1>Struktur Keluarga</h1></center>

    <div id="chart_div"></div>
</div>

<script>
google.charts.load('current', {packages:["orgchart"]});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Name');
  data.addColumn('string', 'Parent');
  data.addColumn('string', 'ToolTip');
  data.addRows([
    @foreach ($familyTree as $person)
        @if (!$person->id_orang_tua)
            ["{{ $person->nama }}", null, ""],
        @endif
        @foreach ($person->children as $child)
            ["{{ $child->nama }}", "{{ $person->nama }}", ""],
            @foreach ($child->children as $grandchild)
                ["{{ $grandchild->nama }}", "{{ $child->nama}}", ""],
            @endforeach
        @endforeach
    @endforeach
  ]);

  var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
  chart.draw(data, {allowHtml:true});
}
</script>

</body>
</html>
