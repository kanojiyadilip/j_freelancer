<?php
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<div class="container">
<h2>Tell us what you need done</h2>
<h5><span style="color: #808080;">Get free quotes from skilled freelancers within minutes, view profiles, ratings and portfolios and chat with them. Pay the freelancer only when you are 100% satisfied with their work</span></h5>
<form action="./default.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="inputdefault">Choose a name for your project</label> 
<input id="inputdefault" class="form-control" type="text" name="pname" />
</div>
<div class="form-group">
<label for="comment">Tell us more about your project</label> 
<textarea id="comment" class="form-control" rows="5" name="paout"></textarea>
</div>
<div class="form-group">
<label for="inputlg">What skills are required?</label>
<input id="inputlg" class="form-control" type="text" name="skills" />
</div>
<div class="form-group">
<label class="btn btn-default btn-file"> Upload File <input style="display: none;" type="file" name="data" /> </label>
</div>
<div class="form-group"><button class="btn btn-primary" type="submit">Submit</button></div>
</form>

<?php



$con = mysqli_connect('localhost','root','','jm7');
$q = "SELECT * FROM `project`";
$r = mysqli_query($con,$q);
if(mysqli_num_rows($r)>0)
{ 
	while($data = mysqli_fetch_assoc($r))
	{

			?>
		
<div class="w3-container">
 
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
     		<h6>Name Of Project</h6>
		      <?php echo $data['project_name']; ?>
	
    </header>

    <div class="w3-container">
    <h6> About Project</h6>
		     <?php echo$data['project_about']; ?>
          </div>
    <footer class="w3-container w3-blue">
      <h6>Skill</h6>
             <?php echo $data['skills']; ?>
             <label class="btn btn-default btn-file"> Bid
              <input style="display: none;" type="subimt" name="data" /> </label>
    </footer>
  </div>
</div>
</div><br><br>

     <?php
	}    
}
?>
</body>
</html>
?>