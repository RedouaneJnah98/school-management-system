$(document).ready(function () {
    let selector = 'select[name="myTable_length"]';

    $(selector).removeClass('select-sm');
    $(selector).addClass('dataTable-selector');
});

function inputName(name, className, postName) {
    let inputNameChecked = $(`input:checkbox[name="${name}"]:checked`);
    let labelText = $(inputNameChecked).next().text();
    let trimmedLabel = labelText.replaceAll('  ', '');
    let arr = trimmedLabel.split('\n');
    let newArr = arr.filter(function (value) {
        return value != null && value !== "";
    });
    let hiddenInput = '';

    $.each(inputNameChecked, function () {
        let id = $(this).data('id');

        hiddenInput = `<input type="hidden" name="${postName}" value="${id}" />`;
        $(`${className}`).append(hiddenInput);
    })
    $.each(newArr, function (i, item) {
        let html = '<li class="fw-light">' + item + '</li>';

        $.each(inputNameChecked, function () {
            $(`input:checkbox[name="${name}"]:checked`).parent().remove();
        });
        $(`${className}`).append(html);
    })
}

function checkboxAll(selectAll, deselectAll, name) {
    $(`${selectAll}`).on('click', function () {
        $(`input:checkbox[name=${name}]`).prop('checked', true);
    });
    $(`${deselectAll}`).on('click', function () {
        $(`input:checkbox[name=${name}]`).prop('checked', false);
    });
}

function addSubject(subject) {
    $('.subjects').append(`<li>${subject}</li><input type="hidden" name="subject_name" value="${subject}" />`);
}


