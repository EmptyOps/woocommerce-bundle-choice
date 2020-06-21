this["wp"] = this["wp"] || {}; this["wp"]["richText"] =
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
/******/ 	return __webpack_require__(__webpack_require__.s = "./node_modules/@wordpress/rich-text/build-module/index.js");
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

/***/ "./node_modules/@wordpress/rich-text/build-module/apply-format.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/apply-format.js ***!
  \************************************************************************/
/*! exports provided: applyFormat */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "applyFormat", function() { return applyFormat; });
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _normalise_formats__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./normalise-formats */ "./node_modules/@wordpress/rich-text/build-module/normalise-formats.js");



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * Internal dependencies
 */



function replace(array, index, value) {
  array = array.slice();
  array[index] = value;
  return array;
}
/**
 * Apply a format object to a Rich Text value from the given `startIndex` to the
 * given `endIndex`. Indices are retrieved from the selection if none are
 * provided.
 *
 * @param {Object} value        Value to modify.
 * @param {Object} format       Format to apply.
 * @param {number} [startIndex] Start index.
 * @param {number} [endIndex]   End index.
 *
 * @return {Object} A new value with the format applied.
 */


function applyFormat(value, format) {
  var startIndex = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : value.start;
  var endIndex = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : value.end;
  var formats = value.formats,
      activeFormats = value.activeFormats;
  var newFormats = formats.slice(); // The selection is collapsed.

  if (startIndex === endIndex) {
    var startFormat = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["find"])(newFormats[startIndex], {
      type: format.type
    }); // If the caret is at a format of the same type, expand start and end to
    // the edges of the format. This is useful to apply new attributes.

    if (startFormat) {
      var index = newFormats[startIndex].indexOf(startFormat);

      while (newFormats[startIndex] && newFormats[startIndex][index] === startFormat) {
        newFormats[startIndex] = replace(newFormats[startIndex], index, format);
        startIndex--;
      }

      endIndex++;

      while (newFormats[endIndex] && newFormats[endIndex][index] === startFormat) {
        newFormats[endIndex] = replace(newFormats[endIndex], index, format);
        endIndex++;
      }
    }
  } else {
    // Determine the highest position the new format can be inserted at.
    var position = +Infinity;

    for (var _index = startIndex; _index < endIndex; _index++) {
      if (newFormats[_index]) {
        newFormats[_index] = newFormats[_index].filter(function (_ref) {
          var type = _ref.type;
          return type !== format.type;
        });
        var length = newFormats[_index].length;

        if (length < position) {
          position = length;
        }
      } else {
        newFormats[_index] = [];
        position = 0;
      }
    }

    for (var _index2 = startIndex; _index2 < endIndex; _index2++) {
      newFormats[_index2].splice(position, 0, format);
    }
  }

  return Object(_normalise_formats__WEBPACK_IMPORTED_MODULE_3__["normaliseFormats"])(_objectSpread({}, value, {
    formats: newFormats,
    // Always revise active formats. This serves as a placeholder for new
    // inputs with the format so new input appears with the format applied,
    // and ensures a format of the same type uses the latest values.
    activeFormats: [].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(Object(lodash__WEBPACK_IMPORTED_MODULE_2__["reject"])(activeFormats, {
      type: format.type
    })), [format])
  }));
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/can-indent-list-items.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/can-indent-list-items.js ***!
  \*********************************************************************************/
/*! exports provided: canIndentListItems */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "canIndentListItems", function() { return canIndentListItems; });
/* harmony import */ var _get_line_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js");
/**
 * Internal dependencies
 */

/**
 * Checks if the selected list item can be indented.
 *
 * @param {Object} value Value to check.
 *
 * @return {boolean} Whether or not the selected list item can be indented.
 */

function canIndentListItems(value) {
  var lineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_0__["getLineIndex"])(value); // There is only one line, so the line cannot be indented.

  if (lineIndex === undefined) {
    return false;
  }

  var replacements = value.replacements;
  var previousLineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_0__["getLineIndex"])(value, lineIndex);
  var formatsAtLineIndex = replacements[lineIndex] || [];
  var formatsAtPreviousLineIndex = replacements[previousLineIndex] || []; // If the indentation of the current line is greater than previous line,
  // then the line cannot be furter indented.

  return formatsAtLineIndex.length <= formatsAtPreviousLineIndex.length;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/can-outdent-list-items.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/can-outdent-list-items.js ***!
  \**********************************************************************************/
/*! exports provided: canOutdentListItems */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "canOutdentListItems", function() { return canOutdentListItems; });
/* harmony import */ var _get_line_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js");
/**
 * Internal dependencies
 */

/**
 * Checks if the selected list item can be outdented.
 *
 * @param {Object} value Value to check.
 *
 * @return {boolean} Whether or not the selected list item can be outdented.
 */

function canOutdentListItems(value) {
  var replacements = value.replacements,
      start = value.start;
  var startingLineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_0__["getLineIndex"])(value, start);
  return replacements[startingLineIndex] !== undefined;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/change-list-type.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/change-list-type.js ***!
  \****************************************************************************/
/*! exports provided: changeListType */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "changeListType", function() { return changeListType; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/* harmony import */ var _get_line_index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./get-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js");
/* harmony import */ var _get_parent_line_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./get-parent-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-parent-line-index.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */



/**
 * Changes the list type of the selected indented list, if any. Looks at the
 * currently selected list item and takes the parent list, then changes the list
 * type of this list. When multiple lines are selected, the parent lists are
 * takes and changed.
 *
 * @param {Object} value     Value to change.
 * @param {Object} newFormat The new list format object. Choose between
 *                           `{ type: 'ol' }` and `{ type: 'ul' }`.
 *
 * @return {Object} The changed value.
 */

function changeListType(value, newFormat) {
  var text = value.text,
      replacements = value.replacements,
      start = value.start,
      end = value.end;
  var startingLineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_2__["getLineIndex"])(value, start);
  var startLineFormats = replacements[startingLineIndex] || [];
  var endLineFormats = replacements[Object(_get_line_index__WEBPACK_IMPORTED_MODULE_2__["getLineIndex"])(value, end)] || [];
  var startIndex = Object(_get_parent_line_index__WEBPACK_IMPORTED_MODULE_3__["getParentLineIndex"])(value, startingLineIndex);
  var newReplacements = replacements.slice();
  var startCount = startLineFormats.length - 1;
  var endCount = endLineFormats.length - 1;
  var changed;

  for (var index = startIndex + 1 || 0; index < text.length; index++) {
    if (text[index] !== _special_characters__WEBPACK_IMPORTED_MODULE_1__["LINE_SEPARATOR"]) {
      continue;
    }

    if ((newReplacements[index] || []).length <= startCount) {
      break;
    }

    if (!newReplacements[index]) {
      continue;
    }

    changed = true;
    newReplacements[index] = newReplacements[index].map(function (format, i) {
      return i < startCount || i > endCount ? format : newFormat;
    });
  }

  if (!changed) {
    return value;
  }

  return _objectSpread({}, value, {
    replacements: newReplacements
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/component/boundary-style.js":
/*!************************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/component/boundary-style.js ***!
  \************************************************************************************/
/*! exports provided: BoundaryStyle */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BoundaryStyle", function() { return BoundaryStyle; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

/**
 * Global stylesheet shared by all RichText instances.
 */

var globalStyle = document.createElement('style');
var boundarySelector = '*[data-rich-text-format-boundary]';
document.head.appendChild(globalStyle);
/**
 * Calculates and renders the format boundary style when the active formats
 * change.
 */

function BoundaryStyle(_ref) {
  var activeFormats = _ref.activeFormats,
      forwardedRef = _ref.forwardedRef;
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useEffect"])(function () {
    // There's no need to recalculate the boundary styles if no formats are
    // active, because no boundary styles will be visible.
    if (!activeFormats || !activeFormats.length) {
      return;
    }

    var element = forwardedRef.current.querySelector(boundarySelector);

    if (!element) {
      return;
    }

    var computedStyle = window.getComputedStyle(element);
    var newColor = computedStyle.color.replace(')', ', 0.2)').replace('rgb', 'rgba');
    var selector = ".rich-text:focus ".concat(boundarySelector);
    var rule = "background-color: ".concat(newColor);
    var style = "".concat(selector, " {").concat(rule, "}");

    if (globalStyle.innerHTML !== style) {
      globalStyle.innerHTML = style;
    }
  }, [activeFormats]);
  return null;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/component/format-edit.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/component/format-edit.js ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return FormatEdit; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _get_active_format__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../get-active-format */ "./node_modules/@wordpress/rich-text/build-module/get-active-format.js");
/* harmony import */ var _get_active_object__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../get-active-object */ "./node_modules/@wordpress/rich-text/build-module/get-active-object.js");


/**
 * Internal dependencies
 */


/**
 * Set of all interactive content tags.
 *
 * @see https://html.spec.whatwg.org/multipage/dom.html#interactive-content
 */

var interactiveContentTags = new Set(['a', 'audio', 'button', 'details', 'embed', 'iframe', 'input', 'label', 'select', 'textarea', 'video']);
function FormatEdit(_ref) {
  var formatTypes = _ref.formatTypes,
      onChange = _ref.onChange,
      onFocus = _ref.onFocus,
      value = _ref.value,
      allowedFormats = _ref.allowedFormats,
      withoutInteractiveFormatting = _ref.withoutInteractiveFormatting;
  return formatTypes.map(function (_ref2) {
    var name = _ref2.name,
        Edit = _ref2.edit,
        tagName = _ref2.tagName;

    if (!Edit) {
      return null;
    }

    if (allowedFormats && allowedFormats.indexOf(name) === -1) {
      return null;
    }

    if (withoutInteractiveFormatting && interactiveContentTags.has(tagName)) {
      return null;
    }

    var activeFormat = Object(_get_active_format__WEBPACK_IMPORTED_MODULE_1__["getActiveFormat"])(value, name);
    var isActive = activeFormat !== undefined;
    var activeObject = Object(_get_active_object__WEBPACK_IMPORTED_MODULE_2__["getActiveObject"])(value);
    var isObjectActive = activeObject !== undefined && activeObject.type === name;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Edit, {
      key: name,
      isActive: isActive,
      activeAttributes: isActive ? activeFormat.attributes || {} : {},
      isObjectActive: isObjectActive,
      activeObjectAttributes: isObjectActive ? activeObject.attributes || {} : {},
      value: value,
      onChange: onChange,
      onFocus: onFocus
    });
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/component/index.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/component/index.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/esm/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/esm/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @wordpress/keycodes */ "@wordpress/keycodes");
/* harmony import */ var _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _wordpress_is_shallow_equal__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! @wordpress/is-shallow-equal */ "@wordpress/is-shallow-equal");
/* harmony import */ var _wordpress_is_shallow_equal__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_wordpress_is_shallow_equal__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _wordpress_deprecated__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! @wordpress/deprecated */ "@wordpress/deprecated");
/* harmony import */ var _wordpress_deprecated__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_wordpress_deprecated__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _format_edit__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./format-edit */ "./node_modules/@wordpress/rich-text/build-module/component/format-edit.js");
/* harmony import */ var _create__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ../create */ "./node_modules/@wordpress/rich-text/build-module/create.js");
/* harmony import */ var _to_dom__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ../to-dom */ "./node_modules/@wordpress/rich-text/build-module/to-dom.js");
/* harmony import */ var _to_html_string__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ../to-html-string */ "./node_modules/@wordpress/rich-text/build-module/to-html-string.js");
/* harmony import */ var _remove__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ../remove */ "./node_modules/@wordpress/rich-text/build-module/remove.js");
/* harmony import */ var _remove_format__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ../remove-format */ "./node_modules/@wordpress/rich-text/build-module/remove-format.js");
/* harmony import */ var _is_collapsed__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ../is-collapsed */ "./node_modules/@wordpress/rich-text/build-module/is-collapsed.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ../special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/* harmony import */ var _indent_list_items__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! ../indent-list-items */ "./node_modules/@wordpress/rich-text/build-module/indent-list-items.js");
/* harmony import */ var _get_active_formats__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! ../get-active-formats */ "./node_modules/@wordpress/rich-text/build-module/get-active-formats.js");
/* harmony import */ var _update_formats__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! ../update-formats */ "./node_modules/@wordpress/rich-text/build-module/update-formats.js");
/* harmony import */ var _remove_line_separator__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! ../remove-line-separator */ "./node_modules/@wordpress/rich-text/build-module/remove-line-separator.js");
/* harmony import */ var _is_empty__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! ../is-empty */ "./node_modules/@wordpress/rich-text/build-module/is-empty.js");
/* harmony import */ var _with_format_types__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! ./with-format-types */ "./node_modules/@wordpress/rich-text/build-module/component/with-format-types.js");
/* harmony import */ var _boundary_style__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! ./boundary-style */ "./node_modules/@wordpress/rich-text/build-module/component/boundary-style.js");
/* harmony import */ var _inline_warning__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! ./inline-warning */ "./node_modules/@wordpress/rich-text/build-module/component/inline-warning.js");










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
 * Browser dependencies
 */

var _window = window,
    getSelection = _window.getSelection,
    getComputedStyle = _window.getComputedStyle;
/** @typedef {import('@wordpress/element').WPSyntheticEvent} WPSyntheticEvent */

/**
 * All inserting input types that would insert HTML into the DOM.
 *
 * @see https://www.w3.org/TR/input-events-2/#interface-InputEvent-Attributes
 *
 * @type {Set}
 */

var INSERTION_INPUT_TYPES_TO_IGNORE = new Set(['insertParagraph', 'insertOrderedList', 'insertUnorderedList', 'insertHorizontalRule', 'insertLink']);
/**
 * In HTML, leading and trailing spaces are not visible, and multiple spaces
 * elsewhere are visually reduced to one space. This rule prevents spaces from
 * collapsing so all space is visible in the editor and can be removed. It also
 * prevents some browsers from inserting non-breaking spaces at the end of a
 * line to prevent the space from visually disappearing. Sometimes these non
 * breaking spaces can linger in the editor causing unwanted non breaking spaces
 * in between words. If also prevent Firefox from inserting a trailing `br` node
 * to visualise any trailing space, causing the element to be saved.
 *
 * > Authors are encouraged to set the 'white-space' property on editing hosts
 * > and on markup that was originally created through these editing mechanisms
 * > to the value 'pre-wrap'. Default HTML whitespace handling is not well
 * > suited to WYSIWYG editing, and line wrapping will not work correctly in
 * > some corner cases if 'white-space' is left at its default value.
 *
 * https://html.spec.whatwg.org/multipage/interaction.html#best-practices-for-in-page-editors
 *
 * @type {string}
 */

var whiteSpace = 'pre-wrap';
/**
 * Default style object for the editable element.
 *
 * @type {Object<string,string>}
 */

var defaultStyle = {
  whiteSpace: whiteSpace
};
var EMPTY_ACTIVE_FORMATS = [];

function createPrepareEditableTree(props, prefix) {
  var fns = Object.keys(props).reduce(function (accumulator, key) {
    if (key.startsWith(prefix)) {
      accumulator.push(props[key]);
    }

    return accumulator;
  }, []);
  return function (value) {
    return fns.reduce(function (accumulator, fn) {
      return fn(accumulator, value.text);
    }, value.formats);
  };
}
/**
 * If the selection is set on the placeholder element, collapse the selection to
 * the start (before the placeholder).
 */


function fixPlaceholderSelection() {
  var selection = window.getSelection();
  var anchorNode = selection.anchorNode,
      anchorOffset = selection.anchorOffset;

  if (anchorNode.nodeType !== anchorNode.ELEMENT_NODE) {
    return;
  }

  var targetNode = anchorNode.childNodes[anchorOffset];

  if (!targetNode || targetNode.nodeType !== targetNode.ELEMENT_NODE || !targetNode.getAttribute('data-rich-text-placeholder')) {
    return;
  }

  selection.collapseToStart();
}
/**
 * See export statement below.
 */


