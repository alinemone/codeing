/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/file/admin/jquery.tagsinput-revisited.js":
/*!***************************************************************!*\
  !*** ./resources/js/file/admin/jquery.tagsinput-revisited.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* jQuery Tags Input Revisited Plugin
 *
 * Copyright (c) Krzysztof Rusnarczyk
 * Licensed under the MIT license */
(function ($) {
  var delimiter = [];
  var inputSettings = [];
  var callbacks = [];

  $.fn.addTag = function (value, options) {
    options = jQuery.extend({
      focus: false,
      callback: true
    }, options);
    this.each(function () {
      var id = $(this).attr('id');
      var tagslist = $(this).val().split(_getDelimiter(delimiter[id]));
      if (tagslist[0] === '') tagslist = [];
      value = jQuery.trim(value);
      var settings = inputSettings[id];

      if (settings.whitelist && settings.whitelist.indexOf(value) === -1) {
        return false;
      }

      if (inputSettings[id].unique && $(this).tagExist(value) || !_validateTag(value, inputSettings[id], tagslist, delimiter[id])) {
        $('#' + id + '_tag').addClass('error');
        return false;
      }

      $('<span>', {
        "class": 'tag'
      }).append($('<span>', {
        "class": 'tag-text'
      }).text(value), $('<button>', {
        "class": 'tag-remove'
      }).click(function () {
        return $('#' + id).removeTag(encodeURI(value));
      })).insertBefore('#' + id + '_addTag');
      tagslist.push(value);
      $('#' + id + '_tag').val('');

      if (options.focus) {
        $('#' + id + '_tag').focus();
      } else {
        $('#' + id + '_tag').blur();
      }

      $.fn.tagsInput.updateTagsField(this, tagslist);

      if (options.callback && callbacks[id] && callbacks[id]['onAddTag']) {
        var f = callbacks[id]['onAddTag'];
        f.call(this, this, value);
      }

      if (callbacks[id] && callbacks[id]['onChange']) {
        var i = tagslist.length;
        var f = callbacks[id]['onChange'];
        f.call(this, this, value);
      }
    });
    return false;
  };

  $.fn.removeTag = function (value) {
    value = decodeURI(value);
    this.each(function () {
      var id = $(this).attr('id');
      var old = $(this).val().split(_getDelimiter(delimiter[id]));
      $('#' + id + '_tagsinput .tag').remove();
      var str = '';

      for (i = 0; i < old.length; ++i) {
        if (old[i] != value) {
          str = str + _getDelimiter(delimiter[id]) + old[i];
        }
      }

      $.fn.tagsInput.importTags(this, str);

      if (callbacks[id] && callbacks[id]['onRemoveTag']) {
        var f = callbacks[id]['onRemoveTag'];
        f.call(this, this, value);
      }
    });
    return false;
  };

  $.fn.tagExist = function (val) {
    var id = $(this).attr('id');
    var tagslist = $(this).val().split(_getDelimiter(delimiter[id]));
    return jQuery.inArray(val, tagslist) >= 0;
  };

  $.fn.importTags = function (str) {
    var id = $(this).attr('id');
    $('#' + id + '_tagsinput .tag').remove();
    $.fn.tagsInput.importTags(this, str);
  };

  $.fn.tagsInput = function (options) {
    var settings = jQuery.extend({
      interactive: true,
      placeholder: 'افزودن برچسب',
      minChars: 0,
      maxChars: null,
      limit: null,
      validationPattern: null,
      width: 'auto',
      height: 'auto',
      autocomplete: null,
      hide: true,
      delimiter: ',',
      unique: true,
      removeWithBackspace: true,
      whitelist: null
    }, options);
    var uniqueIdCounter = 0;
    this.each(function () {
      if (typeof $(this).data('tagsinput-init') !== 'undefined') return;
      $(this).data('tagsinput-init', true);
      if (settings.hide) $(this).hide();
      var id = $(this).attr('id');

      if (!id || _getDelimiter(delimiter[$(this).attr('id')])) {
        id = $(this).attr('id', 'tags' + new Date().getTime() + ++uniqueIdCounter).attr('id');
      }

      var data = jQuery.extend({
        pid: id,
        real_input: '#' + id,
        holder: '#' + id + '_tagsinput',
        input_wrapper: '#' + id + '_addTag',
        fake_input: '#' + id + '_tag'
      }, settings);
      delimiter[id] = data.delimiter;
      inputSettings[id] = {
        minChars: settings.minChars,
        maxChars: settings.maxChars,
        limit: settings.limit,
        validationPattern: settings.validationPattern,
        unique: settings.unique,
        whitelist: settings.whitelist
      };

      if (settings.onAddTag || settings.onRemoveTag || settings.onChange) {
        callbacks[id] = [];
        callbacks[id]['onAddTag'] = settings.onAddTag;
        callbacks[id]['onRemoveTag'] = settings.onRemoveTag;
        callbacks[id]['onChange'] = settings.onChange;
      }

      var markup = $('<div>', {
        id: id + '_tagsinput',
        "class": 'tagsinput'
      }).append($('<div>', {
        id: id + '_addTag'
      }).append(settings.interactive ? $('<input>', {
        id: id + '_tag',
        "class": 'tag-input',
        value: '',
        placeholder: settings.placeholder
      }) : null));
      $(markup).insertAfter(this);
      $(data.holder).css('width', settings.width);
      $(data.holder).css('min-height', settings.height);
      $(data.holder).css('height', settings.height);

      if ($(data.real_input).val() !== '') {
        $.fn.tagsInput.importTags($(data.real_input), $(data.real_input).val());
      } // Stop here if interactive option is not chosen


      if (!settings.interactive) return;
      $(data.fake_input).val('');
      $(data.fake_input).data('pasted', false);
      $(data.fake_input).on('focus', data, function (event) {
        $(data.holder).addClass('focus');

        if ($(this).val() === '') {
          $(this).removeClass('error');
        }
      });
      $(data.fake_input).on('blur', data, function (event) {
        $(data.holder).removeClass('focus');
      });

      if (settings.autocomplete !== null && jQuery.ui.autocomplete !== undefined) {
        $(data.fake_input).autocomplete(settings.autocomplete);
        $(data.fake_input).on('autocompleteselect', data, function (event, ui) {
          $(event.data.real_input).addTag(ui.item.value, {
            focus: true,
            unique: settings.unique
          });
          return false;
        });
        $(data.fake_input).on('keypress', data, function (event) {
          if (_checkDelimiter(event)) {
            $(this).autocomplete("close");
          }
        });
      } else {
        $(data.fake_input).on('blur', data, function (event) {
          $(event.data.real_input).addTag($(event.data.fake_input).val(), {
            focus: true,
            unique: settings.unique
          });
          return false;
        });
      } // If a user types a delimiter create a new tag


      $(data.fake_input).on('keypress', data, function (event) {
        if (_checkDelimiter(event)) {
          event.preventDefault();
          $(event.data.real_input).addTag($(event.data.fake_input).val(), {
            focus: true,
            unique: settings.unique
          });
          return false;
        }
      });
      $(data.fake_input).on('paste', function () {
        $(this).data('pasted', true);
      }); // If a user pastes the text check if it shouldn't be splitted into tags

      $(data.fake_input).on('input', data, function (event) {
        if (!$(this).data('pasted')) return;
        $(this).data('pasted', false);
        var value = $(event.data.fake_input).val();
        value = value.replace(/\n/g, '');
        value = value.replace(/\s/g, '');

        var tags = _splitIntoTags(event.data.delimiter, value);

        if (tags.length > 1) {
          for (var i = 0; i < tags.length; ++i) {
            $(event.data.real_input).addTag(tags[i], {
              focus: true,
              unique: settings.unique
            });
          }

          return false;
        }
      }); // Deletes last tag on backspace

      data.removeWithBackspace && $(data.fake_input).on('keydown', function (event) {
        if (event.keyCode == 8 && $(this).val() === '') {
          event.preventDefault();
          var lastTag = $(this).closest('.tagsinput').find('.tag:last > span').text();
          var id = $(this).attr('id').replace(/_tag$/, '');
          $('#' + id).removeTag(encodeURI(lastTag));
          $(this).trigger('focus');
        }
      }); // Removes the error class when user changes the value of the fake input

      $(data.fake_input).keydown(function (event) {
        // enter, alt, shift, esc, ctrl and arrows keys are ignored
        if (jQuery.inArray(event.keyCode, [13, 37, 38, 39, 40, 27, 16, 17, 18, 225]) === -1) {
          $(this).removeClass('error');
        }
      });
    });
    return this;
  };

  $.fn.tagsInput.updateTagsField = function (obj, tagslist) {
    var id = $(obj).attr('id');
    $(obj).val(tagslist.join(_getDelimiter(delimiter[id])));
  };

  $.fn.tagsInput.importTags = function (obj, val) {
    $(obj).val('');
    var id = $(obj).attr('id');

    var tags = _splitIntoTags(delimiter[id], val);

    for (i = 0; i < tags.length; ++i) {
      $(obj).addTag(tags[i], {
        focus: false,
        callback: false
      });
    }

    if (callbacks[id] && callbacks[id]['onChange']) {
      var f = callbacks[id]['onChange'];
      f.call(obj, obj, tags);
    }
  };

  var _getDelimiter = function _getDelimiter(delimiter) {
    if (typeof delimiter === 'undefined') {
      return delimiter;
    } else if (typeof delimiter === 'string') {
      return delimiter;
    } else {
      return delimiter[0];
    }
  };

  var _validateTag = function _validateTag(value, inputSettings, tagslist, delimiter) {
    var result = true;
    if (value === '') result = false;
    if (value.length < inputSettings.minChars) result = false;
    if (inputSettings.maxChars !== null && value.length > inputSettings.maxChars) result = false;
    if (inputSettings.limit !== null && tagslist.length >= inputSettings.limit) result = false;
    if (inputSettings.validationPattern !== null && !inputSettings.validationPattern.test(value)) result = false;

    if (typeof delimiter === 'string') {
      if (value.indexOf(delimiter) > -1) result = false;
    } else {
      $.each(delimiter, function (index, _delimiter) {
        if (value.indexOf(_delimiter) > -1) result = false;
        return false;
      });
    }

    return result;
  };

  var _checkDelimiter = function _checkDelimiter(event) {
    var found = false;

    if (event.which === 13) {
      return true;
    }

    if (typeof event.data.delimiter === 'string') {
      if (event.which === event.data.delimiter.charCodeAt(0)) {
        found = true;
      }
    } else {
      $.each(event.data.delimiter, function (index, delimiter) {
        if (event.which === delimiter.charCodeAt(0)) {
          found = true;
        }
      });
    }

    return found;
  };

  var _splitIntoTags = function _splitIntoTags(delimiter, value) {
    if (value === '') return [];

    if (typeof delimiter === 'string') {
      return value.split(delimiter);
    } else {
      var tmpDelimiter = '∞';
      var text = value;
      $.each(delimiter, function (index, _delimiter) {
        text = text.split(_delimiter).join(tmpDelimiter);
      });
      return text.split(tmpDelimiter);
    }

    return [];
  };
})(jQuery);

