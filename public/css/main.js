/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
eval("$('.like').click(function (e) {\n  e.preventDefault();\n  var like = e.target.previousElementSibling == null;\n  var postid = e.target.parentNode.dataset['postid'];\n  var data = {\n    isLike: like,\n    post_id: postid\n  };\n  axios.post('/like', data).then(function (response) {\n    $(\"[data-postid='\" + response['data']['post_id'] + \"'] > .active-like\").attr('class', 'btn btn-link like');\n    e.currentTarget.className = \"btn btn-link like active-like\";\n  });\n});\n$('.friend').click(function (e) {\n  e.preventDefault();\n  var friendid = e.target.parentNode.dataset['friendid'];\n  var data = {\n    friend_id: friendid\n  };\n  axios.post('/friend', data).then(function (response) {\n    e.target.innerHTML = \"Remove Friend\";\n    e.currentTarget.className = \"btn btn-link remove-friend\";\n  });\n});\n$('.remove-friend').click(function (e) {\n  e.preventDefault();\n  var friendid = e.target.parentNode.dataset['friendid'];\n  var data = {\n    friend_id: friendid\n  };\n  axios.post('/friend/remove', data).then(function (response) {\n    console.log(e);\n    e.target.innerHTML = \"Add Friend\";\n    e.currentTarget.className = \"btn btn-link friend\";\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWFpbi5qcz9mMzJhIl0sIm5hbWVzIjpbIiQiLCJjbGljayIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImxpa2UiLCJ0YXJnZXQiLCJwcmV2aW91c0VsZW1lbnRTaWJsaW5nIiwicG9zdGlkIiwicGFyZW50Tm9kZSIsImRhdGFzZXQiLCJkYXRhIiwiaXNMaWtlIiwicG9zdF9pZCIsImF4aW9zIiwicG9zdCIsInRoZW4iLCJyZXNwb25zZSIsImF0dHIiLCJjdXJyZW50VGFyZ2V0IiwiY2xhc3NOYW1lIiwiZnJpZW5kaWQiLCJmcmllbmRfaWQiLCJpbm5lckhUTUwiLCJjb25zb2xlIiwibG9nIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXQyxLQUFYLENBQWlCLFVBQVNDLENBQVQsRUFBWTtBQUN6QkEsRUFBQUEsQ0FBQyxDQUFDQyxjQUFGO0FBQ0EsTUFBSUMsSUFBSSxHQUFHRixDQUFDLENBQUNHLE1BQUYsQ0FBU0Msc0JBQVQsSUFBbUMsSUFBOUM7QUFDQSxNQUFJQyxNQUFNLEdBQUdMLENBQUMsQ0FBQ0csTUFBRixDQUFTRyxVQUFULENBQW9CQyxPQUFwQixDQUE0QixRQUE1QixDQUFiO0FBQ0EsTUFBSUMsSUFBSSxHQUFHO0FBQ1BDLElBQUFBLE1BQU0sRUFBRVAsSUFERDtBQUVQUSxJQUFBQSxPQUFPLEVBQUVMO0FBRkYsR0FBWDtBQUlBTSxFQUFBQSxLQUFLLENBQUNDLElBQU4sQ0FBVyxPQUFYLEVBQW9CSixJQUFwQixFQUEwQkssSUFBMUIsQ0FBK0IsVUFBQUMsUUFBUSxFQUFJO0FBQ3ZDaEIsSUFBQUEsQ0FBQyxDQUFDLG1CQUFtQmdCLFFBQVEsQ0FBQyxNQUFELENBQVIsQ0FBaUIsU0FBakIsQ0FBbkIsR0FBaUQsbUJBQWxELENBQUQsQ0FDS0MsSUFETCxDQUNVLE9BRFYsRUFDbUIsbUJBRG5CO0FBRUFmLElBQUFBLENBQUMsQ0FBQ2dCLGFBQUYsQ0FBZ0JDLFNBQWhCLEdBQTRCLCtCQUE1QjtBQUNILEdBSkQ7QUFLSCxDQWJEO0FBZUFuQixDQUFDLENBQUMsU0FBRCxDQUFELENBQWFDLEtBQWIsQ0FBbUIsVUFBU0MsQ0FBVCxFQUFZO0FBQzNCQSxFQUFBQSxDQUFDLENBQUNDLGNBQUY7QUFDQSxNQUFJaUIsUUFBUSxHQUFHbEIsQ0FBQyxDQUFDRyxNQUFGLENBQVNHLFVBQVQsQ0FBb0JDLE9BQXBCLENBQTRCLFVBQTVCLENBQWY7QUFDQSxNQUFJQyxJQUFJLEdBQUc7QUFDUFcsSUFBQUEsU0FBUyxFQUFFRDtBQURKLEdBQVg7QUFHQVAsRUFBQUEsS0FBSyxDQUFDQyxJQUFOLENBQVcsU0FBWCxFQUFzQkosSUFBdEIsRUFBNEJLLElBQTVCLENBQWlDLFVBQUFDLFFBQVEsRUFBSTtBQUV6Q2QsSUFBQUEsQ0FBQyxDQUFDRyxNQUFGLENBQVNpQixTQUFULEdBQXFCLGVBQXJCO0FBQ0FwQixJQUFBQSxDQUFDLENBQUNnQixhQUFGLENBQWdCQyxTQUFoQixHQUE0Qiw0QkFBNUI7QUFDSCxHQUpEO0FBS0gsQ0FYRDtBQWFBbkIsQ0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JDLEtBQXBCLENBQTBCLFVBQVNDLENBQVQsRUFBWTtBQUNsQ0EsRUFBQUEsQ0FBQyxDQUFDQyxjQUFGO0FBQ0EsTUFBSWlCLFFBQVEsR0FBR2xCLENBQUMsQ0FBQ0csTUFBRixDQUFTRyxVQUFULENBQW9CQyxPQUFwQixDQUE0QixVQUE1QixDQUFmO0FBQ0EsTUFBSUMsSUFBSSxHQUFHO0FBQ1BXLElBQUFBLFNBQVMsRUFBRUQ7QUFESixHQUFYO0FBSUFQLEVBQUFBLEtBQUssQ0FBQ0MsSUFBTixDQUFXLGdCQUFYLEVBQTZCSixJQUE3QixFQUFtQ0ssSUFBbkMsQ0FBd0MsVUFBQUMsUUFBUSxFQUFJO0FBQ2hETyxJQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWXRCLENBQVo7QUFDQUEsSUFBQUEsQ0FBQyxDQUFDRyxNQUFGLENBQVNpQixTQUFULEdBQXFCLFlBQXJCO0FBQ0FwQixJQUFBQSxDQUFDLENBQUNnQixhQUFGLENBQWdCQyxTQUFoQixHQUE0QixxQkFBNUI7QUFDSCxHQUpEO0FBS0gsQ0FaRCIsInNvdXJjZXNDb250ZW50IjpbIiQoJy5saWtlJykuY2xpY2soZnVuY3Rpb24oZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB2YXIgbGlrZSA9IGUudGFyZ2V0LnByZXZpb3VzRWxlbWVudFNpYmxpbmcgPT0gbnVsbDtcbiAgICB2YXIgcG9zdGlkID0gZS50YXJnZXQucGFyZW50Tm9kZS5kYXRhc2V0Wydwb3N0aWQnXTtcbiAgICB2YXIgZGF0YSA9IHtcbiAgICAgICAgaXNMaWtlOiBsaWtlLFxuICAgICAgICBwb3N0X2lkOiBwb3N0aWRcbiAgICB9XG4gICAgYXhpb3MucG9zdCgnL2xpa2UnLCBkYXRhKS50aGVuKHJlc3BvbnNlID0+IHtcbiAgICAgICAgJChcIltkYXRhLXBvc3RpZD0nXCIgKyByZXNwb25zZVsnZGF0YSddWydwb3N0X2lkJ10gKyBcIiddID4gLmFjdGl2ZS1saWtlXCIpXG4gICAgICAgICAgICAuYXR0cignY2xhc3MnLCAnYnRuIGJ0bi1saW5rIGxpa2UnKTtcbiAgICAgICAgZS5jdXJyZW50VGFyZ2V0LmNsYXNzTmFtZSA9IFwiYnRuIGJ0bi1saW5rIGxpa2UgYWN0aXZlLWxpa2VcIjtcbiAgICB9KVxufSk7XG5cbiQoJy5mcmllbmQnKS5jbGljayhmdW5jdGlvbihlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIHZhciBmcmllbmRpZCA9IGUudGFyZ2V0LnBhcmVudE5vZGUuZGF0YXNldFsnZnJpZW5kaWQnXTtcbiAgICB2YXIgZGF0YSA9IHtcbiAgICAgICAgZnJpZW5kX2lkOiBmcmllbmRpZFxuICAgIH1cbiAgICBheGlvcy5wb3N0KCcvZnJpZW5kJywgZGF0YSkudGhlbihyZXNwb25zZSA9PiB7XG5cbiAgICAgICAgZS50YXJnZXQuaW5uZXJIVE1MID0gXCJSZW1vdmUgRnJpZW5kXCI7XG4gICAgICAgIGUuY3VycmVudFRhcmdldC5jbGFzc05hbWUgPSBcImJ0biBidG4tbGluayByZW1vdmUtZnJpZW5kXCI7XG4gICAgfSlcbn0pXG5cbiQoJy5yZW1vdmUtZnJpZW5kJykuY2xpY2soZnVuY3Rpb24oZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB2YXIgZnJpZW5kaWQgPSBlLnRhcmdldC5wYXJlbnROb2RlLmRhdGFzZXRbJ2ZyaWVuZGlkJ107XG4gICAgdmFyIGRhdGEgPSB7XG4gICAgICAgIGZyaWVuZF9pZDogZnJpZW5kaWRcbiAgICB9XG5cbiAgICBheGlvcy5wb3N0KCcvZnJpZW5kL3JlbW92ZScsIGRhdGEpLnRoZW4ocmVzcG9uc2UgPT4ge1xuICAgICAgICBjb25zb2xlLmxvZyhlKTtcbiAgICAgICAgZS50YXJnZXQuaW5uZXJIVE1MID0gXCJBZGQgRnJpZW5kXCI7XG4gICAgICAgIGUuY3VycmVudFRhcmdldC5jbGFzc05hbWUgPSBcImJ0biBidG4tbGluayBmcmllbmRcIjtcbiAgICB9KVxufSkiXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL21haW4uanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/main.js\n");
/******/ })()
;