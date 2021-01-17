<?php
$sql = "select * from links where short='" . $id . "'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()):
        $s = new YDrive();
        $iklan = "";
        $gid = $row['file'];
        $poster = "";
        $title = $row['name'];
        $subtitle = '';
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
 $idid = str_rot13($googleID);
 $idid = str_replace('-', '1_1_1', $googleID);
 $s->setID($googleID ?? "");
 $new = "";
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
        {
        'file':'<?php echo $subtitle; ?>','label':'Indonesia','kind':'captions','default':true
        }
        ],logo:
        {
        file:"/assets/img/logo.png",link:"https://westheme.com",position:"top-left",
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
        });
    <?php
    endwhile;
}
$conn->close();