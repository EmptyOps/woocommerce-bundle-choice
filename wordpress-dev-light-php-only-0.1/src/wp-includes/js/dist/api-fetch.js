this["wp"] = this["wp"] || {}; this["wp"]["apiFetch"] =
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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./node_modules/@wordpress/api-fetch/build-module/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/esm/asyncToGenerator.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/asyncToGenerator.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _asyncToGenerator; });
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {
  try {
    var info = gen[key](arg);
    var value = info.value;
  } catch (error) {
    reject(error);
    return;
  }

  if (info.done) {
    resolve(value);
  } else {
    Promise.resolve(value).then(_next, _throw);
  }
}

function _asyncToGenerator(fn) {
  return function () {
    var self = this,
        args = arguments;
    return new Promise(function (resolve, reject) {
      var gen = fn.apply(self, args);

      function _next(value) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);
      }

      function _throw(err) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);
      }

      _next(undefined);
    });
  };
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/defineProperty.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _defineProperty; });
function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _objectWithoutProperties; });
/* harmony import */ var _objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./objectWithoutPropertiesLoose */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js");

function _objectWithoutProperties(source, excluded) {
  if (source == null) return {};
  var target = Object(_objectWithoutPropertiesLoose__WEBPACK_IMPORTED_MODULE_0__["default"])(source, excluded);
  var key, i;

  if (Object.getOwnPropertySymbols) {
    var sourceSymbolKeys = Object.getOwnPropertySymbols(source);

    for (i = 0; i < sourceSymbolKeys.length; i++) {
      key = sourceSymbolKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
      target[key] = source[key];
    }
  }

  return target;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _objectWithoutPropertiesLoose; });
function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;

  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }

  return target;
}

/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/index.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/index.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _middlewares_nonce__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./middlewares/nonce */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/nonce.js");
/* harmony import */ var _middlewares_root_url__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./middlewares/root-url */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/root-url.js");
/* harmony import */ var _middlewares_preloading__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./middlewares/preloading */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/preloading.js");
/* harmony import */ var _middlewares_fetch_all_middleware__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./middlewares/fetch-all-middleware */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/fetch-all-middleware.js");
/* harmony import */ var _middlewares_namespace_endpoint__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./middlewares/namespace-endpoint */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/namespace-endpoint.js");
/* harmony import */ var _middlewares_http_v1__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./middlewares/http-v1 */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/http-v1.js");
/* harmony import */ var _middlewares_user_locale__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./middlewares/user-locale */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/user-locale.js");
/* harmony import */ var _middlewares_media_upload__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./middlewares/media-upload */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/media-upload.js");
/* harmony import */ var _utils_response__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./utils/response */ "./node_modules/@wordpress/api-fetch/build-module/utils/response.js");



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */










/**
 * Default set of header values which should be sent with every request unless
 * explicitly provided through apiFetch options.
 *
 * @type {Object}
 */

var DEFAULT_HEADERS = {
  // The backend uses the Accept header as a condition for considering an
  // incoming request as a REST request.
  //
  // See: https://core.trac.wordpress.org/ticket/44534
  Accept: 'application/json, */*;q=0.1'
};
/**
 * Default set of fetch option values which should be sent with every request
 * unless explicitly provided through apiFetch options.
 *
 * @type {Object}
 */

var DEFAULT_OPTIONS = {
  credentials: 'include'
};
var middlewares = [_middlewares_user_locale__WEBPACK_IMPORTED_MODULE_9__["default"], _middlewares_namespace_endpoint__WEBPACK_IMPORTED_MODULE_7__["default"], _middlewares_http_v1__WEBPACK_IMPORTED_MODULE_8__["default"], _middlewares_fetch_all_middleware__WEBPACK_IMPORTED_MODULE_6__["default"]];

function registerMiddleware(middleware) {
  middlewares.unshift(middleware);
}

