<table class="tbl-qa">
  <thead>
	  <tr>
		<th class="table-header" width="10%">Q.No.</th>
		<th class="table-header">Question</th>
		<th class="table-header">Answer</th>
	  </tr>
  </thead>
  <tbody>
  <?php
  foreach($faq as $k=>$v) {
  ?>
	  <tr class="table-row">
		<td><?php echo $k+1; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'question','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["question"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'answer','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["answer"]; ?></td>
	  </tr>
<?php
}
?>
  </tbody>
</table>