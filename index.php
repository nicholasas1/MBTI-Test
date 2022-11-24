<?php
header('Expires: '.date('r'));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
include 'inc/config.php';
$sql="SELECT * FROM tbl_statements ORDER BY rand()";
$result=$db->query($sql);
$data=array();
while($row=$result->fetch_object()) $data[]=$row;
?>
<!doctype html>
<html>
  <head>
    <title>MBTI Test</title>
    <meta http-equiv="expires" content="<?php echo date('r');?>" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <link rel='stylesheet' href='css/mbti.css?<?php echo md5(date('r'));?>' />
  </head>
  <body>
    <header><h1>::Psikology Test</h1></header>
    <div id='container'>
      <div class='info-box'>
        Di bawah ini ada 60 nomor. Masing-masing nomor memiliki dua pernyataan yang bertolak belakang (PERNYATAAN 1 & 2). Pilihlah salah satu pernyataan yang paling sesuai dengan diri Anda dengan men-check pada isian pada kolom yang sudah disediakan (KOLOM PILIHAN). Anda HARUS memilih salah satu yang dominan serta mengisi semua nomor.
      </div>
      <form action='result.php' method='post'>
        <table>
          <thead>
            <tr>
              <th class='soal'>Pernyataan 1</th>
              <th colspan='2' class='soal'>Pilihan</th>
              <th class='soal'>Pernyataan 2</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($data as $d){
              echo "
                <tr>
                  <td class='right soal'>{$d->statement1}</td>
                  <td><input type='radio' name='d[{$d->id}]' value='1' required/></td>
                  <td><input type='radio' name='d[{$d->id}]' value='2' required/></td>
                  <td class='soal'>{$d->statement2}</td>
                </tr>
                   ";
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan='5'>
                <input type='submit' value='proses' class='btn'/>
               </th>
             </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </body>
</html>
