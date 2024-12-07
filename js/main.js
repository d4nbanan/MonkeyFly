// TABS
const tabs = document.querySelectorAll(".tabs__link");

tabs.forEach((el) => {
    el.addEventListener("click", function (e) {
        e.preventDefault();
        let tabContainer = document.querySelector(this.getAttribute("href"));
        tabContainer.parentNode.querySelector(".active").classList.remove("active");
        this.parentNode.parentNode.querySelector(".active").classList.remove("active");
        this.classList.add("active");
        tabContainer.classList.add("active");
    });
});

// POPUPER
const popupers = document.querySelectorAll(".popuper");

popupers.forEach(el => {
    const popup = document.querySelector(el.getAttribute("href"));
    el.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector("body").classList.add("hidden");
        popup.classList.add("active");

        popup.querySelectorAll(".popup__close").forEach(close => {
            close.addEventListener("click", function () {
                document.querySelector("body").classList.remove("hidden");
                popup.classList.remove("active");
            });
        });
    });


});

// HISTORY
const historyBtn = document.querySelector(".game__history__button"),
    historyAll = document.querySelector(".game__history__all"),
    historyClose = document.querySelector(".game__history__all__close");

historyBtn.addEventListener("click", () => {
    historyAll.classList.add("active");
});

historyClose.addEventListener("click", () => {
    historyAll.classList.remove("active");
});
//
$('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
});
$('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').slideUp(300);
});
$('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('span').html($(this).html());
    $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
});
/*End Dropdown Menu*/


$('.dropdown-menu li').click(function () {
    var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
        msg = '<span class="msg">Hidden input value: ';
    $('.msg').html(msg + input + '</span>');
});
//
$(".password-inpt img").click(function () {
    $(this).toggleClass('active')
    if ($(this).hasClass('active')) {
        $('.input-pass').attr('type', 'text');
    } else {
        $('.input-pass').attr('type', 'password');
    }
})
///////////////////COUNTRY DROPDOWN
$("#phone").intlTelInput({
    defaultCountry: [],
    preferredCountries: ['ua', 'ru'],
    separateDialCode: true,
    geoIpLookup: function (callback) {
        $.get('http://ipinfo.io', function () {}, "jsonp").always(function (resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
        });
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js", //для форматирования/плейсхолдера и т.д. // 
});
