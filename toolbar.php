<div id="exam-toolbar" class="editable-msg no-print" contenteditable="false">

	<?php
	if(defined('INC_FILE')){	
		echo '
			<lable class = "form-upload-con">
				<input type="file" name="docx" onchange="update_content(this)" accept=".docx">
				<i class="fa fa-folder-open"></i>
			</lable>
			<i class="edit-btn fa fa-save" onclick="save_exam()"></i>
			';
	}
	elseif(defined('INC_FILE_P')) {
		echo '<i class="edit-btn fa fa-save" onclick="save_exam()"></i>
			<i class="edit-btn fa fa-print" onclick="window.print()"></i>';
	}
	else{
		echo '<i class="edit-btn fa fa-print" onclick="window.print()"></i>';
	}
	?>

	<i class="edit-btn fa fa-undo"          onclick="document.execCommand('undo');"></i>
	<i class="edit-btn fa fa-repeat"        onclick="document.execCommand('redo');"></i>
	<i class="edit-btn fa fa-bold"          onclick="document.execCommand('bold');"></i>
	<i class="edit-btn fa fa-italic"        onclick="document.execCommand('italic');"></i>
	<i class="edit-btn fa fa-underline"     onclick="document.execCommand('underline');"></i>
	<i class="edit-btn fa fa-superscript"   onclick="document.execCommand('superscript');"></i>
	<i class="edit-btn fa fa-subscript"     onclick="document.execCommand('subscript');"></i>
	<i class="edit-btn fa fa-list-ul"       onclick="document.execCommand('insertUnorderedList');"></i>
	<i class="edit-btn fa fa-align-left"    onclick="document.execCommand('justifyLeft');"></i>
	<i class="edit-btn fa fa-align-center"  onclick="document.execCommand('justifyCenter');"></i>
	<i class="edit-btn fa fa-align-right"   onclick="document.execCommand('justifyRight');"></i>
	<i class="edit-btn text"                onclick="document.execCommand('fontSize', false, 6);">H1</i>
	<i class="edit-btn text"                onclick="document.execCommand('fontSize', false, 5);">H2</i>
	<i class="edit-btn text"                onclick="document.execCommand('fontSize', false, 4);">H3</i>
	<i class="edit-btn text"                onclick="document.execCommand('fontSize', false, 3);">H4</i>
	<i class="edit-btn text"                onclick="document.execCommand('fontSize', false, 2);">H5</i>
	<i class="edit-btn text"                onclick="document.execCommand('fontSize', false, 1);">H6</i>

	<script type="text/javascript">
		var buttons = document.getElementsByClassName('edit-btn');
		for (var i = 0; i < buttons.length; i++)
			buttons[i].onmousedown=function(e){return false;}
		document.getElementsByClassName('editable-msg')[0].onmousedown=function(e){return false;}
	</script>
</div>