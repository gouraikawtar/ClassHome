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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/homework.js":
/*!**********************************!*\
  !*** ./resources/js/homework.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function editHomework() {
  var class_id = document.getElementById("class_id").value;
  var tr = this.parentElement.parentElement;
  var homework_id = tr.children[0].children[0].value;
  var description = tr.children[0].children[1].value;
  var title = tr.children[1].textContent;
  var deadline = tr.children[3].textContent;
  var expiration = tr.children[4].textContent;
  document.getElementById("new_title").value = title;
  document.getElementById("new_desc").value = description;
  document.getElementById("new_deadline").value = deadline;
  document.getElementById("new_exp_at").value = expiration; //Setting up the action for the edit form 

  document.getElementById("edit_homework_form").action = "/myclasses/" + class_id + "/homeworks/" + homework_id;
}
/*function viewHomework() {
    var tr = this.parentElement.parentElement;
    var description = tr.children[0].children[1].value;
    var title = tr.children[1].textContent;
    var creatDate = tr.children[2].textContent;
    var deadline = tr.children[3].textContent;
    var expiration = tr.children[4].textContent;
    var status = tr.children[5].textContent;

    document.getElementById("titleView").textContent = title;
    document.getElementById("creatDateView").textContent = creatDate;
    document.getElementById("deadlineView").textContent = deadline;
    document.getElementById("expView").textContent = expiration;
    document.getElementById("statusView").textContent = status;
    if(tr.children[0].children[2].value){
        var files = tr.children[0].children[2].value;
        document.getElementById("joinedFiles").textContent = files;
    }
    
    if(description==""){
        document.getElementById("descrView").textContent = "None";    
    }else{
        document.getElementById("descrView").textContent = description;
    }
}*/


function deleteHomework() {
  var class_id = document.getElementById("class_id").value;
  var tr = this.parentElement.parentElement;
  var homework_id = tr.children[0].children[0].value; //Setting up the action for the delete form 

  document.getElementById("delete_homework_form").action = "/myclasses/" + class_id + "/homeworks/" + homework_id;
}

window.onload = function () {
  var edit_icon = document.getElementsByClassName("edit_hw"); //var view_icon = document.getElementsByClassName("view_hw");

  var delete_icon = document.getElementsByClassName("delete_hw");

  for (var i = 0; i < edit_icon.length; i++) {
    edit_icon[i].addEventListener("click", editHomework);
  }
  /*for (let i = 0; i < view_icon.length; i++) {
      view_icon[i].addEventListener("click",viewHomework);
  }*/


  for (var _i = 0; _i < delete_icon.length; _i++) {
    delete_icon[_i].addEventListener("click", deleteHomework);
  }
};

/***/ }),

/***/ 3:
/*!****************************************!*\
  !*** multi ./resources/js/homework.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\classHome-clone\resources\js\homework.js */"./resources/js/homework.js");


/***/ })

/******/ });