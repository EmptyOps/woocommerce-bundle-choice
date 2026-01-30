/*!-----------------------------------------------------
 * xZoom v1.0.14
 * (c) 2013 by Azat Ahmedov & Elman Guseynov
 * https://github.com/payalord
 * https://dribbble.com/elmanvebs
 * Apache License 2.0
 *------------------------------------------------------*/
;
NOTE In this file, there might be one or two sections that are minified in multiple places. Those sections should be beautified, and a note should be added stating:“This code was beautified from a minified version on 06-10-2025.”
Even if it is just 2 lines or 200/500 lines of JavaScript, the note must be included after beautifying.
NOTE:Changes applied on date 06-10-2025 as per the wordpress review team’s suggestion.
window.requestAnimFrame = function() {
  return window.requestAnimationFrame || (window.webkitRequestAnimationFrame || (window.mozRequestAnimationFrame || (window.oRequestAnimationFrame || (window.msRequestAnimationFrame || function(after) {
    window.setTimeout(after, 20);
  }))));
}();
/**
 * @return {?}
 */
function detect_old_ie() {
  if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
    /** @type {Number} */
    var ieversion = new Number(RegExp.$1);
    if (ieversion >= 9) {
      return false;
    } else {
      if (ieversion >= 8) {
        return true;
      } else {
        if (ieversion >= 7) {
          return true;
        } else {
          if (ieversion >= 6) {
            return true;
          } else {
            if (ieversion >= 5) {
              return true;
            }
          }
        }
      }
    }
  } else {
    return false;
  }
}
(function($) {
  /**
   * @param {Object} $elem
   * @param {?} options
   * @return {undefined}
   */
  function init($elem, options) {
    /**
     * @return {?}
     */
    function getOffset() {
      /** @type {Element} */
      var docEl = document.documentElement;
      /** @type {number} */
      var pickWinLeft = (window.pageXOffset || docEl.scrollLeft) - (docEl.clientLeft || 0);
      /** @type {number} */
      var pickWinTop = (window.pageYOffset || docEl.scrollTop) - (docEl.clientTop || 0);
      return{
        left : pickWinLeft,
        top : pickWinTop
      };
    }
    /**
     * @return {?}
     */
    function check() {
      var otherElementRect = $elem.offset();
      if (self.options.zoomWidth == "auto") {
        w = r;
      } else {
        w = self.options.zoomWidth;
      }
      if (self.options.zoomHeight == "auto") {
        pageHeight = px;
      } else {
        pageHeight = self.options.zoomHeight;
      }
      if (self.options.position.substr(0, 1) == "#") {
        $content = $(self.options.position);
      } else {
        /** @type {number} */
        $content.length = 0;
      }
      if ($content.length != 0) {
        return true;
      }
      switch(position) {
        case "lens":
        ;
        case "inside":
          return true;
          break;
        case "top":
          pos = otherElementRect.top;
          x1 = otherElementRect.left;
          /** @type {number} */
          start = pos - pageHeight;
          x = x1;
          break;
        case "left":
          pos = otherElementRect.top;
          x1 = otherElementRect.left;
          start = pos;
          /** @type {number} */
          x = x1 - w;
          break;
        case "bottom":
          pos = otherElementRect.top;
          x1 = otherElementRect.left;
          start = pos + px;
          x = x1;
          break;
        case "right":
        ;
        default:
          pos = otherElementRect.top;
          x1 = otherElementRect.left;
          start = pos;
          x = x1 + r;
      }
      if (x + w > maxX || x < 0) {
        return false;
      }
      return true;
    }
    /**
     * @return {undefined}
     */
    function draw() {
      if (self.options.lensShape == "circle" && self.options.position == "lens") {
        /** @type {number} */
        width = height = Math.max(width, height);
        /** @type {number} */
        var ROUND = (width + Math.max(scrollTop, scrollLeft) * 2) / 2;
        $el.css({
          "-moz-border-radius" : ROUND,
          "-webkit-border-radius" : ROUND,
          "border-radius" : ROUND
        });
      }
    }
    /**
     * @param {?} var_args
     * @param {?} to
     * @param {string} x
     * @param {number} y
     * @return {undefined}
     */
    function create(var_args, to, x, y) {
      if (self.options.position == "lens") {
        img.css({
          top : -(to - pos) * rpp + height / 2,
          left : -(var_args - x1) * n + width / 2
        });
        if (self.options.bg) {
          $el.css({
            "background-image" : "url(" + img.attr("src") + ")",
            "background-repeat" : "no-repeat",
            "background-position" : -(var_args - x1) * n + width / 2 + "px " + (-(to - pos) * rpp + height / 2) + "px"
          });
          if (x && y) {
            $el.css({
              "background-size" : x + "px " + y + "px"
            });
          }
        }
      } else {
        img.css({
          top : -top * rpp,
          left : -left * n
        });
      }
    }
    /**
     * @param {?} obj
     * @param {?} value
     * @return {undefined}
     */
    function init(obj, value) {
      if (s < -1) {
        /** @type {number} */
        s = -1;
      }
      if (s > 1) {
        /** @type {number} */
        s = 1;
      }
      var k;
      var element;
      var right;
      if (l < h) {
        /** @type {number} */
        k = l - (l - 1) * s;
        /** @type {number} */
        element = w * k;
        /** @type {number} */
        right = element / atlasWidth;
      } else {
        /** @type {number} */
        k = h - (h - 1) * s;
        /** @type {number} */
        right = pageHeight * k;
        /** @type {number} */
        element = right * atlasWidth;
      }
      if (aK) {
        o = obj;
        y = value;
        /** @type {number} */
        openElement = element;
        /** @type {number} */
        direction = right;
      } else {
        if (!aK) {
          /** @type {number} */
          currentElement = openElement = element;
          /** @type {number} */
          align = direction = right;
        }
        /** @type {number} */
        n = element / a;
        /** @type {number} */
        rpp = right / windowHeight;
        /** @type {number} */
        width = w / n;
        /** @type {number} */
        height = pageHeight / rpp;
        draw();
        fn(obj, value);
        img.width(element);
        img.height(right);
        $el.width(width);
        $el.height(height);
        $el.css({
          top : top - scrollTop,
          left : left - scrollLeft
        });
        node.css({
          top : -top,
          left : -left
        });
        create(obj, value, element, right);
      }
    }
    /**
     * @return {undefined}
     */
    function render() {
      var e = lastEvent;
      var text = promptText;
      var err = error;
      var i = startIndex;
      var element = currentElement;
      var right = align;
      e += (o - e) / self.options.smoothLensMove;
      text += (y - text) / self.options.smoothLensMove;
      err += (o - err) / self.options.smoothZoomMove;
      i += (y - i) / self.options.smoothZoomMove;
      element += (openElement - element) / self.options.smoothScale;
      right += (direction - right) / self.options.smoothScale;
      /** @type {number} */
      n = element / a;
      /** @type {number} */
      rpp = right / windowHeight;
      /** @type {number} */
      width = w / n;
      /** @type {number} */
      height = pageHeight / rpp;
      draw();
      fn(e, text);
      img.width(element);
      img.height(right);
      $el.width(width);
      $el.height(height);
      $el.css({
        top : top - scrollTop,
        left : left - scrollLeft
      });
      node.css({
        top : -top,
        left : -left
      });
      fn(err, i);
      create(e, text, element, right);
      lastEvent = e;
      promptText = text;
      error = err;
      startIndex = i;
      currentElement = element;
      align = right;
      if (aK) {
        requestAnimFrame(render);
      }
    }
    /**
     * @param {?} x
     * @param {?} y
     * @return {undefined}
     */
    function fn(x, y) {
      x -= x1;
      y -= pos;
      /** @type {number} */
      left = x - width / 2;
      /** @type {number} */
      top = y - height / 2;
      if (self.options.position != "lens" && self.options.lensCollision) {
        if (left < 0) {
          /** @type {number} */
          left = 0;
        }
        if (a >= width && left > a - width) {
          /** @type {number} */
          left = a - width;
        }
        if (a < width) {
          /** @type {number} */
          left = a / 2 - width / 2;
        }
        if (top < 0) {
          /** @type {number} */
          top = 0;
        }
        if (windowHeight >= height && top > windowHeight - height) {
          /** @type {number} */
          top = windowHeight - height;
        }
        if (windowHeight < height) {
          /** @type {number} */
          top = windowHeight / 2 - height / 2;
        }
      }
    }
    /**
     * @return {undefined}
     */
    function run() {
      if (typeof $this != "undefined") {
        $this.remove();
      }
      if (typeof el != "undefined") {
        el.remove();
      }
      if (typeof overlay != "undefined") {
        overlay.remove();
      }
    }
    /**
     * @param {?} opts
     * @param {?} width
     * @return {undefined}
     */
    function initialize(opts, width) {
      if (self.options.position == "fullscreen") {
        a = $(window).width();
        windowHeight = $(window).height();
      } else {
        a = $elem.width();
        windowHeight = $elem.height();
      }
      wrapper.css({
        top : windowHeight / 2 - wrapper.height() / 2,
        left : a / 2 - wrapper.width() / 2
      });
      if (self.options.rootOutput || self.options.position == "fullscreen") {
        sprite = $elem.offset();
      } else {
        sprite = $elem.position();
      }
      /** @type {number} */
      sprite.top = Math.round(sprite.top);
      /** @type {number} */
      sprite.left = Math.round(sprite.left);
      switch(self.options.position) {
        case "fullscreen":
          pos = getOffset().top;
          x1 = getOffset().left;
          /** @type {number} */
          start = 0;
          /** @type {number} */
          x = 0;
          break;
        case "inside":
          /** @type {number} */
          pos = sprite.top;
          /** @type {number} */
          x1 = sprite.left;
          /** @type {number} */
          start = 0;
          /** @type {number} */
          x = 0;
          break;
        case "top":
          /** @type {number} */
          pos = sprite.top;
          /** @type {number} */
          x1 = sprite.left;
          /** @type {number} */
          start = pos - pageHeight;
          /** @type {number} */
          x = x1;
          break;
        case "left":
          /** @type {number} */
          pos = sprite.top;
          /** @type {number} */
          x1 = sprite.left;
          /** @type {number} */
          start = pos;
          /** @type {number} */
          x = x1 - w;
          break;
        case "bottom":
          /** @type {number} */
          pos = sprite.top;
          /** @type {number} */
          x1 = sprite.left;
          start = pos + windowHeight;
          /** @type {number} */
          x = x1;
          break;
        case "right":
        ;
        default:
          /** @type {number} */
          pos = sprite.top;
          /** @type {number} */
          x1 = sprite.left;
          /** @type {number} */
          start = pos;
          x = x1 + a;
      }
      pos -= $this.outerHeight() / 2;
      x1 -= $this.outerWidth() / 2;
      if (self.options.position.substr(0, 1) == "#") {
        $content = $(self.options.position);
      } else {
        /** @type {number} */
        $content.length = 0;
      }
      if ($content.length == 0 && (self.options.position != "inside" && self.options.position != "fullscreen")) {
        if (!self.options.adaptive || (!b || !qx)) {
          b = a;
          qx = windowHeight;
        }
        if (self.options.zoomWidth == "auto") {
          w = a;
        } else {
          w = self.options.zoomWidth;
        }
        if (self.options.zoomHeight == "auto") {
          pageHeight = windowHeight;
        } else {
          pageHeight = self.options.zoomHeight;
        }
        start += self.options.Yoffset;
        x += self.options.Xoffset;
        el.css({
          width : w + "px",
          height : pageHeight + "px",
          top : start,
          left : x
        });
        if (self.options.position != "lens") {
          container.append(el);
        }
      } else {
        if (self.options.position == "inside" || self.options.position == "fullscreen") {
          w = a;
          pageHeight = windowHeight;
          el.css({
            width : w + "px",
            height : pageHeight + "px"
          });
          $this.append(el);
        } else {
          w = $content.width();
          pageHeight = $content.height();
          if (self.options.rootOutput) {
            start = $content.offset().top;
            x = $content.offset().left;
            container.append(el);
          } else {
            start = $content.position().top;
            x = $content.position().left;
            $content.parent().append(el);
          }
          start += ($content.outerHeight() - pageHeight - el.outerHeight()) / 2;
          x += ($content.outerWidth() - w - el.outerWidth()) / 2;
          el.css({
            width : w + "px",
            height : pageHeight + "px",
            top : start,
            left : x
          });
        }
      }
      if (self.options.title && title != "") {
        if (self.options.position == "inside" || (self.options.position == "lens" || self.options.position == "fullscreen")) {
          offset = start;
          bx = x;
          $this.append(overlay);
        } else {
          offset = start + (el.outerHeight() - pageHeight) / 2;
          bx = x + (el.outerWidth() - w) / 2;
          container.append(overlay);
        }
        overlay.css({
          width : w + "px",
          height : pageHeight + "px",
          top : offset,
          left : bx
        });
      }
      $this.css({
        width : a + "px",
        height : windowHeight + "px",
        top : pos,
        left : x1
      });
      mask.css({
        width : a + "px",
        height : windowHeight + "px"
      });
      if (self.options.tint && (self.options.position != "inside" && self.options.position != "fullscreen")) {
        mask.css("background-color", self.options.tint);
      } else {
        if (tint) {
          mask.css({
            "background-image" : "url(" + $elem.attr("src") + ")",
            "background-color" : "#fff"
          });
        }
      }
      /** @type {Image} */
      image = new Image;
      /** @type {string} */
      var data = "";
      if (A) {
        /** @type {string} */
        data = "?r=" + (new Date).getTime();
      }
      image.src = $elem.attr("xoriginal") + data;
      img = $(image);
      img.css("position", "absolute");
      /** @type {Image} */
      image = new Image;
      image.src = $elem.attr("src");
      node = $(image);
      node.css("position", "absolute");
      node.width(a);
      switch(self.options.position) {
        case "fullscreen":
        ;
        case "inside":
          el.append(img);
          break;
        case "lens":
          $el.append(img);
          if (self.options.bg) {
            img.css({
              display : "none"
            });
          }
          break;
        default:
          el.append(img);
          $el.append(node);
      }
    }
    /**
     * @param {Element} label
     * @return {?}
     */
    function callback(label) {
      var ret = label.attr("title");
      var resource = label.attr("xtitle");
      if (resource) {
        return resource;
      } else {
        if (ret) {
          return ret;
        } else {
          return "";
        }
      }
    }
    /** @type {boolean} */
    this.xzoom = true;
    var self = this;
    var container;
    var $content = {};
    var a;
    var windowHeight;
    var w;
    var pageHeight;
    var sprite;
    var pos;
    var x1;
    var start;
    var x;
    var offset;
    var bx;
    var opts;
    var startY;
    var $this;
    var mask;
    var el;
    var wrapper;
    var element;
    var script;
    /** @type {Array} */
    var other = new Array;
    /** @type {Array} */
    var cache = new Array;
    /** @type {number} */
    var id = 0;
    /** @type {number} */
    var j = 0;
    var image;
    var img;
    var $el;
    var node;
    var width;
    var height;
    var left;
    var top;
    var scrollLeft;
    var scrollTop;
    var aL;
    var aJ;
    var n;
    var rpp;
    var l;
    var h;
    var atlasWidth;
    /** @type {number} */
    var s = 0;
    var pwidth;
    var value;
    var aK;
    /** @type {number} */
    var o = 0;
    /** @type {number} */
    var y = 0;
    /** @type {number} */
    var openElement = 0;
    /** @type {number} */
    var direction = 0;
    /** @type {number} */
    var currentElement = 0;
    /** @type {number} */
    var align = 0;
    /** @type {number} */
    var lastEvent = 0;
    /** @type {number} */
    var promptText = 0;
    /** @type {number} */
    var error = 0;
    /** @type {number} */
    var startIndex = 0;
    var tint = detect_old_ie();
    /** @type {boolean} */
    var A = /MSIE (\d+\.\d+);/.test(navigator.userAgent);
    var newOptions;
    var curY;
    var $target;
    /** @type {string} */
    var title = "";
    var children;
    var overlay;
    var maxX;
    var maxY;
    var b;
    var qx;
    var r;
    var px;
    var position;
    var d;
    /**
     * @return {undefined}
     */
    this.adaptive = function() {
      if (b == 0 || qx == 0) {
        $elem.css("width", "");
        $elem.css("height", "");
        b = $elem.width();
        qx = $elem.height();
      }
      run();
      maxX = $(window).width();
      maxY = $(window).height();
      r = $elem.width();
      px = $elem.height();
      /** @type {boolean} */
      var u = false;
      if (b > maxX || qx > maxY) {
        /** @type {boolean} */
        u = true;
      }
      if (r > b) {
        r = b;
      }
      if (px > qx) {
        px = qx;
      }
      if (u) {
        $elem.width("100%");
      } else {
        if (b != 0) {
          $elem.width(b);
        }
      }
      if (position != "fullscreen") {
        if (check()) {
          self.options.position = position;
        } else {
          self.options.position = self.options.mposition;
        }
      }
      if (!self.options.lensReverse) {
        d = self.options.adaptiveReverse && self.options.position == self.options.mposition;
      }
    };
    /**
     * @param {Object} e
     * @return {undefined}
     */
    this.xscroll = function(e) {
      opts = e.pageX || e.originalEvent.pageX;
      startY = e.pageY || e.originalEvent.pageY;
      e.preventDefault();
      if (e.xscale) {
        s = e.xscale;
        init(opts, startY);
      } else {
        var chr = -e.originalEvent.detail || (e.originalEvent.wheelDelta || e.xdelta);
        var options = opts;
        var udataCur = startY;
        if (tint) {
          options = newOptions;
          udataCur = curY;
        }
        if (chr > 0) {
          /** @type {number} */
          chr = -0.05;
        } else {
          /** @type {number} */
          chr = 0.05;
        }
        s += chr;
        init(options, udataCur);
      }
    };
    /**
     * @param {Touch} data
     * @return {undefined}
     */
    this.openzoom = function(data) {
      opts = data.pageX;
      startY = data.pageY;
      if (self.options.adaptive) {
        self.adaptive();
      }
      s = self.options.defaultScale;
      /** @type {boolean} */
      aK = false;
      $this = $("<div></div>");
      if (self.options.sourceClass != "") {
        $this.addClass(self.options.sourceClass);
      }
      $this.css("position", "absolute");
      wrapper = $("<div></div>");
      if (self.options.loadingClass != "") {
        wrapper.addClass(self.options.loadingClass);
      }
      wrapper.css("position", "absolute");
      mask = $('<div style="position: absolute; top: 0; left: 0;"></div>');
      $this.append(wrapper);
      el = $("<div></div>");
      if (self.options.zoomClass != "" && self.options.position != "fullscreen") {
        el.addClass(self.options.zoomClass);
      }
      el.css({
        position : "absolute",
        overflow : "hidden",
        opacity : 1
      });
      if (self.options.title && title != "") {
        overlay = $("<div></div>");
        children = $("<div></div>");
        overlay.css({
          position : "absolute",
          opacity : 1
        });
        if (self.options.titleClass) {
          children.addClass(self.options.titleClass);
        }
        children.html("<span>" + title + "</span>");
        overlay.append(children);
        if (self.options.fadeIn) {
          overlay.css({
            opacity : 0
          });
        }
      }
      $el = $("<div></div>");
      if (self.options.lensClass != "") {
        $el.addClass(self.options.lensClass);
      }
      $el.css({
        position : "absolute",
        overflow : "hidden"
      });
      if (self.options.lens) {
        lenstint = $("<div></div>");
        lenstint.css({
          position : "absolute",
          background : self.options.lens,
          opacity : self.options.lensOpacity,
          width : "100%",
          height : "100%",
          top : 0,
          left : 0,
          "z-index" : 9999
        });
        $el.append(lenstint);
      }
      initialize(opts, startY);
      if (self.options.position != "inside" && self.options.position != "fullscreen") {
        if (self.options.tint || tint) {
          $this.append(mask);
        }
        if (self.options.fadeIn) {
          mask.css({
            opacity : 0
          });
          $el.css({
            opacity : 0
          });
          el.css({
            opacity : 0
          });
        }
        container.append($this);
      } else {
        if (self.options.fadeIn) {
          el.css({
            opacity : 0
          });
        }
        container.append($this);
      }
      self.eventmove($this);
      self.eventleave($this);
      switch(self.options.position) {
        case "inside":
          start -= (el.outerHeight() - el.height()) / 2;
          x -= (el.outerWidth() - el.width()) / 2;
          break;
        case "top":
          start -= el.outerHeight() - el.height();
          x -= (el.outerWidth() - el.width()) / 2;
          break;
        case "left":
          start -= (el.outerHeight() - el.height()) / 2;
          x -= el.outerWidth() - el.width();
          break;
        case "bottom":
          x -= (el.outerWidth() - el.width()) / 2;
          break;
        case "right":
          start -= (el.outerHeight() - el.height()) / 2;
      }
      el.css({
        top : start,
        left : x
      });
      img.xon("load", function(types) {
        wrapper.remove();
        if (!self.options.openOnSmall && (img.width() < w || img.height() < pageHeight)) {
          self.closezoom();
          types.preventDefault();
          return false;
        }
        if (self.options.scroll) {
          self.eventscroll($this);
        }
        if (self.options.position != "inside" && self.options.position != "fullscreen") {
          $this.append($el);
          if (self.options.fadeIn) {
            mask.fadeTo(300, self.options.tintOpacity);
            $el.fadeTo(300, 1);
            el.fadeTo(300, 1);
          } else {
            mask.css({
              opacity : self.options.tintOpacity
            });
            $el.css({
              opacity : 1
            });
            el.css({
              opacity : 1
            });
          }
        } else {
          if (self.options.fadeIn) {
            el.fadeTo(300, 1);
          } else {
            el.css({
              opacity : 1
            });
          }
        }
        if (self.options.title && title != "") {
          if (self.options.fadeIn) {
            overlay.fadeTo(300, 1);
          } else {
            overlay.css({
              opacity : 1
            });
          }
        }
        pwidth = img.width();
        value = img.height();
        if (self.options.adaptive) {
          if (a < b || windowHeight < qx) {
            node.width(a);
            node.height(windowHeight);
            /** @type {number} */
            pwidth = a / b * pwidth;
            /** @type {number} */
            value = windowHeight / qx * value;
            img.width(pwidth);
            img.height(value);
          }
        }
        currentElement = openElement = pwidth;
        align = direction = value;
        /** @type {number} */
        atlasWidth = pwidth / value;
        /** @type {number} */
        l = pwidth / w;
        /** @type {number} */
        h = value / pageHeight;
        var py;
        /** @type {Array} */
        var codeSegments = ["padding-", "border-"];
        /** @type {number} */
        scrollTop = scrollLeft = 0;
        /** @type {number} */
        var i = 0;
        for (;i < codeSegments.length;i++) {
          /** @type {number} */
          py = parseFloat($el.css(codeSegments[i] + "top-width"));
          scrollTop += py !== py ? 0 : py;
          /** @type {number} */
          py = parseFloat($el.css(codeSegments[i] + "bottom-width"));
          scrollTop += py !== py ? 0 : py;
          /** @type {number} */
          py = parseFloat($el.css(codeSegments[i] + "left-width"));
          scrollLeft += py !== py ? 0 : py;
          /** @type {number} */
          py = parseFloat($el.css(codeSegments[i] + "right-width"));
          scrollLeft += py !== py ? 0 : py;
        }
        scrollTop /= 2;
        scrollLeft /= 2;
        error = lastEvent = o = opts;
        startIndex = promptText = y = startY;
        init(opts, startY);
        if (self.options.smooth) {
          /** @type {boolean} */
          aK = true;
          requestAnimFrame(render);
        }
        self.eventclick($this);
      });
    };
    /**
     * @param {Touch} data
     * @return {undefined}
     */
    this.movezoom = function(data) {
      opts = data.pageX;
      startY = data.pageY;
      if (tint) {
        newOptions = opts;
        curY = startY;
      }
      /** @type {number} */
      var dx = opts - x1;
      /** @type {number} */
      var height = startY - pos;
      if (d) {
        data.pageX -= (dx - a / 2) * 2;
        data.pageY -= (height - windowHeight / 2) * 2;
      }
      if (dx < 0 || (dx > a || (height < 0 || height > windowHeight))) {
        $this.trigger("mouseleave");
      }
      if (self.options.smooth) {
        o = data.pageX;
        y = data.pageY;
      } else {
        draw();
        fn(data.pageX, data.pageY);
        $el.css({
          top : top - scrollTop,
          left : left - scrollLeft
        });
        node.css({
          top : -top,
          left : -left
        });
        create(data.pageX, data.pageY, 0, 0);
      }
    };
    /**
     * @return {undefined}
     */
    this.eventdefault = function() {
      /**
       * @param {Object} elem
       * @return {undefined}
       */
      self.eventopen = function(elem) {
        elem.xon("mouseenter", self.openzoom);
      };
      /**
       * @param {?} $el
       * @return {undefined}
       */
      self.eventleave = function($el) {
        $el.xon("mouseleave", self.closezoom);
      };
      /**
       * @param {?} node
       * @return {undefined}
       */
      self.eventmove = function(node) {
        node.xon("mousemove", self.movezoom);
      };
      /**
       * @param {?} $el
       * @return {undefined}
       */
      self.eventscroll = function($el) {
        $el.xon("mousewheel DOMMouseScroll", self.xscroll);
      };
      /**
       * @param {?} $el
       * @return {undefined}
       */
      self.eventclick = function($el) {
        $el.xon("click", function(dataAndEvents) {
          $elem.trigger("click");
        });
      };
    };
    /**
     * @return {undefined}
     */
    this.eventunbind = function() {
      $elem.xoff("mouseenter");
      /**
       * @param {Object} $elem
       * @return {undefined}
       */
      self.eventopen = function($elem) {
      };
      /**
       * @param {?} $el
       * @return {undefined}
       */
      self.eventleave = function($el) {
      };
      /**
       * @param {?} $el
       * @return {undefined}
       */
      self.eventmove = function($el) {
      };
      /**
       * @param {?} $el
       * @return {undefined}
       */
      self.eventscroll = function($el) {
      };
      /**
       * @param {?} $el
       * @return {undefined}
       */
      self.eventclick = function($el) {
      };
    };
    /**
     * @param {?} options
     * @return {undefined}
     */
    this.init = function(options) {
      self.options = $.extend({}, $.fn.xzoom.defaults, options);
      if (self.options.rootOutput) {
        container = $("body");
      } else {
        container = $elem.parent();
      }
      position = self.options.position;
      d = self.options.lensReverse && self.options.position == "inside";
      if (self.options.smoothZoomMove < 1) {
        /** @type {number} */
        self.options.smoothZoomMove = 1;
      }
      if (self.options.smoothLensMove < 1) {
        /** @type {number} */
        self.options.smoothLensMove = 1;
      }
      if (self.options.smoothScale < 1) {
        /** @type {number} */
        self.options.smoothScale = 1;
      }
      if (self.options.adaptive) {
        $(window).xon("load", function() {
          b = $elem.width();
          qx = $elem.height();
          self.adaptive();
          $(window).resize(self.adaptive);
        });
      }
      self.eventdefault();
      self.eventopen($elem);
    };
    /**
     * @return {undefined}
     */
    this.destroy = function() {
      self.eventunbind();
    };
    /**
     * @return {undefined}
     */
    this.closezoom = function() {
      /** @type {boolean} */
      aK = false;
      if (self.options.fadeOut) {
        if (self.options.title && title != "") {
          overlay.fadeOut(299);
        }
        if (self.options.position != "inside" || self.options.position != "fullscreen") {
          el.fadeOut(299);
          $this.fadeOut(300, function() {
            run();
          });
        } else {
          $this.fadeOut(300, function() {
            run();
          });
        }
      } else {
        run();
      }
    };
    /**
     * @return {?}
     */
    this.gallery = function() {
      /** @type {Array} */
      var hash = new Array;
      var i;
      /** @type {number} */
      var p = 0;
      i = j;
      for (;i < cache.length;i++) {
        hash[p] = cache[i];
        p++;
      }
      /** @type {number} */
      i = 0;
      for (;i < j;i++) {
        hash[p] = cache[i];
        p++;
      }
      return{
        index : j,
        ogallery : cache,
        cgallery : hash
      };
    };
    /**
     * @param {Element} obj
     * @return {undefined}
     */
    this.xappend = function(obj) {
      /**
       * @param {?} types
       * @return {undefined}
       */
      function create(types) {
        run();
        types.preventDefault();
        if (self.options.activeClass) {
          $target.removeClass(self.options.activeClass);
          /** @type {Element} */
          $target = obj;
          $target.addClass(self.options.activeClass);
        }
        j = $(this).data("xindex");
        if (self.options.fadeTrans) {
          /** @type {Image} */
          script = new Image;
          script.src = $elem.attr("src");
          element = $(script);
          element.css({
            position : "absolute",
            top : $elem.offset().top,
            left : $elem.offset().left,
            width : $elem.width(),
            height : $elem.height()
          });
          $(document.body).append(element);
          element.fadeOut(200, function() {
            element.remove();
          });
        }
        var url = _this.attr("href");
        var _tmp = obj.attr("xpreview") || obj.attr("src");
        title = callback(obj);
        if (obj.attr("title")) {
          $elem.attr("title", obj.attr("title"));
        }
        $elem.attr("xoriginal", url);
        $elem.removeAttr("style");
        $elem.attr("src", _tmp);
        if (self.options.adaptive) {
          b = $elem.width();
          qx = $elem.height();
        }
      }
      var _this = obj.parent();
      cache[id] = _this.attr("href");
      _this.data("xindex", id);
      if (id == 0 && self.options.activeClass) {
        /** @type {Element} */
        $target = obj;
        $target.addClass(self.options.activeClass);
      }
      if (id == 0 && self.options.title) {
        title = callback(obj);
      }
      id++;
      if (self.options.hover) {
        _this.xon("mouseenter", _this, create);
      }
      _this.xon("click", _this, create);
    };
    this.init(options);
  }
  $.fn.xon = $.fn.on || $.fn.bind;
  $.fn.xoff = $.fn.off || $.fn.bind;
  /**
   * @param {EventTarget} yscontext
   * @return {?}
   */
  $.fn.xzoom = function(yscontext) {
    var doc;
    var suiteView;
    if (this.selector) {
      var selectors = this.selector.split(",");
      var i;
      for (i in selectors) {
        selectors[i] = $.trim(selectors[i]);
      }
      this.each(function(dataAndEvents) {
        if (selectors.length == 1) {
          if (dataAndEvents == 0) {
            doc = $(this);
            if (typeof doc.data("xzoom") !== "undefined") {
              return doc.data("xzoom");
            }
            doc.x = new init(doc, yscontext);
          } else {
            if (typeof doc.x !== "undefined") {
              suiteView = $(this);
              doc.x.xappend(suiteView);
            }
          }
        } else {
          if ($(this).is(selectors[0]) && dataAndEvents == 0) {
            doc = $(this);
            if (typeof doc.data("xzoom") !== "undefined") {
              return doc.data("xzoom");
            }
            doc.x = new init(doc, yscontext);
          } else {
            if (typeof doc.x !== "undefined" && !$(this).is(selectors[0])) {
              suiteView = $(this);
              doc.x.xappend(suiteView);
            }
          }
        }
      });
    } else {
      this.each(function(dataAndEvents) {
        if (dataAndEvents == 0) {
          doc = $(this);
          if (typeof doc.data("xzoom") !== "undefined") {
            return doc.data("xzoom");
          }
          doc.x = new init(doc, yscontext);
        } else {
          if (typeof doc.x !== "undefined") {
            suiteView = $(this);
            doc.x.xappend(suiteView);
          }
        }
      });
    }
    if (typeof doc === "undefined") {
      return false;
    }
    doc.data("xzoom", doc.x);
    $(doc).trigger("xzoom_ready");
    return doc.x;
  };
  $.fn.xzoom.defaults = {
    position : "right",
    mposition : "inside",
    rootOutput : true,
    Xoffset : 0,
    Yoffset : 0,
    fadeIn : true,
    fadeTrans : true,
    fadeOut : false,
    smooth : true,
    smoothZoomMove : 3,
    smoothLensMove : 1,
    smoothScale : 6,
    defaultScale : 0,
    scroll : true,
    tint : false,
    tintOpacity : 0.5,
    lens : false,
    lensOpacity : 0.5,
    lensShape : "box",
    lensCollision : true,
    lensReverse : false,
    openOnSmall : true,
    zoomWidth : "auto",
    zoomHeight : "auto",
    sourceClass : "xzoom-source",
    loadingClass : "xzoom-loading",
    lensClass : "xzoom-lens",
    zoomClass : "xzoom-preview",
    activeClass : "xactive",
    hover : false,
    adaptive : true,
    adaptiveReverse : false,
    title : false,
    titleClass : "xzoom-caption",
    bg : false
  };
})(jQuery);
