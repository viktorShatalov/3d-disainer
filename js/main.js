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

  //  mobile-menu
  const changeHeaderMenu = () => {
    jQuery("#header .container").css({
      "flex-direction": "row",
    });
    jQuery("#header .logo").css({
      display: "block",
    });
  };

  jQuery(".burger").click(function () {
    jQuery(".burger,#header nav.menu").toggleClass("active");
    if (jQuery(this).hasClass("active")) {
      jQuery("#header .container").css({
        "flex-direction": "row-reverse",
      });
      jQuery("#header .logo").css({
        display: "none",
      });
    } else {
      changeHeaderMenu();
    }
  });
  jQuery("#header nav.menu ul li a").on("click", function () {
    jQuery(".burger,#header nav.menu").removeClass("active");
    changeHeaderMenu();
  });

  // scroll
  jQuery(window).scroll(function () {
    let sections = jQuery("article");
    sections.each(function (i, el) {
      const top = jQuery(el).offset().top - 100;
      const bottom = top + jQuery(el).height();
      let scroll = jQuery(window).scrollTop();
      let id = jQuery(el).attr("id");
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
  jQuery(
    "#first__screen .pink__btn,#price .pink__btn,#portfolio .blue__btn"
  ).click(function () {
    jQuery("html, body").animate(
      { scrollTop: jQuery("#contacts__form").offset().top - 100 },
      800
    );
  });
  jQuery(".menu").on("click", "a", function (event) {
    event.preventDefault();
    let id = jQuery(this).attr("href"),
      top = jQuery(id).offset().top - 40;
    jQuery("body,html").animate({ scrollTop: top }, 800);
  });

  // показать больше работ
  jQuery("#portfolio .last").hide();
  if (jQuery("#portfolio .last").css("display") == "none") {
    jQuery("#portfolio .pink__btn").click(function (e) {
      jQuery("#portfolio .last,#portfolio .hide").slideDown(300);
      e.preventDefault();
    });
  }

  // modal

  function modal() {
    const openModalButtons = document.querySelectorAll("[data-modal-target]");
    const closeModalButtons = document.querySelectorAll("[data-close-button]");
    const overlay = document.getElementById("overlay");

    openModalButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        e.preventDefault();
        const modal = document.querySelector(button.dataset.modalTarget);
        openModal(modal);
      });
    });

    overlay.addEventListener("click", () => {
      const modals = document.querySelectorAll(".modal.active");
      modals.forEach((modal) => {
        closeModal(modal);
      });
    });

    closeModalButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const modal = button.closest(".modal");
        closeModal(modal);
      });
    });

    function openModal(modal) {
      if (modal == null) return;
      modal.classList.add("active");
      overlay.classList.add("active");
    }

    function closeModal(modal) {
      if (modal == null) return;
      modal.classList.remove("active");
      overlay.classList.remove("active");
    }
  }
  modal();

  jQuery(window).on("load resize", function () {
    if (jQuery(window).width() > 480) {
      tab();
    }
  });
});
// mobile content
jQuery(window).on("load resize", function () {
  if (jQuery(window).width() < 480) {
    // slider

    jQuery(".first__screen-slider,.price__content-items").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: false,
      arrows: true,
    });
    jQuery(".tablinks").removeClass("active");
    jQuery(".tab").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: false,
      arrows: true,
    });

    // .appendTo()
    jQuery("#header .contacts").appendTo(jQuery("#header nav.menu "));
  }
});
