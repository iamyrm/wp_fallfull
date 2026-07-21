<?php

/**
 * Style ALL ACF Field Group Heading Titles
 */
function fallfull_style_acf_group_title()
{
    echo '<style>
        /* Fixed syntax error and strengthened selectors */
        #wpbody .postbox-header h2,
        #wpbody .postbox[id^="acf-"] .postbox-header h2,
        #wpbody .postbox[id^="acf-"] h2.hndle {
            color: #F28123 !important; 
            font-weight: bold !important;
        }
    </style>';
}
add_action('admin_head', 'fallfull_style_acf_group_title');
