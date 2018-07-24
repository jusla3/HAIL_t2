(function ($) {

    var config = {
        slug: 'twitterfeed',
        title: 'Twitter Feed Shortcodes',
        icon: ' dashicons dashicons-twitter',
        popups: [
            {
                id: 'statictweets',
                img: 'static-icon.gif',
                label: 'Static Tweets',
                title: 'Insert Static Tweets'
            },
            {
                id: 'scrollingtweets',
                img: 'scrolling-icon.gif',
                label: 'Scrolling Tweets',
                title: 'Insert Scrolling Tweets'
                , disabled: true
            },
            {
                id: 'slidingtweets',
                img: 'sliding-icon.gif',
                label: 'Sliding Tweets',
                title: 'Insert Sliding Tweets'
                , disabled: true
            }
        ]
    };

    // Add the button to the editor
    tinymce.PluginManager.add(config.slug, function (editor, url) {

        var img_url = url.replace('/assets/js', '/assets/img/');

        editor.addButton(config.slug + '_button', {
            text: null,
            icon: config.icon,
            title: config.title,
            onclick: function () {
                
                // Open a window showing all icon boxes
                editor.windowManager.open({
                    title: config.title,
                    width: config.popups.length*80 + (config.popups.length-1)*15 + 50,
                    height: 80 + 50,
                    body: [{
                        classes: 'twitterfeed', // Adds the class 'mce-twitterfeed' to the container div
                        type: 'container',
                        html: genHTML(config.popups, config.max_cols)
                    }],
                    buttons: [] // Hide footer
                });

                // Click event for each icon box
                $('.editor-popup-icon').click(function () {

                    // Disabled button, do nothing
                    if ($(this).hasClass('disabled')) {
                        return;
                    }

                    // Close the previous dialog
                    editor.windowManager.close();
                    editor.execCommand($(this).attr('data-cmd'));
                });
            },
            onPostRender: function() {
                var _this = this;   // reference to the button itself
                editor.on('NodeChange', function(e) {
                    //activate the button if the current node is an Amarkal shortcode node
                    var $node = $(editor.selection.getNode()),
                        shortcode = decodeURIComponent($node.attr('data-amarkal-shortcode')),
                        is_active = shortcode.match(/(statictweets|scrollingtweets|slidingtweets)/) !== null;

                        _this.active( is_active );
                })
            }
        });

        /**
         * Generate the HTML for the icon boxes popup window.
         * 
         * @param {Object} buttons
         * @param {number} maxCols
         * @returns {String} The generated HTML.
         */
        function genHTML(buttons, maxCols) {
            var html = '';
            for (var i = 0; i < buttons.length; i++) {
                var button = buttons[i];
                html += '<div class="editor-popup-icon' + (button.disabled ? ' disabled' : '') + '" title="' + button.title + '" data-cmd="tf_' + button.id + '">';
                html += '<img src="' + img_url + button.img + '"/>';
                html += '<h3>' + button.label + '</h3>';
                html += '</div>';
            }

            return html;
        }
    });
})(jQuery);