this["wp"] = this["wp"] || {}; this["wp"]["a11y"] =
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
/******/ 	return __webpack_require__(__webpack_require__.s = "./node_modules/@wordpress/a11y/build-module/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@wordpress/a11y/build-module/addContainer.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/a11y/build-module/addContainer.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * Build the live regions markup.
 *
 * @param {string} ariaLive Optional. Value for the 'aria-live' attribute, default 'polite'.
 *
 * @return {HTMLDivElement} The ARIA live region HTML element.
 */
var addContainer = function addContainer(ariaLive) {
  ariaLive = ariaLive || 'polite';
  var container = document.createElement('div');
  container.id = 'a11y-speak-' + ariaLive;
  container.className = 'a11y-speak-region';
  container.setAttribute('style', 'position: absolute;' + 'margin: -1px;' + 'padding: 0;' + 'height: 1px;' + 'width: 1px;' + 'overflow: hidden;' + 'clip: rect(1px, 1px, 1px, 1px);' + '-webkit-clip-path: inset(50%);' + 'clip-path: inset(50%);' + 'border: 0;' + 'word-wrap: normal !important;');
  container.setAttribute('aria-live', ariaLive);
  container.setAttribute('aria-relevant', 'additions text');
  container.setAttribute('aria-atomic', 'true');
  var body = document.querySelector('body');

  if (body) {
    body.appendChild(container);
  }

  return container;
};

/* harmony default export */ __webpack_exports__["default"] = (addContainer);


/***/ }),

/***/ "./node_modules/@wordpress/a11y/build-module/clear.js":
/*!************************************************************!*\
  !*** ./node_modules/@wordpress/a11y/build-module/clear.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * Clear the a11y-speak-region elements.
 */
var clear = function clear() {
  var regions = document.querySelectorAll('.a11y-speak-region');

  for (var i = 0; i < regions.length; i++) {
    regions[i].textContent = '';
  }
};

/* harmony default export */ __webpack_exports__["default"] = (clear);


/***/ }),

/***/ "./node_modules/@wordpress/a11y/build-module/filterMessage.js":
/*!********************************************************************!*\
  !*** ./node_modules/@wordpress/a11y/build-module/filterMessage.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var previousMessage = '';
/**
 * Filter the message to be announced to the screenreader.
 *
 * @param {string} message The message to be announced.
 *
 * @return {string} The filtered message.
 */

var filterMessage = function filterMessage(message) {
  /*
   * Strip HTML tags (if any) from the message string. Ideally, messages should
   * be simple strings, carefully crafted for specific use with A11ySpeak.
   * When re-using already existing strings this will ensure simple HTML to be
   * stripped out and replaced with a space. Browsers will collapse multiple
   * spaces natively.
   */
  message = message.replace(/<[^<>]+>/g, ' ');

  if (previousMessage === message) {
    message += "\xA0";
  }

  previousMessage = message;
  return message;
};

/* harmony default export */ __webpack_exports__["default"] = (filterMessage);


/***/ }),

/***/ "./node_modules/@wordpress/a11y/build-module/index.js":
/*!************************************************************!*\
  !*** ./node_modules/@wordpress/a11y/build-module/index.js ***!
  \************************************************************/
/*! exports provided: setup, speak */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setup", function() { return setup; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "speak", function() { return speak; });
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/dom-ready */ "@wordpress/dom-ready");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _addContainer__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./addContainer */ "./node_modules/@wordpress/a11y/build-module/addContainer.js");
/* harmony import */ var _clear__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./clear */ "./node_modules/@wordpress/a11y/build-module/clear.js");
/* harmony import */ var _filterMessage__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./filterMessage */ "./node_modules/@wordpress/a11y/build-module/filterMessage.js");
/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */




/**
 * Create the live regions.
 */

var setup = function setup() {
  var containerPolite = document.getElementById('a11y-speak-polite');
  var containerAssertive = document.getElementById('a11y-speak-assertive');

  if (containerPolite === null) {
    Object(_addContainer__WEBPACK_IMPORTED_MODULE_1__["default"])('polite');
  }

  if (containerAssertive === null) {
    Object(_addContainer__WEBPACK_IMPORTED_MODULE_1__["default"])('assertive');
  }
};
/**
 * Run setup on domReady.
 */

_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0___default()(setup);
/**
 * Allows you to easily announce dynamic interface updates to screen readers using ARIA live regions.
 * This module is inspired by the `speak` function in wp-a11y.js
 *
 * @param {string} message  The message to be announced by Assistive Technologies.
 * @param {string} ariaLive Optional. The politeness level for aria-live. Possible values:
 *                          polite or assertive. Default polite.
 *
 * @example
 * ```js
 * import { speak } from '@wordpress/a11y';
 *
 * // For polite messages that shouldn't interrupt what screen readers are currently announcing.
 * speak( 'The message you want to send to the ARIA live region' );
 *
 * // For assertive messages that should interrupt what screen readers are currently announcing.
 * speak( 'The message you want to send to the ARIA live region', 'assertive' );
 * ```
 */

var speak = function speak(message, ariaLive) {
  // Clear previous messages to allow repeated strings being read out.
  Object(_clear__WEBPACK_IMPORTED_MODULE_2__["default"])();
  message = Object(_filterMessage__WEBPACK_IMPORTED_MODULE_3__["default"])(message);
  var containerPolite = document.getElementById('a11y-speak-polite');
  var containerAssertive = document.getElementById('a11y-speak-assertive');

  if (containerAssertive && 'assertive' === ariaLive) {
    containerAssertive.textContent = message;
  } else if (containerPolite) {
    containerPolite.textContent = message;
  }
};


/***/ }),

/***/ "@wordpress/dom-ready":
/*!*******************************************!*\
  !*** external {"this":["wp","domReady"]} ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["domReady"]; }());

/***/ })

/******/ });
//# sourceMappingURL=a11y.js.map