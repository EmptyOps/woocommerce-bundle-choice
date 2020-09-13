this["wp"] = this["wp"] || {}; this["wp"]["mediaUtils"] =
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
/******/ 	return __webpack_require__(__webpack_require__.s = "./node_modules/@wordpress/media-utils/build-module/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _arrayLikeToArray; });
function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/arrayWithHoles.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/arrayWithHoles.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _arrayWithHoles; });
function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/arrayWithoutHoles.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/arrayWithoutHoles.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _arrayWithoutHoles; });
/* harmony import */ var _arrayLikeToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayLikeToArray */ "./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js");

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return Object(_arrayLikeToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(arr);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _assertThisInitialized; });
function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

/***/ }),

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

/***/ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/classCallCheck.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _classCallCheck; });
function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/createClass.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/createClass.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _createClass; });
function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
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

/***/ "./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _getPrototypeOf; });
function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/inherits.js":
/*!*************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/inherits.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _inherits; });
/* harmony import */ var _setPrototypeOf__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./setPrototypeOf */ "./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js");

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) Object(_setPrototypeOf__WEBPACK_IMPORTED_MODULE_0__["default"])(subClass, superClass);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/iterableToArray.js":
/*!********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/iterableToArray.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _iterableToArray; });
function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/iterableToArrayLimit.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/iterableToArrayLimit.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _iterableToArrayLimit; });
function _iterableToArrayLimit(arr, i) {
  if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;
  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/nonIterableRest.js":
/*!********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/nonIterableRest.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _nonIterableRest; });
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/nonIterableSpread.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/nonIterableSpread.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _nonIterableSpread; });
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js":
/*!******************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _possibleConstructorReturn; });
/* harmony import */ var _helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helpers/esm/typeof */ "./node_modules/@babel/runtime/helpers/esm/typeof.js");
/* harmony import */ var _assertThisInitialized__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./assertThisInitialized */ "./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js");


function _possibleConstructorReturn(self, call) {
  if (call && (Object(_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_0__["default"])(call) === "object" || typeof call === "function")) {
    return call;
  }

  return Object(_assertThisInitialized__WEBPACK_IMPORTED_MODULE_1__["default"])(self);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _setPrototypeOf; });
function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/slicedToArray.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/slicedToArray.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _slicedToArray; });
/* harmony import */ var _arrayWithHoles__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayWithHoles */ "./node_modules/@babel/runtime/helpers/esm/arrayWithHoles.js");
/* harmony import */ var _iterableToArrayLimit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./iterableToArrayLimit */ "./node_modules/@babel/runtime/helpers/esm/iterableToArrayLimit.js");
/* harmony import */ var _unsupportedIterableToArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./unsupportedIterableToArray */ "./node_modules/@babel/runtime/helpers/esm/unsupportedIterableToArray.js");
/* harmony import */ var _nonIterableRest__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./nonIterableRest */ "./node_modules/@babel/runtime/helpers/esm/nonIterableRest.js");




function _slicedToArray(arr, i) {
  return Object(_arrayWithHoles__WEBPACK_IMPORTED_MODULE_0__["default"])(arr) || Object(_iterableToArrayLimit__WEBPACK_IMPORTED_MODULE_1__["default"])(arr, i) || Object(_unsupportedIterableToArray__WEBPACK_IMPORTED_MODULE_2__["default"])(arr, i) || Object(_nonIterableRest__WEBPACK_IMPORTED_MODULE_3__["default"])();
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _toConsumableArray; });
/* harmony import */ var _arrayWithoutHoles__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayWithoutHoles */ "./node_modules/@babel/runtime/helpers/esm/arrayWithoutHoles.js");
/* harmony import */ var _iterableToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./iterableToArray */ "./node_modules/@babel/runtime/helpers/esm/iterableToArray.js");
/* harmony import */ var _unsupportedIterableToArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./unsupportedIterableToArray */ "./node_modules/@babel/runtime/helpers/esm/unsupportedIterableToArray.js");
/* harmony import */ var _nonIterableSpread__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./nonIterableSpread */ "./node_modules/@babel/runtime/helpers/esm/nonIterableSpread.js");




