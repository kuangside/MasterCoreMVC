CKEDITOR.timestamp=document.querySelector("meta[name=cacheVersion]").getAttribute("content"),CKEDITOR.editorConfig=function(e){e.language="th",e.toolbar=[{name:"tools",items:["Maximize","ShowBlocks"]},{name:"document",groups:["mode","document","doctools"],items:["Source","-","Save","NewPage","Preview","Print","-","Templates"]},{name:"clipboard",groups:["clipboard","undo"],items:["Cut","Copy","Paste","PasteText","PasteFromWord","-","Undo","Redo"]},{name:"editing",groups:["find","selection","spellchecker"],items:["Find"]},{name:"insert",items:["Image","Link","Html5video","Youtube","HorizontalRule","SpecialChar","PageBreak","Iframe"]},"/",{name:"paragraph",groups:["list","indent","blocks","align","bidi"],items:["NumberedList","BulletedList","-","Outdent","Indent","-","Blockquote","CreateDiv","-","JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock","-"]},{name:"styles",items:["Styles","Format","Font","FontSize"]},{name:"colors",items:["TextColor","BGColor"]},{name:"basicstyles",groups:["basicstyles","cleanup"],items:["Bold","Italic","Underline","Strike","Subscript","Superscript","-","CopyFormatting","RemoveFormat"]},"/",{name:"tables",items:["Table","tableinsert","tabledelete","tableproperties","tablerowinsertbefore","tablerowinsertafter","tablerowdelete","tablecolumninsertbefore","tablecolumninsertafter","tablecolumndelete","tablecellsmerge"]}],e.toolbar_full=[{name:"tools",items:["Maximize","ShowBlocks"]},{name:"document",groups:["mode","document","doctools"],items:["Source","-","Save","NewPage","Preview","Print","-","Templates"]},{name:"clipboard",groups:["clipboard","undo"],items:["Cut","Copy","Paste","PasteText","PasteFromWord","-","Undo","Redo"]},{name:"editing",groups:["find","selection","spellchecker"],items:["Find"]},{name:"insert",items:["Image","Link","Html5video","Youtube","HorizontalRule","SpecialChar","PageBreak","Iframe"]},"/",{name:"paragraph",groups:["list","indent","blocks","align","bidi"],items:["NumberedList","BulletedList","-","Outdent","Indent","-","Blockquote","CreateDiv","-","JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock","-"]},{name:"styles",items:["Styles","Format","Font","FontSize"]},{name:"colors",items:["TextColor","BGColor"]},{name:"basicstyles",groups:["basicstyles","cleanup"],items:["Bold","Italic","Underline","Strike","Subscript","Superscript","-","CopyFormatting","RemoveFormat"]},"/",{name:"tables",items:["Table","tableinsert","tabledelete","tableproperties","tablerowinsertbefore","tablerowinsertafter","tablerowdelete","tablecolumninsertbefore","tablecolumninsertafter","tablecolumndelete","tablecellsmerge"]}],e.toolbar_nomal=[{name:"basicstyles",items:["Bold","Italic","Underline","Strike","-","CopyFormatting","RemoveFormat","-"]},{name:"paragraph",items:["NumberedList","BulletedList","Outdent","Indent","Blockquote","JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock","-"]},"-",{name:"insert",items:["Table","-","Image","Link","-"]},"/",{name:"styles",items:["Styles","Format","Font","FontSize","-"]},{name:"colors",items:["TextColor","BGColor","-"]}],e.toolbar_mini=[{name:"basicstyles",items:["Bold","Italic","Underline"]},{name:"paragraph",items:["NumberedList","BulletedList"]},{name:"insert",items:["Table"]},{name:"colors",items:["TextColor","BGColor"]}],e.format_tags="p;h1;h2;h3;pre",e.extraPlugins="tabletoolstoolbar,tableresize,floatpanel,panelbutton,quicktable,btquicktable",e.removePlugins="easyimage,simage,emoji,cloudservices";var t=document.querySelector("meta[name=homepage]").getAttribute("content").replace("/home",""),o=document.querySelector("meta[name=moduleName]").getAttribute("content"),a=document.querySelector("meta[name=csrf-token]").getAttribute("content");let i=o&&"home"!=o?"/"+o:"";e.filebrowserUploadUrl=t+"/ckupload"+i+"?_token="+a,e.filebrowserUploadMethod="form",e.image_removeLinkByEmptyURL=!0,e.image_previewText=CKEDITOR.tools.repeat("ตัวอย่างรูปภาพ ",100),e.removeDialogTabs="image:advanced;link:advanced"};
