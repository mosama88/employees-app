

$(document).ready(function() {
    // اختيار الحقل النيابات عند اختيار "نيابات" من القائمة المنسدلة
    $('select[name="int_ext"]').change(function() {
        var selectedOption = $(this).val();
        if (selectedOption === 'internal') {
            $('div#department_field').show();
        } else {
            $('div#department_field').hide();
        }
    });

    // إخفاء حقل النيابات عند التحميل الأولي إذا لم يكن الاختيار "نيابات"
    if ($('select[name="int_ext"]').val() !== 'internal') {
        $('div#department_field').hide();
    }
});


$(document).ready(function() {
    // إخفاء حقل الداخلية / الخارجية عند التحميل الأولي
    $('div#int_ext_field').hide();

    // عرض حقل الداخلية / الخارجية عند اختيار "مأمورية" من القائمة المنسدلة لنوع الإجازة
    $('select[name="type"]').change(function() {
        var selectedOption = $(this).val();
        if (selectedOption === 'mission') {
            $('div#int_ext_field').show();
        } else {
            $('div#int_ext_field').hide();
        }
    });
});








$(document).ready(function() {
    $('#vacationForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Hide all error messages initially
        $('.error-message').addClass('d-none').html('');

        // Hide success message initially
        $('#successMessage').addClass('d-none');

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Handle success response
                $('#vacationForm')[0].reset(); // Optionally, reset the form fields
                $('#output').attr('src', '').hide(); // Clear the selected image preview and hide it
                $('#successMessage').removeClass('d-none'); // Show success message

                // Slowly fade out the success message after 5 seconds
                setTimeout(function() {
                    $('#successMessage').fadeOut('slow');
                }, 5000); // 5000 milliseconds = 5 seconds
            },
            error: function(xhr) {
                // Handle error response by displaying error messages under each input
                var errors = xhr.responseJSON.errors;
                for (var field in errors) {
                    var errorMessage = errors[field].join('<br>');
                    $('#' + field + '-error').html(errorMessage).removeClass('d-none');
                }
            }
        });
    });
});





$(document).ready(function () {
    $('#vacationForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Hide all error messages initially
        $('.error-message').addClass('d-none').html('');

        // Hide success message initially
        $('#successMessage').addClass('d-none');

        var formData = new FormData(this);

        $.ajax({
            url: formData.action, // Use the form's action attribute
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Handle success response
                $('#vacationForm')[0].reset(); // Optionally, reset the form fields
                $('#output').attr('src', ''); // Clear the selected image preview
                $('#successMessage').removeClass('d-none'); // Show success message

                // Slowly fade out the success message after 5 seconds
                setTimeout(function () {
                    $('#successMessage').fadeOut('slow');
                }, 5000); // 5000 milliseconds = 5 seconds
            },
            error: function (xhr) {
                // Handle error response by displaying error messages under each input
                var errors = xhr.responseJSON.errors;
                for (var field in errors) {
                    var errorMessage = errors[field].join('<br>');
                    $('#' + field + '-error').html(errorMessage).removeClass('d-none');
                }
            }
        });
    });
});




var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

