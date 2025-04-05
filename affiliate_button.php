<?php
// Check if affiliate_link exists and is not empty
if (!empty($row['affiliate_link'])) {
    echo "<div style='margin-top: 5px; font-size: 14px;'>Shop Now:</div>";
    echo "<a href='" . htmlspecialchars($row['affiliate_link']) . "' target='_blank' class='button'>Buy on Amazon</a>";
}
?>