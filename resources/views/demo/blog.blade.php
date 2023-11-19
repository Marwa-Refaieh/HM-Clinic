@extends('demo.demo-layouts.master')

@section('title')
    Doctors
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ URL::asset('demo/css/blogs.css') }}" rel="stylesheet">
@stop

@section('content')
    <a id="button"></a>
    <!-- Start Section Hero-->
    <section class="hero is-success">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <div id="particles-js"></div>
            @include('demo.demo-layouts.main-header')

        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body ">
            <div class="container ">
                <div class="columns">
                    <div class="column has-text-centered ">
                        <h1
                            class="is-size-2-desktop is-size-2-tablet is-size-4-mobile has-text-weight-bold is-capitalized ">
                            Articles to increase your medical knowledge</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Hero-->

    <div class="section blog">
        <div class="container">
            <h2 class="title is-1 is-relative line-blog">Blog</h2>

            <div class="columns">
                <div class="column">
                    <ul id="tab">
                        <li><a href="{{ route('articles', ['category' => 1]) }}">Cardiology</a></li>
                        <li><a href="{{ route('articles', ['category' => 2]) }}">Neurology</a></li>
                        <li><a href="{{ route('articles', ['category' => 3]) }}">Psychology</a></li>
                        <li><a href="{{ route('articles', ['category' => 4]) }}">Endocrinology</a></li>
                    </ul>
                </div>
            </div>

            <div id="wrapper">

                <div class="contents">

                    @foreach ($articles as $article)
                        <div class="card px-5 mb-6">
                            <div class="columns is-multiline is-flex is-justify-content-center is-align-items-center">
                                <div class="column is-6-desktop is-12 py-5 pl-5">
                                    <div class="content ">
                                        <div
                                            class="person is-flex is-align-items-center has-text-weight-medium has-text-grey">
                                            <figure class="image is-64x64 m-0 mr-3 mb-3">
                                                <img class="is-rounded" src="{{ $article->author_photo }}">
                                            </figure>
                                            <div class="person-info">
                                                <p class="m-0">{{ $article->author_name }}</p>
                                                <span>{{ $article->created_at->format('Y-m-d') }}</span>
                                            </div>
                                        </div>
                                        <div class="card-info ">
                                            <h3 class="is-size-4 is-size-5-mobile mb-3">{{ $article->title }} :</h3>
                                            <p class="is-size-6">{{ $article->definition }}.</p>
                                        </div>

                                        <a data-target="modal-js-1"
                                            class="js-modal-trigger more button is-small p-4 mt-2 is-uppercase animate__animated animate__pulse animate__slow animate__infinite" onclick="DetailsClicked({{ $article->id }})"></a>
                                    </div>
                                </div>
                                <div
                                    class="column is-6-desktop is-12 pl-4 is-flex is-justify-content-center is-align-items-center">
                                    <div class="card-image is-flex is-justify-content-center is-align-items-center">
                                        <img src="{{ $article->image }}" alt="" width="400px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

    <div id="modal-js-1" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title is-size-3 has-text-weight-semibold">Modal title</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">
                    <!-- <h1 class="is-capitalized is-size-3">Title</h1> -->
                    <p id="definition"></p>
                    <h2 class="is-capitalized is-size-4">Symptoms</h2>
                    <p id="symptoms">.</p>


                    <h2 class="is-capitalized is-size-4">risk factors</h2>
                    <p id="risk_factor">.</p>
                    <h2 class="is-capitalized is-size-4">When should you see a doctor?</h2>
                    <p id="when">.</p>
                    <h2 class="is-capitalized is-size-4">treatment</h2>
                    <p id="treatment">.</p>
                    <h2 class="is-capitalized is-size-4">wrong concepts</h2>
                    <p id="misconceptions">.</p>

                </div>
            </section>
            <footer class="modal-card-foot">
            </footer>
        </div>
    </div>

@stop


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>
    function DetailsClicked(id) {

        // document.getElementById("doctorAge").innerHTML = 'Marah 26';


        // Use AJAX to get the doctor details
        $.ajax({
            url: 'http://127.0.0.1:8000/artical/show/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                document.getElementById("definition").innerHTML = response.definition;
                document.getElementById("symptoms").innerHTML = response.symptoms;
                document.getElementById("risk_factor").innerHTML = response.risk_factor;
                document.getElementById("when").innerHTML = response.when;
                document.getElementById("treatment").innerHTML = response.treatment;
                document.getElementById("misconceptions").innerHTML = response.misconceptions;

            }
        })
    }
</script>




@section('script')
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{{ URL::asset('demo/js/jquery.tabpager.js') }}"></script>
    <script src="{{ URL::asset('demo/js/blog.js') }}"></script>
@stop
