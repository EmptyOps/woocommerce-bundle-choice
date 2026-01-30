NOTE In this file, there might be one or two sections that are minified in multiple places. Those sections should be beautified, and a note should be added stating:“This code was beautified from a minified version on 06-10-2025.”
Even if it is just 2 lines or 200/500 lines of JavaScript, the note must be included after beautifying.
NOTE:Changes applied on date 06-10-2025 as per the wordpress review team’s suggestion.
var $jscomp = $jscomp || {};
$jscomp.scope = {};
/**
 * @param {?} obj
 * @param {string} key
 * @return {?}
 */
$jscomp.owns = function(obj, key) {
  return Object.prototype.hasOwnProperty.call(obj, key);
};
/** @type {boolean} */
$jscomp.ASSUME_ES5 = false;
/** @type {boolean} */
$jscomp.ASSUME_NO_NATIVE_MAP = false;
/** @type {boolean} */
$jscomp.ASSUME_NO_NATIVE_SET = false;
/** @type {Function} */
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function(ctx, name, opt_attributes) {
  if (ctx != Array.prototype) {
    if (ctx != Object.prototype) {
      ctx[name] = opt_attributes.value;
    }
  }
};
/**
 * @param {Object} dataAndEvents
 * @return {?}
 */
$jscomp.getGlobal = function(dataAndEvents) {
  return "undefined" != typeof window && window === dataAndEvents ? dataAndEvents : "undefined" != typeof global && null != global ? global : dataAndEvents;
};
$jscomp.global = $jscomp.getGlobal(this);
/**
 * @param {string} name
 * @param {Object} func
 * @param {Object} ctx
 * @param {Object} key
 * @return {undefined}
 */
$jscomp.polyfill = function(name, func, ctx, key) {
  if (func) {
    ctx = $jscomp.global;
    name = name.split(".");
    /** @type {number} */
    key = 0;
    for (;key < name.length - 1;key++) {
      var k = name[key];
      if (!(k in ctx)) {
        ctx[k] = {};
      }
      ctx = ctx[k];
    }
    name = name[name.length - 1];
    key = ctx[name];
    func = func(key);
    if (func != key) {
      if (null != func) {
        $jscomp.defineProperty(ctx, name, {
          configurable : true,
          writable : true,
          value : func
        });
      }
    }
  }
};
$jscomp.polyfill("Object.assign", function(dataAndEvents) {
  return dataAndEvents ? dataAndEvents : function(object, dataAndEvents) {
    /** @type {number} */
    var i = 1;
    for (;i < arguments.length;i++) {
      var iterable = arguments[i];
      if (iterable) {
        var key;
        for (key in iterable) {
          if ($jscomp.owns(iterable, key)) {
            object[key] = iterable[key];
          }
        }
      }
    }
    return object;
  };
}, "es6-impl", "es3");
/** @type {string} */
$jscomp.SYMBOL_PREFIX = "jscomp_symbol_";
/**
 * @return {undefined}
 */
$jscomp.initSymbol = function() {
  /**
   * @return {undefined}
   */
  $jscomp.initSymbol = function() {
  };
  if (!$jscomp.global.Symbol) {
    /** @type {function (string): ?} */
    $jscomp.global.Symbol = $jscomp.Symbol;
  }
};
/** @type {number} */
$jscomp.symbolCounter_ = 0;
/**
 * @param {string} value
 * @return {?}
 */
$jscomp.Symbol = function(value) {
  return $jscomp.SYMBOL_PREFIX + (value || "") + $jscomp.symbolCounter_++;
};
/**
 * @return {undefined}
 */
$jscomp.initSymbolIterator = function() {
  $jscomp.initSymbol();
  var methodName = $jscomp.global.Symbol.iterator;
  if (!methodName) {
    methodName = $jscomp.global.Symbol.iterator = $jscomp.global.Symbol("iterator");
  }
  if ("function" != typeof Array.prototype[methodName]) {
    $jscomp.defineProperty(Array.prototype, methodName, {
      configurable : true,
      writable : true,
      /**
       * @return {?}
       */
      value : function() {
        return $jscomp.arrayIterator(this);
      }
    });
  }
  /**
   * @return {undefined}
   */
  $jscomp.initSymbolIterator = function() {
  };
};
/**
 * @param {(Array|number)} b
 * @return {?}
 */
$jscomp.arrayIterator = function(b) {
  /** @type {number} */
  var bi = 0;
  return $jscomp.iteratorPrototype(function() {
    return bi < b.length ? {
      done : false,
      value : b[bi++]
    } : {
      done : true
    };
  });
};
/**
 * @param {Object} nextState
 * @return {?}
 */
$jscomp.iteratorPrototype = function(nextState) {
  $jscomp.initSymbolIterator();
  nextState = {
    next : nextState
  };
  /**
   * @return {?}
   */
  nextState[$jscomp.global.Symbol.iterator] = function() {
    return this;
  };
  return nextState;
};
$jscomp.polyfill("Array.from", function(dataAndEvents) {
  return dataAndEvents ? dataAndEvents : function(a, f, o) {
    $jscomp.initSymbolIterator();
    f = null != f ? f : function(dataAndEvents) {
      return dataAndEvents;
    };
    /** @type {Array} */
    var codes = [];
    var c = a[Symbol.iterator];
    if ("function" == typeof c) {
      a = c.call(a);
      for (;!(c = a.next()).done;) {
        codes.push(f.call(o, c.value));
      }
    } else {
      c = a.length;
      /** @type {number} */
      var i = 0;
      for (;i < c;i++) {
        codes.push(f.call(o, a[i]));
      }
    }
    return codes;
  };
}, "es6-impl", "es3");
/**
 * @param {string} b
 * @param {Function} fn
 * @return {?}
 */
$jscomp.iteratorFromArray = function(b, fn) {
  $jscomp.initSymbolIterator();
  if (b instanceof String) {
    b += "";
  }
  /** @type {number} */
  var j = 0;
  var iter = {
    /**
     * @return {?}
     */
    next : function() {
      if (j < b.length) {
        /** @type {number} */
        var val = j++;
        return{
          value : fn(val, b[val]),
          done : false
        };
      }
      /**
       * @return {?}
       */
      iter.next = function() {
        return{
          done : true,
          value : void 0
        };
      };
      return iter.next();
    }
  };
  /**
   * @return {?}
   */
  iter[Symbol.iterator] = function() {
    return iter;
  };
  return iter;
};
$jscomp.polyfill("Array.prototype.keys", function(dataAndEvents) {
  return dataAndEvents ? dataAndEvents : function() {
    return $jscomp.iteratorFromArray(this, function(dataAndEvents) {
      return dataAndEvents;
    });
  };
}, "es6-impl", "es3");
$jscomp.polyfill("Object.is", function(dataAndEvents) {
  return dataAndEvents ? dataAndEvents : function(a, b) {
    return a === b ? 0 !== a || 1 / a === 1 / b : a !== a && b !== b;
  };
}, "es6-impl", "es3");
$jscomp.polyfill("Array.prototype.includes", function(dataAndEvents) {
  return dataAndEvents ? dataAndEvents : function(value, i) {
    var values = this;
    if (values instanceof String) {
      /** @type {string} */
      values = String(values);
    }
    var valuesLen = values.length;
    i = i || 0;
    for (;i < valuesLen;i++) {
      if (values[i] == value || Object.is(values[i], value)) {
        return true;
      }
    }
    return false;
  };
}, "es7", "es3");
/**
 * @param {(number|string)} dataAndEvents
 * @param {?} path
 * @param {string} includes
 * @return {?}
 */
