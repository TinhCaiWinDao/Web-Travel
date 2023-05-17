<?php

if (1 > 2) {
    echo "đúng";
} else {
    // echo 'onload = "return alert("Xóa thất bại!!")"';
    echo "Sai";
?>
    <div onload="return alert('Xóa thất bại')"></div>
<?php
}
