/**
 * 16 Beaver Custom Theme
 * http://16beavergroup.org
 *
 * Copyright (c) 2014 Raed Atoui
 * Licensed under the GPLv2+ license.
 */

var year;
var arr;
var currentPage;
var doCheckLength = true;

$(document).ready(
  function () {
    checkMenu();
    checkCategories();
    addEventListeners();
    checkFlexo();
    checkMenu();
    setTimeout(function(){
      resize();
    }, 100);
  }
);

var checkMenu = function() {
  arr = document.location.href.split('/');
  currentPage = arr[3].toLowerCase();
  $('#menu-main-menu a').each(function() {
    if($(this).text().toLowerCase() == currentPage)
      $(this).parent().addClass('current-menu-item');
  });
}

var checkCategories = function() {
  if ($(".catlist").length) {
    $(".catlist").masonry({itemSelector: 'li',"gutter": 10});
  }
}

var addEventListeners = function() {
  if($("#sidebar").length > 0) {
    window.requestAnimationFrame(checkLength);
    $(window).resize(resize);
  }


  $('.cal-nav select').change(function() {
    document.location.href = '/events/'+$(this).val();
  });
}

var checkFlexo = function() {
  if($('ul.flexo-list').length) {
    $('ul.flexo-list').hide();  // hide year lists
    $('a.flexo-link').on('click',onFlexo);
    // $('#barcontent li.flexo-month-link').on('click',onFlexo);
    arr = document.location.href.split('/');
    year = arr[arr.length-2];
    if(!isNaN(parseInt(year))) {
      if(year.length == 4) {
        $('li.flexo-month-link.'+year).addClass('open')
        $('li.flexo-month-link.'+year).find('ul').slideToggle('fast');
      }
      else if(year.length == 2) {
        var year2 = arr[arr.length-3];
        $('li.flexo-month-link.'+year2).addClass('open')
        $('li.flexo-month-link.'+year2).find('ul').slideToggle('fast');
      }
    }
  }
}

var onFlexo = function(event) {
  $(this).parent().toggleClass('open');
  if($(this).parent().hasClass('open') || $(this).parent().hasClass(year) || $(this).hasClass('share')) {
    $(this).next().slideToggle('fast', function(){
      window.resize();
    });
    return false;
  }
}

var resize = function() {
  doCheckLength = true;
  setTimeout(function() {
    window.doCheckLength = true;
  },100);
}
var checkLength = function() {

  if(doCheckLength) {
    var a = $("#sidebar").height();
    var b = $("#left-bar").height();
    if(a > b) {
      $("#sidebar").css({'border-left-width':1});
      $("#left-bar").css('border-right-width',0);
    }
    else {
      $("#sidebar").css('border-left-width',0);
      $("#left-bar").css('border-right-width',1);
    }
    doCheckLength = false;
  }
  window.requestAnimationFrame(checkLength);
}
