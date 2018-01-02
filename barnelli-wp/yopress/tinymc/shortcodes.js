/* yopress Button */
(function() {
	tinymce.create('tinymce.plugins.yopress', {
		menu : null,
		editor : null,
		url : '',
		init : function(ed, url) {
			this.url = url;
			ed.addCommand('yopressCommand', function() {
			});

			ed.addCommand('buttonDialogBox', function() {
				var type = (arguments[0] ? arguments[0] : 'small');

				ed.windowManager.open({
					file : url + '/buttonDialog.php?type='+type+'&url='+url,
					width : 500 + ed.getLang('example.delta_width', 0),
					height : 210 + ed.getLang('example.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url,
					some_custom_arg : ''
				});
			});

			ed.addCommand('tableDialogBox', function() {

				ed.windowManager.open({
					file : url + '/tableDialog.php?url='+url,
					width : 500 + ed.getLang('example.delta_width', 0),
					height : 180 + ed.getLang('example.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url,
					some_custom_arg : ''
				});
			});

			ed.addCommand('iconDialogBox', function() {
				ed.windowManager.open({
					file : url + '/iconDialog.php?url='+url,
					width : 500 + ed.getLang('example.delta_width', 0),
					height : 460 + ed.getLang('example.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url,
					some_custom_arg : ''
				});
			});

			ed.addCommand('videoDialogBox', function() {
				ed.windowManager.open({
					file : url + '/videoDialog.php?url='+url,
					width : 500 + ed.getLang('example.delta_width', 0),
					height : 380 + ed.getLang('example.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url,
					some_custom_arg : ''
				});
			});

			ed.addCommand('mapDialogBox', function() {
				ed.windowManager.open({
					file : url + '/mapDialog.php?url='+url,
					width : 600 + ed.getLang('example.delta_width', 0),
					height : 570 + ed.getLang('example.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url,
					some_custom_arg : ''
				});
			});
	
			this.editor = ed;
		},
		createControl : function(n, cm) {
			var yooressdropmenu = null;

			if(n == 'yopress') {
				c = cm.createSplitButton(n, {title : n, cmd : 'yopressCommand', scope : this, image : this.url+'/tinymc-yo.png'});
				t = this;

				c.onRenderMenu.add(function(c, m) {
					m.add({title : 'Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

					var sub1 = m.addMenu({title: "Buttons"});

					sub1.add({title: 'Button small',onclick: function() {
						t.editor.execCommand('buttonDialogBox', 'small');
					}});

					sub1.add({title: 'Button medium',onclick: function() {
						t.editor.execCommand('buttonDialogBox', 'medium');
					}});

					sub1.add({title: 'Button big',onclick: function() {
						t.editor.execCommand('buttonDialogBox', 'xxl');
					}});

					var gridSubmenu = m.addMenu({title: "Grid"});
					
					gridSubmenu.add({title: '2 collumns', onclick: function() {
						t.editor.execCommand('mceInsertContent', false, '[grid]<br/>[span6]Your text here[/span6]<br/>[span6]Your text here[/span6]<br/>[/grid]');
					}});

					gridSubmenu.add({title: '3 columns', onclick: function() {
						t.editor.execCommand('mceInsertContent', false, '[grid]<br/>[span4]Your text here[/span4]<br/>[span4]Your text here[/span4]<br/>[span4]Your text here[/span4]<br/>[/grid]');
					}});

					gridSubmenu.add({title: '4 columns', onclick: function() {
						t.editor.execCommand('mceInsertContent', false, '[grid]<br/>[span3]Your text here[/span3]<br/>[span3]Your text here/span3]<br/>[span3]Your text here[/span3]<br/>[span3]Your text here[/span3]<br/>[/grid]' );
					}});

					m.add({title: "Icons", onclick: function() {
						t.editor.execCommand('iconDialogBox');
					}});

					m.add({title: "Table", onclick: function() {
						t.editor.execCommand('tableDialogBox');
					}});

					m.add({title: "Video", onclick: function() {
						t.editor.execCommand('videoDialogBox');
					}});

					m.add({title: "Map", onclick: function() {
						t.editor.execCommand('mapDialogBox');
					}});

				});

				return c;
			}

			return yopressdropmenu;
		}
	});

	tinymce.PluginManager.add('yopress', tinymce.plugins.yopress);
})();