function _toConsumableArray(arr) {
  return Object(_arrayWithoutHoles__WEBPACK_IMPORTED_MODULE_0__["default"])(arr) || Object(_iterableToArray__WEBPACK_IMPORTED_MODULE_1__["default"])(arr) || Object(_unsupportedIterableToArray__WEBPACK_IMPORTED_MODULE_2__["default"])(arr) || Object(_nonIterableSpread__WEBPACK_IMPORTED_MODULE_3__["default"])();
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/typeof.js":
/*!***********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/typeof.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _typeof; });
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/unsupportedIterableToArray.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/unsupportedIterableToArray.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _unsupportedIterableToArray; });
/* harmony import */ var _arrayLikeToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayLikeToArray */ "./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return Object(_arrayLikeToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(n);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return Object(_arrayLikeToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(o, minLen);
}

/***/ }),

/***/ "./node_modules/@wordpress/media-utils/build-module/components/index.js":
/*!******************************************************************************!*\
  !*** ./node_modules/@wordpress/media-utils/build-module/components/index.js ***!
  \******************************************************************************/
/*! exports provided: MediaUpload */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _media_upload__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./media-upload */ "./node_modules/@wordpress/media-utils/build-module/components/media-upload/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "MediaUpload", function() { return _media_upload__WEBPACK_IMPORTED_MODULE_0__["default"]; });




/***/ }),

/***/ "./node_modules/@wordpress/media-utils/build-module/components/media-upload/index.js":
/*!*******************************************************************************************!*\
  !*** ./node_modules/@wordpress/media-utils/build-module/components/media-upload/index.js ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__);







/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */



var _window = window,
    wp = _window.wp;
/**
 * Prepares the Featured Image toolbars and frames.
 *
 * @return {wp.media.view.MediaFrame.Select} The default media workflow.
 */

var getFeaturedImageMediaFrame = function getFeaturedImageMediaFrame() {
  return wp.media.view.MediaFrame.Select.extend({
    /**
     * Enables the Set Featured Image Button.
     *
     * @param {Object} toolbar toolbar for featured image state
     * @return {void}
     */
    featuredImageToolbar: function featuredImageToolbar(toolbar) {
      this.createSelectToolbar(toolbar, {
        text: wp.media.view.l10n.setFeaturedImage,
        state: this.options.state
      });
    },

    /**
     * Handle the edit state requirements of selected media item.
     *
     * @return {void}
     */
    editState: function editState() {
      var selection = this.state('featured-image').get('selection');
      var view = new wp.media.view.EditImage({
        model: selection.single(),
        controller: this
      }).render(); // Set the view to the EditImage frame using the selected image.

      this.content.set(view); // After bringing in the frame, load the actual editor via an ajax call.

      view.loadEditor();
    },

    /**
     * Create the default states.
     *
     * @return {void}
     */
    createStates: function createStates() {
      this.on('toolbar:create:featured-image', this.featuredImageToolbar, this);
      this.on('content:render:edit-image', this.editState, this);
      this.states.add([new wp.media.controller.FeaturedImage(), new wp.media.controller.EditImage({
        model: this.options.editImage
      })]);
    }
  });
};
/**
 * Prepares the Gallery toolbars and frames.
 *
 * @return {wp.media.view.MediaFrame.Post} The default media workflow.
 */


