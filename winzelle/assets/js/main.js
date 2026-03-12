$(document).ready(function () {
  function previewImage(input, previewId) {
    const file = input[0].files[0];
    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $(previewId).attr("src", e.target.result).removeClass("d-none");
      };
      reader.readAsDataURL(file);
    } else {
      $(previewId).attr("src", "#").addClass("d-none");
    }
  }
  $("#systemLogoInput").on("change", function () {
    previewImage($(this), "#logo-preview");
  });

  $("#adminProfileInput").on("change", function () {
    previewImage($(this), "#admin-preview");
  });

  function showAlert(type, message, options = {}) {
    const defaultOptions = {
      position: "top-end",
      icon: type,
      title: type === "success" ? "Success" : "Error",
      text: message,
      timer: 3000,
      showConfirmButton: false,
      toast: true,
    };
    return Swal.fire(Object.assign(defaultOptions, options));
  }

  $("#installation_form").on("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
      url: `${base_url}controller/hris_data/actions.php?action=config`,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      beforeSend: function () {
        $("#loading-overlay").removeClass("d-none");
      },
      success: function (res) {
        $("#loading-overlay").addClass("d-none");

        if (res.status === 1) {
          showAlert("success", res.message).then(() => {
            $("#installation_form")[0].reset();
            $("#logo-preview, #admin-preview")
              .addClass("d-none")
              .attr("src", "#");
            if (res.url) window.location.href = res.url;
          });
        } else {
          showAlert("error", res.message || "Something went wrong!");
        }
      },
      error: function (xhr, status, error) {
        $("#loading-overlay").addClass("d-none");
        console.log(error);
        showAlert("error", "Installation failed: " + error);
      },
      complete: function () {
        $("#loading-overlay").addClass("d-none");
      },
    });
  });


  
  $("#login-form").on("submit", function (e) {
    e.preventDefault();

    const form = $(this);
    const submitBtn = form.find("button[type=submit]");
    submitBtn.prop("disabled", true);

    const formData = new FormData(this);

    $.ajax({
      url: `${base_url}controller/hris_data/actions.php?action=config_login`,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",

      beforeSend: function () {
        $("#loading-overlay").removeClass("d-none");
      },

      success: function (res) {
        if (res.status === 1) {
          showAlert("success", res.message);
          $("#loading-overlay").removeClass("d-none");

          setTimeout(() => {
            $("#login-form")[0].reset();
            if (res.url) {
              window.location.href = res.url;
            }
          }, 2500);
        } else {
          $("#loading-overlay").addClass("d-none");
          showAlert("error", res.message || "Something went wrong!");
        }
      },

      error: function () {
        $("#loading-overlay").addClass("d-none");
        showAlert("error", "Login failed.");
      },

      complete: function () {
        // do NOT hide loader here on success
        submitBtn.prop("disabled", false);
      },
    });
  });

  $("#logout").on("click", function () {
    // alert("test logout");
    $.ajax({
      url: `${base_url}controller/hris_data/actions.php?action=config_logout`,
      dataType: "json",
      beforeSend: function () {
        $("#loading-overlay").removeClass("d-none");
      },
      success: function (res) {
        if (res.status === 1) {
          showAlert("success", res.message);
          $("#loading-overlay").removeClass("d-none");

          setTimeout(() => {
            if (res.url) {
              window.location.href = res.url;
            }
          }, 2500);
        } else {
          $("#loading-overlay").addClass("d-none");
          showAlert("error", res.message || "Something went wrong!");
        }
      },
      error: function () {
        $("#loading-overlay").addClass("d-none");
        showAlert("error", "Ajax Error");
      },

      complete: function () {
        submitBtn.prop("disabled", false);
      },
    });
  });

  $("#signup-form")
    .off("submit")
    .on("submit", function (e) {
      e.preventDefault();
      const form = $(this);
      const submitBtn = form.find("button[type=submit]");
      submitBtn.prop("disabled", true);
      const formData = new FormData(this);

      $.ajax({
        url: `${base_url}controller/hris_data/actions.php?action=config_register`,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
          $("#loading-overlay").removeClass("d-none");
        },
        success: function (res) {
          if (res.status === 1) {
            showAlert("success", res.message).then(() => {
              $("#signup-form")[0].reset();
              $("#signup-form").addClass("d-none");
              $("#login-form").removeClass("d-none");
            });
          } else {
            showAlert("error", res.message || "Something went wrong!");
            $("#loading-overlay").addClass("d-none");
          }
        },
        error: function (xhr, status, error) {
          $("#loading-overlay").addClass("d-none");
          console.log(error);
          showAlert("error", "Registration failed: " + error);
        },
        complete: function () {
          $("#loading-overlay").addClass("d-none");
          submitBtn.prop("disabled", false);
        },
      });
    });
});
