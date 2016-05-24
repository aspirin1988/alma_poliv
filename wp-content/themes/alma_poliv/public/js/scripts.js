$(document).ready(function () {

  /* НАЧАЛО параметры для карусели Owl-carousel на стр. Галерея*/
  //проверяем, есть ли элементы с data-imagelightbox на странцие, и только тогда запускаем код
  var isItOwlCarousel = document.getElementsByClassName('owl-carousel');
  if (isItOwlCarousel.length > 0) {

    $(".owl-carousel").owlCarousel({
      items: 6,
      margin: 2,
      nav: true,
      navText: [
        "<img src='/wp-content/themes/alma_poliv/public/img/gallery/carousel-left-arrow.png'>",
        "<img src='/wp-content/themes/alma_poliv/public/img/gallery/carousel-right-arrow.png'>"
      ]
    });

  }
  /* КОНЕЦ параметры для карусели Owl-carousel на стр. Галерея */


  /* НАЧАЛО код для переключения главной картинки в разделе ГАЛЕРЕЯ */
  //проверяем, есть ли элементы с .gallery-container на странцие, и только тогда запускаем код
  var isItGallery = document.getElementsByClassName('gallery-container');
  if (isItGallery.length > 0) {
    var gallery = document.getElementsByClassName('gallery-container')[0],
      galleryAnchor = gallery.getElementsByClassName('thumb'), //якоря
      mainImg = gallery.getElementsByClassName('gallery-main-image')[0].children,//большое изобр.
      imgContainer = gallery.getElementsByClassName('gallery-main-image')[0]; //конейнер большого изображения

    var prevImgBtn = gallery.getElementsByClassName('left-arrow')[0], //кнопка "налево" возле большого изображения
    nextImgBtn = gallery.getElementsByClassName('right-arrow')[0]; //кнопка "направо" возле большого изображения

    // вешаем событие на кнопку "налево" возле большого изображения:
    prevImgBtn.addEventListener('click', function (event) {
      event.preventDefault();

      for (var i = 1; i < galleryAnchor.length && i > 0; i++) { //если это первый thumb, код не срабатывает

        //если у большой картинки и у thumbnail'a один и тот же src, то:
        var mainImgSrc = mainImg[0].getAttribute("src");
        var thumbSrc = galleryAnchor[i].getElementsByTagName('img')[0].getAttribute("src");
        if (mainImgSrc === thumbSrc) {
          //удаляем бордеры у предыдущих выделенных thumb'oв:
          var otherLittleImages = galleryAnchor[i].getElementsByTagName('img');
          otherLittleImages[0].style.boxSizing="border-box";
          otherLittleImages[0].style.border="none";
          //выделяем текущий thumb:
          var nextOfCurrentThumb = galleryAnchor[i - 1];
          nextOfCurrentThumb.getElementsByTagName('img')[0].style.boxSizing="padding-box";
          nextOfCurrentThumb.getElementsByTagName('img')[0].style.border="2px solid #1a7771";

          mainImg[0].remove(); // удаляем предыдущую картинку

          // Создаём новую картинку с соотв-щим src и классами
          var newImg = document.createElement("img");
          newImg.src = nextOfCurrentThumb.getAttribute("data-img");
          newImg.classList.add("img-responsive");

          // Вставляем картинку
          imgContainer.insertBefore(newImg, imgContainer.firstChild);

          break;
        }
      }
    });
    // вешаем событие на кнопку "направо" возле большого изображения:
    nextImgBtn.addEventListener('click', function (event) {// вешаем событие на click
      event.preventDefault();

      for (var i = 0; i < galleryAnchor.length; i++) {
        //если у большой картинки и у thumbnail'a один и тот же src, то:
        var mainImgSrc = mainImg[0].getAttribute("src");
        var thumbSrc = galleryAnchor[i].getElementsByTagName('img')[0].getAttribute("src");
        if (mainImgSrc === thumbSrc) {
          if ((i + 1) === galleryAnchor.length) { //если это последний thumb, код не срабатывает
            break;
          }

          //удаляем бордеры у предыдущих выделенных thumb'oв:
          var otherLittleImages = galleryAnchor[i].getElementsByTagName('img');
          otherLittleImages[0].style.boxSizing="border-box";
          otherLittleImages[0].style.border="none";
          //выделяем текущий thumb:
          var nextOfCurrentThumb = galleryAnchor[i + 1];
          nextOfCurrentThumb.getElementsByTagName('img')[0].style.boxSizing="padding-box";
          nextOfCurrentThumb.getElementsByTagName('img')[0].style.border="2px solid #1a7771";

          mainImg[0].remove(); // удаляем предыдущую картинку

          // Создаём новую картинку с соотв-щим src и классами
          var newImg = document.createElement("img");
          newImg.src = nextOfCurrentThumb.getAttribute("data-img");
          newImg.classList.add("img-responsive");

          // Вставляем картинку
          imgContainer.insertBefore(newImg, imgContainer.firstChild);

          break;
        }
      }


    });

    for (var i = 0; i < galleryAnchor.length; i++) {

      //если у большой картинки и у thumbnail'a один и тот же src, то выделяем бордером этот thumbnail:
      var mainImgSrc = mainImg[0].getAttribute("src");
      var thumbSrc = galleryAnchor[i].getElementsByTagName('img')[0].getAttribute("src");
      if (mainImgSrc === thumbSrc) {
        galleryAnchor[i].getElementsByTagName('img')[0].style.boxSizing="padding-box";
        galleryAnchor[i].getElementsByTagName('img')[0].style.border="2px solid #1a7771";
      }

      galleryAnchor[i].addEventListener('click', function (event) {// вешаем событие на click по thumb
        event.preventDefault();

        //удаляем бордеры у предыдущих выделенных thumb'oв:
        for (var j = 0; j < galleryAnchor.length; j++) {
          var otherLittleImages = galleryAnchor[j].getElementsByTagName('img');
          otherLittleImages[0].style.boxSizing="border-box";
          otherLittleImages[0].style.border="none";
        }

        mainImg[0].remove(); // удаляем предыдущую картинку

        // Создаём новую картинку с соотв-щим src и классами
        var newImg = document.createElement("img");
        newImg.src = this.getAttribute("data-img");
        newImg.classList.add("img-responsive");

        // Вставляем картинку
        imgContainer.insertBefore(newImg, imgContainer.firstChild);

        //если у большой картинки и у thumbnail'a один и тот же src, то выделяем бордером этот thumbnail:
        mainImgSrc = newImg.getAttribute("src");
        thumbSrc = this.getElementsByTagName('img')[0].getAttribute("src");
        if (mainImgSrc === thumbSrc) {
          this.getElementsByTagName('img')[0].style.boxSizing="padding-box";
          this.getElementsByTagName('img')[0].style.border="2px solid #1a7771";
        }

      });
    }
  }
  /* КОНЕЦ код для переключения главной картинки в разделе ГАЛЕРЕЯ */


  /* НАЧАЛО Image LightBox */
  //проверяем, есть ли элементы с data-imagelightbox на странцие, и только тогда запускаем код
  var isItLightbox = $('[data-imagelightbox]');
  if (isItLightbox.length > 0) {
    // activity indicator
    var activityIndicatorOn = function () {
        $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
      },
      activityIndicatorOff = function () {
        $('#imagelightbox-loading').remove();
      },

    // overlay
      overlayOn = function () {
        $('<div id="imagelightbox-overlay"></div>').appendTo('body');
      },
      overlayOff = function () {
        $('#imagelightbox-overlay').remove();
      },

    // close button
      closeButtonOn = function (instance) {
        $('<button type="button" id="imagelightbox-close" title="Close"></button>').appendTo('body').on('click touchend', function () {
          $(this).remove();
          instance.quitImageLightbox();
          return false;
        });
      },
      closeButtonOff = function () {
        $('#imagelightbox-close').remove();
      },

    // navigation
      navigationOn = function (instance, selector) {
        var images = $(selector);
        if (images.length) {
          var nav = $('<div id="imagelightbox-nav"></div>');
          for (var i = 0; i < images.length; i++)
            nav.append('<button type="button"></button>');

          nav.appendTo('body');
          nav.on('click touchend', function () {
            return false;
          });

          var navItems = nav.find('button');
          navItems.on('click touchend', function () {
              var $this = $(this);
              if (images.eq($this.index()).attr('href') != $('#imagelightbox').attr('src'))
                instance.switchImageLightbox($this.index());

              navItems.removeClass('active');
              navItems.eq($this.index()).addClass('active');

              return false;
            })
            .on('touchend', function () {
              return false;
            });
        }
      },
      navigationUpdate = function (selector) {
        var items = $('#imagelightbox-nav button');
        items.removeClass('active');
        items.eq($(selector).filter('[href="' + $('#imagelightbox').attr('src') + '"]').index(selector)).addClass('active');
      },
      navigationOff = function () {
        $('#imagelightbox-nav').remove();
      },

    // arrows
      arrowsOn = function (instance, selector) {
        var $arrows = $('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>');

        $arrows.appendTo('body');

        $arrows.on('click touchend', function (e) {
          e.preventDefault();

          var $this = $(this),
            $target = $(selector + '[href="' + $('#imagelightbox').attr('src') + '"]'),
            index = $target.index(selector);

          if ($this.hasClass('imagelightbox-arrow-left')) {
            index = index - 1;
            if (!$(selector).eq(index).length)
              index = $(selector).length;
          }
          else {
            index = index + 1;
            if (!$(selector).eq(index).length)
              index = 0;
          }

          instance.switchImageLightbox(index);
          return false;
        });
      },
      arrowsOff = function () {
        $('.imagelightbox-arrow').remove();
      };

    // по нажатию на data-imagelightbox="f" открывается lighbBox:
    var selectorF = 'a[data-imagelightbox="f"]';
    var instanceF = $(selectorF).imageLightbox(
      {
        onStart: function () {
          overlayOn();
          closeButtonOn(instanceF);
          arrowsOn(instanceF, selectorF);
        },
        onEnd: function () {
          overlayOff();
          closeButtonOff();
          arrowsOff();
          activityIndicatorOff();
        },
        onLoadStart: function () {
          activityIndicatorOn();
        },
        onLoadEnd: function () {
          activityIndicatorOff();
          $('.imagelightbox-arrow').css('display', 'block');
        }
      });
  }
  /* КОНЕЦ Image LightBox */

  /* НАЧАЛО Portfolio video source selector */
  //проверяем, есть ли элемент .portfolio на странцие, и только тогда запускаем код
  var isItPortfolio = document.getElementsByClassName('portfolio');

  if (isItPortfolio.length > 0) {
    var portfolio = document.getElementsByClassName('portfolio')[0],
      videoGalleryAnchor = portfolio.getElementsByClassName('videoThumb'),
      mainVideo = portfolio.getElementsByClassName('embed-container')[0].children,
      mainVideoContainer = portfolio.getElementsByClassName('embed-container')[0];

    for (var k = 0; k < videoGalleryAnchor.length; k++) {
      videoGalleryAnchor[k].addEventListener('click', function (event) {// вешаем событие на click
        event.preventDefault();

        mainVideo[0].remove(); // удаляем картинку

        // Создаём новую картинку с соотв-щим src и классами
        var newVid = document.createElement("iframe");
        newVid.src = this.getAttribute("data-src");
        newVid.frameBorder = '0';
        newVid.setAttribute('allowFullScreen', '');

        //удаляем класс active у всех элементов и добавляем класс
        // active для кликнутого элемента
        for (var i = 0; i < videoGalleryAnchor.length; i++) {
          videoGalleryAnchor[i].classList.remove("active");
        }
        this.classList.add("active");

        // Вставляем картинку
        mainVideoContainer.appendChild(newVid);

      });
    }
  }
  /* КОНЕЦ Portfolio video source selector */


});
