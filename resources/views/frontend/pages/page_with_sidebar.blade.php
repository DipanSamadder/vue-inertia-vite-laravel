@extends('frontend.layouts.app')
@include('frontend.partials.canonical')
@include('frontend.partials.page_meta')


@section('content')

<section class="details_sec common____fix">

<div class="container-fluid g-0">

    <div class="row g-0">

    <div class="col-md-3">

        @include('frontend.partials.sidebar')

    </div>

    <div class="col-md-9">

        @include('frontend.partials.inner_banner')

        <div class="below-content-new">
            
        <?php //include_form_by_id(70);  ?>
        

        <h1>

            {{ $page->title }}

            @auth()

                <a href="{{ route('pages.edit', [$page->id]) }}"><i class="fas fa-edit"></i> </a>

            @endauth

        </h1>



        @if(!is_null($page->short_content))

            <p>{{ $page->short_content }}</p>

        @endif


        
        @if(!is_null($page->content))

            <p>

                @php $str = $page->content; @endphp

                <?php echo htmlspecialchars_decode($str); ?>

            </p>

        @endif



        <div class="darkboxes mt-5">

            <h2>Updates</h2>



            <div class="row">

                <div class="col-md-4">

                    <div class="boxesnew">

                    <div class="headlo">

                    <h4>June 15, 2023</h4>

                    </div>

                    <div class="dsoa">

                    <p>Department of Applied Science is organizing an International Conference on Innovation and Application in Science & Technology (ICIAST-2021) during December 21-23, 2021. Conference Website:https://iciast.in/</p>

                    </div>

                    </div>

                </div>

            </div>

        </div>

        </div>

    </div>

    </div>

</div>

</section>

@endsection


