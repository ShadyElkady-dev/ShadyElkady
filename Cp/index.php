<html>
<head>
	<title>
		CPANEL MASS CREATOR BY SHADY ELKADY
	</title>
<link rel="shortcut icon" href="data/super-man-2329991_960_720.png" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="app.js"></script>
</head>
<style type="text/css">
	body{

	}


</style>

<body>
		<div class="wrapper">

	<div class="container-fluid">
			<br>
			<br>
		<div class="row">

		<div class="col-lg-7">
			<input id="info" type="text" style="width:440px;" placeholder="ip|user|pass|package"class="form-control" name="">
		</div>
		<div class="col-lg-6">
					<Br>

			<textarea id="lista" placeholder="domains"style="width:440px;height: 190px;"class="form-control"></textarea>
		</div>
				<div class="col-lg-5">
					<div class="alert alert-info text-left">
					    THIS SCRIPT MADE BY SHADY ELKADY
						<br>
						<br>
						Created : <zpy id="created"class="badge badge-success">0</zpy>
						<br>
						============
						<br>
						Invalid : <zpy id="invalid" class="badge badge-danger">0</zpy>
						<br>
						============
						<br>
						Total : <zpy id="total" class="badge badge-info">0</zpy>
						<br>
						============
						<br>
						Status :  <zpy  id="status" class="badge badge-primary">Info</zpy>
						<Br>
						============
						<br>
						<button onclick="start();" class="btn btn-primary">Start Create</button>
						<br>
						============

									<br>
			<button onclick="CopyToClipboard('successBox');" class="btn btn-success">Copy Created</button>
			<br>
			============

						<br>

						<button onclick="CopyToClipboard('invalidBox');" class="btn btn-danger">Copy Invalid</button>
					</div>
</div>

	</div> <!--  End Row !-->
	<br><br>
	<div class="row">

						<div id="pzy" class="col-lg-5">
<div class="card border border-success">
	<div class="card-header">
		Created
	</div>
	<div id="successBox" class="card-body">
	</div>
</div>
		</div>
					<div id="twz"class="col-lg-5">
<div class="card border border-danger">
	<div class="card-header">
		Invalid [Errors]
	</div>
	<div id="invalidBox" class="card-body">
	</div>
</div>
		</div>

	</div>
	</div>
</div>
</div>
</body>

</html>

<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cpanels Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div  id="content" class="modal-body">

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>