var getGalleryDetailsMediaFrame = function getGalleryDetailsMediaFrame() {
  /**
   * Custom gallery details frame.
   *
   * @see https://github.com/xwp/wp-core-media-widgets/blob/905edbccfc2a623b73a93dac803c5335519d7837/wp-admin/js/widgets/media-gallery-widget.js
   * @class GalleryDetailsMediaFrame
   * @class
   */
  return wp.media.view.MediaFrame.Post.extend({
    /**
     * Set up gallery toolbar.
     *
     * @return {void}
     */
    galleryToolbar: function galleryToolbar() {
      var editing = this.state().get('editing');
      this.toolbar.set(new wp.media.view.Toolbar({
        controller: this,
        items: {
          insert: {
            style: 'primary',
            text: editing ? wp.media.view.l10n.updateGallery : wp.media.view.l10n.insertGallery,
            priority: 80,
            requires: {
              library: true
            },

            /**
             * @fires wp.media.controller.State#update
             */
            click: function click() {
              var controller = this.controller,
                  state = controller.state();
              controller.close();
              state.trigger('update', state.get('library')); // Restore and reset the default state.

              controller.setState(controller.options.state);
              controller.reset();
            }
          }
        }
      }));
    },

    /**
     * Handle the edit state requirements of selected media item.
     *
     * @return {void}
     */
    editState: function editState() {
      var selection = this.state('gallery').get('selection');
      var view = new wp.media.view.EditImage({
        model: selection.single(),
        controller: this
      }).render(); // Set the view to the EditImage frame using the selected image.

      this.content.set(view); // After bringing in the frame, load the actual editor via an ajax call.

      view.loadEditor();
    },

    /**
     * Create the default states.
     *
     * @return {void}
     */
    createStates: function createStates() {
      this.on('toolbar:create:main-gallery', this.galleryToolbar, this);
      this.on('content:render:edit-image', this.editState, this);
      this.states.add([new wp.media.controller.Library({
        id: 'gallery',
        title: wp.media.view.l10n.createGalleryTitle,
        priority: 40,
        toolbar: 'main-gallery',
        filterable: 'uploaded',
        multiple: 'add',
        editable: false,
        library: wp.media.query(Object(lodash__WEBPACK_IMPORTED_MODULE_6__["defaults"])({
          type: 'image'
        }, this.options.library))
      }), new wp.media.controller.EditImage({
        model: this.options.editImage
      }), new wp.media.controller.GalleryEdit({
        library: this.options.selection,
        editing: this.options.editing,
        menu: 'gallery',
        displaySettings: false,
        multiple: true
      }), new wp.media.controller.GalleryAdd()]);
    }
  });
}; // the media library image object contains numerous attributes
// we only need this set to display the image in the library


var slimImageObject = function slimImageObject(img) {
  var attrSet = ['sizes', 'mime', 'type', 'subtype', 'id', 'url', 'alt', 'link', 'caption'];
  return Object(lodash__WEBPACK_IMPORTED_MODULE_6__["pick"])(img, attrSet);
};

var getAttachmentsCollection = function getAttachmentsCollection(ids) {
  return wp.media.query({
    order: 'ASC',
    orderby: 'post__in',
    post__in: ids,
    posts_per_page: -1,
    query: true,
    type: 'image'
  });
};

