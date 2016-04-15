<?php
/*
PHP Search Form 
Obtained from http://coderlearner.com/PHP_Search_Form
*/
session_start();
if(!isset($_SESSION["username"]))
{
	header("Location: login.php");
}

?>
<?php include ('header.php'); ?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Search Student</h2>
		</div>
			<?php
				include ('connect.php');
				$result_tb = "";
				//Make sure the user submit some data for search
				if(!empty($_POST['SEARCH']) && !empty($_POST['search_value'])) {

					$e = $_POST['search_value'];
					//Make sure the user submit some data for search
					$sql = 'SELECT * FROM students WHERE ' .
					"student_name LIKE '%$e%' OR " .
					"date_of_birth LIKE '%$e%' OR " .
					"class_year LIKE '%$e%' OR " .
					"student_id LIKE '%$e%' ";
					//Make sure the user submit some data for search
					$query_result = $connect->query($sql);
					//Get the return result and generate a table
					$result_tb = '<table cellspacing="5" cellpadding="5">';
					while ($rows = $query_result->fetch_assoc()) {
						foreach ($rows as $k => $v) {
							$result_tb .= '<tr><td>' . $k . '</td><td>' . $v . '</td></tr>';
						}
					}
					$result_tb .='</table>';
					//Get the return result and generate a table
					$connect->close();
				}
				?>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<table>
						<tr>
							<td></td>
							<td>
								<input type="text" name="search_value" size="30" maxlength="30" autocomplete="off" />
							</td>
							</tr>
							</table>
							<table>
							<tr>
							<td></td>
							<td>
								<input type="submit" name="SEARCH" value="Search"/>
							</td>
						</tr>
				
				<?php
				//display the results
				 echo $result_tb; 
				
				 ?>
				 	</table>
				</form>
</div>
</div>
<?php include ('footer.php'); ?>