var RichText =
/*#__PURE__*/
function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_7__["default"])(RichText, _Component);

  function RichText(_ref) {
    var _this;

    var value = _ref.value,
        selectionStart = _ref.selectionStart,
        selectionEnd = _ref.selectionEnd;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__["default"])(this, RichText);

    _this = Object(_babel_runtime_helpers_esm_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__["default"])(this, Object(_babel_runtime_helpers_esm_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__["default"])(RichText).apply(this, arguments));
    _this.onFocus = _this.onFocus.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onBlur = _this.onBlur.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onChange = _this.onChange.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.handleDelete = _this.handleDelete.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.handleEnter = _this.handleEnter.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.handleSpace = _this.handleSpace.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.handleHorizontalNavigation = _this.handleHorizontalNavigation.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onPaste = _this.onPaste.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onCreateUndoLevel = _this.onCreateUndoLevel.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onInput = _this.onInput.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onCompositionStart = _this.onCompositionStart.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onCompositionEnd = _this.onCompositionEnd.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onSelectionChange = _this.onSelectionChange.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.createRecord = _this.createRecord.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.applyRecord = _this.applyRecord.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.valueToFormat = _this.valueToFormat.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.onPointerDown = _this.onPointerDown.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.formatToValue = _this.formatToValue.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));
    _this.Editable = _this.Editable.bind(Object(_babel_runtime_helpers_esm_assertThisInitialized__WEBPACK_IMPORTED_MODULE_6__["default"])(_this));

    _this.onKeyDown = function (event) {
      if (event.defaultPrevented) {
        return;
      }

      _this.handleDelete(event);

      _this.handleEnter(event);

      _this.handleSpace(event);

      _this.handleHorizontalNavigation(event);
    };

    _this.state = {};
    _this.lastHistoryValue = value; // Internal values are updated synchronously, unlike props and state.

    _this.value = value;
    _this.record = _this.formatToValue(value);
    _this.record.start = selectionStart;
    _this.record.end = selectionEnd;
    return _this;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__["default"])(RichText, [{
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      document.removeEventListener('selectionchange', this.onSelectionChange);
      window.cancelAnimationFrame(this.rafId);
    }
  }, {
    key: "componentDidMount",
    value: function componentDidMount() {
      this.applyRecord(this.record, {
        domOnly: true
      });
    }
  }, {
    key: "createRecord",
    value: function createRecord() {
      var _this$props = this.props,
          multilineTag = _this$props.__unstableMultilineTag,
          forwardedRef = _this$props.forwardedRef,
          preserveWhiteSpace = _this$props.preserveWhiteSpace;
      var selection = getSelection();
      var range = selection.rangeCount > 0 ? selection.getRangeAt(0) : null;
      return Object(_create__WEBPACK_IMPORTED_MODULE_16__["create"])({
        element: forwardedRef.current,
        range: range,
        multilineTag: multilineTag,
        multilineWrapperTags: multilineTag === 'li' ? ['ul', 'ol'] : undefined,
        __unstableIsEditableTree: true,
        preserveWhiteSpace: preserveWhiteSpace
      });
    }
  }, {
    key: "applyRecord",
    value: function applyRecord(record) {
      var _ref2 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},
          domOnly = _ref2.domOnly;

      var _this$props2 = this.props,
          multilineTag = _this$props2.__unstableMultilineTag,
          forwardedRef = _this$props2.forwardedRef;
      Object(_to_dom__WEBPACK_IMPORTED_MODULE_17__["apply"])({
        value: record,
        current: forwardedRef.current,
        multilineTag: multilineTag,
        multilineWrapperTags: multilineTag === 'li' ? ['ul', 'ol'] : undefined,
        prepareEditableTree: createPrepareEditableTree(this.props, 'format_prepare_functions'),
        __unstableDomOnly: domOnly,
        placeholder: this.props.placeholder
      });
    }
    /**
     * Handles a paste event.
     *
     * Saves the pasted data as plain text in `pastedPlainText`.
     *
     * @param {ClipboardEvent} event The paste event.
     */

  }, {
    key: "onPaste",
    value: function onPaste(event) {
      var _this$props3 = this.props,
          formatTypes = _this$props3.formatTypes,
          onPaste = _this$props3.onPaste,
          isSelected = _this$props3.__unstableIsSelected;
      var _this$state$activeFor = this.state.activeFormats,
          activeFormats = _this$state$activeFor === void 0 ? [] : _this$state$activeFor;

      if (!isSelected) {
        event.preventDefault();
        return;
      }

      var clipboardData = event.clipboardData;
      var items = clipboardData.items,
          files = clipboardData.files; // In Edge these properties can be null instead of undefined, so a more
      // rigorous test is required over using default values.

      items = Object(lodash__WEBPACK_IMPORTED_MODULE_10__["isNil"])(items) ? [] : items;
      files = Object(lodash__WEBPACK_IMPORTED_MODULE_10__["isNil"])(files) ? [] : files;
      var plainText = '';
      var html = ''; // IE11 only supports `Text` as an argument for `getData` and will
      // otherwise throw an invalid argument error, so we try the standard
      // arguments first, then fallback to `Text` if they fail.

      try {
        plainText = clipboardData.getData('text/plain');
        html = clipboardData.getData('text/html');
      } catch (error1) {
        try {
          html = clipboardData.getData('Text');
        } catch (error2) {
          // Some browsers like UC Browser paste plain text by default and
          // don't support clipboardData at all, so allow default
          // behaviour.
          return;
        }
      }

      event.preventDefault(); // Allows us to ask for this information when we get a report.

      window.console.log('Received HTML:\n\n', html);
      window.console.log('Received plain text:\n\n', plainText);
      var record = this.record;
      var transformed = formatTypes.reduce(function (accumlator, _ref3) {
        var __unstablePasteRule = _ref3.__unstablePasteRule;

        // Only allow one transform.
        if (__unstablePasteRule && accumlator === record) {
          accumlator = __unstablePasteRule(record, {
            html: html,
            plainText: plainText
          });
        }

        return accumlator;
      }, record);

      if (transformed !== record) {
        this.onChange(transformed);
        return;
      }

      if (onPaste) {
        files = Array.from(files);
        Array.from(items).forEach(function (item) {
          if (!item.getAsFile) {
            return;
          }

          var file = item.getAsFile();

          if (!file) {
            return;
          }

          var name = file.name,
              type = file.type,
              size = file.size;

          if (!Object(lodash__WEBPACK_IMPORTED_MODULE_10__["find"])(files, {
            name: name,
            type: type,
            size: size
          })) {
            files.push(file);
          }
        });
        onPaste({
          value: this.removeEditorOnlyFormats(record),
          onChange: this.onChange,
          html: html,
          plainText: plainText,
          files: files,
          activeFormats: activeFormats
        });
      }
    }
    /**
     * Handles a focus event on the contenteditable field, calling the
     * `unstableOnFocus` prop callback if one is defined. The callback does not
     * receive any arguments.
     *
     * This is marked as a private API and the `unstableOnFocus` prop is not
     * documented, as the current requirements where it is used are subject to
     * future refactoring following `isSelected` handling.
     *
     * In contrast with `setFocusedElement`, this is only triggered in response
     * to focus within the contenteditable field, whereas `setFocusedElement`
     * is triggered on focus within any `RichText` descendent element.
     *
     * @see setFocusedElement
     *
     * @private
     */

  }, {
    key: "onFocus",
    value: function onFocus() {
      var unstableOnFocus = this.props.unstableOnFocus;

      if (unstableOnFocus) {
        unstableOnFocus();
      }

      if (!this.props.__unstableIsSelected) {
        // We know for certain that on focus, the old selection is invalid. It
        // will be recalculated on the next mouseup, keyup, or touchend event.
        var index = undefined;
        var activeFormats = EMPTY_ACTIVE_FORMATS;
        this.record = _objectSpread({}, this.record, {
          start: index,
          end: index,
          activeFormats: activeFormats
        });
        this.props.onSelectionChange(index, index);
        this.setState({
          activeFormats: activeFormats
        });
      } else {
        this.props.onSelectionChange(this.record.start, this.record.end);
        this.setState({
          activeFormats: Object(_get_active_formats__WEBPACK_IMPORTED_MODULE_24__["getActiveFormats"])(_objectSpread({}, this.record, {
            activeFormats: undefined
          }), EMPTY_ACTIVE_FORMATS)
        });
      } // Update selection as soon as possible, which is at the next animation
      // frame. The event listener for selection changes may be added too late
      // at this point, but this focus event is still too early to calculate
      // the selection.


      this.rafId = window.requestAnimationFrame(this.onSelectionChange);
      document.addEventListener('selectionchange', this.onSelectionChange);

      if (this.props.setFocusedElement) {
        _wordpress_deprecated__WEBPACK_IMPORTED_MODULE_14___default()('wp.blockEditor.RichText setFocusedElement prop', {
          alternative: 'selection state from the block editor store.'
        });
        this.props.setFocusedElement(this.props.instanceId);
      }
    }
  }, {
    key: "onBlur",
    value: function onBlur() {
      document.removeEventListener('selectionchange', this.onSelectionChange);
    }
    /**
     * Handle input on the next selection change event.
     *
     * @param {WPSyntheticEvent} event Synthetic input event.
     */

  }, {
    key: "onInput",
    value: function onInput(event) {
      // Do not trigger a change if characters are being composed. Browsers
      // will usually emit a final `input` event when the characters are
      // composed.
      // As of December 2019, Safari doesn't support nativeEvent.isComposing.
      if (this.isComposing) {
        return;
      }

      var inputType;

      if (event) {
        inputType = event.inputType;
      }

      if (!inputType && event && event.nativeEvent) {
        inputType = event.nativeEvent.inputType;
      } // The browser formatted something or tried to insert HTML.
      // Overwrite it. It will be handled later by the format library if
      // needed.


      if (inputType && (inputType.indexOf('format') === 0 || INSERTION_INPUT_TYPES_TO_IGNORE.has(inputType))) {
        this.applyRecord(this.record);
        return;
      }

      var value = this.createRecord();
      var _this$record = this.record,
          start = _this$record.start,
          _this$record$activeFo = _this$record.activeFormats,
          activeFormats = _this$record$activeFo === void 0 ? [] : _this$record$activeFo; // Update the formats between the last and new caret position.

      var change = Object(_update_formats__WEBPACK_IMPORTED_MODULE_25__["updateFormats"])({
        value: value,
        start: start,
        end: value.start,
        formats: activeFormats
      });
      this.onChange(change, {
        withoutHistory: true
      });
      var _this$props4 = this.props,
          inputRule = _this$props4.__unstableInputRule,
          markAutomaticChange = _this$props4.__unstableMarkAutomaticChange,
          allowPrefixTransformations = _this$props4.__unstableAllowPrefixTransformations,
          formatTypes = _this$props4.formatTypes,
          setTimeout = _this$props4.setTimeout,
          clearTimeout = _this$props4.clearTimeout; // Create an undo level when input stops for over a second.

      clearTimeout(this.onInput.timeout);
      this.onInput.timeout = setTimeout(this.onCreateUndoLevel, 1000); // Only run input rules when inserting text.

      if (inputType !== 'insertText') {
        return;
      }

      if (allowPrefixTransformations && inputRule) {
        inputRule(change, this.valueToFormat);
      }

      var transformed = formatTypes.reduce(function (accumlator, _ref4) {
        var __unstableInputRule = _ref4.__unstableInputRule;

        if (__unstableInputRule) {
          accumlator = __unstableInputRule(accumlator);
        }

        return accumlator;
      }, change);

      if (transformed !== change) {
        this.onCreateUndoLevel();
        this.onChange(_objectSpread({}, transformed, {
          activeFormats: activeFormats
        }));
        markAutomaticChange();
      }
    }
  }, {
    key: "onCompositionStart",
    value: function onCompositionStart() {
      this.isComposing = true; // Do not update the selection when characters are being composed as
      // this rerenders the component and might distroy internal browser
      // editing state.

      document.removeEventListener('selectionchange', this.onSelectionChange);
    }
  }, {
    key: "onCompositionEnd",
    value: function onCompositionEnd() {
      this.isComposing = false; // Ensure the value is up-to-date for browsers that don't emit a final
      // input event after composition.

      this.onInput({
        inputType: 'insertText'
      }); // Tracking selection changes can be resumed.

      document.addEventListener('selectionchange', this.onSelectionChange);
    }
    /**
     * Syncs the selection to local state. A callback for the `selectionchange`
     * native events, `keyup`, `mouseup` and `touchend` synthetic events, and
     * animation frames after the `focus` event.
     *
     * @param {Event|WPSyntheticEvent|DOMHighResTimeStamp} event
     */

  }, {
    key: "onSelectionChange",
    value: function onSelectionChange(event) {
      if (event.type !== 'selectionchange' && !this.props.__unstableIsSelected) {
        return;
      }

      if (this.props.disabled) {
        return;
      } // In case of a keyboard event, ignore selection changes during
      // composition.


      if (this.isComposing) {
        return;
      }

      var _this$createRecord = this.createRecord(),
          start = _this$createRecord.start,
          end = _this$createRecord.end,
          text = _this$createRecord.text;

      var value = this.record; // Fallback mechanism for IE11, which doesn't support the input event.
      // Any input results in a selection change.

      if (text !== value.text) {
        this.onInput();
        return;
      }

      if (start === value.start && end === value.end) {
        // Sometimes the browser may set the selection on the placeholder
        // element, in which case the caret is not visible. We need to set
        // the caret before the placeholder if that's the case.
        if (value.text.length === 0 && start === 0) {
          fixPlaceholderSelection();
        }

        return;
      }

      var _this$props5 = this.props,
          isCaretWithinFormattedText = _this$props5.__unstableIsCaretWithinFormattedText,
          onEnterFormattedText = _this$props5.__unstableOnEnterFormattedText,
          onExitFormattedText = _this$props5.__unstableOnExitFormattedText;

      var newValue = _objectSpread({}, value, {
        start: start,
        end: end,
        // Allow `getActiveFormats` to get new `activeFormats`.
        activeFormats: undefined
      });

      var activeFormats = Object(_get_active_formats__WEBPACK_IMPORTED_MODULE_24__["getActiveFormats"])(newValue, EMPTY_ACTIVE_FORMATS); // Update the value with the new active formats.

      newValue.activeFormats = activeFormats;

      if (!isCaretWithinFormattedText && activeFormats.length) {
        onEnterFormattedText();
      } else if (isCaretWithinFormattedText && !activeFormats.length) {
        onExitFormattedText();
      } // It is important that the internal value is updated first,
      // otherwise the value will be wrong on render!


      this.record = newValue;
      this.applyRecord(newValue, {
        domOnly: true
      });
      this.props.onSelectionChange(start, end);
      this.setState({
        activeFormats: activeFormats
      });
    }
    /**
     * Sync the value to global state. The node tree and selection will also be
     * updated if differences are found.
     *
     * @param {Object}  record            The record to sync and apply.
     * @param {Object}  $2                Named options.
     * @param {boolean} $2.withoutHistory If true, no undo level will be
     *                                    created.
     */

  }, {
    key: "onChange",
    value: function onChange(record) {
      var _ref5 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},
          withoutHistory = _ref5.withoutHistory;

      this.applyRecord(record);
      var start = record.start,
          end = record.end,
          _record$activeFormats = record.activeFormats,
          activeFormats = _record$activeFormats === void 0 ? [] : _record$activeFormats;
      var changeHandlers = Object(lodash__WEBPACK_IMPORTED_MODULE_10__["pickBy"])(this.props, function (v, key) {
        return key.startsWith('format_on_change_functions_');
      });
      Object.values(changeHandlers).forEach(function (changeHandler) {
        changeHandler(record.formats, record.text);
      });
      this.value = this.valueToFormat(record);
      this.record = record; // Selection must be updated first, so it is recorded in history when
      // the content change happens.

      this.props.onSelectionChange(start, end);
      this.props.onChange(this.value);
      this.setState({
        activeFormats: activeFormats
      });

      if (!withoutHistory) {
        this.onCreateUndoLevel();
      }
    }
  }, {
    key: "onCreateUndoLevel",
    value: function onCreateUndoLevel() {
      // If the content is the same, no level needs to be created.
      if (this.lastHistoryValue === this.value) {
        return;
      }

      this.props.__unstableOnCreateUndoLevel();

      this.lastHistoryValue = this.value;
    }
    /**
     * Handles delete on keydown:
     * - outdent list items,
     * - delete content if everything is selected,
     * - trigger the onDelete prop when selection is uncollapsed and at an edge.
     *
     * @param {WPSyntheticEvent} event A synthetic keyboard event.
     */

  }, {
    key: "handleDelete",
    value: function handleDelete(event) {
      var keyCode = event.keyCode;

      if (keyCode !== _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["DELETE"] && keyCode !== _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["BACKSPACE"] && keyCode !== _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["ESCAPE"]) {
        return;
      }

      if (this.props.__unstableDidAutomaticChange) {
        event.preventDefault();

        this.props.__unstableUndo();

        return;
      }

      if (keyCode === _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["ESCAPE"]) {
        return;
      }

      var _this$props6 = this.props,
          onDelete = _this$props6.onDelete,
          multilineTag = _this$props6.__unstableMultilineTag;
      var _this$state$activeFor2 = this.state.activeFormats,
          activeFormats = _this$state$activeFor2 === void 0 ? [] : _this$state$activeFor2;
      var value = this.createRecord();
      var start = value.start,
          end = value.end,
          text = value.text;
      var isReverse = keyCode === _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["BACKSPACE"]; // Always handle full content deletion ourselves.

      if (start === 0 && end !== 0 && end === text.length) {
        this.onChange(Object(_remove__WEBPACK_IMPORTED_MODULE_19__["remove"])(value));
        event.preventDefault();
        return;
      }

      if (multilineTag) {
        var newValue; // Check to see if we should remove the first item if empty.

        if (isReverse && value.start === 0 && value.end === 0 && Object(_is_empty__WEBPACK_IMPORTED_MODULE_27__["isEmptyLine"])(value)) {
          newValue = Object(_remove_line_separator__WEBPACK_IMPORTED_MODULE_26__["removeLineSeparator"])(value, !isReverse);
        } else {
          newValue = Object(_remove_line_separator__WEBPACK_IMPORTED_MODULE_26__["removeLineSeparator"])(value, isReverse);
        }

        if (newValue) {
          this.onChange(newValue);
          event.preventDefault();
          return;
        }
      } // Only process delete if the key press occurs at an uncollapsed edge.


      if (!onDelete || !Object(_is_collapsed__WEBPACK_IMPORTED_MODULE_21__["isCollapsed"])(value) || activeFormats.length || isReverse && start !== 0 || !isReverse && end !== text.length) {
        return;
      }

      onDelete({
        isReverse: isReverse,
        value: value
      });
      event.preventDefault();
    }
    /**
     * Triggers the `onEnter` prop on keydown.
     *
     * @param {WPSyntheticEvent} event A synthetic keyboard event.
     */

  }, {
    key: "handleEnter",
    value: function handleEnter(event) {
      if (event.keyCode !== _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["ENTER"]) {
        return;
      }

      event.preventDefault();
      var onEnter = this.props.onEnter;

      if (!onEnter) {
        return;
      }

      onEnter({
        value: this.removeEditorOnlyFormats(this.createRecord()),
        onChange: this.onChange,
        shiftKey: event.shiftKey
      });
    }
    /**
     * Indents list items on space keydown.
     *
     * @param {WPSyntheticEvent} event A synthetic keyboard event.
     */

  }, {
    key: "handleSpace",
    value: function handleSpace(event) {
      var keyCode = event.keyCode,
          shiftKey = event.shiftKey,
          altKey = event.altKey,
          metaKey = event.metaKey,
          ctrlKey = event.ctrlKey;
      var _this$props7 = this.props,
          tagName = _this$props7.tagName,
          multilineTag = _this$props7.__unstableMultilineTag;

      if ( // Only override when no modifiers are pressed.
      shiftKey || altKey || metaKey || ctrlKey || keyCode !== _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["SPACE"] || multilineTag !== 'li') {
        return;
      }

      var value = this.createRecord();

      if (!Object(_is_collapsed__WEBPACK_IMPORTED_MODULE_21__["isCollapsed"])(value)) {
        return;
      }

      var text = value.text,
          start = value.start;
      var characterBefore = text[start - 1]; // The caret must be at the start of a line.

      if (characterBefore && characterBefore !== _special_characters__WEBPACK_IMPORTED_MODULE_22__["LINE_SEPARATOR"]) {
        return;
      }

      this.onChange(Object(_indent_list_items__WEBPACK_IMPORTED_MODULE_23__["indentListItems"])(value, {
        type: tagName
      }));
      event.preventDefault();
    }
    /**
     * Handles horizontal keyboard navigation when no modifiers are pressed. The
     * navigation is handled separately to move correctly around format
     * boundaries.
     *
     * @param {WPSyntheticEvent} event A synthetic keyboard event.
     */

  }, {
    key: "handleHorizontalNavigation",
    value: function handleHorizontalNavigation(event) {
      var keyCode = event.keyCode,
          shiftKey = event.shiftKey,
          altKey = event.altKey,
          metaKey = event.metaKey,
          ctrlKey = event.ctrlKey;

      if ( // Only override left and right keys without modifiers pressed.
      shiftKey || altKey || metaKey || ctrlKey || keyCode !== _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["LEFT"] && keyCode !== _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["RIGHT"]) {
        return;
      }

      var value = this.record;
      var text = value.text,
          formats = value.formats,
          start = value.start,
          end = value.end,
          _value$activeFormats = value.activeFormats,
          activeFormats = _value$activeFormats === void 0 ? [] : _value$activeFormats;
      var collapsed = Object(_is_collapsed__WEBPACK_IMPORTED_MODULE_21__["isCollapsed"])(value); // To do: ideally, we should look at visual position instead.

      var _getComputedStyle = getComputedStyle(this.props.forwardedRef.current),
          direction = _getComputedStyle.direction;

      var reverseKey = direction === 'rtl' ? _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["RIGHT"] : _wordpress_keycodes__WEBPACK_IMPORTED_MODULE_11__["LEFT"];
      var isReverse = event.keyCode === reverseKey; // If the selection is collapsed and at the very start, do nothing if
      // navigating backward.
      // If the selection is collapsed and at the very end, do nothing if
      // navigating forward.

      if (collapsed && activeFormats.length === 0) {
        if (start === 0 && isReverse) {
          return;
        }

        if (end === text.length && !isReverse) {
          return;
        }
      } // If the selection is not collapsed, let the browser handle collapsing
      // the selection for now. Later we could expand this logic to set
      // boundary positions if needed.


      if (!collapsed) {
        return;
      } // In all other cases, prevent default behaviour.


      event.preventDefault();
      var formatsBefore = formats[start - 1] || EMPTY_ACTIVE_FORMATS;
      var formatsAfter = formats[start] || EMPTY_ACTIVE_FORMATS;
      var newActiveFormatsLength = activeFormats.length;
      var source = formatsAfter;

      if (formatsBefore.length > formatsAfter.length) {
        source = formatsBefore;
      } // If the amount of formats before the caret and after the caret is
      // different, the caret is at a format boundary.


      if (formatsBefore.length < formatsAfter.length) {
        if (!isReverse && activeFormats.length < formatsAfter.length) {
          newActiveFormatsLength++;
        }

        if (isReverse && activeFormats.length > formatsBefore.length) {
          newActiveFormatsLength--;
        }
      } else if (formatsBefore.length > formatsAfter.length) {
        if (!isReverse && activeFormats.length > formatsAfter.length) {
          newActiveFormatsLength--;
        }

        if (isReverse && activeFormats.length < formatsBefore.length) {
          newActiveFormatsLength++;
        }
      }

      if (newActiveFormatsLength !== activeFormats.length) {
        var _newActiveFormats = source.slice(0, newActiveFormatsLength);

        var _newValue = _objectSpread({}, value, {
          activeFormats: _newActiveFormats
        });

        this.record = _newValue;
        this.applyRecord(_newValue);
        this.setState({
          activeFormats: _newActiveFormats
        });
        return;
      }

      var newPos = start + (isReverse ? -1 : 1);
      var newActiveFormats = isReverse ? formatsBefore : formatsAfter;

      var newValue = _objectSpread({}, value, {
        start: newPos,
        end: newPos,
        activeFormats: newActiveFormats
      });

      this.record = newValue;
      this.applyRecord(newValue);
      this.props.onSelectionChange(newPos, newPos);
      this.setState({
        activeFormats: newActiveFormats
      });
    }
    /**
     * Select object when they are clicked. The browser will not set any
     * selection when clicking e.g. an image.
     *
     * @param {WPSyntheticEvent} event Synthetic mousedown or touchstart event.
     */

  }, {
    key: "onPointerDown",
    value: function onPointerDown(event) {
      var target = event.target; // If the child element has no text content, it must be an object.

      if (target === this.props.forwardedRef.current || target.textContent) {
        return;
      }

      var parentNode = target.parentNode;
      var index = Array.from(parentNode.childNodes).indexOf(target);
      var range = target.ownerDocument.createRange();
      var selection = getSelection();
      range.setStart(target.parentNode, index);
      range.setEnd(target.parentNode, index + 1);
      selection.removeAllRanges();
      selection.addRange(range);
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      var _this$props8 = this.props,
          tagName = _this$props8.tagName,
          value = _this$props8.value,
          selectionStart = _this$props8.selectionStart,
          selectionEnd = _this$props8.selectionEnd,
          placeholder = _this$props8.placeholder,
          isSelected = _this$props8.__unstableIsSelected; // Check if tag name changed.

      var shouldReapply = tagName !== prevProps.tagName; // Check if the content changed.

      shouldReapply = shouldReapply || value !== prevProps.value && value !== this.value;
      var selectionChanged = selectionStart !== prevProps.selectionStart && selectionStart !== this.record.start || selectionEnd !== prevProps.selectionEnd && selectionEnd !== this.record.end; // Check if the selection changed.

      shouldReapply = shouldReapply || isSelected && !prevProps.isSelected && selectionChanged;
      var prefix = 'format_prepare_props_';

      var predicate = function predicate(v, key) {
        return key.startsWith(prefix);
      };

      var prepareProps = Object(lodash__WEBPACK_IMPORTED_MODULE_10__["pickBy"])(this.props, predicate);
      var prevPrepareProps = Object(lodash__WEBPACK_IMPORTED_MODULE_10__["pickBy"])(prevProps, predicate); // Check if any format props changed.

      shouldReapply = shouldReapply || !_wordpress_is_shallow_equal__WEBPACK_IMPORTED_MODULE_13___default()(prepareProps, prevPrepareProps); // Rerender if the placeholder changed.

      shouldReapply = shouldReapply || placeholder !== prevProps.placeholder;

      if (shouldReapply) {
        this.value = value;
        this.record = this.formatToValue(value);
        this.record.start = selectionStart;
        this.record.end = selectionEnd;
        this.applyRecord(this.record);
      } else if (selectionChanged) {
        this.record = _objectSpread({}, this.record, {
          start: selectionStart,
          end: selectionEnd
        });
      }
    }
    /**
     * Converts the outside data structure to our internal representation.
     *
     * @param {*} value The outside value, data type depends on props.
     * @return {Object} An internal rich-text value.
     */

  }, {
    key: "formatToValue",
    value: function formatToValue(value) {
      var _this$props9 = this.props,
          format = _this$props9.format,
          multilineTag = _this$props9.__unstableMultilineTag,
          preserveWhiteSpace = _this$props9.preserveWhiteSpace;

      if (format !== 'string') {
        return value;
      }

      var prepare = createPrepareEditableTree(this.props, 'format_value_functions');
      value = Object(_create__WEBPACK_IMPORTED_MODULE_16__["create"])({
        html: value,
        multilineTag: multilineTag,
        multilineWrapperTags: multilineTag === 'li' ? ['ul', 'ol'] : undefined,
        preserveWhiteSpace: preserveWhiteSpace
      });
      value.formats = prepare(value);
      return value;
    }
    /**
     * Removes editor only formats from the value.
     *
     * Editor only formats are applied using `prepareEditableTree`, so we need to
     * remove them before converting the internal state
     *
     * @param {Object} value The internal rich-text value.
     * @return {Object} A new rich-text value.
     */

  }, {
    key: "removeEditorOnlyFormats",
    value: function removeEditorOnlyFormats(value) {
      this.props.formatTypes.forEach(function (formatType) {
        // Remove formats created by prepareEditableTree, because they are editor only.
        if (formatType.__experimentalCreatePrepareEditableTree) {
          value = Object(_remove_format__WEBPACK_IMPORTED_MODULE_20__["removeFormat"])(value, formatType.name, 0, value.text.length);
        }
      });
      return value;
    }
    /**
     * Converts the internal value to the external data format.
     *
     * @param {Object} value The internal rich-text value.
     * @return {*} The external data format, data type depends on props.
     */

  }, {
    key: "valueToFormat",
    value: function valueToFormat(value) {
      var _this$props10 = this.props,
          format = _this$props10.format,
          multilineTag = _this$props10.__unstableMultilineTag,
          preserveWhiteSpace = _this$props10.preserveWhiteSpace;
      value = this.removeEditorOnlyFormats(value);

      if (format !== 'string') {
        return;
      }

      return Object(_to_html_string__WEBPACK_IMPORTED_MODULE_18__["toHTMLString"])({
        value: value,
        multilineTag: multilineTag,
        preserveWhiteSpace: preserveWhiteSpace
      });
    }
  }, {
    key: "Editable",
    value: function Editable(props) {
      var _this2 = this;

      var _this$props11 = this.props,
          _this$props11$tagName = _this$props11.tagName,
          TagName = _this$props11$tagName === void 0 ? 'div' : _this$props11$tagName,
          style = _this$props11.style,
          className = _this$props11.className,
          placeholder = _this$props11.placeholder,
          forwardedRef = _this$props11.forwardedRef,
          disabled = _this$props11.disabled;
      var ariaProps = Object(lodash__WEBPACK_IMPORTED_MODULE_10__["pickBy"])(this.props, function (value, key) {
        return Object(lodash__WEBPACK_IMPORTED_MODULE_10__["startsWith"])(key, 'aria-');
      });
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(TagName // Overridable props.
      , Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
        role: "textbox",
        "aria-multiline": true,
        "aria-label": placeholder
      }, props, ariaProps, {
        ref: forwardedRef,
        style: style ? _objectSpread({}, style, {
          whiteSpace: whiteSpace
        }) : defaultStyle,
        className: classnames__WEBPACK_IMPORTED_MODULE_9___default()('rich-text', className),
        onPaste: this.onPaste,
        onInput: this.onInput,
        onCompositionStart: this.onCompositionStart,
        onCompositionEnd: this.onCompositionEnd,
        onKeyDown: props.onKeyDown ? function (event) {
          props.onKeyDown(event);

          _this2.onKeyDown(event);
        } : this.onKeyDown,
        onFocus: this.onFocus,
        onBlur: this.onBlur,
        onMouseDown: this.onPointerDown,
        onTouchStart: this.onPointerDown // Selection updates must be done at these events as they
        // happen before the `selectionchange` event. In some cases,
        // the `selectionchange` event may not even fire, for
        // example when the window receives focus again on click.
        ,
        onKeyUp: this.onSelectionChange,
        onMouseUp: this.onSelectionChange,
        onTouchEnd: this.onSelectionChange // Do not set the attribute if disabled.
        ,
        contentEditable: disabled ? undefined : true,
        suppressContentEditableWarning: !disabled
      }));
    }
  }, {
    key: "render",
    value: function render() {
      var _this3 = this;

      var _this$props12 = this.props,
          isSelected = _this$props12.__unstableIsSelected,
          children = _this$props12.children,
          allowedFormats = _this$props12.allowedFormats,
          withoutInteractiveFormatting = _this$props12.withoutInteractiveFormatting,
          formatTypes = _this$props12.formatTypes,
          forwardedRef = _this$props12.forwardedRef;
      var activeFormats = this.state.activeFormats;

      var onFocus = function onFocus() {
        forwardedRef.current.focus();

        _this3.applyRecord(_this3.record);
      };

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(_boundary_style__WEBPACK_IMPORTED_MODULE_29__["BoundaryStyle"], {
        activeFormats: activeFormats,
        forwardedRef: forwardedRef
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(_inline_warning__WEBPACK_IMPORTED_MODULE_30__["InlineWarning"], {
        forwardedRef: forwardedRef
      }), isSelected && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(_format_edit__WEBPACK_IMPORTED_MODULE_15__["default"], {
        allowedFormats: allowedFormats,
        withoutInteractiveFormatting: withoutInteractiveFormatting,
        value: this.record,
        onChange: this.onChange,
        onFocus: onFocus,
        formatTypes: formatTypes
      }), children && children({
        isSelected: isSelected,
        value: this.record,
        onChange: this.onChange,
        onFocus: onFocus,
        Editable: this.Editable
      }), !children && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(this.Editable, null));
    }
  }]);

  return RichText;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["Component"]);