var checkStatus = function checkStatus(response) {
  if (response.status >= 200 && response.status < 300) {
    return response;
  }

  throw response;
};

var defaultFetchHandler = function defaultFetchHandler(nextOptions) {
  var url = nextOptions.url,
      path = nextOptions.path,
      data = nextOptions.data,
      _nextOptions$parse = nextOptions.parse,
      parse = _nextOptions$parse === void 0 ? true : _nextOptions$parse,
      remainingOptions = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__["default"])(nextOptions, ["url", "path", "data", "parse"]);

  var body = nextOptions.body,
      headers = nextOptions.headers; // Merge explicitly-provided headers with default values.

  headers = _objectSpread({}, DEFAULT_HEADERS, {}, headers); // The `data` property is a shorthand for sending a JSON body.

  if (data) {
    body = JSON.stringify(data);
    headers['Content-Type'] = 'application/json';
  }

  var responsePromise = window.fetch(url || path, _objectSpread({}, DEFAULT_OPTIONS, {}, remainingOptions, {
    body: body,
    headers: headers
  }));
  return responsePromise // Return early if fetch errors. If fetch error, there is most likely no
  // network connection. Unfortunately fetch just throws a TypeError and
  // the message might depend on the browser.
  .then(function (value) {
    return Promise.resolve(value).then(checkStatus).catch(function (response) {
      return Object(_utils_response__WEBPACK_IMPORTED_MODULE_11__["parseAndThrowError"])(response, parse);
    }).then(function (response) {
      return Object(_utils_response__WEBPACK_IMPORTED_MODULE_11__["parseResponseAndNormalizeError"])(response, parse);
    });
  }, function () {
    throw {
      code: 'fetch_error',
      message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('You are probably offline.')
    };
  });
};

var fetchHandler = defaultFetchHandler;
/**
 * Defines a custom fetch handler for making the requests that will override
 * the default one using window.fetch
 *
 * @param {Function} newFetchHandler The new fetch handler
 */

function setFetchHandler(newFetchHandler) {
  fetchHandler = newFetchHandler;
}

function apiFetch(options) {
  var steps = [].concat(middlewares, [fetchHandler]);

  var createRunStep = function createRunStep(index) {
    return function (workingOptions) {
      var step = steps[index];

      if (index === steps.length - 1) {
        return step(workingOptions);
      }

      var next = createRunStep(index + 1);
      return step(workingOptions, next);
    };
  };

  return new Promise(function (resolve, reject) {
    createRunStep(0)(options).then(resolve).catch(function (error) {
      if (error.code !== 'rest_cookie_invalid_nonce') {
        return reject(error);
      } // If the nonce is invalid, refresh it and try again.


      window.fetch(apiFetch.nonceEndpoint).then(checkStatus).then(function (data) {
        return data.text();
      }).then(function (text) {
        apiFetch.nonceMiddleware.nonce = text;
        apiFetch(options).then(resolve).catch(reject);
      }).catch(reject);
    });
  });
}

apiFetch.use = registerMiddleware;
apiFetch.setFetchHandler = setFetchHandler;
apiFetch.createNonceMiddleware = _middlewares_nonce__WEBPACK_IMPORTED_MODULE_3__["default"];
apiFetch.createPreloadingMiddleware = _middlewares_preloading__WEBPACK_IMPORTED_MODULE_5__["default"];
apiFetch.createRootURLMiddleware = _middlewares_root_url__WEBPACK_IMPORTED_MODULE_4__["default"];
apiFetch.fetchAllMiddleware = _middlewares_fetch_all_middleware__WEBPACK_IMPORTED_MODULE_6__["default"];
apiFetch.mediaUploadMiddleware = _middlewares_media_upload__WEBPACK_IMPORTED_MODULE_10__["default"];
/* harmony default export */ __webpack_exports__["default"] = (apiFetch);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/fetch-all-middleware.js":
/*!********************************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/fetch-all-middleware.js ***!
  \********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "@babel/runtime/regenerator");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_esm_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/esm/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_4__);





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_2__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */
 // Apply query arguments to both URL and Path, whichever is present.

