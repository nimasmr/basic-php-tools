<?php
require('userinfo.php');
require_once('phpqrcode/qrlib.php');
require_once('./phpwhois/src/Phois/Whois/Whois.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic PHP Tools</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body id="bg-center" class="font-b">
    <div class="container-fluid">
        <div class="bg-top">
            <div class="row justify-content-center text-center font-b">
                <div class="col-2">
                    <p>server ip <br><?php echo $_SERVER['HTTP_HOST']; ?></p>
                </div>
                <div class="col-2">
                    <p>public ip <br><?php $puip = exec('curl icanhazip.com');
                                        echo $puip;
                                        if (empty($puip)) {
                                            echo 'check your internet';
                                        }
                                        ?></p>
                </div>
                <div class="col-4 mt-3">
                    <h4 class="text-center">Basic php tools🔧</h4>
                </div>
                <div class="col-2">
                    <p>operating system <br> <?= userinfo::get_os(); ?></p>
                </div>
                <div class="col-2">
                    <form action="./tools.php" method="post">
                        <button type="submit" class="bg-submit mt-3" name="shutdown">Shutdown</button>
                        <?php if (isset($_POST['shutdown'])) {
                            exec('shutdown /s /t 5');
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center mt-5">
            <div class="col-6 text-center">
                <form action="tools.php" method="post">
                    <div class="dropdown mb-2">
                        <one class="dropdown-toggle bg-one" type="one" data-bs-toggle="dropdown" aria-expanded="false">Qrcode</one>
                        <div class="dropdown-menu p-3 bg-dark text-center">
                            <input type="text" class="rounded p-2" name="text_qr" placeholder="Type your text" style="background: #2D353E; color:#86919B; border:none ;"><br><br><input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit4" value="Send">
                        </div>
                    </div><br>
                    <div class="btn-group">
                        <a class="text-decoration-none dropdown-toggle bg-one " data-bs-toggle="dropdown" aria-expanded="false">Port system</a>
                        <div class="dropdown-menu bg-black">
                            <input class="dropdown-item text-success" type="submit" name="submit-1-1" value="Port Status System">
                            <input class="dropdown-item text-success" type="submit" name="submit-1-2" value="Statistics Protocols">
                            <input class="dropdown-item text-success" type="submit" name="submit-1-3" value="Displays the routing table">
                        </div>
                    </div><br><br>
                    <div class="text-left text-a-left">
                        <input type="submit" name="submit2" class="bg-one" style="border-radius: 5px;" value="Get MAC"></input>
                        <input type="submit" name="submit3" class="bg-one " value="Tasklist"></input><br><br>
                        <input type="submit" name="submit5" class="bg-one mb-2" value="Password generator"></input><br><br>

                        <div class="dropdown mb-3">
                            <one class="dropdown-toggle bg-one" type="one" data-bs-toggle="dropdown" aria-expanded="false">Base64
                                Encode/Decode</one>
                            <div class="dropdown-menu p-3 bg-dark text-center">
                                <input type="text" class="rounded p-2" name="b64_e" placeholder="Type your text (Encode)" style="background: #2D353E; color:#86919B; border:none ;"><br><br><input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit-6-1" value="Encode">
                                <hr>
                                <input type="text" class="rounded p-2" name="b64_d" placeholder="Type your text (Decode)" style="background: #2D353E; color:#86919B; border:none ;"><br><br><input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit-6-2" value="Decode">
                            </div>
                        </div><br>
                        <div class="dropdown mb-2">
                            <one class="dropdown-toggle bg-one " type="one" data-bs-toggle="dropdown" aria-expanded="false">Target IP info</one>
                            <div class="dropdown-menu p-3 bg-dark text-center">
                                <input type="text" class="rounded p-2" name="ip_info" placeholder="Type your IP" style="background: #2D353E; color:#86919B; border:none ;"><br><br><input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit7" value="Send">
                            </div>
                            <one class="dropdown-toggle bg-one" type="one" data-bs-toggle="dropdown" aria-expanded="false">Target whois</one>
                            <div class="dropdown-menu p-3 bg-dark text-center">
                                <input type="text" class="rounded p-2" name="domain_whois" placeholder="Do not enter http,https,/" style="background: #2D353E; color:#86919B; border:none ;"><br><br><input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit8" value="Send">
                            </div>
                        </div><br>
                        <div class="btn-group">
                            <a class="text-decoration-none dropdown-toggle bg-one " data-bs-toggle="dropdown" aria-expanded="false">DNS recorder(A - MX - NS - TXT - ALL)</a>
                            <div class="dropdown-menu bg-dark p-3">
                                <input class="dropdown-item" type="text" name="text_dns" style="background: #2D353E; color:#86919B; border:none ;" placeholder="Fill the field first"><br>
                                <input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit-9-1" value="A">
                                <input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit-9-2" value="MX">
                                <input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit-9-3" value="NS">
                                <input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit-9-4" value="TXT">
                                <input type="submit" class="btn btn-outline-secondary text-white text-center" name="submit-9-5" value="ALL">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div class="col-6 text-white">
                    <div id="bg-center-card" class="rounded p-2 overflow-scroll font-a" style="height: 500px; width:500px;">
                        <h5 class="text-center font-b">output✔️</h5>
                        <hr>
                        <?php
                        if (isset($_POST['submit-1-1'])) {

                            echo '<font face=Courier New >
                                 <table border=1 style="border: 1px solid white; font-size:30px;">
                                 <th colspan=4 style="border: 1px solid white; text-align:center;" align=center >Port Status</th>
                                 <tr align=center>
                                 <td width=100 style="border: 1px solid white;">Host/IP</td><td width=100 style="border: 1px solid white;">Ports</td><td width=100 style="border: 1px solid white;">Status</td>
                                 </tr>';

                            $host = '127.0.0.1';
                            $ports = array(21, 22, 25, 80, 81, 110, 443, 3306, 3389);
                            foreach ($ports as $port) {
                                $connection = @fsockopen($host, $port);
                                echo '<tr align=center>';
                                echo '<td width=200 align=center style="border: 1px solid white;">' . $host . '</td>';
                                echo '<td width=100 align=center style="border: 1px solid white;">' . $port . '</td>';

                                if (is_resource($connection)) {
                                    echo "<td width=200 align=center style='color:green; border: 1px solid white;'> " . getservbyport($port, 'tcp') . " is open </td>";
                                    fclose($connection);
                                } else {
                                    echo "<td align=center face=Courier New style='color:red; border: 1px solid white;'> is closed </td>";
                                }

                                echo '</tr>';
                            }
                            echo '</table></font>';
                        }
                        if (isset($_POST['submit-1-2'])) {
                            $shell = shell_exec('netstat -s'); ?>
                        <?php echo nl2br($shell);
                        }

                        if (isset($_POST['submit-1-3'])) {
                            $shell = shell_exec('netstat -r');
                            echo nl2br($shell);
                        }

                        if (isset($_POST['submit2'])) {
                            $getmac =  shell_exec('getmac');
                            echo nl2br($getmac);
                        }

                        if (isset($_POST['submit3'])) {
                            $outputFile = 'tasklist_output.txt';
                            $command = "tasklist > $outputFile";
                            exec($command);
                        }
                        if (isset($_POST['submit3'])) {
                            echo 'Your task status is downloaded';
                        }
                        if (isset($_POST['submit4'])) {

                            $text = $_POST['text_qr'];
                            $file = 'qrcode.png';
                            $size = 10;
                            $ecc = 'L';
                            QRcode::png($text, $file, $ecc, $size);
                            echo '<img src="' . $file . '" alt="QR Code">';
                        }
                        if (isset($_POST['submit5'])) {
                            function generatePassword($length = 8)
                            {
                                $characters = '0123456789!@#$%^&*()_+abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+';
                                $password = '';

                                for ($i = 0; $i < $length; $i++) {
                                    $index = rand(0, strlen($characters) - 1);
                                    $password .= $characters[$index];
                                }
                                return $password;
                            }
                            $password = generatePassword();
                            echo 'Your Password -> ' . $password;
                        }
                        if (isset($_POST['submit-6-1'])) {
                            $b64_e = $_POST['b64_e'];
                            echo "Your text encoded -> " . base64_encode($b64_e);
                        }
                        if (isset($_POST['submit-6-2'])) {
                            $b64_d = $_POST['b64_d'];
                            echo "Your text decoded -> " . base64_decode($b64_d);
                        }
                        if (isset($_POST['submit7'])) {
                            $ip_info = $_POST['ip_info'];
                            $a = shell_exec('curl http://ip-api.com/json/'.$ip_info.'?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,isp,org,as,query');
                            echo ($a);
                        }
                        if (isset($_POST['submit8'])) {
                            $sld = $_POST['domain_whois'];
                            $domain = new Phois\Whois\Whois($sld);
                            $whois_answer = $domain->info();
                            echo nl2br($whois_answer);
                            
                            if ($domain->isAvailable()) {
                                echo "Domain is available\n";
                            } else {
                                echo "Domain is registered\n";
                        }
                        }
                        if (isset($_POST['submit-9-1'])) {
                            $text_dns = $_POST['text_dns'];
                            $c = dns_get_record($text_dns, DNS_A);
                            function compareRecords($a, $b)
                            {
                                return strcmp($a['host'], $b['host']);
                            }
                            usort($c, 'compareRecords');
                            foreach ($c as $record) {
                                echo implode(' | ', $record) . "\n";
                            }
                        }
                        if (isset($_POST['submit-9-2'])) {
                            $text_dns = $_POST['text_dns'];
                            $d = dns_get_record($text_dns, DNS_MX);
                        
                            function compareRecords($a, $b) {
                                return strcmp($a['pri'], $b['pri']);
                            }
                        
                            usort($d, 'compareRecords');
                            foreach ($d as $record) {
                                echo implode(' | ', $record) . "\n";
                            }
                        }
                        if (isset($_POST['submit-9-3'])) {
                            $text_dns = $_POST['text_dns'];
                            $e = dns_get_record($text_dns, DNS_NS);
                        
                            function compareRecords($a, $b) {
                                return strcmp($a['target'], $b['target']);
                            }
                            
                            usort($e, 'compareRecords');
                        
                            foreach ($e as $record) {
                                echo implode(' | ', $record) . "\n";
                            }
                        }
                        if (isset($_POST['submit-9-4'])) {
                            $text_dns = $_POST['text_dns'];
                            $f = dns_get_record($text_dns, DNS_TXT);
                            print_r($f);
                        }
                        if (isset($_POST['submit-9-5'])) {
                            $text_dns = $_POST['text_dns'];
                            $g = dns_get_record($text_dns, DNS_ALL);
                            print_r($g);
                        }
                        ?>
                    </div><br><br>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>