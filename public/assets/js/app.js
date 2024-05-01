$(() => {
    $('.password-toggler').on('click', () => {
        let $password = $('input[type="password"]');
        let $icon = $('.password-toggler i');

        $password.attr('type', $password.attr('type') === 'password' ? 'text' : 'password');
        $icon.toggleClass('fa-eye-slash', 'fa-eye');
    });
});
