this["wp"] = this["wp"] || {}; this["wp"]["editPost"] =
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
/******/ 	return __webpack_require__(__webpack_require__.s = "./node_modules/@wordpress/edit-post/build-module/index.js");
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

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _extends; });
function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
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

/***/ "./node_modules/@wordpress/edit-post/build-module/components/block-settings-menu/plugin-block-settings-menu-group.js":
/*!***************************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/block-settings-menu/plugin-block-settings-menu-group.js ***!
  \***************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["createSlotFill"])('PluginBlockSettingsMenuGroup'),
    PluginBlockSettingsMenuGroup = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

var PluginBlockSettingsMenuGroupSlot = function PluginBlockSettingsMenuGroupSlot(_ref) {
  var fillProps = _ref.fillProps,
      selectedBlocks = _ref.selectedBlocks;
  selectedBlocks = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["map"])(selectedBlocks, function (block) {
    return block.name;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Slot, {
    fillProps: _objectSpread({}, fillProps, {
      selectedBlocks: selectedBlocks
    })
  }, function (fills) {
    return !Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(fills) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "block-editor-block-settings-menu__separator"
    }), fills);
  });
};

PluginBlockSettingsMenuGroup.Slot = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withSelect"])(function (select, _ref2) {
  var clientIds = _ref2.fillProps.clientIds;
  return {
    selectedBlocks: select('core/block-editor').getBlocksByClientId(clientIds)
  };
})(PluginBlockSettingsMenuGroupSlot);
/* harmony default export */ __webpack_exports__["default"] = (PluginBlockSettingsMenuGroup);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/block-settings-menu/plugin-block-settings-menu-item.js":
/*!**************************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/block-settings-menu/plugin-block-settings-menu-item.js ***!
  \**************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _plugin_block_settings_menu_group__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./plugin-block-settings-menu-group */ "./node_modules/@wordpress/edit-post/build-module/components/block-settings-menu/plugin-block-settings-menu-group.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */



var isEverySelectedBlockAllowed = function isEverySelectedBlockAllowed(selected, allowed) {
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["difference"])(selected, allowed).length === 0;
};
/**
 * Plugins may want to add an item to the menu either for every block
 * or only for the specific ones provided in the `allowedBlocks` component property.
 *
 * If there are multiple blocks selected the item will be rendered if every block
 * is of one allowed type (not necessarily the same).
 *
 * @param {string[]} selectedBlocks Array containing the names of the blocks selected
 * @param {string[]} allowedBlocks Array containing the names of the blocks allowed
 * @return {boolean} Whether the item will be rendered or not.
 */


var shouldRenderItem = function shouldRenderItem(selectedBlocks, allowedBlocks) {
  return !Array.isArray(allowedBlocks) || isEverySelectedBlockAllowed(selectedBlocks, allowedBlocks);
};
/**
 * Renders a new item in the block settings menu.
 *
 * @param {Object} props Component props.
 * @param {Array} [props.allowedBlocks] An array containing a list of block names for which the item should be shown. If not present, it'll be rendered for any block. If multiple blocks are selected, it'll be shown if and only if all of them are in the whitelist.
 * @param {WPBlockTypeIconRender} [props.icon] The [Dashicon](https://developer.wordpress.org/resource/dashicons/) icon slug string, or an SVG WP element.
 * @param {string} props.label The menu item text.
 * @param {Function} props.onClick Callback function to be executed when the user click the menu item.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var __ = wp.i18n.__;
 * var PluginBlockSettingsMenuItem = wp.editPost.PluginBlockSettingsMenuItem;
 *
 * function doOnClick(){
 * 	// To be called when the user clicks the menu item.
 * }
 *
 * function MyPluginBlockSettingsMenuItem() {
 * 	return wp.element.createElement(
 * 		PluginBlockSettingsMenuItem,
 * 		{
 * 			allowedBlocks: [ 'core/paragraph' ],
 * 			icon: 'dashicon-name',
 * 			label: __( 'Menu item text' ),
 * 			onClick: doOnClick,
 * 		}
 * 	);
 * }
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * import { __ } from wp.i18n;
 * import { PluginBlockSettingsMenuItem } from wp.editPost;
 *
 * const doOnClick = ( ) => {
 *     // To be called when the user clicks the menu item.
 * };
 *
 * const MyPluginBlockSettingsMenuItem = () => (
 *     <PluginBlockSettingsMenuItem
 * 		allowedBlocks=[ 'core/paragraph' ]
 * 		icon='dashicon-name'
 * 		label=__( 'Menu item text' )
 * 		onClick={ doOnClick } />
 * );
 * ```
 *
 * @return {WPComponent} The component to be rendered.
 */


var PluginBlockSettingsMenuItem = function PluginBlockSettingsMenuItem(_ref) {
  var allowedBlocks = _ref.allowedBlocks,
      icon = _ref.icon,
      label = _ref.label,
      onClick = _ref.onClick,
      small = _ref.small,
      role = _ref.role;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_plugin_block_settings_menu_group__WEBPACK_IMPORTED_MODULE_4__["default"], null, function (_ref2) {
    var selectedBlocks = _ref2.selectedBlocks,
        onClose = _ref2.onClose;

    if (!shouldRenderItem(selectedBlocks, allowedBlocks)) {
      return null;
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["MenuItem"], {
      onClick: Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__["compose"])(onClick, onClose),
      icon: icon || 'admin-plugins',
      label: small ? label : undefined,
      role: role
    }, !small && label);
  });
};

/* harmony default export */ __webpack_exports__["default"] = (PluginBlockSettingsMenuItem);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/browser-url/index.js":
/*!****************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/browser-url/index.js ***!
  \****************************************************************************************/
/*! exports provided: getPostEditURL, getPostTrashedURL, BrowserURL, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getPostEditURL", function() { return getPostEditURL; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getPostTrashedURL", function() { return getPostTrashedURL; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BrowserURL", function() { return BrowserURL; });
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_7__);






/**
 * WordPress dependencies
 */



/**
 * Returns the Post's Edit URL.
 *
 * @param {number} postId Post ID.
 *
 * @return {string} Post edit URL.
 */

function getPostEditURL(postId) {
  return Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_7__["addQueryArgs"])('post.php', {
    post: postId,
    action: 'edit'
  });
}
/**
 * Returns the Post's Trashed URL.
 *
 * @param {number} postId    Post ID.
 * @param {string} postType Post Type.
 *
 * @return {string} Post trashed URL.
 */

function getPostTrashedURL(postId, postType) {
  return Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_7__["addQueryArgs"])('edit.php', {
    trashed: 1,
    post_type: postType,
    ids: postId
  });
}
var BrowserURL =
/*#__PURE__*/
function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__["default"])(BrowserURL, _Component);

  function BrowserURL() {
    var _this;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__["default"])(this, BrowserURL);

    _this = Object(_babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__["default"])(this, Object(_babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__["default"])(BrowserURL).apply(this, arguments));
    _this.state = {
      historyId: null
    };
    return _this;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__["default"])(BrowserURL, [{
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      var _this$props = this.props,
          postId = _this$props.postId,
          postStatus = _this$props.postStatus,
          postType = _this$props.postType,
          isSavingPost = _this$props.isSavingPost;
      var historyId = this.state.historyId; // Posts are still dirty while saving so wait for saving to finish
      // to avoid the unsaved changes warning when trashing posts.

      if (postStatus === 'trash' && !isSavingPost) {
        this.setTrashURL(postId, postType);
        return;
      }

      if ((postId !== prevProps.postId || postId !== historyId) && postStatus !== 'auto-draft') {
        this.setBrowserURL(postId);
      }
    }
    /**
     * Navigates the browser to the post trashed URL to show a notice about the trashed post.
     *
     * @param {number} postId    Post ID.
     * @param {string} postType  Post Type.
     */

  }, {
    key: "setTrashURL",
    value: function setTrashURL(postId, postType) {
      window.location.href = getPostTrashedURL(postId, postType);
    }
    /**
     * Replaces the browser URL with a post editor link for the given post ID.
     *
     * Note it is important that, since this function may be called when the
     * editor first loads, the result generated `getPostEditURL` matches that
     * produced by the server. Otherwise, the URL will change unexpectedly.
     *
     * @param {number} postId Post ID for which to generate post editor URL.
     */

  }, {
    key: "setBrowserURL",
    value: function setBrowserURL(postId) {
      window.history.replaceState({
        id: postId
      }, 'Post ' + postId, getPostEditURL(postId));
      this.setState(function () {
        return {
          historyId: postId
        };
      });
    }
  }, {
    key: "render",
    value: function render() {
      return null;
    }
  }]);

  return BrowserURL;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["Component"]);
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])(function (select) {
  var _select = select('core/editor'),
      getCurrentPost = _select.getCurrentPost,
      isSavingPost = _select.isSavingPost;

  var _getCurrentPost = getCurrentPost(),
      id = _getCurrentPost.id,
      status = _getCurrentPost.status,
      type = _getCurrentPost.type;

  return {
    postId: id,
    postStatus: status,
    postType: type,
    isSavingPost: isSavingPost()
  };
})(BrowserURL));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/edit-post-settings/index.js":
/*!***********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/edit-post-settings/index.js ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

var EditPostSettings = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createContext"])({});
/* harmony default export */ __webpack_exports__["default"] = (EditPostSettings);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/editor-initialization/index.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/editor-initialization/index.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _listener_hooks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./listener-hooks */ "./node_modules/@wordpress/edit-post/build-module/components/editor-initialization/listener-hooks.js");
/**
 * Internal dependencies
 */

/**
 * Data component used for initializing the editor and re-initializes
 * when postId changes or on unmount.
 *
 * @param {number} postId  The id of the post.
 * @return {null} This is a data component so does not render any ui.
 */

/* harmony default export */ __webpack_exports__["default"] = (function (_ref) {
  var postId = _ref.postId;
  Object(_listener_hooks__WEBPACK_IMPORTED_MODULE_0__["useBlockSelectionListener"])(postId);
  Object(_listener_hooks__WEBPACK_IMPORTED_MODULE_0__["useAdjustSidebarListener"])(postId);
  Object(_listener_hooks__WEBPACK_IMPORTED_MODULE_0__["useUpdatePostLinkListener"])(postId);
  return null;
});


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/editor-initialization/listener-hooks.js":
/*!***********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/editor-initialization/listener-hooks.js ***!
  \***********************************************************************************************************/
/*! exports provided: useBlockSelectionListener, useAdjustSidebarListener, useUpdatePostLinkListener */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "useBlockSelectionListener", function() { return useBlockSelectionListener; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "useAdjustSidebarListener", function() { return useAdjustSidebarListener; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "useUpdatePostLinkListener", function() { return useUpdatePostLinkListener; });
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _store_constants__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../store/constants */ "./node_modules/@wordpress/edit-post/build-module/store/constants.js");
/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */


/**
 * This listener hook monitors for block selection and triggers the appropriate
 * sidebar state.
 *
 * @param {number} postId  The current post id.
 */

var useBlockSelectionListener = function useBlockSelectionListener(postId) {
  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["useSelect"])(function (select) {
    return {
      hasBlockSelection: !!select('core/block-editor').getBlockSelectionStart(),
      isEditorSidebarOpened: select(_store_constants__WEBPACK_IMPORTED_MODULE_2__["STORE_KEY"]).isEditorSidebarOpened()
    };
  }, [postId]),
      hasBlockSelection = _useSelect.hasBlockSelection,
      isEditorSidebarOpened = _useSelect.isEditorSidebarOpened;

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["useDispatch"])(_store_constants__WEBPACK_IMPORTED_MODULE_2__["STORE_KEY"]),
      openGeneralSidebar = _useDispatch.openGeneralSidebar;

  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    if (!isEditorSidebarOpened) {
      return;
    }

    if (hasBlockSelection) {
      openGeneralSidebar('edit-post/block');
    } else {
      openGeneralSidebar('edit-post/document');
    }
  }, [hasBlockSelection, isEditorSidebarOpened]);
};
/**
 * This listener hook is used to monitor viewport size and adjust the sidebar
 * accordingly.
 *
 * @param {number} postId  The current post id.
 */

var useAdjustSidebarListener = function useAdjustSidebarListener(postId) {
  var _useSelect2 = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["useSelect"])(function (select) {
    return {
      isSmall: select('core/viewport').isViewportMatch('< medium'),
      activeGeneralSidebarName: select(_store_constants__WEBPACK_IMPORTED_MODULE_2__["STORE_KEY"]).getActiveGeneralSidebarName()
    };
  }, [postId]),
      isSmall = _useSelect2.isSmall,
      activeGeneralSidebarName = _useSelect2.activeGeneralSidebarName;

  var _useDispatch2 = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["useDispatch"])(_store_constants__WEBPACK_IMPORTED_MODULE_2__["STORE_KEY"]),
      openGeneralSidebar = _useDispatch2.openGeneralSidebar,
      closeGeneralSidebar = _useDispatch2.closeGeneralSidebar;

  var previousIsSmall = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useRef"])(null);
  var sidebarToReOpenOnExpand = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useRef"])(null);
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    if (previousIsSmall.current === isSmall) {
      return;
    }

    previousIsSmall.current = isSmall;

    if (isSmall) {
      sidebarToReOpenOnExpand.current = activeGeneralSidebarName;

      if (activeGeneralSidebarName) {
        closeGeneralSidebar();
      }
    } else if (sidebarToReOpenOnExpand.current && !activeGeneralSidebarName) {
      openGeneralSidebar(sidebarToReOpenOnExpand.current);
      sidebarToReOpenOnExpand.current = null;
    }
  }, [isSmall, activeGeneralSidebarName]);
};
/**
 * This listener hook monitors any change in permalink and updates the view
 * post link in the admin bar.
 *
 * @param {number} postId
 */

var useUpdatePostLinkListener = function useUpdatePostLinkListener(postId) {
  var _useSelect3 = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["useSelect"])(function (select) {
    return {
      newPermalink: select('core/editor').getCurrentPost().link
    };
  }, [postId]),
      newPermalink = _useSelect3.newPermalink;

  var nodeToUpdate = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useRef"])();
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    nodeToUpdate.current = document.querySelector(_store_constants__WEBPACK_IMPORTED_MODULE_2__["VIEW_AS_PREVIEW_LINK_SELECTOR"]) || document.querySelector(_store_constants__WEBPACK_IMPORTED_MODULE_2__["VIEW_AS_LINK_SELECTOR"]);
  }, [postId]);
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    if (!newPermalink || !nodeToUpdate.current) {
      return;
    }

    nodeToUpdate.current.setAttribute('href', newPermalink);
  }, [newPermalink]);
};


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/fullscreen-mode/index.js":
/*!********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/fullscreen-mode/index.js ***!
  \********************************************************************************************/
/*! exports provided: FullscreenMode, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FullscreenMode", function() { return FullscreenMode; });
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);






/**
 * WordPress dependencies
 */


var FullscreenMode =
/*#__PURE__*/
function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__["default"])(FullscreenMode, _Component);

  function FullscreenMode() {
    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__["default"])(this, FullscreenMode);

    return Object(_babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__["default"])(this, Object(_babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__["default"])(FullscreenMode).apply(this, arguments));
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__["default"])(FullscreenMode, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.isSticky = false;
      this.sync(); // `is-fullscreen-mode` is set in PHP as a body class by Gutenberg, and this causes
      // `sticky-menu` to be applied by WordPress and prevents the admin menu being scrolled
      // even if `is-fullscreen-mode` is then removed. Let's remove `sticky-menu` here as
      // a consequence of the FullscreenMode setup

      if (document.body.classList.contains('sticky-menu')) {
        this.isSticky = true;
        document.body.classList.remove('sticky-menu');
      }
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      if (this.isSticky) {
        document.body.classList.add('sticky-menu');
      }
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      if (this.props.isActive !== prevProps.isActive) {
        this.sync();
      }
    }
  }, {
    key: "sync",
    value: function sync() {
      var isActive = this.props.isActive;

      if (isActive) {
        document.body.classList.add('is-fullscreen-mode');
      } else {
        document.body.classList.remove('is-fullscreen-mode');
      }
    }
  }, {
    key: "render",
    value: function render() {
      return null;
    }
  }]);

  return FullscreenMode;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["Component"]);
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])(function (select) {
  return {
    isActive: select('core/edit-post').isFeatureActive('fullscreenMode')
  };
})(FullscreenMode));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/feature-toggle/index.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/feature-toggle/index.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/index.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */







function FeatureToggle(_ref) {
  var onToggle = _ref.onToggle,
      isActive = _ref.isActive,
      label = _ref.label,
      info = _ref.info,
      messageActivated = _ref.messageActivated,
      messageDeactivated = _ref.messageDeactivated,
      speak = _ref.speak;

  var speakMessage = function speakMessage() {
    if (isActive) {
      speak(messageDeactivated || Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Feature deactivated'));
    } else {
      speak(messageActivated || Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Feature activated'));
    }
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["MenuItem"], {
    icon: isActive && _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__["check"],
    isSelected: isActive,
    onClick: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["flow"])(onToggle, speakMessage),
    role: "menuitemcheckbox",
    info: info
  }, label);
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withSelect"])(function (select, _ref2) {
  var feature = _ref2.feature;
  return {
    isActive: select('core/edit-post').isFeatureActive(feature)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withDispatch"])(function (dispatch, ownProps) {
  return {
    onToggle: function onToggle() {
      dispatch('core/edit-post').toggleFeature(ownProps.feature);
    }
  };
}), _wordpress_components__WEBPACK_IMPORTED_MODULE_4__["withSpokenMessages"]])(FeatureToggle));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/fullscreen-mode-close/index.js":
/*!*********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/fullscreen-mode-close/index.js ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_6__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */






var wordPressLogo = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_4__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_4__["Path"], {
  d: "M20 10c0-5.51-4.49-10-10-10C4.48 0 0 4.49 0 10c0 5.52 4.48 10 10 10 5.51 0 10-4.48 10-10zM7.78 15.37L4.37 6.22c.55-.02 1.17-.08 1.17-.08.5-.06.44-1.13-.06-1.11 0 0-1.45.11-2.37.11-.18 0-.37 0-.58-.01C4.12 2.69 6.87 1.11 10 1.11c2.33 0 4.45.87 6.05 2.34-.68-.11-1.65.39-1.65 1.58 0 .74.45 1.36.9 2.1.35.61.55 1.36.55 2.46 0 1.49-1.4 5-1.4 5l-3.03-8.37c.54-.02.82-.17.82-.17.5-.05.44-1.25-.06-1.22 0 0-1.44.12-2.38.12-.87 0-2.33-.12-2.33-.12-.5-.03-.56 1.2-.06 1.22l.92.08 1.26 3.41zM17.41 10c.24-.64.74-1.87.43-4.25.7 1.29 1.05 2.71 1.05 4.25 0 3.29-1.73 6.24-4.4 7.78.97-2.59 1.94-5.2 2.92-7.78zM6.1 18.09C3.12 16.65 1.11 13.53 1.11 10c0-1.3.23-2.48.72-3.59C3.25 10.3 4.67 14.2 6.1 18.09zm4.03-6.63l2.58 6.98c-.86.29-1.76.45-2.71.45-.79 0-1.57-.11-2.29-.33.81-2.38 1.62-4.74 2.42-7.1z"
}));

function FullscreenModeClose() {
  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(function (select) {
    var _select = select('core/editor'),
        getCurrentPostType = _select.getCurrentPostType;

    var _select2 = select('core/edit-post'),
        isFeatureActive = _select2.isFeatureActive;

    var _select3 = select('core'),
        getPostType = _select3.getPostType;

    return {
      isActive: isFeatureActive('fullscreenMode'),
      postType: getPostType(getCurrentPostType())
    };
  }, []),
      isActive = _useSelect.isActive,
      postType = _useSelect.postType;

  if (!isActive || !postType) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
    className: "edit-post-fullscreen-mode-close",
    icon: wordPressLogo,
    iconSize: 36,
    href: Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_6__["addQueryArgs"])('edit.php', {
      post_type: postType.slug
    }),
    label: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(postType, ['labels', 'view_items'], Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Back'))
  });
}

/* harmony default export */ __webpack_exports__["default"] = (FullscreenModeClose);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/header-toolbar/index.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/header-toolbar/index.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__);


/**
 * WordPress dependencies
 */






function HeaderToolbar() {
  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(function (select) {
    return {
      hasFixedToolbar: select('core/edit-post').isFeatureActive('fixedToolbar'),
      // This setting (richEditingEnabled) should not live in the block editor's setting.
      showInserter: select('core/edit-post').getEditorMode() === 'visual' && select('core/editor').getEditorSettings().richEditingEnabled,
      isTextModeEnabled: select('core/edit-post').getEditorMode() === 'text'
    };
  }, []),
      hasFixedToolbar = _useSelect.hasFixedToolbar,
      showInserter = _useSelect.showInserter,
      isTextModeEnabled = _useSelect.isTextModeEnabled;

  var isLargeViewport = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__["useViewportMatch"])('medium');
  var toolbarAriaLabel = hasFixedToolbar ?
  /* translators: accessibility text for the editor toolbar when Top Toolbar is on */
  Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Document and block tools') :
  /* translators: accessibility text for the editor toolbar when Top Toolbar is off */
  Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Document tools');
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["NavigableToolbar"], {
    className: "edit-post-header-toolbar",
    "aria-label": toolbarAriaLabel
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["Inserter"], {
    disabled: !showInserter,
    position: "bottom right",
    showInserterHelpPanel: true
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["EditorHistoryUndo"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["EditorHistoryRedo"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["TableOfContents"], {
    hasOutlineItemsDisabled: isTextModeEnabled
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["BlockNavigationDropdown"], {
    isDisabled: isTextModeEnabled
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["ToolSelector"], null), (hasFixedToolbar || !isLargeViewport) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-header-toolbar__block-toolbar"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["BlockToolbar"], {
    hideDragHandle: true
  })));
}

/* harmony default export */ __webpack_exports__["default"] = (HeaderToolbar);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/index.js":
/*!***********************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/index.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/index.js");
/* harmony import */ var _fullscreen_mode_close__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./fullscreen-mode-close */ "./node_modules/@wordpress/edit-post/build-module/components/header/fullscreen-mode-close/index.js");
/* harmony import */ var _header_toolbar__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./header-toolbar */ "./node_modules/@wordpress/edit-post/build-module/components/header/header-toolbar/index.js");
/* harmony import */ var _more_menu__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./more-menu */ "./node_modules/@wordpress/edit-post/build-module/components/header/more-menu/index.js");
/* harmony import */ var _pinned_plugins__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./pinned-plugins */ "./node_modules/@wordpress/edit-post/build-module/components/header/pinned-plugins/index.js");
/* harmony import */ var _post_publish_button_or_toggle__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./post-publish-button-or-toggle */ "./node_modules/@wordpress/edit-post/build-module/components/header/post-publish-button-or-toggle.js");


/**
 * WordPress dependencies
 */





/**
 * Internal dependencies
 */







function Header() {
  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useSelect"])(function (select) {
    return {
      shortcut: select('core/keyboard-shortcuts').getShortcutRepresentation('core/edit-post/toggle-sidebar'),
      hasActiveMetaboxes: select('core/edit-post').hasMetaBoxes(),
      isEditorSidebarOpened: select('core/edit-post').isEditorSidebarOpened(),
      isPublishSidebarOpened: select('core/edit-post').isPublishSidebarOpened(),
      isSaving: select('core/edit-post').isSavingMetaBoxes(),
      getBlockSelectionStart: select('core/block-editor').getBlockSelectionStart
    };
  }, []),
      shortcut = _useSelect.shortcut,
      hasActiveMetaboxes = _useSelect.hasActiveMetaboxes,
      isEditorSidebarOpened = _useSelect.isEditorSidebarOpened,
      isPublishSidebarOpened = _useSelect.isPublishSidebarOpened,
      isSaving = _useSelect.isSaving,
      getBlockSelectionStart = _useSelect.getBlockSelectionStart;

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useDispatch"])('core/edit-post'),
      openGeneralSidebar = _useDispatch.openGeneralSidebar,
      closeGeneralSidebar = _useDispatch.closeGeneralSidebar;

  var toggleGeneralSidebar = isEditorSidebarOpened ? closeGeneralSidebar : function () {
    return openGeneralSidebar(getBlockSelectionStart() ? 'edit-post/block' : 'edit-post/document');
  };
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-header"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_fullscreen_mode_close__WEBPACK_IMPORTED_MODULE_6__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-header__toolbar"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_header_toolbar__WEBPACK_IMPORTED_MODULE_7__["default"], null)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-header__settings"
  }, !isPublishSidebarOpened && // This button isn't completely hidden by the publish sidebar.
  // We can't hide the whole toolbar when the publish sidebar is open because
  // we want to prevent mounting/unmounting the PostPublishButtonOrToggle DOM node.
  // We track that DOM node to return focus to the PostPublishButtonOrToggle
  // when the publish sidebar has been closed.
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostSavedState"], {
    forceIsDirty: hasActiveMetaboxes,
    forceIsSaving: isSaving
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostPreviewButton"], {
    forceIsAutosaveable: hasActiveMetaboxes,
    forcePreviewLink: isSaving ? null : undefined
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_publish_button_or_toggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
    forceIsDirty: hasActiveMetaboxes,
    forceIsSaving: isSaving
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_5__["cog"],
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Settings'),
    onClick: toggleGeneralSidebar,
    isPressed: isEditorSidebarOpened,
    "aria-expanded": isEditorSidebarOpened,
    shortcut: shortcut
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_pinned_plugins__WEBPACK_IMPORTED_MODULE_9__["default"].Slot, null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_more_menu__WEBPACK_IMPORTED_MODULE_8__["default"], null)));
}

/* harmony default export */ __webpack_exports__["default"] = (Header);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/mode-switcher/index.js":
/*!*************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/mode-switcher/index.js ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */



/**
 * Set of available mode options.
 *
 * @type {Array}
 */

var MODES = [{
  value: 'visual',
  label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Visual editor')
}, {
  value: 'text',
  label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Code editor')
}];

function ModeSwitcher() {
  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useSelect"])(function (select) {
    return {
      shortcut: select('core/keyboard-shortcuts').getShortcutRepresentation('core/edit-post/toggle-mode'),
      isRichEditingEnabled: select('core/editor').getEditorSettings().richEditingEnabled,
      isCodeEditingEnabled: select('core/editor').getEditorSettings().codeEditingEnabled,
      mode: select('core/edit-post').getEditorMode()
    };
  }, []),
      shortcut = _useSelect.shortcut,
      isRichEditingEnabled = _useSelect.isRichEditingEnabled,
      isCodeEditingEnabled = _useSelect.isCodeEditingEnabled,
      mode = _useSelect.mode;

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useDispatch"])('core/edit-post'),
      switchEditorMode = _useDispatch.switchEditorMode;

  var choices = MODES.map(function (choice) {
    if (choice.value !== mode) {
      return _objectSpread({}, choice, {
        shortcut: shortcut
      });
    }

    return choice;
  });

  if (!isRichEditingEnabled || !isCodeEditingEnabled) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["MenuGroup"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Editor')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["MenuItemsChoice"], {
    choices: choices,
    value: mode,
    onSelect: switchEditorMode
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (ModeSwitcher);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/more-menu/index.js":
/*!*********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/more-menu/index.js ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/index.js");
/* harmony import */ var _mode_switcher__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../mode-switcher */ "./node_modules/@wordpress/edit-post/build-module/components/header/mode-switcher/index.js");
/* harmony import */ var _plugins_more_menu_group__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../plugins-more-menu-group */ "./node_modules/@wordpress/edit-post/build-module/components/header/plugins-more-menu-group/index.js");
/* harmony import */ var _tools_more_menu_group__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../tools-more-menu-group */ "./node_modules/@wordpress/edit-post/build-module/components/header/tools-more-menu-group/index.js");
/* harmony import */ var _options_menu_item__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../options-menu-item */ "./node_modules/@wordpress/edit-post/build-module/components/header/options-menu-item/index.js");
/* harmony import */ var _writing_menu__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../writing-menu */ "./node_modules/@wordpress/edit-post/build-module/components/header/writing-menu/index.js");


/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */






var POPOVER_PROPS = {
  className: 'edit-post-more-menu__content',
  position: 'bottom left'
};
var TOGGLE_PROPS = {
  tooltipPosition: 'bottom'
};

var MoreMenu = function MoreMenu() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["DropdownMenu"], {
    className: "edit-post-more-menu",
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_3__["moreHorizontal"],
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('More tools & options'),
    popoverProps: POPOVER_PROPS,
    toggleProps: TOGGLE_PROPS
  }, function (_ref) {
    var onClose = _ref.onClose;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_writing_menu__WEBPACK_IMPORTED_MODULE_8__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_mode_switcher__WEBPACK_IMPORTED_MODULE_4__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_plugins_more_menu_group__WEBPACK_IMPORTED_MODULE_5__["default"].Slot, {
      fillProps: {
        onClose: onClose
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_tools_more_menu_group__WEBPACK_IMPORTED_MODULE_6__["default"].Slot, {
      fillProps: {
        onClose: onClose
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["MenuGroup"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options_menu_item__WEBPACK_IMPORTED_MODULE_7__["default"], null)));
  });
};

/* harmony default export */ __webpack_exports__["default"] = (MoreMenu);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/options-menu-item/index.js":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/options-menu-item/index.js ***!
  \*****************************************************************************************************/
/*! exports provided: OptionsMenuItem, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "OptionsMenuItem", function() { return OptionsMenuItem; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);


/**
 * WordPress dependencies
 */



function OptionsMenuItem(_ref) {
  var openModal = _ref.openModal;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["MenuItem"], {
    onClick: function onClick() {
      openModal('edit-post/options');
    }
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Options'));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      openModal = _dispatch.openModal;

  return {
    openModal: openModal
  };
})(OptionsMenuItem));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/pinned-plugins/index.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/pinned-plugins/index.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */



var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["createSlotFill"])('PinnedPlugins'),
    PinnedPlugins = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

PinnedPlugins.Slot = function (props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Slot, props, function (fills) {
    return !Object(lodash__WEBPACK_IMPORTED_MODULE_1__["isEmpty"])(fills) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "edit-post-pinned-plugins"
    }, fills);
  });
};

/* harmony default export */ __webpack_exports__["default"] = (PinnedPlugins);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/plugin-more-menu-item/index.js":
/*!*********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/plugin-more-menu-item/index.js ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _plugins_more_menu_group__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../plugins-more-menu-group */ "./node_modules/@wordpress/edit-post/build-module/components/header/plugins-more-menu-group/index.js");




/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */



var PluginMoreMenuItem = function PluginMoreMenuItem(_ref) {
  var _ref$onClick = _ref.onClick,
      onClick = _ref$onClick === void 0 ? lodash__WEBPACK_IMPORTED_MODULE_3__["noop"] : _ref$onClick,
      props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__["default"])(_ref, ["onClick"]);

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_plugins_more_menu_group__WEBPACK_IMPORTED_MODULE_7__["default"], null, function (fillProps) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["MenuItem"], Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, props, {
      onClick: Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])(onClick, fillProps.onClose)
    }));
  });
};
/**
 * Renders a menu item in `Plugins` group in `More Menu` drop down, and can be used to as a button or link depending on the props provided.
 * The text within the component appears as the menu item label.
 *
 * @param {Object} props Component properties.
 * @param {string} [props.href] When `href` is provided then the menu item is represented as an anchor rather than button. It corresponds to the `href` attribute of the anchor.
 * @param {WPBlockTypeIconRender} [props.icon=inherits from the plugin] The [Dashicon](https://developer.wordpress.org/resource/dashicons/) icon slug string, or an SVG WP element, to be rendered to the left of the menu item label.
 * @param {Function} [props.onClick=noop] The callback function to be executed when the user clicks the menu item.
 * @param {...*} [props.other] Any additional props are passed through to the underlying [MenuItem](/packages/components/src/menu-item/README.md) component.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var __ = wp.i18n.__;
 * var PluginMoreMenuItem = wp.editPost.PluginMoreMenuItem;
 * var moreIcon = wp.element.createElement( 'svg' ); //... svg element.
 *
 * function onButtonClick() {
 * 	alert( 'Button clicked.' );
 * }
 *
 * function MyButtonMoreMenuItem() {
 * 	return wp.element.createElement(
 * 		PluginMoreMenuItem,
 * 		{
 * 			icon: moreIcon,
 * 			onClick: onButtonClick,
 * 		},
 * 		__( 'My button title' )
 * 	);
 * }
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * import { __ } from '@wordpress/i18n';
 * import { PluginMoreMenuItem } from '@wordpress/edit-post';
 * import { more } from '@wordpress/icons';
 *
 * function onButtonClick() {
 * 	alert( 'Button clicked.' );
 * }
 *
 * const MyButtonMoreMenuItem = () => (
 * 	<PluginMoreMenuItem
 * 		icon={ more }
 * 		onClick={ onButtonClick }
 * 	>
 * 		{ __( 'My button title' ) }
 * 	</PluginMoreMenuItem>
 * );
 * ```
 *
 * @return {WPComponent} The component to be rendered.
 */


/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])(Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_6__["withPluginContext"])(function (context, ownProps) {
  return {
    icon: ownProps.icon || context.icon
  };
}))(PluginMoreMenuItem));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/plugin-sidebar-more-menu-item/index.js":
/*!*****************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/plugin-sidebar-more-menu-item/index.js ***!
  \*****************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/index.js");
/* harmony import */ var _plugin_more_menu_item__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../plugin-more-menu-item */ "./node_modules/@wordpress/edit-post/build-module/components/header/plugin-more-menu-item/index.js");


/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */



var PluginSidebarMoreMenuItem = function PluginSidebarMoreMenuItem(_ref) {
  var children = _ref.children,
      icon = _ref.icon,
      isSelected = _ref.isSelected,
      onClick = _ref.onClick;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_plugin_more_menu_item__WEBPACK_IMPORTED_MODULE_5__["default"], {
    icon: isSelected ? _wordpress_icons__WEBPACK_IMPORTED_MODULE_4__["check"] : icon,
    isSelected: isSelected,
    role: "menuitemcheckbox",
    onClick: onClick
  }, children);
};
/**
 * Renders a menu item in `Plugins` group in `More Menu` drop down,
 * and can be used to activate the corresponding `PluginSidebar` component.
 * The text within the component appears as the menu item label.
 *
 * @param {Object} props Component props.
 * @param {string} props.target A string identifying the target sidebar you wish to be activated by this menu item. Must be the same as the `name` prop you have given to that sidebar.
 * @param {WPBlockTypeIconRender} [props.icon=inherits from the plugin] The [Dashicon](https://developer.wordpress.org/resource/dashicons/) icon slug string, or an SVG WP element, to be rendered to the left of the menu item label.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var __ = wp.i18n.__;
 * var PluginSidebarMoreMenuItem = wp.editPost.PluginSidebarMoreMenuItem;
 * var moreIcon = wp.element.createElement( 'svg' ); //... svg element.
 *
 * function MySidebarMoreMenuItem() {
 * 	return wp.element.createElement(
 * 		PluginSidebarMoreMenuItem,
 * 		{
 * 			target: 'my-sidebar',
 * 			icon: moreIcon,
 * 		},
 * 		__( 'My sidebar title' )
 * 	)
 * }
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * import { __ } from '@wordpress/i18n';
 * import { PluginSidebarMoreMenuItem } from '@wordpress/edit-post';
 * import { more } from '@wordpress/icons';
 *
 * const MySidebarMoreMenuItem = () => (
 * 	<PluginSidebarMoreMenuItem
 * 		target="my-sidebar"
 * 		icon={ more }
 * 	>
 * 		{ __( 'My sidebar title' ) }
 * 	</PluginSidebarMoreMenuItem>
 * );
 * ```
 *
 * @return {WPComponent} The component to be rendered.
 */


