@extends('layouts.app')
@section('content')
    <style>
        .fc-day {
            cursor:pointer
        }

        .fc-day-top {
            cursor:pointer
        }

        .fc-event-container{
            cursor:pointer            
        }

        .fc-day:hover{
            background-color: #B3E5FC
        }

        .fc-day-top:hover {
            background: #B3E5FC
        }
    </style> 

    <div id='calendar'></div>

    <script>
        let events = [
                        {
                            title: 'มีการจอง',
                            start: '2017-10-14'
                        }
                    ]
                
        $(document).ready(() => {
            
            $('#calendar').fullCalendar({
                events,
                dayClick: (date, jsEvent, view) => {
                    console.log('Clicked on: ' + date.format());
                    window.location.href = "reservation/room/"+ date.format();
                },
                eventClick: (calEvent, jsEvent, view) => {
                    console.log('Event: ' + calEvent.title);
                    window.location.href = "reservation/room/"+ date.format();                    
                }
            });

            $('.fc-next-button,.fc-prev-button').click(() => {
                console.log($('.fc-left h2').html())
            });
        });    
    </script>

@stop