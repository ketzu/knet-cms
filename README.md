# knet-cms

This is the custom mini CMS (content management system) I built for my personal website: ketzu.net

Missing is the file util/config.php of the form:

```########## Database Info ##########
$db_server = '';
$db_name = '';
$db_user = '';
$db_passwd = '';

######### Create connection
$mysqli = new mysqli($db_server, $db_user, $db_passwd, $db_name);
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}```