<?php
class cpanel {
public function ConnectToServer($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if($login != false){
return "true";
}else{
return "false";
}}
public function CronJobs($data=[])
{
	$domain = $data["domain"];
$port = $data["port"] ?? '2083';
$user_name = $data["user"];
$pass = $data["pass"];
$command = $data["command"];
$minute = $data["minute"];
$day = $data["day"];
$hour = $data["hour"];
$month = $data["month"];
$weekday = $data["weekday"];
$url = "https://$domain:$port/json-api/cpanel";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($curl, CURLOPT_HEADER,0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl,CURLOPT_POSTFIELDS,"cpanel_jsonapi_version=2&cpanel_jsonapi_module=Cron&cpanel_jsonapi_func=add_line&command=$command&day=$day&hour=$hour&minute=$minute&month=$month&weekday=$weekday");
  $header[0] = "Authorization: Basic " . base64_encode($user_name.":".$pass) . "\n\r";
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = json_decode(curl_exec($curl),true);
  curl_close($curl);
  if($result["cpanelresult"]["preevent"]["result"] == 1){
  return "Set";
}else{
$error = $result["cpanelresult"]["error"];
return "Error : \n$error";
}}
public function DeleteCron($data=[])
{
	$domain = $data["domain"];
	$port = $data["port"] ?? '2083';
$user_name = $data["user"];
$pass = $data["pass"];
$line = $data["line"];
$url = "https://$domain:$port/json-api/cpanel";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($curl, CURLOPT_HEADER,0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl,CURLOPT_POSTFIELDS,"cpanel_jsonapi_version=2&cpanel_jsonapi_module=Cron&cpanel_jsonapi_func=remove_line&line=$line");
  $header[0] = "Authorization: Basic " . base64_encode($user_name.":".$pass) . "\n\r";
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = json_decode(curl_exec($curl),true);
  curl_close($curl);
  if($result["cpanelresult"]["preevent"]["result"] == 1){
  return "Deleted";
}else{
$error = $result["cpanelresult"]["error"];
return "Error\n$error";
}}
public function AccountFtp($data=[])
{
	$domain = $data["domain"];
	$port = $data["port"] ?? '2083';
$user_name = $data["user"];
$pass = $data["pass"];
$username = $data["username"];
$password = $data["password"];
$quota = $data["quota"];
$homedir = $data["addressdir"];
$url = "https://$domain:$port/json-api/cpanel";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($curl, CURLOPT_HEADER,0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl,CURLOPT_POSTFIELDS,"cpanel_jsonapi_version=2&cpanel_jsonapi_module=Ftp&cpanel_jsonapi_func=addftp&user=$username&pass=$password&quota=$quota&homedir=$homedir");
  $header[0] = "Authorization: Basic " . base64_encode($user_name.":".$pass) . "\n\r";
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = json_decode(curl_exec($curl),true);
  curl_close($curl);
  if($result["cpanelresult"]["preevent"]["result"] == 1){
  return array(
  'status' => true,
  'username' => $username,
  'password' => $password,
  'homedir' => $homedir
);
}else{
$error = $result["cpanelresult"]["error"];
return "Error : \n$error";
}}
public function DelAccountFtp($data=[])
{
 $domain = $data["domain"];
 $port = $data["port"] ?? '2083';
$user_name = $data["user"];
$pass = $data["pass"];
$username = $data["username"];
$url = "https://$domain:$port/json-api/cpanel";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($curl, CURLOPT_HEADER,0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl,CURLOPT_POSTFIELDS,"cpanel_jsonapi_version=2&cpanel_jsonapi_module=Ftp&cpanel_jsonapi_func=delftp&user=$username");
  $header[0] = "Authorization: Basic " . base64_encode($user_name.":".$pass) . "\n\r";
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = json_decode(curl_exec($curl));
  curl_close($curl);
  if($result->cpanelresult->preevent->result == 1){
  return "Deleted";
}else{
$error = $result->cpanelresult->error;
return "Error : \n$error";
}}
public function CreateDatabase($data=[]){
$domain = $data["domain"];
 $port = $data["port"] ?? '2083';
$username = $data["user"];
$pass = $data["pass"];
$name = $data["name"];
$dbname = "$username"._."$name";
$url = "https://$domain:$port/json-api/cpanel";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($curl, CURLOPT_HEADER,0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl,CURLOPT_POSTFIELDS,"cpanel_jsonapi_version=2&cpanel_jsonapi_module=MysqlFE&cpanel_jsonapi_func=createdb&db=$dbname");
  $header[0] = "Authorization: Basic " . base64_encode($username.":".$pass) . "\n\r";
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = json_decode(curl_exec($curl));
  curl_close($curl);
  if($result->cpanelresult->preevent->result == 1){
  return "Created";
}else{
$error = $result->cpanelresult->error;
return "Error : \n$error";
}}
public function DeleteDatabase($data=[]){
$domain = $data["domain"];
 $port = $data["port"] ?? '2083';
$username = $data["user"];
$pass = $data["pass"];
$name = $data["name"];
$dbname = "$username"._."$name";
$url = "https://$domain:$port/json-api/cpanel";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
  curl_setopt($curl, CURLOPT_HEADER,0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl,CURLOPT_POSTFIELDS,"cpanel_jsonapi_version=2&cpanel_jsonapi_module=MysqlFE&cpanel_jsonapi_func=deletedb&db=$dbname");
  $header[0] = "Authorization: Basic " . base64_encode($username.":".$pass) . "\n\r";
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = json_decode(curl_exec($curl));
  curl_close($curl);
  if($result->cpanelresult->preevent->result == 1){
  return "Created";
}else{
$error = $result->cpanelresult->error;
return "Error : \n$error";
}}
}
class FileManager {
public function CreateFolder($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if(ftp_mkdir($connection,$name)){
return "Created";
}else{
return "Error";
}
ftp_close($connection);
}
public function DeleteFolder($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if(ftp_rmdir($connection,$name)){
return "Deleted";
}else{
return "Error";
}
ftp_close($connection);
}
public function CreateFile($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$g = str_replace("/","\n",$name);
$j = explode("\n",$g);
$f = count($j)-1;
file_put_contents($j[$f],null);
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if (ftp_put($connection,$name,$j[$f],FTP_ASCII)) {
return "Created";
}else{
return "Error";
}
unlink($j[$f]);
ftp_close($connection);
}
public function DeleteFile($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if(ftp_delete($connection,$name)){
return "Deleted";
}else{
return "Error";
}
ftp_close($connection);
}
public function rename($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$n = $data["Newaddress"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if(ftp_rename($connection,$name,$n)){
return "true";
}else{
return "Error";
}
ftp_close($connection);
}
public function upload($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$url = $data["url"];
$name = $data["address"];
$namefile = $data["namefile"];
copy($url,$namefile);
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if (ftp_put($connection,"$name/$namefile",$namefile,FTP_ASCII)) {
return "Uploaded";
}else{
return "Error";
}
unlink($namefile);
ftp_close($connection);
}
public function InfoFile($data=[])
{
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
$size = ftp_size($connection, $name);
$g = str_replace("/","\n",$name);
$j = explode("\n",$g);
$f = count($j)-1;
if($size != false){
return array(
 'status' => true,
 'size' => round($size/1024/1024,2).'MB',
 'namefile' => $j[$f]
);
}else{
return "Error";
}
ftp_close($connection);
}
public function ListContent($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
$Array = ftp_nlist($connection,$name);
$List = null;
foreach($Array as $Name){
$List .= ''.$Name."\n";
}
return $List;
}
public function CopyFile($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name1 = $data["localaddress"];
$name2 = $data["Newaddress"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
if (ftp_put($connection,$name2,$name1,FTP_ASCII)) {
return "true";
}else{
return "Error";
}
ftp_close($connection);
}
public function FilePut($data=[]){
$domain = $data["domain"];
$user_name = $data["user"];
$pass = $data["pass"];
$name = $data["address"];
$datas = $data["data"];
$connection = ftp_connect($domain);
$login = ftp_login($connection,$user_name,$pass);
$g = str_replace("/","\n",$name);
$j = explode("\n",$g);
$f = count($j)-1;
file_put_contents($j[$f],$datas);
if (ftp_put($connection,$name,$j[$f],FTP_ASCII)) {
return "true";
}else{
return "Error";
}
unlink($j[$f]);
ftp_close($connection);
}
}
