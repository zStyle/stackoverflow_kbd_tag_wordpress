(function() {
    tinymce.create('tinymce.plugins.quote', {
        init : function(ed, url) {
            ed.addButton('kbd', {
                title : 'Add keyboard',
                image : url+'/kbd.png',
                onclick : function() {
                     ed.selection.setContent('<kbd>' + ed.selection.getContent() + '</kbd>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('kbd', tinymce.plugins.quote);
})();

