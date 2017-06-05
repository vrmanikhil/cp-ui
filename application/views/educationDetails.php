<html>
  <body>
    <h3>Latest Educational Details</h3>
    <form>
    <label>College Name</label>
    <select>
      <?php foreach ($colleges as $key => $value) { ?>
        <option value="<?php echo $value['college_id']; ?>"><?php echo $value['college']; ?></option>
      <?php } ?>
    </select>
    <br><br>
    <label>Course</label>
    <select>
      <?php foreach ($courses as $key => $value) { ?>
        <option value="<?php echo $value['course_id']; ?>"><?php echo $value['course']; ?></option>
      <?php } ?>
    </select>
    <br><br>
    <label>Batch</label>
    <input type="text" placeholder="Batch">
    <br><br>
    <button>Save</button>
    </form>
  </body>
</html>
