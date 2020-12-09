<?php
$page_title = 'Keyword list';
include ('../includes/header.html');
include '../src/connection.php';
?>
<form name="keyword.php" method="POST" action="keyword_submit.php" enctype="multipart/form-data">
<br>
<?php
/*
	if($_GET["name_add"] == "success"){
		echo("<h1>Skills Added/Edited Successfully!</h1>");
	}
	*/
?>
<br>

<h4 class="text-muted">Technical Skills</h4>
					<p>Add new</p>
					<label class="sr-only" for="newTechSkill">New Tech Skill</label>
					<input name="newTechSkill" id="newTechSkill" type="text" class="form-control" style="width: 40vw;" placeholder="Tech Skill" value="<?php if (isset($_POST['newTechSkill'])) echo $_POST['newTechSkill']; ?>">


					<p>Check to Delete Permanently</p>

						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM tech_skills ORDER BY ASC;";
                            $r = @mysqli_query($con, $q);

                            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                $str = $row['skill_name'];
                                $skillNameNoSpaces = str_replace(' ', '', $str);
                                echo "<div class='col col-lg-3'>
                                                <input type='checkbox' class='form-check-input' name='".$skillNameNoSpaces.
                                                "' id='skill' onchange='ConfirmDelete(this)'  value='{$row['skill_id']}'>
                                                <label class='form-check-label' for='{$row['skill_id']}'>" . $row['skill_name'] .
                                                "</label>
                                            </div>";
                            }
							?>
						</div>
					</div>


					<h4 class="text-muted">Job Interests</h4>
					<p>Add new</p>
					<label class="sr-only" for="newJob">New Job Interest</label>
					<input name="newJob" id="newJob" type="text" class="form-control" style="width: 40vw;" placeholder="Job Interest" value="<?php if (isset($_POST['newJob'])) echo $_POST['newJob']; ?>">


					<p>Check to Delete Permanently</p>

						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM job_interest ORDER BY ASC;";
                            $r = @mysqli_query($con, $q);

                            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                $str = $row['job_name'];
                                $jobNameNoSpaces = str_replace(' ', '', $str);
                                echo "<div class='col col-lg-3'>
                                                <input type='checkbox' class='form-check-input' name='".$jobNameNoSpaces.
                                                "' id='skill' onchange='ConfirmDelete(this)'  value='{$row['job_id']}'>
                                                <label class='form-check-label' for='{$row['job_id']}'>" . $row['job_name'] .
                                                "</label>
                                            </div>";
                            }
							?>
						</div>
					</div>

							<h4 class="text-muted">Certs</h4>
					<p>Add new</p>
					<label class="sr-only" for="newTechSkill">New Cert</label>
					<input name="newCert" id="newCert" type="text" class="form-control" style="width: 40vw;" placeholder="Cert" value="<?php if (isset($_POST['newCert'])) echo $_POST['newCert']; ?>">


					<p>Check to Delete Permanently</p>

						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM certificates ORDER BY ASC;";
                            $r = @mysqli_query($con, $q);

                            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                $str = $row['certificate_name'];
                                $certificateNameNoSpaces = str_replace(' ', '', $str);
                                echo "<div class='col col-lg-3'>
                                                <input type='checkbox' class='form-check-input' name='".$certificateNameNoSpaces.
                                                "' id='skill' onchange='ConfirmDelete(this)'  value='{$row['certificate_id']}'>
                                                <label class='form-check-label' for='{$row['certificate_id']}'>" . $row['certificate_name'] .
                                                "</label>
                                            </div>";
                            }
							?>
						</div>
					</div>


					<h4 class="text-muted">Prof Skills</h4>
					<p>Add new</p>
					<label class="sr-only" for="newTechSkill">New Prof Skill</label>
					<input name="newProfSkill" id="newProfSkill" type="text" class="form-control" style="width: 40vw;" placeholder="Prof Skill" value="<?php if (isset($_POST['newProfSkill'])) echo $_POST['newProfSkill']; ?>">


					<p>Check to Delete Permanently</p>

						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM prof_skills ORDER BY ASC;";
                            $r = @mysqli_query($con, $q);

                            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                $str = $row['skill_name'];
                                $skillNameNoSpaces = str_replace(' ', '', $str);
                                echo "<div class='col col-lg-3'>
                                                <input type='checkbox' class='form-check-input' name='".$skillNameNoSpaces.
                                                "' id='skill' onchange='ConfirmDelete(this)' value='{$row['skill_id']}'>
                                                <label class='form-check-label' for='{$row['skill_id']}'>" . $row['skill_name'] .
                                                "</label>
                                            </div>";
                            }
							?>
						</div>
					</div>


<br>



<br>

<h4 class="text-muted">Majors</h4>
					<p>Add new</p>
					<label class="sr-only" for="newMajor">New Major</label>
					<input name="newMajor" id="newMajor" type="text" class="form-control" style="width: 40vw;" placeholder="Major" value="<?php if (isset($_POST['newMajor'])) echo $_POST['newMajor']; ?>">


					<p>Check to Delete Permanently</p>

						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM majors ORDER BY ASC;";
                            $r = @mysqli_query($con, $q);

                            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                $str = $row['major_name'];
                                $majorNameNoSpaces = str_replace(' ', '', $str);
                                echo "<div class='col col-lg-3'>
                                                <input type='checkbox' class='form-check-input' name='".$majorNameNoSpaces.
                                                "' id='skill' onchange='ConfirmDelete(this)' value='{$row['major_id']}'>
                                                <label class='form-check-label' for='{$row['major_id']}'>" . $row['major_name'] .
                                                "</label>
                                            </div>";
                            }
							?>
						</div>
					</div>


		<br>




	<div class="form-check">
		<button class="btn btn-primary" type="submit" name="submit">Submit</button>
		<a href="index.php"><input class="btn btn-secondary" type="button" value="Cancel and Exit"></a>
	    	</div>

			<br>
		<br>


		<script type='text/javascript'>
		// confirmation alert function displayed to user when selecting checkboxes to delete a skill
	   function ConfirmDelete(oCheckbox)
	   {
	       var checkbox_val = oCheckbox.value;
	       var b = oCheckbox.checked;


	           		if(oCheckbox.checked && confirm("Are you sure you want to delete skill " + oCheckbox.name + "\n with ID " +
	                   checkbox_val))
	               {

	               		 oCheckbox.checked = true;


	               }// end of if
	                else if(!oCheckbox.checked && alert("Delete option for skill " + oCheckbox.name + "\n with ID " +
	                   checkbox_val + " is canceled"))
	                {

	                      oCheckbox.checked = false;

	                }// end of else if

	               else
	               {
					 					if(!oCheckbox.checked)
					           {
					                oCheckbox.checked = b;
					           }
					 					else
					          {

					                 oCheckbox.checked = !b;

					           }

	               }//end of else


	   }//end of ConfirmDelete function

	   </script>


<?php
//include ('../includes/footer.html');
$con->close();
?>
