@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <div class="container">
        @foreach ($events as $event)
            <div class="row align-items-center event-block no-gutters margin-40px-bottom">
                <div class="col-lg-5 col-sm-12">
                    <div class="position-relative">
                        <img src="https://www.bootdey.com/image/450x280/FFB6C1/000000" alt="">
                        <div class="events-date">
                            <div class="font-size28">{{ date('j', strtotime($event->start_event)) }}</div>
                            <div class="font-size14">{{ date('F Y', strtotime($event->start_event)) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12">
                    <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                        <h5
                            class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500">
                            <a href="{{ route('formation.index', ['formation' => $event->id]) }} "
                                class="text-theme-color">{{ $event->name }}</a>
                        </h5>
                        <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                            <li><i class="far fa-clock margin-10px-right"></i> {{ $event->start_event }} -
                                {{ $event->end_event }}</li>
                            <li><i
                                    class="fas fa-user margin-5px-right"></i>{{ isset($event->users) && count($event->users) > 0 ? $event->users[0]->name . ' ' . $event->users[0]->name : 'pas de teachers' }}
                            </li>
                        </ul>
                        <p>{{ $event->description }}</p>
                        <a class="butn small margin-10px-top md-no-margin-top" href="event-details.html">Read More <i
                                class="fas fa-long-arrow-alt-right margin-10px-left"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
