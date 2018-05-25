/*!
 * Name    : Visual Portfolio
 * Version : 1.3.0
 * Author  : nK https://nkdev.info
 */
!function(i){if("undefined"!=typeof Visual_Portfolio_TinyMCE_Options&&Visual_Portfolio_TinyMCE_Options.length){var o=[{text:"",value:""}];for(var t in Visual_Portfolio_TinyMCE_Options)o.push({text:Visual_Portfolio_TinyMCE_Options[t].title,value:Visual_Portfolio_TinyMCE_Options[t].id});tinymce.create("tinymce.plugins.visual_portfolio",{init:function(i,t){i.addButton("visual_portfolio",{type:"listbox",title:"Visual Portfolio",icon:"visual-portfolio",classes:"visual-portfolio-btn",onclick:function(){this.menu&&this.menu.$el.find(".mce-first").hide()},onselect:function(){this.value()&&i.insertContent('[visual_portfolio id="'+this.value()+'"]'),this.value("")},values:o,value:""})}}),tinymce.PluginManager.add("visual_portfolio",tinymce.plugins.visual_portfolio)}}(jQuery);