<html>

<head>
    <style>
        #root {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>


<body>
    <div id="root"></div>
</body>
<script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>
<script>
    window.onload = function() {
        function getUrlParams(url) {
            let urlStr = url.split('?')[1];
            const urlSearchParams = new URLSearchParams(urlStr);
            const result = Object.fromEntries(urlSearchParams.entries());
            return result;
        }


        // Generate a Token by calling a method.
        // @param 1: appID
        // @param 2: serverSecret
        // @param 3: Room ID
        // @param 4: User ID
        // @param 5: Username
        const roomID = getUrlParams(window.location.href)['roomID'] || (Math.floor(Math.random() * 10000) + "");
        const userID = Math.floor(Math.random() * 10000) + "";
        const userName = "userName" + userID;
        const appID = 582782451;
        const serverSecret = "61de7f2b3586a2c75ab9325994096b4d";
        const kitToken = ZegoUIKitPrebuilt.generateKitTokenForTest(appID, serverSecret, roomID, userID, userName);


        const zp = ZegoUIKitPrebuilt.create(kitToken);
        zp.joinRoom({
            container: document.querySelector("#root"),
            sharedLinks: [{
                name: 'Personal link',
                url: window.location.protocol + '//' + window.location.host + window.location
                    .pathname + '?roomID=' + roomID,
            }],
            scenario: {
                mode: ZegoUIKitPrebuilt.VideoConference,
            },

            turnOnMicrophoneWhenJoining: true,
            turnOnCameraWhenJoining: true,
            showMyCameraToggleButton: true,
            showMyMicrophoneToggleButton: true,
            showAudioVideoSettingsButton: true,
            showScreenSharingButton: true,
            showTextChat: true,
            showUserList: true,
            maxUsers: 50,
            layout: "Auto",
            showLayoutButton: true,
            scenario: {
                mode: "VideoConference",
                config: {
                    role: "Host",
                },
            },
        });
    }
</script>

</html>