RichText.defaultProps = {
  format: 'string',
  value: ''
};
var RichTextWrapper = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_12__["compose"])([_wordpress_compose__WEBPACK_IMPORTED_MODULE_12__["withSafeTimeout"], _with_format_types__WEBPACK_IMPORTED_MODULE_28__["default"]])(RichText);
/**
 * Renders a rich content input, providing users with the option to format the
 * content.
 */

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["forwardRef"])(function (props, ref) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(RichTextWrapper, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, props, {
    forwardedRef: ref
  }));
}));


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/component/inline-warning.js":
/*!************************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/component/inline-warning.js ***!
  \************************************************************************************/
/*! exports provided: InlineWarning */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "InlineWarning", function() { return InlineWarning; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

function InlineWarning(_ref) {
  var forwardedRef = _ref.forwardedRef;
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useEffect"])(function () {
    if (true) {
      var computedStyle = window.getComputedStyle(forwardedRef.current);

      if (computedStyle.display === 'inline') {
        // eslint-disable-next-line no-console
        console.warn('RichText cannot be used with an inline container. Please use a different tagName.');
      }
    }
  }, []);
  return null;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/component/with-format-types.js":
/*!***************************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/component/with-format-types.js ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return withFormatTypes; });
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */




function formatTypesSelector(select) {
  return select('core/rich-text').getFormatTypes();
}
/**
 * This higher-order component provides RichText with the `formatTypes` prop
 * and its derived props from experimental format type settings.
 *
 * @param {WPComponent} RichText The rich text component to add props for.
 *
 * @return {WPComponent} New enhanced component.
 */


function withFormatTypes(RichText) {
  return function WithFormatTypes(props) {
    var clientId = props.clientId,
        identifier = props.identifier;
    var formatTypes = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useSelect"])(formatTypesSelector, []);
    var selectProps = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["useSelect"])(function (select) {
      return formatTypes.reduce(function (acc, settings) {
        if (!settings.__experimentalGetPropsForEditableTreePreparation) {
          return acc;
        }

        var selectPrefix = "format_prepare_props_(".concat(settings.name, ")_");
        return _objectSpread({}, acc, {}, Object(lodash__WEBPACK_IMPORTED_MODULE_3__["mapKeys"])(settings.__experimentalGetPropsForEditableTreePreparation(select, {
          richTextIdentifier: identifier,
          blockClientId: clientId
        }), function (value, key) {
          return selectPrefix + key;
        }));
      }, {});
    }, [formatTypes, clientId, identifier]);

    var dispatchProps = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__["__unstableUseDispatchWithMap"])(function (dispatch) {
      return formatTypes.reduce(function (acc, settings) {
        if (!settings.__experimentalGetPropsForEditableTreeChangeHandler) {
          return acc;
        }

        var dispatchPrefix = "format_on_change_props_(".concat(settings.name, ")_");
        return _objectSpread({}, acc, {}, Object(lodash__WEBPACK_IMPORTED_MODULE_3__["mapKeys"])(settings.__experimentalGetPropsForEditableTreeChangeHandler(dispatch, {
          richTextIdentifier: identifier,
          blockClientId: clientId
        }), function (value, key) {
          return dispatchPrefix + key;
        }));
      }, {});
    }, [formatTypes, clientId, identifier]);

    var newProps = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["useMemo"])(function () {
      return formatTypes.reduce(function (acc, settings) {
        if (!settings.__experimentalCreatePrepareEditableTree) {
          return acc;
        }

        var args = {
          richTextIdentifier: identifier,
          blockClientId: clientId
        };

        var combined = _objectSpread({}, selectProps, {}, dispatchProps);

        var name = settings.name;
        var selectPrefix = "format_prepare_props_(".concat(name, ")_");
        var dispatchPrefix = "format_on_change_props_(".concat(name, ")_");
        var propsByPrefix = Object.keys(combined).reduce(function (accumulator, key) {
          if (key.startsWith(selectPrefix)) {
            accumulator[key.slice(selectPrefix.length)] = combined[key];
          }

          if (key.startsWith(dispatchPrefix)) {
            accumulator[key.slice(dispatchPrefix.length)] = combined[key];
          }

          return accumulator;
        }, {});

        if (settings.__experimentalCreateOnChangeEditableValue) {
          var _objectSpread2;

          return _objectSpread({}, acc, (_objectSpread2 = {}, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(_objectSpread2, "format_value_functions_(".concat(name, ")"), settings.__experimentalCreatePrepareEditableTree(propsByPrefix, args)), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(_objectSpread2, "format_on_change_functions_(".concat(name, ")"), settings.__experimentalCreateOnChangeEditableValue(propsByPrefix, args)), _objectSpread2));
        }

        return _objectSpread({}, acc, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])({}, "format_prepare_functions_(".concat(name, ")"), settings.__experimentalCreatePrepareEditableTree(propsByPrefix, args)));
      }, {});
    }, [formatTypes, clientId, identifier, selectProps, dispatchProps]);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(RichText, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, props, selectProps, newProps, {
      formatTypes: formatTypes
    }));
  };
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/concat.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/concat.js ***!
  \******************************************************************/
/*! exports provided: mergePair, concat */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "mergePair", function() { return mergePair; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "concat", function() { return concat; });
/* harmony import */ var _normalise_formats__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./normalise-formats */ "./node_modules/@wordpress/rich-text/build-module/normalise-formats.js");
/* harmony import */ var _create__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./create */ "./node_modules/@wordpress/rich-text/build-module/create.js");
/**
 * Internal dependencies
 */


/**
 * Concats a pair of rich text values. Not that this mutates `a` and does NOT
 * normalise formats!
 *
 * @param  {Object} a Value to mutate.
 * @param  {Object} b Value to add read from.
 *
 * @return {Object} `a`, mutated.
 */

function mergePair(a, b) {
  a.formats = a.formats.concat(b.formats);
  a.replacements = a.replacements.concat(b.replacements);
  a.text += b.text;
  return a;
}
/**
 * Combine all Rich Text values into one. This is similar to
 * `String.prototype.concat`.
 *
 * @param {...Object} values Objects to combine.
 *
 * @return {Object} A new value combining all given records.
 */

function concat() {
  for (var _len = arguments.length, values = new Array(_len), _key = 0; _key < _len; _key++) {
    values[_key] = arguments[_key];
  }

  return Object(_normalise_formats__WEBPACK_IMPORTED_MODULE_0__["normaliseFormats"])(values.reduce(mergePair, Object(_create__WEBPACK_IMPORTED_MODULE_1__["create"])()));
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/create-element.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/create-element.js ***!
  \**************************************************************************/
/*! exports provided: createElement */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createElement", function() { return createElement; });
/**
 * Parse the given HTML into a body element.
 *
 * Note: The current implementation will return a shared reference, reset on
 * each call to `createElement`. Therefore, you should not hold a reference to
 * the value to operate upon asynchronously, as it may have unexpected results.
 *
 * @param {HTMLDocument} document The HTML document to use to parse.
 * @param {string}       html     The HTML to parse.
 *
 * @return {HTMLBodyElement} Body element with parsed HTML.
 */
function createElement(_ref, html) {
  var implementation = _ref.implementation;

  // Because `createHTMLDocument` is an expensive operation, and with this
  // function being internal to `rich-text` (full control in avoiding a risk
  // of asynchronous operations on the shared reference), a single document
  // is reused and reset for each call to the function.
  if (!createElement.body) {
    createElement.body = implementation.createHTMLDocument('').body;
  }

  createElement.body.innerHTML = html;
  return createElement.body;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/create.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/create.js ***!
  \******************************************************************/
/*! exports provided: create */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "create", function() { return create; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/typeof */ "./node_modules/@babel/runtime/helpers/esm/typeof.js");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _is_format_equal__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./is-format-equal */ "./node_modules/@wordpress/rich-text/build-module/is-format-equal.js");
/* harmony import */ var _create_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./create-element */ "./node_modules/@wordpress/rich-text/build-module/create-element.js");
/* harmony import */ var _concat__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./concat */ "./node_modules/@wordpress/rich-text/build-module/concat.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */





/**
 * Browser dependencies
 */

var _window$Node = window.Node,
    TEXT_NODE = _window$Node.TEXT_NODE,
    ELEMENT_NODE = _window$Node.ELEMENT_NODE;

function createEmptyValue() {
  return {
    formats: [],
    replacements: [],
    text: ''
  };
}

function simpleFindKey(object, value) {
  for (var key in object) {
    if (object[key] === value) {
      return key;
    }
  }
}

