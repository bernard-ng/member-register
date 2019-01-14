$(document).ready(function () {
  $('.button-collapse').sideNav({
    size: 250
  });

  $('.collapsible').collapsible();
  $('.carousel').carousel({
    dist: 0,
    indicators: true,
    noWrap: false
  });
  $('.slider').slider({
    interval: 5000
  });
  $('.slider.fullsize').slider({
    transition: 300,
    interval: 5000
  });

  $('.tool').tooltip({
    position: 'top',
    delay: 50,

  });
  $('.dropdown-button').dropdown({
    hover: false,
    gutter: 5,
    belowOrigin: false,
    alignment: 'right'
  });
  $('.parallax').parallax();
  $('.modal').modal({
    opacity: 0.5,
    dismissible: false,
    outDuration: 150,
    inDuration: 150,
    preventScrolling: false
  });
  $('.tabs').tabs();
  $('select').material_select();
  $('.datepicker').pickadate({
    selectMonths: false,
    selectYears: false,
    today: "Aujourd'hui",
    clear: "Effacer",
    close: "ok",
    container: 'body',
    closeOnSelect: false,
  });
  $('.timepicker').pickatime({
    default: 'now',
    fromnow: 0,
    twelvehour: true,
    donetext: 'Ok',
    cleartext: 'Effacer',
    canceltext: 'Annuler',
    container: 'body',
    autoclose: false,
    ampmclickable: true,
  });
});
