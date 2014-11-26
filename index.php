<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="An application to manage a database of grad brothers that owe debt in the Rho Phi Chapter">
		<meta name="author" content="Tyler Rockwood">
		<link rel="icon" href="favicon.ico">

		<title>FIJI Finance</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			textarea {
				resize: none;
			}
		</style>
	</head>

	<body>
		<!-- navbar -->
		s
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Finance Grad App</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="http://software.tylerrockwood.com">Home</a>
						</li>
						<li>
							<a href="javascript:void(0);" data-target="#addGrad" data-toggle="modal">Add Graduate</a>
						</li>
						<li>
							<a href="mailto:trockwood@rosefiji.com">Help</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container">

			<div style="padding-top: 50px">
				<!-- Table of grads in DB -->
				<h1>Graduate Brothers Database</h1>
				<?php
				require_once 'db_connect.php';
				$rs = mysqli_query($conn, "select * from grads");
				echo '<table class="table table-hover">';
				echo '<tr><th>Name</th><th>Email</th><th>Day</th><th>Message</th><th/><th/></tr>';
				while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC)) {
					echo '<tr><form role="form" method="post" action="updateGrad.php"><td>' . $row['name'] . '</td><td><input type="email" class="form-control" name="email" value=' . $row['email'] . 
					'></td><td><input type="number" class="form-control" name="day" value=' . $row['day'] . '></td><td><textarea rows="3" class="form-control" name="message">' . 
					$row['message'] . "</textarea></td><td><input type='hidden' name='name' value='". $row['name'] ."'><button type='submit' class='btn btn-default'>Update</button></td></form>" . 
					'<td><form role="form" method="post" action="deleteGrad.php"><input type="hidden" name="name" value="'. $row['name'] .'"><button type="submit" class="btn btn-default">Delete</button></form></td></tr>';
				}
				mysqli_free_result($rs);
				mysqli_close($conn);
				?>
				</table>
				<div class="small" style="margin-left: auto; margin-right: auto; text-align: center;">
					<small>You can only update one graduate at a time.</small>
				</div>
			</div>

		</div>

		<!-- Modal for adding grads -->
		<div class="modal fade" id="addGrad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Add a Graduate Brother</h4>
					</div>
					<form role="form" method="post" action="addGrad.php" class="form-horizontal">
						<div class="modal-body" style="width: 90%; margin-left: auto; margin-right: auto;">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="day">Day</label>
								<select class="form-control" id="day" name="day">
									<?php
									for ($i = 1; $i < 31; $i++) {
										echo "<option value='" . $i . "'>" . $i . "</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="message">Message</label>
								<textarea rows="3" class="form-control" id="message" name="message" placeholder="Enter message"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-primary">
								Add Grad
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