/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__["compose"])(Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__["withPluginContext"])(function (context, ownProps) {
  return {
    icon: ownProps.icon || context.icon,
    sidebarName: "".concat(context.name, "/").concat(ownProps.target)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withSelect"])(function (select, _ref2) {
  var sidebarName = _ref2.sidebarName;

  var _select = select('core/edit-post'),
      getActiveGeneralSidebarName = _select.getActiveGeneralSidebarName;

  return {
    isSelected: getActiveGeneralSidebarName() === sidebarName
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withDispatch"])(function (dispatch, _ref3) {
  var isSelected = _ref3.isSelected,
      sidebarName = _ref3.sidebarName;

  var _dispatch = dispatch('core/edit-post'),
      closeGeneralSidebar = _dispatch.closeGeneralSidebar,
      openGeneralSidebar = _dispatch.openGeneralSidebar;

  var onClick = isSelected ? closeGeneralSidebar : function () {
    return openGeneralSidebar(sidebarName);
  };
  return {
    onClick: onClick
  };
}))(PluginSidebarMoreMenuItem));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/plugins-more-menu-group/index.js":
/*!***********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/plugins-more-menu-group/index.js ***!
  \***********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["createSlotFill"])('PluginsMoreMenuGroup'),
    PluginsMoreMenuGroup = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

PluginsMoreMenuGroup.Slot = function (_ref) {
  var fillProps = _ref.fillProps;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Slot, {
    fillProps: fillProps
  }, function (fills) {
    return !Object(lodash__WEBPACK_IMPORTED_MODULE_1__["isEmpty"])(fills) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["MenuGroup"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Plugins')
    }, fills);
  });
};

/* harmony default export */ __webpack_exports__["default"] = (PluginsMoreMenuGroup);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/post-publish-button-or-toggle.js":
/*!***********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/post-publish-button-or-toggle.js ***!
  \***********************************************************************************************************/
/*! exports provided: PostPublishButtonOrToggle, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostPublishButtonOrToggle", function() { return PostPublishButtonOrToggle; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




function PostPublishButtonOrToggle(_ref) {
  var forceIsDirty = _ref.forceIsDirty,
      forceIsSaving = _ref.forceIsSaving,
      hasPublishAction = _ref.hasPublishAction,
      isBeingScheduled = _ref.isBeingScheduled,
      isPending = _ref.isPending,
      isPublished = _ref.isPublished,
      isPublishSidebarEnabled = _ref.isPublishSidebarEnabled,
      isPublishSidebarOpened = _ref.isPublishSidebarOpened,
      isScheduled = _ref.isScheduled,
      togglePublishSidebar = _ref.togglePublishSidebar;
  var IS_TOGGLE = 'toggle';
  var IS_BUTTON = 'button';
  var isSmallerThanMediumViewport = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__["useViewportMatch"])('medium', '<');
  var component;
  /**
   * Conditions to show a BUTTON (publish directly) or a TOGGLE (open publish sidebar):
   *
   * 1) We want to show a BUTTON when the post status is at the _final stage_
   * for a particular role (see https://wordpress.org/support/article/post-status/):
   *
   * - is published
   * - is scheduled to be published
   * - is pending and can't be published (but only for viewports >= medium).
   * 	 Originally, we considered showing a button for pending posts that couldn't be published
   * 	 (for example, for an author with the contributor role). Some languages can have
   * 	 long translations for "Submit for review", so given the lack of UI real estate available
   * 	 we decided to take into account the viewport in that case.
   *  	 See: https://github.com/WordPress/gutenberg/issues/10475
   *
   * 2) Then, in small viewports, we'll show a TOGGLE.
   *
   * 3) Finally, we'll use the publish sidebar status to decide:
   *
   * - if it is enabled, we show a TOGGLE
   * - if it is disabled, we show a BUTTON
   */

  if (isPublished || isScheduled && isBeingScheduled || isPending && !hasPublishAction && !isSmallerThanMediumViewport) {
    component = IS_BUTTON;
  } else if (isSmallerThanMediumViewport) {
    component = IS_TOGGLE;
  } else if (isPublishSidebarEnabled) {
    component = IS_TOGGLE;
  } else {
    component = IS_BUTTON;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__["PostPublishButton"], {
    forceIsDirty: forceIsDirty,
    forceIsSaving: forceIsSaving,
    isOpen: isPublishSidebarOpened,
    isToggle: component === IS_TOGGLE,
    onToggle: togglePublishSidebar
  });
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withSelect"])(function (select) {
  return {
    hasPublishAction: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(select('core/editor').getCurrentPost(), ['_links', 'wp:action-publish'], false),
    isBeingScheduled: select('core/editor').isEditedPostBeingScheduled(),
    isPending: select('core/editor').isCurrentPostPending(),
    isPublished: select('core/editor').isCurrentPostPublished(),
    isPublishSidebarEnabled: select('core/editor').isPublishSidebarEnabled(),
    isPublishSidebarOpened: select('core/edit-post').isPublishSidebarOpened(),
    isScheduled: select('core/editor').isCurrentPostScheduled()
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      togglePublishSidebar = _dispatch.togglePublishSidebar;

  return {
    togglePublishSidebar: togglePublishSidebar
  };
}))(PostPublishButtonOrToggle));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/tools-more-menu-group/index.js":
/*!*********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/tools-more-menu-group/index.js ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["createSlotFill"])('ToolsMoreMenuGroup'),
    ToolsMoreMenuGroup = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

ToolsMoreMenuGroup.Slot = function (_ref) {
  var fillProps = _ref.fillProps;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Slot, {
    fillProps: fillProps
  }, function (fills) {
    return !Object(lodash__WEBPACK_IMPORTED_MODULE_1__["isEmpty"])(fills) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["MenuGroup"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Tools')
    }, fills);
  });
};

/* harmony default export */ __webpack_exports__["default"] = (ToolsMoreMenuGroup);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/header/writing-menu/index.js":
/*!************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/header/writing-menu/index.js ***!
  \************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _feature_toggle__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../feature-toggle */ "./node_modules/@wordpress/edit-post/build-module/components/header/feature-toggle/index.js");


/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */



function WritingMenu() {
  var isLargeViewport = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__["useViewportMatch"])('medium');

  if (!isLargeViewport) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["MenuGroup"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["_x"])('View', 'noun')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_feature_toggle__WEBPACK_IMPORTED_MODULE_4__["default"], {
    feature: "fixedToolbar",
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Top toolbar'),
    info: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Access all block and document tools in a single place'),
    messageActivated: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Top toolbar activated'),
    messageDeactivated: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Top toolbar deactivated')
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_feature_toggle__WEBPACK_IMPORTED_MODULE_4__["default"], {
    feature: "focusMode",
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Spotlight mode'),
    info: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Focus on one block at a time'),
    messageActivated: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Spotlight mode activated'),
    messageDeactivated: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Spotlight mode deactivated')
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_feature_toggle__WEBPACK_IMPORTED_MODULE_4__["default"], {
    feature: "fullscreenMode",
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Fullscreen mode'),
    info: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Work without distraction'),
    messageActivated: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Fullscreen mode activated'),
    messageDeactivated: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Fullscreen mode deactivated')
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (WritingMenu);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/config.js":
/*!**********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/config.js ***!
  \**********************************************************************************************************/
/*! exports provided: textFormattingShortcuts */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "textFormattingShortcuts", function() { return textFormattingShortcuts; });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

var textFormattingShortcuts = [{
  keyCombination: {
    modifier: 'primary',
    character: 'b'
  },
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Make the selected text bold.')
}, {
  keyCombination: {
    modifier: 'primary',
    character: 'i'
  },
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Make the selected text italic.')
}, {
  keyCombination: {
    modifier: 'primary',
    character: 'k'
  },
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Convert the selected text into a link.')
}, {
  keyCombination: {
    modifier: 'primaryShift',
    character: 'k'
  },
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Remove a link.')
}, {
  keyCombination: {
    modifier: 'primary',
    character: 'u'
  },
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Underline the selected text.')
}];


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/dynamic-shortcut.js":
/*!********************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/dynamic-shortcut.js ***!
  \********************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _shortcut__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./shortcut */ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/shortcut.js");


/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */



function DynamicShortcut(_ref) {
  var name = _ref.name;

  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useSelect"])(function (select) {
    var _select = select('core/keyboard-shortcuts'),
        getShortcutKeyCombination = _select.getShortcutKeyCombination,
        getShortcutDescription = _select.getShortcutDescription,
        getShortcutAliases = _select.getShortcutAliases;

    return {
      keyCombination: getShortcutKeyCombination(name),
      aliases: getShortcutAliases(name),
      description: getShortcutDescription(name)
    };
  }),
      keyCombination = _useSelect.keyCombination,
      description = _useSelect.description,
      aliases = _useSelect.aliases;

  if (!keyCombination) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_shortcut__WEBPACK_IMPORTED_MODULE_2__["default"], {
    keyCombination: keyCombination,
    description: description,
    aliases: aliases
  });
}

/* harmony default export */ __webpack_exports__["default"] = (DynamicShortcut);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/index.js":
/*!*********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/index.js ***!
  \*********************************************************************************************************/
/*! exports provided: KeyboardShortcutHelpModal, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "KeyboardShortcutHelpModal", function() { return KeyboardShortcutHelpModal; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/keyboard-shortcuts */ "@wordpress/keyboard-shortcuts");
/* harmony import */ var _wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./config */ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/config.js");
/* harmony import */ var _shortcut__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./shortcut */ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/shortcut.js");
/* harmony import */ var _dynamic_shortcut__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./dynamic-shortcut */ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/dynamic-shortcut.js");


/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */






/**
 * Internal dependencies
 */




var MODAL_NAME = 'edit-post/keyboard-shortcut-help';

var ShortcutList = function ShortcutList(_ref) {
  var shortcuts = _ref.shortcuts;
  return (
    /*
     * Disable reason: The `list` ARIA role is redundant but
     * Safari+VoiceOver won't announce the list otherwise.
     */

    /* eslint-disable jsx-a11y/no-redundant-roles */
    Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("ul", {
      className: "edit-post-keyboard-shortcut-help-modal__shortcut-list",
      role: "list"
    }, shortcuts.map(function (shortcut, index) {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
        className: "edit-post-keyboard-shortcut-help-modal__shortcut",
        key: index
      }, Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isString"])(shortcut) ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_dynamic_shortcut__WEBPACK_IMPORTED_MODULE_10__["default"], {
        name: shortcut
      }) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_shortcut__WEBPACK_IMPORTED_MODULE_9__["default"], shortcut));
    }))
    /* eslint-enable jsx-a11y/no-redundant-roles */

  );
};

var ShortcutSection = function ShortcutSection(_ref2) {
  var title = _ref2.title,
      shortcuts = _ref2.shortcuts,
      className = _ref2.className;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("section", {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('edit-post-keyboard-shortcut-help-modal__section', className)
  }, !!title && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h2", {
    className: "edit-post-keyboard-shortcut-help-modal__section-title"
  }, title), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ShortcutList, {
    shortcuts: shortcuts
  }));
};

var ShortcutCategorySection = function ShortcutCategorySection(_ref3) {
  var title = _ref3.title,
      categoryName = _ref3.categoryName,
      _ref3$additionalShort = _ref3.additionalShortcuts,
      additionalShortcuts = _ref3$additionalShort === void 0 ? [] : _ref3$additionalShort;
  var categoryShortcuts = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["useSelect"])(function (select) {
    return select('core/keyboard-shortcuts').getCategoryShortcuts(categoryName);
  }, [categoryName]);
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ShortcutSection, {
    title: title,
    shortcuts: categoryShortcuts.concat(additionalShortcuts)
  });
};

function KeyboardShortcutHelpModal(_ref4) {
  var isModalActive = _ref4.isModalActive,
      toggleModal = _ref4.toggleModal;
  Object(_wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_5__["useShortcut"])('core/edit-post/keyboard-shortcuts', toggleModal, {
    bindGlobal: true
  });

  if (!isModalActive) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Modal"], {
    className: "edit-post-keyboard-shortcut-help-modal",
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Keyboard shortcuts'),
    closeLabel: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Close'),
    onRequestClose: toggleModal
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ShortcutSection, {
    className: "edit-post-keyboard-shortcut-help-modal__main-shortcuts",
    shortcuts: ['core/edit-post/keyboard-shortcuts']
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ShortcutCategorySection, {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Global shortcuts'),
    categoryName: "global"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ShortcutCategorySection, {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Selection shortcuts'),
    categoryName: "selection"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ShortcutCategorySection, {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Block shortcuts'),
    categoryName: "block",
    additionalShortcuts: [{
      keyCombination: {
        character: '/'
      },
      description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Change the block type after adding a new paragraph.'),

      /* translators: The forward-slash character. e.g. '/'. */
      ariaLabel: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Forward-slash')
    }]
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ShortcutSection, {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Text formatting'),
    shortcuts: _config__WEBPACK_IMPORTED_MODULE_8__["textFormattingShortcuts"]
  }));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_7__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])(function (select) {
  return {
    isModalActive: select('core/edit-post').isModalActive(MODAL_NAME)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withDispatch"])(function (dispatch, _ref5) {
  var isModalActive = _ref5.isModalActive;

  var _dispatch = dispatch('core/edit-post'),
      openModal = _dispatch.openModal,
      closeModal = _dispatch.closeModal;

  return {
    toggleModal: function toggleModal() {
      return isModalActive ? closeModal() : openModal(MODAL_NAME);
    }
  };
})])(KeyboardShortcutHelpModal));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/shortcut.js":
/*!************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/shortcut.js ***!
  \************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/keycodes */ "@wordpress/keycodes");
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keycodes__WEBPACK_IMPORTED_MODULE_2__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




function KeyCombination(_ref) {
  var keyCombination = _ref.keyCombination,
      forceAriaLabel = _ref.forceAriaLabel;
  var shortcut = keyCombination.modifier ? _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_2__["displayShortcutList"][keyCombination.modifier](keyCombination.character) : keyCombination.character;
  var ariaLabel = keyCombination.modifier ? _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_2__["shortcutAriaLabel"][keyCombination.modifier](keyCombination.character) : keyCombination.character;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("kbd", {
    className: "edit-post-keyboard-shortcut-help-modal__shortcut-key-combination",
    "aria-label": forceAriaLabel || ariaLabel
  }, Object(lodash__WEBPACK_IMPORTED_MODULE_1__["castArray"])(shortcut).map(function (character, index) {
    if (character === '+') {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], {
        key: index
      }, character);
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("kbd", {
      key: index,
      className: "edit-post-keyboard-shortcut-help-modal__shortcut-key"
    }, character);
  }));
}

function Shortcut(_ref2) {
  var description = _ref2.description,
      keyCombination = _ref2.keyCombination,
      _ref2$aliases = _ref2.aliases,
      aliases = _ref2$aliases === void 0 ? [] : _ref2$aliases,
      ariaLabel = _ref2.ariaLabel;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-keyboard-shortcut-help-modal__shortcut-description"
  }, description), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-keyboard-shortcut-help-modal__shortcut-term"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(KeyCombination, {
    keyCombination: keyCombination,
    forceAriaLabel: ariaLabel
  }), aliases.map(function (alias, index) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(KeyCombination, {
      keyCombination: alias,
      forceAriaLabel: ariaLabel,
      key: index
    });
  })));
}

/* harmony default export */ __webpack_exports__["default"] = (Shortcut);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcuts/index.js":
/*!***********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcuts/index.js ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/keyboard-shortcuts */ "@wordpress/keyboard-shortcuts");
/* harmony import */ var _wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/**
 * WordPress dependencies
 */





function KeyboardShortcuts() {
  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useSelect"])(function (select) {
    var settings = select('core/editor').getEditorSettings();
    return {
      getBlockSelectionStart: select('core/block-editor').getBlockSelectionStart,
      getEditorMode: select('core/edit-post').getEditorMode,
      isEditorSidebarOpened: select('core/edit-post').isEditorSidebarOpened,
      richEditingEnabled: settings.richEditingEnabled,
      codeEditingEnabled: settings.codeEditingEnabled
    };
  }),
      getBlockSelectionStart = _useSelect.getBlockSelectionStart,
      getEditorMode = _useSelect.getEditorMode,
      isEditorSidebarOpened = _useSelect.isEditorSidebarOpened,
      richEditingEnabled = _useSelect.richEditingEnabled,
      codeEditingEnabled = _useSelect.codeEditingEnabled;

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useDispatch"])('core/edit-post'),
      switchEditorMode = _useDispatch.switchEditorMode,
      openGeneralSidebar = _useDispatch.openGeneralSidebar,
      closeGeneralSidebar = _useDispatch.closeGeneralSidebar;

  var _useDispatch2 = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useDispatch"])('core/keyboard-shortcuts'),
      registerShortcut = _useDispatch2.registerShortcut;

  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useEffect"])(function () {
    registerShortcut({
      name: 'core/edit-post/toggle-mode',
      category: 'global',
      description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Switch between Visual editor and Code editor.'),
      keyCombination: {
        modifier: 'secondary',
        character: 'm'
      }
    });
    registerShortcut({
      name: 'core/edit-post/toggle-block-navigation',
      category: 'global',
      description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Open the block navigation menu.'),
      keyCombination: {
        modifier: 'access',
        character: 'o'
      }
    });
    registerShortcut({
      name: 'core/edit-post/toggle-sidebar',
      category: 'global',
      description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Show or hide the settings sidebar.'),
      keyCombination: {
        modifier: 'primaryShift',
        character: ','
      }
    });
    registerShortcut({
      name: 'core/edit-post/next-region',
      category: 'global',
      description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Navigate to the next part of the editor.'),
      keyCombination: {
        modifier: 'ctrl',
        character: '`'
      },
      aliases: [{
        modifier: 'access',
        character: 'n'
      }]
    });
    registerShortcut({
      name: 'core/edit-post/previous-region',
      category: 'global',
      description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Navigate to the previous part of the editor.'),
      keyCombination: {
        modifier: 'ctrlShift',
        character: '`'
      },
      aliases: [{
        modifier: 'access',
        character: 'p'
      }]
    });
    registerShortcut({
      name: 'core/edit-post/keyboard-shortcuts',
      category: 'main',
      description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Display these keyboard shortcuts.'),
      keyCombination: {
        modifier: 'access',
        character: 'h'
      }
    });
  }, []);
  Object(_wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_2__["useShortcut"])('core/edit-post/toggle-mode', function () {
    switchEditorMode(getEditorMode() === 'visual' ? 'text' : 'visual');
  }, {
    bindGlobal: true,
    isDisabled: !richEditingEnabled || !codeEditingEnabled
  });
  Object(_wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_2__["useShortcut"])('core/edit-post/toggle-sidebar', function (event) {
    // This shortcut has no known clashes, but use preventDefault to prevent any
    // obscure shortcuts from triggering.
    event.preventDefault();

    if (isEditorSidebarOpened()) {
      closeGeneralSidebar();
    } else {
      var sidebarToOpen = getBlockSelectionStart() ? 'edit-post/block' : 'edit-post/document';
      openGeneralSidebar(sidebarToOpen);
    }
  }, {
    bindGlobal: true
  });
  return null;
}

/* harmony default export */ __webpack_exports__["default"] = (KeyboardShortcuts);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/layout/index.js":
/*!***********************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/layout/index.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _text_editor__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../text-editor */ "./node_modules/@wordpress/edit-post/build-module/components/text-editor/index.js");
/* harmony import */ var _visual_editor__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../visual-editor */ "./node_modules/@wordpress/edit-post/build-module/components/visual-editor/index.js");
/* harmony import */ var _keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../keyboard-shortcuts */ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcuts/index.js");
/* harmony import */ var _keyboard_shortcut_help_modal__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../keyboard-shortcut-help-modal */ "./node_modules/@wordpress/edit-post/build-module/components/keyboard-shortcut-help-modal/index.js");
/* harmony import */ var _manage_blocks_modal__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../manage-blocks-modal */ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/index.js");
/* harmony import */ var _options_modal__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ../options-modal */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/index.js");
/* harmony import */ var _fullscreen_mode__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ../fullscreen-mode */ "./node_modules/@wordpress/edit-post/build-module/components/fullscreen-mode/index.js");
/* harmony import */ var _browser_url__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ../browser-url */ "./node_modules/@wordpress/edit-post/build-module/components/browser-url/index.js");
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ../header */ "./node_modules/@wordpress/edit-post/build-module/components/header/index.js");
/* harmony import */ var _sidebar_settings_sidebar__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ../sidebar/settings-sidebar */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/settings-sidebar/index.js");
/* harmony import */ var _sidebar__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ../sidebar */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/index.js");
/* harmony import */ var _meta_boxes__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ../meta-boxes */ "./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/index.js");
/* harmony import */ var _sidebar_plugin_post_publish_panel__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ../sidebar/plugin-post-publish-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-publish-panel/index.js");
/* harmony import */ var _sidebar_plugin_pre_publish_panel__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ../sidebar/plugin-pre-publish-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-pre-publish-panel/index.js");
/* harmony import */ var _welcome_guide__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! ../welcome-guide */ "./node_modules/@wordpress/edit-post/build-module/components/welcome-guide/index.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */








/**
 * Internal dependencies
 */

















function Layout() {
  var isMobileViewport = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_6__["useViewportMatch"])('small', '<');

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["useDispatch"])('core/edit-post'),
      closePublishSidebar = _useDispatch.closePublishSidebar,
      openGeneralSidebar = _useDispatch.openGeneralSidebar,
      togglePublishSidebar = _useDispatch.togglePublishSidebar;

  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["useSelect"])(function (select) {
    return {
      hasFixedToolbar: select('core/edit-post').isFeatureActive('fixedToolbar'),
      editorSidebarOpened: select('core/edit-post').isEditorSidebarOpened(),
      pluginSidebarOpened: select('core/edit-post').isPluginSidebarOpened(),
      publishSidebarOpened: select('core/edit-post').isPublishSidebarOpened(),
      mode: select('core/edit-post').getEditorMode(),
      isRichEditingEnabled: select('core/editor').getEditorSettings().richEditingEnabled,
      hasActiveMetaboxes: select('core/edit-post').hasMetaBoxes(),
      isSaving: select('core/edit-post').isSavingMetaBoxes(),
      previousShortcut: select('core/keyboard-shortcuts').getAllShortcutRawKeyCombinations('core/edit-post/previous-region'),
      nextShortcut: select('core/keyboard-shortcuts').getAllShortcutRawKeyCombinations('core/edit-post/next-region'),
      hasBlockSelected: select('core/block-editor').getBlockSelectionStart()
    };
  }, []),
      mode = _useSelect.mode,
      isRichEditingEnabled = _useSelect.isRichEditingEnabled,
      editorSidebarOpened = _useSelect.editorSidebarOpened,
      pluginSidebarOpened = _useSelect.pluginSidebarOpened,
      publishSidebarOpened = _useSelect.publishSidebarOpened,
      hasActiveMetaboxes = _useSelect.hasActiveMetaboxes,
      isSaving = _useSelect.isSaving,
      hasFixedToolbar = _useSelect.hasFixedToolbar,
      previousShortcut = _useSelect.previousShortcut,
      nextShortcut = _useSelect.nextShortcut,
      hasBlockSelected = _useSelect.hasBlockSelected;

  var showPageTemplatePicker = Object(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["__experimentalUsePageTemplatePickerVisible"])();

  var sidebarIsOpened = editorSidebarOpened || pluginSidebarOpened || publishSidebarOpened;
  var className = classnames__WEBPACK_IMPORTED_MODULE_1___default()('edit-post-layout', 'is-mode-' + mode, {
    'is-sidebar-opened': sidebarIsOpened,
    'has-fixed-toolbar': hasFixedToolbar,
    'has-metaboxes': hasActiveMetaboxes
  });

  var openSidebarPanel = function openSidebarPanel() {
    return openGeneralSidebar(hasBlockSelected ? 'edit-post/block' : 'edit-post/document');
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_fullscreen_mode__WEBPACK_IMPORTED_MODULE_15__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_browser_url__WEBPACK_IMPORTED_MODULE_16__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["UnsavedChangesWarning"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["AutosaveMonitor"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["LocalAutosaveMonitor"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_11__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["EditorKeyboardShortcutsRegister"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["FocusReturnProvider"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["__experimentalEditorSkeleton"], {
    className: className,
    header: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_header__WEBPACK_IMPORTED_MODULE_17__["default"], null),
    sidebar: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, !sidebarIsOpened && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "edit-post-layout__toogle-sidebar-panel"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      isSecondary: true,
      className: "edit-post-layout__toogle-sidebar-panel-button",
      onClick: openSidebarPanel,
      "aria-expanded": false
    }, hasBlockSelected ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Open block settings') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Open document settings'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_sidebar_settings_sidebar__WEBPACK_IMPORTED_MODULE_18__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_sidebar__WEBPACK_IMPORTED_MODULE_19__["default"].Slot, null)),
    content: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["EditorNotices"], null), (mode === 'text' || !isRichEditingEnabled) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_text_editor__WEBPACK_IMPORTED_MODULE_9__["default"], null), isRichEditingEnabled && mode === 'visual' && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_visual_editor__WEBPACK_IMPORTED_MODULE_10__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "edit-post-layout__metaboxes"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_meta_boxes__WEBPACK_IMPORTED_MODULE_20__["default"], {
      location: "normal"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_meta_boxes__WEBPACK_IMPORTED_MODULE_20__["default"], {
      location: "advanced"
    })), isMobileViewport && sidebarIsOpened && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ScrollLock"], null)),
    footer: isRichEditingEnabled && mode === 'visual' && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "edit-post-layout__footer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["BlockBreadcrumb"], null)),
    publish: publishSidebarOpened ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostPublishPanel"], {
      onClose: closePublishSidebar,
      forceIsDirty: hasActiveMetaboxes,
      forceIsSaving: isSaving,
      PrePublishExtension: _sidebar_plugin_pre_publish_panel__WEBPACK_IMPORTED_MODULE_22__["default"].Slot,
      PostPublishExtension: _sidebar_plugin_post_publish_panel__WEBPACK_IMPORTED_MODULE_21__["default"].Slot
    }) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "edit-post-layout__toogle-publish-panel"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      isSecondary: true,
      className: "edit-post-layout__toogle-publish-panel-button",
      onClick: togglePublishSidebar,
      "aria-expanded": false
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Open publish panel'))),
    shortcuts: {
      previous: previousShortcut,
      next: nextShortcut
    }
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_manage_blocks_modal__WEBPACK_IMPORTED_MODULE_13__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options_modal__WEBPACK_IMPORTED_MODULE_14__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_keyboard_shortcut_help_modal__WEBPACK_IMPORTED_MODULE_12__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_welcome_guide__WEBPACK_IMPORTED_MODULE_23__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Popover"].Slot, null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_7__["PluginArea"], null), showPageTemplatePicker && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["__experimentalPageTemplatePicker"], null)));
}

/* harmony default export */ __webpack_exports__["default"] = (Layout);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/category.js":
/*!***************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/category.js ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _checklist__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./checklist */ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/checklist.js");
/* harmony import */ var _edit_post_settings__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../edit-post-settings */ "./node_modules/@wordpress/edit-post/build-module/components/edit-post-settings/index.js");



/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





/**
 * Internal dependencies
 */




function BlockManagerCategory(_ref) {
  var instanceId = _ref.instanceId,
      category = _ref.category,
      blockTypes = _ref.blockTypes,
      hiddenBlockTypes = _ref.hiddenBlockTypes,
      toggleVisible = _ref.toggleVisible,
      toggleAllVisible = _ref.toggleAllVisible;
  var settings = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useContext"])(_edit_post_settings__WEBPACK_IMPORTED_MODULE_7__["default"]);
  var allowedBlockTypes = settings.allowedBlockTypes;
  var filteredBlockTypes = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useMemo"])(function () {
    if (allowedBlockTypes === true) {
      return blockTypes;
    }

    return blockTypes.filter(function (_ref2) {
      var name = _ref2.name;
      return Object(lodash__WEBPACK_IMPORTED_MODULE_2__["includes"])(allowedBlockTypes || [], name);
    });
  }, [allowedBlockTypes, blockTypes]);

  if (!filteredBlockTypes.length) {
    return null;
  }

  var checkedBlockNames = lodash__WEBPACK_IMPORTED_MODULE_2__["without"].apply(void 0, [Object(lodash__WEBPACK_IMPORTED_MODULE_2__["map"])(filteredBlockTypes, 'name')].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(hiddenBlockTypes)));
  var titleId = 'edit-post-manage-blocks-modal__category-title-' + instanceId;
  var isAllChecked = checkedBlockNames.length === filteredBlockTypes.length;
  var ariaChecked;

  if (isAllChecked) {
    ariaChecked = 'true';
  } else if (checkedBlockNames.length > 0) {
    ariaChecked = 'mixed';
  } else {
    ariaChecked = 'false';
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    role: "group",
    "aria-labelledby": titleId,
    className: "edit-post-manage-blocks-modal__category"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
    checked: isAllChecked,
    onChange: toggleAllVisible,
    className: "edit-post-manage-blocks-modal__category-title",
    "aria-checked": ariaChecked,
    label: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      id: titleId
    }, category.title)
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_checklist__WEBPACK_IMPORTED_MODULE_6__["default"], {
    blockTypes: filteredBlockTypes,
    value: checkedBlockNames,
    onItemChange: toggleVisible
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])([_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["withInstanceId"], Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withSelect"])(function (select) {
  var _select = select('core/edit-post'),
      getPreference = _select.getPreference;

  return {
    hiddenBlockTypes: getPreference('hiddenBlockTypes')
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withDispatch"])(function (dispatch, ownProps) {
  var _dispatch = dispatch('core/edit-post'),
      showBlockTypes = _dispatch.showBlockTypes,
      hideBlockTypes = _dispatch.hideBlockTypes;

  return {
    toggleVisible: function toggleVisible(blockName, nextIsChecked) {
      if (nextIsChecked) {
        showBlockTypes(blockName);
      } else {
        hideBlockTypes(blockName);
      }
    },
    toggleAllVisible: function toggleAllVisible(nextIsChecked) {
      var blockNames = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["map"])(ownProps.blockTypes, 'name');

      if (nextIsChecked) {
        showBlockTypes(blockNames);
      } else {
        hideBlockTypes(blockNames);
      }
    }
  };
})])(BlockManagerCategory));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/checklist.js":
/*!****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/checklist.js ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




function BlockTypesChecklist(_ref) {
  var blockTypes = _ref.blockTypes,
      value = _ref.value,
      onItemChange = _ref.onItemChange;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("ul", {
    className: "edit-post-manage-blocks-modal__checklist"
  }, blockTypes.map(function (blockType) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("li", {
      key: blockType.name,
      className: "edit-post-manage-blocks-modal__checklist-item"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, blockType.title, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["BlockIcon"], {
        icon: blockType.icon
      })),
      checked: value.includes(blockType.name),
      onChange: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["partial"])(onItemChange, blockType.name)
    }));
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (BlockTypesChecklist);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/index.js":
/*!************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/index.js ***!
  \************************************************************************************************/
/*! exports provided: ManageBlocksModal, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManageBlocksModal", function() { return ManageBlocksModal; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _manager__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./manager */ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/manager.js");


/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */


/**
 * Unique identifier for Manage Blocks modal.
 *
 * @type {string}
 */

var MODAL_NAME = 'edit-post/manage-blocks';
function ManageBlocksModal(_ref) {
  var isActive = _ref.isActive,
      closeModal = _ref.closeModal;

  if (!isActive) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Modal"], {
    className: "edit-post-manage-blocks-modal",
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Block Manager'),
    closeLabel: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Close'),
    onRequestClose: closeModal
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_manager__WEBPACK_IMPORTED_MODULE_5__["default"], null));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withSelect"])(function (select) {
  var _select = select('core/edit-post'),
      isModalActive = _select.isModalActive;

  return {
    isActive: isModalActive(MODAL_NAME)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      closeModal = _dispatch.closeModal;

  return {
    closeModal: closeModal
  };
})])(ManageBlocksModal));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/manager.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/manager.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _category__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./category */ "./node_modules/@wordpress/edit-post/build-module/components/manage-blocks-modal/category.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





/**
 * Internal dependencies
 */



function BlockManager(_ref) {
  var search = _ref.search,
      setState = _ref.setState,
      blockTypes = _ref.blockTypes,
      categories = _ref.categories,
      hasBlockSupport = _ref.hasBlockSupport,
      isMatchingSearchTerm = _ref.isMatchingSearchTerm,
      numberOfHiddenBlocks = _ref.numberOfHiddenBlocks;
  // Filtering occurs here (as opposed to `withSelect`) to avoid wasted
  // wasted renders by consequence of `Array#filter` producing a new
  // value reference on each call.
  blockTypes = blockTypes.filter(function (blockType) {
    return hasBlockSupport(blockType, 'inserter', true) && (!search || isMatchingSearchTerm(blockType, search)) && (!blockType.parent || Object(lodash__WEBPACK_IMPORTED_MODULE_1__["includes"])(blockType.parent, 'core/post-content'));
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-manage-blocks-modal__content"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
    type: "search",
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Search for a block'),
    value: search,
    onChange: function onChange(nextSearch) {
      return setState({
        search: nextSearch
      });
    },
    className: "edit-post-manage-blocks-modal__search"
  }), !!numberOfHiddenBlocks && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-manage-blocks-modal__disabled-blocks-count"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["sprintf"])(Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["_n"])('%1$d block is disabled.', '%1$d blocks are disabled.', numberOfHiddenBlocks), numberOfHiddenBlocks)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    tabIndex: "0",
    role: "region",
    "aria-label": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Available block types'),
    className: "edit-post-manage-blocks-modal__results"
  }, blockTypes.length === 0 && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
    className: "edit-post-manage-blocks-modal__no-results"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('No blocks found.')), categories.map(function (category) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_category__WEBPACK_IMPORTED_MODULE_6__["default"], {
      key: category.slug,
      category: category,
      blockTypes: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["filter"])(blockTypes, {
        category: category.slug
      })
    });
  })));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__["compose"])([Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__["withState"])({
  search: ''
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withSelect"])(function (select) {
  var _select = select('core/blocks'),
      getBlockTypes = _select.getBlockTypes,
      getCategories = _select.getCategories,
      hasBlockSupport = _select.hasBlockSupport,
      isMatchingSearchTerm = _select.isMatchingSearchTerm;

  var _select2 = select('core/edit-post'),
      getPreference = _select2.getPreference;

  var hiddenBlockTypes = getPreference('hiddenBlockTypes');
  var numberOfHiddenBlocks = Object(lodash__WEBPACK_IMPORTED_MODULE_1__["isArray"])(hiddenBlockTypes) && hiddenBlockTypes.length;
  return {
    blockTypes: getBlockTypes(),
    categories: getCategories(),
    hasBlockSupport: hasBlockSupport,
    isMatchingSearchTerm: isMatchingSearchTerm,
    numberOfHiddenBlocks: numberOfHiddenBlocks
  };
})])(BlockManager));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/index.js":
/*!***************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/index.js ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _meta_boxes_area__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./meta-boxes-area */ "./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/meta-boxes-area/index.js");
/* harmony import */ var _meta_box_visibility__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./meta-box-visibility */ "./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/meta-box-visibility.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */




function MetaBoxes(_ref) {
  var location = _ref.location,
      isVisible = _ref.isVisible,
      metaBoxes = _ref.metaBoxes;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(lodash__WEBPACK_IMPORTED_MODULE_1__["map"])(metaBoxes, function (_ref2) {
    var id = _ref2.id;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_meta_box_visibility__WEBPACK_IMPORTED_MODULE_4__["default"], {
      key: id,
      id: id
    });
  }), isVisible && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_meta_boxes_area__WEBPACK_IMPORTED_MODULE_3__["default"], {
    location: location
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withSelect"])(function (select, _ref3) {
  var location = _ref3.location;

  var _select = select('core/edit-post'),
      isMetaBoxLocationVisible = _select.isMetaBoxLocationVisible,
      getMetaBoxesPerLocation = _select.getMetaBoxesPerLocation;

  return {
    metaBoxes: getMetaBoxesPerLocation(location),
    isVisible: isMetaBoxLocationVisible(location)
  };
})(MetaBoxes));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/meta-box-visibility.js":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/meta-box-visibility.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);






