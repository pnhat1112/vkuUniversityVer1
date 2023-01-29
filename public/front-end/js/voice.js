function record() {
        var modal = document.getElementById("myModal");

        var btn = document.getElementById("btnVoice");

        var span = document.getElementsByClassName("close")[0];
        var recognition = new webkitSpeechRecognition();
        recognition.lang = "vi-VN";
        voicebox.style.display = "block";
        recognition.onresult = function(event) {
            console.log(event);
            document.getElementById('speechToText').value = event.results[0][0].transcript;
            voicebox.style.display = "none";
            $('button[type=submit]').click();
            document.getElementById("test").innerHTML = "123123";
        }
        recognition.start();

        span.onclick = function() {
            recognition.stop();
            voicebox.style.display = "none";
        }

    }