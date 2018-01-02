<?php 
require_once '../../../../wp-config.php';

?>
<html>
	<head>
		<script type="text/javascript" src="<?php echo YoPressBase::instance()->getHomeUrl();?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
		<link rel="stylesheet" href="<?php echo YoPressBase::instance()->getCoreUrl();?>/admin/css/popups.css">
	</head>
	<body>

		
        <div class="custm-tab">
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <td colspan="2">
                            <h3>Embed video</h3>
                            <p><strong>Note:</strong> <i>You can embed various content while using the Iframe embed method.</i></p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="button_link">Link (YT/Vimeo)</label></th>
                        <td><input type="text" name="link" id="button_link"/></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="button_Iframe">Iframe embed</label></th>
                        <td><textarea id="button_iframe"></textarea></td>
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
			function insertButton( ){
				var link, Iframe, type;
				
				link = document.getElementById('button_link').value;
				if(link == '' || link == undefined){
					data = document.getElementById('button_Iframe').value;
					type = 'Iframe';
					data = data.replace(/<Iframe/ig, 'framestart');
					data = data.split('></iframe>')[0];					
					data = data.replace(/"/g, "'");
					data = data + ' endframe';
				} else {
					data = link;
					type = 'link';
				}

				tinyMCEPopup.editor.execCommand('mceInsertContent', false, '[video type="'+type+'" data="'+data+'"][/video]');
				closeDialog();
			}

			function closeDialog(){
				tinyMCEPopup.close();
			}
		</script>
	</body>
</html>
