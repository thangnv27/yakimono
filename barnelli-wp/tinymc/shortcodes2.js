tinymce.PluginManager.add('yopress', function(editor, url) {
	editor.addButton( 'yopress', function() {
		var currentCat = "";
		var data = {
			title: 'Shortcodes',
			'text': 'YoPress',
			type: 'menubutton',
			onselect: function(e) {
				if (e.control._value) {
					editor.insertContent(e.control._value);
				}
			},
			menu: [
				{
					text:'Columns', menu:[
						{ text:'2 Columns ( 50% / 50% )', value:"[row]"+
						" [column6][/column6]"+
						" [column6][/column6]"+
						"[/row]"
						},
						{ text:'2 Columns ( 66% / 33% )', value:"[row]"+
						" [column8][/column8]"+
						" [column4][/column4]"+
						"[/row]"
						},
						{ text:'2 Columns ( 33% / 66% )', value:"[row]"+
						" [column4][/column4]"+
						" [column8][/column8]"+
						"[/row]"
						},
						{ text:'3 Columns ( 33% / 33% / 33% )', value:"[row]"+
						" [column4][/column4]"+
						" [column4][/column4]"+
						" [column4][/column4]"+
						"[/row]" }
					]
				},
				{
					text:'Dropcaps', menu:[
						{ text:'Light', value:'[dropcap style="light"][/dropcap]' },
						{ text:'Dark', value:'[dropcap style="dark"][/dropcap]' }
					]
				},
				// {
				// 	text:'Accordion', value: '[yoaccordion]'+
				// 	' [yoaccordionelement icon="fa-icon" title=""]Text 1[/yoaccordionelement]'+
				// 	' [yoaccordionelement icon="fa-icon" title=""]Text 2[/yoaccordionelement]'+
				// 	' [yoaccordionelement icon="fa-icon" title=""]Text 3[/yoaccordionelement]'+
				// 	'[/yoaccordion]'
				// },
				// {
				// 	text:'Alert Box', menu:[
				// 		{ text: 'Red', value: '[yoalert style="red"]Text[/dropcap]' },
				// 		{ text: 'Green', value: '[dropcap style="green"]Text[/dropcap]' },
				// 		{ text: 'Yellow', value: '[dropcap style="yellow"]Text[/dropcap]' }
				// 	]
				// },
				{
					text:'Dividers', menu:[
						{ text: 'Hair Line (1px)', value: '[yodivider style="hairline" /]' },
						{ text: 'Thick Line (3px)', value: '[yodivider style="thickline" /]' },
						{ text: 'Dotted Line', value: '[yodivider style="dottedline" /]' },
						{ text: 'Dashed Line', value: '[yodivider style="dashedline" /]' },
						// { text: 'Go To Top Line', value: '[yodivider style="gototopline" /]' }
					]
				},
				// {
				// 	text:'Google Map', menu:[
				// 		{ text: 'Roadmap', value: '[yomap type="roadmap" lat="50" lng="17" width="" height="" marker="" /]' },
				// 		{ text: 'Satelite', value: '[yomap type="satelite" lat="50" lng="17" width="" height="" marker="" /]' },
				// 		{ text: 'Hybrid', value: '[yomap type="hybrid" lat="50" lng="17" width="" height="" marker="" /]' },
				// 		{ text: 'Terrain', value: '[yomap type="terrain" lat="50" lng="17" width="" height="" marker="" /]' },
				// 	]
				// },
				// {
				// 	text:'Image Animation', menu:[
				// 		{ text: 'Slide Left', value: '[yoimageanimation style="slideleft" /]' },
				// 		{ text: 'Slide Right', value: '[yoimageanimation style="slideright" /]' },
				// 		{ text: 'Slide Up', value: '[yoimageanimation style="slideup" /]' },
				// 		{ text: 'Slide Down', value: '[yoimageanimation style="slidedown" /]' },
				// 		{ text: 'Fade In', value: '[yoimageanimation style="fadein" /]' },
				// 	]
				// },
				{
					text:'Event Calendar', value: '[yocalendar/]'
				},
				// {
				// 	text:'Tabs', menu:[
				// 		{ text: 'Horizontal Left', value: '[yotab style="horizontalleft"]'+
				// 		' [yotabelement title="Title 1"]Content 1[/yotabelement]'+
				// 		' [yotabelement title="Title 2"]Content 2[/yotabelement]'+
				// 		' [yotabelement title="Title 3"]Content 3[/yotabelement]'+
				// 		'[/yotab]'
				// 		},
				// 		{ text: 'Horizontal Right', value: '[yotab style="horizontalright"]'+
				// 		' [yotabelement title="Title 1"]Content 1[/yotabelement]'+
				// 		' [yotabelement title="Title 2"]Content 2[/yotabelement]'+
				// 		' [yotabelement title="Title 3"]Content 3[/yotabelement]'+
				// 		'[/yotab]'
				// 		},
				// 		{ text: 'Vertical Left', value: '[yotab style="verticalleft"]'+
				// 		' [yotabelement title="Title 1"]Content 1[/yotabelement]'+
				// 		' [yotabelement title="Title 2"]Content 2[/yotabelement]'+
				// 		' [yotabelement title="Title 3"]Content 3[/yotabelement]'+
				// 		'[/yotab]'
				// 		},
				// 		{ text: 'Vertical Right', value: '[yotab style="verticalright"]'+
				// 		' [yotabelement title="Title 1"]Content 1[/yotabelement]'+
				// 		' [yotabelement title="Title 2"]Content 2[/yotabelement]'+
				// 		' [yotabelement title="Title 3"]Content 3[/yotabelement]'+
				// 		'[/yotab]'
				// 		},
				// 	]
				// },
				// {
				// 	text:'Testimonials', menu:[
				// 		{ text: 'Image', value: '[yotestimonial image="" text="" name="" role="" link="" /]' },
				// 		{ text: 'Slider', value: '[yotestimonialslider]'+
				// 		' [yotestimonialsliderelement image="" text="Text1" name="" role="" link="" /]'+
				// 		' [yotestimonialsliderelement image="" text="Text2" name="" role="" link="" /]'+
				// 		' [yotestimonialsliderelement image="" text="Text3" name="" role="" link="" /]'+
				// 		'[/yotestimonialslider]'
				// 		}
				// 	]
				// },
			]
		};

		return data;
	});
});