var MediaUpload =
/*#__PURE__*/
function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_5__["default"])(MediaUpload, _Component);

  function MediaUpload(_ref) {
    var _this;

    var allowedTypes = _ref.allowedTypes,
        _ref$gallery = _ref.gallery,
        gallery = _ref$gallery === void 0 ? false : _ref$gallery,
        _ref$unstableFeatured = _ref.unstableFeaturedImageFlow,
        unstableFeaturedImageFlow = _ref$unstableFeatured === void 0 ? false : _ref$unstableFeatured,
        modalClass = _ref.modalClass,
        _ref$multiple = _ref.multiple,
        multiple = _ref$multiple === void 0 ? false : _ref$multiple,
        _ref$title = _ref.title,
        title = _ref$title === void 0 ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Select or Upload Media') : _ref$title;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__["default"])(this, MediaUpload);

    _this = Object(_babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__["default"])(this, Object(_babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__["default"])(MediaUpload).apply(this, arguments));
    _this.openModal = _this.openModal.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_4__["default"])(_this));
    _this.onOpen = _this.onOpen.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_4__["default"])(_this));
    _this.onSelect = _this.onSelect.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_4__["default"])(_this));
    _this.onUpdate = _this.onUpdate.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_4__["default"])(_this));
    _this.onClose = _this.onClose.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_4__["default"])(_this));

    if (gallery) {
      _this.buildAndSetGalleryFrame();
    } else {
      var frameConfig = {
        title: title,
        multiple: multiple
      };

      if (!!allowedTypes) {
        frameConfig.library = {
          type: allowedTypes
        };
      }

      _this.frame = wp.media(frameConfig);
    }

    if (modalClass) {
      _this.frame.$el.addClass(modalClass);
    }

    if (unstableFeaturedImageFlow) {
      _this.buildAndSetFeatureImageFrame();
    }

    _this.initializeListeners();

    return _this;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__["default"])(MediaUpload, [{
    key: "initializeListeners",
    value: function initializeListeners() {
      // When an image is selected in the media frame...
      this.frame.on('select', this.onSelect);
      this.frame.on('update', this.onUpdate);
      this.frame.on('open', this.onOpen);
      this.frame.on('close', this.onClose);
    }
    /**
     * Sets the Gallery frame and initializes listeners.
     *
     * @return {void}
     */

  }, {
    key: "buildAndSetGalleryFrame",
    value: function buildAndSetGalleryFrame() {
      var _this$props = this.props,
          _this$props$addToGall = _this$props.addToGallery,
          addToGallery = _this$props$addToGall === void 0 ? false : _this$props$addToGall,
          allowedTypes = _this$props.allowedTypes,
          _this$props$multiple = _this$props.multiple,
          multiple = _this$props$multiple === void 0 ? false : _this$props$multiple,
          _this$props$value = _this$props.value,
          value = _this$props$value === void 0 ? null : _this$props$value; // If the value did not changed there is no need to rebuild the frame,
      // we can continue to use the existing one.

      if (value === this.lastGalleryValue) {
        return;
      }

      this.lastGalleryValue = value; // If a frame already existed remove it.

      if (this.frame) {
        this.frame.remove();
      }

      var currentState;

      if (addToGallery) {
        currentState = 'gallery-library';
      } else {
        currentState = value ? 'gallery-edit' : 'gallery';
      }

      if (!this.GalleryDetailsMediaFrame) {
        this.GalleryDetailsMediaFrame = getGalleryDetailsMediaFrame();
      }

      var attachments = getAttachmentsCollection(value);
      var selection = new wp.media.model.Selection(attachments.models, {
        props: attachments.props.toJSON(),
        multiple: multiple
      });
      this.frame = new this.GalleryDetailsMediaFrame({
        mimeType: allowedTypes,
        state: currentState,
        multiple: multiple,
        selection: selection,
        editing: value ? true : false
      });
      wp.media.frame = this.frame;
      this.initializeListeners();
    }
    /**
     * Initializes the Media Library requirements for the featured image flow.
     *
     * @return {void}
     */

  }, {
    key: "buildAndSetFeatureImageFrame",
    value: function buildAndSetFeatureImageFrame() {
      var featuredImageFrame = getFeaturedImageMediaFrame();
      var attachments = getAttachmentsCollection(this.props.value);
      var selection = new wp.media.model.Selection(attachments.models, {
        props: attachments.props.toJSON()
      });
      this.frame = new featuredImageFrame({
        mimeType: this.props.allowedTypes,
        state: 'featured-image',
        multiple: this.props.multiple,
        selection: selection,
        editing: this.props.value ? true : false
      });
      wp.media.frame = this.frame;
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      this.frame.remove();
    }
  }, {
    key: "onUpdate",
    value: function onUpdate(selections) {
      var _this$props2 = this.props,
          onSelect = _this$props2.onSelect,
          _this$props2$multiple = _this$props2.multiple,
          multiple = _this$props2$multiple === void 0 ? false : _this$props2$multiple;
      var state = this.frame.state();
      var selectedImages = selections || state.get('selection');

      if (!selectedImages || !selectedImages.models.length) {
        return;
      }

      if (multiple) {
        onSelect(selectedImages.models.map(function (model) {
          return slimImageObject(model.toJSON());
        }));
      } else {
        onSelect(slimImageObject(selectedImages.models[0].toJSON()));
      }
    }
  }, {
    key: "onSelect",
    value: function onSelect() {
      var _this$props3 = this.props,
          onSelect = _this$props3.onSelect,
          _this$props3$multiple = _this$props3.multiple,
          multiple = _this$props3$multiple === void 0 ? false : _this$props3$multiple; // Get media attachment details from the frame state

      var attachment = this.frame.state().get('selection').toJSON();
      onSelect(multiple ? attachment : attachment[0]);
    }
  }, {
    key: "onOpen",
    value: function onOpen() {
      this.updateCollection();

      if (!this.props.value) {
        return;
      }

      if (!this.props.gallery) {
        var selection = this.frame.state().get('selection');
        Object(lodash__WEBPACK_IMPORTED_MODULE_6__["castArray"])(this.props.value).forEach(function (id) {
          selection.add(wp.media.attachment(id));
        });
      } // load the images so they are available in the media modal.


      getAttachmentsCollection(Object(lodash__WEBPACK_IMPORTED_MODULE_6__["castArray"])(this.props.value)).more();
    }
  }, {
    key: "onClose",
    value: function onClose() {
      var onClose = this.props.onClose;

      if (onClose) {
        onClose();
      }
    }
  }, {
    key: "updateCollection",
    value: function updateCollection() {
      var frameContent = this.frame.content.get();

      if (frameContent && frameContent.collection) {
        var collection = frameContent.collection; // clean all attachments we have in memory.

        collection.toArray().forEach(function (model) {
          return model.trigger('destroy', model);
        }); // reset has more flag, if library had small amount of items all items may have been loaded before.

        collection.mirroring._hasMore = true; // request items

        collection.more();
      }
    }
  }, {
    key: "openModal",
    value: function openModal() {
      if (this.props.gallery && this.props.value && this.props.value.length > 0) {
        this.buildAndSetGalleryFrame();
      }

      this.frame.open();
    }
  }, {
    key: "render",
    value: function render() {
      return this.props.render({
        open: this.openModal
      });
    }
  }]);

  return MediaUpload;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Component"]);

