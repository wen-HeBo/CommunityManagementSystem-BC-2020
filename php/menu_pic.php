<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>menu_pic</title>
  </head>

  <body>
    <?php
    define('GW_UPLOADPATH', '../images/');
    require("config.php");
    // Connect to the database 
    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    mysqli_query($dbc,"set names 'utf8'"); //数据库输出编码

    // Retrieve the score data from MySQL
    $query = "SELECT * FROM food";
    $data = mysqli_query($dbc, $query);

    // Loop through the array of score data, formatting it as HTML 
    echo '<table id="menu">';
    $i = 1;
    while ($row = mysqli_fetch_array($data)) {
      // Display the score data
      $s=$i%2;
      if($s == '1'){
        echo '<tr>';
      }
      echo '<td class="idss"><input name="oFood" type="checkbox" id=' . $row['FID'] . '></td>';
      echo '<td class="scoreinfo">';
      // echo '<span class="id">' . $row['FID'] . '</span><br />';
      echo '<strong>菜名:</strong> ' .$row['FNAME'] . '<br />';
      echo '<strong>价格:</strong> ' . $row['PRICE'] . '<br />';

      if (is_file(GW_UPLOADPATH . $row['FIMG']) && filesize(GW_UPLOADPATH . $row['FIMG']) > 0) {
        echo "<td class='ids'><img id='tdimg' src='" . GW_UPLOADPATH . $row['FIMG'] . "' alt='Score image'></td>";
      }
      if($i%2 == '0'){
        echo '</tr>';
      }
      $i++;
    }
    if($i%2 == '0'){
      echo '</tr>';
    }
    
    echo '</table>';
    mysqli_close($dbc);
    ?>
    <script>
      $(document).ready(function() {
        function getCookie(c_name){
          if (document.cookie.length>0)
            {
            c_start=document.cookie.indexOf(c_name + "=")
            if (c_start!=-1)
              { 
              c_start=c_start + c_name.length+1 
              c_end=document.cookie.indexOf(";",c_start)
              if (c_end==-1) c_end=document.cookie.length
              return unescape(document.cookie.substring(c_start,c_end))
              } 
            }
            console.log(document.cookie);
          return "";
        }

        //console.log(document.cookie);
        var uname = getCookie('name');
       
        var iflag=true;
        $("#orderFood").click(function() {
          var str = "";
          var index = Math.random() * 10000000;
          $("input[type='checkbox']").each(function() {
            
            if ($(this).is(":checked")) {
              console.log($(this).attr("id"));
              index = index + 1;

              $.ajax({
                type: "POST",
                global: false,
                url: "../php/orderFood.php",
                dataType: "html",
                data: {
                  id: $(this).attr("id"),
                  ind: index,
                  uid: uname
                },
                async: false,
                success: function(data) {
                  console.log(index);
                  console.log($(this).attr("id"));
                },
                error: function() {
                  alert("下单失败！");
                  iflag=false;
                }
              });

            }
          });
          if(iflag){
            alert("下单成功！");
            $(".maincontent").load("history.html");
          }
        });
      });
    </script>
  </body>

</html>