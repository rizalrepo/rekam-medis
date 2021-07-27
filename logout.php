<?php

session_start();

unset($_SESSION["id_user"]);
// unset($_SESSION["id_pelapor"]);
unset($_SESSION["level"]);
// unset($_SESSION["nm_user"]);
// unset($_SESSION["nm_pelapor"]);


session_unset();
session_destroy();

echo "<meta http-equiv='refresh' content='0; url=index'>";