function toFormat(_ref) {
  var type = _ref.type,
      attributes = _ref.attributes;
  var formatType;

  if (attributes && attributes.class) {
    formatType = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/rich-text').getFormatTypeForClassName(attributes.class);

    if (formatType) {
      // Preserve any additional classes.
      attributes.class = " ".concat(attributes.class, " ").replace(" ".concat(formatType.className, " "), ' ').trim();

      if (!attributes.class) {
        delete attributes.class;
      }
    }
  }

  if (!formatType) {
    formatType = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["select"])('core/rich-text').getFormatTypeForBareElement(type);
  }

  if (!formatType) {
    return attributes ? {
      type: type,
      attributes: attributes
    } : {
      type: type
    };
  }

  if (formatType.__experimentalCreatePrepareEditableTree && !formatType.__experimentalCreateOnChangeEditableValue) {
    return null;
  }

  if (!attributes) {
    return {
      type: formatType.name
    };
  }

  var registeredAttributes = {};
  var unregisteredAttributes = {};

  for (var name in attributes) {
    var key = simpleFindKey(formatType.attributes, name);

    if (key) {
      registeredAttributes[key] = attributes[name];
    } else {
      unregisteredAttributes[name] = attributes[name];
    }
  }

  return {
    type: formatType.name,
    attributes: registeredAttributes,
    unregisteredAttributes: unregisteredAttributes
  };
}
/**
 * Create a RichText value from an `Element` tree (DOM), an HTML string or a
 * plain text string, with optionally a `Range` object to set the selection. If
 * called without any input, an empty value will be created. If
 * `multilineTag` is provided, any content of direct children whose type matches
 * `multilineTag` will be separated by two newlines. The optional functions can
 * be used to filter out content.
 *
 * A value will have the following shape, which you are strongly encouraged not
 * to modify without the use of helper functions:
 *
 * ```js
 * {
 *   text: string,
 *   formats: Array,
 *   replacements: Array,
 *   ?start: number,
 *   ?end: number,
 * }
 * ```
 *
 * As you can see, text and formatting are separated. `text` holds the text,
 * including any replacement characters for objects and lines. `formats`,
 * `objects` and `lines` are all sparse arrays of the same length as `text`. It
 * holds information about the formatting at the relevant text indices. Finally
 * `start` and `end` state which text indices are selected. They are only
 * provided if a `Range` was given.
 *
 * @param {Object}  [$1]                      Optional named arguments.
 * @param {Element} [$1.element]              Element to create value from.
 * @param {string}  [$1.text]                 Text to create value from.
 * @param {string}  [$1.html]                 HTML to create value from.
 * @param {Range}   [$1.range]                Range to create value from.
 * @param {string}  [$1.multilineTag]         Multiline tag if the structure is
 *                                            multiline.
 * @param {Array}   [$1.multilineWrapperTags] Tags where lines can be found if
 *                                            nesting is possible.
 * @param {?boolean} [$1.preserveWhiteSpace]  Whether or not to collapse white
 *                                            space characters.
 *
 * @return {Object} A rich text value.
 */


function create() {
  var _ref2 = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {},
      element = _ref2.element,
      text = _ref2.text,
      html = _ref2.html,
      range = _ref2.range,
      multilineTag = _ref2.multilineTag,
      multilineWrapperTags = _ref2.multilineWrapperTags,
      isEditableTree = _ref2.__unstableIsEditableTree,
      preserveWhiteSpace = _ref2.preserveWhiteSpace;

  if (typeof text === 'string' && text.length > 0) {
    return {
      formats: Array(text.length),
      replacements: Array(text.length),
      text: text
    };
  }

  if (typeof html === 'string' && html.length > 0) {
    element = Object(_create_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(document, html);
  }

  if (Object(_babel_runtime_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_2__["default"])(element) !== 'object') {
    return createEmptyValue();
  }

  if (!multilineTag) {
    return createFromElement({
      element: element,
      range: range,
      isEditableTree: isEditableTree,
      preserveWhiteSpace: preserveWhiteSpace
    });
  }

  return createFromMultilineElement({
    element: element,
    range: range,
    multilineTag: multilineTag,
    multilineWrapperTags: multilineWrapperTags,
    isEditableTree: isEditableTree,
    preserveWhiteSpace: preserveWhiteSpace
  });
}
/**
 * Helper to accumulate the value's selection start and end from the current
 * node and range.
 *
 * @param {Object} accumulator Object to accumulate into.
 * @param {Node}   node        Node to create value with.
 * @param {Range}  range       Range to create value with.
 * @param {Object} value       Value that is being accumulated.
 */

function accumulateSelection(accumulator, node, range, value) {
  if (!range) {
    return;
  }

  var parentNode = node.parentNode;
  var startContainer = range.startContainer,
      startOffset = range.startOffset,
      endContainer = range.endContainer,
      endOffset = range.endOffset;
  var currentLength = accumulator.text.length; // Selection can be extracted from value.

  if (value.start !== undefined) {
    accumulator.start = currentLength + value.start; // Range indicates that the current node has selection.
  } else if (node === startContainer && node.nodeType === TEXT_NODE) {
    accumulator.start = currentLength + startOffset; // Range indicates that the current node is selected.
  } else if (parentNode === startContainer && node === startContainer.childNodes[startOffset]) {
    accumulator.start = currentLength; // Range indicates that the selection is after the current node.
  } else if (parentNode === startContainer && node === startContainer.childNodes[startOffset - 1]) {
    accumulator.start = currentLength + value.text.length; // Fallback if no child inside handled the selection.
  } else if (node === startContainer) {
    accumulator.start = currentLength;
  } // Selection can be extracted from value.


  if (value.end !== undefined) {
    accumulator.end = currentLength + value.end; // Range indicates that the current node has selection.
  } else if (node === endContainer && node.nodeType === TEXT_NODE) {
    accumulator.end = currentLength + endOffset; // Range indicates that the current node is selected.
  } else if (parentNode === endContainer && node === endContainer.childNodes[endOffset - 1]) {
    accumulator.end = currentLength + value.text.length; // Range indicates that the selection is before the current node.
  } else if (parentNode === endContainer && node === endContainer.childNodes[endOffset]) {
    accumulator.end = currentLength; // Fallback if no child inside handled the selection.
  } else if (node === endContainer) {
    accumulator.end = currentLength + endOffset;
  }
}
/**
 * Adjusts the start and end offsets from a range based on a text filter.
 *
 * @param {Node}     node   Node of which the text should be filtered.
 * @param {Range}    range  The range to filter.
 * @param {Function} filter Function to use to filter the text.
 *
 * @return {?Object} Object containing range properties.
 */


function filterRange(node, range, filter) {
  if (!range) {
    return;
  }

  var startContainer = range.startContainer,
      endContainer = range.endContainer;
  var startOffset = range.startOffset,
      endOffset = range.endOffset;

  if (node === startContainer) {
    startOffset = filter(node.nodeValue.slice(0, startOffset)).length;
  }

  if (node === endContainer) {
    endOffset = filter(node.nodeValue.slice(0, endOffset)).length;
  }

  return {
    startContainer: startContainer,
    startOffset: startOffset,
    endContainer: endContainer,
    endOffset: endOffset
  };
}
/**
 * Collapse any whitespace used for HTML formatting to one space character,
 * because it will also be displayed as such by the browser.
 *
 * @param {string} string
 */


function collapseWhiteSpace(string) {
  return string.replace(/[\n\r\t]+/g, ' ');
}

var ZWNBSPRegExp = new RegExp(_special_characters__WEBPACK_IMPORTED_MODULE_7__["ZWNBSP"], 'g');
/**
 * Removes padding (zero width non breaking spaces) added by `toTree`.
 *
 * @param {string} string
 */

function removePadding(string) {
  return string.replace(ZWNBSPRegExp, '');
}
/**
 * Creates a Rich Text value from a DOM element and range.
 *
 * @param {Object}    $1                      Named argements.
 * @param {?Element}  $1.element              Element to create value from.
 * @param {?Range}    $1.range                Range to create value from.
 * @param {?string}   $1.multilineTag         Multiline tag if the structure is
 *                                            multiline.
 * @param {?Array}    $1.multilineWrapperTags Tags where lines can be found if
 *                                            nesting is possible.
 * @param {?boolean} $1.preserveWhiteSpace    Whether or not to collapse white
 *                                            space characters.
 *
 * @return {Object} A rich text value.
 */


function createFromElement(_ref3) {
  var element = _ref3.element,
      range = _ref3.range,
      multilineTag = _ref3.multilineTag,
      multilineWrapperTags = _ref3.multilineWrapperTags,
      _ref3$currentWrapperT = _ref3.currentWrapperTags,
      currentWrapperTags = _ref3$currentWrapperT === void 0 ? [] : _ref3$currentWrapperT,
      isEditableTree = _ref3.isEditableTree,
      preserveWhiteSpace = _ref3.preserveWhiteSpace;
  var accumulator = createEmptyValue();

  if (!element) {
    return accumulator;
  }

  if (!element.hasChildNodes()) {
    accumulateSelection(accumulator, element, range, createEmptyValue());
    return accumulator;
  }

  var length = element.childNodes.length; // Optimise for speed.

  var _loop = function _loop(index) {
    var node = element.childNodes[index];
    var type = node.nodeName.toLowerCase();

    if (node.nodeType === TEXT_NODE) {
      var filter = removePadding;

      if (!preserveWhiteSpace) {
        filter = function filter(string) {
          return removePadding(collapseWhiteSpace(string));
        };
      }

      var text = filter(node.nodeValue);
      range = filterRange(node, range, filter);
      accumulateSelection(accumulator, node, range, {
        text: text
      }); // Create a sparse array of the same length as `text`, in which
      // formats can be added.

      accumulator.formats.length += text.length;
      accumulator.replacements.length += text.length;
      accumulator.text += text;
      return "continue";
    }

    if (node.nodeType !== ELEMENT_NODE) {
      return "continue";
    }

    if (isEditableTree && ( // Ignore any placeholders.
    node.getAttribute('data-rich-text-placeholder') || // Ignore any line breaks that are not inserted by us.
    type === 'br' && !node.getAttribute('data-rich-text-line-break'))) {
      accumulateSelection(accumulator, node, range, createEmptyValue());
      return "continue";
    }

    if (type === 'br') {
      accumulateSelection(accumulator, node, range, createEmptyValue());
      Object(_concat__WEBPACK_IMPORTED_MODULE_6__["mergePair"])(accumulator, create({
        text: '\n'
      }));
      return "continue";
    }

    var lastFormats = accumulator.formats[accumulator.formats.length - 1];
    var lastFormat = lastFormats && lastFormats[lastFormats.length - 1];
    var newFormat = toFormat({
      type: type,
      attributes: getAttributes({
        element: node
      })
    });
    var format = Object(_is_format_equal__WEBPACK_IMPORTED_MODULE_4__["isFormatEqual"])(newFormat, lastFormat) ? lastFormat : newFormat;

    if (multilineWrapperTags && multilineWrapperTags.indexOf(type) !== -1) {
      var _value = createFromMultilineElement({
        element: node,
        range: range,
        multilineTag: multilineTag,
        multilineWrapperTags: multilineWrapperTags,
        currentWrapperTags: [].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__["default"])(currentWrapperTags), [format]),
        isEditableTree: isEditableTree,
        preserveWhiteSpace: preserveWhiteSpace
      });

      accumulateSelection(accumulator, node, range, _value);
      Object(_concat__WEBPACK_IMPORTED_MODULE_6__["mergePair"])(accumulator, _value);
      return "continue";
    }

    var value = createFromElement({
      element: node,
      range: range,
      multilineTag: multilineTag,
      multilineWrapperTags: multilineWrapperTags,
      isEditableTree: isEditableTree,
      preserveWhiteSpace: preserveWhiteSpace
    });
    accumulateSelection(accumulator, node, range, value);

    if (!format) {
      Object(_concat__WEBPACK_IMPORTED_MODULE_6__["mergePair"])(accumulator, value);
    } else if (value.text.length === 0) {
      if (format.attributes) {
        Object(_concat__WEBPACK_IMPORTED_MODULE_6__["mergePair"])(accumulator, {
          formats: [,],
          replacements: [format],
          text: _special_characters__WEBPACK_IMPORTED_MODULE_7__["OBJECT_REPLACEMENT_CHARACTER"]
        });
      }
    } else {
      // Indices should share a reference to the same formats array.
      // Only create a new reference if `formats` changes.
      function mergeFormats(formats) {
        if (mergeFormats.formats === formats) {
          return mergeFormats.newFormats;
        }

        var newFormats = formats ? [format].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__["default"])(formats)) : [format];
        mergeFormats.formats = formats;
        mergeFormats.newFormats = newFormats;
        return newFormats;
      } // Since the formats parameter can be `undefined`, preset
      // `mergeFormats` with a new reference.


      mergeFormats.newFormats = [format];
      Object(_concat__WEBPACK_IMPORTED_MODULE_6__["mergePair"])(accumulator, _objectSpread({}, value, {
        formats: Array.from(value.formats, mergeFormats)
      }));
    }
  };

  for (var index = 0; index < length; index++) {
    var _ret = _loop(index);

    if (_ret === "continue") continue;
  }

  return accumulator;
}
/**
 * Creates a rich text value from a DOM element and range that should be
 * multiline.
 *
 * @param {Object}   $1                      Named argements.
 * @param {?Element} $1.element              Element to create value from.
 * @param {?Range}   $1.range                Range to create value from.
 * @param {?string}  $1.multilineTag         Multiline tag if the structure is
 *                                           multiline.
 * @param {?Array}   $1.multilineWrapperTags Tags where lines can be found if
 *                                           nesting is possible.
 * @param {boolean}  $1.currentWrapperTags   Whether to prepend a line
 *                                           separator.
 * @param {?boolean} $1.preserveWhiteSpace   Whether or not to collapse white
 *                                           space characters.
 *
 * @return {Object} A rich text value.
 */


function createFromMultilineElement(_ref4) {
  var element = _ref4.element,
      range = _ref4.range,
      multilineTag = _ref4.multilineTag,
      multilineWrapperTags = _ref4.multilineWrapperTags,
      _ref4$currentWrapperT = _ref4.currentWrapperTags,
      currentWrapperTags = _ref4$currentWrapperT === void 0 ? [] : _ref4$currentWrapperT,
      isEditableTree = _ref4.isEditableTree,
      preserveWhiteSpace = _ref4.preserveWhiteSpace;
  var accumulator = createEmptyValue();

  if (!element || !element.hasChildNodes()) {
    return accumulator;
  }

  var length = element.children.length; // Optimise for speed.

  for (var index = 0; index < length; index++) {
    var node = element.children[index];

    if (node.nodeName.toLowerCase() !== multilineTag) {
      continue;
    }

    var value = createFromElement({
      element: node,
      range: range,
      multilineTag: multilineTag,
      multilineWrapperTags: multilineWrapperTags,
      currentWrapperTags: currentWrapperTags,
      isEditableTree: isEditableTree,
      preserveWhiteSpace: preserveWhiteSpace
    }); // Multiline value text should be separated by a line separator.

    if (index !== 0 || currentWrapperTags.length > 0) {
      Object(_concat__WEBPACK_IMPORTED_MODULE_6__["mergePair"])(accumulator, {
        formats: [,],
        replacements: currentWrapperTags.length > 0 ? [currentWrapperTags] : [,],
        text: _special_characters__WEBPACK_IMPORTED_MODULE_7__["LINE_SEPARATOR"]
      });
    }

    accumulateSelection(accumulator, node, range, value);
    Object(_concat__WEBPACK_IMPORTED_MODULE_6__["mergePair"])(accumulator, value);
  }

  return accumulator;
}
/**
 * Gets the attributes of an element in object shape.
 *
 * @param {Object}    $1                 Named argements.
 * @param {Element}   $1.element         Element to get attributes from.
 *
 * @return {?Object} Attribute object or `undefined` if the element has no
 *                   attributes.
 */


function getAttributes(_ref5) {
  var element = _ref5.element;

  if (!element.hasAttributes()) {
    return;
  }

  var length = element.attributes.length;
  var accumulator; // Optimise for speed.

  for (var i = 0; i < length; i++) {
    var _element$attributes$i = element.attributes[i],
        name = _element$attributes$i.name,
        value = _element$attributes$i.value;

    if (name.indexOf('data-rich-text-') === 0) {
      continue;
    }

    accumulator = accumulator || {};
    accumulator[name] = value;
  }

  return accumulator;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-active-format.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-active-format.js ***!
  \*****************************************************************************/
/*! exports provided: getActiveFormat */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getActiveFormat", function() { return getActiveFormat; });
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _get_active_formats__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./get-active-formats */ "./node_modules/@wordpress/rich-text/build-module/get-active-formats.js");
/**
 * External dependencies
 */

/**
 * Internal dependencies
 */


/**
 * Gets the format object by type at the start of the selection. This can be
 * used to get e.g. the URL of a link format at the current selection, but also
 * to check if a format is active at the selection. Returns undefined if there
 * is no format at the selection.
 *
 * @param {Object} value      Value to inspect.
 * @param {string} formatType Format type to look for.
 *
 * @return {Object|undefined} Active format object of the specified type, or undefined.
 */

