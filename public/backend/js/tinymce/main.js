var host = window.location.href;
host = host.split('admin');
   tinymce.init({
    editor_selector : "mceEditor",
    selector: '.description-news',
    height: 200,
    plugins: ["advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"],
    toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
    toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",
    image_advtab: true,
    menubar: true, 
    toolbar_items_size: 'small',
    relative_urls: false,
    remove_script_host: false,
    external_filemanager_path:host[0]+"/media/filemanager/",
    filemanager_title: " Quản lý file",
    external_plugins: {
        "filemanager": host[0]+"media/filemanager/plugin.min.js"
    },
    video_template_callback: function(data) {
        return '<video class="video-js vjs-tech" width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls >\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
      },
});