/**
 * WordPress dependencies
 */



var MetaBoxVisibility =
/*#__PURE__*/
function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__["default"])(MetaBoxVisibility, _Component);

  function MetaBoxVisibility() {
    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__["default"])(this, MetaBoxVisibility);

    return Object(_babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__["default"])(this, Object(_babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__["default"])(MetaBoxVisibility).apply(this, arguments));
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__["default"])(MetaBoxVisibility, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.updateDOM();
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      if (this.props.isVisible !== prevProps.isVisible) {
        this.updateDOM();
      }
    }
  }, {
    key: "updateDOM",
    value: function updateDOM() {
      var _this$props = this.props,
          id = _this$props.id,
          isVisible = _this$props.isVisible;
      var element = document.getElementById(id);

      if (!element) {
        return;
      }

      if (isVisible) {
        element.classList.remove('is-hidden');
      } else {
        element.classList.add('is-hidden');
      }
    }
  }, {
    key: "render",
    value: function render() {
      return null;
    }
  }]);

  return MetaBoxVisibility;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["Component"]);

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])(function (select, _ref) {
  var id = _ref.id;
  return {
    isVisible: select('core/edit-post').isEditorPanelEnabled("meta-box-".concat(id))
  };
})(MetaBoxVisibility));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/meta-boxes-area/index.js":
/*!*******************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/meta-boxes-area/index.js ***!
  \*******************************************************************************************************/
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
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_9__);








/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





var MetaBoxesArea =
/*#__PURE__*/
function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_5__["default"])(MetaBoxesArea, _Component);

  /**
   * @inheritdoc
   */
  function MetaBoxesArea() {
    var _this;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__["default"])(this, MetaBoxesArea);

    _this = Object(_babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_2__["default"])(this, Object(_babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_3__["default"])(MetaBoxesArea).apply(this, arguments));
    _this.bindContainerNode = _this.bindContainerNode.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_4__["default"])(_this));
    return _this;
  }
  /**
   * @inheritdoc
   */


  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__["default"])(MetaBoxesArea, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.form = document.querySelector('.metabox-location-' + this.props.location);

      if (this.form) {
        this.container.appendChild(this.form);
      }
    }
    /**
     * Get the meta box location form from the original location.
     */

  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      if (this.form) {
        document.querySelector('#metaboxes').appendChild(this.form);
      }
    }
    /**
     * Binds the metabox area container node.
     *
     * @param {Element} node DOM Node.
     */

  }, {
    key: "bindContainerNode",
    value: function bindContainerNode(node) {
      this.container = node;
    }
    /**
     * @inheritdoc
     */

  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          location = _this$props.location,
          isSaving = _this$props.isSaving;
      var classes = classnames__WEBPACK_IMPORTED_MODULE_7___default()('edit-post-meta-boxes-area', "is-".concat(location), {
        'is-loading': isSaving
      });
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: classes
      }, isSaving && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_8__["Spinner"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "edit-post-meta-boxes-area__container",
        ref: this.bindContainerNode
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "edit-post-meta-boxes-area__clear"
      }));
    }
  }]);

  return MetaBoxesArea;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Component"]);

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_9__["withSelect"])(function (select) {
  return {
    isSaving: select('core/edit-post').isSavingMetaBoxes()
  };
})(MetaBoxesArea));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/index.js":
/*!******************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/index.js ***!
  \******************************************************************************************/
/*! exports provided: OptionsModal, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "OptionsModal", function() { return OptionsModal; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _section__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./section */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/section.js");
/* harmony import */ var _options__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./options */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/index.js");
/* harmony import */ var _meta_boxes_section__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./meta-boxes-section */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/meta-boxes-section.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */






/**
 * Internal dependencies
 */




var MODAL_NAME = 'edit-post/options';
function OptionsModal(_ref) {
  var isModalActive = _ref.isModalActive,
      isViewable = _ref.isViewable,
      closeModal = _ref.closeModal;

  if (!isModalActive) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Modal"], {
    className: "edit-post-options-modal",
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Options'),
    closeLabel: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Close'),
    onRequestClose: closeModal
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_section__WEBPACK_IMPORTED_MODULE_7__["default"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('General')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePublishSidebarOption"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Pre-publish checks')
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnableFeature"], {
    feature: "showInserterHelpPanel",
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Inserter help panel')
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_section__WEBPACK_IMPORTED_MODULE_7__["default"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Document panels')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePluginDocumentSettingPanelOption"].Slot, null), isViewable && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePanelOption"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Permalink'),
    panelName: "post-link"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__["PostTaxonomies"], {
    taxonomyWrapper: function taxonomyWrapper(content, taxonomy) {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePanelOption"], {
        label: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(taxonomy, ['labels', 'menu_name']),
        panelName: "taxonomy-panel-".concat(taxonomy.slug)
      });
    }
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__["PostFeaturedImageCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePanelOption"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Featured image'),
    panelName: "featured-image"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__["PostExcerptCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePanelOption"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Excerpt'),
    panelName: "post-excerpt"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__["PostTypeSupportCheck"], {
    supportKeys: ['comments', 'trackbacks']
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePanelOption"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Discussion'),
    panelName: "discussion-panel"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__["PageAttributesCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["EnablePanelOption"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Page attributes'),
    panelName: "page-attributes"
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_meta_boxes_section__WEBPACK_IMPORTED_MODULE_9__["default"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Advanced panels')
  }));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withSelect"])(function (select) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var _select2 = select('core'),
      getPostType = _select2.getPostType;

  var postType = getPostType(getEditedPostAttribute('type'));
  return {
    isModalActive: select('core/edit-post').isModalActive(MODAL_NAME),
    isViewable: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(postType, ['viewable'], false)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withDispatch"])(function (dispatch) {
  return {
    closeModal: function closeModal() {
      return dispatch('core/edit-post').closeModal();
    }
  };
}))(OptionsModal));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/meta-boxes-section.js":
/*!*******************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/meta-boxes-section.js ***!
  \*******************************************************************************************************/
/*! exports provided: MetaBoxesSection, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MetaBoxesSection", function() { return MetaBoxesSection; });
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _section__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./section */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/section.js");
/* harmony import */ var _options__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./options */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/index.js");



/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */



function MetaBoxesSection(_ref) {
  var areCustomFieldsRegistered = _ref.areCustomFieldsRegistered,
      metaBoxes = _ref.metaBoxes,
      sectionProps = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_0__["default"])(_ref, ["areCustomFieldsRegistered", "metaBoxes"]);

  // The 'Custom Fields' meta box is a special case that we handle separately.
  var thirdPartyMetaBoxes = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["filter"])(metaBoxes, function (_ref2) {
    var id = _ref2.id;
    return id !== 'postcustom';
  });

  if (!areCustomFieldsRegistered && thirdPartyMetaBoxes.length === 0) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_section__WEBPACK_IMPORTED_MODULE_5__["default"], sectionProps, areCustomFieldsRegistered && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_6__["EnableCustomFieldsOption"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Custom fields')
  }), Object(lodash__WEBPACK_IMPORTED_MODULE_2__["map"])(thirdPartyMetaBoxes, function (_ref3) {
    var id = _ref3.id,
        title = _ref3.title;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_6__["EnablePanelOption"], {
      key: id,
      label: title,
      panelName: "meta-box-".concat(id)
    });
  }));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withSelect"])(function (select) {
  var _select = select('core/editor'),
      getEditorSettings = _select.getEditorSettings;

  var _select2 = select('core/edit-post'),
      getAllMetaBoxes = _select2.getAllMetaBoxes;

  return {
    // This setting should not live in the block editor's store.
    areCustomFieldsRegistered: getEditorSettings().enableCustomFields !== undefined,
    metaBoxes: getAllMetaBoxes()
  };
})(MetaBoxesSection));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/base.js":
/*!*************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/base.js ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */


function BaseOption(_ref) {
  var label = _ref.label,
      isChecked = _ref.isChecked,
      onChange = _ref.onChange,
      children = _ref.children;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-options-modal__option"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["CheckboxControl"], {
    label: label,
    checked: isChecked,
    onChange: onChange
  }), children);
}

/* harmony default export */ __webpack_exports__["default"] = (BaseOption);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-custom-fields.js":
/*!*****************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-custom-fields.js ***!
  \*****************************************************************************************************************/
/*! exports provided: CustomFieldsConfirmation, EnableCustomFieldsOption, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CustomFieldsConfirmation", function() { return CustomFieldsConfirmation; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "EnableCustomFieldsOption", function() { return EnableCustomFieldsOption; });
/* harmony import */ var _babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/slicedToArray */ "./node_modules/@babel/runtime/helpers/esm/slicedToArray.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _base__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./base */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/base.js");



/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */


function CustomFieldsConfirmation(_ref) {
  var willEnable = _ref.willEnable;

  var _useState = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
      _useState2 = Object(_babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(_useState, 2),
      isReloading = _useState2[0],
      setIsReloading = _useState2[1];

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("p", {
    className: "edit-post-options-modal__custom-fields-confirmation-message"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('A page reload is required for this change. Make sure your content is saved before reloading.')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
    className: "edit-post-options-modal__custom-fields-confirmation-button",
    isSecondary: true,
    isBusy: isReloading,
    disabled: isReloading,
    onClick: function onClick() {
      setIsReloading(true);
      document.getElementById('toggle-custom-fields-form').submit();
    }
  }, willEnable ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Enable & Reload') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Disable & Reload')));
}
function EnableCustomFieldsOption(_ref2) {
  var label = _ref2.label,
      areCustomFieldsEnabled = _ref2.areCustomFieldsEnabled;

  var _useState3 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useState"])(areCustomFieldsEnabled),
      _useState4 = Object(_babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(_useState3, 2),
      isChecked = _useState4[0],
      setIsChecked = _useState4[1];

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_base__WEBPACK_IMPORTED_MODULE_5__["default"], {
    label: label,
    isChecked: isChecked,
    onChange: setIsChecked
  }, isChecked !== areCustomFieldsEnabled && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(CustomFieldsConfirmation, {
    willEnable: isChecked
  }));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withSelect"])(function (select) {
  return {
    areCustomFieldsEnabled: !!select('core/editor').getEditorSettings().enableCustomFields
  };
})(EnableCustomFieldsOption));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-feature.js":
/*!***********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-feature.js ***!
  \***********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _base__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./base */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/base.js");
/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */


/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_0__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["withSelect"])(function (select, _ref) {
  var feature = _ref.feature;
  return {
    isChecked: select('core/edit-post').isFeatureActive(feature)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["withDispatch"])(function (dispatch, _ref2) {
  var feature = _ref2.feature;

  var _dispatch = dispatch('core/edit-post'),
      toggleFeature = _dispatch.toggleFeature;

  return {
    onChange: function onChange() {
      toggleFeature(feature);
    }
  };
}))(_base__WEBPACK_IMPORTED_MODULE_2__["default"]));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-panel.js":
/*!*********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-panel.js ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _base__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./base */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/base.js");
/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */


/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_0__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["withSelect"])(function (select, _ref) {
  var panelName = _ref.panelName;

  var _select = select('core/edit-post'),
      isEditorPanelEnabled = _select.isEditorPanelEnabled,
      isEditorPanelRemoved = _select.isEditorPanelRemoved;

  return {
    isRemoved: isEditorPanelRemoved(panelName),
    isChecked: isEditorPanelEnabled(panelName)
  };
}), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_0__["ifCondition"])(function (_ref2) {
  var isRemoved = _ref2.isRemoved;
  return !isRemoved;
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["withDispatch"])(function (dispatch, _ref3) {
  var panelName = _ref3.panelName;
  return {
    onChange: function onChange() {
      return dispatch('core/edit-post').toggleEditorPanelEnabled(panelName);
    }
  };
}))(_base__WEBPACK_IMPORTED_MODULE_2__["default"]));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-plugin-document-setting-panel.js":
/*!*********************************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-plugin-document-setting-panel.js ***!
  \*********************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/index.js");


/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */



var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["createSlotFill"])('EnablePluginDocumentSettingPanelOption'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

var EnablePluginDocumentSettingPanelOption = function EnablePluginDocumentSettingPanelOption(_ref) {
  var label = _ref.label,
      panelName = _ref.panelName;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fill, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_index__WEBPACK_IMPORTED_MODULE_2__["EnablePanelOption"], {
    label: label,
    panelName: panelName
  }));
};

EnablePluginDocumentSettingPanelOption.Slot = Slot;
/* harmony default export */ __webpack_exports__["default"] = (EnablePluginDocumentSettingPanelOption);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-publish-sidebar.js":
/*!*******************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-publish-sidebar.js ***!
  \*******************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_viewport__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/viewport */ "@wordpress/viewport");
/* harmony import */ var _wordpress_viewport__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_viewport__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _base__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./base */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/base.js");
/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */


/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_0__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["withSelect"])(function (select) {
  return {
    isChecked: select('core/editor').isPublishSidebarEnabled()
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/editor'),
      enablePublishSidebar = _dispatch.enablePublishSidebar,
      disablePublishSidebar = _dispatch.disablePublishSidebar;

  return {
    onChange: function onChange(isEnabled) {
      return isEnabled ? enablePublishSidebar() : disablePublishSidebar();
    }
  };
}), // In < medium viewports we override this option and always show the publish sidebar.
// See the edit-post's header component for the specific logic.
Object(_wordpress_viewport__WEBPACK_IMPORTED_MODULE_2__["ifViewportMatches"])('medium'))(_base__WEBPACK_IMPORTED_MODULE_3__["default"]));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/index.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/index.js ***!
  \**************************************************************************************************/
/*! exports provided: EnableCustomFieldsOption, EnablePanelOption, EnablePluginDocumentSettingPanelOption, EnablePublishSidebarOption, EnableFeature */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _enable_custom_fields__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./enable-custom-fields */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-custom-fields.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "EnableCustomFieldsOption", function() { return _enable_custom_fields__WEBPACK_IMPORTED_MODULE_0__["default"]; });

/* harmony import */ var _enable_panel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./enable-panel */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-panel.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "EnablePanelOption", function() { return _enable_panel__WEBPACK_IMPORTED_MODULE_1__["default"]; });

/* harmony import */ var _enable_plugin_document_setting_panel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./enable-plugin-document-setting-panel */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-plugin-document-setting-panel.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "EnablePluginDocumentSettingPanelOption", function() { return _enable_plugin_document_setting_panel__WEBPACK_IMPORTED_MODULE_2__["default"]; });

/* harmony import */ var _enable_publish_sidebar__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./enable-publish-sidebar */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-publish-sidebar.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "EnablePublishSidebarOption", function() { return _enable_publish_sidebar__WEBPACK_IMPORTED_MODULE_3__["default"]; });

/* harmony import */ var _enable_feature__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./enable-feature */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/enable-feature.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "EnableFeature", function() { return _enable_feature__WEBPACK_IMPORTED_MODULE_4__["default"]; });








/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/section.js":
/*!********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/options-modal/section.js ***!
  \********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


var Section = function Section(_ref) {
  var title = _ref.title,
      children = _ref.children;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("section", {
    className: "edit-post-options-modal__section"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h2", {
    className: "edit-post-options-modal__section-title"
  }, title), children);
};

/* harmony default export */ __webpack_exports__["default"] = (Section);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/discussion-panel/index.js":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/discussion-panel/index.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);


/**
 * WordPress dependencies
 */





/**
 * Module Constants
 */

var PANEL_NAME = 'discussion-panel';

function DiscussionPanel(_ref) {
  var isEnabled = _ref.isEnabled,
      isOpened = _ref.isOpened,
      onTogglePanel = _ref.onTogglePanel;

  if (!isEnabled) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostTypeSupportCheck"], {
    supportKeys: ['comments', 'trackbacks']
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Discussion'),
    opened: isOpened,
    onToggle: onTogglePanel
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostTypeSupportCheck"], {
    supportKeys: "comments"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostComments"], null))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostTypeSupportCheck"], {
    supportKeys: "trackbacks"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostPingbacks"], null)))));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["withSelect"])(function (select) {
  return {
    isEnabled: select('core/edit-post').isEditorPanelEnabled(PANEL_NAME),
    isOpened: select('core/edit-post').isEditorPanelOpened(PANEL_NAME)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["withDispatch"])(function (dispatch) {
  return {
    onTogglePanel: function onTogglePanel() {
      return dispatch('core/edit-post').toggleEditorPanelOpened(PANEL_NAME);
    }
  };
})])(DiscussionPanel));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/featured-image/index.js":
/*!***************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/featured-image/index.js ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */






/**
 * Module Constants
 */

var PANEL_NAME = 'featured-image';

function FeaturedImage(_ref) {
  var isEnabled = _ref.isEnabled,
      isOpened = _ref.isOpened,
      postType = _ref.postType,
      onTogglePanel = _ref.onTogglePanel;

  if (!isEnabled) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__["PostFeaturedImageCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(postType, ['labels', 'featured_image'], Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Featured image')),
    opened: isOpened,
    onToggle: onTogglePanel
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_4__["PostFeaturedImage"], null)));
}

var applyWithSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])(function (select) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var _select2 = select('core'),
      getPostType = _select2.getPostType;

  var _select3 = select('core/edit-post'),
      isEditorPanelEnabled = _select3.isEditorPanelEnabled,
      isEditorPanelOpened = _select3.isEditorPanelOpened;

  return {
    postType: getPostType(getEditedPostAttribute('type')),
    isEnabled: isEditorPanelEnabled(PANEL_NAME),
    isOpened: isEditorPanelOpened(PANEL_NAME)
  };
});
var applyWithDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      toggleEditorPanelOpened = _dispatch.toggleEditorPanelOpened;

  return {
    onTogglePanel: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["partial"])(toggleEditorPanelOpened, PANEL_NAME)
  };
});
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__["compose"])(applyWithSelect, applyWithDispatch)(FeaturedImage));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/index.js":
/*!************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/index.js ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["createSlotFill"])('Sidebar'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;
/**
 * Renders a sidebar with its content.
 *
 * @return {Object} The rendered sidebar.
 */


function Sidebar(_ref) {
  var children = _ref.children,
      className = _ref.className;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('edit-post-sidebar', className)
  }, children);
}

Sidebar = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["withFocusReturn"])({
  onFocusReturn: function onFocusReturn() {
    var button = document.querySelector('.edit-post-header__settings [aria-label="Settings"]');

    if (button) {
      button.focus();
      return false;
    }
  }
})(Sidebar);

function AnimatedSidebarFill(props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fill, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Animate"], {
    type: "slide-in",
    options: {
      origin: 'left'
    }
  }, function () {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Sidebar, props);
  }));
}

var WrappedSidebar = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withSelect"])(function (select, _ref2) {
  var name = _ref2.name;
  return {
    isActive: select('core/edit-post').getActiveGeneralSidebarName() === name
  };
}), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["ifCondition"])(function (_ref3) {
  var isActive = _ref3.isActive;
  return isActive;
}))(AnimatedSidebarFill);
WrappedSidebar.Slot = Slot;
/* harmony default export */ __webpack_exports__["default"] = (WrappedSidebar);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/last-revision/index.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/last-revision/index.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */



function LastRevision() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostLastRevisionCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelBody"], {
    className: "edit-post-last-revision__panel"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostLastRevision"], null)));
}

/* harmony default export */ __webpack_exports__["default"] = (LastRevision);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/page-attributes/index.js":
/*!****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/page-attributes/index.js ***!
  \****************************************************************************************************/
/*! exports provided: PageAttributes, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PageAttributes", function() { return PageAttributes; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */






/**
 * Module Constants
 */

var PANEL_NAME = 'page-attributes';
function PageAttributes(_ref) {
  var isEnabled = _ref.isEnabled,
      isOpened = _ref.isOpened,
      onTogglePanel = _ref.onTogglePanel,
      postType = _ref.postType;

  if (!isEnabled || !postType) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["PageAttributesCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(postType, ['labels', 'attributes'], Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Page attributes')),
    opened: isOpened,
    onToggle: onTogglePanel
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["PageTemplate"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["PageAttributesParent"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["PageAttributesOrder"], null))));
}
var applyWithSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])(function (select) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var _select2 = select('core/edit-post'),
      isEditorPanelEnabled = _select2.isEditorPanelEnabled,
      isEditorPanelOpened = _select2.isEditorPanelOpened;

  var _select3 = select('core'),
      getPostType = _select3.getPostType;

  return {
    isEnabled: isEditorPanelEnabled(PANEL_NAME),
    isOpened: isEditorPanelOpened(PANEL_NAME),
    postType: getPostType(getEditedPostAttribute('type'))
  };
});
var applyWithDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      toggleEditorPanelOpened = _dispatch.toggleEditorPanelOpened;

  return {
    onTogglePanel: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["partial"])(toggleEditorPanelOpened, PANEL_NAME)
  };
});
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])(applyWithSelect, applyWithDispatch)(PageAttributes));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-document-setting-panel/index.js":
/*!******************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-document-setting-panel/index.js ***!
  \******************************************************************************************************************/
/*! exports provided: Fill, Slot, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Fill", function() { return Fill; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Slot", function() { return Slot; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _options_modal_options__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../options-modal/options */ "./node_modules/@wordpress/edit-post/build-module/components/options-modal/options/index.js");


/**
 * Defines as extensibility slot for the Settings sidebar
 */

/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */



var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["createSlotFill"])('PluginDocumentSettingPanel'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;



var PluginDocumentSettingFill = function PluginDocumentSettingFill(_ref) {
  var isEnabled = _ref.isEnabled,
      panelName = _ref.panelName,
      opened = _ref.opened,
      onToggle = _ref.onToggle,
      className = _ref.className,
      title = _ref.title,
      icon = _ref.icon,
      children = _ref.children;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options_modal_options__WEBPACK_IMPORTED_MODULE_5__["EnablePluginDocumentSettingPanelOption"], {
    label: title,
    panelName: panelName
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fill, null, isEnabled && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelBody"], {
    className: className,
    title: title,
    icon: icon,
    opened: opened,
    onToggle: onToggle
  }, children)));
};
/**
 * Renders items below the Status & Availability panel in the Document Sidebar.
 *
 * @param {Object} props Component properties.
 * @param {string} [props.name] The machine-friendly name for the panel.
 * @param {string} [props.className] An optional class name added to the row.
 * @param {string} [props.title] The title of the panel
 * @param {WPBlockTypeIconRender} [props.icon=inherits from the plugin] The [Dashicon](https://developer.wordpress.org/resource/dashicons/) icon slug string, or an SVG WP element, to be rendered when the sidebar is pinned to toolbar.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var el = wp.element.createElement;
 * var __ = wp.i18n.__;
 * var registerPlugin = wp.plugins.registerPlugin;
 * var PluginDocumentSettingPanel = wp.editPost.PluginDocumentSettingPanel;
 *
 * function MyDocumentSettingPlugin() {
 * 	return el(
 * 		PluginDocumentSettingPanel,
 * 		{
 * 			className: 'my-document-setting-plugin',
 * 			title: 'My Panel',
 * 		},
 * 		__( 'My Document Setting Panel' )
 * 	);
 * }
 *
 * registerPlugin( 'my-document-setting-plugin', {
 * 		render: MyDocumentSettingPlugin
 * } );
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * const { registerPlugin } = wp.plugins;
 * const { PluginDocumentSettingPanel } = wp.editPost;
 *
 * const MyDocumentSettingTest = () => (
 * 		<PluginDocumentSettingPanel className="my-document-setting-plugin" title="My Panel">
 *			<p>My Document Setting Panel</p>
 *		</PluginDocumentSettingPanel>
 *	);
 *
 *  registerPlugin( 'document-setting-test', { render: MyDocumentSettingTest } );
 * ```
 *
 * @return {WPComponent} The component to be rendered.
 */


var PluginDocumentSettingPanel = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__["compose"])(Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__["withPluginContext"])(function (context, ownProps) {
  return {
    icon: ownProps.icon || context.icon,
    panelName: "".concat(context.name, "/").concat(ownProps.name)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withSelect"])(function (select, _ref2) {
  var panelName = _ref2.panelName;
  return {
    opened: select('core/edit-post').isEditorPanelOpened(panelName),
    isEnabled: select('core/edit-post').isEditorPanelEnabled(panelName)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withDispatch"])(function (dispatch, _ref3) {
  var panelName = _ref3.panelName;
  return {
    onToggle: function onToggle() {
      return dispatch('core/edit-post').toggleEditorPanelOpened(panelName);
    }
  };
}))(PluginDocumentSettingFill);
PluginDocumentSettingPanel.Slot = Slot;
/* harmony default export */ __webpack_exports__["default"] = (PluginDocumentSettingPanel);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-publish-panel/index.js":
/*!**************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-publish-panel/index.js ***!
  \**************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);


/**
 * WordPress dependencies
 */




var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["createSlotFill"])('PluginPostPublishPanel'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

var PluginPostPublishPanelFill = function PluginPostPublishPanelFill(_ref) {
  var children = _ref.children,
      className = _ref.className,
      title = _ref.title,
      _ref$initialOpen = _ref.initialOpen,
      initialOpen = _ref$initialOpen === void 0 ? false : _ref$initialOpen,
      icon = _ref.icon;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fill, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    className: className,
    initialOpen: initialOpen || !title,
    title: title,
    icon: icon
  }, children));
};
/**
 * Renders provided content to the post-publish panel in the publish flow
 * (side panel that opens after a user publishes the post).
 *
 * @param {Object} props Component properties.
 * @param {string} [props.className] An optional class name added to the panel.
 * @param {string} [props.title] Title displayed at the top of the panel.
 * @param {boolean} [props.initialOpen=false] Whether to have the panel initially opened. When no title is provided it is always opened.
 * @param {WPBlockTypeIconRender} [props.icon=inherits from the plugin] The [Dashicon](https://developer.wordpress.org/resource/dashicons/) icon slug string, or an SVG WP element, to be rendered when the sidebar is pinned to toolbar.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var __ = wp.i18n.__;
 * var PluginPostPublishPanel = wp.editPost.PluginPostPublishPanel;
 *
 * function MyPluginPostPublishPanel() {
 * 	return wp.element.createElement(
 * 		PluginPostPublishPanel,
 * 		{
 * 			className: 'my-plugin-post-publish-panel',
 * 			title: __( 'My panel title' ),
 * 			initialOpen: true,
 * 		},
 * 		__( 'My panel content' )
 * 	);
 * }
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * const { __ } = wp.i18n;
 * const { PluginPostPublishPanel } = wp.editPost;
 *
 * const MyPluginPostPublishPanel = () => (
 * 	<PluginPostPublishPanel
 * 		className="my-plugin-post-publish-panel"
 * 		title={ __( 'My panel title' ) }
 * 		initialOpen={ true }
 * 	>
 *         { __( 'My panel content' ) }
 * 	</PluginPostPublishPanel>
 * );
 * ```
 *
 * @return {WPComponent} The component to be rendered.
 */


var PluginPostPublishPanel = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__["compose"])(Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_2__["withPluginContext"])(function (context, ownProps) {
  return {
    icon: ownProps.icon || context.icon
  };
}))(PluginPostPublishPanelFill);
PluginPostPublishPanel.Slot = Slot;
/* harmony default export */ __webpack_exports__["default"] = (PluginPostPublishPanel);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-status-info/index.js":
/*!************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-status-info/index.js ***!
  \************************************************************************************************************/
/*! exports provided: Fill, Slot, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Fill", function() { return Fill; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Slot", function() { return Slot; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);


/**
 * Defines as extensibility slot for the Status & visibility panel.
 */

/**
 * WordPress dependencies
 */


var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["createSlotFill"])('PluginPostStatusInfo'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;
/**
 * Renders a row in the Status & visibility panel of the Document sidebar.
 * It should be noted that this is named and implemented around the function it serves
 * and not its location, which may change in future iterations.
 *
 * @param {Object} props Component properties.
 * @param {string} [props.className] An optional class name added to the row.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var __ = wp.i18n.__;
 * var PluginPostStatusInfo = wp.editPost.PluginPostStatusInfo;
 *
 * function MyPluginPostStatusInfo() {
 * 	return wp.element.createElement(
 * 		PluginPostStatusInfo,
 * 		{
 * 			className: 'my-plugin-post-status-info',
 * 		},
 * 		__( 'My post status info' )
 * 	)
 * }
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * const { __ } = wp.i18n;
 * const { PluginPostStatusInfo } = wp.editPost;
 *
 * const MyPluginPostStatusInfo = () => (
 * 	<PluginPostStatusInfo
 * 		className="my-plugin-post-status-info"
 * 	>
 * 		{ __( 'My post status info' ) }
 * 	</PluginPostStatusInfo>
 * );
 * ```
 *
 * @return {WPComponent} The component to be rendered.
 */




var PluginPostStatusInfo = function PluginPostStatusInfo(_ref) {
  var children = _ref.children,
      className = _ref.className;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fill, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelRow"], {
    className: className
  }, children));
};

PluginPostStatusInfo.Slot = Slot;
/* harmony default export */ __webpack_exports__["default"] = (PluginPostStatusInfo);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-pre-publish-panel/index.js":
/*!*************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-pre-publish-panel/index.js ***!
  \*************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__);


/**
 * WordPress dependencies
 */




var _createSlotFill = Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["createSlotFill"])('PluginPrePublishPanel'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

var PluginPrePublishPanelFill = function PluginPrePublishPanelFill(_ref) {
  var children = _ref.children,
      className = _ref.className,
      title = _ref.title,
      _ref$initialOpen = _ref.initialOpen,
      initialOpen = _ref$initialOpen === void 0 ? false : _ref$initialOpen,
      icon = _ref.icon;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fill, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelBody"], {
    className: className,
    initialOpen: initialOpen || !title,
    title: title,
    icon: icon
  }, children));
};
/**
 * Renders provided content to the pre-publish side panel in the publish flow
 * (side panel that opens when a user first pushes "Publish" from the main editor).
 *
 * @param {Object}                props                                 Component props.
 * @param {string}                [props.className]                     An optional class name added to the panel.
 * @param {string}                [props.title]                         Title displayed at the top of the panel.
 * @param {boolean}               [props.initialOpen=false]             Whether to have the panel initially opened.
 *                                                                      When no title is provided it is always opened.
 * @param {WPBlockTypeIconRender} [props.icon=inherits from the plugin] The [Dashicon](https://developer.wordpress.org/resource/dashicons/)
 *                                                                      icon slug string, or an SVG WP element, to be rendered when
 *                                                                      the sidebar is pinned to toolbar.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var __ = wp.i18n.__;
 * var PluginPrePublishPanel = wp.editPost.PluginPrePublishPanel;
 *
 * function MyPluginPrePublishPanel() {
 * 	return wp.element.createElement(
 * 		PluginPrePublishPanel,
 * 		{
 * 			className: 'my-plugin-pre-publish-panel',
 * 			title: __( 'My panel title' ),
 * 			initialOpen: true,
 * 		},
 * 		__( 'My panel content' )
 * 	);
 * }
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * const { __ } = wp.i18n;
 * const { PluginPrePublishPanel } = wp.editPost;
 *
 * const MyPluginPrePublishPanel = () => (
 * 	<PluginPrePublishPanel
 * 		className="my-plugin-pre-publish-panel"
 * 		title={ __( 'My panel title' ) }
 * 		initialOpen={ true }
 * 	>
 * 	    { __( 'My panel content' ) }
 * 	</PluginPrePublishPanel>
 * );
 * ```
 *
 * @return {WPComponent} The component to be rendered.
 */


var PluginPrePublishPanel = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__["compose"])(Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__["withPluginContext"])(function (context, ownProps) {
  return {
    icon: ownProps.icon || context.icon
  };
}))(PluginPrePublishPanelFill);
PluginPrePublishPanel.Slot = Slot;
/* harmony default export */ __webpack_exports__["default"] = (PluginPrePublishPanel);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-sidebar/index.js":
/*!***************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-sidebar/index.js ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _header_pinned_plugins__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../header/pinned-plugins */ "./node_modules/@wordpress/edit-post/build-module/components/header/pinned-plugins/index.js");
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../ */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/index.js");
/* harmony import */ var _sidebar_header__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../sidebar-header */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/sidebar-header/index.js");


/**
 * WordPress dependencies
 */





/**
 * Internal dependencies
 */





function PluginSidebar(props) {
  var children = props.children,
      className = props.className,
      icon = props.icon,
      isActive = props.isActive,
      _props$isPinnable = props.isPinnable,
      isPinnable = _props$isPinnable === void 0 ? true : _props$isPinnable,
      isPinned = props.isPinned,
      sidebarName = props.sidebarName,
      title = props.title,
      togglePin = props.togglePin,
      toggleSidebar = props.toggleSidebar;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, isPinnable && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_header_pinned_plugins__WEBPACK_IMPORTED_MODULE_6__["default"], null, isPinned && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Button"], {
    icon: icon,
    label: title,
    onClick: toggleSidebar,
    isPressed: isActive,
    "aria-expanded": isActive
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(___WEBPACK_IMPORTED_MODULE_7__["default"], {
    name: sidebarName
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_sidebar_header__WEBPACK_IMPORTED_MODULE_8__["default"], {
    closeLabel: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Close plugin')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("strong", null, title), isPinnable && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Button"], {
    icon: isPinned ? 'star-filled' : 'star-empty',
    label: isPinned ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Unpin from toolbar') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Pin to toolbar'),
    onClick: togglePin,
    isPressed: isPinned,
    "aria-expanded": isPinned
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Panel"], {
    className: className
  }, children)));
}
/**
 * Renders a sidebar when activated. The contents within the `PluginSidebar` will appear as content within the sidebar.
 * If you wish to display the sidebar, you can with use the `PluginSidebarMoreMenuItem` component or the `wp.data.dispatch` API:
 *
 * ```js
 * wp.data.dispatch( 'core/edit-post' ).openGeneralSidebar( 'plugin-name/sidebar-name' );
 * ```
 *
 * @see PluginSidebarMoreMenuItem
 *
 * @param {Object} props Element props.
 * @param {string} props.name A string identifying the sidebar. Must be unique for every sidebar registered within the scope of your plugin.
 * @param {string} [props.className] An optional class name added to the sidebar body.
 * @param {string} props.title Title displayed at the top of the sidebar.
 * @param {boolean} [props.isPinnable=true] Whether to allow to pin sidebar to toolbar.
 * @param {WPBlockTypeIconRender} [props.icon=inherits from the plugin] The [Dashicon](https://developer.wordpress.org/resource/dashicons/) icon slug string, or an SVG WP element, to be rendered when the sidebar is pinned to toolbar.
 *
 * @example <caption>ES5</caption>
 * ```js
 * // Using ES5 syntax
 * var __ = wp.i18n.__;
 * var el = wp.element.createElement;
 * var PanelBody = wp.components.PanelBody;
 * var PluginSidebar = wp.editPost.PluginSidebar;
 * var moreIcon = wp.element.createElement( 'svg' ); //... svg element.
 *
 * function MyPluginSidebar() {
 * 	return el(
 * 			PluginSidebar,
 * 			{
 * 				name: 'my-sidebar',
 * 				title: 'My sidebar title',
 * 				icon: moreIcon,
 * 			},
 * 			el(
 * 				PanelBody,
 * 				{},
 * 				__( 'My sidebar content' )
 * 			)
 * 	);
 * }
 * ```
 *
 * @example <caption>ESNext</caption>
 * ```jsx
 * // Using ESNext syntax
 * import { __ } from '@wordpress/i18n';
 * import { PanelBody } from '@wordpress/components';
 * import { PluginSidebar } from '@wordpress/edit-post';
 * import { more } from '@wordpress/icons';
 *
 * const MyPluginSidebar = () => (
 * 	<PluginSidebar
 * 		name="my-sidebar"
 * 		title="My sidebar title"
 * 		icon={ more }
 * 	>
 * 		<PanelBody>
 * 			{ __( 'My sidebar content' ) }
 * 		</PanelBody>
 * 	</PluginSidebar>
 * );
 * ```
 *
 * @return {WPComponent} Plugin sidebar component.
 */


