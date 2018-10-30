
<!-- Modal -->
<div class="modal fade" id="changPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
      </div>

      <div id="psrmodal" class="modal-body">
        <div class="loader-div">
          <div id="loader2">
          </div>
        </div>
        <div id="pbox">
          <div class="">
            <p class="text-center" style="color:#76797f">
              Password should at least have one capital letter, one number, one special character, and at least 12 Characters.
            </p>
          </div>

          <div class="">
            <label for="">Old Password</label>
            <input type="password" name="old_password" id="old_password" class="form-control" value="">
          </div>

          <div class="">
            <label for="">New Password</label>
            <input type="password" name="password" id="password" class="form-control" value="">
          </div>

          <div class="">
            <label for="">Confirm New Password</label>
            <input type="password" name="password" id="password2" class="form-control" value="" disabled>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="">
          <button type="button" id="submitpassword" class="btn btn-secondary" name="button" disabled>Confirm New Password</button>
        </div>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">



    $(document).ready(function()
    {
      $("#loader2").hide();

      var obj = $('#password').passwordStrength();

      var rules = {
        rulesname: {
          rule: /[A-Z]+/,
          method: true
        }
      }

      $('#destroy').click(function () {
          obj.destroy();
      });
      $('#reset').click(function () {
          obj.reset();
      });

      $.tester.addRules(rules);

      $('#password').keyup(function()
      {
        if($(".progress-bar").hasClass("bg-green"))
        {
          $('#password2').removeAttr("disabled");
          $('#password2').keyup(function()
          {
            var pass1 = $('#password').val();
            var pass2 = $('#password2').val();

            if(pass1 == pass2)
            {
              $("#submitpassword").removeAttr("disabled");
            }
            else
            {
              $("#submitpassword").attr("disabled", true);
            }
          });
        }
        else
        {
          $('#password2').prop('disabled', true);
          $("#psrmodal").attr("disabled", true);
        }
      });


      $("#submitpassword").click(function()
      {
        $("#loader2").show();
        $("#overlay").show();
        $("#pbox").css("visibility", "hidden");
          var old_password = $("#old_password").val();
          var new_password = $("#password").val();
          var csrf = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
              url: "{{url('change-password')}}",
              method: "POST",
              data: {
                new_password: new_password,
                old_password: old_password,
                '_token': csrf

              },
              success: function(data) {
                if(data=="1")
                {
                  toastr.success("Success, Page Reloading...");
                  $("body").css("pointer-events", "none");
                  setTimeout(function(){ location.reload(); }, 2000);

                }
                else
                {
                  toastr.error("Wrong Old Password!");

                  $("#loader2").hide();
                  $("#overlay").hide();
                  $("#pbox").css("visibility", "");
                }
              }
            });
      });

    });
</script>
