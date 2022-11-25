<?php
header('Expires: '.date('r'));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
if(isset($_POST['d'])){
  $a=$b=array();
  for($i=1;$i<=60;$i++){
    $a[$i]=isset($_POST['d'][$i]) && $_POST['d'][$i]==1?1:0;
    $b[$i]=isset($_POST['d'][$i]) && $_POST['d'][$i]==2?1:0;
  }
  $I=($b[60]+$b[52]+$a[45]+$a[38]+$b[35]+$a[31]+$a[29]+$b[28]+$a[20]+$a[15]+$a[11]+$a[10]+$b[7]+$b[5]+$a[2])/15;
  $E=($a[60]+$a[52]+$b[45]+$b[38]+$a[35]+$b[31]+$b[29]+$a[28]+$b[20]+$b[15]+$b[11]+$b[10]+$a[7]+$a[5]+$b[2])/15;
  $S=($a[53]+$a[51]+$a[46]+$a[43]+$a[41]+$a[36]+$a[34]+$a[27]+$a[25]+$b[22]+$b[18]+$a[16]+$a[13]+$a[8]+$b[6])/15;
  $N=($b[53]+$b[51]+$b[46]+$b[43]+$b[41]+$b[36]+$b[34]+$b[27]+$b[25]+$a[22]+$a[18]+$b[16]+$b[13]+$b[8]+$a[6])/15;
  $T=($a[58]+$a[57]+$a[55]+$b[49]+$a[48]+$a[42]+$b[39]+$a[37]+$a[23]+$b[32]+$a[30]+$a[17]+$b[9]+$a[4]+$a[14])/15;
  $F=($b[58]+$b[57]+$b[55]+$a[49]+$b[48]+$b[42]+$a[39]+$b[37]+$b[23]+$a[32]+$b[30]+$b[17]+$a[9]+$b[4]+$b[14])/15;
  $J=($b[59]+$a[56]+$a[54]+$b[50]+$a[47]+$b[44]+$b[40]+$b[33]+$b[26]+$a[24]+$b[21]+$a[19]+$b[12]+$a[3]+$b[1])/15;
  $P=($a[59]+$b[56]+$b[54]+$a[50]+$b[47]+$a[44]+$a[40]+$a[33]+$a[26]+$b[24]+$a[21]+$b[19]+$a[12]+$b[3]+$a[1])/15;
  $resultStr=($I>$E?'I':'E').($S>$N?'S':'N').($T>$F?'T':'F').($J>$P?'J':'P');
  include 'inc/config.php';
  $sql="SELECT * FROM tbl_interprestation WHERE symbol='{$resultStr}' ";
  $result=$db->query($sql);
  $data=$result->fetch_object();
?>
<!doctype html>
<html>
  <head>
    <title>MBTI Result</title>
    <meta http-equiv="expires" content="<?php echo date('r');?>" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <link rel='stylesheet' href='css/mbti.css?<?php echo md5(date('r'));?>' />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <header><h1>:: PAPS Test Result</h1></header>
    <div class='container' style="font-size: 35px;">
      <form action="insert.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group" style="display: none;">
          <label for="exampleInputPassword1">Password</label>
          <input type="text" name="hasil" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $data->symbol;?>">
        </div>
        <button type="submit" value="Submit"  class="btn btn-primary">Submit</button>
      </form>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>

<?php
}
