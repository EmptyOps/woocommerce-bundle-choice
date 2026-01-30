NOTE In this file, there might be one or two sections that are minified in multiple places. Those sections should be beautified, and a note should be added stating:“This code was beautified from a minified version on 06-10-2025.”
Even if it is just 2 lines or 200/500 lines of JavaScript, the note must be included after beautifying.
NOTE:Changes applied on date 06-10-2025 as per the wordpress review team’s suggestion.
!function(global, factory) {
  if ("object" == typeof exports && "object" == typeof module) {
    module.exports = factory();
  } else {
    if ("function" == typeof define && define.amd) {
      define([], factory);
    } else {
      if ("object" == typeof exports) {
        exports.CssSelectorGenerator = factory();
      } else {
        global.CssSelectorGenerator = factory();
      }
    }
  }
}(window, function() {
  return function(processors) {
    /**
     * @param {number} name
     * @return {?}
     */
    function r(name) {
      if (t[name]) {
        return t[name].exports;
      }
      var m = t[name] = {
        i : name,
        l : false,
        exports : {}
      };
      return processors[name].call(m.exports, m, m.exports, r), m.l = true, m.exports;
    }
    var t = {};
    return r.m = processors, r.c = t, r.d = function(ctx, key, f) {
      if (!r.o(ctx, key)) {
        Object.defineProperty(ctx, key, {
          enumerable : true,
          /** @type {Function} */
          get : f
        });
      }
    }, r.r = function(context) {
      if ("undefined" != typeof Symbol) {
        if (Symbol.toStringTag) {
          Object.defineProperty(context, Symbol.toStringTag, {
            value : "Module"
          });
        }
      }
      Object.defineProperty(context, "__esModule", {
        value : true
      });
    }, r.t = function(str, a) {
      if (1 & a && (str = r(str)), 8 & a) {
        return str;
      }
      if (4 & a && ("object" == typeof str && (str && str.__esModule))) {
        return str;
      }
      /** @type {Object} */
      var ctx = Object.create(null);
      if (r.r(ctx), Object.defineProperty(ctx, "default", {
        enumerable : true,
        value : str
      }), 2 & a && "string" != typeof str) {  
        var path;
        for (path in str) {
          r.d(ctx, path, function(key) {
            return str[key];
          }.bind(null, path));
        }
      }
      return ctx;
    }, r.n = function(c) {
      /** @type {function (): ?} */
      var a = c && c.__esModule ? function() {
        return c.default;
      } : function() {
        return c;
      };
      return r.d(a, "a", a), a;
    }, r.o = function(action, options) {
      return Object.prototype.hasOwnProperty.call(action, options);
    }, r.p = "", r(r.s = 2);
  }([function(module, dataAndEvents, require) {
    /**
     * @param {Array} a
     * @param {?} l
     * @param {number} prefix
     * @return {undefined}
     */
    function makeArray(a, l, prefix) {
      if (Array.isArray(a)) {
        a.push(l);
      } else {
        a[prefix] = l;
      }
    }
    var assert = require(1);
    /**
     * @param {(Object|string)} obj
     * @return {?}
     */
    module.exports = function(obj) {
      var stop;
      var rvar;
      var list;
      /** @type {Array} */
      var assigns = [];
      if (Array.isArray(obj)) {
        /** @type {Array} */
        rvar = [];
        /** @type {number} */
        stop = obj.length - 1;
      } else {
        if ("object" != typeof obj || null === obj) {
          throw new TypeError("Expecting an Array or an Object, but `" + (null === obj ? "null" : typeof obj) + "` provided.");
        }
        rvar = {};
        /** @type {Array.<string>} */
        list = Object.keys(obj);
        /** @type {number} */
        stop = list.length - 1;
      }
      return function define(name, value) {
        var tl;
        var key;
        var vvar;
        key = list ? list[value] : value;
        if (!Array.isArray(obj[key])) {
          if (void 0 === obj[key]) {
            /** @type {Array} */
            obj[key] = [];
          } else {
            /** @type {Array} */
            obj[key] = [obj[key]];
          }
        }
        /** @type {number} */
        tl = 0;
        for (;tl < obj[key].length;tl++) {
          /** @type {(Array|{})} */
          val = name;
          makeArray(vvar = Array.isArray(val) ? [].concat(val) : assert(val), obj[key][tl], key);
          if (value >= stop) {
            assigns.push(vvar);
          } else {
            define(vvar, value + 1);
          }
        }
        var val;
      }(rvar, 0), assigns;
    };
  }, function(module, dataAndEvents) {
    /**
     * @return {?}
     */
    module.exports = function() {
      var a = {};
      /** @type {number} */
      var i = 0;
      for (;i < arguments.length;i++) {
        var b = arguments[i];
        var prop;
        for (prop in b) {
          if (hasOwn.call(b, prop)) {
            a[prop] = b[prop];
          }
        }
      }
      return a;
    };
    /** @type {function (this:Object, *): boolean} */
    var hasOwn = Object.prototype.hasOwnProperty;
  }, function(dataAndEvents, node, d) {
    /**
     * @param {Node} elem
     * @return {?}
     */
    function success(elem) {
      var parent = elem.parentNode;
      if (parent) {
        /** @type {number} */
        var caseSensitive = 0;
        var children = parent.childNodes;
        /** @type {number} */
        var i = 0;
        for (;i < children.length;i++) {
          if ($(children[i]) && (caseSensitive += 1, children[i] === elem)) {
            return[":nth-child(".concat(caseSensitive, ")")];
          }
        }
      }
      return[];
    }
    /**
     * @param {?} key
     * @return {?}
     */
    function merge(key) {
      return function(keys) {
        if (Array.isArray(keys)) {
          /** @type {number} */
          var i = 0;
          /** @type {Array} */
          var result = new Array(keys.length);
          for (;i < keys.length;i++) {
            result[i] = keys[i];
          }
          return result;
        }
      }(key) || (function(array) {
        if (Symbol.iterator in Object(array) || "[object Arguments]" === Object.prototype.toString.call(array)) {
          return Array.from(array);
        }
      }(key) || function() {
        throw new TypeError("Invalid attempt to spread non-iterable instance");
      }());
    }
    /**
     * @return {?}
     */
    function iterate() {
      var asserterNames = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
      /** @type {Array} */
      var keys = [[]];
      return asserterNames.forEach(function(idx) {
        keys.forEach(function(l) {
          keys.push(l.concat(idx));
        });
      }), keys.shift(), keys.sort(function(value, check) {
        return value.length - check.length;
      });
    }
    /**
     * @param {string} messageFormat
     * @return {?}
     */
    function throwError(messageFormat) {
      return messageFormat.replace(/[|\\{}()[\]^$+?.]/g, "\\$&").replace(/\*/g, ".+");
    }
    /**
     * @return {?}
     */
    function build() {
      var paths = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
      if (0 === paths.length) {
        return new RegExp(".^");
      }
      var keyops = paths.map(function(e) {
        return "string" == typeof e ? throwError(e) : e.source;
      }).join("|");
      return new RegExp(keyops);
    }
    /**
     * @param {(Node|string)} el
     * @param {string} selector
     * @return {?}
     */
    function callback(el, selector) {
      var element = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : document;
      var els = element.querySelectorAll(selector);
      return 1 === els.length && els[0] === el;
    }
    /**
     * @param {HTMLElement} v
     * @return {?}
     */
    function getTarget(v) {
      var context = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : document.querySelector(":root");
      /** @type {Array} */
      var eventPath = [];
      /** @type {HTMLElement} */
      var cur = v;
      for (;$(cur) && cur !== context;) {
        eventPath.push(cur);
        cur = cur.parentElement;
      }
      return eventPath;
    }
    /**
     * @param {Element} el
     * @return {?}
     */
    function fn(el) {
      return[replace(el.tagName.toLowerCase())];
    }
    /**
     * @param {?} selector
     * @return {?}
     */
    function all(selector) {
      return function(ar) {
        if (Array.isArray(ar)) {
          /** @type {number} */
          var i = 0;
          /** @type {Array} */
          var a = new Array(ar.length);
          for (;i < ar.length;i++) {
            a[i] = ar[i];
          }
          return a;
        }
      }(selector) || (function(array) {
        if (Symbol.iterator in Object(array) || "[object Arguments]" === Object.prototype.toString.call(array)) {
          return Array.from(array);
        }
      }(selector) || function() {
        throw new TypeError("Invalid attempt to spread non-iterable instance");
      }());
    }
    /**
     * @param {Node} c
     * @return {?}
     */
    function e(c) {
      var p = c.nodeName;
      var i = c.nodeValue;
      return "[".concat(p, "='").concat(replace(i), "']");
    }
    /**
     * @param {Node} event
     * @return {?}
     */
    function filter(event) {
      var selectors = event.nodeName;
      return!rneedsContext.test(selectors);
    }
    /**
     * @param {Object} xs
     * @return {?}
     */
    function map(xs) {
      return function(obj) {
        if (Array.isArray(obj)) {
          /** @type {number} */
          var i = 0;
          /** @type {Array} */
          var result = new Array(obj.length);
          for (;i < obj.length;i++) {
            result[i] = obj[i];
          }
          return result;
        }
      }(xs) || (function(array) {
        if (Symbol.iterator in Object(array) || "[object Arguments]" === Object.prototype.toString.call(array)) {
          return Array.from(array);
        }
      }(xs) || function() {
        throw new TypeError("Invalid attempt to spread non-iterable instance");
      }());
    }
    /**
     * @return {?}
     */
    function replace() {
      var cache = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "";
      return cache.split("").map(function(k) {
        return ":" === k ? "\\".concat(caseSensitive, " ") : stateAttributes.test(k) ? "\\".concat(k) : escape(k).replace(/%/g, "\\");
      }).join("");
    }
    /**
     * @param {Node} start
     * @param {(Object|boolean)} deepDataAndEvents
     * @return {?}
     */
    function clone(start, deepDataAndEvents) {
      var attrs;
      var _ref1;
      var key = function(dataAndEvents, deepDataAndEvents) {
        return function(dataAndEvents) {
          var event = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
          var selectors = event.selectors;
          var child = event.combineBetweenSelectors;
          var t = event.includeTag;
          var children = child ? iterate(selectors) : selectors.map(function(dataAndEvents) {
            return[dataAndEvents];
          });
          return t ? children.map(next) : children;
        }(dataAndEvents, deepDataAndEvents).map(function(failures) {
          return testSource = dataAndEvents, benchmarks = {}, failures.forEach(function(name) {
            var ref = testSource[name];
            if (ref.length > 0) {
              benchmarks[name] = ref;
            }
          }), w()(benchmarks).map(object);
          var testSource;
          var benchmarks;
        }).filter(function(g) {
          return "" !== g;
        });
      }(function(deepDataAndEvents, filter) {
        var args = filter.blacklist;
        var config = filter.whitelist;
        var length = filter.combineWithinSelector;
        var applyArgs = build(args);
        var result = build(config);
        return function(value) {
          var target = value.selectors;
          var ctor = value.includeTag;
          /** @type {Array} */
          var context = [].concat(target);
          if (ctor) {
            if (!context.includes("tag")) {
              context.push("tag");
            }
          }
          return context;
        }(filter).reduce(function($cookies, key) {
          var resultSet = function() {
            var bProperties = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
            var rneedsContext = arguments.length > 1 ? arguments[1] : void 0;
            return bProperties.sort(function(selectors, qualifier) {
              var f1SpecialConvert = rneedsContext.test(selectors);
              var f2SpecialConvert = rneedsContext.test(qualifier);
              return f1SpecialConvert && !f2SpecialConvert ? -1 : !f1SpecialConvert && f2SpecialConvert ? 1 : 0;
            });
          }(function() {
            var contextElem = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
            var rneedsContext = arguments.length > 1 ? arguments[1] : void 0;
            var POS = arguments.length > 2 ? arguments[2] : void 0;
            return contextElem.filter(function(selectors) {
              return POS.test(selectors) || !rneedsContext.test(selectors);
            });
          }(function(deepDataAndEvents, key) {
            return(defaults[key] || function() {
              return[];
            })(deepDataAndEvents);
          }(deepDataAndEvents, key), applyArgs, result), result);
          return $cookies[key] = length ? iterate(resultSet) : resultSet.map(function(dataAndEvents) {
            return[dataAndEvents];
          }), $cookies;
        }, {});
      }(start, deepDataAndEvents), deepDataAndEvents);
      /** @type {Array} */
      var resultItems = (attrs = key, (_ref1 = []).concat.apply(_ref1, merge(attrs)));
      /** @type {number} */
      var i = 0;
      for (;i < resultItems.length;i++) {
        var result = resultItems[i];
        if (callback(start, result, start.parentNode)) {
          return result;
        }
      }
      return "*";
    }
    /**
     * @param {Object} list
     * @return {?}
     */
    function next(list) {
      return list.includes("tag") || list.includes("nthoftype") ? map(list) : [].concat(map(list), ["tag"]);
    }
    /**
     * @param {?} index
     * @param {?} result
     * @return {?}
     */
    function end(index, result) {
      return result[index] ? result[index].join("") : "";
    }
    /**
     * @return {?}
     */
    function object() {
      var expectationResult = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
      return keys.map(function(next) {
        return end(next, expectationResult);
      }).join("");
    }
    /**
     * @param {Node} event
     * @param {?} args
     * @return {?}
     */
    function update(event, args) {
      return getTarget(event, args).map(function(arg) {
        return success(arg)[0];
      }).reverse().join(" > ");
    }
    /**
     * @return {?}
     */
    function fix() {
      var options = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
      return Object.assign({}, state, options);
    }
    /**
     * @param {Node} event
     * @return {?}
     */
    function handler(event) {
      var types = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
      var normalized = fix(types);
      var codeSegments = getTarget(event, normalized.root);
      /** @type {Array} */
      var params = [];
      /** @type {number} */
      var i = 0;
      for (;i < codeSegments.length;i++) {
        params.unshift(clone(codeSegments[i], normalized));
        /** @type {string} */
        var css = params.join(" > ");
        if (callback(event, css, normalized.root)) {
          return css;
        }
      }
      return update(event, normalized.root);
    }
    d.r(node);
    /** @type {function (Object): ?} */
    var setStyle = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(dataAndEvents) {
      return typeof dataAndEvents;
    } : function(b) {
      return b && ("function" == typeof Symbol && b.constructor === Symbol) ? "symbol" : typeof b;
    };
    /**
     * @param {Object} node
     * @return {?}
     */
    var $ = function(node) {
      return null != node && ("object" === (void 0 === node ? "undefined" : setStyle(node)) && (1 === node.nodeType && ("object" === setStyle(node.style) && "object" === setStyle(node.ownerDocument))));
    };
    var state = {
      selectors : ["id", "class", "tag", "attribute"],
      includeTag : false,
      whitelist : [],
      blacklist : [],
      root : document.querySelector(":root"),
      combineWithinSelector : true,
      combineBetweenSelectors : true
    };
    /** @type {RegExp} */
    var rchecked = new RegExp(["^$", "\\s", "^\\d"].join("|"));
    /** @type {RegExp} */
    var isSimple = new RegExp(["^$", "^\\d"].join("|"));
    /** @type {Array} */
    var keys = ["nthoftype", "tag", "id", "class", "attribute", "nthchild"];
    var r = d(0);
    var w = d.n(r);
    var rneedsContext = build(["class", "id", "ng-*"]);
    /** @type {string} */
    var caseSensitive = ":".charCodeAt(0).toString(16).toUpperCase();
    /** @type {RegExp} */
    var stateAttributes = /[ !"#$%&'()\[\]{|}<>*+,./;=?@^`~\\]/;
    var defaults = {
      /** @type {function (Element): ?} */
      tag : fn,
      /**
       * @param {Node} e
       * @return {?}
       */
      id : function(e) {
        var value = e.getAttribute("id") || "";
        /** @type {string} */
        var scripts = "#".concat(replace(value));
        return!rchecked.test(value) && callback(e, scripts, e.ownerDocument) ? [scripts] : [];
      },
      /**
       * @param {Element} node
       * @return {?}
       */
      class : function(node) {
        return(node.getAttribute("class") || "").trim().split(/\s+/).filter(function(qualifier) {
          return!isSimple.test(qualifier);
        }).map(function(array) {
          return ".".concat(replace(array));
        });
      },
      /**
       * @param {Object} element
       * @return {?}
       */
      attribute : function(element) {
        return all(element.attributes).filter(filter).map(e);
      },
      /** @type {function (Node): ?} */
      nthchild : success,
      /**
       * @param {Element} el
       * @return {?}
       */
      nthoftype : function(el) {
        var sel = fn(el)[0];
        var codeSegments = el.parentElement.querySelectorAll(sel);
        /** @type {number} */
        var i = 0;
        for (;i < codeSegments.length;i++) {
          if (codeSegments[i] === el) {
            return["".concat(sel, ":nth-of-type(").concat(i + 1, ")")];
          }
        }
        return[];
      }
    };
    d.d(node, "getCssSelector", function() {
      return handler;
    });
    /** @type {function (Node): ?} */
    node.default = handler;
  }]);
});