/* harmony default export */ __webpack_exports__["default"] = (MediaUpload);


/***/ }),

/***/ "./node_modules/@wordpress/media-utils/build-module/index.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/media-utils/build-module/index.js ***!
  \*******************************************************************/
/*! exports provided: MediaUpload, uploadMedia */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components */ "./node_modules/@wordpress/media-utils/build-module/components/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "MediaUpload", function() { return _components__WEBPACK_IMPORTED_MODULE_0__["MediaUpload"]; });

/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utils */ "./node_modules/@wordpress/media-utils/build-module/utils/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "uploadMedia", function() { return _utils__WEBPACK_IMPORTED_MODULE_1__["uploadMedia"]; });





/***/ }),

/***/ "./node_modules/@wordpress/media-utils/build-module/utils/index.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/media-utils/build-module/utils/index.js ***!
  \*************************************************************************/
/*! exports provided: uploadMedia */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _upload_media__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./upload-media */ "./node_modules/@wordpress/media-utils/build-module/utils/upload-media.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "uploadMedia", function() { return _upload_media__WEBPACK_IMPORTED_MODULE_0__["uploadMedia"]; });




/***/ }),

/***/ "./node_modules/@wordpress/media-utils/build-module/utils/upload-media.js":
/*!********************************************************************************!*\
  !*** ./node_modules/@wordpress/media-utils/build-module/utils/upload-media.js ***!
  \********************************************************************************/
/*! exports provided: getMimeTypesArray, uploadMedia */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getMimeTypesArray", function() { return getMimeTypesArray; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "uploadMedia", function() { return uploadMedia; });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "@babel/runtime/regenerator");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_asyncToGenerator__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/esm/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/slicedToArray */ "./node_modules/@babel/runtime/helpers/esm/slicedToArray.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_blob__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/blob */ "@wordpress/blob");
/* harmony import */ var _wordpress_blob__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blob__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__);