var modifyQuery = function modifyQuery(_ref, queryArgs) {
  var path = _ref.path,
      url = _ref.url,
      options = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_3__["default"])(_ref, ["path", "url"]);

  return _objectSpread({}, options, {
    url: url && Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_4__["addQueryArgs"])(url, queryArgs),
    path: path && Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_4__["addQueryArgs"])(path, queryArgs)
  });
}; // Duplicates parsing functionality from apiFetch.


var parseResponse = function parseResponse(response) {
  return response.json ? response.json() : Promise.reject(response);
};

var parseLinkHeader = function parseLinkHeader(linkHeader) {
  if (!linkHeader) {
    return {};
  }

  var match = linkHeader.match(/<([^>]+)>; rel="next"/);
  return match ? {
    next: match[1]
  } : {};
};

var getNextPageUrl = function getNextPageUrl(response) {
  var _parseLinkHeader = parseLinkHeader(response.headers.get('link')),
      next = _parseLinkHeader.next;

  return next;
};

var requestContainsUnboundedQuery = function requestContainsUnboundedQuery(options) {
  var pathIsUnbounded = options.path && options.path.indexOf('per_page=-1') !== -1;
  var urlIsUnbounded = options.url && options.url.indexOf('per_page=-1') !== -1;
  return pathIsUnbounded || urlIsUnbounded;
}; // The REST API enforces an upper limit on the per_page option. To handle large
// collections, apiFetch consumers can pass `per_page=-1`; this middleware will
// then recursively assemble a full response array from all available pages.


var fetchAllMiddleware =
/*#__PURE__*/
function () {
  var _ref2 = Object(_babel_runtime_helpers_esm_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__["default"])(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(options, next) {
    var response, results, nextPage, mergedResults, nextResponse, nextResults;
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            if (!(options.parse === false)) {
              _context.next = 2;
              break;
            }

            return _context.abrupt("return", next(options));

          case 2:
            if (requestContainsUnboundedQuery(options)) {
              _context.next = 4;
              break;
            }

            return _context.abrupt("return", next(options));

          case 4:
            _context.next = 6;
            return next(_objectSpread({}, modifyQuery(options, {
              per_page: 100
            }), {
              // Ensure headers are returned for page 1.
              parse: false
            }));

          case 6:
            response = _context.sent;
            _context.next = 9;
            return parseResponse(response);

          case 9:
            results = _context.sent;

            if (Array.isArray(results)) {
              _context.next = 12;
              break;
            }

            return _context.abrupt("return", results);

          case 12:
            nextPage = getNextPageUrl(response);

            if (nextPage) {
              _context.next = 15;
              break;
            }

            return _context.abrupt("return", results);

          case 15:
            // Iteratively fetch all remaining pages until no "next" header is found.
            mergedResults = [].concat(results);

          case 16:
            if (!nextPage) {
              _context.next = 27;
              break;
            }

            _context.next = 19;
            return next(_objectSpread({}, options, {
              // Ensure the URL for the next page is used instead of any provided path.
              path: undefined,
              url: nextPage,
              // Ensure we still get headers so we can identify the next page.
              parse: false
            }));

          case 19:
            nextResponse = _context.sent;
            _context.next = 22;
            return parseResponse(nextResponse);

          case 22:
            nextResults = _context.sent;
            mergedResults = mergedResults.concat(nextResults);
            nextPage = getNextPageUrl(nextResponse);
            _context.next = 16;
            break;

          case 27:
            return _context.abrupt("return", mergedResults);

          case 28:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  }));

  return function fetchAllMiddleware(_x, _x2) {
    return _ref2.apply(this, arguments);
  };
}();

