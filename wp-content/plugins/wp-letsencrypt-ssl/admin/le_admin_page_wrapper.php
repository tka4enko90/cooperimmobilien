<?php

/**
 * @package WP Encryption
 *
 * @author     Go Web Smarty
 * @copyright  Copyright (C) 2019-2020, Go Web Smarty
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @link       https://gowebsmarty.com
 * @since      Class available since Release 5.0.0
 *
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */
require_once WPLE_DIR . 'classes/le-trait.php';

class WPLE_Admin_Page
{
  public function __construct()
  {
    add_action('admin_enqueue_scripts', array($this, 'wple_admin_page_styles'));
  }

  public function wple_admin_page_styles()
  {
    wp_enqueue_style(WPLE_NAME, WPLE_URL . 'admin/css/le-admin.min.css', FALSE, WPLE_PLUGIN_VERSION, 'all');

    wp_enqueue_script(WPLE_NAME . '-popper', WPLE_URL . 'admin/js/popper.min.js', array('jquery'), WPLE_PLUGIN_VERSION, true);
    wp_enqueue_script(WPLE_NAME . '-tippy', WPLE_URL . 'admin/js/tippy-bundle.iife.min.js', array('jquery'), WPLE_PLUGIN_VERSION, true);
    wp_enqueue_script(WPLE_NAME, WPLE_URL . 'admin/js/le-admin.js', array('jquery'), WPLE_PLUGIN_VERSION, true);
  }

  public function generate_page($pagecontent = '')
  {
    $html = '
    <div class="wple-header">
    <div>
      <img src="' . WPLE_URL . 'admin/assets/logo.png" class="wple-logo"/> <span class="wple-version">v' . WPLE_PLUGIN_VERSION . '</span>
    </div>';

    WPLE_Trait::wple_headernav($html);

    $html .= '</div>';

    if (isset($_GET['page']) && $_GET['page'] != 'wp_encryption_force_https') {
      $html .= '<div id="wple-sslgen" class="wple-subpages">
    <div class="wple-other-content">' . $pagecontent . '</div>
    <div class="wple-other-plugins">
      <div><a href="https://oneclickplugins.com/go-viral/?utc_campaign=wordpress&utm_source=otherplugins&utm_medium=wpadmin" title="Opens in new tab" target="_blank"><img src="' . WPLE_URL . 'admin/assets/goviral-logo.png"/><h3>All in one social plugin</h3></a></div>
      <div><a href="https://wordpress.org/plugins/modern-addons-elementor/" title="Opens in new tab" target="_blank"><img src="' . WPLE_URL . 'admin/assets/modernaddons-logo.png"/><h3>Premium widgets for Elementor</h3></a></div>
    </div>
    </div>';
    } else {
      $html .= '<div id="wple-sslgen">
    <div>' . $pagecontent . '</div>
    </div>';
    }
    echo $html;
  }

  protected function wple_force_ssl_htaccess()
  {

    if (is_writable(ABSPATH . '.htaccess')) {

      $htaccess = file_get_contents(ABSPATH . '.htaccess');

      if (FALSE === stripos($htaccess, 'WP_Encryption_Force_SSL')) {
        $getrules = WPLE_Trait::compose_htaccess_rules();

        $wpruleset = "# BEGIN WordPress";

        if (strpos($htaccess, $wpruleset) !== false) {
          $newhtaccess = str_replace($wpruleset, $getrules . $wpruleset, $htaccess);
        } else {
          $newhtaccess = $htaccess . $getrules;
        }

        insert_with_markers(ABSPATH . '.htaccess', '', $newhtaccess);
      }
    } else {
      wp_die(esc_html__('HTACCESS not writable! Please go back and use alternate method of forcing SSL.', 'wp-letsencrypt-ssl'));
      exit();
    }
  }
}
