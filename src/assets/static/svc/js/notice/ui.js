$(function () {
    if ($('#noticePage').length) {
        faq.init();
    }
});

// faqUI
var faq = {
    init: function () {
        // this.faqTabFn();
        this.noticeListOnToggle();
        this.faqListOnToggle();
    },
    // faqTabFn: function () {
    //     toggleOn($('#faqPage .faq-sec [data-role=toggleOn] .btn'));
    // },
    noticeListOnToggle: function () {
        $('#noticeTblWrapper table tr.question').on('click', function () {
            $(this).toggleClass('on').siblings().removeClass('on');;
        })
    },
    faqListOnToggle: function () {
        toggleOn($('#faqList .faq-item'));
    }
}

function toggleOn(obj) {
    $(obj).on('click', function () {
        $(this).toggleClass('on').siblings().removeClass('on');
    })
}