function getActiveFormat(value, formatType) {
  return Object(lodash__WEBPACK_IMPORTED_MODULE_0__["find"])(Object(_get_active_formats__WEBPACK_IMPORTED_MODULE_1__["getActiveFormats"])(value), {
    type: formatType
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-active-formats.js":
/*!******************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-active-formats.js ***!
  \******************************************************************************/
/*! exports provided: getActiveFormats */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getActiveFormats", function() { return getActiveFormats; });
/**
 * Gets the all format objects at the start of the selection.
 *
 * @param {Object} value                Value to inspect.
 * @param {Array}  EMPTY_ACTIVE_FORMATS Array to return if there are no active
 *                                      formats.
 *
 * @return {?Object} Active format objects.
 */
function getActiveFormats(_ref) {
  var formats = _ref.formats,
      start = _ref.start,
      end = _ref.end,
      activeFormats = _ref.activeFormats;
  var EMPTY_ACTIVE_FORMATS = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : [];

  if (start === undefined) {
    return EMPTY_ACTIVE_FORMATS;
  }

  if (start === end) {
    // For a collapsed caret, it is possible to override the active formats.
    if (activeFormats) {
      return activeFormats;
    }

    var formatsBefore = formats[start - 1] || EMPTY_ACTIVE_FORMATS;
    var formatsAfter = formats[start] || EMPTY_ACTIVE_FORMATS; // By default, select the lowest amount of formats possible (which means
    // the caret is positioned outside the format boundary). The user can
    // then use arrow keys to define `activeFormats`.

    if (formatsBefore.length < formatsAfter.length) {
      return formatsBefore;
    }

    return formatsAfter;
  }

  return formats[start] || EMPTY_ACTIVE_FORMATS;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-active-object.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-active-object.js ***!
  \*****************************************************************************/
/*! exports provided: getActiveObject */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getActiveObject", function() { return getActiveObject; });
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/**
 * Internal dependencies
 */

/**
 * Gets the active object, if there is any.
 *
 * @param {Object} value Value to inspect.
 *
 * @return {?Object} Active object, or undefined.
 */

function getActiveObject(_ref) {
  var start = _ref.start,
      end = _ref.end,
      replacements = _ref.replacements,
      text = _ref.text;

  if (start + 1 !== end || text[start] !== _special_characters__WEBPACK_IMPORTED_MODULE_0__["OBJECT_REPLACEMENT_CHARACTER"]) {
    return;
  }

  return replacements[start];
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-format-type.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-format-type.js ***!
  \***************************************************************************/
/*! exports provided: getFormatType */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFormatType", function() { return getFormatType; });
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

/**
 * Returns a registered format type.
 *
 * @param {string} name Format name.
 *
 * @return {?Object} Format type.
 */

function getFormatType(name) {
  return Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["select"])('core/rich-text').getFormatType(name);
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-last-child-index.js":
/*!********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-last-child-index.js ***!
  \********************************************************************************/
/*! exports provided: getLastChildIndex */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getLastChildIndex", function() { return getLastChildIndex; });
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/**
 * Internal dependencies
 */

/**
 * Gets the line index of the last child in the list.
 *
 * @param {Object} value     Value to search.
 * @param {number} lineIndex Line index of a list item in the list.
 *
 * @return {Array} The index of the last child.
 */

function getLastChildIndex(_ref, lineIndex) {
  var text = _ref.text,
      replacements = _ref.replacements;
  var lineFormats = replacements[lineIndex] || []; // Use the given line index in case there are no next children.

  var childIndex = lineIndex; // `lineIndex` could be `undefined` if it's the first line.

  for (var index = lineIndex || 0; index < text.length; index++) {
    // We're only interested in line indices.
    if (text[index] !== _special_characters__WEBPACK_IMPORTED_MODULE_0__["LINE_SEPARATOR"]) {
      continue;
    }

    var formatsAtIndex = replacements[index] || []; // If the amout of formats is equal or more, store it, then return the
    // last one if the amount of formats is less.

    if (formatsAtIndex.length >= lineFormats.length) {
      childIndex = index;
    } else {
      return childIndex;
    }
  } // If the end of the text is reached, return the last child index.


  return childIndex;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-line-index.js ***!
  \**************************************************************************/
/*! exports provided: getLineIndex */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getLineIndex", function() { return getLineIndex; });
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/**
 * Internal dependencies
 */

/**
 * Gets the currently selected line index, or the first line index if the
 * selection spans over multiple items.
 *
 * @param {Object}  value      Value to get the line index from.
 * @param {boolean} startIndex Optional index that should be contained by the
 *                             line. Defaults to the selection start of the
 *                             value.
 *
 * @return {?boolean} The line index. Undefined if not found.
 */

function getLineIndex(_ref) {
  var start = _ref.start,
      text = _ref.text;
  var startIndex = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : start;
  var index = startIndex;

  while (index--) {
    if (text[index] === _special_characters__WEBPACK_IMPORTED_MODULE_0__["LINE_SEPARATOR"]) {
      return index;
    }
  }
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-parent-line-index.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-parent-line-index.js ***!
  \*********************************************************************************/
/*! exports provided: getParentLineIndex */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getParentLineIndex", function() { return getParentLineIndex; });
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/**
 * Internal dependencies
 */

/**
 * Gets the index of the first parent list. To get the parent list formats, we
 * go through every list item until we find one with exactly one format type
 * less.
 *
 * @param {Object} value     Value to search.
 * @param {number} lineIndex Line index of a child list item.
 *
 * @return {Array} The parent list line index.
 */

function getParentLineIndex(_ref, lineIndex) {
  var text = _ref.text,
      replacements = _ref.replacements;
  var startFormats = replacements[lineIndex] || [];
  var index = lineIndex;

  while (index-- >= 0) {
    if (text[index] !== _special_characters__WEBPACK_IMPORTED_MODULE_0__["LINE_SEPARATOR"]) {
      continue;
    }

    var formatsAtIndex = replacements[index] || [];

    if (formatsAtIndex.length === startFormats.length - 1) {
      return index;
    }
  }
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/get-text-content.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/get-text-content.js ***!
  \****************************************************************************/
/*! exports provided: getTextContent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getTextContent", function() { return getTextContent; });
/**
 * Get the textual content of a Rich Text value. This is similar to
 * `Element.textContent`.
 *
 * @param {Object} value Value to use.
 *
 * @return {string} The text content.
 */
function getTextContent(_ref) {
  var text = _ref.text;
  return text;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/indent-list-items.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/indent-list-items.js ***!
  \*****************************************************************************/
/*! exports provided: indentListItems */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "indentListItems", function() { return indentListItems; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/* harmony import */ var _get_line_index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./get-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js");
/* harmony import */ var _can_indent_list_items__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./can-indent-list-items */ "./node_modules/@wordpress/rich-text/build-module/can-indent-list-items.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */



/**
 * Gets the line index of the first previous list item with higher indentation.
 *
 * @param {Object} value      Value to search.
 * @param {number} lineIndex  Line index of the list item to compare with.
 *
 * @return {boolean} The line index.
 */

function getTargetLevelLineIndex(_ref, lineIndex) {
  var text = _ref.text,
      replacements = _ref.replacements;
  var startFormats = replacements[lineIndex] || [];
  var index = lineIndex;

  while (index-- >= 0) {
    if (text[index] !== _special_characters__WEBPACK_IMPORTED_MODULE_1__["LINE_SEPARATOR"]) {
      continue;
    }

    var formatsAtIndex = replacements[index] || []; // Return the first line index that is one level higher. If the level is
    // lower or equal, there is no result.

    if (formatsAtIndex.length === startFormats.length + 1) {
      return index;
    } else if (formatsAtIndex.length <= startFormats.length) {
      return;
    }
  }
}
/**
 * Indents any selected list items if possible.
 *
 * @param {Object} value      Value to change.
 * @param {Object} rootFormat Root format.
 *
 * @return {Object} The changed value.
 */


function indentListItems(value, rootFormat) {
  if (!Object(_can_indent_list_items__WEBPACK_IMPORTED_MODULE_3__["canIndentListItems"])(value)) {
    return value;
  }

  var lineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_2__["getLineIndex"])(value);
  var previousLineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_2__["getLineIndex"])(value, lineIndex);
  var text = value.text,
      replacements = value.replacements,
      end = value.end;
  var newFormats = replacements.slice();
  var targetLevelLineIndex = getTargetLevelLineIndex(value, lineIndex);

  for (var index = lineIndex; index < end; index++) {
    if (text[index] !== _special_characters__WEBPACK_IMPORTED_MODULE_1__["LINE_SEPARATOR"]) {
      continue;
    } // Get the previous list, and if there's a child list, take over the
    // formats. If not, duplicate the last level and create a new level.


    if (targetLevelLineIndex) {
      var targetFormats = replacements[targetLevelLineIndex] || [];
      newFormats[index] = targetFormats.concat((newFormats[index] || []).slice(targetFormats.length - 1));
    } else {
      var _targetFormats = replacements[previousLineIndex] || [];

      var lastformat = _targetFormats[_targetFormats.length - 1] || rootFormat;
      newFormats[index] = _targetFormats.concat([lastformat], (newFormats[index] || []).slice(_targetFormats.length));
    }
  }

  return _objectSpread({}, value, {
    replacements: newFormats
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/index.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/index.js ***!
  \*****************************************************************/
/*! exports provided: applyFormat, concat, create, getActiveFormat, getActiveObject, getTextContent, __unstableIsListRootSelected, __unstableIsActiveListType, isCollapsed, isEmpty, __unstableIsEmptyLine, join, registerFormatType, removeFormat, remove, replace, insert, __unstableInsertLineSeparator, __unstableRemoveLineSeparator, insertObject, slice, split, __unstableToDom, toHTMLString, toggleFormat, __UNSTABLE_LINE_SEPARATOR, unregisterFormatType, __unstableCanIndentListItems, __unstableCanOutdentListItems, __unstableIndentListItems, __unstableOutdentListItems, __unstableChangeListType, __unstableCreateElement, __experimentalRichText, __unstableFormatEdit */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./store */ "./node_modules/@wordpress/rich-text/build-module/store/index.js");
/* harmony import */ var _apply_format__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./apply-format */ "./node_modules/@wordpress/rich-text/build-module/apply-format.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "applyFormat", function() { return _apply_format__WEBPACK_IMPORTED_MODULE_1__["applyFormat"]; });

/* harmony import */ var _concat__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./concat */ "./node_modules/@wordpress/rich-text/build-module/concat.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "concat", function() { return _concat__WEBPACK_IMPORTED_MODULE_2__["concat"]; });

/* harmony import */ var _create__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./create */ "./node_modules/@wordpress/rich-text/build-module/create.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "create", function() { return _create__WEBPACK_IMPORTED_MODULE_3__["create"]; });

/* harmony import */ var _get_active_format__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./get-active-format */ "./node_modules/@wordpress/rich-text/build-module/get-active-format.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "getActiveFormat", function() { return _get_active_format__WEBPACK_IMPORTED_MODULE_4__["getActiveFormat"]; });

/* harmony import */ var _get_active_object__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./get-active-object */ "./node_modules/@wordpress/rich-text/build-module/get-active-object.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "getActiveObject", function() { return _get_active_object__WEBPACK_IMPORTED_MODULE_5__["getActiveObject"]; });

/* harmony import */ var _get_text_content__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./get-text-content */ "./node_modules/@wordpress/rich-text/build-module/get-text-content.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "getTextContent", function() { return _get_text_content__WEBPACK_IMPORTED_MODULE_6__["getTextContent"]; });

/* harmony import */ var _is_list_root_selected__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./is-list-root-selected */ "./node_modules/@wordpress/rich-text/build-module/is-list-root-selected.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableIsListRootSelected", function() { return _is_list_root_selected__WEBPACK_IMPORTED_MODULE_7__["isListRootSelected"]; });

/* harmony import */ var _is_active_list_type__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./is-active-list-type */ "./node_modules/@wordpress/rich-text/build-module/is-active-list-type.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableIsActiveListType", function() { return _is_active_list_type__WEBPACK_IMPORTED_MODULE_8__["isActiveListType"]; });

/* harmony import */ var _is_collapsed__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./is-collapsed */ "./node_modules/@wordpress/rich-text/build-module/is-collapsed.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "isCollapsed", function() { return _is_collapsed__WEBPACK_IMPORTED_MODULE_9__["isCollapsed"]; });

/* harmony import */ var _is_empty__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./is-empty */ "./node_modules/@wordpress/rich-text/build-module/is-empty.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "isEmpty", function() { return _is_empty__WEBPACK_IMPORTED_MODULE_10__["isEmpty"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableIsEmptyLine", function() { return _is_empty__WEBPACK_IMPORTED_MODULE_10__["isEmptyLine"]; });

/* harmony import */ var _join__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./join */ "./node_modules/@wordpress/rich-text/build-module/join.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "join", function() { return _join__WEBPACK_IMPORTED_MODULE_11__["join"]; });

/* harmony import */ var _register_format_type__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./register-format-type */ "./node_modules/@wordpress/rich-text/build-module/register-format-type.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "registerFormatType", function() { return _register_format_type__WEBPACK_IMPORTED_MODULE_12__["registerFormatType"]; });

/* harmony import */ var _remove_format__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./remove-format */ "./node_modules/@wordpress/rich-text/build-module/remove-format.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "removeFormat", function() { return _remove_format__WEBPACK_IMPORTED_MODULE_13__["removeFormat"]; });

/* harmony import */ var _remove__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./remove */ "./node_modules/@wordpress/rich-text/build-module/remove.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "remove", function() { return _remove__WEBPACK_IMPORTED_MODULE_14__["remove"]; });

/* harmony import */ var _replace__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./replace */ "./node_modules/@wordpress/rich-text/build-module/replace.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "replace", function() { return _replace__WEBPACK_IMPORTED_MODULE_15__["replace"]; });

/* harmony import */ var _insert__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./insert */ "./node_modules/@wordpress/rich-text/build-module/insert.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "insert", function() { return _insert__WEBPACK_IMPORTED_MODULE_16__["insert"]; });

/* harmony import */ var _insert_line_separator__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./insert-line-separator */ "./node_modules/@wordpress/rich-text/build-module/insert-line-separator.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableInsertLineSeparator", function() { return _insert_line_separator__WEBPACK_IMPORTED_MODULE_17__["insertLineSeparator"]; });

/* harmony import */ var _remove_line_separator__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./remove-line-separator */ "./node_modules/@wordpress/rich-text/build-module/remove-line-separator.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableRemoveLineSeparator", function() { return _remove_line_separator__WEBPACK_IMPORTED_MODULE_18__["removeLineSeparator"]; });

/* harmony import */ var _insert_object__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./insert-object */ "./node_modules/@wordpress/rich-text/build-module/insert-object.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "insertObject", function() { return _insert_object__WEBPACK_IMPORTED_MODULE_19__["insertObject"]; });

/* harmony import */ var _slice__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./slice */ "./node_modules/@wordpress/rich-text/build-module/slice.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "slice", function() { return _slice__WEBPACK_IMPORTED_MODULE_20__["slice"]; });

/* harmony import */ var _split__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ./split */ "./node_modules/@wordpress/rich-text/build-module/split.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "split", function() { return _split__WEBPACK_IMPORTED_MODULE_21__["split"]; });

/* harmony import */ var _to_dom__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ./to-dom */ "./node_modules/@wordpress/rich-text/build-module/to-dom.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableToDom", function() { return _to_dom__WEBPACK_IMPORTED_MODULE_22__["toDom"]; });

/* harmony import */ var _to_html_string__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! ./to-html-string */ "./node_modules/@wordpress/rich-text/build-module/to-html-string.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "toHTMLString", function() { return _to_html_string__WEBPACK_IMPORTED_MODULE_23__["toHTMLString"]; });

/* harmony import */ var _toggle_format__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! ./toggle-format */ "./node_modules/@wordpress/rich-text/build-module/toggle-format.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "toggleFormat", function() { return _toggle_format__WEBPACK_IMPORTED_MODULE_24__["toggleFormat"]; });

/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__UNSTABLE_LINE_SEPARATOR", function() { return _special_characters__WEBPACK_IMPORTED_MODULE_25__["LINE_SEPARATOR"]; });

/* harmony import */ var _unregister_format_type__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! ./unregister-format-type */ "./node_modules/@wordpress/rich-text/build-module/unregister-format-type.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "unregisterFormatType", function() { return _unregister_format_type__WEBPACK_IMPORTED_MODULE_26__["unregisterFormatType"]; });

/* harmony import */ var _can_indent_list_items__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! ./can-indent-list-items */ "./node_modules/@wordpress/rich-text/build-module/can-indent-list-items.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableCanIndentListItems", function() { return _can_indent_list_items__WEBPACK_IMPORTED_MODULE_27__["canIndentListItems"]; });

/* harmony import */ var _can_outdent_list_items__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! ./can-outdent-list-items */ "./node_modules/@wordpress/rich-text/build-module/can-outdent-list-items.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableCanOutdentListItems", function() { return _can_outdent_list_items__WEBPACK_IMPORTED_MODULE_28__["canOutdentListItems"]; });

/* harmony import */ var _indent_list_items__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! ./indent-list-items */ "./node_modules/@wordpress/rich-text/build-module/indent-list-items.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableIndentListItems", function() { return _indent_list_items__WEBPACK_IMPORTED_MODULE_29__["indentListItems"]; });

/* harmony import */ var _outdent_list_items__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! ./outdent-list-items */ "./node_modules/@wordpress/rich-text/build-module/outdent-list-items.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableOutdentListItems", function() { return _outdent_list_items__WEBPACK_IMPORTED_MODULE_30__["outdentListItems"]; });

/* harmony import */ var _change_list_type__WEBPACK_IMPORTED_MODULE_31__ = __webpack_require__(/*! ./change-list-type */ "./node_modules/@wordpress/rich-text/build-module/change-list-type.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableChangeListType", function() { return _change_list_type__WEBPACK_IMPORTED_MODULE_31__["changeListType"]; });

/* harmony import */ var _create_element__WEBPACK_IMPORTED_MODULE_32__ = __webpack_require__(/*! ./create-element */ "./node_modules/@wordpress/rich-text/build-module/create-element.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableCreateElement", function() { return _create_element__WEBPACK_IMPORTED_MODULE_32__["createElement"]; });

/* harmony import */ var _component__WEBPACK_IMPORTED_MODULE_33__ = __webpack_require__(/*! ./component */ "./node_modules/@wordpress/rich-text/build-module/component/index.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__experimentalRichText", function() { return _component__WEBPACK_IMPORTED_MODULE_33__["default"]; });

/* harmony import */ var _component_format_edit__WEBPACK_IMPORTED_MODULE_34__ = __webpack_require__(/*! ./component/format-edit */ "./node_modules/@wordpress/rich-text/build-module/component/format-edit.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unstableFormatEdit", function() { return _component_format_edit__WEBPACK_IMPORTED_MODULE_34__["default"]; });

/**
 * Internal dependencies
 */





































/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/insert-line-separator.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/insert-line-separator.js ***!
  \*********************************************************************************/
/*! exports provided: insertLineSeparator */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "insertLineSeparator", function() { return insertLineSeparator; });
/* harmony import */ var _get_text_content__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-text-content */ "./node_modules/@wordpress/rich-text/build-module/get-text-content.js");
/* harmony import */ var _insert__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./insert */ "./node_modules/@wordpress/rich-text/build-module/insert.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/**
 * Internal dependencies
 */



/**
 * Insert a line break character into a Rich Text value at the given
 * `startIndex`. Any content between `startIndex` and `endIndex` will be
 * removed. Indices are retrieved from the selection if none are provided.
 *
 * @param {Object} value        Value to modify.
 * @param {number} [startIndex] Start index.
 * @param {number} [endIndex]   End index.
 *
 * @return {Object} A new value with the value inserted.
 */

function insertLineSeparator(value) {
  var startIndex = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : value.start;
  var endIndex = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : value.end;
  var beforeText = Object(_get_text_content__WEBPACK_IMPORTED_MODULE_0__["getTextContent"])(value).slice(0, startIndex);
  var previousLineSeparatorIndex = beforeText.lastIndexOf(_special_characters__WEBPACK_IMPORTED_MODULE_2__["LINE_SEPARATOR"]);
  var previousLineSeparatorFormats = value.replacements[previousLineSeparatorIndex];
  var replacements = [,];

  if (previousLineSeparatorFormats) {
    replacements = [previousLineSeparatorFormats];
  }

  var valueToInsert = {
    formats: [,],
    replacements: replacements,
    text: _special_characters__WEBPACK_IMPORTED_MODULE_2__["LINE_SEPARATOR"]
  };
  return Object(_insert__WEBPACK_IMPORTED_MODULE_1__["insert"])(value, valueToInsert, startIndex, endIndex);
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/insert-object.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/insert-object.js ***!
  \*************************************************************************/
/*! exports provided: insertObject */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "insertObject", function() { return insertObject; });
/* harmony import */ var _insert__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./insert */ "./node_modules/@wordpress/rich-text/build-module/insert.js");
/**
 * Internal dependencies
 */

var OBJECT_REPLACEMENT_CHARACTER = "\uFFFC";
/**
 * Insert a format as an object into a Rich Text value at the given
 * `startIndex`. Any content between `startIndex` and `endIndex` will be
 * removed. Indices are retrieved from the selection if none are provided.
 *
 * @param {Object} value          Value to modify.
 * @param {Object} formatToInsert Format to insert as object.
 * @param {number} [startIndex]   Start index.
 * @param {number} [endIndex]     End index.
 *
 * @return {Object} A new value with the object inserted.
 */

function insertObject(value, formatToInsert, startIndex, endIndex) {
  var valueToInsert = {
    formats: [,],
    replacements: [formatToInsert],
    text: OBJECT_REPLACEMENT_CHARACTER
  };
  return Object(_insert__WEBPACK_IMPORTED_MODULE_0__["insert"])(value, valueToInsert, startIndex, endIndex);
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/insert.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/insert.js ***!
  \******************************************************************/
/*! exports provided: insert */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "insert", function() { return insert; });
/* harmony import */ var _create__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./create */ "./node_modules/@wordpress/rich-text/build-module/create.js");
/* harmony import */ var _normalise_formats__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./normalise-formats */ "./node_modules/@wordpress/rich-text/build-module/normalise-formats.js");
/**
 * Internal dependencies
 */


