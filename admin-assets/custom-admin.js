jQuery(document).ready(function($){
    $("#profile-page h2").click(function() {
        var table = $(this).next("table.form-table");
        table.slideToggle();
    });












    // Change these IDs to match the actual field keys or names
    var carBrandField = '#acf-field_652e30a2010eb';
    var carModelSelect = $('#acf-field_652e30cd010ec');
    carModelSelect.append($('<option>', {
        value: php_vars.car_model_val,
        text: php_vars.car_model_val
    }));


    function updateCarModels(selectedBrand) {
        carModelSelect.empty();

        if (carModels[selectedBrand]) {
            $.each(carModels[selectedBrand], function (index, model) {
                carModelSelect.append($('<option>', {
                    value: model,
                    text: model
                }));
            });
        } else {
            carModelSelect.append($('<option>', {
                value: '',
                text: 'No models found'
            }));
        }
    }

    var carModels = {
        'One': ['2.2CL', '2.3CL'],
        'Two': ['ALFA164', 'ALFA8C', 'ALFAGT'],
    };

    $(carBrandField).on('change', function () {
        var selectedBrand = $(this).val();
        updateCarModels(selectedBrand);
    });
})