function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




/**
 * Browsers may use unexpected mime types, and they differ from browser to browser.
 * This function computes a flexible array of mime types from the mime type structured provided by the server.
 * Converts { jpg|jpeg|jpe: "image/jpeg" } into [ "image/jpeg", "image/jpg", "image/jpeg", "image/jpe" ]
 * The computation of this array instead of directly using the object,
 * solves the problem in chrome where mp3 files have audio/mp3 as mime type instead of audio/mpeg.
 * https://bugs.chromium.org/p/chromium/issues/detail?id=227004
 *
 * @param {?Object} wpMimeTypesObject Mime type object received from the server.
 *                                    Extensions are keys separated by '|' and values are mime types associated with an extension.
 *
 * @return {?Array} An array of mime types or the parameter passed if it was "falsy".
 */

function getMimeTypesArray(wpMimeTypesObject) {
  if (!wpMimeTypesObject) {
    return wpMimeTypesObject;
  }

  return Object(lodash__WEBPACK_IMPORTED_MODULE_6__["flatMap"])(wpMimeTypesObject, function (mime, extensionsString) {
    var _mime$split = mime.split('/'),
        _mime$split2 = Object(_babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_4__["default"])(_mime$split, 1),
        type = _mime$split2[0];

    var extensions = extensionsString.split('|');
    return [mime].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_3__["default"])(Object(lodash__WEBPACK_IMPORTED_MODULE_6__["map"])(extensions, function (extension) {
      return "".concat(type, "/").concat(extension);
    })));
  });
}
/**
 *	Media Upload is used by audio, image, gallery, video, and file blocks to
 *	handle uploading a media file when a file upload button is activated.
 *
 *	TODO: future enhancement to add an upload indicator.
 *
 * @param   {Object}   $0                    Parameters object passed to the function.
 * @param   {?Array}   $0.allowedTypes       Array with the types of media that can be uploaded, if unset all types are allowed.
 * @param   {?Object}  $0.additionalData     Additional data to include in the request.
 * @param   {Array}    $0.filesList          List of files.
 * @param   {?number}  $0.maxUploadFileSize  Maximum upload size in bytes allowed for the site.
 * @param   {Function} $0.onError            Function called when an error happens.
 * @param   {Function} $0.onFileChange       Function called each time a file or a temporary representation of the file is available.
 * @param   {?Object}  $0.wpAllowedMimeTypes List of allowed mime types and file extensions.
 */

function uploadMedia(_x) {
  return _uploadMedia.apply(this, arguments);
}
/**
 * @param {File}    file           Media File to Save.
 * @param {?Object} additionalData Additional data to include in the request.
 *
 * @return {Promise} Media Object Promise.
 */