/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__["compose"])(Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_4__["withPluginContext"])(function (context, ownProps) {
  return {
    icon: ownProps.icon || context.icon,
    sidebarName: "".concat(context.name, "/").concat(ownProps.name)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withSelect"])(function (select, _ref) {
  var sidebarName = _ref.sidebarName;

  var _select = select('core/edit-post'),
      getActiveGeneralSidebarName = _select.getActiveGeneralSidebarName,
      isPluginItemPinned = _select.isPluginItemPinned;

  return {
    isActive: getActiveGeneralSidebarName() === sidebarName,
    isPinned: isPluginItemPinned(sidebarName)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withDispatch"])(function (dispatch, _ref2) {
  var isActive = _ref2.isActive,
      sidebarName = _ref2.sidebarName;

  var _dispatch = dispatch('core/edit-post'),
      closeGeneralSidebar = _dispatch.closeGeneralSidebar,
      openGeneralSidebar = _dispatch.openGeneralSidebar,
      togglePinnedPluginItem = _dispatch.togglePinnedPluginItem;

  return {
    togglePin: function togglePin() {
      togglePinnedPluginItem(sidebarName);
    },
    toggleSidebar: function toggleSidebar() {
      if (isActive) {
        closeGeneralSidebar();
      } else {
        openGeneralSidebar(sidebarName);
      }
    }
  };
}))(PluginSidebar));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-author/index.js":
/*!************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-author/index.js ***!
  \************************************************************************************************/
/*! exports provided: PostAuthor, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostAuthor", function() { return PostAuthor; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */


function PostAuthor() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostAuthorCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostAuthor"], null)));
}
/* harmony default export */ __webpack_exports__["default"] = (PostAuthor);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-excerpt/index.js":
/*!*************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-excerpt/index.js ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);


/**
 * WordPress dependencies
 */





/**
 * Module Constants
 */

var PANEL_NAME = 'post-excerpt';

function PostExcerpt(_ref) {
  var isEnabled = _ref.isEnabled,
      isOpened = _ref.isOpened,
      onTogglePanel = _ref.onTogglePanel;

  if (!isEnabled) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostExcerptCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Excerpt'),
    opened: isOpened,
    onToggle: onTogglePanel
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostExcerpt"], null)));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["withSelect"])(function (select) {
  return {
    isEnabled: select('core/edit-post').isEditorPanelEnabled(PANEL_NAME),
    isOpened: select('core/edit-post').isEditorPanelOpened(PANEL_NAME)
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["withDispatch"])(function (dispatch) {
  return {
    onTogglePanel: function onTogglePanel() {
      return dispatch('core/edit-post').toggleEditorPanelOpened(PANEL_NAME);
    }
  };
})])(PostExcerpt));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-format/index.js":
/*!************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-format/index.js ***!
  \************************************************************************************************/
/*! exports provided: PostFormat, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostFormat", function() { return PostFormat; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */


function PostFormat() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostFormatCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostFormat"], null)));
}
/* harmony default export */ __webpack_exports__["default"] = (PostFormat);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-link/index.js":
/*!**********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-link/index.js ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_7__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */







/**
 * Module Constants
 */

var PANEL_NAME = 'post-link';

function PostLink(_ref) {
  var isOpened = _ref.isOpened,
      onTogglePanel = _ref.onTogglePanel,
      isEditable = _ref.isEditable,
      postLink = _ref.postLink,
      permalinkParts = _ref.permalinkParts,
      editPermalink = _ref.editPermalink,
      forceEmptyField = _ref.forceEmptyField,
      setState = _ref.setState,
      postTitle = _ref.postTitle,
      postSlug = _ref.postSlug,
      postID = _ref.postID,
      postTypeLabel = _ref.postTypeLabel;
  var prefix = permalinkParts.prefix,
      suffix = permalinkParts.suffix;
  var prefixElement, postNameElement, suffixElement;
  var currentSlug = Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_7__["safeDecodeURIComponent"])(postSlug) || Object(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__["cleanForSlug"])(postTitle) || postID;

  if (isEditable) {
    prefixElement = prefix && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "edit-post-post-link__link-prefix"
    }, prefix);
    postNameElement = currentSlug && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "edit-post-post-link__link-post-name"
    }, currentSlug);
    suffixElement = suffix && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "edit-post-post-link__link-suffix"
    }, suffix);
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Permalink'),
    opened: isOpened,
    onToggle: onTogglePanel
  }, isEditable && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "editor-post-link"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('URL Slug'),
    value: forceEmptyField ? '' : currentSlug,
    onChange: function onChange(newValue) {
      editPermalink(newValue); // When we delete the field the permalink gets
      // reverted to the original value.
      // The forceEmptyField logic allows the user to have
      // the field temporarily empty while typing.

      if (!newValue) {
        if (!forceEmptyField) {
          setState({
            forceEmptyField: true
          });
        }

        return;
      }

      if (forceEmptyField) {
        setState({
          forceEmptyField: false
        });
      }
    },
    onBlur: function onBlur(event) {
      editPermalink(Object(_wordpress_editor__WEBPACK_IMPORTED_MODULE_6__["cleanForSlug"])(event.target.value));

      if (forceEmptyField) {
        setState({
          forceEmptyField: false
        });
      }
    }
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('The last part of the URL.'), ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ExternalLink"], {
    href: "https://wordpress.org/support/article/writing-posts/#post-field-descriptions"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Read about permalinks')))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
    className: "edit-post-post-link__preview-label"
  }, postTypeLabel || Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('View post')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-post-link__preview-link-container"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ExternalLink"], {
    className: "edit-post-post-link__link",
    href: postLink,
    target: "_blank"
  }, isEditable ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, prefixElement, postNameElement, suffixElement) : postLink)));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withSelect"])(function (select) {
  var _select = select('core/editor'),
      isEditedPostNew = _select.isEditedPostNew,
      isPermalinkEditable = _select.isPermalinkEditable,
      getCurrentPost = _select.getCurrentPost,
      isCurrentPostPublished = _select.isCurrentPostPublished,
      getPermalinkParts = _select.getPermalinkParts,
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var _select2 = select('core/edit-post'),
      isEditorPanelEnabled = _select2.isEditorPanelEnabled,
      isEditorPanelOpened = _select2.isEditorPanelOpened;

  var _select3 = select('core'),
      getPostType = _select3.getPostType;

  var _getCurrentPost = getCurrentPost(),
      link = _getCurrentPost.link,
      id = _getCurrentPost.id;

  var postTypeName = getEditedPostAttribute('type');
  var postType = getPostType(postTypeName);
  return {
    isNew: isEditedPostNew(),
    postLink: link,
    isEditable: isPermalinkEditable(),
    isPublished: isCurrentPostPublished(),
    isOpened: isEditorPanelOpened(PANEL_NAME),
    permalinkParts: getPermalinkParts(),
    isEnabled: isEditorPanelEnabled(PANEL_NAME),
    isViewable: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(postType, ['viewable'], false),
    postTitle: getEditedPostAttribute('title'),
    postSlug: getEditedPostAttribute('slug'),
    postID: id,
    postTypeLabel: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(postType, ['labels', 'view_item'])
  };
}), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__["ifCondition"])(function (_ref2) {
  var isEnabled = _ref2.isEnabled,
      isNew = _ref2.isNew,
      postLink = _ref2.postLink,
      isViewable = _ref2.isViewable,
      permalinkParts = _ref2.permalinkParts;
  return isEnabled && !isNew && postLink && isViewable && permalinkParts;
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      toggleEditorPanelOpened = _dispatch.toggleEditorPanelOpened;

  var _dispatch2 = dispatch('core/editor'),
      editPost = _dispatch2.editPost;

  return {
    onTogglePanel: function onTogglePanel() {
      return toggleEditorPanelOpened(PANEL_NAME);
    },
    editPermalink: function editPermalink(newSlug) {
      editPost({
        slug: newSlug
      });
    }
  };
}), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_5__["withState"])({
  forceEmptyField: false
})])(PostLink));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-pending-status/index.js":
/*!********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-pending-status/index.js ***!
  \********************************************************************************************************/
/*! exports provided: PostPendingStatus, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostPendingStatus", function() { return PostPendingStatus; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */


function PostPendingStatus() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostPendingStatusCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostPendingStatus"], null)));
}
/* harmony default export */ __webpack_exports__["default"] = (PostPendingStatus);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-schedule/index.js":
/*!**************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-schedule/index.js ***!
  \**************************************************************************************************/
/*! exports provided: PostSchedule, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostSchedule", function() { return PostSchedule; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);


/**
 * WordPress dependencies
 */



function PostSchedule() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostScheduleCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], {
    className: "edit-post-post-schedule"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Publish')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Dropdown"], {
    position: "bottom left",
    contentClassName: "edit-post-post-schedule__dialog",
    renderToggle: function renderToggle(_ref) {
      var onToggle = _ref.onToggle,
          isOpen = _ref.isOpen;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
        className: "edit-post-post-schedule__toggle",
        onClick: onToggle,
        "aria-expanded": isOpen,
        isLink: true
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostScheduleLabel"], null)));
    },
    renderContent: function renderContent() {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostSchedule"], null);
    }
  })));
}
/* harmony default export */ __webpack_exports__["default"] = (PostSchedule);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-slug/index.js":
/*!**********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-slug/index.js ***!
  \**********************************************************************************************/
/*! exports provided: PostSlug, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostSlug", function() { return PostSlug; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */


function PostSlug() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostSlugCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostSlug"], null)));
}
/* harmony default export */ __webpack_exports__["default"] = (PostSlug);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-status/index.js":
/*!************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-status/index.js ***!
  \************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _post_visibility__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../post-visibility */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-visibility/index.js");
/* harmony import */ var _post_trash__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../post-trash */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-trash/index.js");
/* harmony import */ var _post_schedule__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../post-schedule */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-schedule/index.js");
/* harmony import */ var _post_sticky__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../post-sticky */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-sticky/index.js");
/* harmony import */ var _post_author__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../post-author */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-author/index.js");
/* harmony import */ var _post_slug__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../post-slug */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-slug/index.js");
/* harmony import */ var _post_format__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../post-format */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-format/index.js");
/* harmony import */ var _post_pending_status__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../post-pending-status */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-pending-status/index.js");
/* harmony import */ var _plugin_post_status_info__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../plugin-post-status-info */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-status-info/index.js");


/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */










/**
 * Module Constants
 */

var PANEL_NAME = 'post-status';

function PostStatus(_ref) {
  var isOpened = _ref.isOpened,
      onTogglePanel = _ref.onTogglePanel;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
    className: "edit-post-post-status",
    title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Status & visibility'),
    opened: isOpened,
    onToggle: onTogglePanel
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_plugin_post_status_info__WEBPACK_IMPORTED_MODULE_13__["default"].Slot, null, function (fills) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_visibility__WEBPACK_IMPORTED_MODULE_5__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_schedule__WEBPACK_IMPORTED_MODULE_7__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_format__WEBPACK_IMPORTED_MODULE_11__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_sticky__WEBPACK_IMPORTED_MODULE_8__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_pending_status__WEBPACK_IMPORTED_MODULE_12__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_slug__WEBPACK_IMPORTED_MODULE_10__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_author__WEBPACK_IMPORTED_MODULE_9__["default"], null), fills, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_trash__WEBPACK_IMPORTED_MODULE_6__["default"], null));
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withSelect"])(function (select) {
  // We use isEditorPanelRemoved to hide the panel if it was programatically removed. We do
  // not use isEditorPanelEnabled since this panel should not be disabled through the UI.
  var _select = select('core/edit-post'),
      isEditorPanelRemoved = _select.isEditorPanelRemoved,
      isEditorPanelOpened = _select.isEditorPanelOpened;

  return {
    isRemoved: isEditorPanelRemoved(PANEL_NAME),
    isOpened: isEditorPanelOpened(PANEL_NAME)
  };
}), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["ifCondition"])(function (_ref2) {
  var isRemoved = _ref2.isRemoved;
  return !isRemoved;
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withDispatch"])(function (dispatch) {
  return {
    onTogglePanel: function onTogglePanel() {
      return dispatch('core/edit-post').toggleEditorPanelOpened(PANEL_NAME);
    }
  };
})])(PostStatus));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-sticky/index.js":
/*!************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-sticky/index.js ***!
  \************************************************************************************************/
/*! exports provided: PostSticky, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostSticky", function() { return PostSticky; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */


function PostSticky() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostStickyCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostSticky"], null)));
}
/* harmony default export */ __webpack_exports__["default"] = (PostSticky);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-taxonomies/index.js":
/*!****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-taxonomies/index.js ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _taxonomy_panel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./taxonomy-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-taxonomies/taxonomy-panel.js");


/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */



function PostTaxonomies() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["PostTaxonomiesCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["PostTaxonomies"], {
    taxonomyWrapper: function taxonomyWrapper(content, taxonomy) {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_taxonomy_panel__WEBPACK_IMPORTED_MODULE_2__["default"], {
        taxonomy: taxonomy
      }, content);
    }
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (PostTaxonomies);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-taxonomies/taxonomy-panel.js":
/*!*************************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-taxonomies/taxonomy-panel.js ***!
  \*************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





function TaxonomyPanel(_ref) {
  var isEnabled = _ref.isEnabled,
      taxonomy = _ref.taxonomy,
      isOpened = _ref.isOpened,
      onTogglePanel = _ref.onTogglePanel,
      children = _ref.children;

  if (!isEnabled) {
    return null;
  }

  var taxonomyMenuName = Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(taxonomy, ['labels', 'menu_name']);

  if (!taxonomyMenuName) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
    title: taxonomyMenuName,
    opened: isOpened,
    onToggle: onTogglePanel
  }, children);
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withSelect"])(function (select, ownProps) {
  var slug = Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(ownProps.taxonomy, ['slug']);
  var panelName = slug ? "taxonomy-panel-".concat(slug) : '';
  return {
    panelName: panelName,
    isEnabled: slug ? select('core/edit-post').isEditorPanelEnabled(panelName) : false,
    isOpened: slug ? select('core/edit-post').isEditorPanelOpened(panelName) : false
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withDispatch"])(function (dispatch, ownProps) {
  return {
    onTogglePanel: function onTogglePanel() {
      dispatch('core/edit-post').toggleEditorPanelOpened(ownProps.panelName);
    }
  };
}))(TaxonomyPanel));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-trash/index.js":
/*!***********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-trash/index.js ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return PostTrash; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */


function PostTrash() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostTrashCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["PostTrash"], null)));
}


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-visibility/index.js":
/*!****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-visibility/index.js ***!
  \****************************************************************************************************/
/*! exports provided: PostVisibility, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostVisibility", function() { return PostVisibility; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);


/**
 * WordPress dependencies
 */



function PostVisibility() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostVisibilityCheck"], {
    render: function render(_ref) {
      var canEdit = _ref.canEdit;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], {
        className: "edit-post-post-visibility"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Visibility')), !canEdit && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostVisibilityLabel"], null)), canEdit && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Dropdown"], {
        position: "bottom left",
        contentClassName: "edit-post-post-visibility__dialog",
        renderToggle: function renderToggle(_ref2) {
          var isOpen = _ref2.isOpen,
              onToggle = _ref2.onToggle;
          return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
            "aria-expanded": isOpen,
            className: "edit-post-post-visibility__toggle",
            onClick: onToggle,
            isLink: true
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostVisibilityLabel"], null));
        },
        renderContent: function renderContent() {
          return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["PostVisibility"], null);
        }
      }));
    }
  });
}
/* harmony default export */ __webpack_exports__["default"] = (PostVisibility);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/settings-header/index.js":
/*!****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/settings-header/index.js ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/slicedToArray */ "./node_modules/@babel/runtime/helpers/esm/slicedToArray.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _sidebar_header__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../sidebar-header */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/sidebar-header/index.js");



/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */



var SettingsHeader = function SettingsHeader(_ref) {
  var openDocumentSettings = _ref.openDocumentSettings,
      openBlockSettings = _ref.openBlockSettings,
      sidebarName = _ref.sidebarName;

  var blockLabel = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Block');

  var _ref2 = sidebarName === 'edit-post/document' ? // translators: ARIA label for the Document sidebar tab, selected.
  [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Document (selected)'), 'is-active'] : // translators: ARIA label for the Document sidebar tab, not selected.
  [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Document'), ''],
      _ref3 = Object(_babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(_ref2, 2),
      documentAriaLabel = _ref3[0],
      documentActiveClass = _ref3[1];

  var _ref4 = sidebarName === 'edit-post/block' ? // translators: ARIA label for the Settings Sidebar tab, selected.
  [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Block (selected)'), 'is-active'] : // translators: ARIA label for the Settings Sidebar tab, not selected.
  [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Block'), ''],
      _ref5 = Object(_babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(_ref4, 2),
      blockAriaLabel = _ref5[0],
      blockActiveClass = _ref5[1];

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_sidebar_header__WEBPACK_IMPORTED_MODULE_5__["default"], {
    className: "edit-post-sidebar__panel-tabs",
    closeLabel: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Close settings')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("ul", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
    onClick: openDocumentSettings,
    className: "edit-post-sidebar__panel-tab ".concat(documentActiveClass),
    "aria-label": documentAriaLabel,
    "data-label": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Document')
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Document'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("li", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
    onClick: openBlockSettings,
    className: "edit-post-sidebar__panel-tab ".concat(blockActiveClass),
    "aria-label": blockAriaLabel,
    "data-label": blockLabel
  }, blockLabel))));
};

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      openGeneralSidebar = _dispatch.openGeneralSidebar;

  return {
    openDocumentSettings: function openDocumentSettings() {
      openGeneralSidebar('edit-post/document');
    },
    openBlockSettings: function openBlockSettings() {
      openGeneralSidebar('edit-post/block');
    }
  };
})(SettingsHeader));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/settings-sidebar/index.js":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/settings-sidebar/index.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../ */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/index.js");
/* harmony import */ var _settings_header__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../settings-header */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/settings-header/index.js");
/* harmony import */ var _post_status__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../post-status */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-status/index.js");
/* harmony import */ var _last_revision__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../last-revision */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/last-revision/index.js");
/* harmony import */ var _post_taxonomies__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../post-taxonomies */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-taxonomies/index.js");
/* harmony import */ var _featured_image__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../featured-image */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/featured-image/index.js");
/* harmony import */ var _post_excerpt__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../post-excerpt */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-excerpt/index.js");
/* harmony import */ var _post_link__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../post-link */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/post-link/index.js");
/* harmony import */ var _discussion_panel__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../discussion-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/discussion-panel/index.js");
/* harmony import */ var _page_attributes__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ../page-attributes */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/page-attributes/index.js");
/* harmony import */ var _meta_boxes__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ../../meta-boxes */ "./node_modules/@wordpress/edit-post/build-module/components/meta-boxes/index.js");
/* harmony import */ var _plugin_document_setting_panel__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ../plugin-document-setting-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-document-setting-panel/index.js");


/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */














var SettingsSidebar = function SettingsSidebar(_ref) {
  var sidebarName = _ref.sidebarName;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(___WEBPACK_IMPORTED_MODULE_5__["default"], {
    name: sidebarName
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_settings_header__WEBPACK_IMPORTED_MODULE_6__["default"], {
    sidebarName: sidebarName
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["Panel"], null, sidebarName === 'edit-post/document' && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_status__WEBPACK_IMPORTED_MODULE_7__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_plugin_document_setting_panel__WEBPACK_IMPORTED_MODULE_16__["default"].Slot, null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_last_revision__WEBPACK_IMPORTED_MODULE_8__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_link__WEBPACK_IMPORTED_MODULE_12__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_taxonomies__WEBPACK_IMPORTED_MODULE_9__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_featured_image__WEBPACK_IMPORTED_MODULE_10__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_post_excerpt__WEBPACK_IMPORTED_MODULE_11__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_discussion_panel__WEBPACK_IMPORTED_MODULE_13__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_page_attributes__WEBPACK_IMPORTED_MODULE_14__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_meta_boxes__WEBPACK_IMPORTED_MODULE_15__["default"], {
    location: "side"
  })), sidebarName === 'edit-post/block' && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["BlockInspector"], null)));
};

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withSelect"])(function (select) {
  var _select = select('core/edit-post'),
      getActiveGeneralSidebarName = _select.getActiveGeneralSidebarName,
      isEditorSidebarOpened = _select.isEditorSidebarOpened;

  return {
    isEditorSidebarOpened: isEditorSidebarOpened(),
    sidebarName: getActiveGeneralSidebarName()
  };
}), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_2__["ifCondition"])(function (_ref2) {
  var isEditorSidebarOpened = _ref2.isEditorSidebarOpened;
  return isEditorSidebarOpened;
}))(SettingsSidebar));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/sidebar-header/index.js":
/*!***************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/sidebar/sidebar-header/index.js ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/index.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */






var SidebarHeader = function SidebarHeader(_ref) {
  var children = _ref.children,
      className = _ref.className,
      closeLabel = _ref.closeLabel;

  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useSelect"])(function (select) {
    return {
      shortcut: select('core/keyboard-shortcuts').getShortcutRepresentation('core/edit-post/toggle-sidebar'),
      title: select('core/editor').getEditedPostAttribute('title')
    };
  }, []),
      shortcut = _useSelect.shortcut,
      title = _useSelect.title;

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useDispatch"])('core/edit-post'),
      closeGeneralSidebar = _useDispatch.closeGeneralSidebar; // The `tabIndex` serves the purpose of normalizing browser behavior of
  // button clicks and focus. Notably, without making the header focusable, a
  // Button click would not trigger a focus event in macOS Firefox. Thus, when
  // the sidebar is unmounted, the corresponding "focus return" behavior to
  // shift focus back to the heading toolbar would not be run.
  //
  // See: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button#Clicking_and_focus


  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "components-panel__header edit-post-sidebar-header__small"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "edit-post-sidebar-header__title"
  }, title || Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('(no title)')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
    onClick: closeGeneralSidebar,
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_5__["close"],
    label: closeLabel
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('components-panel__header edit-post-sidebar-header', className),
    tabIndex: -1
  }, children, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
    onClick: closeGeneralSidebar,
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_5__["close"],
    label: closeLabel,
    shortcut: shortcut
  })));
};

/* harmony default export */ __webpack_exports__["default"] = (SidebarHeader);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/text-editor/index.js":
/*!****************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/text-editor/index.js ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/keycodes */ "@wordpress/keycodes");
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keycodes__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/index.js");


/**
 * WordPress dependencies
 */








function TextEditor(_ref) {
  var onExit = _ref.onExit,
      isRichEditingEnabled = _ref.isRichEditingEnabled;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-text-editor"
  }, isRichEditingEnabled && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-text-editor__toolbar"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h2", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Editing Code')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
    onClick: onExit,
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_7__["close"],
    shortcut: _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_5__["displayShortcut"].secondary('m')
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__["__"])('Exit Code Editor')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["TextEditorGlobalKeyboardShortcuts"], null)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "edit-post-text-editor__body"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["PostTitle"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["PostTextEditor"], null)));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_6__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withSelect"])(function (select) {
  return {
    isRichEditingEnabled: select('core/editor').getEditorSettings().richEditingEnabled
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["withDispatch"])(function (dispatch) {
  return {
    onExit: function onExit() {
      dispatch('core/edit-post').switchEditorMode('visual');
    }
  };
}))(TextEditor));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/visual-editor/block-inspector-button.js":
/*!***********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/visual-editor/block-inspector-button.js ***!
  \***********************************************************************************************************/
/*! exports provided: BlockInspectorButton, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BlockInspectorButton", function() { return BlockInspectorButton; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/index.js");


/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





function BlockInspectorButton(_ref) {
  var _ref$onClick = _ref.onClick,
      _onClick = _ref$onClick === void 0 ? lodash__WEBPACK_IMPORTED_MODULE_1__["noop"] : _ref$onClick,
      _ref$small = _ref.small,
      small = _ref$small === void 0 ? false : _ref$small,
      speak = _ref.speak;

  var _useSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useSelect"])(function (select) {
    return {
      shortcut: select('core/keyboard-shortcuts').getShortcutRepresentation('core/edit-post/toggle-sidebar'),
      areAdvancedSettingsOpened: select('core/edit-post').getActiveGeneralSidebarName() === 'edit-post/block'
    };
  }, []),
      shortcut = _useSelect.shortcut,
      areAdvancedSettingsOpened = _useSelect.areAdvancedSettingsOpened;

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useDispatch"])('core/edit-post'),
      openGeneralSidebar = _useDispatch.openGeneralSidebar,
      closeGeneralSidebar = _useDispatch.closeGeneralSidebar;

  var speakMessage = function speakMessage() {
    if (areAdvancedSettingsOpened) {
      speak(Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Block settings closed'));
    } else {
      speak(Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Additional settings are now available in the Editor block settings sidebar'));
    }
  };

  var label = areAdvancedSettingsOpened ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Hide Block Settings') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Show Block Settings');
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["MenuItem"], {
    onClick: function onClick() {
      if (areAdvancedSettingsOpened) {
        closeGeneralSidebar();
      } else {
        openGeneralSidebar('edit-post/block');
        speakMessage();

        _onClick();
      }
    },
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_5__["cog"],
    shortcut: shortcut
  }, !small && label);
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["withSpokenMessages"])(BlockInspectorButton));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/visual-editor/index.js":
/*!******************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/visual-editor/index.js ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _block_inspector_button__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block-inspector-button */ "./node_modules/@wordpress/edit-post/build-module/components/visual-editor/block-inspector-button.js");
/* harmony import */ var _block_settings_menu_plugin_block_settings_menu_group__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../block-settings-menu/plugin-block-settings-menu-group */ "./node_modules/@wordpress/edit-post/build-module/components/block-settings-menu/plugin-block-settings-menu-group.js");


/**
 * WordPress dependencies
 */



/**
 * Internal dependencies
 */




function VisualEditor() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["BlockSelectionClearer"], {
    className: "edit-post-visual-editor editor-styles-wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["VisualEditorGlobalKeyboardShortcuts"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MultiSelectScrollIntoView"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Popover"].Slot, {
    name: "block-toolbar"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["Typewriter"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["CopyHandler"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["WritingFlow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["ObserveTyping"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["CopyHandler"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["PostTitle"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["BlockList"], null)))))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["__experimentalBlockSettingsMenuFirstItem"], null, function (_ref) {
    var onClose = _ref.onClose;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_block_inspector_button__WEBPACK_IMPORTED_MODULE_4__["default"], {
      onClick: onClose
    });
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["__experimentalBlockSettingsMenuPluginsExtension"], null, function (_ref2) {
    var clientIds = _ref2.clientIds,
        onClose = _ref2.onClose;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_block_settings_menu_plugin_block_settings_menu_group__WEBPACK_IMPORTED_MODULE_5__["default"].Slot, {
      fillProps: {
        clientIds: clientIds,
        onClose: onClose
      }
    });
  }));
}

/* harmony default export */ __webpack_exports__["default"] = (VisualEditor);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/welcome-guide/images.js":
/*!*******************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/welcome-guide/images.js ***!
  \*******************************************************************************************/
/*! exports provided: CanvasImage, EditorImage, BlockLibraryImage, DocumentationImage, InserterIconImage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CanvasImage", function() { return CanvasImage; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "EditorImage", function() { return EditorImage; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BlockLibraryImage", function() { return BlockLibraryImage; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DocumentationImage", function() { return DocumentationImage; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "InserterIconImage", function() { return InserterIconImage; });
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);



/**
 * WordPress dependencies
 */

