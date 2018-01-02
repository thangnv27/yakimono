<?php 

require_once '../../../../wp-config.php';

?>

<html>
	<head>
		<script type="text/javascript" src="<?php echo home_url();?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
		<link rel="stylesheet" href="<?php echo YoPressBase::instance()->getCoreUrl();?>/admin/css/popups.css">
	</head>
	<body>

        
        <div class="custm-tab">
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <td colspan="2"><h3>Embed table</h3></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="table_row">Table rows</label></th>
                        <td><input type="text" name="title" id="table_row"/></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="table_columns">Table columns</label></th>
                        <td><input type="text" name="href" id="table_columns"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="button" class="button-primary" name="insert" value="Insert" title="Insert" onclick="insertButton();">
                            <input type="button" class="button-primary" name="cancel" value="Cancel" title="Close" onclick="closeDialog();">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

		<script type="text/javascript">
			function insertButton() {
				var row, column;
				
				row = document.getElementById('table_row').value || 1;
				columns = document.getElementById('table_columns').value || 1;
				
				var code ='[table]<br/>';
				
				code += '[thead]<br/>[row]<br/>';
				
				for(j=0; j<columns; j++) {
					code += '[th]Your header goes here[/th]<br/>';
				}

				code += '[row]<br/>[/thead]<br/>';
				code += '<br/>';

				for(i=0; i < row; i++) {
					code += '[row]<br/>';
					for(j=0;j<columns; j++) {
						code += '[column]Your text goes here[/column]<br/>';
					}

					code += '[/row]<br/>';
				}

				code += '[/table]';
				tinyMCEPopup.editor.execCommand('mceInsertContent', false, code );

				closeDialog();
			}

			function closeDialog(){
				tinyMCEPopup.close();
			}
		</script>
	</body>
</html>