/***/ }),

/***/ "./resources/js/product-setting.js":
/*!*****************************************!*\
  !*** ./resources/js/product-setting.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./file/admin/jquery.tagsinput-revisited.js */ "./resources/js/file/admin/jquery.tagsinput-revisited.js"); // format pool


window.separateNum = function separateNum(value, input) {
  /* seprate number input 3 number */
  var nStr = value + '';
  nStr = nStr.replace(/\,/g, "");
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;

  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }

  if (input !== undefined) {
    input.value = x1 + x2;
  } else {
    return x1 + x2;
  }
}; //function get count length title


window.Count = function Count() {
  var title = document.getElementById("product_title").value.length;
  var sf = document.getElementById("seo_title_fa").value.length;
  var se = document.getElementById("seo_title_en").value.length;
  var des = document.getElementById("seo_descriptions").value.length;
  document.getElementById("pro_title").innerHTML = 80 - title;
  document.getElementById("seo_fa").innerHTML = 60 - sf;
  document.getElementById("seo_en").innerHTML = 60 - se;
  document.getElementById("des_fa").innerHTML = 120 - des;
}; //small image check size & format


$('input[name=small_image]').change(function (e) {
  var ext = $('input[name=small_image]').val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['png', 'jpg']) == -1) {
    swal.fire({
      icon: 'error',
      title: 'اخطار',
      text: 'آپلود عکس با این فرمت مجاز نیست . فرمت های مجاز png,jpg'
    });
    $('input[name=small_image]').val("");
    return false;
  }

  if ($("#small_image")[0].files[0].size > 2097152) {
    swal.fire({
      icon: 'error',
      title: 'اخطار',
      text: 'حداکثر حجم برای آپلود این عکس 2 مگابایت است'
    });
    $('input[name=small_image]').val("");
    return false;
  }
}); //big image check size & format

