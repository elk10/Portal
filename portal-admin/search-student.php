<?php
$mysqli_db = new mysqli('localhost', 'root', '', 'portal');

// normal search
$result_tb = "";
if(!empty($_POST['SEARCH']) && !empty($_POST['search_value'])) {

   $e = $_POST['search_value'];

   $query = 'SELECT * FROM students WHERE ' .
           "fname LIKE '%$e%' OR " .
           "lname LIKE '%$e%' OR " .
           "date_of_birth LIKE '%$e%' OR " .
           "student_id LIKE '%$e%' ";

   $query_result = $mysqli_db->query($query);

   $result_tb = '<table cellspacing="5" cellpadding="5">';
   while ($rows = $query_result->fetch_assoc()) {
      foreach ($rows as $k => $v) {
         $result_tb .= '<tr><td>' . $k . '</td><td>' . $v . '</td></tr>';
      }
   }
   $result_tb .='</table>';

   $mysqli_db->close();
}
?>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Search</title>
   </head>
   <body>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <table>
            <tr>
               <td>
                  <input type="text" name="search_value" size="30" maxlength="30" autocomplete="off" />
               </td>
               <td>
                  <input type="submit" name="SEARCH" value="Search"/>
               </td>
            </tr>
         </table>
      </form>
      <?php echo $result_tb; ?>
   </body>
</html>