/**
 * Insert a Rich Text value, an HTML string, or a plain text string, into a
 * Rich Text value at the given `startIndex`. Any content between `startIndex`
 * and `endIndex` will be removed. Indices are retrieved from the selection if
 * none are provided.
 *
 * @param {Object}        value         Value to modify.
 * @param {Object|string} valueToInsert Value to insert.
 * @param {number}        [startIndex]  Start index.
 * @param {number}        [endIndex]    End index.
 *
 * @return {Object} A new value with the value inserted.
 */

function insert(value, valueToInsert) {
  var startIndex = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : value.start;
  var endIndex = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : value.end;
  var formats = value.formats,
      replacements = value.replacements,
      text = value.text;

  if (typeof valueToInsert === 'string') {
    valueToInsert = Object(_create__WEBPACK_IMPORTED_MODULE_0__["create"])({
      text: valueToInsert
    });
  }

  var index = startIndex + valueToInsert.text.length;
  return Object(_normalise_formats__WEBPACK_IMPORTED_MODULE_1__["normaliseFormats"])({
    formats: formats.slice(0, startIndex).concat(valueToInsert.formats, formats.slice(endIndex)),
    replacements: replacements.slice(0, startIndex).concat(valueToInsert.replacements, replacements.slice(endIndex)),
    text: text.slice(0, startIndex) + valueToInsert.text + text.slice(endIndex),
    start: index,
    end: index
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/is-active-list-type.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/is-active-list-type.js ***!
  \*******************************************************************************/
/*! exports provided: isActiveListType */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isActiveListType", function() { return isActiveListType; });
/* harmony import */ var _get_line_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js");
/**
 * Internal dependencies
 */

/**
 * Wether or not the selected list has the given tag name.
 *
 * @param {Object}  value    The value to check.
 * @param {string}  type     The tag name the list should have.
 * @param {string}  rootType The current root tag name, to compare with in case
 *                           nothing is selected.
 *
 * @return {boolean} True if the current list type matches `type`, false if not.
 */

function isActiveListType(value, type, rootType) {
  var replacements = value.replacements,
      start = value.start;
  var lineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_0__["getLineIndex"])(value, start);
  var replacement = replacements[lineIndex];

  if (!replacement || replacement.length === 0) {
    return type === rootType;
  }

  var lastFormat = replacement[replacement.length - 1];
  return lastFormat.type === type;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/is-collapsed.js":
/*!************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/is-collapsed.js ***!
  \************************************************************************/
/*! exports provided: isCollapsed */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isCollapsed", function() { return isCollapsed; });
/**
 * Check if the selection of a Rich Text value is collapsed or not. Collapsed
 * means that no characters are selected, but there is a caret present. If there
 * is no selection, `undefined` will be returned. This is similar to
 * `window.getSelection().isCollapsed()`.
 *
 * @param {Object} value The rich text value to check.
 *
 * @return {boolean|undefined} True if the selection is collapsed, false if not,
 *                             undefined if there is no selection.
 */
function isCollapsed(_ref) {
  var start = _ref.start,
      end = _ref.end;

  if (start === undefined || end === undefined) {
    return;
  }

  return start === end;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/is-empty.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/is-empty.js ***!
  \********************************************************************/
/*! exports provided: isEmpty, isEmptyLine */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isEmpty", function() { return isEmpty; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isEmptyLine", function() { return isEmptyLine; });
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/**
 * Internal dependencies
 */

/**
 * Check if a Rich Text value is Empty, meaning it contains no text or any
 * objects (such as images).
 *
 * @param {Object} value Value to use.
 *
 * @return {boolean} True if the value is empty, false if not.
 */

function isEmpty(_ref) {
  var text = _ref.text;
  return text.length === 0;
}
/**
 * Check if the current collapsed selection is on an empty line in case of a
 * multiline value.
 *
 * @param  {Object} value Value te check.
 *
 * @return {boolean} True if the line is empty, false if not.
 */

function isEmptyLine(_ref2) {
  var text = _ref2.text,
      start = _ref2.start,
      end = _ref2.end;

  if (start !== end) {
    return false;
  }

  if (text.length === 0) {
    return true;
  }

  if (start === 0 && text.slice(0, 1) === _special_characters__WEBPACK_IMPORTED_MODULE_0__["LINE_SEPARATOR"]) {
    return true;
  }

  if (start === text.length && text.slice(-1) === _special_characters__WEBPACK_IMPORTED_MODULE_0__["LINE_SEPARATOR"]) {
    return true;
  }

  return text.slice(start - 1, end + 1) === "".concat(_special_characters__WEBPACK_IMPORTED_MODULE_0__["LINE_SEPARATOR"]).concat(_special_characters__WEBPACK_IMPORTED_MODULE_0__["LINE_SEPARATOR"]);
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/is-format-equal.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/is-format-equal.js ***!
  \***************************************************************************/
/*! exports provided: isFormatEqual */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isFormatEqual", function() { return isFormatEqual; });
/**
 * Optimised equality check for format objects.
 *
 * @param {?Object} format1 Format to compare.
 * @param {?Object} format2 Format to compare.
 *
 * @return {boolean} True if formats are equal, false if not.
 */
function isFormatEqual(format1, format2) {
  // Both not defined.
  if (format1 === format2) {
    return true;
  } // Either not defined.


  if (!format1 || !format2) {
    return false;
  }

  if (format1.type !== format2.type) {
    return false;
  }

  var attributes1 = format1.attributes;
  var attributes2 = format2.attributes; // Both not defined.

  if (attributes1 === attributes2) {
    return true;
  } // Either not defined.


  if (!attributes1 || !attributes2) {
    return false;
  }

  var keys1 = Object.keys(attributes1);
  var keys2 = Object.keys(attributes2);

  if (keys1.length !== keys2.length) {
    return false;
  }

  var length = keys1.length; // Optimise for speed.

  for (var i = 0; i < length; i++) {
    var name = keys1[i];

    if (attributes1[name] !== attributes2[name]) {
      return false;
    }
  }

  return true;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/is-list-root-selected.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/is-list-root-selected.js ***!
  \*********************************************************************************/
/*! exports provided: isListRootSelected */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isListRootSelected", function() { return isListRootSelected; });
/* harmony import */ var _get_line_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js");
/**
 * Internal dependencies
 */

/**
 * Whether or not the root list is selected.
 *
 * @param {Object} value The value to check.
 *
 * @return {boolean} True if the root list or nothing is selected, false if an
 *                   inner list is selected.
 */

function isListRootSelected(value) {
  var replacements = value.replacements,
      start = value.start;
  var lineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_0__["getLineIndex"])(value, start);
  var replacement = replacements[lineIndex];
  return !replacement || replacement.length < 1;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/join.js":
/*!****************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/join.js ***!
  \****************************************************************/
/*! exports provided: join */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "join", function() { return join; });
/* harmony import */ var _create__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./create */ "./node_modules/@wordpress/rich-text/build-module/create.js");
/* harmony import */ var _normalise_formats__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./normalise-formats */ "./node_modules/@wordpress/rich-text/build-module/normalise-formats.js");
/**
 * Internal dependencies
 */


/**
 * Combine an array of Rich Text values into one, optionally separated by
 * `separator`, which can be a Rich Text value, HTML string, or plain text
 * string. This is similar to `Array.prototype.join`.
 *
 * @param {Array<Object>} values      An array of values to join.
 * @param {string|Object} [separator] Separator string or value.
 *
 * @return {Object} A new combined value.
 */

function join(values) {
  var separator = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

  if (typeof separator === 'string') {
    separator = Object(_create__WEBPACK_IMPORTED_MODULE_0__["create"])({
      text: separator
    });
  }

  return Object(_normalise_formats__WEBPACK_IMPORTED_MODULE_1__["normaliseFormats"])(values.reduce(function (accumlator, _ref) {
    var formats = _ref.formats,
        replacements = _ref.replacements,
        text = _ref.text;
    return {
      formats: accumlator.formats.concat(separator.formats, formats),
      replacements: accumlator.replacements.concat(separator.replacements, replacements),
      text: accumlator.text + separator.text + text
    };
  }));
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/normalise-formats.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/normalise-formats.js ***!
  \*****************************************************************************/
/*! exports provided: normaliseFormats */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "normaliseFormats", function() { return normaliseFormats; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _is_format_equal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./is-format-equal */ "./node_modules/@wordpress/rich-text/build-module/is-format-equal.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */

/**
 * Normalises formats: ensures subsequent adjacent equal formats have the same
 * reference.
 *
 * @param {Object} value Value to normalise formats of.
 *
 * @return {Object} New value with normalised formats.
 */

function normaliseFormats(value) {
  var newFormats = value.formats.slice();
  newFormats.forEach(function (formatsAtIndex, index) {
    var formatsAtPreviousIndex = newFormats[index - 1];

    if (formatsAtPreviousIndex) {
      var newFormatsAtIndex = formatsAtIndex.slice();
      newFormatsAtIndex.forEach(function (format, formatIndex) {
        var previousFormat = formatsAtPreviousIndex[formatIndex];

        if (Object(_is_format_equal__WEBPACK_IMPORTED_MODULE_1__["isFormatEqual"])(format, previousFormat)) {
          newFormatsAtIndex[formatIndex] = previousFormat;
        }
      });
      newFormats[index] = newFormatsAtIndex;
    }
  });
  return _objectSpread({}, value, {
    formats: newFormats
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/outdent-list-items.js":
/*!******************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/outdent-list-items.js ***!
  \******************************************************************************/
/*! exports provided: outdentListItems */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "outdentListItems", function() { return outdentListItems; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/* harmony import */ var _get_line_index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./get-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-line-index.js");
/* harmony import */ var _get_parent_line_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./get-parent-line-index */ "./node_modules/@wordpress/rich-text/build-module/get-parent-line-index.js");
/* harmony import */ var _get_last_child_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./get-last-child-index */ "./node_modules/@wordpress/rich-text/build-module/get-last-child-index.js");
/* harmony import */ var _can_outdent_list_items__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./can-outdent-list-items */ "./node_modules/@wordpress/rich-text/build-module/can-outdent-list-items.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */





/**
 * Outdents any selected list items if possible.
 *
 * @param {Object} value Value to change.
 *
 * @return {Object} The changed value.
 */

function outdentListItems(value) {
  if (!Object(_can_outdent_list_items__WEBPACK_IMPORTED_MODULE_5__["canOutdentListItems"])(value)) {
    return value;
  }

  var text = value.text,
      replacements = value.replacements,
      start = value.start,
      end = value.end;
  var startingLineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_2__["getLineIndex"])(value, start);
  var newFormats = replacements.slice(0);
  var parentFormats = replacements[Object(_get_parent_line_index__WEBPACK_IMPORTED_MODULE_3__["getParentLineIndex"])(value, startingLineIndex)] || [];
  var endingLineIndex = Object(_get_line_index__WEBPACK_IMPORTED_MODULE_2__["getLineIndex"])(value, end);
  var lastChildIndex = Object(_get_last_child_index__WEBPACK_IMPORTED_MODULE_4__["getLastChildIndex"])(value, endingLineIndex); // Outdent all list items from the starting line index until the last child
  // index of the ending list. All children of the ending list need to be
  // outdented, otherwise they'll be orphaned.

  for (var index = startingLineIndex; index <= lastChildIndex; index++) {
    // Skip indices that are not line separators.
    if (text[index] !== _special_characters__WEBPACK_IMPORTED_MODULE_1__["LINE_SEPARATOR"]) {
      continue;
    } // In the case of level 0, the formats at the index are undefined.


    var currentFormats = newFormats[index] || []; // Omit the indentation level where the selection starts.

    newFormats[index] = parentFormats.concat(currentFormats.slice(parentFormats.length + 1));

    if (newFormats[index].length === 0) {
      delete newFormats[index];
    }
  }

  return _objectSpread({}, value, {
    replacements: newFormats
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/register-format-type.js":
/*!********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/register-format-type.js ***!
  \********************************************************************************/
/*! exports provided: registerFormatType */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "registerFormatType", function() { return registerFormatType; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */

/**
 * @typedef {Object} WPFormat
 *
 * @property {string}   name        A string identifying the format. Must be
 *                                  unique across all registered formats.
 * @property {string}   tagName     The HTML tag this format will wrap the
 *                                  selection with.
 * @property {string}   [className] A class to match the format.
 * @property {string}   title       Name of the format.
 * @property {Function} edit        Should return a component for the user to
 *                                  interact with the new registered format.
 */

/**
 * Registers a new format provided a unique name and an object defining its
 * behavior.
 *
 * @param {string}   name                 Format name.
 * @param {WPFormat} settings             Format settings.
 *
 * @return {WPFormat|undefined} The format, if it has been successfully registered;
 *                              otherwise `undefined`.
 */

function registerFormatType(name, settings) {
  settings = _objectSpread({
    name: name
  }, settings);

  if (typeof settings.name !== 'string') {
    window.console.error('Format names must be strings.');
    return;
  }

  if (!/^[a-z][a-z0-9-]*\/[a-z][a-z0-9-]*$/.test(settings.name)) {
    window.console.error('Format names must contain a namespace prefix, include only lowercase alphanumeric characters or dashes, and start with a letter. Example: my-plugin/my-custom-format');
    return;
  }

  if (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["select"])('core/rich-text').getFormatType(settings.name)) {
    window.console.error('Format "' + settings.name + '" is already registered.');
    return;
  }

  if (typeof settings.tagName !== 'string' || settings.tagName === '') {
    window.console.error('Format tag names must be a string.');
    return;
  }

  if ((typeof settings.className !== 'string' || settings.className === '') && settings.className !== null) {
    window.console.error('Format class names must be a string, or null to handle bare elements.');
    return;
  }

  if (!/^[_a-zA-Z]+[a-zA-Z0-9-]*$/.test(settings.className)) {
    window.console.error('A class name must begin with a letter, followed by any number of hyphens, letters, or numbers.');
    return;
  }

  if (settings.className === null) {
    var formatTypeForBareElement = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["select"])('core/rich-text').getFormatTypeForBareElement(settings.tagName);

    if (formatTypeForBareElement) {
      window.console.error("Format \"".concat(formatTypeForBareElement.name, "\" is already registered to handle bare tag name \"").concat(settings.tagName, "\"."));
      return;
    }
  } else {
    var formatTypeForClassName = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["select"])('core/rich-text').getFormatTypeForClassName(settings.className);

    if (formatTypeForClassName) {
      window.console.error("Format \"".concat(formatTypeForClassName.name, "\" is already registered to handle class name \"").concat(settings.className, "\"."));
      return;
    }
  }

  if (!('title' in settings) || settings.title === '') {
    window.console.error('The format "' + settings.name + '" must have a title.');
    return;
  }

  if ('keywords' in settings && settings.keywords.length > 3) {
    window.console.error('The format "' + settings.name + '" can have a maximum of 3 keywords.');
    return;
  }

  if (typeof settings.title !== 'string') {
    window.console.error('Format titles must be strings.');
    return;
  }

  Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["dispatch"])('core/rich-text').addFormatTypes(settings);
  return settings;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/remove-format.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/remove-format.js ***!
  \*************************************************************************/
/*! exports provided: removeFormat */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeFormat", function() { return removeFormat; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _normalise_formats__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./normalise-formats */ "./node_modules/@wordpress/rich-text/build-module/normalise-formats.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * Internal dependencies
 */


/**
 * Remove any format object from a Rich Text value by type from the given
 * `startIndex` to the given `endIndex`. Indices are retrieved from the
 * selection if none are provided.
 *
 * @param {Object} value        Value to modify.
 * @param {string} formatType   Format type to remove.
 * @param {number} [startIndex] Start index.
 * @param {number} [endIndex]   End index.
 *
 * @return {Object} A new value with the format applied.
 */

function removeFormat(value, formatType) {
  var startIndex = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : value.start;
  var endIndex = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : value.end;
  var formats = value.formats,
      activeFormats = value.activeFormats;
  var newFormats = formats.slice(); // If the selection is collapsed, expand start and end to the edges of the
  // format.

  if (startIndex === endIndex) {
    var format = Object(lodash__WEBPACK_IMPORTED_MODULE_1__["find"])(newFormats[startIndex], {
      type: formatType
    });

    if (format) {
      while (Object(lodash__WEBPACK_IMPORTED_MODULE_1__["find"])(newFormats[startIndex], format)) {
        filterFormats(newFormats, startIndex, formatType);
        startIndex--;
      }

      endIndex++;

      while (Object(lodash__WEBPACK_IMPORTED_MODULE_1__["find"])(newFormats[endIndex], format)) {
        filterFormats(newFormats, endIndex, formatType);
        endIndex++;
      }
    }
  } else {
    for (var i = startIndex; i < endIndex; i++) {
      if (newFormats[i]) {
        filterFormats(newFormats, i, formatType);
      }
    }
  }

  return Object(_normalise_formats__WEBPACK_IMPORTED_MODULE_2__["normaliseFormats"])(_objectSpread({}, value, {
    formats: newFormats,
    activeFormats: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["reject"])(activeFormats, {
      type: formatType
    })
  }));
}

function filterFormats(formats, index, formatType) {
  var newFormats = formats[index].filter(function (_ref) {
    var type = _ref.type;
    return type !== formatType;
  });

  if (newFormats.length) {
    formats[index] = newFormats;
  } else {
    delete formats[index];
  }
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/remove-line-separator.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/remove-line-separator.js ***!
  \*********************************************************************************/
/*! exports provided: removeLineSeparator */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeLineSeparator", function() { return removeLineSeparator; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");
/* harmony import */ var _is_collapsed__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./is-collapsed */ "./node_modules/@wordpress/rich-text/build-module/is-collapsed.js");
/* harmony import */ var _remove__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./remove */ "./node_modules/@wordpress/rich-text/build-module/remove.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */



/**
 * Removes a line separator character, if existing, from a Rich Text value at the current
 * indices. If no line separator exists on the indices it will return undefined.
 *
 * @param {Object} value Value to modify.
 * @param {boolean} backward indicates if are removing from the start index or the end index.
 *
 * @return {Object|undefined} A new value with the line separator removed. Or undefined if no line separator is found on the position.
 */

function removeLineSeparator(value) {
  var backward = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  var replacements = value.replacements,
      text = value.text,
      start = value.start,
      end = value.end;
  var collapsed = Object(_is_collapsed__WEBPACK_IMPORTED_MODULE_2__["isCollapsed"])(value);
  var index = start - 1;
  var removeStart = collapsed ? start - 1 : start;
  var removeEnd = end;

  if (!backward) {
    index = end;
    removeStart = start;
    removeEnd = collapsed ? end + 1 : end;
  }

  if (text[index] !== _special_characters__WEBPACK_IMPORTED_MODULE_1__["LINE_SEPARATOR"]) {
    return;
  }

  var newValue; // If the line separator that is about te be removed
  // contains wrappers, remove the wrappers first.

  if (collapsed && replacements[index] && replacements[index].length) {
    var newReplacements = replacements.slice();
    newReplacements[index] = replacements[index].slice(0, -1);
    newValue = _objectSpread({}, value, {
      replacements: newReplacements
    });
  } else {
    newValue = Object(_remove__WEBPACK_IMPORTED_MODULE_3__["remove"])(value, removeStart, removeEnd);
  }

  return newValue;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/remove.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/remove.js ***!
  \******************************************************************/
/*! exports provided: remove */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "remove", function() { return remove; });
/* harmony import */ var _insert__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./insert */ "./node_modules/@wordpress/rich-text/build-module/insert.js");
/* harmony import */ var _create__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./create */ "./node_modules/@wordpress/rich-text/build-module/create.js");
/**
 * Internal dependencies
 */


/**
 * Remove content from a Rich Text value between the given `startIndex` and
 * `endIndex`. Indices are retrieved from the selection if none are provided.
 *
 * @param {Object} value        Value to modify.
 * @param {number} [startIndex] Start index.
 * @param {number} [endIndex]   End index.
 *
 * @return {Object} A new value with the content removed.
 */

function remove(value, startIndex, endIndex) {
  return Object(_insert__WEBPACK_IMPORTED_MODULE_0__["insert"])(value, Object(_create__WEBPACK_IMPORTED_MODULE_1__["create"])(), startIndex, endIndex);
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/replace.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/replace.js ***!
  \*******************************************************************/
/*! exports provided: replace */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "replace", function() { return replace; });
/* harmony import */ var _babel_runtime_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/typeof */ "./node_modules/@babel/runtime/helpers/esm/typeof.js");
/* harmony import */ var _normalise_formats__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./normalise-formats */ "./node_modules/@wordpress/rich-text/build-module/normalise-formats.js");