var CanvasImage = function CanvasImage(props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("img", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    alt: "",
    src: "data:image/svg+xml,%3Csvg width='306' height='286' viewBox='0 0 306 286' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='306' height='286' rx='4' fill='%2366C6E4'/%3E%3Crect x='36' y='30' width='234' height='256' fill='white'/%3E%3Crect x='36' y='80' width='234' height='94' fill='%23E2E4E7'/%3E%3Cpath d='M140.237 121.47L142.109 125H157.255V133H140.237V121.47ZM159.382 119H155.128L157.255 123H154.064L151.937 119H149.809L151.937 123H148.746L146.618 119H144.491L146.618 123H143.428L141.3 119H140.237C139.067 119 138.12 119.9 138.12 121L138.109 133C138.109 134.1 139.067 135 140.237 135H157.255C158.425 135 159.382 134.1 159.382 133V119Z' fill='%23444444'/%3E%3Crect x='57' y='182' width='91.4727' height='59' fill='%23E2E4E7'/%3E%3Crect x='156.982' y='182' width='91.4727' height='59' fill='%23E2E4E7'/%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M112.309 203H93.1634C92.0998 203 91.0361 204 91.0361 205V219C91.0361 220.1 91.9934 221 93.1634 221H112.309C113.372 221 114.436 220 114.436 219V205C114.436 204 113.372 203 112.309 203ZM112.309 218.92C112.294 218.941 112.269 218.962 112.248 218.979L112.248 218.979C112.239 218.987 112.23 218.994 112.224 219H93.1634V205.08L93.2485 205H112.213C112.235 205.014 112.258 205.038 112.276 205.057C112.284 205.066 112.292 205.074 112.298 205.08V218.92H112.309ZM99.0134 212.5L101.672 215.51L105.395 211L110.182 217H95.2907L99.0134 212.5Z' fill='%2340464D'/%3E%3Cmask id='mask0' mask-type='alpha' maskUnits='userSpaceOnUse' x='91' y='203' width='24' height='18'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M112.309 203H93.1634C92.0998 203 91.0361 204 91.0361 205V219C91.0361 220.1 91.9934 221 93.1634 221H112.309C113.372 221 114.436 220 114.436 219V205C114.436 204 113.372 203 112.309 203ZM112.309 218.92C112.294 218.941 112.269 218.962 112.248 218.979L112.248 218.979C112.239 218.987 112.23 218.994 112.224 219H93.1634V205.08L93.2485 205H112.213C112.235 205.014 112.258 205.038 112.276 205.057C112.284 205.066 112.292 205.074 112.298 205.08V218.92H112.309ZM99.0134 212.5L101.672 215.51L105.395 211L110.182 217H95.2907L99.0134 212.5Z' fill='white'/%3E%3C/mask%3E%3Cg mask='url(%23mask0)'%3E%3Crect x='89.9727' y='200' width='25.5273' height='24' fill='%2340464D'/%3E%3C/g%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M212.291 203H193.145C192.082 203 191.018 204 191.018 205V219C191.018 220.1 191.975 221 193.145 221H212.291C213.354 221 214.418 220 214.418 219V205C214.418 204 213.354 203 212.291 203ZM212.291 218.92C212.276 218.941 212.251 218.962 212.23 218.979L212.23 218.979C212.221 218.987 212.212 218.994 212.206 219H193.145V205.08L193.23 205H212.195C212.217 205.014 212.24 205.038 212.258 205.057C212.266 205.066 212.274 205.074 212.28 205.08V218.92H212.291ZM198.995 212.5L201.654 215.51L205.377 211L210.164 217H195.273L198.995 212.5Z' fill='%2340464D'/%3E%3Cmask id='mask1' mask-type='alpha' maskUnits='userSpaceOnUse' x='191' y='203' width='24' height='18'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M212.291 203H193.145C192.082 203 191.018 204 191.018 205V219C191.018 220.1 191.975 221 193.145 221H212.291C213.354 221 214.418 220 214.418 219V205C214.418 204 213.354 203 212.291 203ZM212.291 218.92C212.276 218.941 212.251 218.962 212.23 218.979L212.23 218.979C212.221 218.987 212.212 218.994 212.206 219H193.145V205.08L193.23 205H212.195C212.217 205.014 212.24 205.038 212.258 205.057C212.266 205.066 212.274 205.074 212.28 205.08V218.92H212.291ZM198.995 212.5L201.654 215.51L205.377 211L210.164 217H195.273L198.995 212.5Z' fill='white'/%3E%3C/mask%3E%3Cg mask='url(%23mask1)'%3E%3Crect x='189.955' y='200' width='25.5273' height='24' fill='%2340464D'/%3E%3C/g%3E%3Crect x='57' y='38' width='191.455' height='34' fill='%23E2E4E7'/%3E%3Cpath d='M155.918 47.8V54.04H149.537V47.8H146.346V63.4H149.537V57.16H155.918V63.4H159.109V47.8' fill='%2340464D'/%3E%3Crect x='58' y='249' width='191' height='37' fill='%23E2E4E7'/%3E%3Cpath d='M160.127 261.4H150.606C149.546 261.4 148.576 261.64 147.696 262.12C146.802 262.612 146.1 263.272 145.59 264.1C145.066 264.928 144.811 265.84 144.811 266.824C144.811 267.808 145.066 268.72 145.59 269.548C146.1 270.376 146.802 271.036 147.696 271.516C148.576 272.008 149.546 272.248 150.606 272.248H151.155V279.4C151.155 279.724 151.282 280.012 151.525 280.252C151.78 280.48 152.086 280.6 152.431 280.6C152.788 280.6 153.082 280.48 153.337 280.252C153.592 280.012 153.72 279.724 153.72 279.4V265C153.72 264.676 153.835 264.388 154.09 264.148C154.345 263.92 154.652 263.8 154.996 263.8C155.341 263.8 155.647 263.92 155.903 264.148C156.145 264.388 156.273 264.676 156.273 265V279.4C156.273 279.724 156.4 280.012 156.656 280.252C156.911 280.48 157.205 280.6 157.562 280.6C157.907 280.6 158.213 280.48 158.468 280.252C158.711 280.012 158.838 279.724 158.838 279.4V263.8H160.127C160.472 263.8 160.766 263.68 161.021 263.44C161.276 263.212 161.404 262.924 161.404 262.6C161.404 262.276 161.276 261.988 161.021 261.748C160.766 261.52 160.472 261.4 160.127 261.4Z' fill='%2340464D'/%3E%3C/svg%3E%0A"
  }, props));
};
var EditorImage = function EditorImage(props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("img", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    alt: "",
    src: "data:image/svg+xml,%3Csvg width='306' height='286' viewBox='0 0 306 286' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='306' height='286' rx='4' fill='%2366C6E4'/%3E%3Crect x='34.5' y='89.9424' width='237' height='113.423' fill='white' stroke='%238D96A0'/%3E%3Crect x='42.2383' y='98.5962' width='219.692' height='95.6618' fill='%23E2E4E7'/%3E%3Crect x='34.5' y='71.6346' width='27.0718' height='18.1324' fill='white' stroke='%238D96A0'/%3E%3Crect x='152.89' y='71.6346' width='18.5282' height='18.1324' fill='white' stroke='%238D96A0'/%3E%3Crect x='61.3516' y='71.6346' width='51.482' height='18.1324' fill='white' stroke='%238D96A0'/%3E%3Crect x='112.613' y='71.6346' width='40.4974' height='18.1324' fill='white' stroke='%238D96A0'/%3E%3Cpath d='M157.577 137.408H149.383C148.471 137.408 147.636 137.628 146.878 138.068C146.109 138.518 145.505 139.122 145.066 139.88C144.615 140.638 144.396 141.473 144.396 142.373C144.396 143.274 144.615 144.109 145.066 144.867C145.505 145.625 146.109 146.229 146.878 146.668C147.636 147.119 148.471 147.339 149.383 147.339H149.855V153.885C149.855 154.182 149.965 154.446 150.173 154.665C150.393 154.874 150.657 154.984 150.953 154.984C151.261 154.984 151.514 154.874 151.733 154.665C151.953 154.446 152.063 154.182 152.063 153.885V140.704C152.063 140.407 152.162 140.144 152.381 139.924C152.601 139.715 152.865 139.605 153.161 139.605C153.458 139.605 153.721 139.715 153.941 139.924C154.15 140.144 154.26 140.407 154.26 140.704V153.885C154.26 154.182 154.37 154.446 154.589 154.665C154.809 154.874 155.062 154.984 155.369 154.984C155.666 154.984 155.929 154.874 156.149 154.665C156.358 154.446 156.468 154.182 156.468 153.885V139.605H157.577C157.874 139.605 158.126 139.496 158.346 139.276C158.566 139.067 158.676 138.803 158.676 138.507C158.676 138.21 158.566 137.947 158.346 137.727C158.126 137.518 157.874 137.408 157.577 137.408Z' fill='%2340464D'/%3E%3Crect x='41.3232' y='77.1135' width='15.8667' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='66.9536' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='77.9385' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='88.9229' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='99.9077' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='118.215' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='129.2' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='140.185' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3Crect x='158.492' y='77.1135' width='7.32308' height='7.17464' fill='%23E2E4E7'/%3E%3C/svg%3E%0A"
  }, props));
};
var BlockLibraryImage = function BlockLibraryImage(props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("img", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    alt: "",
    src: "data:image/svg+xml,%3Csvg width='306' height='286' viewBox='0 0 306 286' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='306' height='286' rx='4' fill='%2366C6E4'/%3E%3Cmask id='mask0' mask-type='alpha' maskUnits='userSpaceOnUse' x='141' y='25' width='24' height='24'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M152.765 25C146.294 25 141 30.2943 141 36.7651C141 43.2359 146.294 48.5302 152.765 48.5302C159.236 48.5302 164.53 43.2359 164.53 36.7651C164.53 30.2943 159.236 25 152.765 25ZM151.589 32.0591V35.5886H148.059V37.9416H151.589V41.4711H153.942V37.9416H157.471V35.5886H153.942V32.0591H151.589ZM143.353 36.7651C143.353 41.9417 147.588 46.1772 152.765 46.1772C157.942 46.1772 162.177 41.9417 162.177 36.7651C162.177 31.5885 157.942 27.353 152.765 27.353C147.588 27.353 143.353 31.5885 143.353 36.7651Z' fill='white'/%3E%3C/mask%3E%3Cg mask='url(%23mask0)'%3E%3Crect x='141' y='25' width='23.5253' height='23.5253' fill='white'/%3E%3C/g%3E%3Cg filter='url(%23filter0_d)'%3E%3Crect x='48' y='63' width='210' height='190' fill='white'/%3E%3C/g%3E%3Cmask id='mask1' mask-type='alpha' maskUnits='userSpaceOnUse' x='143' y='139' width='20' height='16'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M143.75 141C143.75 140.17 144.42 139.5 145.25 139.5C146.08 139.5 146.75 140.17 146.75 141C146.75 141.83 146.08 142.5 145.25 142.5C144.42 142.5 143.75 141.83 143.75 141ZM143.75 147C143.75 146.17 144.42 145.5 145.25 145.5C146.08 145.5 146.75 146.17 146.75 147C146.75 147.83 146.08 148.5 145.25 148.5C144.42 148.5 143.75 147.83 143.75 147ZM145.25 151.5C144.42 151.5 143.75 152.18 143.75 153C143.75 153.82 144.43 154.5 145.25 154.5C146.07 154.5 146.75 153.82 146.75 153C146.75 152.18 146.08 151.5 145.25 151.5ZM162.25 154H148.25V152H162.25V154ZM148.25 148H162.25V146H148.25V148ZM148.25 142V140H162.25V142H148.25Z' fill='white'/%3E%3C/mask%3E%3Cg mask='url(%23mask1)'%3E%3Crect x='141' y='135' width='24' height='24' fill='%23444444'/%3E%3C/g%3E%3Cmask id='mask2' mask-type='alpha' maskUnits='userSpaceOnUse' x='139' y='54' width='28' height='11'%3E%3Crect x='139' y='54' width='28' height='11' fill='%23C4C4C4'/%3E%3C/mask%3E%3Cg mask='url(%23mask2)'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M139 67L153 54L167 67H139Z' fill='white'/%3E%3C/g%3E%3Crect x='59' y='74' width='188' height='28' rx='3' stroke='%231486B8' stroke-width='2'/%3E%3Cpath d='M211 207.47L212.76 211H227V219H211V207.47ZM229 205H225L227 209H224L222 205H220L222 209H219L217 205H215L217 209H214L212 205H211C209.9 205 209.01 205.9 209.01 207L209 219C209 220.1 209.9 221 211 221H227C228.1 221 229 220.1 229 219V205Z' fill='%23444444'/%3E%3Cpath d='M94.0001 136.4H85.0481C84.0521 136.4 83.1401 136.64 82.3121 137.12C81.4721 137.612 80.8121 138.272 80.3321 139.1C79.8401 139.928 79.6001 140.84 79.6001 141.824C79.6001 142.808 79.8401 143.72 80.3321 144.548C80.8121 145.376 81.4721 146.036 82.3121 146.516C83.1401 147.008 84.0521 147.248 85.0481 147.248H85.5641V154.4C85.5641 154.724 85.6841 155.012 85.9121 155.252C86.1521 155.48 86.4401 155.6 86.7641 155.6C87.1001 155.6 87.3761 155.48 87.6161 155.252C87.8561 155.012 87.9761 154.724 87.9761 154.4V140C87.9761 139.676 88.0841 139.388 88.3241 139.148C88.5641 138.92 88.8521 138.8 89.1761 138.8C89.5001 138.8 89.7881 138.92 90.0281 139.148C90.2561 139.388 90.3761 139.676 90.3761 140V154.4C90.3761 154.724 90.4961 155.012 90.7361 155.252C90.9761 155.48 91.2521 155.6 91.5881 155.6C91.9121 155.6 92.2001 155.48 92.4401 155.252C92.6681 155.012 92.7881 154.724 92.7881 154.4V138.8H94.0001C94.3241 138.8 94.6001 138.68 94.8401 138.44C95.0801 138.212 95.2001 137.924 95.2001 137.6C95.2001 137.276 95.0801 136.988 94.8401 136.748C94.6001 136.52 94.3241 136.4 94.0001 136.4Z' fill='%23444444'/%3E%3Cmask id='mask3' mask-type='alpha' maskUnits='userSpaceOnUse' x='76' y='204' width='22' height='18'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M96 204H78C77 204 76 205 76 206V220C76 221.1 76.9 222 78 222H96C97 222 98 221 98 220V206C98 205 97 204 96 204ZM96 219.92C95.9861 219.941 95.9624 219.962 95.9426 219.979C95.9339 219.987 95.9261 219.994 95.92 220H78V206.08L78.08 206H95.91C95.9309 206.014 95.9518 206.038 95.9694 206.057C95.977 206.066 95.9839 206.074 95.99 206.08V219.92H96ZM83.5 213.5L86 216.51L89.5 212L94 218H80L83.5 213.5Z' fill='white'/%3E%3C/mask%3E%3Cg mask='url(%23mask3)'%3E%3Crect x='75' y='201' width='24' height='24' fill='%23444444'/%3E%3C/g%3E%3Cpath d='M161 205V217H149V205H161ZM161 203H149C147.9 203 147 203.9 147 205V217C147 218.1 147.9 219 149 219H161C162.1 219 163 218.1 163 217V205C163 203.9 162.1 203 161 203ZM152.5 212.67L154.19 214.93L156.67 211.83L160 216H150L152.5 212.67ZM143 207V221C143 222.1 143.9 223 145 223H159V221H145V207H143Z' fill='%23444444'/%3E%3Cmask id='mask4' mask-type='alpha' maskUnits='userSpaceOnUse' x='210' y='140' width='18' height='12'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M215.62 152H210.38L212.38 148H210V140H218V147.24L215.62 152ZM220.38 152H225.62L228 147.24V140H220V148H222.38L220.38 152ZM224.38 150H223.62L225.62 146H222V142H226V146.76L224.38 150ZM214.38 150H213.62L215.62 146H212V142H216V146.76L214.38 150Z' fill='white'/%3E%3C/mask%3E%3Cg mask='url(%23mask4)'%3E%3Crect x='207' y='134' width='24' height='24' fill='%23444444'/%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_d' x='18' y='36' width='270' height='250' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeColorMatrix in='SourceAlpha' type='matrix' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0'/%3E%3CfeOffset dy='3'/%3E%3CfeGaussianBlur stdDeviation='15'/%3E%3CfeColorMatrix type='matrix' values='0 0 0 0 0.0980392 0 0 0 0 0.117647 0 0 0 0 0.137255 0 0 0 0.1 0'/%3E%3CfeBlend mode='normal' in2='BackgroundImageFix' result='effect1_dropShadow'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='effect1_dropShadow' result='shape'/%3E%3C/filter%3E%3C/defs%3E%3C/svg%3E%0A"
  }, props));
};
var DocumentationImage = function DocumentationImage(props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("img", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    alt: "",
    src: "data:image/svg+xml,%3C%3Fxml version='1.0' encoding='UTF-8'%3F%3E%3Csvg width='306px' height='286px' viewBox='0 0 306 286' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3C!-- Generator: Sketch 61.2 (89653) - https://sketch.com --%3E%3Ctitle%3EPage 1%3C/title%3E%3Cdesc%3ECreated with Sketch.%3C/desc%3E%3Cg id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Documentation'%3E%3Crect id='bg' fill='%2361C6E6' x='0' y='0' width='306' height='286' rx='4'%3E%3C/rect%3E%3Crect id='page' fill='%23FFFFFF' x='36' y='30' width='234' height='256'%3E%3C/rect%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='119' width='106' height='13'%3E%3C/rect%3E%3Crect id='heading' fill='%23E2E4E7' x='76' y='96' width='154' height='13'%3E%3C/rect%3E%3Crect id='header' fill='%2340464D' x='36' y='30' width='234' height='41'%3E%3C/rect%3E%3Cimage id='WordPress-logotype-wmark-white' x='45' y='32' width='37' height='37' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA+gAAAPoCAYAAABNo9TkAAAABGdBTUEAALGOfPtRkwAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAD6KADAAQAAAABAAAD6AAAAAAYK4+nAABAAElEQVR4AezdB7gkRdX/8UV2yTmDhMuSkQySQUCSpBWUvCACggFFRPQVRREB/6+gooiB8BphEVCygESRIEmyBAlLRiTnzP93oGeZe/eGmek63VXV33qeeubemelTpz49PV013dMzahQFAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQ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AQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAA4nty+wAAB2JJREFUAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAAQIECBAgQIAAgd4J/B+dcycNJZZ/4gAAAABJRU5ErkJggg=='%3E%3C/image%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='173' width='106' height='13'%3E%3C/rect%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='137' width='106' height='13'%3E%3C/rect%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='191' width='106' height='13'%3E%3C/rect%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='245' width='106' height='13'%3E%3C/rect%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='155' width='106' height='13'%3E%3C/rect%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='209' width='106' height='13'%3E%3C/rect%3E%3Crect id='text' fill='%23E2E4E7' x='124' y='263' width='106' height='13'%3E%3C/rect%3E%3C/g%3E%3C/g%3E%3C/svg%3E"
  }, props));
};
var InserterIconImage = function InserterIconImage(props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("img", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    alt: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('inserter'),
    src: "data:image/svg+xml;charset=utf8,%3Csvg width='18' height='18' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M8.824 0C3.97 0 0 3.97 0 8.824c0 4.853 3.97 8.824 8.824 8.824 4.853 0 8.824-3.971 8.824-8.824S13.677 0 8.824 0zM7.94 5.294v2.647H5.294v1.765h2.647v2.647h1.765V9.706h2.647V7.941H9.706V5.294H7.941zm-6.176 3.53c0 3.882 3.176 7.059 7.059 7.059 3.882 0 7.059-3.177 7.059-7.06 0-3.882-3.177-7.058-7.06-7.058-3.882 0-7.058 3.176-7.058 7.059z' fill='%234A4A4A'/%3E%3Cmask id='a' maskUnits='userSpaceOnUse' x='0' y='0' width='18' height='18'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M8.824 0C3.97 0 0 3.97 0 8.824c0 4.853 3.97 8.824 8.824 8.824 4.853 0 8.824-3.971 8.824-8.824S13.677 0 8.824 0zM7.94 5.294v2.647H5.294v1.765h2.647v2.647h1.765V9.706h2.647V7.941H9.706V5.294H7.941zm-6.176 3.53c0 3.882 3.176 7.059 7.059 7.059 3.882 0 7.059-3.177 7.059-7.06 0-3.882-3.177-7.058-7.06-7.058-3.882 0-7.058 3.176-7.058 7.059z' fill='%23fff'/%3E%3C/mask%3E%3Cg mask='url(%23a)'%3E%3Cpath fill='%23444' d='M0 0h17.644v17.644H0z'/%3E%3C/g%3E%3C/svg%3E"
  }, props));
};


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/components/welcome-guide/index.js":
/*!******************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/components/welcome-guide/index.js ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return WelcomeGuide; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _images__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./images */ "./node_modules/@wordpress/edit-post/build-module/components/welcome-guide/images.js");


/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */


function WelcomeGuide() {
  var isActive = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useSelect"])(function (select) {
    return select('core/edit-post').isFeatureActive('welcomeGuide');
  }, []);

  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useDispatch"])('core/edit-post'),
      toggleFeature = _useDispatch.toggleFeature;

  if (!isActive) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Guide"], {
    className: "edit-post-welcome-guide",
    contentLabel: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Welcome to the Block Editor'),
    finishButtonText: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Get started'),
    onFinish: function onFinish() {
      return toggleFeature('welcomeGuide');
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["GuidePage"], {
    className: "edit-post-welcome-guide__page"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h1", {
    className: "edit-post-welcome-guide__heading"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Welcome to the Block Editor')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_images__WEBPACK_IMPORTED_MODULE_4__["CanvasImage"], {
    className: "edit-post-welcome-guide__image"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
    className: "edit-post-welcome-guide__text"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('In the WordPress editor, each paragraph, image, or video is presented as a distinct “block” of content.'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["GuidePage"], {
    className: "edit-post-welcome-guide__page"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h1", {
    className: "edit-post-welcome-guide__heading"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Make each block your own')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_images__WEBPACK_IMPORTED_MODULE_4__["EditorImage"], {
    className: "edit-post-welcome-guide__image"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
    className: "edit-post-welcome-guide__text"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Each block comes with its own set of controls for changing things like color, width, and alignment. These will show and hide automatically when you have a block selected.'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["GuidePage"], {
    className: "edit-post-welcome-guide__page"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h1", {
    className: "edit-post-welcome-guide__heading"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Get to know the Block Library')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_images__WEBPACK_IMPORTED_MODULE_4__["BlockLibraryImage"], {
    className: "edit-post-welcome-guide__image"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
    className: "edit-post-welcome-guide__text"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["__experimentalCreateInterpolateElement"])(Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('All of the blocks available to you live in the Block Library. You’ll find it wherever you see the <InserterIconImage /> icon.'), {
    InserterIconImage: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_images__WEBPACK_IMPORTED_MODULE_4__["InserterIconImage"], {
      className: "edit-post-welcome-guide__inserter-icon"
    })
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["GuidePage"], {
    className: "edit-post-welcome-guide__page"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h1", {
    className: "edit-post-welcome-guide__heading"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Learn how to use the Block Editor')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_images__WEBPACK_IMPORTED_MODULE_4__["DocumentationImage"], {
    className: "edit-post-welcome-guide__image"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
    className: "edit-post-welcome-guide__text"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('New to the Block Editor? Want to learn more about using it? '), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ExternalLink"], {
    href: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('https://wordpress.org/support/article/wordpress-editor/')
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Here's a detailed guide.")))));
}


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/editor.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/editor.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/esm/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @babel/runtime/helpers/esm/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var memize__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! memize */ "./node_modules/memize/index.js");
/* harmony import */ var memize__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(memize__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _prevent_event_discovery__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./prevent-event-discovery */ "./node_modules/@wordpress/edit-post/build-module/prevent-event-discovery.js");
/* harmony import */ var _components_layout__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./components/layout */ "./node_modules/@wordpress/edit-post/build-module/components/layout/index.js");
/* harmony import */ var _components_editor_initialization__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./components/editor-initialization */ "./node_modules/@wordpress/edit-post/build-module/components/editor-initialization/index.js");
/* harmony import */ var _components_edit_post_settings__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./components/edit-post-settings */ "./node_modules/@wordpress/edit-post/build-module/components/edit-post-settings/index.js");











function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_3__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */






/**
 * Internal dependencies
 */






var Editor =
/*#__PURE__*/
function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_8__["default"])(Editor, _Component);

  function Editor() {
    var _this;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_4__["default"])(this, Editor);

    _this = Object(_babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_6__["default"])(this, Object(_babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_7__["default"])(Editor).apply(this, arguments));
    _this.getEditorSettings = memize__WEBPACK_IMPORTED_MODULE_10___default()(_this.getEditorSettings, {
      maxSize: 1
    });
    return _this;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_5__["default"])(Editor, [{
    key: "getEditorSettings",
    value: function getEditorSettings(settings, hasFixedToolbar, showInserterHelpPanel, focusMode, hiddenBlockTypes, blockTypes, preferredStyleVariations, __experimentalLocalAutosaveInterval, updatePreferredStyleVariations) {
      settings = _objectSpread({}, settings, {
        __experimentalPreferredStyleVariations: {
          value: preferredStyleVariations,
          onChange: updatePreferredStyleVariations
        },
        hasFixedToolbar: hasFixedToolbar,
        focusMode: focusMode,
        showInserterHelpPanel: showInserterHelpPanel,
        __experimentalLocalAutosaveInterval: __experimentalLocalAutosaveInterval
      }); // Omit hidden block types if exists and non-empty.

      if (Object(lodash__WEBPACK_IMPORTED_MODULE_11__["size"])(hiddenBlockTypes) > 0) {
        // Defer to passed setting for `allowedBlockTypes` if provided as
        // anything other than `true` (where `true` is equivalent to allow
        // all block types).
        var defaultAllowedBlockTypes = true === settings.allowedBlockTypes ? Object(lodash__WEBPACK_IMPORTED_MODULE_11__["map"])(blockTypes, 'name') : settings.allowedBlockTypes || [];
        settings.allowedBlockTypes = lodash__WEBPACK_IMPORTED_MODULE_11__["without"].apply(void 0, [defaultAllowedBlockTypes].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_2__["default"])(hiddenBlockTypes)));
      }

      return settings;
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          settings = _this$props.settings,
          hasFixedToolbar = _this$props.hasFixedToolbar,
          focusMode = _this$props.focusMode,
          post = _this$props.post,
          postId = _this$props.postId,
          initialEdits = _this$props.initialEdits,
          onError = _this$props.onError,
          hiddenBlockTypes = _this$props.hiddenBlockTypes,
          blockTypes = _this$props.blockTypes,
          preferredStyleVariations = _this$props.preferredStyleVariations,
          __experimentalLocalAutosaveInterval = _this$props.__experimentalLocalAutosaveInterval,
          showInserterHelpPanel = _this$props.showInserterHelpPanel,
          updatePreferredStyleVariations = _this$props.updatePreferredStyleVariations,
          props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__["default"])(_this$props, ["settings", "hasFixedToolbar", "focusMode", "post", "postId", "initialEdits", "onError", "hiddenBlockTypes", "blockTypes", "preferredStyleVariations", "__experimentalLocalAutosaveInterval", "showInserterHelpPanel", "updatePreferredStyleVariations"]);

      if (!post) {
        return null;
      }

      var editorSettings = this.getEditorSettings(settings, hasFixedToolbar, showInserterHelpPanel, focusMode, hiddenBlockTypes, blockTypes, preferredStyleVariations, __experimentalLocalAutosaveInterval, updatePreferredStyleVariations);
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["StrictMode"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_components_edit_post_settings__WEBPACK_IMPORTED_MODULE_19__["default"].Provider, {
        value: settings
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["SlotFillProvider"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["DropZoneProvider"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_13__["EditorProvider"], Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
        settings: editorSettings,
        post: post,
        initialEdits: initialEdits,
        useSubRegistry: false
      }, props), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_13__["ErrorBoundary"], {
        onError: onError
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_components_editor_initialization__WEBPACK_IMPORTED_MODULE_18__["default"], {
        postId: postId
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_components_layout__WEBPACK_IMPORTED_MODULE_17__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["KeyboardShortcuts"], {
        shortcuts: _prevent_event_discovery__WEBPACK_IMPORTED_MODULE_16__["default"]
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_13__["PostLockedModal"], null))))));
    }
  }]);

  return Editor;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_9__["Component"]);

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_15__["compose"])([Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_12__["withSelect"])(function (select, _ref) {
  var postId = _ref.postId,
      postType = _ref.postType;

  var _select = select('core/edit-post'),
      isFeatureActive = _select.isFeatureActive,
      getPreference = _select.getPreference;

  var _select2 = select('core'),
      getEntityRecord = _select2.getEntityRecord;

  var _select3 = select('core/blocks'),
      getBlockTypes = _select3.getBlockTypes;

  return {
    showInserterHelpPanel: isFeatureActive('showInserterHelpPanel'),
    hasFixedToolbar: isFeatureActive('fixedToolbar'),
    focusMode: isFeatureActive('focusMode'),
    post: getEntityRecord('postType', postType, postId),
    preferredStyleVariations: getPreference('preferredStyleVariations'),
    hiddenBlockTypes: getPreference('hiddenBlockTypes'),
    blockTypes: getBlockTypes(),
    __experimentalLocalAutosaveInterval: getPreference('localAutosaveInterval')
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_12__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      updatePreferredStyleVariations = _dispatch.updatePreferredStyleVariations;

  return {
    updatePreferredStyleVariations: updatePreferredStyleVariations
  };
})])(Editor));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/hooks/components/index.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/hooks/components/index.js ***!
  \**********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_media_utils__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/media-utils */ "@wordpress/media-utils");
/* harmony import */ var _wordpress_media_utils__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_media_utils__WEBPACK_IMPORTED_MODULE_1__);
/**
 * WordPress dependencies
 */



var replaceMediaUpload = function replaceMediaUpload() {
  return _wordpress_media_utils__WEBPACK_IMPORTED_MODULE_1__["MediaUpload"];
};

Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__["addFilter"])('editor.MediaUpload', 'core/edit-post/replace-media-upload', replaceMediaUpload);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/hooks/index.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/hooks/index.js ***!
  \***********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components */ "./node_modules/@wordpress/edit-post/build-module/hooks/components/index.js");
/* harmony import */ var _validate_multiple_use__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./validate-multiple-use */ "./node_modules/@wordpress/edit-post/build-module/hooks/validate-multiple-use/index.js");
/**
 * Internal dependencies
 */




/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/hooks/validate-multiple-use/index.js":
/*!*********************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/hooks/validate-multiple-use/index.js ***!
  \*********************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_10__);




/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */








var enhance = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_10__["compose"])(
/**
 * For blocks whose block type doesn't support `multiple`, provides the
 * wrapped component with `originalBlockClientId` -- a reference to the
 * first block of the same type in the content -- if and only if that
 * "original" block is not the current one. Thus, an inexisting
 * `originalBlockClientId` prop signals that the block is valid.
 *
 * @param {WPComponent} WrappedBlockEdit A filtered BlockEdit instance.
 *
 * @return {WPComponent} Enhanced component with merged state data props.
 */
Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])(function (select, block) {
  var multiple = Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["hasBlockSupport"])(block.name, 'multiple', true); // For block types with `multiple` support, there is no "original
  // block" to be found in the content, as the block itself is valid.

  if (multiple) {
    return {};
  } // Otherwise, only pass `originalBlockClientId` if it refers to a different
  // block from the current one.


  var blocks = select('core/block-editor').getBlocks();
  var firstOfSameType = Object(lodash__WEBPACK_IMPORTED_MODULE_3__["find"])(blocks, function (_ref) {
    var name = _ref.name;
    return block.name === name;
  });
  var isInvalid = firstOfSameType && firstOfSameType.clientId !== block.clientId;
  return {
    originalBlockClientId: isInvalid && firstOfSameType.clientId
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withDispatch"])(function (dispatch, _ref2) {
  var originalBlockClientId = _ref2.originalBlockClientId;
  return {
    selectFirst: function selectFirst() {
      return dispatch('core/block-editor').selectBlock(originalBlockClientId);
    }
  };
}));
var withMultipleValidation = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_10__["createHigherOrderComponent"])(function (BlockEdit) {
  return enhance(function (_ref3) {
    var originalBlockClientId = _ref3.originalBlockClientId,
        selectFirst = _ref3.selectFirst,
        props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__["default"])(_ref3, ["originalBlockClientId", "selectFirst"]);

    if (!originalBlockClientId) {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(BlockEdit, props);
    }

    var blockType = Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["getBlockType"])(props.name);
    var outboundType = getOutboundType(props.name);
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      key: "invalid-preview",
      style: {
        minHeight: '60px'
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(BlockEdit, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
      key: "block-edit"
    }, props))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_7__["Warning"], {
      key: "multiple-use-warning",
      actions: [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
        key: "find-original",
        isSecondary: true,
        onClick: selectFirst
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('Find original')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
        key: "remove",
        isSecondary: true,
        onClick: function onClick() {
          return props.onReplace([]);
        }
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('Remove')), outboundType && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
        key: "transform",
        isSecondary: true,
        onClick: function onClick() {
          return props.onReplace(Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["createBlock"])(outboundType.name, props.attributes));
        }
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('Transform into:'), " ", outboundType.title)]
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("strong", null, blockType.title, ": "), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__["__"])('This block can only be used once.'))];
  });
}, 'withMultipleValidation');
/**
 * Given a base block name, returns the default block type to which to offer
 * transforms.
 *
 * @param {string} blockName Base block name.
 *
 * @return {?Object} The chosen default block type.
 */

function getOutboundType(blockName) {
  // Grab the first outbound transform
  var transform = Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["findTransform"])(Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["getBlockTransforms"])('to', blockName), function (_ref4) {
    var type = _ref4.type,
        blocks = _ref4.blocks;
    return type === 'block' && blocks.length === 1;
  } // What about when .length > 1?
  );

  if (!transform) {
    return null;
  }

  return Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["getBlockType"])(transform.blocks[0]);
}

Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_8__["addFilter"])('editor.BlockEdit', 'core/edit-post/validate-multiple-use/with-multiple-validation', withMultipleValidation);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/index.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/index.js ***!
  \*****************************************************************/
/*! exports provided: reinitializeEditor, initializeEditor, PluginBlockSettingsMenuItem, PluginDocumentSettingPanel, PluginMoreMenuItem, PluginPostPublishPanel, PluginPostStatusInfo, PluginPrePublishPanel, PluginSidebar, PluginSidebarMoreMenuItem */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "reinitializeEditor", function() { return reinitializeEditor; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initializeEditor", function() { return initializeEditor; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/core-data */ "@wordpress/core-data");
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/keyboard-shortcuts */ "@wordpress/keyboard-shortcuts");
/* harmony import */ var _wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keyboard_shortcuts__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_viewport__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/viewport */ "@wordpress/viewport");
/* harmony import */ var _wordpress_viewport__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_viewport__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_notices__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/notices */ "@wordpress/notices");
/* harmony import */ var _wordpress_notices__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_notices__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_block_library__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/block-library */ "@wordpress/block-library");
/* harmony import */ var _wordpress_block_library__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_library__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./hooks */ "./node_modules/@wordpress/edit-post/build-module/hooks/index.js");
/* harmony import */ var _plugins__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./plugins */ "./node_modules/@wordpress/edit-post/build-module/plugins/index.js");
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./store */ "./node_modules/@wordpress/edit-post/build-module/store/index.js");
/* harmony import */ var _editor__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./editor */ "./node_modules/@wordpress/edit-post/build-module/editor.js");
/* harmony import */ var _components_block_settings_menu_plugin_block_settings_menu_item__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./components/block-settings-menu/plugin-block-settings-menu-item */ "./node_modules/@wordpress/edit-post/build-module/components/block-settings-menu/plugin-block-settings-menu-item.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginBlockSettingsMenuItem", function() { return _components_block_settings_menu_plugin_block_settings_menu_item__WEBPACK_IMPORTED_MODULE_12__["default"]; });

/* harmony import */ var _components_sidebar_plugin_document_setting_panel__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./components/sidebar/plugin-document-setting-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-document-setting-panel/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginDocumentSettingPanel", function() { return _components_sidebar_plugin_document_setting_panel__WEBPACK_IMPORTED_MODULE_13__["default"]; });

/* harmony import */ var _components_header_plugin_more_menu_item__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./components/header/plugin-more-menu-item */ "./node_modules/@wordpress/edit-post/build-module/components/header/plugin-more-menu-item/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginMoreMenuItem", function() { return _components_header_plugin_more_menu_item__WEBPACK_IMPORTED_MODULE_14__["default"]; });

/* harmony import */ var _components_sidebar_plugin_post_publish_panel__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./components/sidebar/plugin-post-publish-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-publish-panel/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginPostPublishPanel", function() { return _components_sidebar_plugin_post_publish_panel__WEBPACK_IMPORTED_MODULE_15__["default"]; });

/* harmony import */ var _components_sidebar_plugin_post_status_info__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./components/sidebar/plugin-post-status-info */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-post-status-info/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginPostStatusInfo", function() { return _components_sidebar_plugin_post_status_info__WEBPACK_IMPORTED_MODULE_16__["default"]; });

/* harmony import */ var _components_sidebar_plugin_pre_publish_panel__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./components/sidebar/plugin-pre-publish-panel */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-pre-publish-panel/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginPrePublishPanel", function() { return _components_sidebar_plugin_pre_publish_panel__WEBPACK_IMPORTED_MODULE_17__["default"]; });

/* harmony import */ var _components_sidebar_plugin_sidebar__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./components/sidebar/plugin-sidebar */ "./node_modules/@wordpress/edit-post/build-module/components/sidebar/plugin-sidebar/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginSidebar", function() { return _components_sidebar_plugin_sidebar__WEBPACK_IMPORTED_MODULE_18__["default"]; });

/* harmony import */ var _components_header_plugin_sidebar_more_menu_item__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./components/header/plugin-sidebar-more-menu-item */ "./node_modules/@wordpress/edit-post/build-module/components/header/plugin-sidebar-more-menu-item/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PluginSidebarMoreMenuItem", function() { return _components_header_plugin_sidebar_more_menu_item__WEBPACK_IMPORTED_MODULE_19__["default"]; });



/**
 * WordPress dependencies
 */








/**
 * Internal dependencies
 */





/**
 * Reinitializes the editor after the user chooses to reboot the editor after
 * an unhandled error occurs, replacing previously mounted editor element using
 * an initial state from prior to the crash.
 *
 * @param {Object}  postType     Post type of the post to edit.
 * @param {Object}  postId       ID of the post to edit.
 * @param {Element} target       DOM node in which editor is rendered.
 * @param {?Object} settings     Editor settings object.
 * @param {Object}  initialEdits Programmatic edits to apply initially, to be
 *                               considered as non-user-initiated (bypass for
 *                               unsaved changes prompt).
 */

function reinitializeEditor(postType, postId, target, settings, initialEdits) {
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["unmountComponentAtNode"])(target);
  var reboot = reinitializeEditor.bind(null, postType, postId, target, settings, initialEdits);
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["render"])(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_editor__WEBPACK_IMPORTED_MODULE_11__["default"], {
    settings: settings,
    onError: reboot,
    postId: postId,
    postType: postType,
    initialEdits: initialEdits,
    recovery: true
  }), target);
}
/**
 * Initializes and returns an instance of Editor.
 *
 * The return value of this function is not necessary if we change where we
 * call initializeEditor(). This is due to metaBox timing.
 *
 * @param {string}  id           Unique identifier for editor instance.
 * @param {Object}  postType     Post type of the post to edit.
 * @param {Object}  postId       ID of the post to edit.
 * @param {?Object} settings     Editor settings object.
 * @param {Object}  initialEdits Programmatic edits to apply initially, to be
 *                               considered as non-user-initiated (bypass for
 *                               unsaved changes prompt).
 */

function initializeEditor(id, postType, postId, settings, initialEdits) {
  var target = document.getElementById(id);
  var reboot = reinitializeEditor.bind(null, postType, postId, target, settings, initialEdits);
  Object(_wordpress_block_library__WEBPACK_IMPORTED_MODULE_7__["registerCoreBlocks"])();

  if (false) {} // Show a console log warning if the browser is not in Standards rendering mode.


  var documentMode = document.compatMode === 'CSS1Compat' ? 'Standards' : 'Quirks';

  if (documentMode !== 'Standards') {
    // eslint-disable-next-line no-console
    console.warn("Your browser is using Quirks Mode. \nThis can cause rendering issues such as blocks overlaying meta boxes in the editor. Quirks Mode can be triggered by PHP errors or HTML code appearing before the opening <!DOCTYPE html>. Try checking the raw page source or your site's PHP error log and resolving errors there, removing any HTML before the doctype, or disabling plugins.");
  } // This is a temporary fix for a couple of issues specific to Webkit on iOS.
  // Without this hack the browser scrolls the mobile toolbar off-screen.
  // Once supported in Safari we can replace this in favor of preventScroll.
  // For details see issue #18632 and PR #18686
  // Specifically, we scroll `block-editor-editor-skeleton__body` to enable a fixed top toolbar.
  // But Mobile Safari forces the `html` element to scroll upwards, hiding the toolbar.


  var isIphone = window.navigator.userAgent.indexOf('iPhone') !== -1;

  if (isIphone) {
    window.addEventListener('scroll', function (event) {
      var editorScrollContainer = document.getElementsByClassName('block-editor-editor-skeleton__body')[0];

      if (event.target === document) {
        // Scroll element into view by scrolling the editor container by the same amount
        // that Mobile Safari tried to scroll the html element upwards.
        if (window.scrollY > 100) {
          editorScrollContainer.scrollTop = editorScrollContainer.scrollTop + window.scrollY;
        } //Undo unwanted scroll on html element


        window.scrollTo(0, 0);
      }
    });
  }

  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["render"])(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_editor__WEBPACK_IMPORTED_MODULE_11__["default"], {
    settings: settings,
    onError: reboot,
    postId: postId,
    postType: postType,
    initialEdits: initialEdits
  }), target);
}










/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/plugins/copy-content-menu-item/index.js":
/*!************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/plugins/copy-content-menu-item/index.js ***!
  \************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__);


/**
 * WordPress dependencies
 */





function CopyContentMenuItem(_ref) {
  var createNotice = _ref.createNotice,
      editedPostContent = _ref.editedPostContent,
      hasCopied = _ref.hasCopied,
      setState = _ref.setState;
  return editedPostContent.length > 0 && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["ClipboardButton"], {
    text: editedPostContent,
    role: "menuitem",
    className: "components-menu-item__button",
    onCopy: function onCopy() {
      setState({
        hasCopied: true
      });
      createNotice('info', Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('All content copied.'), {
        isDismissible: true,
        type: 'snackbar'
      });
    },
    onFinishCopy: function onFinishCopy() {
      return setState({
        hasCopied: false
      });
    }
  }, hasCopied ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Copied!') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Copy all content'));
}

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withSelect"])(function (select) {
  return {
    editedPostContent: select('core/editor').getEditedPostAttribute('content')
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/notices'),
      createNotice = _dispatch.createNotice;

  return {
    createNotice: createNotice
  };
}), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_4__["withState"])({
  hasCopied: false
}))(CopyContentMenuItem));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/plugins/index.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/plugins/index.js ***!
  \*************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _copy_content_menu_item__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./copy-content-menu-item */ "./node_modules/@wordpress/edit-post/build-module/plugins/copy-content-menu-item/index.js");
