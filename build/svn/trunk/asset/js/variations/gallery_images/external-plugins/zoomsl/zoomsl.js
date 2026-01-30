NOTE:Changes applied on date 02-10-2025 as per the wordpress review team’s suggestion.
(function($) {
  /** @type {boolean} */
  var i = true;
  /** @type {boolean} */
  var b = false;
  /**
   * @param {Object} until
   * @return {?}
   */
  $.fn.imagezoomsl = function(until) {
    until = until || {};
    return this.each(function() {
      if (!$(this).is("img")) {
        return i;
      }
      var list_id = this;
      setTimeout(function() {
        $(new Image).on("load", function() {
          item.F($(list_id), until);
        }).attr("src", $(list_id).attr("src"));
      }, 30);
    });
  };
  var item = {};
  $.extend(item, {
    dsetting : {
      loadinggif : "",
      loadopacity : 0.1,
      loadbackground : "#878787",
      cursorshade : i,
      magnifycursor : "crosshair",
      cursorshadecolor : "#fff",
      cursorshadeopacity : 0.3,
      cursorshadeborder : "1px solid black",
      zindex : "",
      stepzoom : 0.5,
      zoomrange : [2, 2],
      zoomstart : 2,
      disablewheel : i,
      showstatus : i,
      showstatustime : 2E3,
      statusdivborder : "1px solid black",
      statusdivbackground : "#C0C0C0",
      statusdivpadding : "4px",
      statusdivfont : "bold 13px Arial",
      statusdivopacity : 0.8,
      magnifierpos : "right",
      magnifiersize : [0, 0],
      magnifiereffectanimate : "showIn",
      innerzoom : b,
      innerzoommagnifier : b,
      descarea : b,
      leftoffset : 15,
      rightoffset : 15,
      switchsides : i,
      magnifierborder : "1px solid black",
      textdnbackground : "#fff",
      textdnpadding : "10px",
      textdnfont : "13px/20px cursive",
      scrollspeedanimate : 5,
      zoomspeedanimate : 7,
      loopspeedanimate : 2.5,
      magnifierspeedanimate : 350,
      classmagnifier : "magnifier",
      classcursorshade : "cursorshade",
      classstatusdiv : "statusdiv",
      classtextdn : "textdn"
    },
    U : -1 != navigator.userAgent.indexOf("MSIE") ? i : b,
    /**
     * @param {Object} node
     * @return {?}
     */
    T : function(node) {
      /** @type {number} */
      var result = 0;
      var value;
      node.parents().add(node).each(function() {
        value = $(this).css("zIndex");
        /** @type {number} */
        value = isNaN(value) ? 0 : +value;
        /** @type {number} */
        result = Math.max(result, value);
      });
      return result;
    },
    /**
     * @param {number} value
     * @param {number} max
     * @param {Object} data
     * @return {?}
     */
    L : function(value, max, data) {
      if ("left" == value) {
        return value = -data.f.b * data.k + data.e.b, 0 < max ? 0 : max < value ? value : max;
      }
      value = -data.f.d * data.k + data.e.d;
      return 0 < max ? 0 : max < value ? value : max;
    },
    /**
     * @param {Event} s
     * @return {undefined}
     */
    H : function(s) {
      var that = this;
      var data = s.data("specs");
      if (data) {
        var b = data.r.offsetsl();
        /** @type {number} */
        var tgrz = that.a.g - b.left;
        /** @type {number} */
        var n = that.a.i - b.top;
        that.a.B += (that.a.g - that.a.B) / 2.45342;
        that.a.C += (that.a.i - that.a.C) / 2.45342;
        data.G.css({
          left : that.a.B - 10,
          top : that.a.C + 20
        });
        /** @type {number} */
        var startTime = Math.round(data.e.b / data.k);
        /** @type {number} */
        var d = Math.round(data.e.d / data.k);
        that.a.z += (tgrz - that.a.z) / data.c.loopspeedanimate;
        that.a.A += (n - that.a.A) / data.c.loopspeedanimate;
        data.K.css({
          left : data.f.b > startTime ? Math.min(data.f.b - startTime, Math.max(0, that.a.z - startTime / 2)) + b.left - data.w.t.N : b.left - data.w.t.N,
          top : data.f.d > d ? Math.min(data.f.d - d, Math.max(0, that.a.A - d / 2)) + b.top - data.w.t.R : b.top - data.w.t.R
        });
        if (data.c.innerzoommagnifier) {
          that.a.p += (that.a.g - that.a.p) / data.c.loopspeedanimate;
          that.a.q += (that.a.i - that.a.q) / data.c.loopspeedanimate;
          data.l.css({
            left : that.a.p - Math.round(data.e.b / 2),
            top : that.a.q - Math.round(data.e.d / 2)
          });
          data.s.css({
            left : that.a.p - Math.round(data.e.b / 2),
            top : that.a.q + data.e.d / 2
          });
        }
        that.a.u += (tgrz - that.a.u) / data.c.scrollspeedanimate;
        that.a.v += (n - that.a.v) / data.c.scrollspeedanimate;
        data.J.css({
          left : that.L("left", -that.a.u * data.k + data.e.b / 2, data),
          top : that.L("top", -that.a.v * data.k + data.e.d / 2, data)
        });
        /** @type {number} */
        that.a.n = setTimeout(function() {
          that.H(s);
        }, 30);
      }
    },
    /**
     * @param {Event} $
     * @return {undefined}
     */
    I : function($) {
      var options = this;
      var data = $.data("specs");
      if (data) {
        data.h += (data.k - data.h) / data.c.zoomspeedanimate;
        /** @type {number} */
        data.h = Math.round(1E3 * data.h) / 1E3;
        data.K.css({
          width : data.f.b > Math.round(data.e.b / data.h) ? Math.round(data.e.b / data.h) : data.f.b,
          height : data.f.d > Math.round(data.e.d / data.h) ? Math.round(data.e.d / data.h) : data.f.d
        });
        data.J.css({
          width : Math.round(data.h * data.m.b * (data.f.b / data.m.b)),
          height : Math.round(data.h * data.m.d * (data.f.d / data.m.d))
        });
        /** @type {number} */
        options.a.o = setTimeout(function() {
          options.I($);
        }, 30);
      }
    },
    a : {},
    /**
     * @param {number} d
     * @return {undefined}
     */
    P : function(d) {
      /**
       * @return {undefined}
       */
      function complete() {
      }
      var data = d.data("specs");
      d = data.c.magnifiersize[0];
      var offset = data.c.magnifiersize[1];
      var sl;
      var a = data.r.offsetsl();
      /** @type {number} */
      var l = 0;
      /** @type {number} */
      var t = 0;
      sl = a.left + ("left" === data.c.magnifierpos ? -data.e.b - data.c.leftoffset : data.f.b + data.c.rightoffset);
      if (data.c.switchsides) {
        if (!data.c.innerzoom) {
          if ("left" !== data.c.magnifierpos && (sl + data.e.b + data.c.leftoffset >= $(window).width() && a.left - data.e.b >= data.c.leftoffset)) {
            /** @type {number} */
            sl = a.left - data.e.b - data.c.leftoffset;
          } else {
            if ("left" === data.c.magnifierpos) {
              if (0 > sl) {
                sl = a.left + data.f.b + data.c.rightoffset;
              }
            }
          }
        }
      }
      l = sl;
      t = a.top;
      data.l.css({
        visibility : "visible",
        display : "none"
      });
      if (data.c.descarea) {
        l = $(data.c.descarea).offsetsl().left;
        t = $(data.c.descarea).offsetsl().top;
      }
      if (data.c.innerzoommagnifier) {
        /** @type {number} */
        l = this.a.g - Math.round(data.e.b / 2);
        /** @type {number} */
        t = this.a.i - Math.round(data.e.d / 2);
      }
      /**
       * @return {undefined}
       */
      complete = function() {
        data.s.stop(i, i).fadeIn(data.c.magnifierspeedanimate);
        if (!data.c.innerzoommagnifier) {
          data.s.css({
            left : l,
            top : t + offset
          });
        }
      };
      if (data.c.innerzoom) {
        l = a.left;
        t = a.top;
        /**
         * @return {undefined}
         */
        complete = function() {
          data.r.css({
            visibility : "hidden"
          });
          data.s.css({
            left : l,
            top : t + offset
          }).stop(i, i).fadeIn(data.c.magnifierspeedanimate);
        };
      }
      switch(data.c.magnifiereffectanimate) {
        case "slideIn":
          data.l.css({
            left : l,
            top : t - offset / 3,
            width : d,
            height : offset
          }).stop(i, i).show().animate({
            top : t
          }, data.c.magnifierspeedanimate, "easeOutBounceSL", complete);
          break;
        case "showIn":
          data.l.css({
            left : a.left + Math.round(data.f.b / 2),
            top : a.top + Math.round(data.f.d / 2),
            width : Math.round(data.e.b / 5),
            height : Math.round(data.e.d / 5)
          }).stop(i, i).show().css({
            opacity : "0.1"
          }).animate({
            left : l,
            top : t,
            opacity : "1",
            width : d,
            height : offset
          }, data.c.magnifierspeedanimate, complete);
          break;
        default:
          data.l.css({
            left : l,
            top : t,
            width : d,
            height : offset
          }).stop(i, i).fadeIn(data.c.magnifierspeedanimate, complete);
      }
      if (data.c.showstatus && (data.Q || data.M)) {
        data.G.html(data.Q + '<div style="font-size:80%">' + data.M + "</div>").stop(i, i).fadeIn().delay(data.c.showstatustime).fadeOut("slow");
      } else {
        data.G.hide();
      }
    },
    /**
     * @param {Object} s
     * @return {undefined}
     */
    S : function(s) {
      var data = s.data("specs");
      s = data.r.offsetsl();
      switch(data.c.magnifiereffectanimate) {
        case "showIn":
          data.l.stop(i, i).animate({
            left : s.left + Math.round(data.f.b / 2),
            top : s.top + Math.round(data.f.d / 2),
            opacity : "0.1",
            width : Math.round(data.e.b / 5),
            height : Math.round(data.e.d / 5)
          }, data.c.magnifierspeedanimate, function() {
            data.l.hide();
          });
          break;
        default:
          data.l.stop(i, i).fadeOut(data.c.magnifierspeedanimate);
      }
    },
    /**
     * @param {Object} $this
     * @param {boolean} arg
     * @param {Element} layout
     * @return {undefined}
     */
    F : function($this, arg, layout) {
      /**
       * @return {undefined}
       */
      function result() {
        /** @type {number} */
        this.i = this.g = 0;
      }
      /**
       * @param {Object} tag
       * @return {undefined}
       */
      function start(tag) {
        el.data("specs", {
          c : data,
          Q : failureMessage,
          M : methodName,
          r : $this,
          l : last,
          J : tag,
          G : input,
          K : elem,
          s : node,
          f : c,
          m : {
            b : tag.width(),
            d : tag.height()
          },
          e : {
            b : last.width(),
            d : last.height()
          },
          w : {
            b : elem.width(),
            d : elem.height(),
            t : {
              N : parseInt(elem.css("border-left-width")) || 0,
              R : parseInt(elem.css("border-top-width")) || 0
            }
          },
          h : NUMBER,
          k : NUMBER
        });
      }
      /**
       * @param {Object} img
       * @return {?}
       */
      function is_image_loaded(img) {
        return!img.complete || "undefined" !== typeof img.naturalWidth && 0 === img.naturalWidth ? b : i;
      }
      /**
       * @param {Object} event
       * @return {?}
       */
      function handler(event) {
        var orgEvent = event || window.event;
        /** @type {Array.<?>} */
        var args = [].slice.call(arguments, 1);
        /** @type {number} */
        var delta = 0;
        /** @type {number} */
        var deltaX = 0;
        /** @type {number} */
        var deltaY = 0;
        /** @type {number} */
        var absDelta = 0;
        /** @type {number} */
        absDelta = 0;
        event = $.event.fix(orgEvent);
        /** @type {string} */
        event.type = "mousewheel";
        if (orgEvent.wheelDelta) {
          delta = orgEvent.wheelDelta;
        }
        if (orgEvent.detail) {
          /** @type {number} */
          delta = -1 * orgEvent.detail;
        }
        if (orgEvent.deltaY) {
          /** @type {number} */
          delta = deltaY = -1 * orgEvent.deltaY;
        }
        if (orgEvent.deltaX) {
          deltaX = orgEvent.deltaX;
          /** @type {number} */
          delta = -1 * deltaX;
        }
        if (void 0 !== orgEvent.wheelDeltaY) {
          deltaY = orgEvent.wheelDeltaY;
        }
        if (void 0 !== orgEvent.wheelDeltaX) {
          /** @type {number} */
          deltaX = -1 * orgEvent.wheelDeltaX;
        }
        /** @type {number} */
        absDelta = Math.abs(delta);
        if (!lowestDelta || absDelta < lowestDelta) {
          /** @type {number} */
          lowestDelta = absDelta;
        }
        /** @type {number} */
        absDelta = Math.max(Math.abs(deltaY), Math.abs(deltaX));
        if (!lowestDeltaXY || absDelta < lowestDeltaXY) {
          /** @type {number} */
          lowestDeltaXY = absDelta;
        }
        /** @type {string} */
        orgEvent = 0 < delta ? "floor" : "ceil";
        delta = Math[orgEvent](delta / lowestDelta);
        deltaX = Math[orgEvent](deltaX / lowestDeltaXY);
        deltaY = Math[orgEvent](deltaY / lowestDeltaXY);
        args.unshift(event, delta, deltaX, deltaY);
        return($.event.dispatch || $.event.handle).apply(this, args);
      }
      var data = $.extend({}, this.dsetting, arg);
      var zIndex = data.zindex || this.T($this);
      var c = {
        b : $this.width(),
        d : $this.height()
      };
      result = new result;
      var failureMessage = $this.attr("data-title") ? $this.attr("data-title") : "";
      var methodName = $this.attr("data-help") ? $this.attr("data-help") : "";
      var str = $this.attr("data-text-bottom") ? $this.attr("data-text-bottom") : "";
      var self = this;
      var NUMBER;
      var v;
      var last;
      var elem;
      var input;
      var el;
      var node;
      if (0 === c.d || 0 === c.b) {
        $(new Image).on("load", function() {
          self.F($this, arg);
        }).attr("src", $this.attr("src"));
      } else {
        $this.css({
          visibility : "visible"
        });
        data.j = $this.attr("data-large") || $this.attr("src");
        for (v in data) {
          if ("" === data[v]) {
            data[v] = this.dsetting[v];
          }
        }
        NUMBER = data.zoomrange[0] < data.zoomstart ? data.zoomstart : data.zoomrange[0];
        if ("0,0" === data.magnifiersize.toString() || "" === data.magnifiersize.toString()) {
          /** @type {Array} */
          data.magnifiersize = data.innerzoommagnifier ? [c.b / 2, c.d / 2] : [c.b, c.d];
        }
        if (data.descarea && $(data.descarea).length) {
          if (0 === $(data.descarea).width() || 0 === $(data.descarea).height()) {
            /** @type {boolean} */
            data.descarea = b;
          } else {
            /** @type {Array} */
            data.magnifiersize = [$(data.descarea).width(), $(data.descarea).height()];
          }
        } else {
          /** @type {boolean} */
          data.descarea = b;
        }
        if (data.innerzoom) {
          /** @type {Array} */
          data.magnifiersize = [c.b, c.d];
          if (!arg.cursorshade) {
            /** @type {boolean} */
            data.cursorshade = b;
          }
          if (!arg.scrollspeedanimate) {
            /** @type {number} */
            data.scrollspeedanimate = 10;
          }
        }
        if (data.innerzoommagnifier) {
          if (!arg.magnifycursor && (window.chrome || window.sidebar)) {
            /** @type {string} */
            data.magnifycursor = "none";
          }
          /** @type {boolean} */
          data.cursorshade = b;
          /** @type {string} */
          data.magnifiereffectanimate = "fadeIn";
        }
        /** @type {Array} */
        v = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"];
        /** @type {Array} */
        var toBind = "onwheel" in document || 9 <= document.documentMode ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"];
        var lowestDelta;
        var lowestDeltaXY;
        if ($.event.fixHooks) {
          /** @type {number} */
          var i = v.length;
          for (;i;) {
            $.event.fixHooks[v[--i]] = $.event.mouseHooks;
          }
        }
        $.event.special.mousewheel = {
          /**
           * @return {undefined}
           */
          setup : function() {
            if (this.addEventListener) {
              /** @type {number} */
              var i = toBind.length;
              for (;i;) {
                this.addEventListener(toBind[--i], handler, b);
              }
            } else {
              /** @type {function (Object): ?} */
              this.onmousewheel = handler;
            }
          },
          /**
           * @return {undefined}
           */
          teardown : function() {
            if (this.removeEventListener) {
              /** @type {number} */
              var i = toBind.length;
              for (;i;) {
                this.removeEventListener(toBind[--i], handler, b);
              }
            } else {
              /** @type {null} */
              this.onmousewheel = null;
            }
          }
        };
        /**
         * @return {?}
         */
        $.fn.offsetsl = function() {
          var pos = this.get(0);
          if (pos.getBoundingClientRect) {
            pos = this.offset();
          } else {
            /** @type {number} */
            var size = 0;
            /** @type {number} */
            var l = 0;
            for (;pos;) {
              size += parseInt(pos.offsetTop);
              l += parseInt(pos.offsetLeft);
              pos = pos.offsetParent;
            }
            pos = {
              top : size,
              left : l
            };
          }
          return pos;
        };
        /**
         * @param {?} dataAndEvents
         * @param {number} t
         * @param {number} b
         * @param {number} c
         * @param {number} d
         * @return {?}
         */
        $.easing.easeOutBounceSL = function(dataAndEvents, t, b, c, d) {
          return(t /= d) < 1 / 2.75 ? c * 7.5625 * t * t + b : t < 2 / 2.75 ? c * (7.5625 * (t -= 1.5 / 2.75) * t + 0.75) + b : t < 2.5 / 2.75 ? c * (7.5625 * (t -= 2.25 / 2.75) * t + 0.9375) + b : c * (7.5625 * (t -= 2.625 / 2.75) * t + 0.984375) + b;
        };
        last = $("<div />").attr({
          "class" : data.classmagnifier
        }).css({
          position : "absolute",
          zIndex : zIndex,
          width : data.magnifiersize[0],
          height : data.magnifiersize[1],
          left : -1E4,
          top : -1E4,
          visibility : "hidden",
          overflow : "hidden"
        }).appendTo(document.body);
        if (!arg.classmagnifier) {
          last.css({
            border : data.magnifierborder
          });
        }
        elem = $("<div />");
        if (data.cursorshade) {
          elem.attr({
            "class" : data.classcursorshade
          }).css({
            zIndex : zIndex,
            display : "none",
            position : "absolute",
            width : Math.round(data.magnifiersize[0] / data.zoomstart),
            height : Math.round(data.magnifiersize[1] / data.zoomstart),
            top : 0,
            left : 0
          }).appendTo(document.body);
          if (!arg.classcursorshade) {
            elem.css({
              border : data.cursorshadeborder,
              opacity : data.cursorshadeopacity,
              backgroundColor : data.cursorshadecolor
            });
          }
        }
        if (!data.loadinggif) {
          /** @type {string} */
          data.loadinggif = "data:image/gif;base64,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"
          ;
        }
        input = $("<div />").attr({
          "class" : data.classstatusdiv + " preloadevt"
        }).css({
          position : "absolute",
          display : "none",
          zIndex : zIndex,
          top : 0,
          left : 0
        }).html('<img src="' + data.loadinggif + '" />').appendTo(document.body);
        el = $("<div />").attr({
          "class" : "tracker"
        }).css({
          zIndex : zIndex,
          backgroundImage : self.U ? "url(cannotbe)" : "none",
          position : "absolute",
          width : c.b,
          height : c.d,
          left : layout ? $this.offsetsl().left : -1E4,
          top : layout ? $this.offsetsl().top : -1E4
        }).appendTo(document.body);
        node = $("<div />");
        if (str) {
          node.attr({
            "class" : data.classtextdn
          }).css({
            position : "absolute",
            zIndex : zIndex,
            left : 0,
            top : 0,
            display : "none"
          }).html(str).appendTo(document.body);
          if (!arg.classtextdn) {
            node.css({
              border : data.magnifierborder,
              background : data.textdnbackground,
              padding : data.textdnpadding,
              font : data.textdnfont
            });
          }
          node.css({
            width : data.magnifiersize[0] - parseInt(node.css("padding-left")) - parseInt(node.css("padding-right"))
          });
        }
        el.data("largeimage", data.j);
        $(window).bind("resize", function() {
          var iniPos = $this.offsetsl();
          if (el.data("loadimgevt")) {
            el.css({
              left : iniPos.left,
              top : iniPos.top
            });
          }
          input.filter(".preloadevt").css({
            left : iniPos.left + c.b / 2 - input.width() / 2,
            top : iniPos.top + c.d / 2 - input.height() / 2,
            visibility : "visible"
          });
        });
        $(document).mousemove(function(touches) {
          self.a.D = touches.pageX;
          if (self.a.g !== self.a.D) {
            clearTimeout(self.a.n);
            clearTimeout(self.a.o);
            $this.css({
              visibility : "visible"
            });
          }
        });
        $this.mouseover(function() {
          var iniPos = $this.offsetsl();
          el.css({
            left : iniPos.left,
            top : iniPos.top
          }).show();
        });
        el.mouseover(function(e) {
          self.a.g = e.pageX;
          self.a.i = e.pageY;
          result.g = e.pageX;
          result.i = e.pageY;
          self.a.D = e.pageX;
          var b = $this.offsetsl();
          /** @type {number} */
          e = self.a.g - b.left;
          /** @type {number} */
          b = self.a.i - b.top;
          /** @type {number} */
          self.a.z = e;
          /** @type {number} */
          self.a.A = b;
          /** @type {number} */
          self.a.u = e;
          /** @type {number} */
          self.a.v = b;
          self.a.p = self.a.g;
          self.a.q = self.a.i;
          /** @type {number} */
          self.a.B = self.a.g - 10;
          self.a.C = self.a.i + 20;
          el.css({
            cursor : data.magnifycursor
          });
          data.j = $this.attr("data-large") || $this.attr("src");
          input.show();
          clearTimeout(self.a.n);
          clearTimeout(self.a.o);
          if (data.j !== el.data("largeimage")) {
            $(new Image).on("load", function() {
            }).attr("src", data.j);
            $(el).unbind();
            $(input).remove();
            $(elem).remove();
            $(last).remove();
            $(el).remove();
            $(node).remove();
            self.F($this, arg, i);
          }
          if (el.data("loadevt")) {
            elem.fadeIn();
            self.P(el);
            self.H(el);
            self.I(el);
          }
        });
        el.mousemove(function(e) {
          data.j = $this.attr("data-large") || $this.attr("src");
          if (data.j !== el.data("largeimage")) {
            $(new Image).on("load", function() {
            }).attr("src", data.j);
            $(el).unbind();
            $(input).remove();
            $(elem).remove();
            $(last).remove();
            $(el).remove();
            $(node).remove();
            self.F($this, arg, i);
          }
          self.a.g = e.pageX;
          self.a.i = e.pageY;
          result.g = e.pageX;
          result.i = e.pageY;
          self.a.D = e.pageX;
        });
        el.mouseout(function() {
          clearTimeout(self.a.n);
          clearTimeout(self.a.o);
          $this.css({
            visibility : "visible"
          });
          node.hide();
          elem.add(input.not(".preloadevt")).stop(i, i).hide();
        });
        el.one("mouseover", function() {
          var otherElementRect = $this.offsetsl();
          var $el = $('<img src="' + data.j + '"/>').css({
            position : "relative",
            maxWidth : "none"
          }).appendTo(last);
          if (!self.O[data.j]) {
            el.css({
              opacity : data.loadopacity,
              background : data.loadbackground
            });
            el.data("loadimgevt", i);
            input.css({
              left : otherElementRect.left + c.b / 2 - input.width() / 2,
              top : otherElementRect.top + c.d / 2 - input.height() / 2,
              visibility : "visible"
            });
          }
          $el.bind("loadevt", function(dataAndEvents, error) {
            if ("error" !== error.type) {
              el.mouseout(function() {
                self.S(el);
                clearTimeout(self.a.n);
                clearTimeout(self.a.o);
                $this.css({
                  visibility : "visible"
                });
                node.hide();
                el.hide().css({
                  left : -1E4,
                  top : -1E4
                });
              });
              el.mouseover(function() {
                s.h = s.k;
              });
              el.data("loadimgevt", b);
              el.css({
                opacity : 0,
                cursor : data.magnifycursor
              });
              input.empty();
              if (!arg.classstatusdiv) {
                input.css({
                  border : data.statusdivborder,
                  background : data.statusdivbackground,
                  padding : data.statusdivpadding,
                  font : data.statusdivfont,
                  opacity : data.statusdivopacity
                });
              }
              input.hide().removeClass("preloadevt");
              /** @type {boolean} */
              self.O[data.j] = i;
              start($el);
              if (result.g == self.a.D) {
                elem.fadeIn();
                self.P(el);
                clearTimeout(self.a.n);
                clearTimeout(self.a.o);
                self.H(el);
                self.I(el);
              }
              var s = el.data("specs");
              $el.css({
                width : data.zoomstart * s.m.b * (c.b / s.m.b),
                height : data.zoomstart * s.m.d * (c.d / s.m.d)
              });
              el.data("loadevt", i);
              if (data.zoomrange && data.zoomrange[1] > data.zoomrange[0]) {
                el.bind("mousewheel", function(types, port) {
                  var offset = s.k;
                  /** @type {number} */
                  offset = "in" == (0 > port ? "out" : "in") ? Math.min(offset + data.stepzoom, data.zoomrange[1]) : Math.max(offset - data.stepzoom, data.zoomrange[0]);
                  /** @type {number} */
                  s.k = offset;
                  /** @type {number} */
                  s.V = port;
                  types.preventDefault();
                });
              } else {
                if (data.disablewheel) {
                  el.bind("mousewheel", function(types) {
                    types.preventDefault();
                  });
                }
              }
            }
          });
          if (is_image_loaded($el.get(0))) {
            $el.trigger("loadevt", {
              type : "load"
            });
          } else {
            $el.bind("load error", function(data) {
              $el.trigger("loadevt", data);
            });
          }
        });
      }
    },
    O : {}
  });
})(jQuery, window);
