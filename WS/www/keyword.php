<?php
$page_title = 'Create a New Student Form';
include ('../includes/header.html');
include '../src/connection.php';


function deleteTechSkill($con, $skill_id) {
	
	
	
}
?>


<form name="student_form.php" method="POST" action="keyword_submit.php" enctype="multipart/form-data">
				<br>

<h4 class="text-muted">Technical Skills</h4>
					<p>add new</p>
					<label class="sr-only" for="newTechSkill">New Tech Skill</label>
						<div class="row align-items-start no-gutters" style="margin-left: 25px;">
							<?php
							$q = "SELECT * FROM tech_skills;";
                            $r = @mysqli_query($con, $q);

                            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                $str = $row['skill_name'];
                                $skillNameNoSpaces = str_replace(' ', '', $str);
                                echo "<div class='col col-lg-3'>
                                                <input type='checkbox' class='form-check-input' name='".$skillNameNoSpaces.
                                                "' id='skill' value='{$row['skill_id']}'>
                                                <label class='form-check-label' for='{$row['skill_id']}'>" . $row['skill_name'] .
                                                "</label>
                                            </div>";
                            }
							?>
						</div>
					</div>
					
	<div class="form-check">
		<button class="btn btn-primary" type="submit" name="submit">Submit</button>
		<a href="index.php"><input class="btn btn-secondary" type="button" value="Cancel and Exit"></a>
	    	</div>
					
<?php
include ('../includes/footer.html');
$con->close();


/*
<?php
                            $q = "SELECT * FROM tech_skills;";
                            $r = @mysqli_query($con, $q);

                            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                $str = $row['skill_name'];
                                $skillNameNoSpaces = str_replace(' ', '', $str);
                                echo "<div class='col col-lg-3'>
                                                <input type='checkbox' class='form-check-input' name='".$skillNameNoSpaces.
                                                "' id='skill' value='{$row['skill_id']}'>
                                                <label class='form-check-label' for='{$row['skill_id']}'>" . $row['skill_name'] .
                                                "</label>
                                            </div>";
                            }
                            ?>
*/
?>