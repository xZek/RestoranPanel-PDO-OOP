
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">İÇERİK DÜZENLE</h6>
            </div>

            <div class="card-body">



<?php
   require "../ajax/error/errormsg.php";
$query = $db->query("SELECT * FROM icerikler WHERE urun_id=$ID", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
foreach( $query as $row ){



        echo "<form method='post'>";
        echo "<center><img src='".$row['urun_img1']."' height='200' width='200'></center>";

        echo "<br><input type='hidden' name='id' value='".$ID."'>
        <div class='input-group mb-3'>
             <div class='input-group-prepend'>
             <span class='input-group-text' id='basic-addon1'> @ İçerik Adi : </span>
             </div>
             <input type='text' name='icerik_adi' class='form-control' value='".$row['urun_adi']."'>
             </div>";
         echo "<div class='input-group mb-3'>
               <div class='input-group-prepend'>
               <span class='input-group-text' id='basic-addon1'> @ Ürün Fiyatı : </span>
               </div>
               <input type='text' name='icerik_fiyati' class='form-control' value='".$row['urun_fiyati']."'>
               </div>";

          echo '
           <center> <label for="kategori">Kategori : </label>

                    <center>
                      <select name="urunKategoriID">
                        <option value="'.$row['urun_categoryID'].'">Seciniz</option>';
                        $Urun->Get_Category();
                        echo '</select><center><br>';
                        echo "<td><button class='btn btn-success' name='edit' type='submit'><i class='fas fa-save'></i> KAYDET</button></td>
                              <td><button class='btn btn-danger' name='delete' type='submit'><i class='fas fa-trash'> </i> İÇERİĞİ SİL</button></td>
                              </div>
                            </form>
                          </div>";

           }
         }
?>
