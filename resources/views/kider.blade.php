@extends('layouts.main')

@section('header')
<!-- Carousel Start -->
        @include('includes.carousel')
        <!-- Carousel End -->


        <!-- Facilities Start -->
        @include('includes.facilities')
        <!-- Facilities End -->


        <!-- About Start -->
        @include('includes.about')
        <!-- About End -->


        <!-- Call To Action Start -->
        @include('includes.call')
        <!-- Call To Action End -->

        <!-- Classes Start -->
            @include('includes.classes')
        <!-- {{-- Debugging: Output the courses --}}
                @if($courses->isEmpty())
                    <p>No courses found.</p>
                @else
                    @foreach ($courses as $course)
                        <p>{{ $course->className }}</p>
                    @endforeach
                @endif -->
        <!-- Classes End -->


        <!-- Appointment Start -->
        @include('includes.appointment')
        <!-- Appointment End -->


        <!-- Team Start -->
        @include('includes.team')
        <!-- Team End -->


        <!-- Testimonial Start -->
        @include('includes.testimonial')
        <!-- Testimonial End -->

@endsection