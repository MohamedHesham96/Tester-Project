<?php
    session_destroy();
    session_unset();
    echo '<script>document.location.href="../index.html"</script>';
    