/* harmony import */ var _manage_blocks_menu_item__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./manage-blocks-menu-item */ "./node_modules/@wordpress/edit-post/build-module/plugins/manage-blocks-menu-item/index.js");
/* harmony import */ var _keyboard_shortcuts_help_menu_item__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./keyboard-shortcuts-help-menu-item */ "./node_modules/@wordpress/edit-post/build-module/plugins/keyboard-shortcuts-help-menu-item/index.js");
/* harmony import */ var _components_header_tools_more_menu_group__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../components/header/tools-more-menu-group */ "./node_modules/@wordpress/edit-post/build-module/components/header/tools-more-menu-group/index.js");
/* harmony import */ var _welcome_guide_menu_item__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./welcome-guide-menu-item */ "./node_modules/@wordpress/edit-post/build-module/plugins/welcome-guide-menu-item/index.js");


/**
 * WordPress dependencies
 */




/**
 * Internal dependencies
 */






Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__["registerPlugin"])('edit-post', {
  render: function render() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_components_header_tools_more_menu_group__WEBPACK_IMPORTED_MODULE_8__["default"], null, function (_ref) {
      var onClose = _ref.onClose;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_manage_blocks_menu_item__WEBPACK_IMPORTED_MODULE_6__["default"], {
        onSelect: onClose
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["MenuItem"], {
        role: "menuitem",
        href: Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_4__["addQueryArgs"])('edit.php', {
          post_type: 'wp_block'
        })
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Manage all reusable blocks')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_keyboard_shortcuts_help_menu_item__WEBPACK_IMPORTED_MODULE_7__["default"], {
        onSelect: onClose
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_welcome_guide_menu_item__WEBPACK_IMPORTED_MODULE_9__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_copy_content_menu_item__WEBPACK_IMPORTED_MODULE_5__["default"], null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["MenuItem"], {
        role: "menuitem",
        href: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('https://wordpress.org/support/article/wordpress-editor/'),
        target: "_new"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Help')));
    }));
  }
});


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/plugins/keyboard-shortcuts-help-menu-item/index.js":
/*!***********************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/plugins/keyboard-shortcuts-help-menu-item/index.js ***!
  \***********************************************************************************************************/
/*! exports provided: KeyboardShortcutsHelpMenuItem, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "KeyboardShortcutsHelpMenuItem", function() { return KeyboardShortcutsHelpMenuItem; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/keycodes */ "@wordpress/keycodes");
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keycodes__WEBPACK_IMPORTED_MODULE_4__);


/**
 * WordPress dependencies
 */




function KeyboardShortcutsHelpMenuItem(_ref) {
  var openModal = _ref.openModal;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["MenuItem"], {
    onClick: function onClick() {
      openModal('edit-post/keyboard-shortcut-help');
    },
    shortcut: _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_4__["displayShortcut"].access('h')
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Keyboard shortcuts'));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      openModal = _dispatch.openModal;

  return {
    openModal: openModal
  };
})(KeyboardShortcutsHelpMenuItem));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/plugins/manage-blocks-menu-item/index.js":
/*!*************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/plugins/manage-blocks-menu-item/index.js ***!
  \*************************************************************************************************/
/*! exports provided: ManageBlocksMenuItem, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManageBlocksMenuItem", function() { return ManageBlocksMenuItem; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);


/**
 * WordPress dependencies
 */



function ManageBlocksMenuItem(_ref) {
  var openModal = _ref.openModal;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["MenuItem"], {
    onClick: function onClick() {
      openModal('edit-post/manage-blocks');
    }
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Block Manager'));
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/edit-post'),
      openModal = _dispatch.openModal;

  return {
    openModal: openModal
  };
})(ManageBlocksMenuItem));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/plugins/welcome-guide-menu-item/index.js":
/*!*************************************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/plugins/welcome-guide-menu-item/index.js ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return WelcomeGuideMenuItem; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);


/**
 * WordPress dependencies
 */



function WelcomeGuideMenuItem() {
  var _useDispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useDispatch"])('core/edit-post'),
      toggleFeature = _useDispatch.toggleFeature;

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["MenuItem"], {
    onClick: function onClick() {
      return toggleFeature('welcomeGuide');
    }
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Welcome Guide'));
}


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/prevent-event-discovery.js":
/*!***********************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/prevent-event-discovery.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  't a l e s o f g u t e n b e r g': function tALESOFGUTENBERG(event) {
    if (!document.activeElement.classList.contains('edit-post-visual-editor') && document.activeElement !== document.body) {
      return;
    }

    event.preventDefault();
    window.wp.data.dispatch('core/block-editor').insertBlock(window.wp.blocks.createBlock('core/paragraph', {
      content: '🐡🐢🦀🐤🦋🐘🐧🐹🦁🦄🦍🐼🐿🎃🐴🐝🐆🦕🦔🌱🍇π🍌🐉💧🥨🌌🍂🍠🥦🥚🥝🎟🥥🥒🛵🥖🍒🍯🎾🎲🐺🐚🐮⌛️'
    }));
  }
});


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/actions.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/actions.js ***!
  \*************************************************************************/
/*! exports provided: openGeneralSidebar, closeGeneralSidebar, openModal, closeModal, openPublishSidebar, closePublishSidebar, togglePublishSidebar, toggleEditorPanelEnabled, toggleEditorPanelOpened, removeEditorPanel, toggleFeature, switchEditorMode, togglePinnedPluginItem, hideBlockTypes, updatePreferredStyleVariations, __experimentalUpdateLocalAutosaveInterval, showBlockTypes, setAvailableMetaBoxesPerLocation, requestMetaBoxUpdates, metaBoxUpdatesSuccess */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "openGeneralSidebar", function() { return openGeneralSidebar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "closeGeneralSidebar", function() { return closeGeneralSidebar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "openModal", function() { return openModal; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "closeModal", function() { return closeModal; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "openPublishSidebar", function() { return openPublishSidebar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "closePublishSidebar", function() { return closePublishSidebar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "togglePublishSidebar", function() { return togglePublishSidebar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toggleEditorPanelEnabled", function() { return toggleEditorPanelEnabled; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toggleEditorPanelOpened", function() { return toggleEditorPanelOpened; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeEditorPanel", function() { return removeEditorPanel; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toggleFeature", function() { return toggleFeature; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "switchEditorMode", function() { return switchEditorMode; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "togglePinnedPluginItem", function() { return togglePinnedPluginItem; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hideBlockTypes", function() { return hideBlockTypes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "updatePreferredStyleVariations", function() { return updatePreferredStyleVariations; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__experimentalUpdateLocalAutosaveInterval", function() { return __experimentalUpdateLocalAutosaveInterval; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "showBlockTypes", function() { return showBlockTypes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setAvailableMetaBoxesPerLocation", function() { return setAvailableMetaBoxesPerLocation; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "requestMetaBoxUpdates", function() { return requestMetaBoxUpdates; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "metaBoxUpdatesSuccess", function() { return metaBoxUpdatesSuccess; });
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/**
 * External dependencies
 */

/**
 * Returns an action object used in signalling that the user opened an editor sidebar.
 *
 * @param {string} name Sidebar name to be opened.
 *
 * @return {Object} Action object.
 */

function openGeneralSidebar(name) {
  return {
    type: 'OPEN_GENERAL_SIDEBAR',
    name: name
  };
}
/**
 * Returns an action object signalling that the user closed the sidebar.
 *
 * @return {Object} Action object.
 */

function closeGeneralSidebar() {
  return {
    type: 'CLOSE_GENERAL_SIDEBAR'
  };
}
/**
 * Returns an action object used in signalling that the user opened a modal.
 *
 * @param {string} name A string that uniquely identifies the modal.
 *
 * @return {Object} Action object.
 */

function openModal(name) {
  return {
    type: 'OPEN_MODAL',
    name: name
  };
}
/**
 * Returns an action object signalling that the user closed a modal.
 *
 * @return {Object} Action object.
 */

function closeModal() {
  return {
    type: 'CLOSE_MODAL'
  };
}
/**
 * Returns an action object used in signalling that the user opened the publish
 * sidebar.
 *
 * @return {Object} Action object
 */

function openPublishSidebar() {
  return {
    type: 'OPEN_PUBLISH_SIDEBAR'
  };
}
/**
 * Returns an action object used in signalling that the user closed the
 * publish sidebar.
 *
 * @return {Object} Action object.
 */

function closePublishSidebar() {
  return {
    type: 'CLOSE_PUBLISH_SIDEBAR'
  };
}
/**
 * Returns an action object used in signalling that the user toggles the publish sidebar.
 *
 * @return {Object} Action object
 */

function togglePublishSidebar() {
  return {
    type: 'TOGGLE_PUBLISH_SIDEBAR'
  };
}
/**
 * Returns an action object used to enable or disable a panel in the editor.
 *
 * @param {string} panelName A string that identifies the panel to enable or disable.
 *
 * @return {Object} Action object.
 */

function toggleEditorPanelEnabled(panelName) {
  return {
    type: 'TOGGLE_PANEL_ENABLED',
    panelName: panelName
  };
}
/**
 * Returns an action object used to open or close a panel in the editor.
 *
 * @param {string} panelName A string that identifies the panel to open or close.
 *
 * @return {Object} Action object.
 */

function toggleEditorPanelOpened(panelName) {
  return {
    type: 'TOGGLE_PANEL_OPENED',
    panelName: panelName
  };
}
/**
 * Returns an action object used to remove a panel from the editor.
 *
 * @param {string} panelName A string that identifies the panel to remove.
 *
 * @return {Object} Action object.
 */

function removeEditorPanel(panelName) {
  return {
    type: 'REMOVE_PANEL',
    panelName: panelName
  };
}
/**
 * Returns an action object used to toggle a feature flag.
 *
 * @param {string} feature Feature name.
 *
 * @return {Object} Action object.
 */

function toggleFeature(feature) {
  return {
    type: 'TOGGLE_FEATURE',
    feature: feature
  };
}
function switchEditorMode(mode) {
  return {
    type: 'SWITCH_MODE',
    mode: mode
  };
}
/**
 * Returns an action object used to toggle a plugin name flag.
 *
 * @param {string} pluginName Plugin name.
 *
 * @return {Object} Action object.
 */

function togglePinnedPluginItem(pluginName) {
  return {
    type: 'TOGGLE_PINNED_PLUGIN_ITEM',
    pluginName: pluginName
  };
}
/**
 * Returns an action object used in signalling that block types by the given
 * name(s) should be hidden.
 *
 * @param {string[]} blockNames Names of block types to hide.
 *
 * @return {Object} Action object.
 */

function hideBlockTypes(blockNames) {
  return {
    type: 'HIDE_BLOCK_TYPES',
    blockNames: Object(lodash__WEBPACK_IMPORTED_MODULE_0__["castArray"])(blockNames)
  };
}
/**
 * Returns an action object used in signaling that a style should be auto-applied when a block is created.
 *
 * @param {string}  blockName  Name of the block.
 * @param {?string} blockStyle Name of the style that should be auto applied. If undefined, the "auto apply" setting of the block is removed.
 *
 * @return {Object} Action object.
 */

function updatePreferredStyleVariations(blockName, blockStyle) {
  return {
    type: 'UPDATE_PREFERRED_STYLE_VARIATIONS',
    blockName: blockName,
    blockStyle: blockStyle
  };
}
/**
 * Returns an action object used in signalling that the editor should attempt
 * to locally autosave the current post every `interval` seconds.
 *
 * @param {number} interval The new interval, in seconds.
 * @return {Object} Action object.
 */

function __experimentalUpdateLocalAutosaveInterval(interval) {
  return {
    type: 'UPDATE_LOCAL_AUTOSAVE_INTERVAL',
    interval: interval
  };
}
/**
 * Returns an action object used in signalling that block types by the given
 * name(s) should be shown.
 *
 * @param {string[]} blockNames Names of block types to show.
 *
 * @return {Object} Action object.
 */

function showBlockTypes(blockNames) {
  return {
    type: 'SHOW_BLOCK_TYPES',
    blockNames: Object(lodash__WEBPACK_IMPORTED_MODULE_0__["castArray"])(blockNames)
  };
}
/**
 * Returns an action object used in signaling
 * what Meta boxes are available in which location.
 *
 * @param {Object} metaBoxesPerLocation Meta boxes per location.
 *
 * @return {Object} Action object.
 */

function setAvailableMetaBoxesPerLocation(metaBoxesPerLocation) {
  return {
    type: 'SET_META_BOXES_PER_LOCATIONS',
    metaBoxesPerLocation: metaBoxesPerLocation
  };
}
/**
 * Returns an action object used to request meta box update.
 *
 * @return {Object} Action object.
 */

function requestMetaBoxUpdates() {
  return {
    type: 'REQUEST_META_BOX_UPDATES'
  };
}
/**
 * Returns an action object used signal a successful meta box update.
 *
 * @return {Object} Action object.
 */

function metaBoxUpdatesSuccess() {
  return {
    type: 'META_BOX_UPDATES_SUCCESS'
  };
}


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/constants.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/constants.js ***!
  \***************************************************************************/
/*! exports provided: STORE_KEY, VIEW_AS_LINK_SELECTOR, VIEW_AS_PREVIEW_LINK_SELECTOR */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "STORE_KEY", function() { return STORE_KEY; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "VIEW_AS_LINK_SELECTOR", function() { return VIEW_AS_LINK_SELECTOR; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "VIEW_AS_PREVIEW_LINK_SELECTOR", function() { return VIEW_AS_PREVIEW_LINK_SELECTOR; });
/**
 * The identifier for the data store.
 *
 * @type {string}
 */
var STORE_KEY = 'core/edit-post';
/**
 * CSS selector string for the admin bar view post link anchor tag.
 *
 * @type {string}
 */

var VIEW_AS_LINK_SELECTOR = '#wp-admin-bar-view a';
/**
 * CSS selector string for the admin bar preview post link anchor tag.
 *
 * @type {string}
 */

var VIEW_AS_PREVIEW_LINK_SELECTOR = '#wp-admin-bar-preview a';


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/controls.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/controls.js ***!
  \**************************************************************************/
/*! exports provided: select, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "select", function() { return select; });
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

/**
 * Calls a selector using the current state.
 *
 * @param {string} storeName    Store name.
 * @param {string} selectorName Selector name.
 * @param  {Array} args         Selector arguments.
 *
 * @return {Object} control descriptor.
 */

function select(storeName, selectorName) {
  for (var _len = arguments.length, args = new Array(_len > 2 ? _len - 2 : 0), _key = 2; _key < _len; _key++) {
    args[_key - 2] = arguments[_key];
  }

  return {
    type: 'SELECT',
    storeName: storeName,
    selectorName: selectorName,
    args: args
  };
}
var controls = {
  SELECT: Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["createRegistryControl"])(function (registry) {
    return function (_ref) {
      var _registry$select;

      var storeName = _ref.storeName,
          selectorName = _ref.selectorName,
          args = _ref.args;
      return (_registry$select = registry.select(storeName))[selectorName].apply(_registry$select, Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(args));
    };
  })
};
/* harmony default export */ __webpack_exports__["default"] = (controls);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/defaults.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/defaults.js ***!
  \**************************************************************************/
/*! exports provided: PREFERENCES_DEFAULTS */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PREFERENCES_DEFAULTS", function() { return PREFERENCES_DEFAULTS; });
var PREFERENCES_DEFAULTS = {
  editorMode: 'visual',
  isGeneralSidebarDismissed: false,
  panels: {
    'post-status': {
      opened: true
    }
  },
  features: {
    fixedToolbar: false,
    showInserterHelpPanel: true,
    welcomeGuide: true,
    fullscreenMode: true
  },
  pinnedPluginItems: {},
  hiddenBlockTypes: [],
  preferredStyleVariations: {},
  localAutosaveInterval: 15
};


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/effects.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/effects.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/slicedToArray */ "./node_modules/@babel/runtime/helpers/esm/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_a11y__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/a11y */ "@wordpress/a11y");
/* harmony import */ var _wordpress_a11y__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_a11y__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _actions__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./actions */ "./node_modules/@wordpress/edit-post/build-module/store/actions.js");
/* harmony import */ var _selectors__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./selectors */ "./node_modules/@wordpress/edit-post/build-module/store/selectors.js");
/* harmony import */ var _utils_meta_boxes__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../utils/meta-boxes */ "./node_modules/@wordpress/edit-post/build-module/utils/meta-boxes.js");



/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





/**
 * Internal dependencies
 */




var saveMetaboxUnsubscribe;
var effects = {
  SET_META_BOXES_PER_LOCATIONS: function SET_META_BOXES_PER_LOCATIONS(action, store) {
    // Allow toggling metaboxes panels
    // We need to wait for all scripts to load
    // If the meta box loads the post script, it will already trigger this.
    // After merge in Core, make sure to drop the timeout and update the postboxes script
    // to avoid the double binding.
    setTimeout(function () {
      var postType = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/editor').getCurrentPostType();

      if (window.postboxes.page !== postType) {
        window.postboxes.add_postbox_toggles(postType);
      }
    });
    var wasSavingPost = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/editor').isSavingPost();
    var wasAutosavingPost = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/editor').isAutosavingPost(); // Meta boxes are initialized once at page load. It is not necessary to
    // account for updates on each state change.
    //
    // See: https://github.com/WordPress/WordPress/blob/5.1.1/wp-admin/includes/post.php#L2307-L2309

    var hasActiveMetaBoxes = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/edit-post').hasMetaBoxes(); // First remove any existing subscription in order to prevent multiple saves

    if (!!saveMetaboxUnsubscribe) {
      saveMetaboxUnsubscribe();
    } // Save metaboxes when performing a full save on the post.


    saveMetaboxUnsubscribe = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["subscribe"])(function () {
      var isSavingPost = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/editor').isSavingPost();
      var isAutosavingPost = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/editor').isAutosavingPost(); // Save metaboxes on save completion, except for autosaves that are not a post preview.

      var shouldTriggerMetaboxesSave = hasActiveMetaBoxes && wasSavingPost && !isSavingPost && !wasAutosavingPost; // Save current state for next inspection.

      wasSavingPost = isSavingPost;
      wasAutosavingPost = isAutosavingPost;

      if (shouldTriggerMetaboxesSave) {
        store.dispatch(Object(_actions__WEBPACK_IMPORTED_MODULE_7__["requestMetaBoxUpdates"])());
      }
    });
  },
  REQUEST_META_BOX_UPDATES: function REQUEST_META_BOX_UPDATES(action, store) {
    // Saves the wp_editor fields
    if (window.tinyMCE) {
      window.tinyMCE.triggerSave();
    }

    var state = store.getState(); // Additional data needed for backward compatibility.
    // If we do not provide this data, the post will be overridden with the default values.

    var post = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/editor').getCurrentPost(state);
    var additionalData = [post.comment_status ? ['comment_status', post.comment_status] : false, post.ping_status ? ['ping_status', post.ping_status] : false, post.sticky ? ['sticky', post.sticky] : false, post.author ? ['post_author', post.author] : false].filter(Boolean); // We gather all the metaboxes locations data and the base form data

    var baseFormData = new window.FormData(document.querySelector('.metabox-base-form'));
    var formDataToMerge = [baseFormData].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__["default"])(Object(_selectors__WEBPACK_IMPORTED_MODULE_8__["getActiveMetaBoxLocations"])(state).map(function (location) {
      return new window.FormData(Object(_utils_meta_boxes__WEBPACK_IMPORTED_MODULE_9__["getMetaBoxContainer"])(location));
    }))); // Merge all form data objects into a single one.

    var formData = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["reduce"])(formDataToMerge, function (memo, currentFormData) {
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = currentFormData[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var _step$value = Object(_babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(_step.value, 2),
              key = _step$value[0],
              value = _step$value[1];

          memo.append(key, value);
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return != null) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }

      return memo;
    }, new window.FormData());
    additionalData.forEach(function (_ref) {
      var _ref2 = Object(_babel_runtime_helpers_esm_slicedToArray__WEBPACK_IMPORTED_MODULE_0__["default"])(_ref, 2),
          key = _ref2[0],
          value = _ref2[1];

      return formData.append(key, value);
    }); // Save the metaboxes

    _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_6___default()({
      url: window._wpMetaBoxUrl,
      method: 'POST',
      body: formData,
      parse: false
    }).then(function () {
      return store.dispatch(Object(_actions__WEBPACK_IMPORTED_MODULE_7__["metaBoxUpdatesSuccess"])());
    });
  },
  SWITCH_MODE: function SWITCH_MODE(action) {
    // Unselect blocks when we switch to the code editor.
    if (action.mode !== 'visual') {
      Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["dispatch"])('core/block-editor').clearSelectedBlock();
    }

    var message = action.mode === 'visual' ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Visual editor selected') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Code editor selected');
    Object(_wordpress_a11y__WEBPACK_IMPORTED_MODULE_4__["speak"])(message, 'assertive');
  }
};
/* harmony default export */ __webpack_exports__["default"] = (effects);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/index.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/index.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _reducer__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./reducer */ "./node_modules/@wordpress/edit-post/build-module/store/reducer.js");
/* harmony import */ var _middlewares__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./middlewares */ "./node_modules/@wordpress/edit-post/build-module/store/middlewares.js");
/* harmony import */ var _actions__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./actions */ "./node_modules/@wordpress/edit-post/build-module/store/actions.js");
/* harmony import */ var _selectors__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./selectors */ "./node_modules/@wordpress/edit-post/build-module/store/selectors.js");
/* harmony import */ var _controls__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./controls */ "./node_modules/@wordpress/edit-post/build-module/store/controls.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./constants */ "./node_modules/@wordpress/edit-post/build-module/store/constants.js");
/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */







var store = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["registerStore"])(_constants__WEBPACK_IMPORTED_MODULE_6__["STORE_KEY"], {
  reducer: _reducer__WEBPACK_IMPORTED_MODULE_1__["default"],
  actions: _actions__WEBPACK_IMPORTED_MODULE_3__,
  selectors: _selectors__WEBPACK_IMPORTED_MODULE_4__,
  controls: _controls__WEBPACK_IMPORTED_MODULE_5__["default"],
  persist: ['preferences']
});
Object(_middlewares__WEBPACK_IMPORTED_MODULE_2__["default"])(store);
/* harmony default export */ __webpack_exports__["default"] = (store);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/middlewares.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/middlewares.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var refx__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! refx */ "./node_modules/refx/refx.js");
/* harmony import */ var refx__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(refx__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _effects__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./effects */ "./node_modules/@wordpress/edit-post/build-module/store/effects.js");


/**
 * External dependencies
 */


/**
 * Internal dependencies
 */


/**
 * Applies the custom middlewares used specifically in the editor module.
 *
 * @param {Object} store Store Object.
 *
 * @return {Object} Update Store Object.
 */

function applyMiddlewares(store) {
  var middlewares = [refx__WEBPACK_IMPORTED_MODULE_2___default()(_effects__WEBPACK_IMPORTED_MODULE_3__["default"])];

  var enhancedDispatch = function enhancedDispatch() {
    throw new Error('Dispatching while constructing your middleware is not allowed. ' + 'Other middleware would not be applied to this dispatch.');
  };

  var chain = [];
  var middlewareAPI = {
    getState: store.getState,
    dispatch: function dispatch() {
      return enhancedDispatch.apply(void 0, arguments);
    }
  };
  chain = middlewares.map(function (middleware) {
    return middleware(middlewareAPI);
  });
  enhancedDispatch = lodash__WEBPACK_IMPORTED_MODULE_1__["flowRight"].apply(void 0, Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(chain))(store.dispatch);
  store.dispatch = enhancedDispatch;
  return store;
}

/* harmony default export */ __webpack_exports__["default"] = (applyMiddlewares);


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/reducer.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/reducer.js ***!
  \*************************************************************************/
/*! exports provided: DEFAULT_ACTIVE_GENERAL_SIDEBAR, preferences, removedPanels, activeGeneralSidebar, activeModal, publishSidebarActive, isSavingMetaBoxes, metaBoxLocations, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DEFAULT_ACTIVE_GENERAL_SIDEBAR", function() { return DEFAULT_ACTIVE_GENERAL_SIDEBAR; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "preferences", function() { return preferences; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removedPanels", function() { return removedPanels; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "activeGeneralSidebar", function() { return activeGeneralSidebar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "activeModal", function() { return activeModal; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "publishSidebarActive", function() { return publishSidebarActive; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isSavingMetaBoxes", function() { return isSavingMetaBoxes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "metaBoxLocations", function() { return metaBoxLocations; });
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _defaults__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./defaults */ "./node_modules/@wordpress/edit-post/build-module/store/defaults.js");



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */


/**
 * The default active general sidebar: The "Document" tab.
 *
 * @type {string}
 */

var DEFAULT_ACTIVE_GENERAL_SIDEBAR = 'edit-post/document';
/**
 * Higher-order reducer creator which provides the given initial state for the
 * original reducer.
 *
 * @param {*} initialState Initial state to provide to reducer.
 *
 * @return {Function} Higher-order reducer.
 */

var createWithInitialState = function createWithInitialState(initialState) {
  return function (reducer) {
    return function () {
      var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : initialState;
      var action = arguments.length > 1 ? arguments[1] : undefined;
      return reducer(state, action);
    };
  };
};
/**
 * Reducer returning the user preferences.
 *
 * @param {Object}  state                           Current state.
 * @param {string}  state.mode                      Current editor mode, either
 *                                                  "visual" or "text".
 * @param {boolean} state.isGeneralSidebarDismissed Whether general sidebar is
 *                                                  dismissed. False by default
 *                                                  or when closing general
 *                                                  sidebar, true when opening
 *                                                  sidebar.
 * @param {boolean} state.isSidebarOpened           Whether the sidebar is
 *                                                  opened or closed.
 * @param {Object}  state.panels                    The state of the different
 *                                                  sidebar panels.
 * @param {Object}  action                          Dispatched action.
 *
 * @return {Object} Updated state.
 */


var preferences = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["flow"])([_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["combineReducers"], createWithInitialState(_defaults__WEBPACK_IMPORTED_MODULE_4__["PREFERENCES_DEFAULTS"])])({
  isGeneralSidebarDismissed: function isGeneralSidebarDismissed(state, action) {
    switch (action.type) {
      case 'OPEN_GENERAL_SIDEBAR':
      case 'CLOSE_GENERAL_SIDEBAR':
        return action.type === 'CLOSE_GENERAL_SIDEBAR';
    }

    return state;
  },
  panels: function panels(state, action) {
    switch (action.type) {
      case 'TOGGLE_PANEL_ENABLED':
        {
          var panelName = action.panelName;
          return _objectSpread({}, state, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])({}, panelName, _objectSpread({}, state[panelName], {
            enabled: !Object(lodash__WEBPACK_IMPORTED_MODULE_2__["get"])(state, [panelName, 'enabled'], true)
          })));
        }

      case 'TOGGLE_PANEL_OPENED':
        {
          var _panelName = action.panelName;
          var isOpen = state[_panelName] === true || Object(lodash__WEBPACK_IMPORTED_MODULE_2__["get"])(state, [_panelName, 'opened'], false);
          return _objectSpread({}, state, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])({}, _panelName, _objectSpread({}, state[_panelName], {
            opened: !isOpen
          })));
        }
    }

    return state;
  },
  features: function features(state, action) {
    if (action.type === 'TOGGLE_FEATURE') {
      return _objectSpread({}, state, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])({}, action.feature, !state[action.feature]));
    }

    return state;
  },
  editorMode: function editorMode(state, action) {
    if (action.type === 'SWITCH_MODE') {
      return action.mode;
    }

    return state;
  },
  pinnedPluginItems: function pinnedPluginItems(state, action) {
    if (action.type === 'TOGGLE_PINNED_PLUGIN_ITEM') {
      return _objectSpread({}, state, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])({}, action.pluginName, !Object(lodash__WEBPACK_IMPORTED_MODULE_2__["get"])(state, [action.pluginName], true)));
    }

    return state;
  },
  hiddenBlockTypes: function hiddenBlockTypes(state, action) {
    switch (action.type) {
      case 'SHOW_BLOCK_TYPES':
        return lodash__WEBPACK_IMPORTED_MODULE_2__["without"].apply(void 0, [state].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(action.blockNames)));

      case 'HIDE_BLOCK_TYPES':
        return Object(lodash__WEBPACK_IMPORTED_MODULE_2__["union"])(state, action.blockNames);
    }

    return state;
  },
  preferredStyleVariations: function preferredStyleVariations(state, action) {
    switch (action.type) {
      case 'UPDATE_PREFERRED_STYLE_VARIATIONS':
        {
          if (!action.blockName) {
            return state;
          }

          if (!action.blockStyle) {
            return Object(lodash__WEBPACK_IMPORTED_MODULE_2__["omit"])(state, [action.blockName]);
          }

          return _objectSpread({}, state, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])({}, action.blockName, action.blockStyle));
        }
    }

    return state;
  },
  localAutosaveInterval: function localAutosaveInterval(state, action) {
    switch (action.type) {
      case 'UPDATE_LOCAL_AUTOSAVE_INTERVAL':
        return action.interval;
    }

    return state;
  }
});
/**
 * Reducer storing the list of all programmatically removed panels.
 *
 * @param {Array}  state  Current state.
 * @param {Object} action Action object.
 *
 * @return {Array} Updated state.
 */

function removedPanels() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'REMOVE_PANEL':
      if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["includes"])(state, action.panelName)) {
        return [].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(state), [action.panelName]);
      }

  }

  return state;
}
/**
 * Reducer returning the next active general sidebar state. The active general
 * sidebar is a unique name to identify either an editor or plugin sidebar.
 *
 * @param {?string} state  Current state.
 * @param {Object}  action Action object.
 *
 * @return {?string} Updated state.
 */

function activeGeneralSidebar() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : DEFAULT_ACTIVE_GENERAL_SIDEBAR;
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'OPEN_GENERAL_SIDEBAR':
      return action.name;
  }

  return state;
}
/**
 * Reducer for storing the name of the open modal, or null if no modal is open.
 *
 * @param {Object} state  Previous state.
 * @param {Object} action Action object containing the `name` of the modal
 *
 * @return {Object} Updated state
 */

function activeModal() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'OPEN_MODAL':
      return action.name;

    case 'CLOSE_MODAL':
      return null;
  }

  return state;
}
function publishSidebarActive() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'OPEN_PUBLISH_SIDEBAR':
      return true;

    case 'CLOSE_PUBLISH_SIDEBAR':
      return false;

    case 'TOGGLE_PUBLISH_SIDEBAR':
      return !state;
  }

  return state;
}
/**
 * Reducer keeping track of the meta boxes isSaving state.
 * A "true" value means the meta boxes saving request is in-flight.
 *
 *
 * @param {boolean}  state   Previous state.
 * @param {Object}   action  Action Object.
 *
 * @return {Object} Updated state.
 */

function isSavingMetaBoxes() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'REQUEST_META_BOX_UPDATES':
      return true;

    case 'META_BOX_UPDATES_SUCCESS':
      return false;

    default:
      return state;
  }
}
/**
 * Reducer keeping track of the meta boxes per location.
 *
 * @param {boolean}  state   Previous state.
 * @param {Object}   action  Action Object.
 *
 * @return {Object} Updated state.
 */

function metaBoxLocations() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'SET_META_BOXES_PER_LOCATIONS':
      return action.metaBoxesPerLocation;
  }

  return state;
}
var metaBoxes = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["combineReducers"])({
  isSaving: isSavingMetaBoxes,
  locations: metaBoxLocations
});
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["combineReducers"])({
  activeGeneralSidebar: activeGeneralSidebar,
  activeModal: activeModal,
  metaBoxes: metaBoxes,
  preferences: preferences,
  publishSidebarActive: publishSidebarActive,
  removedPanels: removedPanels
}));


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/store/selectors.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/store/selectors.js ***!
  \***************************************************************************/
/*! exports provided: getEditorMode, isEditorSidebarOpened, isPluginSidebarOpened, getActiveGeneralSidebarName, getPreferences, getPreference, isPublishSidebarOpened, isEditorPanelRemoved, isEditorPanelEnabled, isEditorPanelOpened, isModalActive, isFeatureActive, isPluginItemPinned, getActiveMetaBoxLocations, isMetaBoxLocationVisible, isMetaBoxLocationActive, getMetaBoxesPerLocation, getAllMetaBoxes, hasMetaBoxes, isSavingMetaBoxes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getEditorMode", function() { return getEditorMode; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isEditorSidebarOpened", function() { return isEditorSidebarOpened; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isPluginSidebarOpened", function() { return isPluginSidebarOpened; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getActiveGeneralSidebarName", function() { return getActiveGeneralSidebarName; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getPreferences", function() { return getPreferences; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getPreference", function() { return getPreference; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isPublishSidebarOpened", function() { return isPublishSidebarOpened; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isEditorPanelRemoved", function() { return isEditorPanelRemoved; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isEditorPanelEnabled", function() { return isEditorPanelEnabled; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isEditorPanelOpened", function() { return isEditorPanelOpened; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isModalActive", function() { return isModalActive; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isFeatureActive", function() { return isFeatureActive; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isPluginItemPinned", function() { return isPluginItemPinned; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getActiveMetaBoxLocations", function() { return getActiveMetaBoxLocations; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isMetaBoxLocationVisible", function() { return isMetaBoxLocationVisible; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isMetaBoxLocationActive", function() { return isMetaBoxLocationActive; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getMetaBoxesPerLocation", function() { return getMetaBoxesPerLocation; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getAllMetaBoxes", function() { return getAllMetaBoxes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hasMetaBoxes", function() { return hasMetaBoxes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isSavingMetaBoxes", function() { return isSavingMetaBoxes; });
/* harmony import */ var rememo__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! rememo */ "./node_modules/rememo/es/rememo.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/**
 * External dependencies
 */


/**
 * Returns the current editing mode.
 *
 * @param {Object} state Global application state.
 *
 * @return {string} Editing mode.
 */

function getEditorMode(state) {
  return getPreference(state, 'editorMode', 'visual');
}
/**
 * Returns true if the editor sidebar is opened.
 *
 * @param {Object} state Global application state
 *
 * @return {boolean} Whether the editor sidebar is opened.
 */

function isEditorSidebarOpened(state) {
  var activeGeneralSidebar = getActiveGeneralSidebarName(state);
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["includes"])(['edit-post/document', 'edit-post/block'], activeGeneralSidebar);
}
/**
 * Returns true if the plugin sidebar is opened.
 *
 * @param {Object} state Global application state
 * @return {boolean}     Whether the plugin sidebar is opened.
 */

function isPluginSidebarOpened(state) {
  var activeGeneralSidebar = getActiveGeneralSidebarName(state);
  return !!activeGeneralSidebar && !isEditorSidebarOpened(state);
}
/**
 * Returns the current active general sidebar name, or null if there is no
 * general sidebar active. The active general sidebar is a unique name to
 * identify either an editor or plugin sidebar.
 *
 * Examples:
 *
 *  - `edit-post/document`
 *  - `my-plugin/insert-image-sidebar`
 *
 * @param {Object} state Global application state.
 *
 * @return {?string} Active general sidebar name.
 */

function getActiveGeneralSidebarName(state) {
  // Dismissal takes precedent.
  var isDismissed = getPreference(state, 'isGeneralSidebarDismissed', false);

  if (isDismissed) {
    return null;
  }

  return state.activeGeneralSidebar;
}
/**
 * Returns the preferences (these preferences are persisted locally).
 *
 * @param {Object} state Global application state.
 *
 * @return {Object} Preferences Object.
 */

