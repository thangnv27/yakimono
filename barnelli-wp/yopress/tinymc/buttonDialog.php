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
                        <td colspan="2"><h3>Embed <?php echo $_GET['type'];?> button</h3></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="button_title">Button title</label></th>
                        <td><input type="text" name="title" id="button_title"/></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="button_href">Button href</label></th>
                        <td><input type="text" name="href" id="button_href"/></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"></th>
                        <td>
							
							<label for="button_target" class="label-extended"><input type="checkbox" name="target" id="button_target" value="1"/> Open link in a new window/tab</label>
						</td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
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
				var title, href, type, target;
				type = "<?php echo $_GET['type'];?>";
				title = document.getElementById('button_title').value;
				href = document.getElementById('button_href').value;
				target = document.getElementById('button_target').checked;
				target = target == 1 ? 'target="_blank"' : '';
				tinyMCEPopup.editor.execCommand('mceInsertContent', false, '[button type="'+type+'" title="'+title+'" href="'+href+'" '+target+']'+title+'[/button]' ) ;
				closeDialog();
			}

			function closeDialog(){
				tinyMCEPopup.close();
			}
		</script>
	</body>
</html>
