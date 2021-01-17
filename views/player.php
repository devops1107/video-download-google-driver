<html>
        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>Dewamovie21 - Download Streaming Sub Indo</title>
            <meta name="maValidation" content="d132ca12a2385a8f8bbad2fc2101ec5e" />

            <script type="text/javascript" src="//content.jwplatform.com/libraries/0P4vdmeO.js"></script>
            <!--<script data-cfasync="false" src="https://content.jwplatform.com/libraries/deLKbptw.js"></script>
            <script>jwplayer.key="SsdKfUwqZbtw6f+uUB+OOOQ7x7icPGDFp5R6sg==";</script>-->
            <script data-cfasync="false" src='/views/assets/js/jquery.js'> </script>
            <!--<script type="text/javascript" src="https://jwpsrv.com/library/AqFhtu2PEeOMGiIACyaB8g.js"></script>-->
            <link rel="stylesheet" type="text/css" href="/views/assets/css/player.css?v=1.2">
            <link rel="stylesheet" type="text/css" href="/views/assets/css/jwplayer.css">
            <style type="text/css">
                /* The Modal (background) */
                #resume {
                    min-height: calc(100vh - 60px);
                    display: none; /* Hidden by default */
                    position: fixed; /* Stay in place */
                    z-index: 1; /* Sit on top */
                    left: 0;
                    top: 0;
                    width: 100%; /* Full width */
                    height: 100%; /* Full height */
                    justify-content: center;
                    overflow: auto; /* Enable scroll if needed */
                    flex-direction: column;
                    background-color: rgb(0,0,0); /* Fallback color */
                    background-color: rgba(0,0,0,1); /* Black w/ opacity */

                @media(max-width: 768px) {
                    min-height: calc(100vh - 20px);
                }
                }

                /* Modal Content/Box */
                .infoPlayer-content {
                    color: #ccc;
                    background-color: rgba(50,50,50,0.8);
                    margin: 15% auto; /* 15% from the top and centered */
                    padding: 20px;
                    border: 1px solid #888;
                    width: 80%; /* Could be more or less, depending on screen size */
                }

                /* The Close Button */
                .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                }

                .close:hover,
                .close:focus {
                    color: black;
                    text-decoration: none;
                    cursor: pointer;
                }
                #myvideo .jw-text-track-cue {
                    color: rgb(1, 233, 255)!important;
                    background-color: rgba(0, 0, 0, 0.53)!important;
                    font-family: "Trebuchet MS", "Sans Serif";
                }
            </style>
              </head>
        <body>
        <div id="resume">
            <div class="pop-wrap">
                <div class="pop-main">
                    <div class="pop-html">
                        <div class="pop-block">
                            <div id="myConfirm" class="myConfirm">
                                <p>
                                    <button id="resume_nooo" class="button" onclick="nolanjut()">No, Thanks</button>
                                    <button id="resume_yesss" class="button" onclick="yeslanjut()">Yes, Please</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loading-container"><div class="loading-ani"></div><div class="loading-text">loading video...</div></div>
        <div id="myvideo"></div>
        <script>
            //<![CDATA[

            <?php
                    global $settings;
