<?php 
	if(isset($_POST['submit']))
	{
			header("Content-type: application/vnd.ms-word");
			header("Content-Disposition: attachment;Filename=document_name.doc");
			
			$courseName = $_POST['courseName'];
			$courseCode = $_POST['courseCode'];
			$subCourseName = $_POST['subCourseName'];
			$sessionsOfCourse = $_POST['sessionsOfCourse'];
			$semester = $_POST['semester'];
			$lTP = $_POST['lTP'];


			$Co = $_POST['Co'];
			$co1 = $_POST['CourseOutcomes1'];
			$co2 = $_POST['CourseOutcomes2'];
			
			echo "<html>";
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
			echo "<body>";
			$table = "";
			echo "<p><center><h3><u>Outcome Based Evaluation</u></h3></center></p>";
			echo "<p><center><h3><u>PHASE-I</u></h3></center></p>";
			
			$phase1Table = "";
			$phase1Table .="<table border='1' align='center' width='100%' cellpadding='10' cellspacing='0'>";
			$phase1Table .= "<tr><th>COURSE NAME</th><th>".$courseName."</th></tr>";
			$phase1Table .= "<tr><th>COURSE CODE</th><th>".$courseCode."</th></tr>";
			$phase1Table .= "<tr><th>SUB COURSE NAME</th><th>".$subCourseName."</th></tr>";
			$phase1Table .= "<tr><th>SESSIONS OF COURSE</th><th>".$sessionsOfCourse."</th></tr>";
			$phase1Table .= "<tr><th>SEMESTER</th><th>".$semester."</th></tr>";
			$phase1Table .= "<tr><th>L : P : T </th><th>".$lTP."</th></tr>";
			$phase1Table .= "</table>";

			echo $phase1Table;

			echo "<p><center><h3><u>GRADING SCALE</u></h3></center></p>";

			$gradeScore1 = $_POST['Score1'];
			$gradeScore2 = $_POST['Score2'];
			$gradeScore3 = $_POST['Score3'];

			$gradingScaleTable = "";

			$gradingScaleTable .= "<table border='1' align='center' width='100%' cellpadding='10' cellspacing='0'>";
			$gradingScaleTable .= "<tr><th>40% - 49%</th><th>".$gradeScore1."</th></tr>";
			$gradingScaleTable .= "<tr><th>50% - 59%</th><th>".$gradeScore2."</th></tr>";
			$gradingScaleTable .= "<tr><th> > 60%</th><th>".$gradeScore3."</th></tr>";
			$gradingScaleTable .= "</table>";

			echo $gradingScaleTable;

			echo "<h2 align='center'>Course Outcome</h2>";
			$table .= "<table border='1' align='center' width='100%' cellpadding='10' cellspacing='0'><tr><th>Sr No.</th><th><strong>Outcome Name</strong></th><th><strong>Description</strong></th><th><strong>Modules</strong></th></tr>";
			$sr = 1;
			for($i=0;$i<count($Co);$i++)
			{
				$table .= "<tr>";
				$table .= "<td align='center'>".$sr."</td>";
				$table .= "<td>".$Co[$i]."</td>";
				$table .= "<td>".$co1[$i]."</td>";
				$table .= "<td>".$co2[$i]."</td>";
				$table .= "</tr>";
				$sr++;
			}
			$table .= "</table>";
			echo $table;
			echo "</body>";
			echo "</html>";
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table
		{
			font-family: arial, sanns-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,th
		{
			border:1px solid #dddddd;
			text-align: center;
			padding: 6px;
		}

		tr
		{
			background-color: #dddddd: 
		}
	</style>
</head>
<body>
	<p><center><h3><u>Outcome Based Evaluation</u></h3></center></p>
	<p><center><h3><u>PHASE-I</u></h3></center></p>
	<form method="POST" action="" >
		<table>
			<tr>
				<th>COURSE NAME</th>
				<th><input type="text" name="courseName" value=""><br></th>
			</tr>
			<tr>
				<th>COURSE CODE</th>
				<th><input type="text" name="courseCode" value=""><br></th>
			</tr>
			<tr>
				<th>SUB COURSE NAME</th>
				<th><input type="text" name="subCourseName" value=""><br></th>
			</tr>
			<tr>
				<th>SESSIONS OF COURSE</th>
				<th><input type="text" name="sessionsOfCourse" value=""><br></th>
			</tr>
			<tr>
				<th>SEMESTER</th>
				<th><input type="text" name="semester" value=""><br></th>
			</tr>
			<tr>
				<th>L : T : P</th>
				<th><input type="text" name="lTP" value=""><br></th>
			</tr>
		</table>
		<p><center><h3>GRADING SCALE</h3></center></p>
		<table >
			<tr >
				<th colspan=3><center>SCORE</center></th>
			</tr>
			<tr>
				<th>40% - 49%</th>
				<th><input type="number" name="Score1"></th>
			</tr>
			<tr>
				<th>50% - 59%</th>
				<th><input type="number" name="Score2"></th>
			</tr>
			<tr>
				<th> > 60%</th>
				<th><input type="number" name="Score3"></th>
			</tr>
		</table>
		<p><center><b><h3>Course Outcome</h3></b></center></p>

		<script language="javascript">
			function addRow(tableID) 
			{

				var table = document.getElementById(tableID);

				var rowCount = table.rows.length;
				var row = table.insertRow(rowCount);

				var colCount = table.rows[0].cells.length;

				for(var i=0; i<colCount; i++) {

					var newcell	= row.insertCell(i);

					newcell.innerHTML = table.rows[0].cells[i].innerHTML;
					//alert(newcell.childNodes);
					switch(newcell.childNodes[0].type) {
						case "text":
								newcell.childNodes[0].value = "";
								break;
						case "checkbox":
								newcell.childNodes[0].checked = false;
								break;
						case "select-one":
								newcell.childNodes[0].selectedIndex = 0;
								break;
					}
				}
			}

			function deleteRow(tableID) {
				try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;

				for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null != chkbox && true == chkbox.checked) {
						if(rowCount <= 1) {
							alert("Cannot delete all the rows.");
							break;
						}
						table.deleteRow(i);
						rowCount--;
						i--;
					}


				}
				}catch(e) {
					alert(e);
				}
			}
		</script>
		<input type="button" value="Add Row" onclick="addRow('dataTable')" />
		<input type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
		<br>
		<table width="350px" border="1">
			<th>
				<td><strong>Outcome Name</strong></td>
				<td><strong>Description</strong></td>
				<td><strong>Modules</strong></td>
			</th>
		</table>
		<table id="dataTable" width="350px" border="1">
			<tr>
				<td><input type="checkbox" name="chk" /></td>
				<td><input type="text" name="Co[]" style="width : 100%;"/></td>
				<td><input type="text" name="CourseOutcomes1[]" style="width : 100%;"/></td>
				<td><input type="text" name="CourseOutcomes2[]" style="width : 100%;" /></td>
			</tr>
		</table><br>
		<input name="submit" type="submit" value="GENERATE WORD FILE"/>
	</form>


</body>
</html>