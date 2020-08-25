jQuery(document).ready(function ($) {
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
});
