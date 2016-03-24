(function($) 
{
	$.fn.my_wysiwyg = function(options) 
	{
		var tab = {bold : "glyphicon glyphicon-bold", italic : "glyphicon glyphicon-italic", underline:"fa fa-underline", 
		color : "", text_strike : "fa fa-strikethrough", size : "glyphicon glyphicon-text-size", 
		link : "glyphicon glyphicon-link", unlink:"fa fa-chain-broken", indent_left : "glyphicon glyphicon-indent-left", indent_right : 
		"glyphicon glyphicon-indent-right", align_left : "glyphicon glyphicon-align-left", align_center :
		"glyphicon glyphicon-align-center", align_right : "glyphicon glyphicon-align-right" , align_justify : 
		"glyphicon glyphicon-align-justify", undo : "fa fa-undo", redo : "fa fa-repeat",
		switch_code : "fa fa-code", image : "fa fa-file-image-o", ol:"fa fa-list-ol", ul:"fa fa-list-ul", save:"fa fa-floppy-o"};
		return this.each(function()
		{
			var defaut =
			{
				button : ["italic", "bold", "underline", "color", "text_strike", "size", "link","unlink","indent_left", "indent_right", "align_left", "align_center",
				"align_right", "align_justify", "undo", "redo", "switch_code", "image", "ol", "ul", "save"]
			};
			var param = $.extend(defaut, options);
			var $tool = $('<div id="toolbar"></div>');
			$tool.insertBefore(this);
			$.each (param.button, function(key_first, values_first) 
			{
				key_first = "";
				$.each (tab, function(key_two, values_two) 
				{
					values_two = "";
					if (key_two == values_first)
					{
						if (key_two == "color")
						{
							var $input = $('<input id="'+values_first+'" type="color" class="btn btn-default"/>');
							$input.appendTo("#toolbar");
						}
						else
						{
							var input = $('<button id="'+ values_first+'" type="button" class="btn btn-default"><span class="' + tab[key_two] +'"></span></button>');
							input.appendTo("#toolbar");
						}
					}
				});	
			});
			$(this).replaceWith("<div id=\"textarea\" style='height:500px;max-width:1141px;overflow : scroll; margin-left: auto; margin-right: auto; text-align: left;'contenteditable='true';>" + $(this).html() + localStorage.getItem("text") + "</div>");
			$(document).on("change","#color" ,function(){
				var color = $(this).val();
				document.execCommand('ForeColor',false, color);
			});
			$(document).on( "click", "#bold" ,function(){ 
				document.execCommand('bold',false,null);
			});
			$(document).on( "click","#italic" ,function(){
				document.execCommand('italic',false,null);
			});
			$(document).on( "click","#underline" ,function(){
				document.execCommand('underline',false,null);
			});
			$(document).on("click" ,"#size",function(){
				var size = prompt('Enter a size 1 - 7', '');
				document.execCommand('FontSize',false,size);
			});
			$(document).on("click" ,"#insert",function(){
				document.execCommand('inserthorizontalrule',false,null);
			});
			$(document).on("click", "#ol" ,function(){
				document.execCommand("InsertOrderedList", false,"newOL");
			});
			$(document).on("click","#ul" ,function(){
				document.execCommand("InsertUnorderedList", false,"newUL");
			});
			$(document).on("click","#link" ,function(){
				var linkURL = prompt("Enter the URL for this link:", "http://");
				document.execCommand("CreateLink", false, linkURL);
			});
			$(document).on("click", "#unlink", function(){
				document.execCommand("unlink",false,null);
			});
			$(document).on("click","#image" ,function(){
				var imgSrc = prompt('Enter image location', '');
				if(imgSrc !== null){
					document.execCommand('insertimage', false, imgSrc);}
				});
			$(document).on("keypress","#textarea", function(e){
				if(e.keyCode == 13){
					document.execCommand("insertParagraph", false);}	
				});
			$(document).on("click", "#text_strike", function(){
				document.execCommand("strikethrough",false, null);
			});
			$(document).on("click", "#indent_left" , function(){
				document.execCommand("useCSS",false,false);
				document.execCommand("indent", false, null);
			});
			$(document).on("click", "#indent_right" , function(){
				document.execCommand("useCSS",false,false);
				document.execCommand("outdent", false, null);
			});
			var code = true;
			$(document).on("click", "#switch_code", function(){
				var contenu = $('#textarea').html();
				if(code){
					$('#textarea').replaceWith('<textarea id="textarea" rows="30" cols="120">' + contenu + '</textarea>');
					code = !code;
				}
				else{
					$('#textarea').replaceWith("<div id=\"textarea\" style='height:500px; width:1141px; overflow: scroll' contenteditable='true';>"+ $('#textarea').text() +"</div>");
					code = true;
				}
			});
			$(document).on("click","#align_left",function(){
				document.execCommand("justifyLeft", false, null);
			});
			$(document).on("click","#align_right",function(){
				document.execCommand("justifyRight", false, null);
			});
			$(document).on("click","#align_center",function(){
				document.execCommand("justifyCenter", false, null);
			});
			$(document).on("click","#align_justify", function(){
				document.execCommand("justifyFull",false,null);
			});
			$(document).on("click","#undo", function(){
				document.execCommand("undo", false, null);
			});
			$(document).on("click","#redo", function(){
				document.execCommand("redo",false, null);
			});
			$(document).on("click", "#save", function(){
				localStorage.setItem("text",$("#textarea").html());
				localStorage.getItem("text");
			});
			setInterval(function(){
				$('#save').trigger("click");
			}, 100);
		});
};
}(jQuery));

