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
