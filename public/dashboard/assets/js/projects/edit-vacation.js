$(document).ready(function() {
    // التحقق من القيم الحالية عند تحميل الصفحة
    var currentType = $('select[name="type"]').val();
    var currentIntExt = $('select[name="int_ext"]').val();

    if (currentType === 'mission') {
        $('div#int_ext_field').show();
        $('div#acting_employee_field').hide();
        if (currentIntExt === 'internal') {
            $('div#department_field').show();
        } else {
            $('div#department_field').hide();
        }
    } else {
        $('div#int_ext_field').hide();
        $('div#department_field').hide();
        $('div#acting_employee_field').show();
    }

    // عرض وإخفاء الحقول بناءً على نوع الإجازة المختار
    $('select[name="type"]').change(function() {
        var selectedOption = $(this).val();
        if (selectedOption === 'mission') {
            $('div#int_ext_field').show();
            $('div#acting_employee_field').hide();
        } else {
            $('div#int_ext_field').hide();
            $('div#department_field').hide();
            $('div#acting_employee_field').show();
        }
    });

    // عرض أو إخفاء حقل النيابات بناءً على الداخلية / الخارجية
    $('select[name="int_ext"]').change(function() {
        var selectedOption = $(this).val();
        if (selectedOption === 'internal') {
            $('div#department_field').show();
        } else {
            $('div#department_field').hide();
        }
    });

    // التعامل مع إرسال النموذج باستخدام Ajax
    $('#vacationForm').on('submit', function(e) {
        e.preventDefault(); // منع إرسال النموذج الافتراضي

        // إخفاء جميع رسائل الخطأ في البداية
        $('.error-message').addClass('d-none').html('');

        // إخفاء رسالة النجاح في البداية
        $('#successMessage').addClass('d-none');

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // استخدم عنوان الـ action من النموذج
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // التعامل مع الرد الناجح
                $('#vacationForm')[0].reset(); // إعادة تعيين حقول النموذج
                $('#output').attr('src', '').hide(); // مسح معاينة الصورة المخزنة وإخفائها
                $('#successMessage').removeClass('d-none'); // عرض رسالة النجاح

                // اختفاء رسالة النجاح ببطء بعد 5 ثواني
                setTimeout(function() {
                    $('#successMessage').fadeOut('slow');
                }, 5000); // 5000 ميلي ثانية = 5 ثواني
            },
            error: function(xhr) {
                // التعامل مع الرد الفاشل بعرض رسائل الخطأ تحت كل إدخال
                var errors = xhr.responseJSON.errors;
                for (var field in errors) {
                    var errorMessage = errors[field].join('<br>');
                    $('#' + field + '-error').html(errorMessage).removeClass('d-none');
                }
            }
        });
    });
});

// تحميل صورة المعاينة
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src); // تحرير الذاكرة
    }
};