$('input[name=big_image]').change(function (e) {
  var ext = $('input[name=big_image]').val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['png', 'jpg']) == -1) {
    swal.fire({
      icon: 'error',
      title: 'اخطار',
      text: 'آپلود عکس با این فرمت مجاز نیست . فرمت های مجاز png,jpg'
    });
    $('input[name=big_image]').val("");
    return false;
  }

  if ($("#big_image")[0].files[0].size > 2097152) {
    swal.fire({
      icon: 'error',
      title: 'اخطار',
      text: 'حداکثر حجم برای آپلود این عکس 2 مگابایت است'
    });
    $('input[name=big_image]').val("");
    return false;
  }
}); //product file check size & format

$('input[name=product_file]').change(function (e) {
  var ext = $('input[name=product_file]').val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['zip']) == -1) {
    swal.fire({
      icon: 'error',
      title: 'اخطار',
      text: 'آپلود فایل با این فرمت مجاز نیست . فرمت مجاز zip می باشد'
    });
    $('input[name=product_file]').val("");
    return false;
  }

  if ($("#product_file")[0].files[0].size > 209715200) {
    swal.fire({
      icon: 'error',
      title: 'اخطار',
      text: 'حداکثر حجم برای آپلود فایل 200 مگابایت است'
    });
    $('input[name=product_file]').val("");
    return false;
  }
}); // free or price