$sql = "select * from links where short='" . $id . "'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()):
        $s = new WDrive();
        $iklan = $settings->iklan;
        $gid = $row['file'];
        $title = $row['name'];
        $type = '';
        ?>
        var type = "video/mp4";
        var cookie=
        {
        getItem: function (sKey) {
        if (!sKey) { return null; }
        return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
        },
        setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
        if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
        var sExpires = "";
        if (vEnd) {
        switch (vEnd.constructor) {
        case Number:
        sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
        break;
        case String:
        sExpires = "; expires=" + vEnd;
        break;
        case Date:
        sExpires = "; expires=" + vEnd.toUTCString();
        break;
        }
        }
        document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
        return true;
        },
        removeItem: function (sKey, sPath, sDomain) {
        if (!this.hasItem(sKey)) { return false; }
        document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "");
        return true;
        },
        hasItem: function (sKey) {
        if (!sKey) { return false; }
        return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
        },
        keys: function () {
        var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
        for (var nLen = aKeys.length, nIdx = 0; nIdx < nLen; nIdx++) { aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]); }
        return aKeys;
        }
        };
        var logMessage=function(message)
        {
        var xyz = document.getElementById('myConfirm').innerHTML;
        document.getElementById('myConfirm').innerHTML = '<p>'+ message +'</p>' + xyz;
        };
        var modal=document.getElementById('resume');
        var yesbutton = document.getElementById("resume_yesss");
        var nobutton = document.getElementById("resume_nooo");

        var player=jwplayer("myvideo");
        var config=
        {
        advertising:
        {
        client:"vast",schedule:
        {
        adbreak1:
        {
        offset:"pre",tag:"<?= $iklan; ?>",skipoffset:5
        }
        ,
        }
        ,
        }
        ,width:"100%",height:"100%",aspectratio:"16:9",autostart:false,controls:true,primary:"html5",abouttext:"Visit Westheme.com",aboutlink:"https://westheme.com",image:"<?= urldecode($poster); ?>",sources:[
        <?php
 $googleID = getID($gid);
$idid = str_replace('-', '1_1_1', str_rot13($googleID));
 $s->setID($googleID ?? "");
 $new = "";
 $ress = array('360p', '480p', '720p', '1080p');
 foreach($s->getResolution() as $res){
     $setRes = str_replace('p', '', $res);
     if($res == "360p"){
     $new .= '{"type": "video/mp4", "label": "'.$res.'", "file": "/f/'. $idid .'/'.$setRes.'", "default": "true"},';
     } else {
         $new .= '{"type": "video/mp4", "label": "'.$res.'", "file": "/f/'. $idid .'/'.$setRes.'"},';
     }
 }
 echo $new;
            ?>
        ],tracks:[
            <?php
                if($row['subtitle'] !== null){
                    $subtitle = "";
                    $sub = explode("|", urldecode($row['subtitle']));
                $sub_count = count($sub);
                for ($i = 0; $i < $sub_count; $i++){
                    $bahasa = explode("=", $sub[$i])[0];
                    $file_sub = explode("=", $sub[$i])[1];
                    $subtitle .= "{'file':'$file_sub','label':'$bahasa','kind':'captions'},";
                }
                echo $subtitle;
            }
            ?>
        ],logo:
        {
        file:"<?= $settings->logo; ?>",link:"https://westheme.com",position:"top-left",
        }
        ,captions:
        {
        color:"#efbb00",fontSize:"14",fontFamily:"Trebuchet MS, Sans Serif",backgroundColor:"rgba(0, 0, 0, 0.4);",
        }
        };
        var cookieData=cookie.getItem("<?php echo $title; ?>");
        if(cookieData)
        {
        var resumeAt=cookieData.split(':')[0];
        var videoDur=cookieData.split(':')[1];
        var lastPlay=cookieData.split(':')[2]+':'+cookieData.split(':')[3]+':'+cookieData.split(':')[4];


        };

        function nolanjut(){
        modal.style.display="none";
        player.play();
        }
        function yeslanjut(){
        modal.style.display="none";
        player.seek(resumeAt);
        }
        player.on('ready',function()
        {
        if(cookieData)
        {

        if(parseInt(resumeAt) < parseInt(videoDur))
        {
        modal.style.display="block";
        logMessage('Welcome back! You left off at '+lastPlay+'. Would you like to resume watching?');

        }

        else if(cookieData&&!(parseInt(resumeAt)
        < parseInt(videoDur)))
        {
        logMessage('Episode ini sudah selesai Anda tonton pada : '+lastPlay);
        }

        }
        else
        {
        logMessage('Selamat menonton');
        }

        });
        player.on('time',function(e)
        {
        cookie.setItem('<?php echo $title; ?>',Math.floor(e.position)+':'+player.getDuration()+':'+new Date());
        }
        );
        document.addEventListener('visibilitychange', function(){
        var state =  document.visibilityState;
        if (state === "hidden"){
        player.pause();
        } else if (state === "visible"){
        // player.play();
        }
        });
        player.setup(config);
        player.on('error', function(evt) {
        var url = (window.location != window.parent.location) ? document.referrer: document.location.href;
        var element = document.getElementById("myvideo");
            player.load({
            file:"https://arachi007.github.io/arachi007.github.io/video/failed2.mp4",
            image:"https://arachi007.github.io/arachi007.github.io//img/failed.jpg"
            });
            player.play();
            });
    <?php
    endwhile;
}
$conn->close();
?>

            //]]>
        </script>

        </body>
        </html>
