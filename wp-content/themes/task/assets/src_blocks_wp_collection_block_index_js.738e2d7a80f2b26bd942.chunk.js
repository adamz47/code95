"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunkwebofai_theme"] = self["webpackChunkwebofai_theme"] || []).push([["src_blocks_wp_collection_block_index_js"],{

/***/ "./src/blocks/wp_collection_block/index.js":
/*!*************************************************!*\
  !*** ./src/blocks/wp_collection_block/index.js ***!
  \*************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scripts_functions_imageLazyLoading__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../scripts/functions/imageLazyLoading */ \"./src/scripts/functions/imageLazyLoading.js\");\n/* harmony import */ var _scripts_general_animations__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../scripts/general/animations */ \"./src/scripts/general/animations/index.js\");\n/* harmony import */ var _scripts_general_accordion__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../scripts/general/accordion */ \"./src/scripts/general/accordion.js\");\n\n\n\n\n/**\n *\n * @param block {HTMLElement}\n * @returns {Promise<void>}\n */\nconst wpCollectionBlock = async block => {\n  for (let i = -1; i < 0; i++) {\n    console.log(i);\n  }\n  (0,_scripts_general_accordion__WEBPACK_IMPORTED_MODULE_2__.accordion)(block.querySelectorAll('.accordion-wrapper'));\n  (0,_scripts_general_animations__WEBPACK_IMPORTED_MODULE_1__.animations)(block);\n  (0,_scripts_functions_imageLazyLoading__WEBPACK_IMPORTED_MODULE_0__.imageLazyLoading)(block);\n};\n/* harmony default export */ __webpack_exports__[\"default\"] = (wpCollectionBlock);\n\n//# sourceURL=webpack://webofai_theme/./src/blocks/wp_collection_block/index.js?");

/***/ }),

/***/ "./src/scripts/general/accordion.js":
/*!******************************************!*\
  !*** ./src/scripts/general/accordion.js ***!
  \******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   accordion: function() { return /* binding */ accordion; },\n/* harmony export */   singleAccordion: function() { return /* binding */ singleAccordion; }\n/* harmony export */ });\n/* harmony import */ var gsap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! gsap */ \"./node_modules/gsap/index.js\");\n\nfunction accordion(accordions) {\n  if (accordions.length === 0) return;\n  accordions.forEach(accordion => {\n    const accordionHead = accordion.querySelector('.accordion-head');\n    const accordionBody = accordion.querySelector('.accordion-body');\n    accordionHead?.addEventListener('click', e => {\n      if (!accordionBody) {\n        return;\n      }\n      const isOpened = accordion?.classList.toggle('accordion-active');\n      if (!isOpened) {\n        gsap__WEBPACK_IMPORTED_MODULE_0__[\"default\"].to(accordionBody, {\n          height: 0\n        });\n      } else {\n        gsap__WEBPACK_IMPORTED_MODULE_0__[\"default\"].to(Array.from(accordions).map(otherAccordion => {\n          const otherAccordionBody = otherAccordion.querySelector('.accordion-body');\n          if (otherAccordionBody && accordion !== otherAccordion) {\n            otherAccordion?.classList.remove('accordion-active');\n            gsap__WEBPACK_IMPORTED_MODULE_0__[\"default\"].set(otherAccordion, {\n              zIndex: 1\n            });\n          }\n          return otherAccordionBody;\n        }), {\n          height: 0\n        });\n        gsap__WEBPACK_IMPORTED_MODULE_0__[\"default\"].set(accordion, {\n          zIndex: 2\n        });\n        gsap__WEBPACK_IMPORTED_MODULE_0__[\"default\"].to(accordionBody, {\n          height: 'auto'\n        });\n      }\n    });\n  });\n}\nfunction singleAccordion(accordionHead, accordionBody) {\n  if (!accordionHead && !accordionBody) return;\n  const accordion = accordionHead.parentNode;\n  accordionHead?.addEventListener('click', e => {\n    const isOpened = accordion?.classList.toggle('accordion-active');\n    if (!isOpened) {\n      gsap__WEBPACK_IMPORTED_MODULE_0__[\"default\"].to(accordionBody, {\n        height: 0\n      });\n    } else {\n      gsap__WEBPACK_IMPORTED_MODULE_0__[\"default\"].to(accordionBody, {\n        height: 'auto'\n      });\n    }\n  });\n}\n\n//# sourceURL=webpack://webofai_theme/./src/scripts/general/accordion.js?");

/***/ })

}]);