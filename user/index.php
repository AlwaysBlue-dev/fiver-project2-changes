<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php include('password_modal.php'); ?>
<?php include('out_modal.php'); ?>
<?php include('modal.php'); ?>


<head>
	<style>
	body {
			margin: 0;
			background: tomato;
			overflow:hidden;
		}

		.roulette {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 90vh;
		}

		.roulette .wheel img {
			transition: transform 10s cubic-bezier(0.3, 1, 0.7, 1),
				10s filter cubic-bezier(0.1, 1, 0.8, 1),
				10s -webkit-filter cubic-bezier(0.1, 1, 0.8, 1);
			will-change: transform;
			border-radius: 50%;
			box-shadow: 0 0 100px rgba(0, 0, 0, 0.5);
			width: 100%;
			max-width: 600px;
		}

		.roulette .arrow {
			width: 0;
			height: 0;
			border: 80px solid transparent;
			border-top: 100px solid goldenrod;
			position: fixed;
			left: 50%;
			transform: translate(-50%, -100px);
			z-index: 20;
			border-radius: 0.35em;
		}

		.spin {
			cursor: crosshair;
		}

		p {
			text-align: center;
			font-size: 60px;
			margin-top: 0px;
		}
	</style>
</head>

<body>
	<?php include('navbar.php'); ?>
   <div>
		<p id="demo"></p>
	</div>
	<div class="roulette">
		<div class="wheel spin">
			<div class="arrow"></div>
			<img src="https://i.imgur.com/N01W3Ks.png" />
		</div>
	</div>

	<script>
   var tid = setTimeout(setTimer, 2000);
    function setTimer() {
      // do some stuff...
      var time = 25; // This is the time allowed
      var saved_countdown = localStorage.getItem("saved_countdown");

      if (saved_countdown == null) {
        // Set the time we're counting down to using the time allowed
        var new_countdown = new Date().getTime() + (time + 2) * 1000;

        time = new_countdown;
        localStorage.setItem("saved_countdown", new_countdown);
      } else {
        time = saved_countdown;
      }

      // Update the count down every 1 second
      var x = setInterval(() => {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the allowed time
        var distance = time - now;

        // Time counter
        var counter = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML =
          "Rolling in " + counter + " seconds ❗";

        // If the count down is over, write some text
        if (counter <= 0) {
          clearInterval(x);
          localStorage.removeItem("saved_countdown");
          perfecthalf = ((1 / 37) * 360) / 2;

          let currentLength = perfecthalf;

          $(".wheel img").css("transform", "rotate(" + perfecthalf + "deg)");

          $(".spin").ready(function () {
            $(".wheel img").css("filter", "blur(8px)");

            spininterval =
              getRandomInt(0, 37) * (360 / 37) + getRandomInt(3, 4) * 360;
            currentLength += spininterval;

            numofsecs = spininterval;

            console.log(currentLength);
            $(".wheel img").css(
              "transform",
              "rotate(" + currentLength + "deg)"
            );

            setTimeout(function () {
              $(".wheel img").css("filter", "blur(0px)");
            }, numofsecs);
          });

          function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
          }

          document.getElementById("demo").innerHTML = "Rolling 😃";
        }
      }, 1000);
      tid = setTimeout(setTimer, 12000); // repeat myself
    }
    function abortTimer() {
      // to be called when you want to stop the timer
      clearTimeout(tid);
    }
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/dataTables.responsive.js"></script>
	<script>
		$(document).ready(function() {

			$('#chatRoom').DataTable({
				"bLengthChange": true,
				"bInfo": true,
				"bPaginate": true,
				"bFilter": true,
				"bSort": false,
				"pageLength": 7
			});

			$('#myChatRoom').DataTable({
				"sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
				"bLengthChange": false,
				"bInfo": false,
				"bPaginate": true,
				"bFilter": false,
				"bSort": false,
				"pageLength": 8
			});

			$(document).on('click', '.join_chat', function() {
				var cid = $(this).val();
				if ($('#status' + cid).val() == 1) {
					window.location.href = 'chatroom.php?id=' + cid;
				} else if ($('#status' + cid).val() == 2) {
					$('#join_chat').modal('show');
					$('.modal-body #chatid').val(cid);
				} else {
					$.ajax({
						url: "addmember.php",
						method: "POST",
						data: {
							id: cid,
						},
						success: function() {
							window.location.href = 'chatroom.php?id=' + cid;
						}
					});
				}
			});

			$(document).on('click', '#addchatroom', function() {
				chatname = $('#chat_name').val();
				chatpass = $('#chat_password').val();
				$.ajax({
					url: "add_chatroom.php",
					method: "POST",
					data: {
						chatname: chatname,
						chatpass: chatpass,
					},
					success: function(data) {
						window.location.href = 'chatroom.php?id=' + data;
					}
				});

			});
			//
			$(document).on('click', '.delete2', function() {
				var rid = $(this).val();
				$('#delete_room2').modal('show');
				$('.modal-footer #confirm_delete2').val(rid);
			});

			$(document).on('click', '#confirm_delete2', function() {
				var nrid = $(this).val();
				$('#delete_room2').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				$.ajax({
					url: "deleteroom.php",
					method: "POST",
					data: {
						id: nrid,
						del: 1,
					},
					success: function() {
						window.location.href = 'chatroom.php';
					}
				});
			});

			$(document).on('click', '.leave2', function() {
				var rid = $(this).val();
				$('#leave_room2').modal('show');
				$('.modal-footer #confirm_leave2').val(rid);
			});

			$(document).on('click', '#confirm_leave2', function() {
				var nrid = $(this).val();
				$('#leave_room2').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				$.ajax({
					url: "leaveroom.php",
					method: "POST",
					data: {
						id: nrid,
						leave: 1,
					},
					success: function() {
						window.location.href = 'chatroom.php';
					}
				});
			});

		});
	</script>
</body>

</html>