@extends('templates/default')
         @section('contenu')

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script>

  $(document).ready(function() {
      var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    
    /*  className colors
    
    className: default(transparent), important(red), chill(pink), success(green), info(blue)
    
    */    
    
      
    /* initialize the external events
    -----------------------------------------------------------------*/
  
    $('#external-events div.external-event').each(function() {
    
      // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
      // it doesn't need to have a start or end
      var eventObject = {
        title: $.trim($(this).text()) // use the element's text as the event title
      };
      
      // store the Event Object in the DOM element so we can get to it later
      $(this).data('eventObject', eventObject);
      
      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });
      
    });
  
  
    /* initialize the calendar
    -----------------------------------------------------------------*/
    
    var calendar =  $('#calendar').fullCalendar({
      header: {
        left: 'title',
        center: 'agendaDay,agendaWeek,month',
        right: 'prev,next today'
      },
      editable: true,
      firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
      selectable: true,
      defaultView: 'month',
      
      axisFormat: 'h:mm',
      columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM YYYY', // September 2009
                week: "MMMM YYYY", // September 2009
                day: 'MMMM YYYY'                  // Tuesday, Sep 8, 2009
            },
      allDaySlot: false,
      selectHelper: true,
      select: function(start, end, allDay) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.fullCalendar('renderEvent',
            {
              title: title,
              start: start,
              end: end,
              allDay: allDay
            },
            true // make the event "stick"
          );
        }
        calendar.fullCalendar('unselect');
      },
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function(date, allDay) { // this function is called when something is dropped
      
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');
        
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);
        
        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        
        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
        
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }
        
      },
      
      events: [
        @foreach ($reunion as $reunion)
        <?php 
        $hdebut=(new DateTime($reunion->heur_debut))->format("H");
        $mdebut=(new DateTime($reunion->heur_debut))->format("s");
        $hfin=(new DateTime($reunion->heur_fin))->format("H");
        $mfin=(new DateTime($reunion->heur_fin))->format("s");
         $m=(new DateTime($reunion->date))->format("m");
         $j=(new DateTime($reunion->date))->format("d");
         ?>
        {
           title: '{{nom_user($reunion->id_user)}}',
          start: new Date(y, <?php echo $m-1; ?>, <?php echo $j; ?>, <?php echo $hdebut; ?>, <?php echo $mdebut; ?>),
          end: new Date(y, <?php echo $m-1; ?>, <?php echo $j; ?>, <?php echo $hfin; ?>, <?php echo $mfin; ?>),
          url: "{{ route ('Reunion.show', $reunion->id)}}",
          allDay: false,
          className: 'important'
        }@if (! $loop->last)
                    ,
                      @endif
        @endforeach
       
      ],      
    });
    
    
  });

</script>
<style>

 
  #wrap {
    width: 1100px;
    margin: 0 auto;
    }
    
  #external-events {
    float: left;
    width: 150px;
    padding: 0 10px;
    text-align: left;
    }
    
  #external-events h4 {
    font-size: 16px;
    margin-top: 0;
    padding-top: 1em;
    }
    
  .external-event { /* try to mimick the look of a real event */
    margin: 10px 0;
    padding: 2px 4px;
    background: #3366CC;
    color: #fff;
    font-size: .85em;
    cursor: pointer;
    }
    
  #external-events p {
    margin: 1.5em 0;
    font-size: 11px;
    color: #666;
    }
    
  #external-events p input {
    margin: 0;
    vertical-align: middle;
    }

  #calendar {
/*    float: right; */
        margin: 0 auto;
    width: 900px;
    background-color: #FFFFFF;
      border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
    -webkit-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
-moz-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
    }

</style>
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Dashboard</li>                
          </ol>
        </div>
      </div>
    
     

      <div class="row">   
        <div class="col-lg-12">

          <div id='wrap'>

<div id='calendar' style="padding: 5px;"></div>

<div style='clear:both'></div>
</div>
          
        </div><!--/col-->
      
      </div><!--/row--> 

     
      
         @stop