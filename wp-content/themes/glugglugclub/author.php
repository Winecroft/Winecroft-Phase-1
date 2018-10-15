<?php
/** dont want to use author pages so redirect permanently to homepage */
header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
?>