/**
 * Internal dependencies
 */

/**
 * Search a Rich Text value and replace the match(es) with `replacement`. This
 * is similar to `String.prototype.replace`.
 *
 * @param {Object}         value        The value to modify.
 * @param {RegExp|string}  pattern      A RegExp object or literal. Can also be
 *                                      a string. It is treated as a verbatim
 *                                      string and is not interpreted as a
 *                                      regular expression. Only the first
 *                                      occurrence will be replaced.
 * @param {Function|string} replacement The match or matches are replaced with
 *                                      the specified or the value returned by
 *                                      the specified function.
 *
 * @return {Object} A new value with replacements applied.
 */

function replace(_ref, pattern, replacement) {
  var formats = _ref.formats,
      replacements = _ref.replacements,
      text = _ref.text,
      start = _ref.start,
      end = _ref.end;
  text = text.replace(pattern, function (match) {
    for (var _len = arguments.length, rest = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
      rest[_key - 1] = arguments[_key];
    }

    var offset = rest[rest.length - 2];
    var newText = replacement;
    var newFormats;
    var newReplacements;

    if (typeof newText === 'function') {
      newText = replacement.apply(void 0, [match].concat(rest));
    }

    if (Object(_babel_runtime_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_0__["default"])(newText) === 'object') {
      newFormats = newText.formats;
      newReplacements = newText.replacements;
      newText = newText.text;
    } else {
      newFormats = Array(newText.length);
      newReplacements = Array(newText.length);

      if (formats[offset]) {
        newFormats = newFormats.fill(formats[offset]);
      }
    }

    formats = formats.slice(0, offset).concat(newFormats, formats.slice(offset + match.length));
    replacements = replacements.slice(0, offset).concat(newReplacements, replacements.slice(offset + match.length));

    if (start) {
      start = end = offset + newText.length;
    }

    return newText;
  });
  return Object(_normalise_formats__WEBPACK_IMPORTED_MODULE_1__["normaliseFormats"])({
    formats: formats,
    replacements: replacements,
    text: text,
    start: start,
    end: end
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/slice.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/slice.js ***!
  \*****************************************************************/
/*! exports provided: slice */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "slice", function() { return slice; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Slice a Rich Text value from `startIndex` to `endIndex`. Indices are
 * retrieved from the selection if none are provided. This is similar to
 * `String.prototype.slice`.
 *
 * @param {Object} value        Value to modify.
 * @param {number} [startIndex] Start index.
 * @param {number} [endIndex]   End index.
 *
 * @return {Object} A new extracted value.
 */
function slice(value) {
  var startIndex = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : value.start;
  var endIndex = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : value.end;
  var formats = value.formats,
      replacements = value.replacements,
      text = value.text;

  if (startIndex === undefined || endIndex === undefined) {
    return _objectSpread({}, value);
  }

  return {
    formats: formats.slice(startIndex, endIndex),
    replacements: replacements.slice(startIndex, endIndex),
    text: text.slice(startIndex, endIndex)
  };
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/special-characters.js":
/*!******************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/special-characters.js ***!
  \******************************************************************************/
/*! exports provided: LINE_SEPARATOR, OBJECT_REPLACEMENT_CHARACTER, ZWNBSP */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LINE_SEPARATOR", function() { return LINE_SEPARATOR; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "OBJECT_REPLACEMENT_CHARACTER", function() { return OBJECT_REPLACEMENT_CHARACTER; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ZWNBSP", function() { return ZWNBSP; });
/**
 * Line separator character, used for multiline text.
 */
var LINE_SEPARATOR = "\u2028";
/**
 * Object replacement character, used as a placeholder for objects.
 */

var OBJECT_REPLACEMENT_CHARACTER = "\uFFFC";
/**
 * Zero width non-breaking space, used as padding in the editable DOM tree when
 * it is empty otherwise.
 */

var ZWNBSP = "\uFEFF";


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/split.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/split.js ***!
  \*****************************************************************/
/*! exports provided: split */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "split", function() { return split; });
/* harmony import */ var _replace__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./replace */ "./node_modules/@wordpress/rich-text/build-module/replace.js");
/**
 * Internal dependencies
 */

/**
 * Split a Rich Text value in two at the given `startIndex` and `endIndex`, or
 * split at the given separator. This is similar to `String.prototype.split`.
 * Indices are retrieved from the selection if none are provided.
 *
 * @param {Object}        value
 * @param {Object[]}      value.formats
 * @param {Object[]}      value.replacements
 * @param {string}        value.text
 * @param {number}        value.start
 * @param {number}        value.end
 * @param {number|string} [string] Start index, or string at which to split.
 *
 * @return {Array} An array of new values.
 */

function split(_ref, string) {
  var formats = _ref.formats,
      replacements = _ref.replacements,
      text = _ref.text,
      start = _ref.start,
      end = _ref.end;

  if (typeof string !== 'string') {
    return splitAtSelection.apply(void 0, arguments);
  }

  var nextStart = 0;
  return text.split(string).map(function (substring) {
    var startIndex = nextStart;
    var value = {
      formats: formats.slice(startIndex, startIndex + substring.length),
      replacements: replacements.slice(startIndex, startIndex + substring.length),
      text: substring
    };
    nextStart += string.length + substring.length;

    if (start !== undefined && end !== undefined) {
      if (start >= startIndex && start < nextStart) {
        value.start = start - startIndex;
      } else if (start < startIndex && end > startIndex) {
        value.start = 0;
      }

      if (end >= startIndex && end < nextStart) {
        value.end = end - startIndex;
      } else if (start < nextStart && end > nextStart) {
        value.end = substring.length;
      }
    }

    return value;
  });
}

function splitAtSelection(_ref2) {
  var formats = _ref2.formats,
      replacements = _ref2.replacements,
      text = _ref2.text,
      start = _ref2.start,
      end = _ref2.end;
  var startIndex = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : start;
  var endIndex = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : end;
  var before = {
    formats: formats.slice(0, startIndex),
    replacements: replacements.slice(0, startIndex),
    text: text.slice(0, startIndex)
  };
  var after = {
    formats: formats.slice(endIndex),
    replacements: replacements.slice(endIndex),
    text: text.slice(endIndex),
    start: 0,
    end: 0
  };
  return [// Ensure newlines are trimmed.
  Object(_replace__WEBPACK_IMPORTED_MODULE_0__["replace"])(before, /\u2028+$/, ''), Object(_replace__WEBPACK_IMPORTED_MODULE_0__["replace"])(after, /^\u2028+/, '')];
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/store/actions.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/store/actions.js ***!
  \*************************************************************************/
/*! exports provided: addFormatTypes, removeFormatTypes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addFormatTypes", function() { return addFormatTypes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeFormatTypes", function() { return removeFormatTypes; });
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/**
 * External dependencies
 */

/**
 * Returns an action object used in signalling that format types have been
 * added.
 *
 * @param {Array|Object} formatTypes Format types received.
 *
 * @return {Object} Action object.
 */

function addFormatTypes(formatTypes) {
  return {
    type: 'ADD_FORMAT_TYPES',
    formatTypes: Object(lodash__WEBPACK_IMPORTED_MODULE_0__["castArray"])(formatTypes)
  };
}
/**
 * Returns an action object used to remove a registered format type.
 *
 * @param {string|Array} names Format name.
 *
 * @return {Object} Action object.
 */

function removeFormatTypes(names) {
  return {
    type: 'REMOVE_FORMAT_TYPES',
    names: Object(lodash__WEBPACK_IMPORTED_MODULE_0__["castArray"])(names)
  };
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/store/index.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/store/index.js ***!
  \***********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _reducer__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./reducer */ "./node_modules/@wordpress/rich-text/build-module/store/reducer.js");
/* harmony import */ var _selectors__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./selectors */ "./node_modules/@wordpress/rich-text/build-module/store/selectors.js");
/* harmony import */ var _actions__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./actions */ "./node_modules/@wordpress/rich-text/build-module/store/actions.js");
/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */




Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["registerStore"])('core/rich-text', {
  reducer: _reducer__WEBPACK_IMPORTED_MODULE_1__["default"],
  selectors: _selectors__WEBPACK_IMPORTED_MODULE_2__,
  actions: _actions__WEBPACK_IMPORTED_MODULE_3__
});


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/store/reducer.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/store/reducer.js ***!
  \*************************************************************************/
/*! exports provided: formatTypes, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "formatTypes", function() { return formatTypes; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */


/**
 * Reducer managing the format types
 *
 * @param {Object} state  Current state.
 * @param {Object} action Dispatched action.
 *
 * @return {Object} Updated state.
 */

function formatTypes() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'ADD_FORMAT_TYPES':
      return _objectSpread({}, state, {}, Object(lodash__WEBPACK_IMPORTED_MODULE_1__["keyBy"])(action.formatTypes, 'name'));

    case 'REMOVE_FORMAT_TYPES':
      return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["omit"])(state, action.names);
  }

  return state;
}
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["combineReducers"])({
  formatTypes: formatTypes
}));


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/store/selectors.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/store/selectors.js ***!
  \***************************************************************************/
/*! exports provided: getFormatTypes, getFormatType, getFormatTypeForBareElement, getFormatTypeForClassName */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFormatTypes", function() { return getFormatTypes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFormatType", function() { return getFormatType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFormatTypeForBareElement", function() { return getFormatTypeForBareElement; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFormatTypeForClassName", function() { return getFormatTypeForClassName; });
/* harmony import */ var rememo__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! rememo */ "./node_modules/rememo/es/rememo.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/**
 * External dependencies
 */


/**
 * Returns all the available format types.
 *
 * @param {Object} state Data state.
 *
 * @return {Array} Format types.
 */

var getFormatTypes = Object(rememo__WEBPACK_IMPORTED_MODULE_0__["default"])(function (state) {
  return Object.values(state.formatTypes);
}, function (state) {
  return [state.formatTypes];
});
/**
 * Returns a format type by name.
 *
 * @param {Object} state Data state.
 * @param {string} name Format type name.
 *
 * @return {Object?} Format type.
 */

function getFormatType(state, name) {
  return state.formatTypes[name];
}
/**
 * Gets the format type, if any, that can handle a bare element (without a
 * data-format-type attribute), given the tag name of this element.
 *
 * @param {Object} state              Data state.
 * @param {string} bareElementTagName The tag name of the element to find a
 *                                    format type for.
 * @return {?Object} Format type.
 */

function getFormatTypeForBareElement(state, bareElementTagName) {
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["find"])(getFormatTypes(state), function (_ref) {
    var className = _ref.className,
        tagName = _ref.tagName;
    return className === null && bareElementTagName === tagName;
  });
}
/**
 * Gets the format type, if any, that can handle an element, given its classes.
 *
 * @param {Object} state            Data state.
 * @param {string} elementClassName The classes of the element to find a format
 *                                  type for.
 * @return {?Object} Format type.
 */

function getFormatTypeForClassName(state, elementClassName) {
  return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["find"])(getFormatTypes(state), function (_ref2) {
    var className = _ref2.className;

    if (className === null) {
      return false;
    }

    return " ".concat(elementClassName, " ").indexOf(" ".concat(className, " ")) >= 0;
  });
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/to-dom.js":
/*!******************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/to-dom.js ***!
  \******************************************************************/
/*! exports provided: toDom, apply, applyValue, applySelection */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toDom", function() { return toDom; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "apply", function() { return apply; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "applyValue", function() { return applyValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "applySelection", function() { return applySelection; });
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _to_tree__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./to-tree */ "./node_modules/@wordpress/rich-text/build-module/to-tree.js");
/* harmony import */ var _create_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./create-element */ "./node_modules/@wordpress/rich-text/build-module/create-element.js");



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */


/**
 * Browser dependencies
 */

var TEXT_NODE = window.Node.TEXT_NODE;
/**
 * Creates a path as an array of indices from the given root node to the given
 * node.
 *
 * @param {Node}        node     Node to find the path of.
 * @param {HTMLElement} rootNode Root node to find the path from.
 * @param {Array}       path     Initial path to build on.
 *
 * @return {Array} The path from the root node to the node.
 */

function createPathToNode(node, rootNode, path) {
  var parentNode = node.parentNode;
  var i = 0;

  while (node = node.previousSibling) {
    i++;
  }

  path = [i].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__["default"])(path));

  if (parentNode !== rootNode) {
    path = createPathToNode(parentNode, rootNode, path);
  }

  return path;
}
/**
 * Gets a node given a path (array of indices) from the given node.
 *
 * @param {HTMLElement} node Root node to find the wanted node in.
 * @param {Array}       path Path (indices) to the wanted node.
 *
 * @return {Object} Object with the found node and the remaining offset (if any).
 */


function getNodeByPath(node, path) {
  path = Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__["default"])(path);

  while (node && path.length > 1) {
    node = node.childNodes[path.shift()];
  }

  return {
    node: node,
    offset: path[0]
  };
}
/**
 * Returns a new instance of a DOM tree upon which RichText operations can be
 * applied.
 *
 * Note: The current implementation will return a shared reference, reset on
 * each call to `createEmpty`. Therefore, you should not hold a reference to
 * the value to operate upon asynchronously, as it may have unexpected results.
 *
 * @return {Object} RichText tree.
 */


var createEmpty = function createEmpty() {
  return Object(_create_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(document, '');
};

function append(element, child) {
  if (typeof child === 'string') {
    child = element.ownerDocument.createTextNode(child);
  }

  var _child = child,
      type = _child.type,
      attributes = _child.attributes;

  if (type) {
    child = element.ownerDocument.createElement(type);

    for (var key in attributes) {
      child.setAttribute(key, attributes[key]);
    }
  }

  return element.appendChild(child);
}

function appendText(node, text) {
  node.appendData(text);
}

function getLastChild(_ref) {
  var lastChild = _ref.lastChild;
  return lastChild;
}

function getParent(_ref2) {
  var parentNode = _ref2.parentNode;
  return parentNode;
}

function isText(_ref3) {
  var nodeType = _ref3.nodeType;
  return nodeType === TEXT_NODE;
}

function getText(_ref4) {
  var nodeValue = _ref4.nodeValue;
  return nodeValue;
}

function remove(node) {
  return node.parentNode.removeChild(node);
}

function toDom(_ref5) {
  var value = _ref5.value,
      multilineTag = _ref5.multilineTag,
      prepareEditableTree = _ref5.prepareEditableTree,
      _ref5$isEditableTree = _ref5.isEditableTree,
      isEditableTree = _ref5$isEditableTree === void 0 ? true : _ref5$isEditableTree,
      placeholder = _ref5.placeholder;
  var startPath = [];
  var endPath = [];

  if (prepareEditableTree) {
    value = _objectSpread({}, value, {
      formats: prepareEditableTree(value)
    });
  }

  var tree = Object(_to_tree__WEBPACK_IMPORTED_MODULE_2__["toTree"])({
    value: value,
    multilineTag: multilineTag,
    createEmpty: createEmpty,
    append: append,
    getLastChild: getLastChild,
    getParent: getParent,
    isText: isText,
    getText: getText,
    remove: remove,
    appendText: appendText,
    onStartIndex: function onStartIndex(body, pointer) {
      startPath = createPathToNode(pointer, body, [pointer.nodeValue.length]);
    },
    onEndIndex: function onEndIndex(body, pointer) {
      endPath = createPathToNode(pointer, body, [pointer.nodeValue.length]);
    },
    isEditableTree: isEditableTree,
    placeholder: placeholder
  });
  return {
    body: tree,
    selection: {
      startPath: startPath,
      endPath: endPath
    }
  };
}
/**
 * Create an `Element` tree from a Rich Text value and applies the difference to
 * the `Element` tree contained by `current`. If a `multilineTag` is provided,
 * text separated by two new lines will be wrapped in an `Element` of that type.
 *
 * @param {Object}      $1                        Named arguments.
 * @param {Object}      $1.value                  Value to apply.
 * @param {HTMLElement} $1.current                The live root node to apply the element tree to.
 * @param {string}      [$1.multilineTag]         Multiline tag.
 * @param {Array}       [$1.multilineWrapperTags] Tags where lines can be found if nesting is possible.
 */

function apply(_ref6) {
  var value = _ref6.value,
      current = _ref6.current,
      multilineTag = _ref6.multilineTag,
      prepareEditableTree = _ref6.prepareEditableTree,
      __unstableDomOnly = _ref6.__unstableDomOnly,
      placeholder = _ref6.placeholder;

  // Construct a new element tree in memory.
  var _toDom = toDom({
    value: value,
    multilineTag: multilineTag,
    prepareEditableTree: prepareEditableTree,
    placeholder: placeholder
  }),
      body = _toDom.body,
      selection = _toDom.selection;

  applyValue(body, current);

  if (value.start !== undefined && !__unstableDomOnly) {
    applySelection(selection, current);
  }
}
function applyValue(future, current) {
  var i = 0;
  var futureChild;

  while (futureChild = future.firstChild) {
    var currentChild = current.childNodes[i];

    if (!currentChild) {
      current.appendChild(futureChild);
    } else if (!currentChild.isEqualNode(futureChild)) {
      if (currentChild.nodeName !== futureChild.nodeName || currentChild.nodeType === TEXT_NODE && currentChild.data !== futureChild.data) {
        current.replaceChild(futureChild, currentChild);
      } else {
        var currentAttributes = currentChild.attributes;
        var futureAttributes = futureChild.attributes;

        if (currentAttributes) {
          var ii = currentAttributes.length; // Reverse loop because `removeAttribute` on `currentChild`
          // changes `currentAttributes`.

          while (ii--) {
            var name = currentAttributes[ii].name;

            if (!futureChild.getAttribute(name)) {
              currentChild.removeAttribute(name);
            }
          }
        }

        if (futureAttributes) {
          for (var _ii = 0; _ii < futureAttributes.length; _ii++) {
            var _futureAttributes$_ii = futureAttributes[_ii],
                _name = _futureAttributes$_ii.name,
                value = _futureAttributes$_ii.value;

            if (currentChild.getAttribute(_name) !== value) {
              currentChild.setAttribute(_name, value);
            }
          }
        }

        applyValue(futureChild, currentChild);
        future.removeChild(futureChild);
      }
    } else {
      future.removeChild(futureChild);
    }

    i++;
  }

  while (current.childNodes[i]) {
    current.removeChild(current.childNodes[i]);
  }
}
/**
 * Returns true if two ranges are equal, or false otherwise. Ranges are
 * considered equal if their start and end occur in the same container and
 * offset.
 *
 * @param {Range} a First range object to test.
 * @param {Range} b First range object to test.
 *
 * @return {boolean} Whether the two ranges are equal.
 */

function isRangeEqual(a, b) {
  return a.startContainer === b.startContainer && a.startOffset === b.startOffset && a.endContainer === b.endContainer && a.endOffset === b.endOffset;
}

function applySelection(_ref7, current) {
  var startPath = _ref7.startPath,
      endPath = _ref7.endPath;

  var _getNodeByPath = getNodeByPath(current, startPath),
      startContainer = _getNodeByPath.node,
      startOffset = _getNodeByPath.offset;

  var _getNodeByPath2 = getNodeByPath(current, endPath),
      endContainer = _getNodeByPath2.node,
      endOffset = _getNodeByPath2.offset;

  var selection = window.getSelection();
  var ownerDocument = current.ownerDocument;
  var range = ownerDocument.createRange();
  range.setStart(startContainer, startOffset);
  range.setEnd(endContainer, endOffset);
  var activeElement = ownerDocument.activeElement;

  if (selection.rangeCount > 0) {
    // If the to be added range and the live range are the same, there's no
    // need to remove the live range and add the equivalent range.
    if (isRangeEqual(range, selection.getRangeAt(0))) {
      return;
    }

    selection.removeAllRanges();
  }

  selection.addRange(range); // This function is not intended to cause a shift in focus. Since the above
  // selection manipulations may shift focus, ensure that focus is restored to
  // its previous state.

  if (activeElement !== document.activeElement) {
    // The `instanceof` checks protect against edge cases where the focused
    // element is not of the interface HTMLElement (does not have a `focus`
    // or `blur` property).
    //
    // See: https://github.com/Microsoft/TypeScript/issues/5901#issuecomment-431649653
    if (activeElement instanceof window.HTMLElement) {
      activeElement.focus();
    }
  }
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/to-html-string.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/to-html-string.js ***!
  \**************************************************************************/
/*! exports provided: toHTMLString */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toHTMLString", function() { return toHTMLString; });
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/escape-html */ "@wordpress/escape-html");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _to_tree__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./to-tree */ "./node_modules/@wordpress/rich-text/build-module/to-tree.js");
/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */


