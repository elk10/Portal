<?php
session_start();

if(!isset($_SESSION["username"]))
{
	header("Location: login.php");
}
include ('header.php'); ?>
<body>
	<div id="site-container">
		<div class="site-inner">
			<div class="student-record">
				<?php

				include ('connect.php');
// normal search
				$result_tb = "";
				if(!empty($_POST['SEARCH']) && !empty($_POST['search_value'])) {

					$e = $_POST['search_value'];

					$sql = 'SELECT * FROM students WHERE ' .
					"student_name LIKE '%$e%' OR " .
					"date_of_birth LIKE '%$e%' OR " .
					"student_id LIKE '%$e%' ";

					$query_result = $connect->query($sql);

					$result_tb = '<table cellspacing="5" cellpadding="5">';
					while ($rows = $query_result->fetch_assoc()) {
						foreach ($rows as $k => $v) {
							$result_tb .= '<tr><td>' . $k . '</td><td>' . $v . '</td></tr>';
						}
					}
					$result_tb .='</table>';

					$connect->close();
				}
				?>
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
			</div>
		</div>
	</div>
</body>