/* harmony default export */ __webpack_exports__["default"] = (fetchAllMiddleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/http-v1.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/http-v1.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Set of HTTP methods which are eligible to be overridden.
 *
 * @type {Set}
 */
var OVERRIDE_METHODS = new Set(['PATCH', 'PUT', 'DELETE']);
/**
 * Default request method.
 *
 * "A request has an associated method (a method). Unless stated otherwise it
 * is `GET`."
 *
 * @see  https://fetch.spec.whatwg.org/#requests
 *
 * @type {string}
 */

var DEFAULT_METHOD = 'GET';
/**
 * API Fetch middleware which overrides the request method for HTTP v1
 * compatibility leveraging the REST API X-HTTP-Method-Override header.
 *
 * @param {Object}   options Fetch options.
 * @param {Function} next    [description]
 *
 * @return {*} The evaluated result of the remaining middleware chain.
 */

function httpV1Middleware(options, next) {
  var _options = options,
      _options$method = _options.method,
      method = _options$method === void 0 ? DEFAULT_METHOD : _options$method;

  if (OVERRIDE_METHODS.has(method.toUpperCase())) {
    options = _objectSpread({}, options, {
      headers: _objectSpread({}, options.headers, {
        'X-HTTP-Method-Override': method,
        'Content-Type': 'application/json'
      }),
      method: 'POST'
    });
  }

  return next(options, next);
}

/* harmony default export */ __webpack_exports__["default"] = (httpV1Middleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/media-upload.js":
/*!************************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/media-upload.js ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils_response__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/response */ "./node_modules/@wordpress/api-fetch/build-module/utils/response.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */


/**
 * Middleware handling media upload failures and retries.
 *
 * @param {Object}   options Fetch options.
 * @param {Function} next    [description]
 *
 * @return {*} The evaluated result of the remaining middleware chain.
 */

function mediaUploadMiddleware(options, next) {
  var isMediaUploadRequest = options.path && options.path.indexOf('/wp/v2/media') !== -1 || options.url && options.url.indexOf('/wp/v2/media') !== -1;

  if (!isMediaUploadRequest) {
    return next(options, next);
  }

  var retries = 0;
  var maxRetries = 5;

  var postProcess = function postProcess(attachmentId) {
    retries++;
    return next({
      path: "/wp/v2/media/".concat(attachmentId, "/post-process"),
      method: 'POST',
      data: {
        action: 'create-image-subsizes'
      },
      parse: false
    }).catch(function () {
      if (retries < maxRetries) {
        return postProcess(attachmentId);
      }

      next({
        path: "/wp/v2/media/".concat(attachmentId, "?force=true"),
        method: 'DELETE'
      });
      return Promise.reject();
    });
  };

  return next(_objectSpread({}, options, {
    parse: false
  })).catch(function (response) {
    var attachmentId = response.headers.get('x-wp-upload-attachment-id');

    if (response.status >= 500 && response.status < 600 && attachmentId) {
      return postProcess(attachmentId).catch(function () {
        if (options.parse !== false) {
          return Promise.reject({
            code: 'post_process',
            message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Media upload failed. If this is a photo or a large image, please scale it down and try again.')
          });
        }

        return Promise.reject(response);
      });
    }

    return Object(_utils_response__WEBPACK_IMPORTED_MODULE_2__["parseAndThrowError"])(response, options.parse);
  }).then(function (response) {
    return Object(_utils_response__WEBPACK_IMPORTED_MODULE_2__["parseResponseAndNormalizeError"])(response, options.parse);
  });
}

/* harmony default export */ __webpack_exports__["default"] = (mediaUploadMiddleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/namespace-endpoint.js":
/*!******************************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/namespace-endpoint.js ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

var namespaceAndEndpointMiddleware = function namespaceAndEndpointMiddleware(options, next) {
  var path = options.path;
  var namespaceTrimmed, endpointTrimmed;

  if (typeof options.namespace === 'string' && typeof options.endpoint === 'string') {
    namespaceTrimmed = options.namespace.replace(/^\/|\/$/g, '');
    endpointTrimmed = options.endpoint.replace(/^\//, '');

    if (endpointTrimmed) {
      path = namespaceTrimmed + '/' + endpointTrimmed;
    } else {
      path = namespaceTrimmed;
    }
  }

  delete options.namespace;
  delete options.endpoint;
  return next(_objectSpread({}, options, {
    path: path
  }));
};

/* harmony default export */ __webpack_exports__["default"] = (namespaceAndEndpointMiddleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/nonce.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/nonce.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function createNonceMiddleware(nonce) {
  function middleware(options, next) {
    var _options$headers = options.headers,
        headers = _options$headers === void 0 ? {} : _options$headers; // If an 'X-WP-Nonce' header (or any case-insensitive variation
    // thereof) was specified, no need to add a nonce header.

    for (var headerName in headers) {
      if (headerName.toLowerCase() === 'x-wp-nonce') {
        return next(options);
      }
    }

    return next(_objectSpread({}, options, {
      headers: _objectSpread({}, headers, {
        'X-WP-Nonce': middleware.nonce
      })
    }));
  }

  middleware.nonce = nonce;
  return middleware;
}

/* harmony default export */ __webpack_exports__["default"] = (createNonceMiddleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/preloading.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/preloading.js ***!
  \**********************************************************************************/
/*! exports provided: getStablePath, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getStablePath", function() { return getStablePath; });
/**
 * Given a path, returns a normalized path where equal query parameter values
 * will be treated as identical, regardless of order they appear in the original
 * text.
 *
 * @param {string} path Original path.
 *
 * @return {string} Normalized path.
 */
function getStablePath(path) {
  var splitted = path.split('?');
  var query = splitted[1];
  var base = splitted[0];

  if (!query) {
    return base;
  } // 'b=1&c=2&a=5'


  return base + '?' + query // [ 'b=1', 'c=2', 'a=5' ]
  .split('&') // [ [ 'b, '1' ], [ 'c', '2' ], [ 'a', '5' ] ]
  .map(function (entry) {
    return entry.split('=');
  }) // [ [ 'a', '5' ], [ 'b, '1' ], [ 'c', '2' ] ]
  .sort(function (a, b) {
    return a[0].localeCompare(b[0]);
  }) // [ 'a=5', 'b=1', 'c=2' ]
  .map(function (pair) {
    return pair.join('=');
  }) // 'a=5&b=1&c=2'
  .join('&');
}

function createPreloadingMiddleware(preloadedData) {
  var cache = Object.keys(preloadedData).reduce(function (result, path) {
    result[getStablePath(path)] = preloadedData[path];
    return result;
  }, {});
  return function (options, next) {
    var _options$parse = options.parse,
        parse = _options$parse === void 0 ? true : _options$parse;

    if (typeof options.path === 'string') {
      var method = options.method || 'GET';
      var path = getStablePath(options.path);

      if (parse && 'GET' === method && cache[path]) {
        return Promise.resolve(cache[path].body);
      } else if ('OPTIONS' === method && cache[method] && cache[method][path]) {
        return Promise.resolve(cache[method][path]);
      }
    }

    return next(options);
  };
}

/* harmony default export */ __webpack_exports__["default"] = (createPreloadingMiddleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/root-url.js":
/*!********************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/root-url.js ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _namespace_endpoint__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./namespace-endpoint */ "./node_modules/@wordpress/api-fetch/build-module/middlewares/namespace-endpoint.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */


var createRootURLMiddleware = function createRootURLMiddleware(rootURL) {
  return function (options, next) {
    return Object(_namespace_endpoint__WEBPACK_IMPORTED_MODULE_1__["default"])(options, function (optionsWithPath) {
      var url = optionsWithPath.url;
      var path = optionsWithPath.path;
      var apiRoot;

      if (typeof path === 'string') {
        apiRoot = rootURL;

        if (-1 !== rootURL.indexOf('?')) {
          path = path.replace('?', '&');
        }

        path = path.replace(/^\//, ''); // API root may already include query parameter prefix if site is
        // configured to use plain permalinks.

        if ('string' === typeof apiRoot && -1 !== apiRoot.indexOf('?')) {
          path = path.replace('?', '&');
        }

        url = apiRoot + path;
      }

      return next(_objectSpread({}, optionsWithPath, {
        url: url
      }));
    });
  };
};

/* harmony default export */ __webpack_exports__["default"] = (createRootURLMiddleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/middlewares/user-locale.js":
/*!***********************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/middlewares/user-locale.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */


function userLocaleMiddleware(options, next) {
  if (typeof options.url === 'string' && !Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_0__["hasQueryArg"])(options.url, '_locale')) {
    options.url = Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_0__["addQueryArgs"])(options.url, {
      _locale: 'user'
    });
  }

  if (typeof options.path === 'string' && !Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_0__["hasQueryArg"])(options.path, '_locale')) {
    options.path = Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_0__["addQueryArgs"])(options.path, {
      _locale: 'user'
    });
  }

  return next(options, next);
}

/* harmony default export */ __webpack_exports__["default"] = (userLocaleMiddleware);


/***/ }),

/***/ "./node_modules/@wordpress/api-fetch/build-module/utils/response.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/api-fetch/build-module/utils/response.js ***!
  \**************************************************************************/
/*! exports provided: parseResponseAndNormalizeError, parseAndThrowError */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "parseResponseAndNormalizeError", function() { return parseResponseAndNormalizeError; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "parseAndThrowError", function() { return parseAndThrowError; });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

/**
 * Parses the apiFetch response.
 *
 * @param {Response} response
 * @param {boolean}  shouldParseResponse
 *
 * @return {Promise} Parsed response
 */

var parseResponse = function parseResponse(response) {
  var shouldParseResponse = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

  if (shouldParseResponse) {
    if (response.status === 204) {
      return null;
    }

    return response.json ? response.json() : Promise.reject(response);
  }

  return response;
};

var parseJsonAndNormalizeError = function parseJsonAndNormalizeError(response) {
  var invalidJsonError = {
    code: 'invalid_json',
    message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('The response is not a valid JSON response.')
  };

  if (!response || !response.json) {
    throw invalidJsonError;
  }

  return response.json().catch(function () {
    throw invalidJsonError;
  });
};
/**
 * Parses the apiFetch response properly and normalize response errors.
 *
 * @param {Response} response
 * @param {boolean}  shouldParseResponse
 *
 * @return {Promise} Parsed response.
 */


var parseResponseAndNormalizeError = function parseResponseAndNormalizeError(response) {
  var shouldParseResponse = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  return Promise.resolve(parseResponse(response, shouldParseResponse)).catch(function (res) {
    return parseAndThrowError(res, shouldParseResponse);
  });
};
function parseAndThrowError(response) {
  var shouldParseResponse = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

  if (!shouldParseResponse) {
    throw response;
  }

  return parseJsonAndNormalizeError(response).then(function (error) {
    var unknownError = {
      code: 'unknown_error',
      message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('An unknown error occurred.')
    };
    throw error || unknownError;
  });
}


/***/ }),

/***/ "@babel/runtime/regenerator":
/*!**********************************************!*\
  !*** external {"this":"regeneratorRuntime"} ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["regeneratorRuntime"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!***************************************!*\
  !*** external {"this":["wp","i18n"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["i18n"]; }());

/***/ }),

/***/ "@wordpress/url":
/*!**************************************!*\
  !*** external {"this":["wp","url"]} ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["url"]; }());

/***/ })

/******/ })["default"];
//# sourceMappingURL=api-fetch.js.map