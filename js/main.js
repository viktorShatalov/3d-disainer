jQuery(document).ready(function () {
  // tabs

  let tab = function () {
    let tabLink = document.querySelectorAll(".tablinks");
    let tabContent = document.querySelectorAll(".tabs__content");
    let tabName;
    tabLink.forEach((item) => {
      item.addEventListener("click", selsectTabLink);
    });
    function selsectTabLink() {
      tabLink.forEach((item) => {
        item.classList.remove("active");
      });
      this.classList.add("active");
      tabName = this.getAttribute("datat-tab-name");
      selectTabContent(tabName);
    }
    const selectTabContent = (tabName) => {
      tabContent.forEach((item) => {
        item.classList.contains(tabName)
          ? item.classList.add("active")
          : item.classList.remove("active");
      });
    };
  };
  if (window.innerWidth > 425) {
    tab();
  }
  //  mobile-menu

  jQuery(".burger").click(function () {
    jQuery(".burger,.header__bottom-menu").toggleClass("active");
    if (jQuery(".mobile__content,.mobile__content-social").hasClass("active")) {
      jQuery(".mobile__content,.mobile__content-social").removeClass("active");
    }
  });
  // mobile content
  if (window.innerWidth < 425) {
    // sliders

    $(".first__screen-slider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: false,
    });
  }

  // scroll
  jQuery(window).scroll(function () {
    let sections = jQuery("article");
    sections.each(function (i, el) {
      const top = jQuery(el).offset().top - 100;
      const bottom = top + jQuery(el).height();
      let scroll = jQuery(window).scrollTop();
      let id = jQuery(el).attr("id");
      console.log(top);
      if (scroll > top && scroll < bottom) {
        jQuery("#header .menu a.active, #footer .menu a.active").removeClass(
          "active"
        );
        jQuery('a[href="#' + id + '"]').addClass("active");
        jQuery("#header").css({
          padding: "30px 0",
        });
      }
      if (scroll <= 0) {
        jQuery("#header").css({
          padding: "30px 0 85px",
        });
      }
    });
  });
  jQuery("nav.menu").on("click", "a", function (event) {
    event.preventDefault();
    let id = jQuery(this).attr("href"),
      top = jQuery(id).offset().top - 40;
    jQuery("body,html").animate({ scrollTop: top }, 300);
  });

  // показать больше работ
  jQuery("#portfolio .last").hide();
  jQuery("#portfolio .pink__btn").click(function (e) {
    jQuery("#portfolio .last").slideToggle(180);
    e.preventDefault();
  });
});