$jscomp.checkStringArgs = function(dataAndEvents, path, includes) {
  if (null == dataAndEvents) {
    throw new TypeError("The 'this' value for String.prototype." + includes + " must not be null or undefined");
  }
  if (path instanceof RegExp) {
    throw new TypeError("First argument to String.prototype." + includes + " must not be a regular expression");
  }
  return dataAndEvents + "";
};
$jscomp.polyfill("String.prototype.includes", function(dataAndEvents) {
  return dataAndEvents ? dataAndEvents : function(selector, index) {
    return-1 !== $jscomp.checkStringArgs(this, selector, "includes").indexOf(selector, index || 0);
  };
}, "es6-impl", "es3");
$jscomp.polyfill("Array.prototype.fill", function(dataAndEvents) {
  return dataAndEvents ? dataAndEvents : function(offsetPosition, i, from) {
    var len = this.length || 0;
    if (0 > i) {
      /** @type {number} */
      i = Math.max(0, len + i);
    }
    if (null == from || from > len) {
      from = len;
    }
    /** @type {number} */
    from = Number(from);
    if (0 > from) {
      /** @type {number} */
      from = Math.max(0, len + from);
    }
    /** @type {number} */
    i = Number(i || 0);
    for (;i < from;i++) {
      this[i] = offsetPosition;
    }
    return this;
  };
}, "es6-impl", "es3");
(function() {
  /**
   * @param {Object} elem
   * @param {string} dir
   * @return {?}
   */
  function dir(elem, dir) {
    /** @type {Array} */
    var nodes = [];
    elem = elem[dir];
    for (;elem && 9 !== elem.nodeType;) {
      if (1 === elem.nodeType) {
        nodes.push($(elem));
      }
      elem = elem[dir];
    }
    return nodes;
  }
  /**
   * @param {Object} selector
   * @return {?}
   */
  function $(selector) {
    return{
      el : selector,
      /**
       * @return {?}
       */
      getClass : function() {
        return this.el.getAttribute("class") || "";
      },
      /**
       * @return {?}
       */
      getClasses : function() {
        return this.getClass().split(" ").map(function(requestUrl) {
          return requestUrl.replace(/^\s\s*/, "").replace(/\s\s*$/, "");
        }).filter(function(newlines) {
          return 0 < newlines.length;
        });
      },
      /**
       * @return {?}
       */
      prevAll : function() {
        return dir(this.el, "previousSibling");
      },
      /**
       * @return {?}
       */
      nextAll : function() {
        return dir(this.el, "nextSibling");
      },
      /**
       * @return {?}
       */
      parent : function() {
        return this.el.parentNode && 11 !== this.el.parentNode.nodeType ? $(this.el.parentNode) : null;
      }
    };
  }
  /**
   * @param {string} type
   * @return {?}
   */
  function layout(type) {
    return "string" === typeof type && null !== type.match(/^[a-zA-Z0-9]+$/gi) ? type : false;
  }
  /**
   * @param {string} type
   * @return {?}
   */
  function filter(type) {
    return "string" === typeof type && null !== type.match(/^\.?[a-zA-Z_\-:0-9]*$/gi) ? type : false;
  }
  /**
   * @param {string} o
   * @return {?}
   */
  function fail(o) {
    var $type$$47_val$$10 = "undefined" === typeof o ? "undefined" : callback(o);
    return!!o && ("object" == $type$$47_val$$10 || "function" == $type$$47_val$$10);
  }
  /**
   * @param {string} value
   * @return {?}
   */
  function write(value) {
    if ("number" == typeof value) {
      return value;
    }
    /** @type {string} */
    var o = value;
    if ("symbol" == ("undefined" === typeof o ? "undefined" : callback(o)) || o && ("object" == ("undefined" === typeof o ? "undefined" : callback(o)) && "[object Symbol]" == ostring.call(o))) {
      return rtn;
    }
    if (fail(value)) {
      value = "function" == typeof value.valueOf ? value.valueOf() : value;
      value = fail(value) ? value + "" : value;
    }
    if ("string" != typeof value) {
      return 0 === value ? value : +value;
    }
    /** @type {string} */
    value = value.replace(r20, "");
    return(o = exclude.test(value)) || rchecked.test(value) ? not(value.slice(2), o ? 2 : 8) : rRadial.test(value) ? rtn : +value;
  }
  /**
   * @param {Function} fn
   * @param {?} scope
   * @param {Array} arr
   * @return {?}
   */
  function walk(fn, scope, arr) {
    switch(arr.length) {
      case 0:
        return fn.call(scope);
      case 1:
        return fn.call(scope, arr[0]);
      case 2:
        return fn.call(scope, arr[0], arr[1]);
      case 3:
        return fn.call(scope, arr[0], arr[1], arr[2]);
    }
    return fn.apply(scope, arr);
  }
  /**
   * @param {Object} array
   * @param {Function} func
   * @return {?}
   */
  function lowerBound(array, func) {
    var i;
    if (i = !(!array || !array.length)) {
      a: {
        if (func !== func) {
          b: {
            /** @type {function (?): ?} */
            func = clone;
            i = array.length;
            /** @type {number} */
            var n = -1;
            for (;++n < i;) {
              if (func(array[n], n, array)) {
                /** @type {number} */
                array = n;
                break b;
              }
            }
            /** @type {number} */
            array = -1;
          }
        } else {
          /** @type {number} */
          i = -1;
          n = array.length;
          for (;++i < n;) {
            if (array[i] === func) {
              /** @type {number} */
              array = i;
              break a;
            }
          }
          /** @type {number} */
          array = -1;
        }
      }
      /** @type {boolean} */
      i = -1 < array;
    }
    return i;
  }
  /**
   * @param {?} dataAndEvents
   * @return {?}
   */
  function clone(dataAndEvents) {
    return dataAndEvents !== dataAndEvents;
  }
  /**
   * @param {Object} object
   * @param {?} fix
   * @return {?}
   */
  function isAsync(object, fix) {
    return object.has(fix);
  }
  /**
   * @param {string} o
   * @return {?}
   */
  function isFunction(o) {
    /** @type {boolean} */
    var result = false;
    if (null != o && "function" != typeof o.toString) {
      try {
        /** @type {boolean} */
        result = !!(o + "");
      } catch (c) {
      }
    }
    return result;
  }
  /**
   * @param {Array} items
   * @return {undefined}
   */
  function Map(items) {
    /** @type {number} */
    var i = -1;
    var len = items ? items.length : 0;
    this.clear();
    for (;++i < len;) {
      var item = items[i];
      this.set(item[0], item[1]);
    }
  }
  /**
   * @param {Array} collection
   * @return {undefined}
   */
  function constructor(collection) {
    /** @type {number} */
    var index = -1;
    var length = collection ? collection.length : 0;
    this.clear();
    for (;++index < length;) {
      var value = collection[index];
      this.set(value[0], value[1]);
    }
  }
  /**
   * @param {Array} collection
   * @return {undefined}
   */
  function test(collection) {
    /** @type {number} */
    var index = -1;
    var length = collection ? collection.length : 0;
    this.clear();
    for (;++index < length;) {
      var value = collection[index];
      this.set(value[0], value[1]);
    }
  }
  /**
   * @param {Array} items
   * @return {undefined}
   */
  function Set(items) {
    /** @type {number} */
    var i = -1;
    var len = items ? items.length : 0;
    this.__data__ = new test;
    for (;++i < len;) {
      this.add(items[i]);
    }
  }
  /**
   * @param {Arguments} v
   * @param {?} b
   * @return {?}
   */
  function fn(v, b) {
    var x = v.length;
    for (;x--;) {
      var a = v[x][0];
      if (a === b || a !== a && b !== b) {
        return x;
      }
    }
    return-1;
  }
  /**
   * @param {Object} value
   * @param {number} dataAndEvents
   * @param {Function} str
   * @param {boolean} deepDataAndEvents
   * @param {Array} s
   * @return {?}
   */
  function escape(value, dataAndEvents, str, deepDataAndEvents, s) {
    /** @type {number} */
    var a = -1;
    var len = value.length;
    if (!str) {
      /** @type {function (Object): ?} */
      str = isArguments;
    }
    if (!s) {
      /** @type {Array} */
      s = [];
    }
    for (;++a < len;) {
      var i = value[a];
      if (0 < dataAndEvents && str(i)) {
        if (1 < dataAndEvents) {
          escape(i, dataAndEvents - 1, str, deepDataAndEvents, s);
        } else {
          /** @type {Array} */
          var j = s;
          /** @type {number} */
          var g = -1;
          var cnl = i.length;
          var f = j.length;
          for (;++g < cnl;) {
            j[f + g] = i[g];
          }
        }
      } else {
        if (!deepDataAndEvents) {
          s[s.length] = i;
        }
      }
    }
    return s;
  }
  /**
   * @param {Object} context
   * @param {?} obj
   * @return {?}
   */
  function find(context, obj) {
    context = context.__data__;
    var type = "undefined" === typeof obj ? "undefined" : callback(obj);
    return("string" == type || ("number" == type || ("symbol" == type || "boolean" == type)) ? "__proto__" !== obj : null === obj) ? context["string" == typeof obj ? "string" : "hash"] : context.map;
  }
  /**
   * @param {Object} obj
   * @param {boolean} name
   * @return {?}
   */
  function extend(obj, name) {
    obj = null == obj ? void 0 : obj[name];
    /** @type {boolean} */
    name = !has(obj) || src && src in obj ? false : (isArray(obj) || isFunction(obj) ? regex : nativ).test(section(obj));
    return name ? obj : void 0;
  }
  /**
   * @param {Object} value
   * @return {?}
   */
  function isArguments(value) {
    var isFunction;
    if (!(isFunction = _isArray(value))) {
      isFunction = check(value) && (hasOwnProperty.call(value, "callee") && (!propertyIsEnumerable.call(value, "callee") || "[object Arguments]" == toString.call(value)));
    }
    return isFunction || !!($key && (value && value[$key]));
  }
  /**
   * @param {string} obj
   * @return {?}
   */
  function section(obj) {
    if (null != obj) {
      try {
        return core_toString.call(obj);
      } catch (b) {
      }
      return obj + "";
    }
    return "";
  }
  /**
   * @param {string} obj
   * @return {?}
   */
  function check(obj) {
    var val;
    if (val = !!obj && "object" == ("undefined" === typeof obj ? "undefined" : callback(obj))) {
      if (val = null != obj) {
        val = obj.length;
        /** @type {boolean} */
        val = "number" == typeof val && (-1 < val && (0 == val % 1 && 9007199254740991 >= val));
      }
      /** @type {boolean} */
      val = val && !isArray(obj);
    }
    return val;
  }
  /**
   * @param {string} obj
   * @return {?}
   */
  function isArray(obj) {
    obj = has(obj) ? toString.call(obj) : "";
    return "[object Function]" == obj || "[object GeneratorFunction]" == obj;
  }
  /**
   * @param {string} obj
   * @return {?}
   */
  function has(obj) {
    var $type$$47_val$$10 = "undefined" === typeof obj ? "undefined" : callback(obj);
    return!!obj && ("object" == $type$$47_val$$10 || "function" == $type$$47_val$$10);
  }
  /**
   * @param {Object} obj
   * @param {?} object
   * @return {?}
   */
  function values(obj, object) {
    return 0 < dq(obj.getClasses(), forOwn(object, function(currentElem) {
      return currentElem.getClasses();
    })).length || !keys(object).includes(obj.el.nodeName);
  }
  /**
   * @param {string} o
   * @return {?}
   */
  function stringify(o) {
    var $type$$47_val$$10 = "undefined" === typeof o ? "undefined" : callback(o);
    return!!o && ("object" == $type$$47_val$$10 || "function" == $type$$47_val$$10);
  }
  /**
   * @param {string} v
   * @return {?}
   */
  function handler(v) {
    if ("number" == typeof v) {
      return v;
    }
    /** @type {string} */
    var o = v;
    if ("symbol" == ("undefined" === typeof o ? "undefined" : callback(o)) || o && ("object" == ("undefined" === typeof o ? "undefined" : callback(o)) && "[object Symbol]" == objectToString.call(o))) {
      return err;
    }
    if (stringify(v)) {
      v = "function" == typeof v.valueOf ? v.valueOf() : v;
      v = stringify(v) ? v + "" : v;
    }
    if ("string" != typeof v) {
      return 0 === v ? v : +v;
    }
    /** @type {string} */
    v = v.replace(rreturn, "");
    return(o = regExp.test(v)) || invalid.test(v) ? fix(v.slice(2), o ? 2 : 8) : expected.test(v) ? err : +v;
  }
  /**
   * @param {?} dom
   * @return {?}
   */
  function create(dom) {
    var pathConfig = dom.getMethods();
    return{
      /**
       * @return {?}
       */
      finished : function() {
        return 0 === pathConfig.length;
      },
      /**
       * @return {?}
       */
      next : function() {
        return this.finished() ? false : pathConfig.shift().apply(void 0, arguments);
      }
    };
  }
  /**
   * @param {?} min2
   * @param {number} width
   * @return {?}
   */
  function map(min2, width) {
    if (0 >= width) {
      throw Error("Simmer: An invalid depth of " + width + " has been specified");
    }
    return Array(width - 1).fill().reduce(function(result, token) {
      if (result[result.length - 1].parent()) {
        token = result[result.length - 1].parent();
        result.push(token);
      }
      return result;
    }, [min2]);
  }
  /**
   * @return {?}
   */
  function require() {
    return build({}, config, 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : {});
  }
  /**
   * @return {?}
   */
  function init() {
    /**
     * @param {?} ex
     * @param {?} element
     * @return {undefined}
     */
    function onError(ex, element) {
      if (true === config.errorHandling) {
        throw ex;
      }
      if ("function" === typeof config.errorHandling) {
        config.errorHandling(ex, element);
      }
    }
    var target = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : window;
    var obj = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : false;
    var config = require(1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {});
    var data = obj || add(target, config.queryEngine);
    /**
     * @param {Object} element
     * @return {?}
     */
    obj = function init(element) {
      if (!element) {
        return onError.call(init, Error("Simmer: No element was specified for parsing."), element), false;
      }
      var self = new create(meta);
      var content = map($(element), config.depth);
      var selectorState = {
        stack : Array(content.length).fill().map(function() {
          return[];
        }),
        specificity : 0
      };
      var result = next(element, config, data, onError);
      for (;!self.finished() && !selectorState.verified;) {
        try {
          selectorState = self.next(content, selectorState, result, config, data);
          if (selectorState.specificity >= config.specificityThreshold) {
            if (!selectorState.verified) {
              selectorState.verified = result(selectorState);
            }
          }
        } catch (ex) {
          onError.call(init, ex, element);
        }
      }
      if (void 0 === selectorState.verified || selectorState.specificity < config.specificityThreshold) {
        selectorState.verified = result(selectorState);
      }
      return selectorState.verified ? selectorState.verificationDepth ? run(selectorState, selectorState.verificationDepth) : run(selectorState) : false;
    };
    /**
     * @return {?}
     */
    obj.configure = function() {
      var option = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : target;
      var helper = require(build({}, config, 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : {}));
      return init(option, helper, add(option, helper.queryEngine));
    };
    return obj;
  }
  var e = {
    /**
     * @return {?}
     */
    querySelectorAll : function() {
      throw Error("An invalid context has been provided to Simmer, it doesnt know how to query it");
    }
  };
  /**
   * @param {Element} target
   * @return {?}
   */
  var listen = function(target) {
    var form = "function" === typeof target.querySelectorAll ? target : target.document ? target.document : e;
    return function(selector, on) {
      try {
        return form.querySelectorAll(selector);
      } catch (failuresLink) {
        on(failuresLink);
      }
    };
  };
  /**
   * @param {Element} selector
   * @param {number} cb
   * @return {?}
   */
  var add = function(selector, cb) {
    var callback = "function" === typeof cb ? cb : listen(selector);
    return function(err, mongoObject) {
      return "string" !== typeof err ? [] : callback(err, mongoObject, selector);
    };
  };
  /** @type {function (string): ?} */
  var callback = "function" === typeof Symbol && "symbol" === typeof Symbol.iterator ? function(label) {
    return typeof label;
  } : function(label) {
    return label && ("function" === typeof Symbol && (label.constructor === Symbol && label !== Symbol.prototype)) ? "symbol" : typeof label;
  };
  var build = Object.assign || function(object) {
    /** @type {number} */
    var i = 1;
    for (;i < arguments.length;i++) {
      var iterable = arguments[i];
      var key;
      for (key in iterable) {
        if (Object.prototype.hasOwnProperty.call(iterable, key)) {
          object[key] = iterable[key];
        }
      }
    }
    return object;
  };
  var getActual = function() {
    return function(o, ln) {
      if (Array.isArray(o)) {
        return o;
      }
      if (Symbol.iterator in Object(o)) {
        /** @type {Array} */
        var data = [];
        /** @type {boolean} */
        var callback2 = true;
        /** @type {boolean} */
        var e = false;
        var bulk = void 0;
        try {
          var exports = o[Symbol.iterator]();
          var field;
          for (;!(callback2 = (field = exports.next()).done) && (data.push(field.value), !ln || data.length !== ln);callback2 = true) {
          }
        } catch (fn) {
          /** @type {boolean} */
          e = true;
          bulk = fn;
        } finally {
          try {
            if (!callback2 && exports["return"]) {
              exports["return"]();
            }
          } finally {
            if (e) {
              throw bulk;
            }
          }
        }
        return data;
      }
      throw new TypeError("Invalid attempt to destructure non-iterable instance");
    };
  }();
  /**
   * @param {Array} results
   * @return {?}
   */
  var makeArray = function(results) {
    if (Array.isArray(results)) {
      /** @type {number} */
      var i = 0;
      /** @type {Array} */
      var result = Array(results.length);
      for (;i < results.length;i++) {
        result[i] = results[i];
      }
      return result;
    }
    return Array.from(results);
  };
  /** @type {number} */
  var x = 1 / 0;
  /** @type {number} */
  var rtn = 0 / 0;
  /** @type {RegExp} */
  var r20 = /^\s+|\s+$/g;
  /** @type {RegExp} */
  var rRadial = /^[-+]0x[0-9a-f]+$/i;
  /** @type {RegExp} */
  var exclude = /^0b[01]+$/i;
  /** @type {RegExp} */
  var rchecked = /^0o[0-7]+$/i;
  /** @type {function (*, (number|undefined)): number} */
  var not = parseInt;
  /** @type {function (this:*): string} */
  var ostring = Object.prototype.toString;
  /**
   * @param {Array} obj
   * @param {number} type
   * @param {number} id
   * @return {?}
   */
  var query = function(obj, type, id) {
    if (!obj || !obj.length) {
      return[];
    }
    if (id || void 0 === type) {
      /** @type {number} */
      id = 1;
    } else {
      if (id = type) {
        id = write(id);
        id = id === x || id === -x ? 1.7976931348623157E308 * (0 > id ? -1 : 1) : id === id ? id : 0;
      } else {
        id = 0 === id ? id : 0;
      }
      /** @type {number} */
      type = id % 1;
      id = id === id ? type ? id - type : id : 0;
    }
    /** @type {number} */
    type = id;
    /** @type {number} */
    id = 0;
    var val = 0 > type ? 0 : type;
    /** @type {number} */
    type = -1;
    var max = obj.length;
    if (0 > id) {
      id = -id > max ? 0 : max + id;
    }
    val = val > max ? max : val;
    if (0 > val) {
      val += max;
    }
    /** @type {number} */
    max = id > val ? 0 : val - id >>> 0;
    id >>>= 0;
    /** @type {Array} */
    val = Array(max);
    for (;++type < max;) {
      val[type] = obj[type + id];
    }
    return val;
  };
  var o = "undefined" !== typeof window ? window : "undefined" !== typeof global ? global : "undefined" !== typeof self ? self : {};
  /** @type {RegExp} */
  var nativ = /^\[object .+?Constructor\]$/;
  var opts = "object" == callback(o) && (o && (o.Object === Object && o));
  /** @type {(Window|boolean)} */
  var ap = "object" == ("undefined" === typeof self ? "undefined" : callback(self)) && (self && (self.Object === Object && self));
  opts = opts || (ap || Function("return this")());
  ap = Array.prototype;
  var p = Function.prototype;
  var ObjProto = Object.prototype;
  var options = opts["__core-js_shared__"];
  var src = function() {
    /** @type {(Array.<string>|null)} */
    var charset = /[^.]+$/.exec(options && (options.keys && options.keys.IE_PROTO) || "");
    return charset ? "Symbol(src)_1." + charset : "";
  }();
  /** @type {function (this:Function): string} */
  var core_toString = p.toString;
  var hasOwnProperty = ObjProto.hasOwnProperty;
  var toString = ObjProto.toString;
  /** @type {RegExp} */
  var regex = RegExp("^" + core_toString.call(hasOwnProperty).replace(/[\\^$.*+?()[\]{}|]/g, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$");
  p = opts.Symbol;
  var propertyIsEnumerable = ObjProto.propertyIsEnumerable;
  /** @type {function (this:(Array.<T>|{length: number}), *=, *=, ...[T]): Array.<T>} */
  var source = ap.splice;
  var $key = p ? p.isConcatSpreadable : void 0;
  /** @type {function (...[*]): number} */
  var nativeMax = Math.max;
  var method = extend(opts, "Map");
  var style = extend(Object, "create");
  /**
   * @return {undefined}
   */
  Map.prototype.clear = function() {
    this.__data__ = style ? style(null) : {};
  };
  /**
   * @param {?} fix
   * @return {?}
   */
  Map.prototype["delete"] = function(fix) {
    return this.has(fix) && delete this.__data__[fix];
  };
  /**
   * @param {?} type
   * @return {?}
   */
  Map.prototype.get = function(type) {
    var events = this.__data__;
    return style ? (type = events[type], "__lodash_hash_undefined__" === type ? void 0 : type) : hasOwnProperty.call(events, type) ? events[type] : void 0;
  };
  /**
   * @param {?} type
   * @return {?}
   */
  Map.prototype.has = function(type) {
    var types = this.__data__;
    return style ? void 0 !== types[type] : hasOwnProperty.call(types, type);
  };
  /**
   * @param {?} path
   * @param {Object} parent
   * @return {?}
   */
  Map.prototype.set = function(path, parent) {
    this.__data__[path] = style && void 0 === parent ? "__lodash_hash_undefined__" : parent;
    return this;
  };
  /**
   * @return {undefined}
   */
  constructor.prototype.clear = function() {
    /** @type {Array} */
    this.__data__ = [];
  };
  /**
   * @param {number} n
   * @return {?}
   */
  constructor.prototype["delete"] = function(n) {
    var elements = this.__data__;
    n = fn(elements, n);
    if (0 > n) {
      return false;
    }
    if (n == elements.length - 1) {
      elements.pop();
    } else {
      source.call(elements, n, 1);
    }
    return true;
  };
  /**
   * @param {?} key
   * @return {?}
   */
  constructor.prototype.get = function(key) {
    var e = this.__data__;
    key = fn(e, key);
    return 0 > key ? void 0 : e[key][1];
  };
  /**
   * @param {?} type
   * @return {?}
   */
  constructor.prototype.has = function(type) {
    return-1 < fn(this.__data__, type);
  };
  /**
   * @param {?} key
   * @param {?} parent
   * @return {?}
   */
  constructor.prototype.set = function(key, parent) {
    var list = this.__data__;
    var p = fn(list, key);
    if (0 > p) {
      list.push([key, parent]);
    } else {
      list[p][1] = parent;
    }
    return this;
  };
  /**
   * @return {undefined}
   */
  test.prototype.clear = function() {
    this.__data__ = {
      hash : new Map,
      map : new (method || constructor),
      string : new Map
    };
  };
  /**
   * @param {?} b
   * @return {?}
   */
  test.prototype["delete"] = function(b) {
    return find(this, b)["delete"](b);
  };
  /**
   * @param {?} path
   * @return {?}
   */
  test.prototype.get = function(path) {
    return find(this, path).get(path);
  };
  /**
   * @param {?} type
   * @return {?}
   */
  test.prototype.has = function(type) {
    return find(this, type).has(type);
  };
  /**
   * @param {?} path
   * @param {Object} parent
   * @return {?}
   */
  test.prototype.set = function(path, parent) {
    find(this, path).set(path, parent);
    return this;
  };
  /** @type {function (?): ?} */
  Set.prototype.add = Set.prototype.push = function(view) {
    this.__data__.set(view, "__lodash_hash_undefined__");
    return this;
  };
  /**
   * @param {?} type
   * @return {?}
   */
  Set.prototype.has = function(type) {
    return this.__data__.has(type);
  };
  opts = function(nodes, n) {
    /** @type {number} */
    n = nativeMax(void 0 === n ? nodes.length - 1 : n, 0);
    return function() {
      /** @type {Arguments} */
      var args = arguments;
      /** @type {number} */
      var i = -1;
      /** @type {number} */
      var m = nativeMax(args.length - n, 0);
      /** @type {Array} */
      var result = Array(m);
      for (;++i < m;) {
        result[i] = args[n + i];
      }
      /** @type {number} */
      i = -1;
      /** @type {Array} */
      m = Array(n + 1);
      for (;++i < n;) {
        m[i] = args[i];
      }
      /** @type {Array} */
      m[n] = result;
      return walk(nodes, this, m);
    };
  }(function(tokens, s) {
    if (check(tokens)) {
      s = escape(s, 1, check, true);
      /** @type {number} */
      var ti = -1;
      /** @type {function (Object, Function): ?} */
      var fn = lowerBound;
      /** @type {boolean} */
      var value = true;
      var nTokens = tokens.length;
      /** @type {Array} */
      var str = [];
      var len = s.length;
      if (nTokens) {
        if (200 <= s.length) {
          /** @type {function (Object, ?): ?} */
          fn = isAsync;
          /** @type {boolean} */
          value = false;
          s = new Set(s);
        }
        b: for (;++ti < nTokens;) {
          var token = tokens[ti];
          var type = token;
          token = 0 !== token ? token : 0;
          if (value && type === type) {
            var i = len;
            for (;i--;) {
              if (s[i] === type) {
                continue b;
              }
            }
            str.push(token);
          } else {
            if (!fn(s, type, void 0)) {
              str.push(token);
            }
          }
        }
      }
      /** @type {Array} */
      tokens = str;
    } else {
      /** @type {Array} */
      tokens = [];
    }
    return tokens;
  });
  /** @type {function (*): boolean} */
  var _isArray = Array.isArray;
  var dq = opts;
  var forOwn = function(fn, module) {
    return module = {
      exports : {}
    }, fn(module, module.exports), module.exports;
  }(function(context, n) {
    /**
     * @param {Array} collection
     * @param {string} callback
     * @return {?}
     */
    function each(collection, callback) {
      /** @type {number} */
      var index = -1;
      var length = collection ? collection.length : 0;
      /** @type {Array} */
      var result = Array(length);
      for (;++index < length;) {
        result[index] = callback(collection[index], index, collection);
      }
      return result;
    }
    /**
     * @param {Array} collection
     * @param {Function} callback
     * @return {?}
     */
    function some(collection, callback) {
      /** @type {number} */
      var index = -1;
      var length = collection ? collection.length : 0;
      for (;++index < length;) {
        if (callback(collection[index], index, collection)) {
          return true;
        }
      }
      return false;
    }
    /**
     * @param {string} prop
     * @return {?}
     */
    function prefixed(prop) {
      return function(obj) {
        return null == obj ? void 0 : obj[prop];
      };
    }
    /**
     * @param {?} cb
     * @return {?}
     */
    function done(cb) {
      return function(outErr) {
        return cb(outErr);
      };
    }
    /**
     * @param {string} obj
     * @return {?}
     */
    function stringify(obj) {
      /** @type {boolean} */
      var string = false;
      if (null != obj && "function" != typeof obj.toString) {
        try {
          /** @type {boolean} */
          string = !!(obj + "");
        } catch (p) {
        }
      }
      return string;
    }
    /**
     * @param {Array} data
     * @return {?}
     */
    function parse(data) {
      /** @type {number} */
      var ri = -1;
      /** @type {Array} */
      var result = Array(data.size);
      data.forEach(function(content, value) {
        /** @type {Array} */
        result[++ri] = [value, content];
      });
      return result;
    }
    /**
     * @param {Array} data
     * @return {?}
     */
    function flatten(data) {
      /** @type {number} */
      var ri = -1;
      /** @type {Array} */
      var result = Array(data.size);
      data.forEach(function(style) {
        result[++ri] = style;
      });
      return result;
    }
    /**
     * @param {Array} collection
     * @return {undefined}
     */
    function test(collection) {
      /** @type {number} */
      var index = -1;
      var length = collection ? collection.length : 0;
      this.clear();
      for (;++index < length;) {
        var value = collection[index];
        this.set(value[0], value[1]);
      }
    }
    /**
     * @param {Array} array
     * @return {undefined}
     */
    function Promise(array) {
      /** @type {number} */
      var index = -1;
      var length = array ? array.length : 0;
      this.clear();
      for (;++index < length;) {
        var prop = array[index];
        this.set(prop[0], prop[1]);
      }
    }
    /**
     * @param {Array} items
     * @return {undefined}
     */
    function Map(items) {
      /** @type {number} */
      var i = -1;
      var len = items ? items.length : 0;
      this.clear();
      for (;++i < len;) {
        var item = items[i];
        this.set(item[0], item[1]);
      }
    }
    /**
     * @param {Array} items
     * @return {undefined}
     */
    function Set(items) {
      /** @type {number} */
      var i = -1;
      var len = items ? items.length : 0;
      this.__data__ = new Map;
      for (;++i < len;) {
        this.add(items[i]);
      }
    }
    /**
     * @param {?} fn
     * @return {undefined}
     */
    function constructor(fn) {
      this.__data__ = new Promise(fn);
    }
    /**
     * @param {Arguments} arr
     * @param {?} parent
     * @return {?}
     */
    function join(arr, parent) {
      var orgLen = arr.length;
      for (;orgLen--;) {
        if (gcd(arr[orgLen][0], parent)) {
          return orgLen;
        }
      }
      return-1;
    }
    /**
     * @param {Array} arr
     * @param {number} dataAndEvents
     * @param {Function} fn
     * @param {?} deepDataAndEvents
     * @param {Array} s
     * @return {?}
     */
    function clone(arr, dataAndEvents, fn, deepDataAndEvents, s) {
      /** @type {number} */
      var i = -1;
      var size = arr.length;
      if (!fn) {
        /** @type {function (Object): ?} */
        fn = max;
      }
      if (!s) {
        /** @type {Array} */
        s = [];
      }
      for (;++i < size;) {
        var item = arr[i];
        if (0 < dataAndEvents && fn(item)) {
          if (1 < dataAndEvents) {
            clone(item, dataAndEvents - 1, fn, deepDataAndEvents, s);
          } else {
            /** @type {Array} */
            var arr1 = s;
            /** @type {number} */
            var j = -1;
            var length = item.length;
            var len1 = arr1.length;
            for (;++j < length;) {
              arr1[len1 + j] = item[j];
            }
          }
        } else {
          if (!deepDataAndEvents) {
            s[s.length] = item;
          }
        }
      }
      return s;
    }
    /**
     * @param {number} key
     * @param {string} res
     * @return {?}
     */
    function post(key, res) {
      res = inspect(res, key) ? [res] : cb(res);
      /** @type {number} */
      var a = 0;
      var b = res.length;
      for (;null != key && a < b;) {
        key = key[next(res[a++])];
      }
      return a && a == b ? key : void 0;
    }
    /**
     * @param {?} el
     * @param {?} item
     * @param {number} func
     * @param {number} type
     * @param {Object} node
     * @return {?}
     */
    function process(el, item, func, type, node) {
      if (el === item) {
        return true;
      }
      if (null == el || (null == item || !isObject(el) && !apply(item))) {
        return el !== el && item !== item;
      }
      a: {
        /** @type {boolean} */
        var i = isArray(el);
        /** @type {boolean} */
        var length = isArray(item);
        /** @type {string} */
        var result = "[object Array]";
        /** @type {string} */
        var value = "[object Array]";
        if (!i) {
          result = fn(el);
          result = "[object Arguments]" == result ? "[object Object]" : result;
        }
        if (!length) {
          value = fn(item);
          value = "[object Arguments]" == value ? "[object Object]" : value;
        }
        /** @type {boolean} */
        var index = "[object Object]" == result && !stringify(el);
        /** @type {boolean} */
        length = "[object Object]" == value && !stringify(item);
        if ((value = result == value) && !index) {
          if (!node) {
            node = new constructor;
          }
          item = i || computed(el) ? add(el, item, process, func, type, node) : set(el, item, result, process, func, type, node);
        } else {
          if (!(type & 2) && (i = index && jQuery.call(el, "__wrapped__"), result = length && jQuery.call(item, "__wrapped__"), i || result)) {
            el = i ? el.value() : el;
            item = result ? item.value() : item;
            if (!node) {
              node = new constructor;
            }
            item = process(el, item, func, type, node);
            break a;
          }
          if (value) {
            if (!node) {
              node = new constructor;
            }
            b: {
              var selector;
              /** @type {number} */
              i = type & 2;
              result = filter(el);
              length = result.length;
              value = filter(item).length;
              if (length == value || i) {
                index = length;
                for (;index--;) {
                  var id = result[index];
                  if (!(i ? id in item : jQuery.call(item, id))) {
                    /** @type {boolean} */
                    item = false;
                    break b;
                  }
                }
                if ((value = node.get(el)) && node.get(item)) {
                  /** @type {boolean} */
                  item = value == item;
                } else {
                  /** @type {boolean} */
                  value = true;
                  node.set(el, item);
                  node.set(item, el);
                  /** @type {number} */
                  var j = i;
                  for (;++index < length;) {
                    id = result[index];
                    var e = el[id];
                    var name = item[id];
                    if (func) {
                      selector = i ? func(name, e, id, item, el, node) : func(e, name, id, el, item, node);
                    }
                    if (void 0 === selector ? e !== name && !process(e, name, func, type, node) : !selector) {
                      /** @type {boolean} */
                      value = false;
                      break;
                    }
                    if (!j) {
                      /** @type {boolean} */
                      j = "constructor" == id;
                    }
                  }
                  if (value) {
                    if (!j) {
                      func = el.constructor;
                      type = item.constructor;
                      if (func != type) {
                        if ("constructor" in el) {
                          if ("constructor" in item) {
                            if (!("function" == typeof func && (func instanceof func && ("function" == typeof type && type instanceof type)))) {
                              /** @type {boolean} */
                              value = false;
                            }
                          }
                        }
                      }
                    }
                  }
                  node["delete"](el);
                  node["delete"](item);
                  /** @type {boolean} */
                  item = value;
                }
              } else {
                /** @type {boolean} */
                item = false;
              }
            }
          } else {
            /** @type {boolean} */
            item = false;
          }
        }
      }
      return item;
    }
    /**
     * @param {(number|string)} arr
     * @param {string} t
     * @param {Arguments} nodes
     * @param {HTMLDocument} fn
     * @return {?}
     */
    function every(arr, t, nodes, fn) {
      var result;
      var i = nodes.length;
      var len = i;
      /** @type {boolean} */
      var all = !fn;
      if (null == arr) {
        return!len;
      }
      arr = Object(arr);
      for (;i--;) {
        var node = nodes[i];
        if (all && node[2] ? node[1] !== arr[node[0]] : !(node[0] in arr)) {
          return false;
        }
      }
      for (;++i < len;) {
        node = nodes[i];
        var index = node[0];
        var item = arr[index];
        var val = node[1];
        if (all && node[2]) {
          if (void 0 === item && !(index in arr)) {
            return false;
          }
        } else {
          if (node = new constructor, fn && (result = fn(item, val, index, arr, t, node)), void 0 === result ? !process(val, item, fn, 3, node) : !result) {
            return false;
          }
        }
      }
      return true;
    }
    /**
     * @param {string} value
     * @return {?}
     */
    function value(value) {
      return apply(value) && (isNumber(value.length) && !!kindsOf[stringPrettyPrinter.call(value)]);
    }
    /**
     * @param {string} str
     * @param {string} fn
     * @return {?}
     */
    function repeat(str, fn) {
      /** @type {number} */
      var headNode = -1;
      /** @type {Array} */
      var array = toString(str) ? Array(str.length) : [];
      render(str, function(item, index, xs) {
        array[++headNode] = fn(item, index, xs);
      });
      return array;
    }
    /**
     * @param {string} target
     * @return {?}
     */
    function extend(target) {
      var table = create(target);
      return 1 == table.length && table[0][2] ? bind(table[0][0], table[0][1]) : function(container) {
        return container === target || every(container, target, table);
      };
    }
    /**
     * @param {boolean} name
     * @param {?} d
     * @return {?}
     */
    function init(name, d) {
      return inspect(name) && (d === d && !isObject(d)) ? bind(next(name), d) : function(value) {
        var key = null == value ? void 0 : post(value, name);
        key = void 0 === key ? void 0 : key;
        if (void 0 === key && key === d) {
          if (key = null != value) {
            /** @type {boolean} */
            key = name;
            key = inspect(key, value) ? [key] : cb(key);
            var pair;
            /** @type {number} */
            var mapped = -1;
            var i = key.length;
            for (;++mapped < i;) {
              var result = next(key[mapped]);
              if (!(pair = null != value && (null != value && result in Object(value)))) {
                break;
              }
              value = value[result];
            }
            if (pair) {
              /** @type {boolean} */
              key = pair;
            } else {
              i = value ? value.length : 0;
              key = !!i && (isNumber(i) && (append(result, i) && (isArray(value) || isString(value))));
            }
          }
          result = key;
        } else {
          result = process(d, key, void 0, 3);
        }
        return result;
      };
    }
    /**
     * @param {string} name
     * @return {?}
     */
    function func(name) {
      return function(subKey) {
        return post(subKey, name);
      };
    }
    /**
     * @param {(number|string)} object
     * @return {?}
     */
    function traverse(object) {
      if ("string" == typeof object) {
        return object;
      }
      if (check(object)) {
        return content ? content.call(object) : "";
      }
      /** @type {string} */
      var REGEX_LITERAL = object + "";
      return "0" == REGEX_LITERAL && 1 / object == -aa ? "-0" : REGEX_LITERAL;
    }
    /**
     * @param {string} result
     * @return {?}
     */
    function cb(result) {
      return isArray(result) ? result : output(result);
    }
    /**
     * @param {?} path
     * @param {?} type
     * @param {Function} callback
     * @param {number} test
     * @param {number} context
     * @param {Object} node
     * @return {?}
     */
    function add(path, type, callback, test, context, node) {
      var sel;
      /** @type {number} */
      var isArray = context & 2;
      var l = path.length;
      var i = type.length;
      if (l != i && !(isArray && i > l)) {
        return false;
      }
      if ((i = node.get(path)) && node.get(type)) {
        return i == type;
      }
      /** @type {number} */
      i = -1;
      /** @type {boolean} */
      var fake = true;
      var store = context & 1 ? new Set : void 0;
      node.set(path, type);
      node.set(type, path);
      for (;++i < l;) {
        var el = path[i];
        var key = type[i];
        if (test) {
          sel = isArray ? test(key, el, i, type, path, node) : test(el, key, i, path, type, node);
        }
        if (void 0 !== sel) {
          if (sel) {
            continue;
          }
          /** @type {boolean} */
          fake = false;
          break;
        }
        if (store) {
          if (!some(type, function(f, ready) {
            if (!store.has(ready) && (el === f || callback(el, f, test, context, node))) {
              return store.add(ready);
            }
          })) {
            /** @type {boolean} */
            fake = false;
            break;
          }
        } else {
          if (el !== key && !callback(el, key, test, context, node)) {
            /** @type {boolean} */
            fake = false;
            break;
          }
        }
      }
      node["delete"](path);
      node["delete"](type);
      return fake;
    }
    /**
     * @param {Object} a
     * @param {string} b
     * @param {string} el
     * @param {Function} callback
     * @param {number} value
     * @param {number} types
     * @param {Object} node
     * @return {?}
     */
    function set(a, b, el, callback, value, types, node) {
      switch(el) {
        case "[object DataView]":
          if (a.byteLength != b.byteLength || a.byteOffset != b.byteOffset) {
            break;
          }
          a = a.buffer;
          b = b.buffer;
        case "[object ArrayBuffer]":
          if (a.byteLength != b.byteLength || !callback(new Uint8Array(a), new Uint8Array(b))) {
            break;
          }
          return true;
        case "[object Boolean]":
        ;
        case "[object Date]":
        ;
        case "[object Number]":
          return gcd(+a, +b);
        case "[object Error]":
          return a.name == b.name && a.message == b.message;
        case "[object RegExp]":
        ;
        case "[object String]":
          return a == b + "";
        case "[object Map]":
          /** @type {function (Array): ?} */
          var toNumber = parse;
        case "[object Set]":
          if (!toNumber) {
            /** @type {function (Array): ?} */
            toNumber = flatten;
          }
          if (a.size != b.size && !(types & 2)) {
            break;
          }
          if (el = node.get(a)) {
            return el == b;
          }
          types |= 1;
          node.set(a, b);
          b = add(toNumber(a), toNumber(b), callback, value, types, node);
          node["delete"](a);
          return b;
        case "[object Symbol]":
          if (pSlice) {
            return pSlice.call(a) == pSlice.call(b);
          }
        ;
      }
      return false;
    }
    /**
     * @param {Object} context
     * @param {?} obj
     * @return {?}
     */
    function find(context, obj) {
      context = context.__data__;
      var type = "undefined" === typeof obj ? "undefined" : callback(obj);
      return("string" == type || ("number" == type || ("symbol" == type || "boolean" == type)) ? "__proto__" !== obj : null === obj) ? context["string" == typeof obj ? "string" : "hash"] : context.map;
    }
    /**
     * @param {string} item
     * @return {?}
     */
    function create(item) {
      var obj = filter(item);
      var key = obj.length;
      for (;key--;) {
        var v = obj[key];
        var val = item[v];
        /** @type {Array} */
        obj[key] = [v, val, val === val && !isObject(val)];
      }
      return obj;
    }
    /**
     * @param {Object} obj
     * @param {Object} name
     * @return {?}
     */
    function get(obj, name) {
      obj = null == obj ? void 0 : obj[name];
      /** @type {boolean} */
      name = !isObject(obj) || src && src in obj ? false : (getType(obj) || stringify(obj) ? regex : nativ).test(getter(obj));
      return name ? obj : void 0;
    }
    /**
     * @param {Object} node
     * @return {?}
     */
    function max(node) {
      return isArray(node) || (isString(node) || !!(TAG_NAME && (node && node[TAG_NAME])));
    }
    /**
     * @param {number} value
     * @param {number} k
     * @return {?}
     */
    function append(value, k) {
      k = null == k ? 9007199254740991 : k;
      return!!k && (("number" == typeof value || rchecked.test(value)) && (-1 < value && (0 == value % 1 && value < k)));
    }
    /**
     * @param {string} key
     * @param {number} object
     * @return {?}
     */
    function inspect(key, object) {
      if (isArray(key)) {
        return false;
      }
      var type = "undefined" === typeof key ? "undefined" : callback(key);
      return "number" == type || ("symbol" == type || ("boolean" == type || (null == key || check(key)))) ? true : isint.test(key) || (!supportedTransforms.test(key) || null != object && key in Object(object));
    }
    /**
     * @param {string} key
     * @param {string} fn
     * @return {?}
     */
    function bind(key, fn) {
      return function(object) {
        return null == object ? false : object[key] === fn && (void 0 !== fn || key in Object(object));
      };
    }
    /**
     * @param {(number|string)} val
     * @return {?}
     */
    function next(val) {
      if ("string" == typeof val || check(val)) {
        return val;
      }
      /** @type {string} */
      var sval = val + "";
      return "0" == sval && 1 / val == -aa ? "-0" : sval;
    }
    /**
     * @param {string} obj
     * @return {?}
     */
    function getter(obj) {
      if (null != obj) {
        try {
          return core_toString.call(obj);
        } catch (m) {
        }
        return obj + "";
      }
      return "";
    }
    /**
     * @param {Function} callback
     * @param {Function} fn
     * @return {?}
     */
    function map(callback, fn) {
      if ("function" != typeof callback || fn && "function" != typeof fn) {
        throw new TypeError("Expected a function");
      }
      /**
       * @return {?}
       */
      var m = function require() {
        /** @type {Arguments} */
        var ret = arguments;
        var type = fn ? fn.apply(this, ret) : ret[0];
        var cache = require.cache;
        if (cache.has(type)) {
          return cache.get(type);
        }
        ret = callback.apply(this, ret);
        require.cache = cache.set(type, ret);
        return ret;
      };
      m.cache = new (map.Cache || Map);
      return m;
    }
    /**
     * @param {?} a
     * @param {?} b
     * @return {?}
     */
    function gcd(a, b) {
      return a === b || a !== a && b !== b;
    }
    /**
     * @param {Object} value
     * @return {?}
     */
    function isString(value) {
      return apply(value) && (toString(value) && (jQuery.call(value, "callee") && (!propertyIsEnumerable.call(value, "callee") || "[object Arguments]" == stringPrettyPrinter.call(value))));
    }
    /**
     * @param {string} value
     * @return {?}
     */
    function toString(value) {
      return null != value && (isNumber(value.length) && !getType(value));
    }
    /**
     * @param {string} value
     * @return {?}
     */
    function getType(value) {
      value = isObject(value) ? stringPrettyPrinter.call(value) : "";
      return "[object Function]" == value || "[object GeneratorFunction]" == value;
    }
    /**
     * @param {number} value
     * @return {?}
     */
    function isNumber(value) {
      return "number" == typeof value && (-1 < value && (0 == value % 1 && 9007199254740991 >= value));
    }
    /**
     * @param {string} o
     * @return {?}
     */
    function isObject(o) {
      var $type$$47_val$$10 = "undefined" === typeof o ? "undefined" : callback(o);
      return!!o && ("object" == $type$$47_val$$10 || "function" == $type$$47_val$$10);
    }
    /**
     * @param {string} o
     * @return {?}
     */
    function apply(o) {
      return!!o && "object" == ("undefined" === typeof o ? "undefined" : callback(o));
    }
    /**
     * @param {string} value
     * @return {?}
     */
    function check(value) {
      return "symbol" == ("undefined" === typeof value ? "undefined" : callback(value)) || apply(value) && "[object Symbol]" == stringPrettyPrinter.call(value);
    }
    /**
     * @param {Object} value
     * @return {?}
     */
    function filter(value) {
      if (toString(value)) {
        if (isArray(value) || isString(value)) {
          var n = value.length;
          /** @type {function (new:String, *=): string} */
          var f = String;
          /** @type {number} */
          var i = -1;
          /** @type {Array} */
          var result = Array(n);
          for (;++i < n;) {
            /** @type {string} */
            result[i] = f(i);
          }
          /** @type {Array} */
          n = result;
        } else {
          /** @type {Array} */
          n = [];
        }
        /** @type {number} */
        f = n.length;
        /** @type {boolean} */
        i = !!f;
        for (data in value) {
          if (!!jQuery.call(value, data)) {
            if (!(i && ("length" == data || append(data, f)))) {
              n.push(data);
            }
          }
        }
        /** @type {Array} */
        value = n;
      } else {
        var data = value && value.constructor;
        if (value === ("function" == typeof data && data.prototype || objectProto)) {
          /** @type {Array} */
          data = [];
          for (n in Object(value)) {
            if (jQuery.call(value, n)) {
              if ("constructor" != n) {
                data.push(n);
              }
            }
          }
          /** @type {Array} */
          value = data;
        } else {
          value = coerce(value);
        }
      }
      return value;
    }
    /**
     * @param {?} object
     * @return {?}
     */
    function seal(object) {
      return object;
    }
    /** @type {number} */
    var aa = 1 / 0;
    /** @type {RegExp} */
    var supportedTransforms = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/;
    /** @type {RegExp} */
    var isint = /^\w*$/;
    /** @type {RegExp} */
    var hChars = /^\./;
    /** @type {RegExp} */
    var rSlash = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g;
    /** @type {RegExp} */
    var rreturn = /\\(\\)?/g;
    /** @type {RegExp} */
    var nativ = /^\[object .+?Constructor\]$/;
    /** @type {RegExp} */
    var rchecked = /^(?:0|[1-9]\d*)$/;
    var kindsOf = {};
    /** @type {boolean} */
    kindsOf["[object Float32Array]"] = kindsOf["[object Float64Array]"] = kindsOf["[object Int8Array]"] = kindsOf["[object Int16Array]"] = kindsOf["[object Int32Array]"] = kindsOf["[object Uint8Array]"] = kindsOf["[object Uint8ClampedArray]"] = kindsOf["[object Uint16Array]"] = kindsOf["[object Uint32Array]"] = true;
    /** @type {boolean} */
    kindsOf["[object Arguments]"] = kindsOf["[object Array]"] = kindsOf["[object ArrayBuffer]"] = kindsOf["[object Boolean]"] = kindsOf["[object DataView]"] = kindsOf["[object Date]"] = kindsOf["[object Error]"] = kindsOf["[object Function]"] = kindsOf["[object Map]"] = kindsOf["[object Number]"] = kindsOf["[object Object]"] = kindsOf["[object RegExp]"] = kindsOf["[object Set]"] = kindsOf["[object String]"] = kindsOf["[object WeakMap]"] = false;
    var global = "object" == callback(o) && (o && (o.Object === Object && o));
    /** @type {(Window|boolean)} */
    var values = "object" == ("undefined" === typeof self ? "undefined" : callback(self)) && (self && (self.Object === Object && self));
    var item = global || (values || Function("return this")());
    var exports = n && (!n.nodeType && n);
    var module = exports && (true && (context && (!context.nodeType && context)));
    var binder = module && (module.exports === exports && global.process);
    a: {
      try {
        var selector = binder && binder.binding("util");
        break a;
      } catch (f) {
      }
      selector = void 0;
    }
    var err = selector && selector.isTypedArray;
    var ap = Array.prototype;
    var p = Function.prototype;
    var objectProto = Object.prototype;
    var scope = item["__core-js_shared__"];
    var src = function() {
      /** @type {(Array.<string>|null)} */
      var charset = /[^.]+$/.exec(scope && (scope.keys && scope.keys.IE_PROTO) || "");
      return charset ? "Symbol(src)_1." + charset : "";
    }();
    /** @type {function (this:Function): string} */
    var core_toString = p.toString;
    var jQuery = objectProto.hasOwnProperty;
    var stringPrettyPrinter = objectProto.toString;
    /** @type {RegExp} */
    var regex = RegExp("^" + core_toString.call(jQuery).replace(/[\\^$.*+?()[\]{}|]/g, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$");
    var el = item.Symbol;
    var Uint8Array = item.Uint8Array;
    var propertyIsEnumerable = objectProto.propertyIsEnumerable;
    /** @type {function (this:(Array.<T>|{length: number}), *=, *=, ...[T]): Array.<T>} */
    var core_push = ap.splice;
    var TAG_NAME = el ? el.isConcatSpreadable : void 0;
    var coerce = function(complete, done) {
      return function(err) {
        return complete(done(err));
      };
    }(Object.keys, Object);
    var length = get(item, "DataView");
    var a = get(item, "Map");
    var data = get(item, "Promise");
    var node = get(item, "Set");
    var c = get(item, "WeakMap");
    var children = get(Object, "create");
    var result = getter(length);
    var y = getter(a);
    var items = getter(data);
    var head = getter(node);
    var pos = getter(c);
    var contents = el ? el.prototype : void 0;
    var pSlice = contents ? contents.valueOf : void 0;
    var content = contents ? contents.toString : void 0;
    /**
     * @return {undefined}
     */
    test.prototype.clear = function() {
      this.__data__ = children ? children(null) : {};
    };
    /**
     * @param {?} fix
     * @return {?}
     */
    test.prototype["delete"] = function(fix) {
      return this.has(fix) && delete this.__data__[fix];
    };
    /**
     * @param {?} type
     * @return {?}
     */
    test.prototype.get = function(type) {
      var events = this.__data__;
      return children ? (type = events[type], "__lodash_hash_undefined__" === type ? void 0 : type) : jQuery.call(events, type) ? events[type] : void 0;
    };
    /**
     * @param {?} type
     * @return {?}
     */
    test.prototype.has = function(type) {
      var nodes = this.__data__;
      return children ? void 0 !== nodes[type] : jQuery.call(nodes, type);
    };
    /**
     * @param {?} path
     * @param {Object} parent
     * @return {?}
     */
    test.prototype.set = function(path, parent) {
      this.__data__[path] = children && void 0 === parent ? "__lodash_hash_undefined__" : parent;
      return this;
    };
    /**
     * @return {undefined}
     */
    Promise.prototype.clear = function() {
      /** @type {Array} */
      this.__data__ = [];
    };
    /**
     * @param {number} path
     * @return {?}
     */
    Promise.prototype["delete"] = function(path) {
      var ret = this.__data__;
      path = join(ret, path);
      if (0 > path) {
        return false;
      }
      if (path == ret.length - 1) {
        ret.pop();
      } else {
        core_push.call(ret, path, 1);
      }
      return true;
    };
    /**
     * @param {?} path
     * @return {?}
     */
    Promise.prototype.get = function(path) {
      var dir = this.__data__;
      path = join(dir, path);
      return 0 > path ? void 0 : dir[path][1];
    };
    /**
     * @param {?} type
     * @return {?}
     */
    Promise.prototype.has = function(type) {
      return-1 < join(this.__data__, type);
    };
    /**
     * @param {?} path
     * @param {?} parent
     * @return {?}
     */
    Promise.prototype.set = function(path, parent) {
      var ret = this.__data__;
      var index = join(ret, path);
      if (0 > index) {
        ret.push([path, parent]);
      } else {
        ret[index][1] = parent;
      }
      return this;
    };
    /**
     * @return {undefined}
     */
    Map.prototype.clear = function() {
      this.__data__ = {
        hash : new test,
        map : new (a || Promise),
        string : new test
      };
    };
    /**
     * @param {?} b
     * @return {?}
     */
    Map.prototype["delete"] = function(b) {
      return find(this, b)["delete"](b);
    };
    /**
     * @param {?} path
     * @return {?}
     */
    Map.prototype.get = function(path) {
      return find(this, path).get(path);
    };
    /**
     * @param {?} type
     * @return {?}
     */
    Map.prototype.has = function(type) {
      return find(this, type).has(type);
    };
    /**
     * @param {?} path
     * @param {Object} parent
     * @return {?}
     */
    Map.prototype.set = function(path, parent) {
      find(this, path).set(path, parent);
      return this;
    };
    /** @type {function (?): ?} */
    Set.prototype.add = Set.prototype.push = function(view) {
      this.__data__.set(view, "__lodash_hash_undefined__");
      return this;
    };
    /**
     * @param {?} type
     * @return {?}
     */
    Set.prototype.has = function(type) {
      return this.__data__.has(type);
    };
    /**
     * @return {undefined}
     */
    constructor.prototype.clear = function() {
      this.__data__ = new Promise;
    };
    /**
     * @param {?} key
     * @return {?}
     */
    constructor.prototype["delete"] = function(key) {
      return this.__data__["delete"](key);
    };
    /**
     * @param {?} path
     * @return {?}
     */
    constructor.prototype.get = function(path) {
      return this.__data__.get(path);
    };
    /**
     * @param {?} type
     * @return {?}
     */
    constructor.prototype.has = function(type) {
      return this.__data__.has(type);
    };
    /**
     * @param {?} path
     * @param {Object} parent
     * @return {?}
     */
    constructor.prototype.set = function(path, parent) {
      var context = this.__data__;
      if (context instanceof Promise) {
        context = context.__data__;
        if (!a || 199 > context.length) {
          return context.push([path, parent]), this;
        }
        context = this.__data__ = new Map(context);
      }
      context.set(path, parent);
      return this;
    };
    var render = function(a, dir) {
      return function(o, fn) {
        if (null == o) {
          return o;
        }
        if (!toString(o)) {
          return a(o, fn);
        }
        var max = o.length;
        var i = dir ? max : -1;
        var ar = Object(o);
        for (;(dir ? i-- : ++i < max) && false !== fn(ar[i], i, ar);) {
        }
        return o;
      };
    }(function(a, str) {
      return a && color(a, str, filter);
    });
    var color = function(reverse) {
      return function(o, callback, a) {
        /** @type {number} */
        var idx = -1;
        var object = Object(o);
        a = a(o);
        var l = a.length;
        for (;l--;) {
          var key = a[reverse ? l : ++idx];
          if (false === callback(object[key], key, object)) {
            break;
          }
        }
        return o;
      };
    }();
    /**
     * @param {?} value
     * @return {?}
     */
    var fn = function(value) {
      return stringPrettyPrinter.call(value);
    };
    if (length && "[object DataView]" != fn(new length(new ArrayBuffer(1))) || (a && "[object Map]" != fn(new a) || (data && "[object Promise]" != fn(data.resolve()) || (node && "[object Set]" != fn(new node) || c && "[object WeakMap]" != fn(new c))))) {
      /**
       * @param {number} value
       * @return {?}
       */
      fn = function(value) {
        var string = stringPrettyPrinter.call(value);
        if (value = (value = "[object Object]" == string ? value.constructor : void 0) ? getter(value) : void 0) {
          switch(value) {
            case result:
              return "[object DataView]";
            case y:
              return "[object Map]";
            case items:
              return "[object Promise]";
            case head:
              return "[object Set]";
            case pos:
              return "[object WeakMap]";
          }
        }
        return string;
      };
    }
    var output = map(function(s) {
      s = null == s ? "" : traverse(s);
      /** @type {Array} */
      var rowHtml = [];
      if (hChars.test(s)) {
        rowHtml.push("");
      }
      s.replace(rSlash, function(err2, err, fillWithNbsp, ret) {
        rowHtml.push(fillWithNbsp ? ret.replace(rreturn, "$1") : err || err2);
      });
      return rowHtml;
    });
    /** @type {function (Array): undefined} */
    map.Cache = Map;
    /** @type {function (*): boolean} */
    var isArray = Array.isArray;
    var computed = err ? done(err) : value;
    /**
     * @param {(Array|string)} obj
     * @param {string} name
     * @return {?}
     */
    context.exports = function(obj, name) {
      /** @type {function (Array, string): ?} */
      var getActual = isArray(obj) ? each : repeat;
      name = "function" == typeof name ? name : null == name ? seal : "object" == ("undefined" === typeof name ? "undefined" : callback(name)) ? isArray(name) ? init(name[0], name[1]) : extend(name) : inspect(name) ? prefixed(next(name)) : func(name);
      obj = getActual(obj, name);
      return clone(obj, 1);
    };
  });
  /**
   * @param {Array} object
   * @return {?}
   */
  var keys = function(object) {
    return object.map(function(elem) {
      return elem.el.nodeName;
    });
  };
  var listeners = {
    /**
     * @param {?} p
     * @param {Object} target
     * @return {?}
     */
    A : function(p, target) {
      if (target = target.el.getAttribute("href")) {
        p.stack[0].push('A[href="' + target + '"]');
        p.specificity += 10;
      }
      return p;
    },
    /**
     * @param {?} state
     * @param {Object} text
     * @return {?}
     */
    IMG : function(state, text) {
      if (text = text.el.getAttribute("src")) {
        state.stack[0].push('IMG[src="' + text + '"]');
        state.specificity += 10;
      }
      return state;
    }
  };
  var meta = {
    methods : [],
    /**
     * @return {?}
     */
    getMethods : function() {
      return this.methods.slice(0);
    },
    /**
     * @param {Function} name
     * @return {undefined}
     */
    addMethod : function(name) {
      this.methods.push(name);
    }
  };
  meta.addMethod(function(arr, initial, condition, config, $sanitize) {
    return arr.reduce(function(state, obj, name) {
      return state.verified ? state : (obj = [obj.el.getAttribute("id")].filter(function(type) {
        /** @type {(boolean|string)} */
        type = "string" === typeof type && null !== type.match(/^[0-9a-zA-Z][a-zA-Z_\-:0-9.]*$/gi) ? type : false;
        return type;
      }).filter(function(dataAndEvents) {
        return 1 === ($sanitize('[id="' + dataAndEvents + '"]') || []).length;
      }).map(function(dataAndEvents) {
        state.stack[name].push("[id='" + dataAndEvents + "']");
        state.specificity += 100;
        if (state.specificity >= config.specificityThreshold) {
          if (condition(state)) {
            /** @type {boolean} */
            state.verified = true;
          }
        }
        if (!state.verified) {
          if (!(0 !== name)) {
            state.stack[name].pop();
            state.specificity -= 100;
          }
        }
        return state;
      }), getActual(obj, 1)[0] || state);
    }, initial);
  });
  meta.addMethod(function(arr, initial) {
    return arr.reduce(function(state, elem, index) {
      [elem.el.nodeName].filter(layout).forEach(function(block) {
        state.stack[index].splice(0, 0, block);
        state.specificity += 10;
      });
      return state;
    }, initial);
  });
  meta.addMethod(function(dom, e, onload) {
    dom = dom[0];
    var name = dom.el.nodeName;
    if (listeners[name]) {
      e = listeners[name](e, dom);
      if (onload(e)) {
        /** @type {boolean} */
        e.verified = true;
      } else {
        e.stack[0].pop();
      }
    }
    return e;
  });
  meta.addMethod(function(arr, initial) {
    return arr.reduce(function(state, handles, name) {
      handles = query(handles.getClasses(), 10).filter(filter).map(function(dataAndEvents) {
        return "." + dataAndEvents;
      });
      if (handles.length) {
        state.stack[name].push(handles.join(""));
        state.specificity += 10 * handles.length;
      }
      return state;
    }, initial);
  });
  meta.addMethod(function(arr, initial, onload) {
    return arr.reduce(function(e, obj, name) {
      if (!e.verified) {
        var items = obj.prevAll();
        var matched = obj.nextAll();
        var h = items.length + 1;
        if (!(!items.length && !matched.length)) {
          if (!values(obj, [].concat(makeArray(items), makeArray(matched)))) {
            e.stack[name].push(":nth-child(" + h + ")");
            e.verified = onload(e);
          }
        }
      }
      return e;
    }, initial);
  });
  /** @type {number} */
  var rootFunc = 1 / 0;
  /** @type {number} */
  var err = 0 / 0;
  /** @type {RegExp} */
  var rreturn = /^\s+|\s+$/g;
  /** @type {RegExp} */
  var expected = /^[-+]0x[0-9a-f]+$/i;
  /** @type {RegExp} */
  var regExp = /^0b[01]+$/i;
  /** @type {RegExp} */
  var invalid = /^0o[0-7]+$/i;
  /** @type {function (*, (number|undefined)): number} */
  var fix = parseInt;
  /** @type {function (this:*): string} */
  var objectToString = Object.prototype.toString;
  /**
   * @param {Array} data
   * @param {number} b
   * @param {number} t
   * @return {?}
   */
  var parse = function(data, b, t) {
    var a = data ? data.length : 0;
    if (!a) {
      return[];
    }
    if (t || void 0 === b) {
      /** @type {number} */
      b = 1;
    } else {
      if (b) {
        b = handler(b);
        b = b === rootFunc || b === -rootFunc ? 1.7976931348623157E308 * (0 > b ? -1 : 1) : b === b ? b : 0;
      } else {
        b = 0 === b ? b : 0;
      }
      /** @type {number} */
      t = b % 1;
      b = b === b ? t ? b - t : b : 0;
    }
    /** @type {number} */
    b = a - b;
    /** @type {number} */
    b = 0 > b ? 0 : b;
    var c = a;
    /** @type {number} */
    a = -1;
    t = data.length;
    if (0 > b) {
      b = -b > t ? 0 : t + b;
    }
    c = c > t ? t : c;
    if (0 > c) {
      c += t;
    }
    /** @type {number} */
    t = b > c ? 0 : c - b >>> 0;
    b >>>= 0;
    /** @type {Array} */
    c = Array(t);
    for (;++a < t;) {
      c[a] = data[a + b];
    }
    return c;
  };
  /**
   * @param {?} state
   * @return {?}
   */
  var run = function(state) {
    var k = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : state.stack.length;
    return parse(state.stack.reduceRight(function(r, handles) {
      if (handles.length) {
        r.push(handles.join(""));
      } else {
        if (r.length) {
          r.push("*");
        }
      }
      return r;
    }, []), k).join(" > ") || "*";
  };
  /**
   * @param {Object} element
   * @param {?} config
   * @param {?} callback
   * @param {Function} event
   * @return {?}
   */
  var next = function(element, config, callback, event) {
    var limit = config.selectorMaxLength;
    return function(e) {
      /** @type {boolean} */
      var results = false;
      /** @type {number} */
      var p = 1;
      for (;p <= e.stack.length && !results;p += 1) {
        results = run(e, p).trim();
        if (!results || (!results.length || limit && results.length > limit)) {
          return false;
        }
        results = callback(results, event);
        if (results = 1 === results.length && (void 0 !== element.el ? results[0] === element.el : results[0] === element)) {
          /** @type {number} */
          e.verificationDepth = p;
        }
      }
      return results;
    };
  };
  var config = {
    queryEngine : null,
    specificityThreshold : 100,
    depth : 3,
    errorHandling : false,
    selectorMaxLength : 512
  };
  (function(first, parseArgs) {
    var i = first.Simmer;
    first.Simmer = parseArgs;
    /**
     * @return {?}
     */
    parseArgs.noConflict = function() {
      first.Simmer = i;
      return parseArgs;
    };
  })(window, init(window));
})();
