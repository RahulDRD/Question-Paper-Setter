<?php
    $ex=isset($_POST['ex']) ? trim($_POST['ex']) : '';
    $sem=isset($_POST['sem']) ? trim($_POST['sem']) : '';
    $sub=isset($_POST['sub']) ? trim($_POST['sub']) : '';
    $dep=isset($_POST['dep']) ? trim($_POST['dep']) : '';
        $unit1o=array();
        $unit2o=array();
        $unit3o=array();
        $unit4o=array();
        $unit5o=array();
        $unit14o=array();
        $unit24o=array();
        $unit34o=array();
        $unit44o=array();
        $unit54o=array();

         $con=mysqli_connect('localhost','root','','bit');
         // normalize subject by trimming to avoid mismatch due to spaces/case
         $safeDep = preg_replace('/[^A-Za-z0-9_]/','',$dep);
         $safeSub = mysqli_real_escape_string($con, $sub);
         $q1="select * from `$safeDep` where unit=1 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=8";
            $ch1=mysqli_query($con,$q1);
            $q2="select * from `$safeDep` where unit=2 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=8";
            $ch2=mysqli_query($con,$q2);
           
         $q3="select * from `$safeDep` where unit=3 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=8";
         $ch3=mysqli_query($con,$q3);
         $q4="select * from `$safeDep` where unit=4 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=8";
         $ch4=mysqli_query($con,$q4);
         $q5="select * from `$safeDep` where unit=5 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=8";
         $ch5=mysqli_query($con,$q5);

        //  4 marks question

        $q6="select * from `$safeDep` where unit=1 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=4";
        $ch6=mysqli_query($con,$q6);
        $q7="select * from `$safeDep` where unit=2 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=4";
        $ch7=mysqli_query($con,$q7);
       
    $q8="select * from `$safeDep` where unit=3 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=4";
     $ch8=mysqli_query($con,$q8);
    $q9="select * from `$safeDep` where unit=4 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=4";
     $ch9=mysqli_query($con,$q9);
    $q10="select * from `$safeDep` where unit=5 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub')) AND marks=4";
     $ch10=mysqli_query($con,$q10);



         while($unit1 = mysqli_fetch_array($ch1))
         {
            
         $unit1o[]=$unit1['question'];
         
         }
         while($unit2 = mysqli_fetch_array($ch2))
             {
                 $unit2o[]=$unit2['question'];
             }
             while($unit3 = mysqli_fetch_array($ch3))
             {
                 $unit3o[]=$unit3['question'];
             }
             while($unit4 = mysqli_fetch_array($ch4))
             {
                 $unit4o[]=$unit4['question'];
             }
             while($unit5 = mysqli_fetch_array($ch5))
             {
                 $unit5o[]=$unit5['question'];
             }

             while($unit14 = mysqli_fetch_array($ch6))
             {
                
             $unit14o[]=$unit14['question'];
             
             }
             while($unit24 = mysqli_fetch_array($ch7))
                 {
                     $unit24o[]=$unit24['question'];
                 }
                 while($unit34 = mysqli_fetch_array($ch8))
                 {
                     $unit34o[]=$unit34['question'];
                 }
                 while($unit44 = mysqli_fetch_array($ch9))
                 {
                     $unit44o[]=$unit44['question'];
                 }
                 while($unit54 = mysqli_fetch_array($ch10))
                 {
                     $unit54o[]=$unit54['question'];
                 }
         if($ex=='CT-1')
         {
            
           
                echo"
             
                <table id='dummy_table' class='table  text-center mt-2 shadow-lg p-3 mb-5 bg-white rounded' >
                <tr>
                    <th colspan=2 text-center>Q.No</th>
                    <th>Questions</th>
                    <th>Marks</th>
        
                </tr>
                <tr>
                <td rowspan='4' class='text-center' width='5%'>1.
                </td>
                <td width='5%'>(a)</td>
                <td>  <select class='form-select' id='ct11a'>
                
                ";

                // while($unit1 = mysqli_fetch_array($ch1))
                // {
                //    echo"
                // <option>$unit1[question]</option>
                // ";
                // }
                foreach($unit14o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>04</td>
            </tr>
            <tr>
            <td width='5%'>(b)</td>
            <td>  <select class='form-select' id='ct11b'>
            
            ";

            // while($unit1 = mysqli_fetch_array($ch1))
            // {
            //    echo"
            // <option>$unit1[question]</option>
            // ";
            // }
            foreach($unit1o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(c)</td>
            <td>  <select class='form-select' id='ct11c'>
            
            ";

            foreach($unit1o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(d)</td>
            <td>  <select class='form-select' id='ct11d'>
            
            ";

            foreach($unit1o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
        
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
             <tr>
                <td rowspan='4' class='text-center'>2.</td>
                <td width='5%'>(a)</td>
                <td>  <select class='form-select' id='ct12a'>
                
                ";

                // while($unit2 = mysqli_fetch_array($ch2))
                // {
                //    echo"
                // <option>$unit2[question]</option>
                // ";
                // }
                foreach($unit24o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>04</td>
            </tr>
            <tr>
            <td width='5%'>(b)</td>
            <td>  <select class='form-select' id='ct12b'>
            
                ";

                foreach($unit2o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(c)</td>
            <td>  <select class='form-select' id='ct12c'>
            
            ";

            foreach($unit2o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(d)</td>
            <td>  <select class='form-select' id='ct12d'>
            

            ";

            foreach($unit2o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            </table>
                ";
            }

            else if($ex=='CT-2')
            {
            //     $q3="select * from $dep where unit=3 AND semester=$sem AND subject='$sub'";
            // $ch3=mysqli_query($con,$q3);
            // $q4="select * from $dep where unit=4 AND semester=$sem AND subject='$sub'";
            // $ch4=mysqli_query($con,$q4);
            // $q5="select * from $dep where unit=5 AND semester=$sem AND subject='$sub'";
            // $ch5=mysqli_query($con,$q5);
           
                echo"
                <table class='table  text-center  shadow-lg p-3 mb-5 mt-2 bg-white rounded' id='t1'>
                <tr>
                    <th colspan=2 text-center>Q.No</th>
                    <th>Questions</th>
                    <th>Marks</th>
        
                </tr>
                <tr>
                <td rowspan='4' class='text-center' width='5%'>1.
                </td>
                <td width='5%'>(a)</td>
                <td>  <select class='form-select' id='ct21a'>
                
                ";

                foreach($unit34o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>04</td>
            </tr>
            <tr>
            <td width='5%'>(b)</td>
            <td>  <select class='form-select' id='ct21b'>
            
            ";

            foreach($unit3o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(c)</td>
            <td>  <select class='form-select' id='ct21c'>
           
            ";

            foreach($unit3o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(d)</td>
            <td>  <select class='form-select' id='ct21d'>
            
            ";

            foreach($unit3o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
             <tr>
                <td rowspan='4' class='text-center'>2.</td>
                <td width='5%'>(a)</td>
                <td>  <select class='form-select' id='ct22a'>
               
                ";

                foreach($unit44o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>04</td>
            </tr>
            <tr>
            <td width='5%'>(b)</td>
            <td>  <select class='form-select' id='ct22b'>
            
                ";

                foreach($unit4o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(c)</td>
            <td>  <select class='form-select' id='ct22c'>
            
            ";

            foreach($unit4o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(d)</td>
            <td>  <select class='form-select' id='ct22d'>
            
            ";

            foreach($unit4o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
                <td rowspan='4' class='text-center'>3.</td>
                <td width='5%'>(a)</td>
                <td>  <select class='form-select' id='ct23a'>
                
                ";

                foreach($unit54o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>04</td>
            </tr>
            <tr>
            <td width='5%'>(b)</td>
            <td>  <select class='form-select' id='ct23b'>
            
                ";

                foreach($unit5o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(c)</td>
            <td>  <select class='form-select' id='ct23c'>
           
            ";

            foreach($unit5o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(d)</td>
            <td>  <select class='form-select' id='ct23d'>
            
            ";

            foreach($unit5o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            </table>
                ";
            }
   
            else if($ex=='End Sem Exam')
            {
                // $q1="select * from $dep where unit=1 AND semester=$sem AND subject='$sub'";
                // $ch1=mysqli_query($con,$q1);
                // $q2="select * from $dep where unit=2 AND semester=$sem AND subject='$sub'";
                // $ch2=mysqli_query($con,$q2);
                // $q3="select * from $dep where unit=3 AND semester=$sem AND subject='$sub'";
                // $ch3=mysqli_query($con,$q3);
                // $q4="select * from $dep where unit=4 AND semester=$sem AND subject='$sub'";
                // $ch4=mysqli_query($con,$q4);
                // $q5="select * from $dep where unit=5 AND semester=$sem AND subject='$sub'";
                // $ch5=mysqli_query($con,$q5);
                echo"
                <table class='table  text-center  shadow-lg p-3 mb-5 bg-white rounded mt-2' id='t1'>
                <tr>
                    <th colspan=2 text-center>Q.No</th>
                    <th>Questions</th>
                    <th>Marks</th>
        
                </tr>
                <tr>
                <td rowspan='4' class='text-center' width='5%'>1.
                </td>
                <td width='5%'>(a)</td>
                <td>  <select class='form-select' id='ct11a'>
               
                ";

                foreach($unit14o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>04</td>
            </tr>
            <tr>
            <td width='5%'>(b)</td>
            <td>  <select class='form-select' id='ct11b'>
            
            ";

            foreach($unit1o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(c)</td>
            <td>  <select class='form-select' id='ct11c'>
           
            ";

            foreach($unit1o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(d)</td>
            <td>  <select class='form-select' id='ct11d'>
           
            ";

            foreach($unit1o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
             <tr>
                <td rowspan='4' class='text-center' width='5%'>2.</td>
                <td width='5%'>(a)</td>
                <td>  <select class='form-select' id='ct12a'>
               
                ";

                foreach($unit24o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>04</td>
            </tr>
            <tr>
            <td width='5%'>(b)</td>
            <td>  <select class='form-select' id='ct12b'>
           
                ";

                foreach($unit2o as $value) {
                    echo"
                    <option>$value</option>
                     ";
                  }
                echo"
                </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(c)</td>
            <td>  <select class='form-select' id='ct12c'>
            
            ";

            foreach($unit2o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            <tr>
            <td width='5%'>(d)</td>
            <td>  <select class='form-select' id='ct12d'>
           
            ";

            foreach($unit2o as $value) {
                echo"
                <option>$value</option>
                 ";
              }
            echo"
            </select></td>
                <td width='5%'>08</td>
            </tr>
            
        <tr>
        <td rowspan='4' class='text-center' width='5%'>3.
        </td>
        <td width='5%'>(a)</td>
        <td>  <select class='form-select' id='ct21a'>
        
        ";

        foreach($unit34o as $value) {
            echo"
            <option>$value</option>
             ";
          }
        echo"
        </select></td>
        <td width='5%'>04</td>
    </tr>
    <tr>
    <td width='5%'>(b)</td>
    <td>  <select class='form-select' id='ct21b'>
    
    ";

    foreach($unit3o as $value) {
        echo"
        <option>$value</option>
         ";
      }
    echo"
    </select></td>
        <td width='5%'>08</td>
    </tr>
    <tr>
    <td width='5%'>(c)</td>
    <td>  <select class='form-select' id='ct21c'>
   
    ";

    foreach($unit3o as $value) {
        echo"
        <option>$value</option>
         ";
      }
    echo"
    </select></td>
        <td width='5%'>08</td>
    </tr>
    <tr>
    <td width='5%'>(d)</td>
    <td>  <select class='form-select' id='ct21d'>
    
    ";

    foreach($unit3o as $value) {
        echo"
        <option>$value</option>
         ";
      }
    echo"
    </select></td>
        <td width='5%'>08</td>
    </tr>
     <tr>
        <td rowspan='4' class='text-center' width='5%'>4.</td>
        <td width='5%'>(a)</td>
        <td>  <select class='form-select' id='ct22a'>
       
        ";

        foreach($unit44o as $value) {
            echo"
            <option>$value</option>
             ";
          }
        echo"
        </select></td>
        <td width='5%'>04</td>
    </tr>
    <tr>
    <td width='5%'>(b)</td>
    <td>  <select class='form-select' id='ct22b'>
    
        ";

        foreach($unit4o as $value) {
            echo"
            <option>$value</option>
             ";
          }
        echo"
        </select></td>
        <td width='5%'>08</td>
    </tr>
    <tr>
    <td width='5%'>(c)</td>
    <td>  <select class='form-select' id='ct22c'>
    
    ";

    foreach($unit4o as $value) {
        echo"
        <option>$value</option>
         ";
      }
    echo"
    </select></td>
        <td width='5%'>08</td>
    </tr>
    <tr>
    <td width='5%'>(d)</td>
    <td>  <select class='form-select' id='ct22d'>
   
    ";

    foreach($unit4o as $value) {
        echo"
        <option>$value</option>
         ";
      }
    echo"
    </select></td>
        <td>08</td>
    </tr>
    <tr>
        <td rowspan='4' class='text-center' width='5%'>5.</td>
        <td width='5%'>(a)</td>
        <td>  <select class='form-select' id='ct23a'>
       
        ";

        foreach($unit54o as $value) {
            echo"
            <option>$value</option>
             ";
          }
        echo"
        </select></td>
        <td width='5%'>04</td>
    </tr>
    <tr>
    <td width='5%'>(b)</td>
    <td>  <select class='form-select' id='ct23b'>
   
        ";

        foreach($unit5o as $value) {
            echo"
            <option>$value</option>
             ";
          }
        echo"
        </select></td>
        <td width='5%'>08</td>
    </tr>
    <tr>
    <td width='5%'>(c)</td>
    <td>  <select class='form-select' id='ct23c'>
   
    ";

    foreach($unit5o as $value) {
        echo"
        <option>$value</option>
         ";
      }
    echo"
    </select></td>
        <td width='5%'>08</td>
    </tr>
    <tr>
    <td width='5%'>(d)</td>
    <td>  <select class='form-select' id='ct23d'>
   
    ";

    foreach($unit5o as $value) {
        echo"
        <option>$value</option>
         ";
      }
    echo"
    </select></td>
        <td width='5%'>08</td>
    </tr>
                
                
                
                ";

            }
         

        ?>