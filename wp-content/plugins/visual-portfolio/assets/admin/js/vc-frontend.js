/*!
 * Additional js for frontend VC
 */
jQuery(function(e){"use strict";"undefined"!=typeof vc&&vc.events.on("shortcodes:add shortcodeView:updated",function(e){if("visual_portfolio"===e.settings.base){var o=vc.$frame[0].contentWindow,t=!!o&&o.jQuery;if(t){var i=t(e.view.el).children(".vp-portfolio");i.length&&void 0!==i.vp&&i.vp()}}})});