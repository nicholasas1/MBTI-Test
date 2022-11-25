<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
		<?php
        include 'inc/config.php';
		
		// Taking all 5 values from the form data(input)
		$email = $_REQUEST['email'];
        $hasil = $_REQUEST['hasil'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO hasil_psikotest VALUES (null,
			'$email','$hasil')";
		
		if(mysqli_query($db, $sql)){
            $status = "Success";
            $note = "Kamu bisa menutup tes ini sekarang";
        
		} else{
            $status = "Error";
            $note = "Tanyakan pada panitia untuk membantu masalah mu";
		}
		
		// Close connection
		mysqli_close($db);
		?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1><?php echo $status ?></h1> 
        <p><?php echo $note ?></p>
      </div>
    </body>
</html>
</body>

</html>
