$(() => {
    initSelect2();

    $('.js-check-all-users').on('click', event => {
        const $checkbox = $(event.currentTarget); // $(this) does not work with arrow function
        $('.js-check-user').prop('checked', $checkbox.prop('checked'));
    });
});

function initSelect2() {
    // Select 2
    try {
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        });
    } catch (error) {
        console.log(error);
    }
}