function _uploadMedia() {
  _uploadMedia = Object(_babel_runtime_helpers_esm_asyncToGenerator__WEBPACK_IMPORTED_MODULE_2__["default"])(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(_ref) {
    var allowedTypes, _ref$additionalData, additionalData, filesList, maxUploadFileSize, _ref$onError, onError, onFileChange, _ref$wpAllowedMimeTyp, wpAllowedMimeTypes, files, filesSet, setAndUpdateFiles, isAllowedType, allowedMimeTypesForUser, isAllowedMimeTypeForUser, triggerError, validFiles, _iteratorNormalCompletion, _didIteratorError, _iteratorError, _iterator, _step, _mediaFile, idx, mediaFile, savedMedia, mediaObject, message;

    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            allowedTypes = _ref.allowedTypes, _ref$additionalData = _ref.additionalData, additionalData = _ref$additionalData === void 0 ? {} : _ref$additionalData, filesList = _ref.filesList, maxUploadFileSize = _ref.maxUploadFileSize, _ref$onError = _ref.onError, onError = _ref$onError === void 0 ? lodash__WEBPACK_IMPORTED_MODULE_6__["noop"] : _ref$onError, onFileChange = _ref.onFileChange, _ref$wpAllowedMimeTyp = _ref.wpAllowedMimeTypes, wpAllowedMimeTypes = _ref$wpAllowedMimeTyp === void 0 ? null : _ref$wpAllowedMimeTyp;
            // Cast filesList to array
            files = Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_3__["default"])(filesList);
            filesSet = [];

            setAndUpdateFiles = function setAndUpdateFiles(idx, value) {
              Object(_wordpress_blob__WEBPACK_IMPORTED_MODULE_8__["revokeBlobURL"])(Object(lodash__WEBPACK_IMPORTED_MODULE_6__["get"])(filesSet, [idx, 'url']));
              filesSet[idx] = value;
              onFileChange(Object(lodash__WEBPACK_IMPORTED_MODULE_6__["compact"])(filesSet));
            }; // Allowed type specified by consumer


            isAllowedType = function isAllowedType(fileType) {
              if (!allowedTypes) {
                return true;
              }

              return Object(lodash__WEBPACK_IMPORTED_MODULE_6__["some"])(allowedTypes, function (allowedType) {
                // If a complete mimetype is specified verify if it matches exactly the mime type of the file.
                if (Object(lodash__WEBPACK_IMPORTED_MODULE_6__["includes"])(allowedType, '/')) {
                  return allowedType === fileType;
                } // Otherwise a general mime type is used and we should verify if the file mimetype starts with it.


                return Object(lodash__WEBPACK_IMPORTED_MODULE_6__["startsWith"])(fileType, "".concat(allowedType, "/"));
              });
            }; // Allowed types for the current WP_User


            allowedMimeTypesForUser = getMimeTypesArray(wpAllowedMimeTypes);

            isAllowedMimeTypeForUser = function isAllowedMimeTypeForUser(fileType) {
              return Object(lodash__WEBPACK_IMPORTED_MODULE_6__["includes"])(allowedMimeTypesForUser, fileType);
            }; // Build the error message including the filename


            triggerError = function triggerError(error) {
              error.message = [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("strong", {
                key: "filename"
              }, error.file.name), ': ', error.message];
              onError(error);
            };

            validFiles = [];
            _iteratorNormalCompletion = true;
            _didIteratorError = false;
            _iteratorError = undefined;
            _context.prev = 12;
            _iterator = files[Symbol.iterator]();

          case 14:
            if (_iteratorNormalCompletion = (_step = _iterator.next()).done) {
              _context.next = 34;
              break;
            }

            _mediaFile = _step.value;

            if (!(allowedMimeTypesForUser && !isAllowedMimeTypeForUser(_mediaFile.type))) {
              _context.next = 19;
              break;
            }

            triggerError({
              code: 'MIME_TYPE_NOT_ALLOWED_FOR_USER',
              message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('Sorry, this file type is not permitted for security reasons.'),
              file: _mediaFile
            });
            return _context.abrupt("continue", 31);

          case 19:
            if (isAllowedType(_mediaFile.type)) {
              _context.next = 22;
              break;
            }

            triggerError({
              code: 'MIME_TYPE_NOT_SUPPORTED',
              message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('Sorry, this file type is not supported here.'),
              file: _mediaFile
            });
            return _context.abrupt("continue", 31);

          case 22:
            if (!(maxUploadFileSize && _mediaFile.size > maxUploadFileSize)) {
              _context.next = 25;
              break;
            }

            triggerError({
              code: 'SIZE_ABOVE_LIMIT',
              message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('This file exceeds the maximum upload size for this site.'),
              file: _mediaFile
            });
            return _context.abrupt("continue", 31);

          case 25:
            if (!(_mediaFile.size <= 0)) {
              _context.next = 28;
              break;
            }

            triggerError({
              code: 'EMPTY_FILE',
              message: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('This file is empty.'),
              file: _mediaFile
            });
            return _context.abrupt("continue", 31);

          case 28:
            validFiles.push(_mediaFile); // Set temporary URL to create placeholder media file, this is replaced
            // with final file from media gallery when upload is `done` below

            filesSet.push({
              url: Object(_wordpress_blob__WEBPACK_IMPORTED_MODULE_8__["createBlobURL"])(_mediaFile)
            });
            onFileChange(filesSet);

          case 31:
            _iteratorNormalCompletion = true;
            _context.next = 14;
            break;

          case 34:
            _context.next = 40;
            break;

          case 36:
            _context.prev = 36;
            _context.t0 = _context["catch"](12);
            _didIteratorError = true;
            _iteratorError = _context.t0;

          case 40:
            _context.prev = 40;
            _context.prev = 41;

            if (!_iteratorNormalCompletion && _iterator.return != null) {
              _iterator.return();
            }

          case 43:
            _context.prev = 43;

            if (!_didIteratorError) {
              _context.next = 46;
              break;
            }

            throw _iteratorError;

          case 46:
            return _context.finish(43);

          case 47:
            return _context.finish(40);

          case 48:
            idx = 0;

          case 49:
            if (!(idx < validFiles.length)) {
              _context.next = 68;
              break;
            }

            mediaFile = validFiles[idx];
            _context.prev = 51;
            _context.next = 54;
            return createMediaFromFile(mediaFile, additionalData);

          case 54:
            savedMedia = _context.sent;
            mediaObject = _objectSpread({}, Object(lodash__WEBPACK_IMPORTED_MODULE_6__["omit"])(savedMedia, ['alt_text', 'source_url']), {
              alt: savedMedia.alt_text,
              caption: Object(lodash__WEBPACK_IMPORTED_MODULE_6__["get"])(savedMedia, ['caption', 'raw'], ''),
              title: savedMedia.title.raw,
              url: savedMedia.source_url
            });
            setAndUpdateFiles(idx, mediaObject);
            _context.next = 65;
            break;

          case 59:
            _context.prev = 59;
            _context.t1 = _context["catch"](51);
            // Reset to empty on failure.
            setAndUpdateFiles(idx, null);
            message = void 0;

            if (Object(lodash__WEBPACK_IMPORTED_MODULE_6__["has"])(_context.t1, ['message'])) {
              message = Object(lodash__WEBPACK_IMPORTED_MODULE_6__["get"])(_context.t1, ['message']);
            } else {
              message = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["sprintf"])( // translators: %s: file name
              Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('Error while uploading file %s to the media library.'), mediaFile.name);
            }

            onError({
              code: 'GENERAL',
              message: message,
              file: mediaFile
            });

          case 65:
            ++idx;
            _context.next = 49;
            break;

          case 68:
          case "end":
            return _context.stop();
        }
      }
    }, _callee, null, [[12, 36, 40, 48], [41,, 43, 47], [51, 59]]);
  }));
  return _uploadMedia.apply(this, arguments);
}

function createMediaFromFile(file, additionalData) {
  // Create upload payload
  var data = new window.FormData();
  data.append('file', file, file.name || file.type.replace('/', '.'));
  Object(lodash__WEBPACK_IMPORTED_MODULE_6__["forEach"])(additionalData, function (value, key) {
    return data.append(key, value);
  });
  return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_7___default()({
    path: '/wp/v2/media',
    body: data,
    method: 'POST'
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

/***/ "@wordpress/api-fetch":
/*!*******************************************!*\
  !*** external {"this":["wp","apiFetch"]} ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["apiFetch"]; }());

/***/ }),

/***/ "@wordpress/blob":
/*!***************************************!*\
  !*** external {"this":["wp","blob"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blob"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!***************************************!*\
  !*** external {"this":["wp","i18n"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["i18n"]; }());

/***/ }),

/***/ "lodash":
/*!**********************************!*\
  !*** external {"this":"lodash"} ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["lodash"]; }());

/***/ })

/******/ });
//# sourceMappingURL=media-utils.js.map