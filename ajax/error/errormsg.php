<?php


 // JS ERROR OR COMPLETE MSG
  if($basariBTN_Timer == true)
       {
         echo "<script type='text/javascript'>";
         echo "Swal.fire({
                   icon: 'success',
                   showConfirmButton: false,
                   timer: 1500,
                   title: ";
                   echo "'$message'";
                   echo "

                 }

               )";
     echo "</script>";

       }
       if($basariBTN == true)
            {
              echo "<script type='text/javascript'>";
              echo "Swal.fire({
                        icon: 'success',
                        title: ";
                        echo "'$message',";
                        echo "

                      }

                    )";
          echo "</script>";

            }
   if($hataBTN_Timer == true)
        {
          echo "<script type='text/javascript'>";
          echo "Swal.fire({
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                    title: ";
                    echo "'.$message.',";
                    echo "

                  }

                )";
      echo "</script>";

            }
            if($hataBTN == true)
                 {
                   echo "<script type='text/javascript'>";
                   echo "Swal.fire({
                             icon: 'error',
                             title: ";
                             echo "'$message',";
                             echo "

                           }

                         )";
               echo "</script>";
          }




 ?>
