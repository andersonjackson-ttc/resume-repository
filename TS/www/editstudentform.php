<?php
$page_title = 'Edit Student Form';
include ('../includes/header.html');
include_once '../src/student_edit_connection.php'; ?>
<script src="editstudentform.js"></script>
<h1>Edit Student Form</h1>
  <form method="post" action="<?php echo('editstudent_submit.php?id='.$profile_id);?>">
    <fieldset>
      <!--Student Information Fields-->
      <div id="inputField">
      <?php while($studentRow = mysqli_fetch_array($studentResult)) {
        ?>
        <label>Student ID <span class="requiredField">*</span><br>
          <input required id="studentID" name="studentID" type="number" size="30" maxlength="100"
          value="<?php echo(htmlspecialchars($studentRow['student_id'])); ?>"></label>
        </div>
        <div id="inputField">
          <label>First Name <span class="requiredField">*</span><br>
            <input required id="firstName" name="firstName" type="text" size="30" maxlength="100"
            value="<?php echo(htmlspecialchars($studentRow['first_name'])); ?>"></label>
        </div>
        <div id="inputField">
          <label>MI<br><input id="middleInitial" name="middleInitial" type="text" size="1" maxlength="1"
            value="<?php if($studentRow['middle_initial'] != null){
            echo(htmlspecialchars($studentRow['middle_initial']));
          } else {
            echo("");
          }
          ?>"></label>
        </div>
        <div id="inputField">
          <label>Last Name <span class="requiredField">*</span><br>
            <input required id="lastName" name="lastName" type="text" size="30" maxlength="100"
            value="<?php echo(htmlspecialchars($studentRow['last_name'])); ?>"></label>
        </div>
        <div id="inputField">
          <label>Email <span class="requiredField">*</span><br>
            <input required id="studentEmail" name="studentEmail" type="email" size="30" maxlength="100"
            value="<?php echo(htmlspecialchars($studentRow['email'])); ?>"></label>
        </div>
        <div id="inputField">
          <label>Phone Number <span class="requiredField">*</span><br>
            <input required id="studentPhone" name="studentPhone" type="phone" size="30" maxlength="100"
            value="<?php echo(htmlspecialchars($studentRow['phone'])); ?>"></label>
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
          <label for="securityClearance">Yes<input id="securityClearanceYes"
            name="securityClearance" type="radio" value="yes"
            <?php echo($studentRow['security_clearance']>=1 ? 'checked' : '');?>></label>

          <label for="securityClearance">No<input id="securityClearanceNo"
            name="securityClearance" type="radio" value="no"
            <?php echo($studentRow['security_clearance']==0 ? 'checked' : '');?>></label>

          <div id="securityAttributes" style="margin-top: 5px;
          <?php echo($studentRow['security_clearance']>=1 ? '' : 'display: none');?>">
            <label>Select One:
              <label for="securityAttributes">Secret<input name="securityAttributes"
                type="radio" value="secret"
                <?php echo($studentRow['security_clearance']==1 ? 'checked' : '');?>></label>
              <label for="securityAttributes">Top-Secret<input name="securityAttributes"
                type="radio" value="top-secret"
                <?php echo($studentRow['security_clearance']==2 ? 'checked' : '');?>></label>
              <label for="securityAttributes">Confidential<input name="securityAttributes"
                type="radio" value="confidential"
                <?php echo($studentRow['security_clearance']==3 ? 'checked' : '');?>></label>
            </label>
            <br>
            <label>Currently Active?:
              <label for="securityCurrent">Yes<input name="securityCurrent"
                type="radio" value="yes"></label>
              <label for="securityCurrent">No<input name="securityCurrent"
                type="radio" value="no"></label>
            </label>
          </div>
        </div>
      <?php } ?> <!-- End of PHP While Loop for Student Information -->
      <a href='editstudentform.php'><input type="submit" name="update" value="Update Student"></a>
      <a href='studentDisplay.php'><input type="button" name="cancel" value="Cancel"></a>
    </form>
      <?php
        include ('../includes/footer.html');
        ?>