window.freeorprice = function freeorprice() {
  if ($('.freeproduct').is(":checked")) $('#pricetype').addClass('d-none');
  if ($('.priceproduct').is(":checked")) $('#pricetype').removeClass('d-none');
}; // validations


window.etbarsangy = function etbarsangy() {
  var invalid = 0;
  var titleproduct = $('input[name=product_title]').val();
  var small_image = $('input[name=small_image]').val();
  var big_image = $('input[name=big_image]').val();
  var product_file = $('input[name=product_file]').val();
  var seo_title_fa = $('input[name=seo_title_fa]').val();
  var seo_title_en = $('input[name=seo_title_en]').val();
  var seo_descriptions = $('input[name=seo_descriptions]').val();
  var demo_site = $('input[name=demo_site]').val();
  var tags = $('input[name=tags]').val();
  var priceFree = $('#priceFree').attr('checked');
  var priceCash = $('#priceCash').attr('checked');

  if (titleproduct == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#product_title").offset().top
    }, 500);
    $('input[name=product_title]').addClass('border border-danger');
  } else {
    $('input[name=product_title]').removeClass('border border-danger');
  }

  if (small_image == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#small_image").offset().top
    }, 500);
    $('input[name=small_image]').addClass('border border-danger');
  } else {
    $('input[name=small_image]').removeClass('border border-danger');
  }

  if (big_image == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#big_image").offset().top
    }, 500);
    $('input[name=big_image]').addClass('border border-danger');
  } else {
    $('input[name=big_image]').removeClass('border border-danger');
  }

  if (product_file == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#product_file").offset().top
    }, 500);
    $('input[name=product_file]').addClass('border border-danger');
  } else {
    $('input[name=product_file]').removeClass('border border-danger');
  }

  if (seo_title_fa == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#seo_title_fa").offset().top
    }, 500);
    $('input[name=seo_title_fa]').addClass('border border-danger');
  } else {
    $('input[name=seo_title_fa]').removeClass('border border-danger');
  }

  if (seo_title_en == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#seo_title_en").offset().top
    }, 500);
    $('input[name=seo_title_en]').addClass('border border-danger');
  } else {
    $('input[name=seo_title_en]').removeClass('border border-danger');
  }

  if (seo_descriptions == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#seo_descriptions").offset().top
    }, 500);
    $('input[name=seo_descriptions]').addClass('border border-danger');
  } else {
    $('input[name=seo_descriptions]').removeClass('border border-danger');
  }

  if (demo_site == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#demo_site").offset().top
    }, 500);
    $('input[name=demo_site]').addClass('border border-danger');
  } else {
    $('input[name=demo_site]').removeClass('border border-danger');
  }

  if (tags == '') {
    invalid = 1;
    $('html, body').animate({
      scrollTop: $("#tags").offset().top
    }, 500);
    $('input[name=tags]').addClass('border border-danger');
  } else {
    $('input[name=tags]').removeClass('border border-danger');
  }

  if (invalid == 1) {
    return false;
  }

  if (invalid == 0) {
    swal.fire({
      title: 'درحال بارگذاری ...',
      text: 'بسته به میزان سرعت اینترنت شما این فرایند ممکن است کمی زمان بر باشد ',
      onOpen: function onOpen() {
        swal.showLoading();
      }
    }).then(function (result) {
      if ( // Read more about handling dismissals
      result.dismiss === swal.DismissReason.timer) {
        console.log('I was closed by the timer');
      }
    });
  }
};

/***/ }),

/***/ 2:
/*!***********************************************!*\
  !*** multi ./resources/js/product-setting.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\lara6\resources\js\product-setting.js */"./resources/js/product-setting.js");


/***/ })

/******/ });