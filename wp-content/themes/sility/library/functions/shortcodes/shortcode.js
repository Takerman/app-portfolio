(function() {
	tinymce.create('tinymce.plugins.Addshortcodes', {
		init : function(ed, url) {
		
			//Add Sility shortcodes button
			ed.addButton('Sility', {
				title : 'Add Sility shortcodes',
				cmd : 'alc_sility',
				image : url + '/images/sility.png'
			});
			ed.addCommand('alc_sility', function() {
				ed.windowManager.open({file : url + '/ui.php?page=sility',  width : 604 ,	height : 520 ,	inline : 1});
			});	
		},
		getInfo : function() {
			return {
				longname : "Weblusive Shortcodes",
				author : 'Weblusive',
				authorurl : 'http://www.weblusive.com/',
				infourl : 'http://www.weblusive.com/',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('SilityShortcodes', tinymce.plugins.Addshortcodes);	
	
})();

