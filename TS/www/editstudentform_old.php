<?php 
$page_title = 'Edit Student Form';

include ('../includes/header.html');

include_once ('../src/student_edit_connection.php'); 

?>

  <h1>Edit Student Form</h1>
  <form method="post" action="editstudentform.php">
    <fieldset>
      <!--Student Information Fields-->
      <div id="inputField">
        <label>Student ID *<br><input required id="studentID" type="number" size="30"
          maxlength="100" value="<?php echo(htmlspecialchars($studentRow['student_id'])); ?>"></label>
      </div>
      <div id="inputField">
        <label>First Name *<br><input required id="firstName" type="text" size="30"
          maxlength="100" value="<?php echo(htmlspecialchars($studentRow['first_name'])); ?>"></label>
      </div>
      <div id="inputField">
        <label>MI<br><input id="middleInitial" type="text" size="5" maxlength="100"
          value="<?php if($studentRow['middle_initial'] != null){
            echo(htmlspecialchars($studentRow['middle_initial']));
          } else {
            echo("");
          }
          ?>"></label>
      </div>
      <div id="inputField">
        <label>Last Name *<br><input required id="lastName" type="text" size="30"
          maxlength="100" value="<?php echo(htmlspecialchars($studentRow['last_name'])); ?>"></label>
      </div>
      <div id="inputField">
        <label>Email *<br><input required id="studentEmail" type="email" size="30"
          maxlength="100" value="<?php echo(htmlspecialchars($studentRow['email'])); ?>"></label>
      </div>
      <div id="inputField">
        <label>Phone Number *<br><input required id="studentPhone" type="phone" size="30"
          maxlength="100" value="<?php echo(htmlspecialchars($studentRow['phone'])); ?>"></label>
      </div>
      <div id="checkbox" style="margin-top: 15px;">
		  			  <label>Military Veteran <span class="requiredField">*</span><br></label>

		   			  <label for="militaryStatus">Yes<input name="militaryStatus" type="radio" value="yes"
                <?php echo($studentRow['military_status']==1 ? 'checked' : '');?>></label>

		  			  <label for="militaryStatus">No<input name="militaryStatus" type="radio" value="no"
                <?php echo($studentRow['military_status']==0 ? 'checked' : '');?>></label>
						  <br>
		  </div>
      <div id="checkbox" style="margin-top: 15px;">
            <label>Security Clearance <span class="requiredField">*</span><br></label>
            <label for="securityClearance">Yes<input id="securityClearanceYes" name="securityClearance"
              type="radio" value="yes"
              <?php echo($studentRow['security_clearance']==1 ? 'checked' : '');?>></label>

            <label for="securityClearance">No<input id="securityClearanceNo" name="securityClearance"
              type="radio" value="no"
              <?php echo($studentRow['security_clearance']==0 ? 'checked' : '');?>></label>

            <div id="securityAttributes" style="margin-top: 5px;">
              <!-- Waiting for Military Table in SQL database for these values -->
              <label>Select One:
                <label for="securityAttributes">Secret<input name="securityAttributes"
                  type="radio" value="secret"></label>
                <label for="securityAttributes">Top-Secret<input name="securityAttributes"
                  type="radio" value="top-secret"></label>
                <label for="securityAttributes">Confidential<input name="securityAttributes"
                  type="radio" value="confidential"></label>
              </label>
              <label><br>Currently Active?:
                <label for="securityCurrent">Yes<input name="securityCurrent"
                  type="radio" value="yes"></label>
                <label for="securityCurrent">No<input name="securityCurrent"
                  type="radio" value="no"></label>
              </label>
            </div>
      </div>
      <div id="inputField">
        <!-- Start of Professional Skills Ratings -->
        <table>
          <tr>
            <th>Professional Skills</th>
            <th>Yes</th>
            <th>No</th>
          </tr>
          <?php while($skillsRow = mysql_fetch_array($skillsResult)) {
            ?><tr><td><?php echo(htmlspecialchars($skillsRow['skill_name']))?></td>

            <?php
	    $found = 0;
	    while($studentSkillsRow = mysql_fetch_array($studentSkillsResult) || $found == 1){
              if($studentSkillsRow['skill_id']==$skillsRow['skill_id']){
                ?><td><input type="radio" id="<?php echo(htmlspecialchars($skillsRow['skill_name']))?>yes"
                name=<?php echo(htmlspecialchars($skillsRow['skill_name']))?>
                value="yes" checked></td>
                <td><input type="radio" id="<?php echo(htmlspecialchars($skillsRow['skill_name']))?>no"
                name=<?php echo(htmlspecialchars($skillsRow['skill_name']))?>
                value="no"></td>
		$found = 1;
	      <?php }
	    }
	      if($found == 0){ ?>
                <td><input type="radio" id="<?php echo(htmlspecialchars($skillsRow['skill_name']))?>yes"
                name=<?php echo(htmlspecialchars($skillsRow['skill_name']))?>
                value="yes"></td>
                <td><input type="radio" id="<?php echo(htmlspecialchars($skillsRow['skill_name']))?>no"
                name=<?php echo(htmlspecialchars($skillsRow['skill_name']))?>
                value="no" checked></td>
		</tr>
	      <?php } ?>
        </table>


	<?php
		include ('../includes/footer.html');
	?>
