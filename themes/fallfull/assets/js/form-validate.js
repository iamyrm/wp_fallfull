/**
 * Contact Form Validation and AJAX Submission
 */
(function ($) {
  "use strict";

  // Email regex pattern
  var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  // Phone regex pattern (international format support)
  var phonePattern = /^[\d\s\-\+\(\)]{7,20}$/;

  /**
   * Validate a single field
   */
  function validateField($field, rules) {
    var value = $field.val().trim();
    var fieldName = $field.attr("name");
    var isValid = true;
    var errorMessage = "";

    // Check required
    if (rules.required && value === "") {
      isValid = false;
      errorMessage = "This field is required";
    }

    // Check email format
    if (isValid && rules.email && value !== "") {
      if (!emailPattern.test(value)) {
        isValid = false;
        errorMessage = "Please enter a valid email address";
      }
    }

    // Check phone format
    if (isValid && rules.phone && value !== "") {
      if (!phonePattern.test(value)) {
        isValid = false;
        errorMessage = "Please enter a valid phone number";
      }
    }

    // Check min length
    if (isValid && rules.minLength && value.length < rules.minLength) {
      isValid = false;
      errorMessage = "Minimum " + rules.minLength + " characters required";
    }

    // Update field UI
    if (!isValid) {
      $field.addClass("error").attr("data-error", errorMessage);
    } else {
      $field.removeClass("error").removeAttr("data-error");
    }

    return isValid;
  }

  /**
   * Validate entire form
   */
  function validateForm($form) {
    var isValid = true;

    // Validate name
    if (!validateField($form.find("#name"), { required: true, minLength: 2 })) {
      isValid = false;
    }

    // Validate email
    if (!validateField($form.find("#email"), { required: true, email: true })) {
      isValid = false;
    }

    // Validate phone (optional but if provided must be valid)
    if (!validateField($form.find("#phone"), { phone: true })) {
      isValid = false;
    }

    // Validate subject
    if (
      !validateField($form.find("#subject"), { required: true, minLength: 3 })
    ) {
      isValid = false;
    }

    // Validate message
    if (
      !validateField($form.find("#message"), { required: true, minLength: 10 })
    ) {
      isValid = false;
    }

    return isValid;
  }

  /**
   * Show status message
   */
  function showStatus(message, type) {
    var $status = $("#form_status");
    var icon = "";

    if (type === "success") {
      icon = '<i class="fas fa-check-circle"></i> ';
    } else if (type === "error") {
      icon = '<i class="fas fa-exclamation-circle"></i> ';
    } else if (type === "loading") {
      icon = '<i class="fas fa-spinner fa-spin"></i> ';
    }

    $status.html('<span class="' + type + '">' + icon + message + "</span>");

    // Auto-hide success messages after 10 seconds
    if (type === "success") {
      setTimeout(function () {
        $status.fadeOut(function () {
          $(this).html("").show();
        });
      }, 10000);
    }
  }

  /**
   * Clear all error states
   */
  function clearErrors($form) {
    $form.find("input, textarea").removeClass("error");
    $form.find("[data-error]").removeAttr("data-error");
  }

  /**
   * Main form submission handler
   */
  $(document).ready(function () {
    var $form = $("#fruitkha-contact");
    var isSubmitting = false;

    // Clear errors on input
    $form.on("input change", "input, textarea", function () {
      $(this).removeClass("error");
    });

    // Form submission
    $form.on("submit", function (e) {
      e.preventDefault();

      // Prevent double submission
      if (isSubmitting) {
        return false;
      }

      // Clear previous errors
      clearErrors($form);

      // Client-side validation
      if (!validateForm($form)) {
        // Show first error
        var $firstError = $form.find(".error").first();
        if ($firstError.length) {
          showStatus(
            $firstError.attr("data-error") || "Please fix the errors above",
            "error",
          );
          $firstError.focus();
        }
        return false;
      }

      // Set submitting state
      isSubmitting = true;

      // Disable form
      $form.find("input, textarea, button, submit").prop("disabled", true);
      $form.css("opacity", "0.6");
      showStatus("Sending your message...", "loading");

      // Prepare form data
      var formData = $form.serialize();

      // Get AJAX URL - fallback to admin-ajax.php if not defined
      var ajaxUrl =
        typeof contact_ajax !== "undefined"
          ? contact_ajax.ajax_url
          : "/wp-admin/admin-ajax.php";

      // AJAX submission
      $.ajax({
        url: ajaxUrl,
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.success) {
            showStatus(response.data.message, "success");
            $form[0].reset();
          } else {
            showStatus(response.data.message, "error");
          }
        },
        error: function (xhr, status, error) {
          // Handle different error types
          var errorMessage = "An error occurred. Please try again.";
          if (xhr.status === 0) {
            errorMessage = "Network error. Please check your connection.";
          } else if (xhr.status === 403) {
            errorMessage = "Security check failed. Please refresh the page.";
          } else if (xhr.status === 500) {
            errorMessage = "Server error. Please try again later.";
          }
          showStatus(errorMessage, "error");
        },
        complete: function () {
          // Re-enable form
          isSubmitting = false;
          $form.find("input, textarea, button, submit").prop("disabled", false);
          $form.css("opacity", "1");
        },
      });

      return false;
    });
  });

  // Legacy function for backward compatibility
  window.valid_datas = function (f) {
    $("#fruitkha-contact").trigger("submit");
    return false;
  };

  // Legacy notice function
  window.notice = function (f) {
    $(f).addClass("error");
  };
})(jQuery);