/**
 * Create an HTML string from a Rich Text value. If a `multilineTag` is
 * provided, text separated by a line separator will be wrapped in it.
 *
 * @param {Object}   $1                      Named argements.
 * @param {Object}   $1.value                Rich text value.
 * @param {string}   [$1.multilineTag]       Multiline tag.
 * @param {?boolean} [$1.preserveWhiteSpace] Whether or not to use newline
 *                                           characters for line breaks.
 *
 * @return {string} HTML string.
 */

function toHTMLString(_ref) {
  var value = _ref.value,
      multilineTag = _ref.multilineTag,
      preserveWhiteSpace = _ref.preserveWhiteSpace;
  var tree = Object(_to_tree__WEBPACK_IMPORTED_MODULE_1__["toTree"])({
    value: value,
    multilineTag: multilineTag,
    preserveWhiteSpace: preserveWhiteSpace,
    createEmpty: createEmpty,
    append: append,
    getLastChild: getLastChild,
    getParent: getParent,
    isText: isText,
    getText: getText,
    remove: remove,
    appendText: appendText
  });
  return createChildrenHTML(tree.children);
}

function createEmpty() {
  return {};
}

function getLastChild(_ref2) {
  var children = _ref2.children;
  return children && children[children.length - 1];
}

function append(parent, object) {
  if (typeof object === 'string') {
    object = {
      text: object
    };
  }

  object.parent = parent;
  parent.children = parent.children || [];
  parent.children.push(object);
  return object;
}

function appendText(object, text) {
  object.text += text;
}

function getParent(_ref3) {
  var parent = _ref3.parent;
  return parent;
}

function isText(_ref4) {
  var text = _ref4.text;
  return typeof text === 'string';
}

function getText(_ref5) {
  var text = _ref5.text;
  return text;
}

function remove(object) {
  var index = object.parent.children.indexOf(object);

  if (index !== -1) {
    object.parent.children.splice(index, 1);
  }

  return object;
}

function createElementHTML(_ref6) {
  var type = _ref6.type,
      attributes = _ref6.attributes,
      object = _ref6.object,
      children = _ref6.children;
  var attributeString = '';

  for (var key in attributes) {
    if (!Object(_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0__["isValidAttributeName"])(key)) {
      continue;
    }

    attributeString += " ".concat(key, "=\"").concat(Object(_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0__["escapeAttribute"])(attributes[key]), "\"");
  }

  if (object) {
    return "<".concat(type).concat(attributeString, ">");
  }

  return "<".concat(type).concat(attributeString, ">").concat(createChildrenHTML(children), "</").concat(type, ">");
}

function createChildrenHTML() {
  var children = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  return children.map(function (child) {
    return child.text === undefined ? createElementHTML(child) : Object(_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0__["escapeEditableHTML"])(child.text);
  }).join('');
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/to-tree.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/to-tree.js ***!
  \*******************************************************************/
/*! exports provided: toTree */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toTree", function() { return toTree; });
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var _get_active_formats__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./get-active-formats */ "./node_modules/@wordpress/rich-text/build-module/get-active-formats.js");
/* harmony import */ var _get_format_type__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./get-format-type */ "./node_modules/@wordpress/rich-text/build-module/get-format-type.js");
/* harmony import */ var _special_characters__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./special-characters */ "./node_modules/@wordpress/rich-text/build-module/special-characters.js");



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_1__["default"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * Internal dependencies
 */



/**
 * Converts a format object to information that can be used to create an element
 * from (type, attributes and object).
 *
 * @param  {Object}  $1                        Named parameters.
 * @param  {string}  $1.type                   The format type.
 * @param  {Object}  $1.attributes             The format attributes.
 * @param  {Object}  $1.unregisteredAttributes The unregistered format
 *                                             attributes.
 * @param  {boolean} $1.object                 Wether or not it is an object
 *                                             format.
 * @param  {boolean} $1.boundaryClass          Wether or not to apply a boundary
 *                                             class.
 * @return {Object}                            Information to be used for
 *                                             element creation.
 */

function fromFormat(_ref) {
  var type = _ref.type,
      attributes = _ref.attributes,
      unregisteredAttributes = _ref.unregisteredAttributes,
      object = _ref.object,
      boundaryClass = _ref.boundaryClass;
  var formatType = Object(_get_format_type__WEBPACK_IMPORTED_MODULE_3__["getFormatType"])(type);
  var elementAttributes = {};

  if (boundaryClass) {
    elementAttributes['data-rich-text-format-boundary'] = 'true';
  }

  if (!formatType) {
    if (attributes) {
      elementAttributes = _objectSpread({}, attributes, {}, elementAttributes);
    }

    return {
      type: type,
      attributes: elementAttributes,
      object: object
    };
  }

  elementAttributes = _objectSpread({}, unregisteredAttributes, {}, elementAttributes);

  for (var name in attributes) {
    var key = formatType.attributes ? formatType.attributes[name] : false;

    if (key) {
      elementAttributes[key] = attributes[name];
    } else {
      elementAttributes[name] = attributes[name];
    }
  }

  if (formatType.className) {
    if (elementAttributes.class) {
      elementAttributes.class = "".concat(formatType.className, " ").concat(elementAttributes.class);
    } else {
      elementAttributes.class = formatType.className;
    }
  }

  return {
    type: formatType.tagName,
    object: formatType.object,
    attributes: elementAttributes
  };
}
/**
 * Checks if both arrays of formats up until a certain index are equal.
 *
 * @param {Array}  a     Array of formats to compare.
 * @param {Array}  b     Array of formats to compare.
 * @param {number} index Index to check until.
 */


function isEqualUntil(a, b, index) {
  do {
    if (a[index] !== b[index]) {
      return false;
    }
  } while (index--);

  return true;
}

function toTree(_ref2) {
  var value = _ref2.value,
      multilineTag = _ref2.multilineTag,
      preserveWhiteSpace = _ref2.preserveWhiteSpace,
      createEmpty = _ref2.createEmpty,
      append = _ref2.append,
      getLastChild = _ref2.getLastChild,
      getParent = _ref2.getParent,
      isText = _ref2.isText,
      getText = _ref2.getText,
      remove = _ref2.remove,
      appendText = _ref2.appendText,
      onStartIndex = _ref2.onStartIndex,
      onEndIndex = _ref2.onEndIndex,
      isEditableTree = _ref2.isEditableTree,
      placeholder = _ref2.placeholder;
  var formats = value.formats,
      replacements = value.replacements,
      text = value.text,
      start = value.start,
      end = value.end;
  var formatsLength = formats.length + 1;
  var tree = createEmpty();
  var multilineFormat = {
    type: multilineTag
  };
  var activeFormats = Object(_get_active_formats__WEBPACK_IMPORTED_MODULE_2__["getActiveFormats"])(value);
  var deepestActiveFormat = activeFormats[activeFormats.length - 1];
  var lastSeparatorFormats;
  var lastCharacterFormats;
  var lastCharacter; // If we're building a multiline tree, start off with a multiline element.

  if (multilineTag) {
    append(append(tree, {
      type: multilineTag
    }), '');
    lastCharacterFormats = lastSeparatorFormats = [multilineFormat];
  } else {
    append(tree, '');
  }

  var _loop = function _loop(i) {
    var character = text.charAt(i);
    var shouldInsertPadding = isEditableTree && ( // Pad the line if the line is empty.
    !lastCharacter || lastCharacter === _special_characters__WEBPACK_IMPORTED_MODULE_4__["LINE_SEPARATOR"] || // Pad the line if the previous character is a line break, otherwise
    // the line break won't be visible.
    lastCharacter === '\n');
    var characterFormats = formats[i]; // Set multiline tags in queue for building the tree.

    if (multilineTag) {
      if (character === _special_characters__WEBPACK_IMPORTED_MODULE_4__["LINE_SEPARATOR"]) {
        characterFormats = lastSeparatorFormats = (replacements[i] || []).reduce(function (accumulator, format) {
          accumulator.push(format, multilineFormat);
          return accumulator;
        }, [multilineFormat]);
      } else {
        characterFormats = [].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(lastSeparatorFormats), Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__["default"])(characterFormats || []));
      }
    }

    var pointer = getLastChild(tree);

    if (shouldInsertPadding && character === _special_characters__WEBPACK_IMPORTED_MODULE_4__["LINE_SEPARATOR"]) {
      var node = pointer;

      while (!isText(node)) {
        node = getLastChild(node);
      }

      append(getParent(node), _special_characters__WEBPACK_IMPORTED_MODULE_4__["ZWNBSP"]);
    } // Set selection for the start of line.


    if (lastCharacter === _special_characters__WEBPACK_IMPORTED_MODULE_4__["LINE_SEPARATOR"]) {
      var _node = pointer;

      while (!isText(_node)) {
        _node = getLastChild(_node);
      }

      if (onStartIndex && start === i) {
        onStartIndex(tree, _node);
      }

      if (onEndIndex && end === i) {
        onEndIndex(tree, _node);
      }
    }

    if (characterFormats) {
      characterFormats.forEach(function (format, formatIndex) {
        if (pointer && lastCharacterFormats && // Reuse the last element if all formats remain the same.
        isEqualUntil(characterFormats, lastCharacterFormats, formatIndex) && ( // Do not reuse the last element if the character is a
        // line separator.
        character !== _special_characters__WEBPACK_IMPORTED_MODULE_4__["LINE_SEPARATOR"] || characterFormats.length - 1 !== formatIndex)) {
          pointer = getLastChild(pointer);
          return;
        }

        var type = format.type,
            attributes = format.attributes,
            unregisteredAttributes = format.unregisteredAttributes;
        var boundaryClass = isEditableTree && character !== _special_characters__WEBPACK_IMPORTED_MODULE_4__["LINE_SEPARATOR"] && format === deepestActiveFormat;
        var parent = getParent(pointer);
        var newNode = append(parent, fromFormat({
          type: type,
          attributes: attributes,
          unregisteredAttributes: unregisteredAttributes,
          boundaryClass: boundaryClass
        }));

        if (isText(pointer) && getText(pointer).length === 0) {
          remove(pointer);
        }

        pointer = append(newNode, '');
      });
    } // No need for further processing if the character is a line separator.


    if (character === _special_characters__WEBPACK_IMPORTED_MODULE_4__["LINE_SEPARATOR"]) {
      lastCharacterFormats = characterFormats;
      lastCharacter = character;
      return "continue";
    } // If there is selection at 0, handle it before characters are inserted.


    if (i === 0) {
      if (onStartIndex && start === 0) {
        onStartIndex(tree, pointer);
      }

      if (onEndIndex && end === 0) {
        onEndIndex(tree, pointer);
      }
    }

    if (character === _special_characters__WEBPACK_IMPORTED_MODULE_4__["OBJECT_REPLACEMENT_CHARACTER"]) {
      pointer = append(getParent(pointer), fromFormat(_objectSpread({}, replacements[i], {
        object: true
      }))); // Ensure pointer is text node.

      pointer = append(getParent(pointer), '');
    } else if (!preserveWhiteSpace && character === '\n') {
      pointer = append(getParent(pointer), {
        type: 'br',
        attributes: isEditableTree ? {
          'data-rich-text-line-break': 'true'
        } : undefined,
        object: true
      }); // Ensure pointer is text node.

      pointer = append(getParent(pointer), '');
    } else if (!isText(pointer)) {
      pointer = append(getParent(pointer), character);
    } else {
      appendText(pointer, character);
    }

    if (onStartIndex && start === i + 1) {
      onStartIndex(tree, pointer);
    }

    if (onEndIndex && end === i + 1) {
      onEndIndex(tree, pointer);
    }

    if (shouldInsertPadding && i === text.length) {
      append(getParent(pointer), _special_characters__WEBPACK_IMPORTED_MODULE_4__["ZWNBSP"]);

      if (placeholder && text.length === 0) {
        append(getParent(pointer), {
          type: 'span',
          attributes: {
            'data-rich-text-placeholder': placeholder,
            // Necessary to prevent the placeholder from catching
            // selection. The placeholder is also not editable after
            // all.
            contenteditable: 'false'
          }
        });
      }
    }

    lastCharacterFormats = characterFormats;
    lastCharacter = character;
  };

  for (var i = 0; i < formatsLength; i++) {
    var _ret = _loop(i);

    if (_ret === "continue") continue;
  }

  return tree;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/toggle-format.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/toggle-format.js ***!
  \*************************************************************************/
/*! exports provided: toggleFormat */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toggleFormat", function() { return toggleFormat; });
/* harmony import */ var _get_active_format__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-active-format */ "./node_modules/@wordpress/rich-text/build-module/get-active-format.js");
/* harmony import */ var _remove_format__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./remove-format */ "./node_modules/@wordpress/rich-text/build-module/remove-format.js");
/* harmony import */ var _apply_format__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./apply-format */ "./node_modules/@wordpress/rich-text/build-module/apply-format.js");
/**
 * Internal dependencies
 */



/**
 * Toggles a format object to a Rich Text value at the current selection.
 *
 * @param {Object} value  Value to modify.
 * @param {Object} format Format to apply or remove.
 *
 * @return {Object} A new value with the format applied or removed.
 */

function toggleFormat(value, format) {
  if (Object(_get_active_format__WEBPACK_IMPORTED_MODULE_0__["getActiveFormat"])(value, format.type)) {
    return Object(_remove_format__WEBPACK_IMPORTED_MODULE_1__["removeFormat"])(value, format.type);
  }

  return Object(_apply_format__WEBPACK_IMPORTED_MODULE_2__["applyFormat"])(value, format);
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/unregister-format-type.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/unregister-format-type.js ***!
  \**********************************************************************************/
/*! exports provided: unregisterFormatType */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "unregisterFormatType", function() { return unregisterFormatType; });
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */

/** @typedef {import('./register-format-type').WPFormat} WPFormat */

/**
 * Unregisters a format.
 *
 * @param {string} name Format name.
 *
 * @return {WPFormat|undefined} The previous format value, if it has been successfully
 *                              unregistered; otherwise `undefined`.
 */

function unregisterFormatType(name) {
  var oldFormat = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["select"])('core/rich-text').getFormatType(name);

  if (!oldFormat) {
    window.console.error("Format ".concat(name, " is not registered."));
    return;
  }

  Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["dispatch"])('core/rich-text').removeFormatTypes(name);
  return oldFormat;
}


/***/ }),

/***/ "./node_modules/@wordpress/rich-text/build-module/update-formats.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@wordpress/rich-text/build-module/update-formats.js ***!
  \**************************************************************************/
/*! exports provided: updateFormats */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "updateFormats", function() { return updateFormats; });
/* harmony import */ var _is_format_equal__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./is-format-equal */ "./node_modules/@wordpress/rich-text/build-module/is-format-equal.js");
/**
 * Internal dependencies
 */

/**
 * Efficiently updates all the formats from `start` (including) until `end`
 * (excluding) with the active formats. Mutates `value`.
 *
 * @param  {Object} $1         Named paramentes.
 * @param  {Object} $1.value   Value te update.
 * @param  {number} $1.start   Index to update from.
 * @param  {number} $1.end     Index to update until.
 * @param  {Array}  $1.formats Replacement formats.
 *
 * @return {Object} Mutated value.
 */

function updateFormats(_ref) {
  var value = _ref.value,
      start = _ref.start,
      end = _ref.end,
      formats = _ref.formats;
  var formatsBefore = value.formats[start - 1] || [];
  var formatsAfter = value.formats[end] || []; // First, fix the references. If any format right before or after are
  // equal, the replacement format should use the same reference.

  value.activeFormats = formats.map(function (format, index) {
    if (formatsBefore[index]) {
      if (Object(_is_format_equal__WEBPACK_IMPORTED_MODULE_0__["isFormatEqual"])(format, formatsBefore[index])) {
        return formatsBefore[index];
      }
    } else if (formatsAfter[index]) {
      if (Object(_is_format_equal__WEBPACK_IMPORTED_MODULE_0__["isFormatEqual"])(format, formatsAfter[index])) {
        return formatsAfter[index];
      }
    }

    return format;
  });

  while (--end >= start) {
    if (value.activeFormats.length > 0) {
      value.formats[end] = value.activeFormats;
    } else {
      delete value.formats[end];
    }
  }

  return value;
}


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

/***/ "@wordpress/compose":
/*!******************************************!*\
  !*** external {"this":["wp","compose"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["compose"]; }());

/***/ }),

/***/ "@wordpress/data":
/*!***************************************!*\
  !*** external {"this":["wp","data"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/deprecated":
/*!*********************************************!*\
  !*** external {"this":["wp","deprecated"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["deprecated"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/escape-html":
/*!*********************************************!*\
  !*** external {"this":["wp","escapeHtml"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["escapeHtml"]; }());

/***/ }),

/***/ "@wordpress/is-shallow-equal":
/*!*************************************************!*\
  !*** external {"this":["wp","isShallowEqual"]} ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["isShallowEqual"]; }());

/***/ }),

/***/ "@wordpress/keycodes":
/*!*******************************************!*\
  !*** external {"this":["wp","keycodes"]} ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["keycodes"]; }());

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
//# sourceMappingURL=rich-text.js.map