function getPreferences(state) {
  return state.preferences;
}
/**
 *
 * @param {Object} state         Global application state.
 * @param {string} preferenceKey Preference Key.
 * @param {*}      defaultValue  Default Value.
 *
 * @return {*} Preference Value.
 */

function getPreference(state, preferenceKey, defaultValue) {
  var preferences = getPreferences(state);
  var value = preferences[preferenceKey];
  return value === undefined ? defaultValue : value;
}
/**
 * Returns true if the publish sidebar is opened.
 *
 * @param {Object} state Global application state
 *
 * @return {boolean} Whether the publish sidebar is open.
 */

function isPublishSidebarOpened(state) {
  return state.publishSidebarActive;
}
/**
 * Returns true if the given panel was programmatically removed, or false otherwise.
 * All panels are not removed by default.
 *
 * @param {Object} state     Global application state.
 * @param {string} panelName A string that identifies the panel.
 *
 * @return {boolean} Whether or not the panel is removed.
 */

function isEditorPanelRemoved(state, panelName) {
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["includes"])(state.removedPanels, panelName);
}
/**
 * Returns true if the given panel is enabled, or false otherwise. Panels are
 * enabled by default.
 *
 * @param {Object} state     Global application state.
 * @param {string} panelName A string that identifies the panel.
 *
 * @return {boolean} Whether or not the panel is enabled.
 */

function isEditorPanelEnabled(state, panelName) {
  var panels = getPreference(state, 'panels');
  return !isEditorPanelRemoved(state, panelName) && Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(panels, [panelName, 'enabled'], true);
}
/**
 * Returns true if the given panel is open, or false otherwise. Panels are
 * closed by default.
 *
 * @param  {Object}  state     Global application state.
 * @param  {string}  panelName A string that identifies the panel.
 *
 * @return {boolean} Whether or not the panel is open.
 */

function isEditorPanelOpened(state, panelName) {
  var panels = getPreference(state, 'panels');
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(panels, [panelName]) === true || Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(panels, [panelName, 'opened']) === true;
}
/**
 * Returns true if a modal is active, or false otherwise.
 *
 * @param  {Object}  state 	   Global application state.
 * @param  {string}  modalName A string that uniquely identifies the modal.
 *
 * @return {boolean} Whether the modal is active.
 */

function isModalActive(state, modalName) {
  return state.activeModal === modalName;
}
/**
 * Returns whether the given feature is enabled or not.
 *
 * @param {Object} state   Global application state.
 * @param {string} feature Feature slug.
 *
 * @return {boolean} Is active.
 */

function isFeatureActive(state, feature) {
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(state.preferences.features, [feature], false);
}
/**
 * Returns true if the plugin item is pinned to the header.
 * When the value is not set it defaults to true.
 *
 * @param  {Object}  state      Global application state.
 * @param  {string}  pluginName Plugin item name.
 *
 * @return {boolean} Whether the plugin item is pinned.
 */

function isPluginItemPinned(state, pluginName) {
  var pinnedPluginItems = getPreference(state, 'pinnedPluginItems', {});
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["get"])(pinnedPluginItems, [pluginName], true);
}
/**
 * Returns an array of active meta box locations.
 *
 * @param {Object} state Post editor state.
 *
 * @return {string[]} Active meta box locations.
 */

var getActiveMetaBoxLocations = Object(rememo__WEBPACK_IMPORTED_MODULE_0__["default"])(function (state) {
  return Object.keys(state.metaBoxes.locations).filter(function (location) {
    return isMetaBoxLocationActive(state, location);
  });
}, function (state) {
  return [state.metaBoxes.locations];
});
/**
 * Returns true if a metabox location is active and visible
 *
 * @param {Object} state    Post editor state.
 * @param {string} location Meta box location to test.
 *
 * @return {boolean} Whether the meta box location is active and visible.
 */

function isMetaBoxLocationVisible(state, location) {
  return isMetaBoxLocationActive(state, location) && Object(lodash__WEBPACK_IMPORTED_MODULE_1__["some"])(getMetaBoxesPerLocation(state, location), function (_ref) {
    var id = _ref.id;
    return isEditorPanelEnabled(state, "meta-box-".concat(id));
  });
}
/**
 * Returns true if there is an active meta box in the given location, or false
 * otherwise.
 *
 * @param {Object} state    Post editor state.
 * @param {string} location Meta box location to test.
 *
 * @return {boolean} Whether the meta box location is active.
 */

function isMetaBoxLocationActive(state, location) {
  var metaBoxes = getMetaBoxesPerLocation(state, location);
  return !!metaBoxes && metaBoxes.length !== 0;
}
/**
 * Returns the list of all the available meta boxes for a given location.
 *
 * @param {Object} state    Global application state.
 * @param {string} location Meta box location to test.
 *
 * @return {?Array} List of meta boxes.
 */

function getMetaBoxesPerLocation(state, location) {
  return state.metaBoxes.locations[location];
}
/**
 * Returns the list of all the available meta boxes.
 *
 * @param {Object} state Global application state.
 *
 * @return {Array} List of meta boxes.
 */

var getAllMetaBoxes = Object(rememo__WEBPACK_IMPORTED_MODULE_0__["default"])(function (state) {
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["flatten"])(Object(lodash__WEBPACK_IMPORTED_MODULE_1__["values"])(state.metaBoxes.locations));
}, function (state) {
  return [state.metaBoxes.locations];
});
/**
 * Returns true if the post is using Meta Boxes
 *
 * @param  {Object} state Global application state
 *
 * @return {boolean} Whether there are metaboxes or not.
 */

function hasMetaBoxes(state) {
  return getActiveMetaBoxLocations(state).length > 0;
}
/**
 * Returns true if the Meta Boxes are being saved.
 *
 * @param   {Object}  state Global application state.
 *
 * @return {boolean} Whether the metaboxes are being saved.
 */

function isSavingMetaBoxes(state) {
  return state.metaBoxes.isSaving;
}


/***/ }),

/***/ "./node_modules/@wordpress/edit-post/build-module/utils/meta-boxes.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/edit-post/build-module/utils/meta-boxes.js ***!
  \****************************************************************************/
/*! exports provided: getMetaBoxContainer */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getMetaBoxContainer", function() { return getMetaBoxContainer; });
/**
 * Function returning the current Meta Boxes DOM Node in the editor
 * whether the meta box area is opened or not.
 * If the MetaBox Area is visible returns it, and returns the original container instead.
 *
 * @param   {string} location Meta Box location.
 * @return {string}          HTML content.
 */
var getMetaBoxContainer = function getMetaBoxContainer(location) {
  var area = document.querySelector(".edit-post-meta-boxes-area.is-".concat(location, " .metabox-location-").concat(location));

  if (area) {
    return area;
  }

  return document.querySelector('#metaboxes .metabox-location-' + location);
};


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/icon/index.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/icon/index.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */


function Icon(_ref) {
  var icon = _ref.icon,
      _ref$size = _ref.size,
      size = _ref$size === void 0 ? 24 : _ref$size,
      props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__["default"])(_ref, ["icon", "size"]);

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["cloneElement"])(icon, _objectSpread({
    width: size,
    height: size
  }, props));
}

/* harmony default export */ __webpack_exports__["default"] = (Icon);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/index.js":
/*!*************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/index.js ***!
  \*************************************************************/
/*! exports provided: Icon, alignCenter, alignJustify, alignLeft, alignRight, archive, arrowDown, arrowLeft, arrowRight, arrowUp, audio, button, calendar, category, check, chevronDown, chevronLeft, chevronRight, chevronUp, classic, close, code, cog, column, columns, comment, cover, file, formatBold, formatItalic, formatStrikethrough, gallery, group, heading, html, image, keyboardReturn, link, linkOff, list, mapMarker, mediaAndText, menu, more, moreHorizontal, navigation, pageBreak, paragraph, positionCenter, positionLeft, positionRight, pencil, plusCircle, postList, preformatted, pullquote, quote, redo, resizeCornerNE, rss, search, separator, shortcode, stretchFullWidth, stretchWide, table, tag, title, trash, undo, update, upload, verse, video, widget */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _icon__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./icon */ "./node_modules/@wordpress/icons/build-module/icon/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "Icon", function() { return _icon__WEBPACK_IMPORTED_MODULE_0__["default"]; });

/* harmony import */ var _library_align_center__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./library/align-center */ "./node_modules/@wordpress/icons/build-module/library/align-center.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "alignCenter", function() { return _library_align_center__WEBPACK_IMPORTED_MODULE_1__["default"]; });

/* harmony import */ var _library_align_justify__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./library/align-justify */ "./node_modules/@wordpress/icons/build-module/library/align-justify.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "alignJustify", function() { return _library_align_justify__WEBPACK_IMPORTED_MODULE_2__["default"]; });

/* harmony import */ var _library_align_left__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./library/align-left */ "./node_modules/@wordpress/icons/build-module/library/align-left.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "alignLeft", function() { return _library_align_left__WEBPACK_IMPORTED_MODULE_3__["default"]; });

/* harmony import */ var _library_align_right__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./library/align-right */ "./node_modules/@wordpress/icons/build-module/library/align-right.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "alignRight", function() { return _library_align_right__WEBPACK_IMPORTED_MODULE_4__["default"]; });

/* harmony import */ var _library_archive__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./library/archive */ "./node_modules/@wordpress/icons/build-module/library/archive.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "archive", function() { return _library_archive__WEBPACK_IMPORTED_MODULE_5__["default"]; });

/* harmony import */ var _library_arrow_down__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./library/arrow-down */ "./node_modules/@wordpress/icons/build-module/library/arrow-down.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "arrowDown", function() { return _library_arrow_down__WEBPACK_IMPORTED_MODULE_6__["default"]; });

/* harmony import */ var _library_arrow_left__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./library/arrow-left */ "./node_modules/@wordpress/icons/build-module/library/arrow-left.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "arrowLeft", function() { return _library_arrow_left__WEBPACK_IMPORTED_MODULE_7__["default"]; });

/* harmony import */ var _library_arrow_right__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./library/arrow-right */ "./node_modules/@wordpress/icons/build-module/library/arrow-right.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "arrowRight", function() { return _library_arrow_right__WEBPACK_IMPORTED_MODULE_8__["default"]; });

/* harmony import */ var _library_arrow_up__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./library/arrow-up */ "./node_modules/@wordpress/icons/build-module/library/arrow-up.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "arrowUp", function() { return _library_arrow_up__WEBPACK_IMPORTED_MODULE_9__["default"]; });

/* harmony import */ var _library_audio__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./library/audio */ "./node_modules/@wordpress/icons/build-module/library/audio.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "audio", function() { return _library_audio__WEBPACK_IMPORTED_MODULE_10__["default"]; });

/* harmony import */ var _library_button__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./library/button */ "./node_modules/@wordpress/icons/build-module/library/button.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "button", function() { return _library_button__WEBPACK_IMPORTED_MODULE_11__["default"]; });

/* harmony import */ var _library_calendar__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./library/calendar */ "./node_modules/@wordpress/icons/build-module/library/calendar.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "calendar", function() { return _library_calendar__WEBPACK_IMPORTED_MODULE_12__["default"]; });

/* harmony import */ var _library_category__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./library/category */ "./node_modules/@wordpress/icons/build-module/library/category.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "category", function() { return _library_category__WEBPACK_IMPORTED_MODULE_13__["default"]; });

/* harmony import */ var _library_check__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./library/check */ "./node_modules/@wordpress/icons/build-module/library/check.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "check", function() { return _library_check__WEBPACK_IMPORTED_MODULE_14__["default"]; });

/* harmony import */ var _library_chevron_down__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./library/chevron-down */ "./node_modules/@wordpress/icons/build-module/library/chevron-down.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "chevronDown", function() { return _library_chevron_down__WEBPACK_IMPORTED_MODULE_15__["default"]; });

/* harmony import */ var _library_chevron_left__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./library/chevron-left */ "./node_modules/@wordpress/icons/build-module/library/chevron-left.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "chevronLeft", function() { return _library_chevron_left__WEBPACK_IMPORTED_MODULE_16__["default"]; });

/* harmony import */ var _library_chevron_right__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./library/chevron-right */ "./node_modules/@wordpress/icons/build-module/library/chevron-right.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "chevronRight", function() { return _library_chevron_right__WEBPACK_IMPORTED_MODULE_17__["default"]; });

/* harmony import */ var _library_chevron_up__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./library/chevron-up */ "./node_modules/@wordpress/icons/build-module/library/chevron-up.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "chevronUp", function() { return _library_chevron_up__WEBPACK_IMPORTED_MODULE_18__["default"]; });

/* harmony import */ var _library_classic__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./library/classic */ "./node_modules/@wordpress/icons/build-module/library/classic.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "classic", function() { return _library_classic__WEBPACK_IMPORTED_MODULE_19__["default"]; });

/* harmony import */ var _library_close__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./library/close */ "./node_modules/@wordpress/icons/build-module/library/close.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "close", function() { return _library_close__WEBPACK_IMPORTED_MODULE_20__["default"]; });

/* harmony import */ var _library_code__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ./library/code */ "./node_modules/@wordpress/icons/build-module/library/code.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "code", function() { return _library_code__WEBPACK_IMPORTED_MODULE_21__["default"]; });

/* harmony import */ var _library_cog__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ./library/cog */ "./node_modules/@wordpress/icons/build-module/library/cog.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "cog", function() { return _library_cog__WEBPACK_IMPORTED_MODULE_22__["default"]; });

/* harmony import */ var _library_column__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! ./library/column */ "./node_modules/@wordpress/icons/build-module/library/column.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "column", function() { return _library_column__WEBPACK_IMPORTED_MODULE_23__["default"]; });

/* harmony import */ var _library_columns__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! ./library/columns */ "./node_modules/@wordpress/icons/build-module/library/columns.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "columns", function() { return _library_columns__WEBPACK_IMPORTED_MODULE_24__["default"]; });

/* harmony import */ var _library_comment__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! ./library/comment */ "./node_modules/@wordpress/icons/build-module/library/comment.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "comment", function() { return _library_comment__WEBPACK_IMPORTED_MODULE_25__["default"]; });

/* harmony import */ var _library_cover__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! ./library/cover */ "./node_modules/@wordpress/icons/build-module/library/cover.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "cover", function() { return _library_cover__WEBPACK_IMPORTED_MODULE_26__["default"]; });

/* harmony import */ var _library_file__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! ./library/file */ "./node_modules/@wordpress/icons/build-module/library/file.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "file", function() { return _library_file__WEBPACK_IMPORTED_MODULE_27__["default"]; });

/* harmony import */ var _library_format_bold__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! ./library/format-bold */ "./node_modules/@wordpress/icons/build-module/library/format-bold.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "formatBold", function() { return _library_format_bold__WEBPACK_IMPORTED_MODULE_28__["default"]; });

/* harmony import */ var _library_format_italic__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! ./library/format-italic */ "./node_modules/@wordpress/icons/build-module/library/format-italic.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "formatItalic", function() { return _library_format_italic__WEBPACK_IMPORTED_MODULE_29__["default"]; });

/* harmony import */ var _library_format_strikethrough__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! ./library/format-strikethrough */ "./node_modules/@wordpress/icons/build-module/library/format-strikethrough.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "formatStrikethrough", function() { return _library_format_strikethrough__WEBPACK_IMPORTED_MODULE_30__["default"]; });

/* harmony import */ var _library_gallery__WEBPACK_IMPORTED_MODULE_31__ = __webpack_require__(/*! ./library/gallery */ "./node_modules/@wordpress/icons/build-module/library/gallery.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "gallery", function() { return _library_gallery__WEBPACK_IMPORTED_MODULE_31__["default"]; });

/* harmony import */ var _library_group__WEBPACK_IMPORTED_MODULE_32__ = __webpack_require__(/*! ./library/group */ "./node_modules/@wordpress/icons/build-module/library/group.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "group", function() { return _library_group__WEBPACK_IMPORTED_MODULE_32__["default"]; });

/* harmony import */ var _library_heading__WEBPACK_IMPORTED_MODULE_33__ = __webpack_require__(/*! ./library/heading */ "./node_modules/@wordpress/icons/build-module/library/heading.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "heading", function() { return _library_heading__WEBPACK_IMPORTED_MODULE_33__["default"]; });

/* harmony import */ var _library_html__WEBPACK_IMPORTED_MODULE_34__ = __webpack_require__(/*! ./library/html */ "./node_modules/@wordpress/icons/build-module/library/html.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "html", function() { return _library_html__WEBPACK_IMPORTED_MODULE_34__["default"]; });

/* harmony import */ var _library_image__WEBPACK_IMPORTED_MODULE_35__ = __webpack_require__(/*! ./library/image */ "./node_modules/@wordpress/icons/build-module/library/image.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "image", function() { return _library_image__WEBPACK_IMPORTED_MODULE_35__["default"]; });

/* harmony import */ var _library_keyboard_return__WEBPACK_IMPORTED_MODULE_36__ = __webpack_require__(/*! ./library/keyboard-return */ "./node_modules/@wordpress/icons/build-module/library/keyboard-return.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "keyboardReturn", function() { return _library_keyboard_return__WEBPACK_IMPORTED_MODULE_36__["default"]; });

/* harmony import */ var _library_link__WEBPACK_IMPORTED_MODULE_37__ = __webpack_require__(/*! ./library/link */ "./node_modules/@wordpress/icons/build-module/library/link.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "link", function() { return _library_link__WEBPACK_IMPORTED_MODULE_37__["default"]; });

/* harmony import */ var _library_link_off__WEBPACK_IMPORTED_MODULE_38__ = __webpack_require__(/*! ./library/link-off */ "./node_modules/@wordpress/icons/build-module/library/link-off.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "linkOff", function() { return _library_link_off__WEBPACK_IMPORTED_MODULE_38__["default"]; });

/* harmony import */ var _library_list__WEBPACK_IMPORTED_MODULE_39__ = __webpack_require__(/*! ./library/list */ "./node_modules/@wordpress/icons/build-module/library/list.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "list", function() { return _library_list__WEBPACK_IMPORTED_MODULE_39__["default"]; });

/* harmony import */ var _library_map_marker__WEBPACK_IMPORTED_MODULE_40__ = __webpack_require__(/*! ./library/map-marker */ "./node_modules/@wordpress/icons/build-module/library/map-marker.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "mapMarker", function() { return _library_map_marker__WEBPACK_IMPORTED_MODULE_40__["default"]; });

/* harmony import */ var _library_media_and_text__WEBPACK_IMPORTED_MODULE_41__ = __webpack_require__(/*! ./library/media-and-text */ "./node_modules/@wordpress/icons/build-module/library/media-and-text.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "mediaAndText", function() { return _library_media_and_text__WEBPACK_IMPORTED_MODULE_41__["default"]; });

/* harmony import */ var _library_menu__WEBPACK_IMPORTED_MODULE_42__ = __webpack_require__(/*! ./library/menu */ "./node_modules/@wordpress/icons/build-module/library/menu.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "menu", function() { return _library_menu__WEBPACK_IMPORTED_MODULE_42__["default"]; });

/* harmony import */ var _library_more__WEBPACK_IMPORTED_MODULE_43__ = __webpack_require__(/*! ./library/more */ "./node_modules/@wordpress/icons/build-module/library/more.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "more", function() { return _library_more__WEBPACK_IMPORTED_MODULE_43__["default"]; });

/* harmony import */ var _library_more_horizontal__WEBPACK_IMPORTED_MODULE_44__ = __webpack_require__(/*! ./library/more-horizontal */ "./node_modules/@wordpress/icons/build-module/library/more-horizontal.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "moreHorizontal", function() { return _library_more_horizontal__WEBPACK_IMPORTED_MODULE_44__["default"]; });

/* harmony import */ var _library_navigation__WEBPACK_IMPORTED_MODULE_45__ = __webpack_require__(/*! ./library/navigation */ "./node_modules/@wordpress/icons/build-module/library/navigation.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "navigation", function() { return _library_navigation__WEBPACK_IMPORTED_MODULE_45__["default"]; });

/* harmony import */ var _library_page_break__WEBPACK_IMPORTED_MODULE_46__ = __webpack_require__(/*! ./library/page-break */ "./node_modules/@wordpress/icons/build-module/library/page-break.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "pageBreak", function() { return _library_page_break__WEBPACK_IMPORTED_MODULE_46__["default"]; });

/* harmony import */ var _library_paragraph__WEBPACK_IMPORTED_MODULE_47__ = __webpack_require__(/*! ./library/paragraph */ "./node_modules/@wordpress/icons/build-module/library/paragraph.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "paragraph", function() { return _library_paragraph__WEBPACK_IMPORTED_MODULE_47__["default"]; });

/* harmony import */ var _library_position_center__WEBPACK_IMPORTED_MODULE_48__ = __webpack_require__(/*! ./library/position-center */ "./node_modules/@wordpress/icons/build-module/library/position-center.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "positionCenter", function() { return _library_position_center__WEBPACK_IMPORTED_MODULE_48__["default"]; });

/* harmony import */ var _library_position_left__WEBPACK_IMPORTED_MODULE_49__ = __webpack_require__(/*! ./library/position-left */ "./node_modules/@wordpress/icons/build-module/library/position-left.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "positionLeft", function() { return _library_position_left__WEBPACK_IMPORTED_MODULE_49__["default"]; });

/* harmony import */ var _library_position_right__WEBPACK_IMPORTED_MODULE_50__ = __webpack_require__(/*! ./library/position-right */ "./node_modules/@wordpress/icons/build-module/library/position-right.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "positionRight", function() { return _library_position_right__WEBPACK_IMPORTED_MODULE_50__["default"]; });

/* harmony import */ var _library_pencil__WEBPACK_IMPORTED_MODULE_51__ = __webpack_require__(/*! ./library/pencil */ "./node_modules/@wordpress/icons/build-module/library/pencil.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "pencil", function() { return _library_pencil__WEBPACK_IMPORTED_MODULE_51__["default"]; });

/* harmony import */ var _library_plus_circle__WEBPACK_IMPORTED_MODULE_52__ = __webpack_require__(/*! ./library/plus-circle */ "./node_modules/@wordpress/icons/build-module/library/plus-circle.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "plusCircle", function() { return _library_plus_circle__WEBPACK_IMPORTED_MODULE_52__["default"]; });

/* harmony import */ var _library_post_list__WEBPACK_IMPORTED_MODULE_53__ = __webpack_require__(/*! ./library/post-list */ "./node_modules/@wordpress/icons/build-module/library/post-list.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "postList", function() { return _library_post_list__WEBPACK_IMPORTED_MODULE_53__["default"]; });

/* harmony import */ var _library_preformatted__WEBPACK_IMPORTED_MODULE_54__ = __webpack_require__(/*! ./library/preformatted */ "./node_modules/@wordpress/icons/build-module/library/preformatted.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "preformatted", function() { return _library_preformatted__WEBPACK_IMPORTED_MODULE_54__["default"]; });

/* harmony import */ var _library_pullquote__WEBPACK_IMPORTED_MODULE_55__ = __webpack_require__(/*! ./library/pullquote */ "./node_modules/@wordpress/icons/build-module/library/pullquote.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "pullquote", function() { return _library_pullquote__WEBPACK_IMPORTED_MODULE_55__["default"]; });

/* harmony import */ var _library_quote__WEBPACK_IMPORTED_MODULE_56__ = __webpack_require__(/*! ./library/quote */ "./node_modules/@wordpress/icons/build-module/library/quote.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "quote", function() { return _library_quote__WEBPACK_IMPORTED_MODULE_56__["default"]; });

/* harmony import */ var _library_redo__WEBPACK_IMPORTED_MODULE_57__ = __webpack_require__(/*! ./library/redo */ "./node_modules/@wordpress/icons/build-module/library/redo.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "redo", function() { return _library_redo__WEBPACK_IMPORTED_MODULE_57__["default"]; });

/* harmony import */ var _library_resize_corner_n_e__WEBPACK_IMPORTED_MODULE_58__ = __webpack_require__(/*! ./library/resize-corner-n-e */ "./node_modules/@wordpress/icons/build-module/library/resize-corner-n-e.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "resizeCornerNE", function() { return _library_resize_corner_n_e__WEBPACK_IMPORTED_MODULE_58__["default"]; });

/* harmony import */ var _library_rss__WEBPACK_IMPORTED_MODULE_59__ = __webpack_require__(/*! ./library/rss */ "./node_modules/@wordpress/icons/build-module/library/rss.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "rss", function() { return _library_rss__WEBPACK_IMPORTED_MODULE_59__["default"]; });

/* harmony import */ var _library_search__WEBPACK_IMPORTED_MODULE_60__ = __webpack_require__(/*! ./library/search */ "./node_modules/@wordpress/icons/build-module/library/search.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "search", function() { return _library_search__WEBPACK_IMPORTED_MODULE_60__["default"]; });

/* harmony import */ var _library_separator__WEBPACK_IMPORTED_MODULE_61__ = __webpack_require__(/*! ./library/separator */ "./node_modules/@wordpress/icons/build-module/library/separator.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "separator", function() { return _library_separator__WEBPACK_IMPORTED_MODULE_61__["default"]; });

/* harmony import */ var _library_shortcode__WEBPACK_IMPORTED_MODULE_62__ = __webpack_require__(/*! ./library/shortcode */ "./node_modules/@wordpress/icons/build-module/library/shortcode.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "shortcode", function() { return _library_shortcode__WEBPACK_IMPORTED_MODULE_62__["default"]; });

/* harmony import */ var _library_stretch_full_width__WEBPACK_IMPORTED_MODULE_63__ = __webpack_require__(/*! ./library/stretch-full-width */ "./node_modules/@wordpress/icons/build-module/library/stretch-full-width.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "stretchFullWidth", function() { return _library_stretch_full_width__WEBPACK_IMPORTED_MODULE_63__["default"]; });

/* harmony import */ var _library_stretch_wide__WEBPACK_IMPORTED_MODULE_64__ = __webpack_require__(/*! ./library/stretch-wide */ "./node_modules/@wordpress/icons/build-module/library/stretch-wide.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "stretchWide", function() { return _library_stretch_wide__WEBPACK_IMPORTED_MODULE_64__["default"]; });

/* harmony import */ var _library_table__WEBPACK_IMPORTED_MODULE_65__ = __webpack_require__(/*! ./library/table */ "./node_modules/@wordpress/icons/build-module/library/table.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "table", function() { return _library_table__WEBPACK_IMPORTED_MODULE_65__["default"]; });

/* harmony import */ var _library_tag__WEBPACK_IMPORTED_MODULE_66__ = __webpack_require__(/*! ./library/tag */ "./node_modules/@wordpress/icons/build-module/library/tag.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "tag", function() { return _library_tag__WEBPACK_IMPORTED_MODULE_66__["default"]; });

/* harmony import */ var _library_title__WEBPACK_IMPORTED_MODULE_67__ = __webpack_require__(/*! ./library/title */ "./node_modules/@wordpress/icons/build-module/library/title.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "title", function() { return _library_title__WEBPACK_IMPORTED_MODULE_67__["default"]; });

/* harmony import */ var _library_trash__WEBPACK_IMPORTED_MODULE_68__ = __webpack_require__(/*! ./library/trash */ "./node_modules/@wordpress/icons/build-module/library/trash.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "trash", function() { return _library_trash__WEBPACK_IMPORTED_MODULE_68__["default"]; });

/* harmony import */ var _library_undo__WEBPACK_IMPORTED_MODULE_69__ = __webpack_require__(/*! ./library/undo */ "./node_modules/@wordpress/icons/build-module/library/undo.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "undo", function() { return _library_undo__WEBPACK_IMPORTED_MODULE_69__["default"]; });

/* harmony import */ var _library_update__WEBPACK_IMPORTED_MODULE_70__ = __webpack_require__(/*! ./library/update */ "./node_modules/@wordpress/icons/build-module/library/update.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "update", function() { return _library_update__WEBPACK_IMPORTED_MODULE_70__["default"]; });

/* harmony import */ var _library_upload__WEBPACK_IMPORTED_MODULE_71__ = __webpack_require__(/*! ./library/upload */ "./node_modules/@wordpress/icons/build-module/library/upload.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "upload", function() { return _library_upload__WEBPACK_IMPORTED_MODULE_71__["default"]; });

/* harmony import */ var _library_verse__WEBPACK_IMPORTED_MODULE_72__ = __webpack_require__(/*! ./library/verse */ "./node_modules/@wordpress/icons/build-module/library/verse.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "verse", function() { return _library_verse__WEBPACK_IMPORTED_MODULE_72__["default"]; });

/* harmony import */ var _library_video__WEBPACK_IMPORTED_MODULE_73__ = __webpack_require__(/*! ./library/video */ "./node_modules/@wordpress/icons/build-module/library/video.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "video", function() { return _library_video__WEBPACK_IMPORTED_MODULE_73__["default"]; });

/* harmony import */ var _library_widget__WEBPACK_IMPORTED_MODULE_74__ = __webpack_require__(/*! ./library/widget */ "./node_modules/@wordpress/icons/build-module/library/widget.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "widget", function() { return _library_widget__WEBPACK_IMPORTED_MODULE_74__["default"]; });














































































/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/align-center.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/align-center.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var alignCenter = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M14 5V3H6v2h8zm3 4V7H3v2h14zm-3 4v-2H6v2h8zm3 4v-2H3v2h14z"
}));
/* harmony default export */ __webpack_exports__["default"] = (alignCenter);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/align-justify.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/align-justify.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var alignJustify = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "https://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M3 15h18v-2H3v2zm0 4h18v-2H3v2zm0-8h18V9H3v2zm0-6v2h18V5H3z"
}));
/* harmony default export */ __webpack_exports__["default"] = (alignJustify);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/align-left.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/align-left.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var alignLeft = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12 5V3H3v2h9zm5 4V7H3v2h14zm-5 4v-2H3v2h9zm5 4v-2H3v2h14z"
}));
/* harmony default export */ __webpack_exports__["default"] = (alignLeft);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/align-right.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/align-right.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var alignRight = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M17 5V3H8v2h9zm0 4V7H3v2h14zm0 4v-2H8v2h9zm0 4v-2H3v2h14z"
}));
/* harmony default export */ __webpack_exports__["default"] = (alignRight);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/archive.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/archive.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var archive = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M21 6V20C21 21.1 20.1 22 19 22H5C3.89 22 3 21.1 3 20L3.01 6C3.01 4.9 3.89 4 5 4H6V2H8V4H16V2H18V4H19C20.1 4 21 4.9 21 6ZM5 8H19V6H5V8ZM19 20V10H5V20H19ZM11 12H17V14H11V12ZM17 16H11V18H17V16ZM7 12H9V14H7V12ZM9 18V16H7V18H9Z"
}));
/* harmony default export */ __webpack_exports__["default"] = (archive);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/arrow-down.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/arrow-down.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var arrowDown = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M9 2h2v12l4-4 2 1-7 7-7-7 2-1 4 4V2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (arrowDown);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/arrow-left.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/arrow-left.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var arrowLeft = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M18 9v2H6l4 4-1 2-7-7 7-7 1 2-4 4h12z"
}));
/* harmony default export */ __webpack_exports__["default"] = (arrowLeft);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/arrow-right.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/arrow-right.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var arrowRight = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M2 11V9h12l-4-4 1-2 7 7-7 7-1-2 4-4H2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (arrowRight);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/arrow-up.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/arrow-up.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var arrowUp = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M11 18H9V6l-4 4-2-1 7-7 7 7-2 1-4-4v12z"
}));
/* harmony default export */ __webpack_exports__["default"] = (arrowUp);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/audio.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/audio.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var audio = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "m12 3l0.01 10.55c-0.59-0.34-1.27-0.55-2-0.55-2.22 0-4.01 1.79-4.01 4s1.79 4 4.01 4 3.99-1.79 3.99-4v-10h4v-4h-6zm-1.99 16c-1.1 0-2-0.9-2-2s0.9-2 2-2 2 0.9 2 2-0.9 2-2 2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (audio);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/button.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/button.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var button = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z"
}));
/* harmony default export */ __webpack_exports__["default"] = (button);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/calendar.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/calendar.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var calendar = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M7 11h2v2H7v-2zm14-5v14c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2l.01-14c0-1.1.88-2 1.99-2h1V2h2v2h8V2h2v2h1c1.1 0 2 .9 2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (calendar);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/category.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/category.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var category = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12,2l-5.5,9h11L12,2z M12,5.84L13.93,9h-3.87L12,5.84z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "m17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "m3 21.5h8v-8h-8v8zm2-6h4v4h-4v-4z"
}));
/* harmony default export */ __webpack_exports__["default"] = (category);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/check.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/check.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var check = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M15.3 5.3l-6.8 6.8-2.8-2.8-1.4 1.4 4.2 4.2 8.2-8.2"
}));
/* harmony default export */ __webpack_exports__["default"] = (check);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/chevron-down.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/chevron-down.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var chevronDown = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"
}));
/* harmony default export */ __webpack_exports__["default"] = (chevronDown);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/chevron-left.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/chevron-left.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var chevronLeft = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M14 5l-5 5 5 5-1 2-7-7 7-7z"
}));
/* harmony default export */ __webpack_exports__["default"] = (chevronLeft);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/chevron-right.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/chevron-right.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var chevronRight = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M6 15l5-5-5-5 1-2 7 7-7 7z"
}));
/* harmony default export */ __webpack_exports__["default"] = (chevronRight);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/chevron-up.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/chevron-up.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var chevronUp = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12,8l-6,6l1.41,1.41L12,10.83l4.59,4.58L18,14L12,8z"
}));
/* harmony default export */ __webpack_exports__["default"] = (chevronUp);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/classic.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/classic.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var classic = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "m20 7v10h-16v-10h16m0-2h-16c-1.1 0-1.99 0.9-1.99 2l-0.01 10c0 1.1 0.9 2 2 2h16c1.1 0 2-0.9 2-2v-10c0-1.1-0.9-2-2-2z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "11",
  y: "8",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "11",
  y: "11",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "8",
  y: "8",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "8",
  y: "11",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "5",
  y: "11",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "5",
  y: "8",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "8",
  y: "14",
  width: "8",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "14",
  y: "11",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "14",
  y: "8",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "17",
  y: "11",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "17",
  y: "8",
  width: "2",
  height: "2"
}));
/* harmony default export */ __webpack_exports__["default"] = (classic);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/close.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/close.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var close = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M14.95 6.46L11.41 10l3.54 3.54-1.41 1.41L10 11.42l-3.53 3.53-1.42-1.42L8.58 10 5.05 6.47l1.42-1.42L10 8.58l3.54-3.53z"
}));
/* harmony default export */ __webpack_exports__["default"] = (close);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/code.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/code.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var code = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M9.4,16.6L4.8,12l4.6-4.6L8,6l-6,6l6,6L9.4,16.6z M14.6,16.6l4.6-4.6l-4.6-4.6L16,6l6,6l-6,6L14.6,16.6z"
}));
/* harmony default export */ __webpack_exports__["default"] = (code);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/cog.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/cog.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var cog = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M18 12h-2.18c-.17.7-.44 1.35-.81 1.93l1.54 1.54-2.1 2.1-1.54-1.54c-.58.36-1.23.63-1.91.79V19H8v-2.18c-.68-.16-1.33-.43-1.91-.79l-1.54 1.54-2.12-2.12 1.54-1.54c-.36-.58-.63-1.23-.79-1.91H1V9.03h2.17c.16-.7.44-1.35.8-1.94L2.43 5.55l2.1-2.1 1.54 1.54c.58-.37 1.24-.64 1.93-.81V2h3v2.18c.68.16 1.33.43 1.91.79l1.54-1.54 2.12 2.12-1.54 1.54c.36.59.64 1.24.8 1.94H18V12zm-8.5 1.5c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3z"
}));
/* harmony default export */ __webpack_exports__["default"] = (cog);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/column.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/column.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var column = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M11.99 18.54l-7.37-5.73L3 14.07l9 7 9-7-1.63-1.27zM12 16l7.36-5.73L21 9l-9-7-9 7 1.63 1.27L12 16zm0-11.47L17.74 9 12 13.47 6.26 9 12 4.53z"
}));
/* harmony default export */ __webpack_exports__["default"] = (column);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/columns.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/columns.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var columns = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M4,4H20a2,2,0,0,1,2,2V18a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4ZM4 6V18H8V6Zm6 0V18h4V6Zm6 0V18h4V6Z"
}));
/* harmony default export */ __webpack_exports__["default"] = (columns);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/comment.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/comment.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var comment = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM20 4v13.17L18.83 16H4V4h16zM6 12h12v2H6zm0-3h12v2H6zm0-3h12v2H6z"
}));
/* harmony default export */ __webpack_exports__["default"] = (comment);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/cover.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/cover.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var cover = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"
}));
/* harmony default export */ __webpack_exports__["default"] = (cover);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/file.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/file.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var file = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M9.17 6l2 2H20v10H4V6h5.17M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (file);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/format-bold.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/format-bold.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var formatBold = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M6 4v13h4.54c1.37 0 2.46-.33 3.26-1 .8-.66 1.2-1.58 1.2-2.77 0-.84-.17-1.51-.51-2.01s-.9-.85-1.67-1.03v-.09c.57-.1 1.02-.4 1.36-.9s.51-1.13.51-1.91c0-1.14-.39-1.98-1.17-2.5C12.75 4.26 11.5 4 9.78 4H6zm2.57 5.15V6.26h1.36c.73 0 1.27.11 1.61.32.34.22.51.58.51 1.07 0 .54-.16.92-.47 1.15s-.82.35-1.51.35h-1.5zm0 2.19h1.6c1.44 0 2.16.53 2.16 1.61 0 .6-.17 1.05-.51 1.34s-.86.43-1.57.43H8.57v-3.38z"
}));
/* harmony default export */ __webpack_exports__["default"] = (formatBold);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/format-italic.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/format-italic.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var formatItalic = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M14.78 6h-2.13l-2.8 9h2.12l-.62 2H4.6l.62-2h2.14l2.8-9H8.03l.62-2h6.75z"
}));
/* harmony default export */ __webpack_exports__["default"] = (formatItalic);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/format-strikethrough.js":
/*!************************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/format-strikethrough.js ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var formatStrikethrough = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M15.82 12.25c.26 0 .5-.02.74-.07.23-.05.48-.12.73-.2v.84c-.46.17-.99.26-1.58.26-.88 0-1.54-.26-2.01-.79-.39-.44-.62-1.04-.68-1.79h-.94c.12.21.18.48.18.79 0 .54-.18.95-.55 1.26-.38.3-.9.45-1.56.45H8v-2.5H6.59l.93 2.5H6.49l-.59-1.67H3.62L3.04 13H2l.93-2.5H2v-1h1.31l.93-2.49H5.3l.92 2.49H8V7h1.77c1 0 1.41.17 1.77.41.37.24.55.62.55 1.13 0 .35-.09.64-.27.87l-.08.09h1.29c.05-.4.15-.77.31-1.1.23-.46.55-.82.98-1.06.43-.25.93-.37 1.51-.37.61 0 1.17.12 1.69.38l-.35.81c-.2-.1-.42-.18-.64-.25s-.46-.11-.71-.11c-.55 0-.99.2-1.31.59-.23.29-.38.66-.44 1.11H17v1h-2.95c.06.5.2.9.44 1.19.3.37.75.56 1.33.56zM4.44 8.96l-.18.54H5.3l-.22-.61c-.04-.11-.09-.28-.17-.51-.07-.24-.12-.41-.14-.51-.08.33-.18.69-.33 1.09zm4.53-1.09V9.5h1.19c.28-.02.49-.09.64-.18.19-.13.28-.35.28-.66 0-.28-.1-.48-.3-.61-.2-.12-.53-.18-.97-.18h-.84zm-3.33 2.64v-.01H3.91v.01h1.73zm5.28.01l-.03-.02H8.97v1.68h1.04c.4 0 .71-.08.92-.23.21-.16.31-.4.31-.74 0-.31-.11-.54-.32-.69z"
}));
/* harmony default export */ __webpack_exports__["default"] = (formatStrikethrough);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/gallery.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/gallery.js ***!
  \***********************************************************************/
