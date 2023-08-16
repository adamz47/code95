"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunkwebofai_theme"] = self["webpackChunkwebofai_theme"] || []).push([["src_blocks_egypt_news_block_index_js"],{

/***/ "./src/blocks/egypt_news_block/index.js":
/*!**********************************************!*\
  !*** ./src/blocks/egypt_news_block/index.js ***!
  \**********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.scss */ \"./src/blocks/egypt_news_block/style.scss\");\n/* harmony import */ var _scripts_functions_imageLazyLoading__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../scripts/functions/imageLazyLoading */ \"./src/scripts/functions/imageLazyLoading.js\");\n/* harmony import */ var _scripts_general_animations__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../scripts/general/animations */ \"./src/scripts/general/animations/index.js\");\n/* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! swiper */ \"./node_modules/swiper/swiper.esm.js\");\n\n\n\n\n\n/**\n * @author HAMED47\n * @param block {HTMLElement}\n * @returns {Promise<void>}\n */\nswiper__WEBPACK_IMPORTED_MODULE_3__[\"default\"].use([swiper__WEBPACK_IMPORTED_MODULE_3__.Navigation, swiper__WEBPACK_IMPORTED_MODULE_3__.Autoplay]);\nconst egyptNewsBlock = async block => {\n  new swiper__WEBPACK_IMPORTED_MODULE_3__[\"default\"](block.querySelector(\".mySwiper\"), {\n    spaceBetween: 100,\n    slidesPerView: 'auto',\n    breakpoints: {\n      600: {\n        slidesPerView: 2,\n        spaceBetween: 18\n      },\n      991: {\n        slidesPerView: 2,\n        spaceBetween: 5,\n        slidesOffsetBefore: 0\n      }\n    },\n    loop: true,\n    autoplay: {\n      delay: 5000,\n      disableOnInteraction: true // Continue autoplay even after user interactions (like swipes)\n    }\n  });\n\n  (0,_scripts_general_animations__WEBPACK_IMPORTED_MODULE_2__.animations)(block);\n  (0,_scripts_functions_imageLazyLoading__WEBPACK_IMPORTED_MODULE_1__.imageLazyLoading)(block);\n};\n/* harmony default export */ __webpack_exports__[\"default\"] = (egyptNewsBlock);\n\n//# sourceURL=webpack://webofai_theme/./src/blocks/egypt_news_block/index.js?");

/***/ }),

/***/ "./src/blocks/egypt_news_block/style.scss":
/*!************************************************!*\
  !*** ./src/blocks/egypt_news_block/style.scss ***!
  \************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://webofai_theme/./src/blocks/egypt_news_block/style.scss?");

/***/ })

}]);