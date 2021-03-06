// call this from the developer console and you can control both instances
var calendars = {};

$(document).ready( function() {

  var calendar_control = $('.calendar-control.edit-control'); //For edit use

  $('.calendar-control').click(function() {
    calendar_control = $(this);  //For normal use
  });

  $('.calendar-control').click(function(){
    $('.cal-popup').toggle();
  });

  $('.cal-popup').on('click', 'button.ready', function(){
    $('.cal-popup').hide();
  });

  // assuming you've got the appropriate language files,
  // clndr will respect whatever moment's language is set to.
  // moment.lang('ru');

  // here's some magic to make sure the dates are happening this month.
  var thisMonth = moment().format('YYYY-MM');

  var eventArray = [
    { startDate: thisMonth + '-10', endDate: thisMonth + '-14', title: 'Multi-Day Event' },
    { startDate: thisMonth + '-21', endDate: thisMonth + '-23', title: 'Another Multi-Day Event' }
  ];

  // the order of the click handlers is predictable.
  // direct click action callbacks come first: click, nextMonth, previousMonth, nextYear, previousYear, or today.
  // then onMonthChange (if the month changed).
  // finally onYearChange (if the year changed).

  calendars.clndr1 = $('.cal-pop').clndr({
    events: eventArray,
    // constraints:{
    //   startDate: '2013-11-01',
    //   endDate: '2013-11-15'
    // },
    clickEvents: {
      click: function(target) {
        console.log(target);

        $('.cal-popup .cal-control .clndr .clndr-table tr .day').removeClass('selected-date');
        $(target.element).addClass('selected-date');
        calendar_control.val(target.date['_i']);
        $('.bottom-controls .selected-date .date').html(target.date['_i']);

        if($(target.element).hasClass('inactive')) {
          console.log('not a valid datepicker date.');
        } else {
          console.log('VALID datepicker date.');
        }
      },
      nextMonth: function() {
        console.log('next month.');
      },
      previousMonth: function() {
        console.log('previous month.');
      },
      onMonthChange: function() {
        console.log('month changed.');
      },
      nextYear: function() {
        console.log('next year.');
      },
      previousYear: function() {
        console.log('previous year.');
      },
      onYearChange: function() {
        console.log('year changed.');
      },
      back: function() {
        console.log('month back.');
      }
    },
    multiDayEvents: {
      startDate: 'startDate',
      endDate: 'endDate'
    },
    showAdjacentMonths: true,
    adjacentDaysChangeMonth: false
  });

  // calendars.clndr2 = $('.cal2').clndr({
  //   template: $('#template-calendar').html(),
  //   events: eventArray,
  //   startWithMonth: moment().add('month', 1),
  //   clickEvents: {
  //     click: function(target) {
  //       console.log(target);
  //     }
  //   }
  // });


  /*
  <div class="cal-popup widget">
    <div class="cal-container">
        <div class="cal-widget cal-control"> </div>
    </div>
  </div>
  */

  calendars.clndr2 = $('.cal-widget').clndr({
    events: eventArray,
    // constraints:{
    //   startDate: '2013-11-01',
    //   endDate: '2013-11-15'
    // },
    clickEvents: {
      click: function(target) {
        console.log(target);

        calendar_control.val(target.date['_i']);
        $('.bottom-controls .selected-date .date').html(target.date['_i']);

        if($(target.element).hasClass('inactive')) {
          console.log('not a valid datepicker date.');
        } else {
          console.log('VALID datepicker date.');
        }
      },
      nextMonth: function() {
        console.log('next month.');
      },
      previousMonth: function() {
        console.log('previous month.');
      },
      onMonthChange: function() {
        console.log('month changed.');
      },
      nextYear: function() {
        console.log('next year.');
      },
      previousYear: function() {
        console.log('previous year.');
      },
      onYearChange: function() {
        console.log('year changed.');
      },
      back: function() {
        console.log('month back.');
      }
    },
    multiDayEvents: {
      startDate: 'startDate',
      endDate: 'endDate'
    },
    showAdjacentMonths: true,
    adjacentDaysChangeMonth: false
  });



  // bind both clndrs to the left and right arrow keys
  $(document).keydown( function(e) {
    if(e.keyCode == 37) {
      // left arrow
      calendars.clndr1.back();
      calendars.clndr2.back();
    }
    if(e.keyCode == 39) {
      // right arrow
      calendars.clndr1.forward();
      calendars.clndr2.forward();
    }
    if(e.keyCode == 38) {
      // up arrow
      calendars.clndr1.nextYear();
      calendars.clndr2.nextYear();
    }
    if(e.keyCode == 40) {
      // down arrow
      calendars.clndr1.previousYear();
      calendars.clndr2.previousYear();
    }
    //alert (e.keyCode);
  });

});