/*! exports provided: gallery, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "gallery", function() { return gallery; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var gallery = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M20 4v12H8V4h12m0-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 9.67l1.69 2.26 2.48-3.1L19 15H9zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (gallery);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/group.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/group.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var group = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  fillRule: "evenodd",
  clipRule: "evenodd",
  d: "M9 8a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-1v3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h1V8zm2 3h4V9h-4v2zm2 2H9v2h4v-2z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  fillRule: "evenodd",
  clipRule: "evenodd",
  d: "M2 4.732A2 2 0 1 1 4.732 2h14.536A2 2 0 1 1 22 4.732v14.536A2 2 0 1 1 19.268 22H4.732A2 2 0 1 1 2 19.268V4.732zM4.732 4h14.536c.175.304.428.557.732.732v14.536a2.01 2.01 0 0 0-.732.732H4.732A2.01 2.01 0 0 0 4 19.268V4.732A2.01 2.01 0 0 0 4.732 4z"
}));
/* harmony default export */ __webpack_exports__["default"] = (group);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/heading.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/heading.js ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var heading = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12.5 4v5.2h-5V4H5v13h2.5v-5.2h5V17H15V4"
}));
/* harmony default export */ __webpack_exports__["default"] = (heading);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/html.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/html.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M4.5,11h-2V9H1v6h1.5v-2.5h2V15H6V9H4.5V11z M7,10.5h1.5V15H10v-4.5h1.5V9H7V10.5z M14.5,10l-1-1H12v6h1.5v-3.9  l1,1l1-1V15H17V9h-1.5L14.5,10z M19.5,13.5V9H18v6h5v-1.5H19.5z"
}));
/* harmony default export */ __webpack_exports__["default"] = (html);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/image.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/image.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var image = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "m19 5v14h-14v-14h14m0-2h-14c-1.1 0-2 0.9-2 2v14c0 1.1 0.9 2 2 2h14c1.1 0 2-0.9 2-2v-14c0-1.1-0.9-2-2-2z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "m14.14 11.86l-3 3.87-2.14-2.59-3 3.86h12l-3.86-5.14z"
}));
/* harmony default export */ __webpack_exports__["default"] = (image);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/keyboard-return.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/keyboard-return.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var keyboardReturn = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M16 4h2v9H7v3l-5-4 5-4v3h9V4z"
}));
/* harmony default export */ __webpack_exports__["default"] = (keyboardReturn);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/link-off.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/link-off.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var linkOff = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M17.74 2.26c1.68 1.69 1.68 4.41 0 6.1l-1.53 1.52c-.32.33-.69.58-1.08.77L13 10l1.69-1.64.76-.77.76-.76c.84-.84.84-2.2 0-3.04-.84-.85-2.2-.85-3.04 0l-.77.76-.76.76L10 7l-.65-2.14c.19-.38.44-.75.77-1.07l1.52-1.53c1.69-1.68 4.42-1.68 6.1 0zM2 4l8 6-6-8zm4-2l4 8-2-8H6zM2 6l8 4-8-2V6zm7.36 7.69L10 13l.74 2.35-1.38 1.39c-1.69 1.68-4.41 1.68-6.1 0-1.68-1.68-1.68-4.42 0-6.1l1.39-1.38L7 10l-.69.64-1.52 1.53c-.85.84-.85 2.2 0 3.04.84.85 2.2.85 3.04 0zM18 16l-8-6 6 8zm-4 2l-4-8 2 8h2zm4-4l-8-4 8 2v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (linkOff);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/link.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/link.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var link = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M17.74 2.76c1.68 1.69 1.68 4.41 0 6.1l-1.53 1.52c-1.12 1.12-2.7 1.47-4.14 1.09l2.62-2.61.76-.77.76-.76c.84-.84.84-2.2 0-3.04-.84-.85-2.2-.85-3.04 0l-.77.76-3.38 3.38c-.37-1.44-.02-3.02 1.1-4.14l1.52-1.53c1.69-1.68 4.42-1.68 6.1 0zM8.59 13.43l5.34-5.34c.42-.42.42-1.1 0-1.52-.44-.43-1.13-.39-1.53 0l-5.33 5.34c-.42.42-.42 1.1 0 1.52.44.43 1.13.39 1.52 0zm-.76 2.29l4.14-4.15c.38 1.44.03 3.02-1.09 4.14l-1.52 1.53c-1.69 1.68-4.41 1.68-6.1 0-1.68-1.68-1.68-4.42 0-6.1l1.53-1.52c1.12-1.12 2.7-1.47 4.14-1.1l-4.14 4.15c-.85.84-.85 2.2 0 3.05.84.84 2.2.84 3.04 0z"
}));
/* harmony default export */ __webpack_exports__["default"] = (link);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/list.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/list.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var list = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M9 19h12v-2H9v2zm0-6h12v-2H9v2zm0-8v2h12V5H9zm-4-.5c-.828 0-1.5.672-1.5 1.5S4.172 7.5 5 7.5 6.5 6.828 6.5 6 5.828 4.5 5 4.5zm0 6c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5zm0 6c-.828 0-1.5.672-1.5 1.5s.672 1.5 1.5 1.5 1.5-.672 1.5-1.5-.672-1.5-1.5-1.5z"
}));
/* harmony default export */ __webpack_exports__["default"] = (list);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/map-marker.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/map-marker.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var mapMarker = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "https://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Circle"], {
  cx: "12",
  cy: "9",
  r: "2.5"
}));
/* harmony default export */ __webpack_exports__["default"] = (mapMarker);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/media-and-text.js":
/*!******************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/media-and-text.js ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var mediaAndText = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M13 17h8v-2h-8v2zM3 19h8V5H3v14zM13 9h8V7h-8v2zm0 4h8v-2h-8v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (mediaAndText);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/menu.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/menu.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var menu = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M17 7V5H3v2h14zm0 4V9H3v2h14zm0 4v-2H3v2h14z"
}));
/* harmony default export */ __webpack_exports__["default"] = (menu);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/more-horizontal.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/more-horizontal.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var moreHorizontal = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M5 10c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zm12-2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-7 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (moreHorizontal);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/more.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/more.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var more = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M2 9v2h19V9H2zm0 6h5v-2H2v2zm7 0h5v-2H9v2zm7 0h5v-2h-5v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (more);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/navigation.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/navigation.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var navigation = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12 7.27l4.28 10.43-3.47-1.53-.81-.36-.81.36-3.47 1.53L12 7.27M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71L12 2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (navigation);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/page-break.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/page-break.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var pageBreak = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M9 11h6v2H9zM2 11h5v2H2zM17 11h5v2h-5zM6 4h7v5h7V8l-6-6H6a2 2 0 0 0-2 2v5h2zM18 20H6v-5H4v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5h-2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (pageBreak);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/paragraph.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/paragraph.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var paragraph = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M11 5v7H9.5C7.6 12 6 10.4 6 8.5S7.6 5 9.5 5H11m8-2H9.5C6.5 3 4 5.5 4 8.5S6.5 14 9.5 14H11v7h2V5h2v16h2V5h2V3z"
}));
/* harmony default export */ __webpack_exports__["default"] = (paragraph);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/pencil.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/pencil.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var pencil = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6zM13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"
}));
/* harmony default export */ __webpack_exports__["default"] = (pencil);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/plus-circle.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/plus-circle.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var plusCircle = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M10 1c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 16c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7-3.1 7-7 7zm1-11H9v3H6v2h3v3h2v-3h3V9h-3V6zM10 1c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 16c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7-3.1 7-7 7zm1-11H9v3H6v2h3v3h2v-3h3V9h-3V6z"
}));
/* harmony default export */ __webpack_exports__["default"] = (plusCircle);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/position-center.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/position-center.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var positionCenter = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M3 5h14V3H3v2zm12 8V7H5v6h10zM3 17h14v-2H3v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (positionCenter);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/position-left.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/position-left.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var positionLeft = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M3 5h14V3H3v2zm9 8V7H3v6h9zm2-4h3V7h-3v2zm0 4h3v-2h-3v2zM3 17h14v-2H3v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (positionLeft);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/position-right.js":
/*!******************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/position-right.js ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var positionRight = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M3 5h14V3H3v2zm0 4h3V7H3v2zm14 4V7H8v6h9zM3 13h3v-2H3v2zm0 4h14v-2H3v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (positionRight);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/post-list.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/post-list.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var postList = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "11",
  y: "7",
  width: "6",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "11",
  y: "11",
  width: "6",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "11",
  y: "15",
  width: "6",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "7",
  y: "7",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "7",
  y: "11",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "7",
  y: "15",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M20.1,3H3.9C3.4,3,3,3.4,3,3.9v16.2C3,20.5,3.4,21,3.9,21h16.2c0.4,0,0.9-0.5,0.9-0.9V3.9C21,3.4,20.5,3,20.1,3z M19,19H5V5h14V19z"
}));
/* harmony default export */ __webpack_exports__["default"] = (postList);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/preformatted.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/preformatted.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var preformatted = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M20,4H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V6C22,4.9,21.1,4,20,4z M20,18H4V6h16V18z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "6",
  y: "10",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "6",
  y: "14",
  width: "8",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "16",
  y: "14",
  width: "2",
  height: "2"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Rect"], {
  x: "10",
  y: "10",
  width: "8",
  height: "2"
}));
/* harmony default export */ __webpack_exports__["default"] = (preformatted);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/pullquote.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/pullquote.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var pullquote = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Polygon"], {
  points: "21 18 2 18 2 20 21 20"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "m19 10v4h-15v-4h15m1-2h-17c-0.55 0-1 0.45-1 1v6c0 0.55 0.45 1 1 1h17c0.55 0 1-0.45 1-1v-6c0-0.55-0.45-1-1-1z"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Polygon"], {
  points: "21 4 2 4 2 6 21 6"
}));
/* harmony default export */ __webpack_exports__["default"] = (pullquote);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/quote.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/quote.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var quote = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M18.62 18h-5.24l2-4H13V6h8v7.24L18.62 18zm-2-2h.76L19 12.76V8h-4v4h3.62l-2 4zm-8 2H3.38l2-4H3V6h8v7.24L8.62 18zm-2-2h.76L9 12.76V8H5v4h3.62l-2 4z"
}));
/* harmony default export */ __webpack_exports__["default"] = (quote);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/redo.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/redo.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var redo = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M8 5h5V2l6 4-6 4V7H8c-2.2 0-4 1.8-4 4s1.8 4 4 4h5v2H8c-3.3 0-6-2.7-6-6s2.7-6 6-6z"
}));
/* harmony default export */ __webpack_exports__["default"] = (redo);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/resize-corner-n-e.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/resize-corner-n-e.js ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var resizeCornerNE = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M13 4v2h3.59L6 16.59V13H4v7h7v-2H7.41L18 7.41V11h2V4h-7"
}));
/* harmony default export */ __webpack_exports__["default"] = (resizeCornerNE);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/rss.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/rss.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var rss = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M14.92 18H18C18 9.32 10.82 2.25 2 2.25v3.02c7.12 0 12.92 5.71 12.92 12.73zm-5.44 0h3.08C12.56 12.27 7.82 7.6 2 7.6v3.02c2 0 3.87.77 5.29 2.16C8.7 14.17 9.48 16.03 9.48 18zm-5.35-.02c1.17 0 2.13-.93 2.13-2.09 0-1.15-.96-2.09-2.13-2.09-1.18 0-2.13.94-2.13 2.09 0 1.16.95 2.09 2.13 2.09z"
}));
/* harmony default export */ __webpack_exports__["default"] = (rss);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/search.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/search.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var search = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12.14 4.18c1.87 1.87 2.11 4.75.72 6.89.12.1.22.21.36.31.2.16.47.36.81.59.34.24.56.39.66.47.42.31.73.57.94.78.32.32.6.65.84 1 .25.35.44.69.59 1.04.14.35.21.68.18 1-.02.32-.14.59-.36.81s-.49.34-.81.36c-.31.02-.65-.04-.99-.19-.35-.14-.7-.34-1.04-.59-.35-.24-.68-.52-1-.84-.21-.21-.47-.52-.77-.93-.1-.13-.25-.35-.47-.66-.22-.32-.4-.57-.56-.78-.16-.2-.29-.35-.44-.5-2.07 1.09-4.69.76-6.44-.98-2.14-2.15-2.14-5.64 0-7.78 2.15-2.15 5.63-2.15 7.78 0zm-1.41 6.36c1.36-1.37 1.36-3.58 0-4.95-1.37-1.37-3.59-1.37-4.95 0-1.37 1.37-1.37 3.58 0 4.95 1.36 1.37 3.58 1.37 4.95 0z"
}));
/* harmony default export */ __webpack_exports__["default"] = (search);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/separator.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/separator.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var separator = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M19 13H5v-2h14v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (separator);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/shortcode.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/shortcode.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var shortcode = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M8.5,21.4l1.9,0.5l5.2-19.3l-1.9-0.5L8.5,21.4z M3,19h4v-2H5V7h2V5H3V19z M17,5v2h2v10h-2v2h4V5H17z"
}));
/* harmony default export */ __webpack_exports__["default"] = (shortcode);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/stretch-full-width.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/stretch-full-width.js ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var stretchFullWidth = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M17 13V3H3v10h14zM5 17h10v-2H5v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (stretchFullWidth);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/stretch-wide.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/stretch-wide.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var stretchWide = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M5 5h10V3H5v2zm12 8V7H3v6h14zM5 17h10v-2H5v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (stretchWide);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/table.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/table.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var table = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H5V5h15zm-5 14h-5v-9h5v9zM5 10h3v9H5v-9zm12 9v-9h3v9h-3z"
}));
/* harmony default export */ __webpack_exports__["default"] = (table);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/tag.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/tag.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var tag = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M11 2h7v7L8 19l-7-7zm3 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (tag);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/title.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/title.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var title = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "https://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M5 4v3h5.5v12h3V7H19V4H5z"
}));
/* harmony default export */ __webpack_exports__["default"] = (title);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/trash.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/trash.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var trash = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"
}));
/* harmony default export */ __webpack_exports__["default"] = (trash);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/undo.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/undo.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var undo = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M12 5H7V2L1 6l6 4V7h5c2.2 0 4 1.8 4 4s-1.8 4-4 4H7v2h5c3.3 0 6-2.7 6-6s-2.7-6-6-6z"
}));
/* harmony default export */ __webpack_exports__["default"] = (undo);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/update.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/update.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var update = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M10.2 3.28c3.53 0 6.43 2.61 6.92 6h2.08l-3.5 4-3.5-4h2.32c-.45-1.97-2.21-3.45-4.32-3.45-1.45 0-2.73.71-3.54 1.78L4.95 5.66C6.23 4.2 8.11 3.28 10.2 3.28zm-.4 13.44c-3.52 0-6.43-2.61-6.92-6H.8l3.5-4c1.17 1.33 2.33 2.67 3.5 4H5.48c.45 1.97 2.21 3.45 4.32 3.45 1.45 0 2.73-.71 3.54-1.78l1.71 1.95c-1.28 1.46-3.15 2.38-5.25 2.38z"
}));
/* harmony default export */ __webpack_exports__["default"] = (update);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/upload.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/upload.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var upload = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "-2 -2 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M8 14V8H5l5-6 5 6h-3v6H8zm-2 2v-6H4v8h12.01v-8H14v6H6z"
}));
/* harmony default export */ __webpack_exports__["default"] = (upload);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/verse.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/verse.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var verse = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M21 11.01L3 11V13H21V11.01ZM3 16H17V18H3V16ZM15 6H3V8.01L15 8V6Z"
}));
/* harmony default export */ __webpack_exports__["default"] = (verse);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/video.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/video.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var video = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M4 6.47L5.76 10H20v8H4V6.47M22 4h-4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4z"
}));
/* harmony default export */ __webpack_exports__["default"] = (video);


/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/widget.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/widget.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

var widget = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M7 11h2v2H7v-2zm14-5v14l-2 2H5l-2-2V6l2-2h1V2h2v2h8V2h2v2h1l2 2zM5 8h14V6H5v2zm14 12V10H5v10h14zm-4-7h2v-2h-2v2zm-4 0h2v-2h-2v2z"
}));
/* harmony default export */ __webpack_exports__["default"] = (widget);


/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2017 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames () {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg) && arg.length) {
				var inner = classNames.apply(null, arg);
				if (inner) {
					classes.push(inner);
				}
			} else if (argType === 'object') {
				for (var key in arg) {
					if (hasOwn.call(arg, key) && arg[key]) {
						classes.push(key);
					}
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./node_modules/memize/index.js":
/*!**************************************!*\
  !*** ./node_modules/memize/index.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Memize options object.
 *
 * @typedef MemizeOptions
 *
 * @property {number} [maxSize] Maximum size of the cache.
 */

/**
 * Internal cache entry.
 *
 * @typedef MemizeCacheNode
 *
 * @property {?MemizeCacheNode|undefined} [prev] Previous node.
 * @property {?MemizeCacheNode|undefined} [next] Next node.
 * @property {Array<*>}                   args   Function arguments for cache
 *                                               entry.
 * @property {*}                          val    Function result.
 */

/**
 * Properties of the enhanced function for controlling cache.
 *
 * @typedef MemizeMemoizedFunction
 *
 * @property {()=>void} clear Clear the cache.
 */

/**
 * Accepts a function to be memoized, and returns a new memoized function, with
 * optional options.
 *
 * @template {Function} F
 *
 * @param {F}             fn        Function to memoize.
 * @param {MemizeOptions} [options] Options object.
 *
 * @return {F & MemizeMemoizedFunction} Memoized function.
 */
function memize( fn, options ) {
	var size = 0;

	/** @type {?MemizeCacheNode|undefined} */
	var head;

	/** @type {?MemizeCacheNode|undefined} */
	var tail;

	options = options || {};

	function memoized( /* ...args */ ) {
		var node = head,
			len = arguments.length,
			args, i;

		searchCache: while ( node ) {
			// Perform a shallow equality test to confirm that whether the node
			// under test is a candidate for the arguments passed. Two arrays
			// are shallowly equal if their length matches and each entry is
			// strictly equal between the two sets. Avoid abstracting to a
			// function which could incur an arguments leaking deoptimization.

			// Check whether node arguments match arguments length
			if ( node.args.length !== arguments.length ) {
				node = node.next;
				continue;
			}

			// Check whether node arguments match arguments values
			for ( i = 0; i < len; i++ ) {
				if ( node.args[ i ] !== arguments[ i ] ) {
					node = node.next;
					continue searchCache;
				}
			}

			// At this point we can assume we've found a match

			// Surface matched node to head if not already
			if ( node !== head ) {
				// As tail, shift to previous. Must only shift if not also
				// head, since if both head and tail, there is no previous.
				if ( node === tail ) {
					tail = node.prev;
				}

				// Adjust siblings to point to each other. If node was tail,
				// this also handles new tail's empty `next` assignment.
				/** @type {MemizeCacheNode} */ ( node.prev ).next = node.next;
				if ( node.next ) {
					node.next.prev = node.prev;
				}

				node.next = head;
				node.prev = null;
				/** @type {MemizeCacheNode} */ ( head ).prev = node;
				head = node;
			}

			// Return immediately
			return node.val;
		}

		// No cached value found. Continue to insertion phase:

		// Create a copy of arguments (avoid leaking deoptimization)
		args = new Array( len );
		for ( i = 0; i < len; i++ ) {
			args[ i ] = arguments[ i ];
		}

		node = {
			args: args,

			// Generate the result from original function
			val: fn.apply( null, args ),
		};

		// Don't need to check whether node is already head, since it would
		// have been returned above already if it was

		// Shift existing head down list
		if ( head ) {
			head.prev = node;
			node.next = head;
		} else {
			// If no head, follows that there's no tail (at initial or reset)
			tail = node;
		}

		// Trim tail if we're reached max size and are pending cache insertion
		if ( size === /** @type {MemizeOptions} */ ( options ).maxSize ) {
			tail = /** @type {MemizeCacheNode} */ ( tail ).prev;
			/** @type {MemizeCacheNode} */ ( tail ).next = null;
		} else {
			size++;
		}

		head = node;

		return node.val;
	}

	memoized.clear = function() {
		head = null;
		tail = null;
		size = 0;
	};

	if ( false ) {}

	// Ignore reason: There's not a clear solution to create an intersection of
	// the function with additional properties, where the goal is to retain the
	// function signature of the incoming argument and add control properties
	// on the return value.

	// @ts-ignore
	return memoized;
}

module.exports = memize;


/***/ }),

/***/ "./node_modules/refx/refx.js":
/*!***********************************!*\
  !*** ./node_modules/refx/refx.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function flattenIntoMap( map, effects ) {
	var i;
	if ( Array.isArray( effects ) ) {
		for ( i = 0; i < effects.length; i++ ) {
			flattenIntoMap( map, effects[ i ] );
		}
	} else {
		for ( i in effects ) {
			map[ i ] = ( map[ i ] || [] ).concat( effects[ i ] );
		}
	}
}

function refx( effects ) {
	var map = {},
		middleware;

	flattenIntoMap( map, effects );

	middleware = function( store ) {
		return function( next ) {
			return function( action ) {
				var handlers = map[ action.type ],
					result = next( action ),
					i, handlerAction;

				if ( handlers ) {
					for ( i = 0; i < handlers.length; i++ ) {
						handlerAction = handlers[ i ]( action, store );
						if ( handlerAction ) {
							store.dispatch( handlerAction );
						}
					}
				}

				return result;
			};
		};
	};

	middleware.effects = map;

	return middleware;
}

module.exports = refx;


/***/ }),

/***/ "./node_modules/rememo/es/rememo.js":
/*!******************************************!*\
  !*** ./node_modules/rememo/es/rememo.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);


var LEAF_KEY, hasWeakMap;

/**
 * Arbitrary value used as key for referencing cache object in WeakMap tree.
 *
 * @type {Object}
 */
LEAF_KEY = {};

/**
 * Whether environment supports WeakMap.
 *
 * @type {boolean}
 */
hasWeakMap = typeof WeakMap !== 'undefined';

/**
 * Returns the first argument as the sole entry in an array.
 *
 * @param {*} value Value to return.
 *
 * @return {Array} Value returned as entry in array.
 */
function arrayOf( value ) {
	return [ value ];
}

/**
 * Returns true if the value passed is object-like, or false otherwise. A value
 * is object-like if it can support property assignment, e.g. object or array.
 *
 * @param {*} value Value to test.
 *
 * @return {boolean} Whether value is object-like.
 */
function isObjectLike( value ) {
	return !! value && 'object' === typeof value;
}

/**
 * Creates and returns a new cache object.
 *
 * @return {Object} Cache object.
 */
function createCache() {
	var cache = {
		clear: function() {
			cache.head = null;
		},
	};

	return cache;
}

/**
 * Returns true if entries within the two arrays are strictly equal by
 * reference from a starting index.
 *
 * @param {Array}  a         First array.
 * @param {Array}  b         Second array.
 * @param {number} fromIndex Index from which to start comparison.
 *
 * @return {boolean} Whether arrays are shallowly equal.
 */
function isShallowEqual( a, b, fromIndex ) {
	var i;

	if ( a.length !== b.length ) {
		return false;
	}

	for ( i = fromIndex; i < a.length; i++ ) {
		if ( a[ i ] !== b[ i ] ) {
			return false;
		}
	}

	return true;
}

/**
 * Returns a memoized selector function. The getDependants function argument is
 * called before the memoized selector and is expected to return an immutable
 * reference or array of references on which the selector depends for computing
 * its own return value. The memoize cache is preserved only as long as those
 * dependant references remain the same. If getDependants returns a different
 * reference(s), the cache is cleared and the selector value regenerated.
 *
 * @param {Function} selector      Selector function.
 * @param {Function} getDependants Dependant getter returning an immutable
 *                                 reference or array of reference used in
 *                                 cache bust consideration.
 *
 * @return {Function} Memoized selector.
 */
/* harmony default export */ __webpack_exports__["default"] = (function( selector, getDependants ) {
	var rootCache, getCache;

	// Use object source as dependant if getter not provided
	if ( ! getDependants ) {
		getDependants = arrayOf;
	}

	/**
	 * Returns the root cache. If WeakMap is supported, this is assigned to the
	 * root WeakMap cache set, otherwise it is a shared instance of the default
	 * cache object.
	 *
	 * @return {(WeakMap|Object)} Root cache object.
	 */
	function getRootCache() {
		return rootCache;
	}

	/**
	 * Returns the cache for a given dependants array. When possible, a WeakMap
	 * will be used to create a unique cache for each set of dependants. This
	 * is feasible due to the nature of WeakMap in allowing garbage collection
	 * to occur on entries where the key object is no longer referenced. Since
	 * WeakMap requires the key to be an object, this is only possible when the
	 * dependant is object-like. The root cache is created as a hierarchy where
	 * each top-level key is the first entry in a dependants set, the value a
	 * WeakMap where each key is the next dependant, and so on. This continues
	 * so long as the dependants are object-like. If no dependants are object-
	 * like, then the cache is shared across all invocations.
	 *
	 * @see isObjectLike
	 *
	 * @param {Array} dependants Selector dependants.
	 *
	 * @return {Object} Cache object.
	 */
	function getWeakMapCache( dependants ) {
		var caches = rootCache,
			isUniqueByDependants = true,
			i, dependant, map, cache;

		for ( i = 0; i < dependants.length; i++ ) {
			dependant = dependants[ i ];

			// Can only compose WeakMap from object-like key.
			if ( ! isObjectLike( dependant ) ) {
				isUniqueByDependants = false;
				break;
			}

			// Does current segment of cache already have a WeakMap?
			if ( caches.has( dependant ) ) {
				// Traverse into nested WeakMap.
				caches = caches.get( dependant );
			} else {
				// Create, set, and traverse into a new one.
				map = new WeakMap();
				caches.set( dependant, map );
				caches = map;
			}
		}

		// We use an arbitrary (but consistent) object as key for the last item
		// in the WeakMap to serve as our running cache.
		if ( ! caches.has( LEAF_KEY ) ) {
			cache = createCache();
			cache.isUniqueByDependants = isUniqueByDependants;
			caches.set( LEAF_KEY, cache );
		}

		return caches.get( LEAF_KEY );
	}

	// Assign cache handler by availability of WeakMap
	getCache = hasWeakMap ? getWeakMapCache : getRootCache;

	/**
	 * Resets root memoization cache.
	 */
	function clear() {
		rootCache = hasWeakMap ? new WeakMap() : createCache();
	}

	// eslint-disable-next-line jsdoc/check-param-names
	/**
	 * The augmented selector call, considering first whether dependants have
	 * changed before passing it to underlying memoize function.
	 *
	 * @param {Object} source    Source object for derivation.
	 * @param {...*}   extraArgs Additional arguments to pass to selector.
	 *
	 * @return {*} Selector result.
	 */
	function callSelector( /* source, ...extraArgs */ ) {
		var len = arguments.length,
			cache, node, i, args, dependants;

		// Create copy of arguments (avoid leaking deoptimization).
		args = new Array( len );
		for ( i = 0; i < len; i++ ) {
			args[ i ] = arguments[ i ];
		}

		dependants = getDependants.apply( null, args );
		cache = getCache( dependants );

		// If not guaranteed uniqueness by dependants (primitive type or lack
		// of WeakMap support), shallow compare against last dependants and, if
		// references have changed, destroy cache to recalculate result.
		if ( ! cache.isUniqueByDependants ) {
			if ( cache.lastDependants && ! isShallowEqual( dependants, cache.lastDependants, 0 ) ) {
				cache.clear();
			}

			cache.lastDependants = dependants;
		}

		node = cache.head;
		while ( node ) {
			// Check whether node arguments match arguments
			if ( ! isShallowEqual( node.args, args, 1 ) ) {
				node = node.next;
				continue;
			}

			// At this point we can assume we've found a match

			// Surface matched node to head if not already
			if ( node !== cache.head ) {
				// Adjust siblings to point to each other.
				node.prev.next = node.next;
				if ( node.next ) {
					node.next.prev = node.prev;
				}

				node.next = cache.head;
				node.prev = null;
				cache.head.prev = node;
				cache.head = node;
			}

			// Return immediately
			return node.val;
		}

		// No cached value found. Continue to insertion phase:

		node = {
			// Generate the result from original function
			val: selector.apply( null, args ),
		};

		// Avoid including the source object in the cache.
		args[ 0 ] = null;
		node.args = args;

		// Don't need to check whether node is already head, since it would
		// have been returned above already if it was

		// Shift existing head down list
		if ( cache.head ) {
			cache.head.prev = node;
			node.next = cache.head;
		}

		cache.head = node;

		return node.val;
	}

	callSelector.getDependants = getDependants;
	callSelector.clear = clear;
	clear();

	return callSelector;
});


/***/ }),

/***/ "@wordpress/a11y":
/*!***************************************!*\
  !*** external {"this":["wp","a11y"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["a11y"]; }());

/***/ }),

/***/ "@wordpress/api-fetch":
/*!*******************************************!*\
  !*** external {"this":["wp","apiFetch"]} ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["apiFetch"]; }());

/***/ }),

/***/ "@wordpress/block-editor":
/*!**********************************************!*\
  !*** external {"this":["wp","blockEditor"]} ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blockEditor"]; }());

/***/ }),

/***/ "@wordpress/block-library":
/*!***********************************************!*\
  !*** external {"this":["wp","blockLibrary"]} ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blockLibrary"]; }());

/***/ }),

/***/ "@wordpress/blocks":
/*!*****************************************!*\
  !*** external {"this":["wp","blocks"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!*********************************************!*\
  !*** external {"this":["wp","components"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/compose":
/*!******************************************!*\
  !*** external {"this":["wp","compose"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["compose"]; }());

/***/ }),

/***/ "@wordpress/core-data":
/*!*******************************************!*\
  !*** external {"this":["wp","coreData"]} ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["coreData"]; }());

/***/ }),

/***/ "@wordpress/data":
/*!***************************************!*\
  !*** external {"this":["wp","data"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/editor":
/*!*****************************************!*\
  !*** external {"this":["wp","editor"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["editor"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/hooks":
/*!****************************************!*\
  !*** external {"this":["wp","hooks"]} ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["hooks"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!***************************************!*\
  !*** external {"this":["wp","i18n"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["i18n"]; }());

/***/ }),

/***/ "@wordpress/keyboard-shortcuts":
/*!****************************************************!*\
  !*** external {"this":["wp","keyboardShortcuts"]} ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["keyboardShortcuts"]; }());

/***/ }),

/***/ "@wordpress/keycodes":
/*!*******************************************!*\
  !*** external {"this":["wp","keycodes"]} ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["keycodes"]; }());

/***/ }),

/***/ "@wordpress/media-utils":
/*!*********************************************!*\
  !*** external {"this":["wp","mediaUtils"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["mediaUtils"]; }());

/***/ }),

/***/ "@wordpress/notices":
/*!******************************************!*\
  !*** external {"this":["wp","notices"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["notices"]; }());

/***/ }),

/***/ "@wordpress/plugins":
/*!******************************************!*\
  !*** external {"this":["wp","plugins"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["plugins"]; }());

/***/ }),

/***/ "@wordpress/primitives":
/*!*********************************************!*\
  !*** external {"this":["wp","primitives"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["primitives"]; }());

/***/ }),

/***/ "@wordpress/url":
/*!**************************************!*\
  !*** external {"this":["wp","url"]} ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["url"]; }());

/***/ }),

/***/ "@wordpress/viewport":
/*!*******************************************!*\
  !*** external {"this":["wp","viewport"]} ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["viewport"]; }());

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
//# sourceMappingURL=edit-post.js.map