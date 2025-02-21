<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use ArtistudioPopup\Popup;

$popup_data = Popup::get_instance()->get_popup_data();

if ($popup_data) :
    ?>
    <div id="artistudio-popup" class="popup-container" style="display: none;">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <h2><?php echo esc_html($popup_data['title']); ?></h2>
            <p><?php echo esc_html($popup_data['description']); ?></p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById("artistudio-popup").style.display = "block";
            }, 2000); // Muncul setelah 2 detik

            function closePopup() {
                document.getElementById("artistudio-popup").style.display = "none";
            }
        });
    </script>

    <style>
        .popup-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
<?php endif; ?>
